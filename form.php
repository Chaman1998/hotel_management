<?php

if(isset($_POST['button']))
{
    $rom=$_POST['room'];
    $conn=mysqli_connect("localhost","root","","hotel");

    $sql="select rooms.room_id from rooms where rooms.room_type = '".$_POST['type']."' and  rooms.room_id not in
    (
	SELECT booking.room_id FROM `booking` WHERE
		('".$_POST['d1']."' between booking.arrival and booking.depurture)
			OR
		('".$_POST['d2']."' between booking.arrival and booking.depurture)
        )";
    
    $result= mysqli_query($conn,$sql);
    $count= mysqli_num_rows($result);
    echo "Checking......";
    if($count >= $rom){
        
        echo "
        <script src='https://code.jquery.com/jquery-3.4.1.js'  crossorigin='anonymous'></script>
        <script src='https://cdn.jsdelivr.net/npm/jquery.redirect@1.1.4/jquery.redirect.js'></script>
        <script>
            $.redirect('index.php', {'success': 'true', 'date1': '$_POST[d1]', 'date2': '$_POST[d2]', 'tp': '$_POST[type]', 'rom1': '$_POST[room]',});
        </script>";
        die;
    }
    else {
        echo '<script language="javascript">';
        echo 'alert("Not enough room")';
        echo '</script>';
        echo "<script>setTimeout(\"location.href = 'index.php';\",0);</script>";
    }
    mysqli_close($conn);
}

?>