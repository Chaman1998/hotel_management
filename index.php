<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ATRAI Hotel</title>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/font-awesome.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="css/lightbox.min.css" rel="stylesheet">
        <script src="js/lightbox-plus-jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link href="css/style.css" rel="stylesheet">
        <link href="css/menu.css" rel="stylesheet">
        <link href="css/mobile.css" rel="stylesheet">
        <link href="css/gallery.css" rel="stylesheet">
        <link href="css/rooms.css" rel="stylesheet">
    </head>
    <body>
        <div class="div_login">
            <ul class="ul_login">
                <li class="li_login"><a class="lgn" href="login.php">Login</a></li>
            </ul>
        </div>
        <header>
            <div class="progress-container">
                <div class="progress-bar" id="myBar"></div>
            </div>
            <a href="#" class="logo">ATRAI Hotel</a>
            <div class="menu-toggle"></div>
            <nav>
                <ul>
                    <li><a class="active" href="#hom">Home</a></li>
                    <li><a href="#rom">Rooms</a></li>
                    <li><a href="#ser">Services</a></li>
                    <li><a href="#gal">Gallery</a></li>
                    <li><a href="#con">Contact</a></li>
                </ul>
            </nav>
            
            <div class="clearfix"></div>
            <script>
                // When the user scrolls the page, execute myFunction 
                window.onscroll = function() {myFunction()};
                
                function myFunction() {
                    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                    var scrolled = (winScroll / height) * 100;
                    document.getElementById("myBar").style.width = scrolled + "%";
                }
            </script>
        </header>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.menu-toggle').click(function(){
                    $('.menu-toggle').toggleClass('active')
                    $('nav').toggleClass('active')
                })
            })
        </script>
        
        <section class="sec1" id="hom"></section>
        
        <section class="sec2">
            <h2 class="ca">Check Availability</h2>
            <div class="sec2_div">
                <form align=center class="sec2_form" action="form.php" method="post">
                    <label>Arrival Date</label>
                    <input type="date" name="d1">
                    
                    <label>Depurture Date</label>
                    <input type="date" name="d2">
                    
                    <label>Type of Room</label>
                    <select name="type">
                        <option value="Single Room">Single Room</option>
                        <option value="Double Room">Double Room</option>
                        <option value="Luxary Room">Luxury Room</option>
                        <option value="Suits Room">Suits Room</option>
                    </select>
                    
                    <label>No of Rooms</label>
                    <input type="text" name="room">
                    
                    <button type="submit" name="button" onclick="myFunction()">Check Availability</button>
                </form>
                <br>

            </div>
        </section>
        
        <section class="sec3" id="rom">
            <div class="divi">
                <h1 class="content_head">Rooms</h1>
                    <div class="row">
                        <div class="column">
                            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                <img src="image/9.jpeg" class="card_img">
                                <h3>Single Room</h3>
                                <p>Rs 400/Night</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                <img src="image/double-bedroom.jpeg" class="card_img">
                                <h3>Double Room</h3>
                                <p>Rs 700/Night</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                <img src="image/luxury-room.jpg" class="card_img">
                                <h3>Luxury Room</h3>
                                <p>Rs 2000/Night</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                <img src="image/Suites.jpeg" class="card_img">
                                <h3>Suites Room</h3>
                                <p>Rs 5000/Night</p>
                            </div>
                        </div>
                </div>
            </div>
            
        </section>
        
        <section class="sec4" id="ser">
            <div class="divi">
                <h1 class="content_head">Service</h1>
                <div class="row">
                    <div class="column">
                        <div class="card" style="background: #dfe4ea;">
                            <img src="image/room-service.jpg" class="card_img">
                            <h3>24x7 hour service</h3>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card" style="background: #dfe4ea;">
                            <img src="image/romclean.jpg" class="card_img">
                            <h3>Daily cleaning</h3>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card" style="background: #dfe4ea;">
                            <img src="image/food.jpg" class="card_img">
                            <h3>Fresh Food</h3>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card" style="background: #dfe4ea;">
                            <img src="image/fitness_center.jpg" class="card_img">
                            <h3>Gym</h3>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        
        <section class="sec5" id="gal">
            <div class="divi">
                <h1 class="content_head">Gallery</h1>
                <div class="gallery">
                    <a href="image/1.jpg" data-lightbox="mygallery" data-title=""><img src="image/1.jpg" class="gallery_img"></a>
                    <a href="image/2.jpg" data-lightbox="mygallery"><img src="image/2.jpg" class="gallery_img"></a>
                    <a href="image/3.jpg" data-lightbox="mygallery"><img src="image/3.jpg" class="gallery_img"></a>
                    <a href="image/4.jpg" data-lightbox="mygallery"><img src="image/4.jpg" class="gallery_img"></a>
                    <a href="image/5.jpg" data-lightbox="mygallery"><img src="image/5.jpg" class="gallery_img"></a>
                    <a href="image/6.jpg" data-lightbox="mygallery"><img src="image/6.jpg" class="gallery_img"></a>
                    <a href="image/7.jpg" data-lightbox="mygallery"><img src="image/7.jpg" class="gallery_img"></a>
                    <a href="image/8.jpg" data-lightbox="mygallery"><img src="image/8.jpg" class="gallery_img"></a>
                    
                </div>
                
            </div>
            
        </section>
        <section class="sec6" id="con">
            <div class="divi">
                <h1 class="content_head">Contact</h1>
                
                <div align=center class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3597.9854887624183!2d88.13073189236539!3d25.605398442562816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fad4ffdd5cad35%3A0x71f88f02bac563b9!2sRAIGANJ+UNIVERSITY!5e0!3m2!1sen!2sin!4v1557504577891!5m2!1sen!2sin" width="1040" height="302" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="con_form">
                    <h2 class="ca">Write to us</h2>
                    <div align=center class="sec6_div">
                        <form class="sec6_form" id="sec6_fm" action="#" method="post">
                            <input type="text" name="na" placeholder="Name">
                            <br>
                            <input type="email" name="email" placeholder="Enter Email">
                            <br>
                            <input type="text" name="phone" placeholder="Phone No.">
                            <br>
                            <textarea rows="4" cols="50" name="comment" placeholder="Enter text here..."></textarea>
                            <br>
                            <button type="submit" name="sent">Sent</button>
                        </form>
                        
                    </div>
                </div>
                
            </div>
        </section>
        <footer>
            
            <div class="foot_div">
                <div class="foot_left">
                    <h2>Atrai Hotel, Raiganj</h2>
                    <p>University Road, Collage Para, Raiganj
                    West Bengal, 733134</p>
                </div>
                <div class="foot_center">
                    <h2>Links</h2>
                    <p><a href="#hom">HOME</a></p>
                    <p><a href="#rom">ROOMS</a></p>
                    <p><a href="#ser">SERVICES</a></p>
                    <p><a href="#gal">GALLERY</a></p>
                    <p><a href="#con">CONTACT</a></p>
                </div>
                <div class="foot_right">
                    <p>Developed by Chaman Sarkar</p>
                </div>
            </div>
            
        </footer>
        
        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Booking</h4>
            </div>
            <div class="modal-body">
              
                <form class="modal_form" action="payment.php" method="post">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <label for="phone_no"><b>Phone No.</b></label>
                    <input type="text" placeholder="Enter phone no." name="phone_no" required>
                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Enter email" name="email" required>
                    
                    <label for="date"><b>Date</b></label>
                    <input type="text" name="arri" value="<?php $da1=$_POST['date1'];
                                                                    echo $da1;
                                                                    ?>" readonly="readonly">

                    <input type="text" name="depur" value="<?php $da2=$_POST['date2'];
                                                                    echo $da2;
                                                                    ?>" readonly="readonly">
                    
                    <label for="type"><b>Room Type</b></label>
                    <input type="text" name="typ" value="<?php $t1=$_POST['tp'];
                                                                    echo $t1;
                                                                    ?>" readonly="readonly">
                    
                    <label for="room"><b>Rooms</b></label>
                    <input type="text" name="roomno" value="<?php $r1=$_POST['rom1'];
                                                                    echo $r1;
                                                                    ?>" readonly="readonly">
                    
                    <button type="submit" name="booked">Booking</button>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
  </div>

    <?php
        if(isset($_POST['success'])){
         echo "
            <script src='https://code.jquery.com/jquery-3.4.1.js'></script>
            <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
         
            <script>
                $('#myModal').modal('show');
            </script>";
        }
        if(isset($_POST['unsuccess'])){
            echo "
            <script>
                function myFunction() {
                alert('Your Booking is Confirm.');
            }
            </script>";
        }
    ?>
        
    </body>
    <script src="./js/location.js"></script>
</html>



<?php

if(isset($_POST['sent']))
{    
    $conn=mysqli_connect("localhost","root","","hotel");
    $sql="insert into review (`name`,`email`,`phone`,`message`) values ('$_POST[na]','$_POST[email]','$_POST[phone]','$_POST[comment]')";
    $comment=mysqli_query($conn,$sql);
    echo "<script>
            alert('Message Sent Successfully')
        </script>";
        die;
    mysqli_close($conn);
}
?>