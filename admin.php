<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script type="text/javascript">
            function preventBack() { window.history.forward(); }
            setTimeout("preventBack()", 0);
            window.onunload = function () { null };
        </script>
        <link rel="stylesheet" type="text/css" href="css/admin.css">
        <div class="div_login">
            <ul class="ul_login">
                <li class="li_login"><a class="lgn" href="login.php">Logout</a></li>
            </ul>
        </div>
        <center>
            <p class="hh">
                <font>WELCOME</font>
            </p>
        </center>
        <div class="d2">
            <center>
                <button class="b1" onclick="#"><h2>Home</h2></button>
                <button class="b1" onClick="toggleClass()"><h2>Booking</h2></button>       
                <button class="b1" onclick="toggleClass2()"><h2>Show</h2></button>

            </center>
        </div>
    </head>
    <body bgcolor="#E6E6FA">
                
        <center>
        <div class="contact" id="contact">
            <form action="admin.php" method="post" class="booking">
                <div class="row">
                    <div class="col-2">
                        <label>Name</label>
                        <input type="text" name="name" class="text" placeholder="">
                    </div>
                    <div class="col-2">
                        <label>phone no.</label>
                        <input type="text" name="phone_no" class="text" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label>Email Address</label>
                        <input type="text" name="email" class="text" placeholder=".com">
                    </div>
                    <div class="col-2">
                        <label>Select</label>
                        <select name="type">
                            <option value="Single Room">Single Room</option>
                            <option value="Double Room">Double Room</option>
                            <option value="Luxary Room">Luxary Room</option>
                            <option value="Suits Room">Suits Room</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <label>Room No.</label>
                        <input type="text" name="roomno" class="text" placeholder="">
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-2">
                        <label>Arrival Date</label>
                        <input type="date" name="arri" class="text">
                    </div>
                    <div class="col-2">
                        <label>departure Date</label>
                        <input type="date" name="depur" class="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <input type="submit" name="book" value="Booked">
                    </div>
                </div>
            </form>
            </div>
        </center>
        <?php
        if(isset($_POST['book']))
        {
            $conn=mysqli_connect("localhost","root","","hotel");
            
            #===========================================
    
            $bok_id="SELECT booking_id from `booking` order by `booking_id` DESC limit 1";
            $bok=mysqli_query($conn,$bok_id);
            $re=mysqli_fetch_array($bok);
            $b=$re['booking_id']+1;
    
            #===========================================
            $date = date('Y-m-d H:i:s');
            #===========================================
            $room_id="SELECT room_id from `booking` where room_type='$_POST[type]' order by `room_id` DESC limit 1";
            $rom=mysqli_query($conn,$room_id);
            $rm=mysqli_fetch_array($rom);
            $room=$rm['room_id']+1;
            #===========================================
            $rent="SELECT rent FROM `rooms` where rooms.room_type= '$_POST[type]' limit 1 ";
            $ren=mysqli_query($conn,$rent);
            $rt=mysqli_fetch_array($ren);
            $r=$rt['rent'];
            #===========================================
            $sql="SELECT rooms.rent FROM `rooms` WHERE rooms.room_type= '$_POST[type]' limit 1";
            $result= mysqli_query($conn, $sql);
            $type=mysqli_fetch_array($result);
            $gst=$type[0] * (118/100);
            #===========================================
            $arri= date_create($_POST['arri']);
            $depur= date_create($_POST['depur']);
            $roomno=($_POST['roomno']);
            
            $diff=date_diff($arri,$depur);
            $dates= $diff->format("%a");
            
            $total=$gst * $roomno * $dates;
            #===========================================
            
            $sql2="select rooms.room_id from rooms where rooms.room_type = '".$_POST['type']."' and  rooms.room_id not in
            (SELECT booking.room_id FROM `booking` WHERE ('".$_POST['arri']."' between booking.arrival and booking.depurture) OR ('".$_POST['depur']."' between booking.arrival and booking.depurture)) limit $_POST[roomno]";
            
            $result2= mysqli_query($conn,$sql2);
            
            while($row = mysqli_fetch_row($result2)){
                $insert="INSERT INTO `booking` (`booking_id`,`booking_date`,`name`,`phone_no`, `email`, `room_id`,`room_type`, `arrival`, `depurture`, `basfare`, `gst`, `total_fare`, `payment`) VALUES ('$b','$date','$_POST[name]','$_POST[phone_no]', '$_POST[email]' , '$room','$_POST[type]', '$_POST[arri]', '$_POST[depur]', '$r','$gst','$total','paid')";
                $room=$room+1;
                if(mysqli_query($conn,$sql)){
                    echo
                        "<script>
                        alert('Successfully Booked')
                        </script>";
                    echo '<script type="text/javascript">';
                    echo 'window.location.href = "admin.php";';
                    echo '</script>';
                    die;
                }
            }
        }
        ?>
    
        <center>
            <div class="contact" id="contact2">
            <form action="#" class="booking">
                <?php
                $sname="localhost";
                $un="root";
                $pw="";
                $db="hotel";
                $conn=mysqli_connect($sname,$un,$pw,$db);
                $sql="select * from booking";
                $result=mysqli_query($conn,$sql);
                echo "<center><table border>
                <tr>
                <th>Booking id</th>
                <th>Booking Date</th>
                <th>Name</th>
                <th>Phone No.</th>
                <th>Email</th>
                <th>Room Id</th>
                <th>Arrival</th>
                <th>Depurture</th>
                <th>Bas_fare</th>
                <th>GST</th>
                <th>Total</th>
                <th>pay</th>
                </tr>";
                while($row=mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>".$row['booking_id']."</td>";
                    echo "<td>".$row['booking_date']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['phone_no']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['room_id']."</td>";
                    echo "<td>".$row['arrival']."</td>";
                    echo "<td>".$row['depurture']."</td>";
                    echo "<td>".$row['basfare']."</td>";
                    echo "<td>".$row['gst']."</td>";
                    echo "<td>".$row['total_fare']."</td>";
                    echo "<td>".$row['payment']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</center>";
                mysqli_close($conn);
                ?>
            </form>
        </div>
    </center>
    
        <br>
        <br>
        <br>
        <br>
        <center>
            <div class="home">
                <h2>Rooms</h2>
                <form class="select_form">
                    <select name="" onchange="myFunction(event)">
                        <option value="">Select Room Type</option>
                        <option value=
                                "<?php
                $conn=mysqli_connect("localhost","root","","hotel");
                $sql="SELECT (Select COUNT(room_type) FROM rooms where rooms.room_type='Single room')-(SELECT COUNT(room_type) FROM booking where booking.room_type='Single room') as single";
                $result=mysqli_query($conn,$sql);
                                 while($row=mysqli_fetch_array($result))
                                 {
                                 echo $row['single'];
                                 }
                                 ?>"
                                >
                            Single Room</option>
                        
                        <option value="<?php
                $conn=mysqli_connect("localhost","root","","hotel");
                $sql="SELECT (Select COUNT(room_type) FROM rooms where rooms.room_type='Double Room')-(SELECT COUNT(room_type) FROM booking where booking.room_type='Double Room') as single";
                $result=mysqli_query($conn,$sql);
                                 while($row=mysqli_fetch_array($result))
                                 {
                                 echo $row['single'];
                                 }
                                 ?>">Double Room</option>
                        
                        <option value="<?php
                $conn=mysqli_connect("localhost","root","","hotel");
                $sql="SELECT (Select COUNT(room_type) FROM rooms where rooms.room_type='Luxury Room')-(SELECT COUNT(room_type) FROM booking where booking.room_type='Luxury Room') as single";
                $result=mysqli_query($conn,$sql);
                                 while($row=mysqli_fetch_array($result))
                                 {
                                 echo $row['single'];
                                 }
                                 ?>">Luxury Room</option>
                        
                        <option value="<?php
                $conn=mysqli_connect("localhost","root","","hotel");
                $sql="SELECT (Select COUNT(room_type) FROM rooms where rooms.room_type='Suits Room')-(SELECT COUNT(room_type) FROM booking where booking.room_type='Suits Room') as single";
                $result=mysqli_query($conn,$sql);
                                 while($row=mysqli_fetch_array($result))
                                 {
                                 echo $row['single'];
                                 }
                                 ?>">Suits Room</option>
                        
                    </select>
                    <input id="myText" type="text" value="">
                </form>
            </div>
        </center>

    </body>
    
    <script>
        function myFunction(e) {
            document.getElementById("myText").value = e.target.value
        }
    </script>
    <script type="text/javascript">
        function toggleClass(){
            var element = document.getElementById('contact');	element.classList.toggle("active")
        }
        function toggleClass2(){
            var element = document.getElementById('contact2');	element.classList.toggle("active")
        }
        function toggleClass3(){
            var element = document.getElementById('contact3');	element.classList.toggle("active")
        }
    </script>
    
</html>