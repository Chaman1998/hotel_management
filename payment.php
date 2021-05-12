<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Payment Checkout Form</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
	<link rel="stylesheet" href="css/check.css">

</head>
<body>

    <div class="wrapper">
        <div class="payment">
            <div class="payment-logo">
                <p>p</p>
            </div>
            
            
            <h2>Payment Gateway</h2>
            <form class="form" method="post" action="#">
                <div class="card space icon-relative">
                    <label class="label">Card holder:</label>
                    <input type="text" class="input" placeholder="Name">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card space icon-relative">
                    <label class="label">Card number:</label>
                    <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="Card Number">
                    <i class="far fa-credit-card"></i>
                </div>
                <div class="card-grp space">
                    <div class="card-item icon-relative">
                        <label class="label">Expiry date:</label>
                        <input type="text" name="expiry-data" class="input" data-mask="00 / 00"  placeholder="00 / 00">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="card-item icon-relative">
                        <label class="label">CVC:</label>
                        <input type="text" class="input" data-mask="000" placeholder="000">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
                <center>
                    <input type="submit" class="btn" name="btn" value="Pay" style="width:80%;">
                </center>
            </form>
            
        </div>
    </div>
    
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
    </body>
</html>

                        

<?php
if(isset($_POST['booked']))
{
    $arri= date_create($_POST['arri']);
    $depur= date_create($_POST['depur']);
    $roomno=($_POST['roomno']);
    $roomtype=($_POST['typ']);
    
    $conn=mysqli_connect("localhost","root","","hotel");
    
    #DATE COUNT
    $diff=date_diff($arri,$depur);
    $dates= $diff->format("%a");
    #===========================================
    $date = date('Y-m-d H:i:s');
    #===========================================
    
    $sql="SELECT rooms.rent FROM `rooms` WHERE rooms.room_type= '$_POST[typ]' limit 1";
    $result= mysqli_query($conn, $sql);
    $type=mysqli_fetch_array($result);
    $gst=$type[0] * (118/100);
    
    #===========================================
    $rent="SELECT rent FROM `rooms` where rooms.room_type= '$_POST[typ]' limit 1 ";
    $ren=mysqli_query($conn,$rent);
    $rt=mysqli_fetch_array($ren);
    $r=$rt['rent'];
    #===========================================
    
    $total=$gst * $roomno * $dates;
    
    #===========================================
    
    $bok_id="SELECT booking_id from `booking` order by `booking_id` DESC limit 1";
    $bok=mysqli_query($conn,$bok_id);
    $re=mysqli_fetch_array($bok);
    $b=$re['booking_id']+1;
    
    #===========================================
    $room_id="SELECT room_id from `booking` where room_type='$_POST[typ]' order by `room_id` DESC limit 1";
    $rom=mysqli_query($conn,$room_id);
    $rm=mysqli_fetch_array($rom);
    $room=$rm['room_id']+1;
    
    #===========================================

    #room select
    $sql2="
    select rooms.room_id from rooms where rooms.room_type = '".$_POST['typ']."' and  rooms.room_id not in
    (
    SELECT booking.room_id FROM `booking` WHERE
    ('".$_POST['arri']."' between booking.arrival and booking.depurture)
    OR
    ('".$_POST['depur']."' between booking.arrival and booking.depurture)
    ) limit $_POST[roomno]";
    
    $result2= mysqli_query($conn,$sql2);
    
    while($row = mysqli_fetch_row($result2)){
        
        $insert="INSERT INTO `booking` (`booking_id`,`booking_date`,`name`,`phone_no`, `email`, `room_id`,`room_type`, `arrival`, `depurture`, `basfare`, `gst`, `total_fare`, `payment`) VALUES ('$b','$date','$_POST[uname]','$_POST[phone_no]', '$_POST[email]' , '$room','$roomtype', '$_POST[arri]', '$_POST[depur]', '$r','$gst','$total','0')";
        $room=$room+1;
        if (!mysqli_query($conn, $insert)) {
            echo "Error: " . mysqli_error($conn);
        }
    }
    #===========================================
    mysqli_close($conn);
}

if(isset($_POST['btn']))
{
    $conn=mysqli_connect("localhost","root","","hotel");
    $bok_id="SELECT booking_id from `booking` order by `booking_id` DESC limit 1";
    $bok=mysqli_query($conn,$bok_id);
    $re=mysqli_fetch_array($bok);
    $b=$re['booking_id'];
    #UPDATE `booking` SET `payment`='paid' WHERE booking_id='*****';
    $sql="UPDATE `booking` SET `payment`='paid' WHERE `booking_id`='$b'";
    if(mysqli_query($conn,$sql)){
        echo
        "<script>
            alert('Message Sent Successfully to your phone')
        </script>";
        echo '<script type="text/javascript">';
        echo 'window.location.href = "index.php";';
        echo '</script>';
        die;
    }
    mysqli_close($conn);
}
?>