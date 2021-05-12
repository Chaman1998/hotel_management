<html> 
</html>

<?php
if(isset($_POST['book']))
{
    $arri= date_create($_POST['arri']);
    $depur= date_create($_POST['depur']);
    $roomno=($_POST['roomno']);
    
    $conn=mysqli_connect("localhost","root","","hotel");
    
    #DATE COUNT
    $diff=date_diff($arri,$depur);
    $dates= $diff->format("%a");
    #===========================================
    $date = date('Y-m-d H:i:s');
    #===========================================
    
    $bok_id="SELECT booking_id from `booking` order by `booking_id` DESC limit 1";
    $bok=mysqli_query($conn,$bok_id);
    $re=mysqli_fetch_array($bok);
    $b=$re['booking_id']+1;
    
    #===========================================
        
    $sql="SELECT rooms.rent FROM `rooms` WHERE rooms.room_type= '$_POST[type]' limit 1";
    $result= mysqli_query($conn, $sql);
    $type=mysqli_fetch_array($result);
    $gst=$type[0] * (118/100);
    #===========================================
    $total=$gst * $roomno * $dates;
    #===========================================
    $rent="SELECT rent FROM `rooms` where rooms.room_type= '$_POST[type]' limit 1 ";
    $ren=mysqli_query($conn,$rent);
    $rt=mysqli_fetch_array($ren);
    $r=$rt['rent'];
    #===========================================
    $room_id="select a.room_id from booking a left outer join rooms b on a.room_id = b.room_id where b.room_id is null
UNION ALL
select a.room_id from rooms a left outer join booking b on a.room_id = b.room_id where b.room_id is null
order by `room_id` DESC limit 1";
    $rom=mysqli_query($conn,$room_id);
    $rm=mysqli_fetch_array($rom);
    $room=$rm['room_id']+1;
    echo $room;
    #===========================================
    #room select
    $sql2="
    select rooms.room_id from rooms where rooms.room_type = '".$_POST['type']."' and  rooms.room_id not in
    (
    SELECT booking.room_id FROM `booking` WHERE
    ('".$_POST['arri']."' between booking.arrival and booking.depurture)
    OR
    ('".$_POST['depur']."' between booking.arrival and booking.depurture)
    ) limit $_POST[roomno]";
    
    $result2= mysqli_query($conn,$sql2);
    
    while($row = mysqli_fetch_row($result2)){
        
        $insert="INSERT INTO `booking` (`booking_id`,`booking_date`,`name`,`phone_no`, `email`, `room_id`, `arrival`, `depurture`, `basfare`, `gst`, `total_fare`, `payment`) VALUES ('$b','$date','$_POST[name]','$_POST[phone_no]', '$_POST[email]' , '$room', '$_POST[arri]', '$_POST[depur]', '$r','$gst','$total','Paid')";
        $room=$room+1;
        if (!mysqli_query($conn, $insert)) {
            echo "Error: " . mysqli_error($conn);
        }
    }
    echo "<script>
            alert('Successfully Booked')
        </script>";
    echo '<script type="text/javascript">';
    echo 'window.location.href = "admin.html";';
    echo '</script>';
    die;
    mysqli_close($conn);
}

?>
