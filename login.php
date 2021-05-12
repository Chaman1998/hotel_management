<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <title>login page</title>
        <script type="text/javascript">
            function preventBack() { window.history.forward(); }
            setTimeout("preventBack()", 0);
            window.onunload = function () { null };
        </script>
    </head>
    
    <body>
        <div class="loginbox">
            <img src="image/login.png" class="limage">
            <h2>Log In Here</h2>
            <form action="#" method="post">
                
                <div class="inputbox">
                    <input type="text" name="username" required="">
                    <label>Username</label>
                </div>
                <div class="inputbox">
                    <input type="password" name="password" required="">
                    <label>Password</label>
                </div>
                
                <input type="Submit" name="submit" value="Submit">
                <a href="index.php" class="">Back To Home</a>
            </form>
        </div>
    </body>
</html>


<?php
if(isset($_POST['submit']))
{
$conn=mysqli_connect("localhost","root","","hotel");
mysqli_select_db($conn,"hotel");
$i=0;
$result=mysqli_query($conn,"select * from ing where username='$_POST[username]' and password='$_POST[password]'");
while($row=mysqli_fetch_array($result))
{
    $i++;
}

mysqli_close($conn);

if($i==1)
{
    header("location:admin.php");
}
else
{
    echo "Try again";
}
}
?>