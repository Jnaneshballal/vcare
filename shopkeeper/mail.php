<?php
include '../global/useraccesscontrol.php';
$sid=$_GET['sid'];
$user_info_query = mysqli_query($con, "SELECT * FROM service_info WHERE sid='$sid'");
$user_info_row = mysqli_fetch_assoc($user_info_query);
$uid = $user_info_row['uid'];
$user_query = mysqli_query($con, "SELECT * FROM user_info WHERE uid='$uid'");
$user_row = mysqli_fetch_assoc($user_query);
$vno = $user_info_row['vno'];
$gname = $user_info_row['gname'];
$uname = $user_info_row['vownername'];
$scost = $user_info_row['scost'];
$to_email = $user_row['uemail'];
$subject="Service Done Response";
$message = "Hello $uname , The service of the following detailed vehicle is done.
Vehicle Number :" .$vno."
Garage Name : " .$gname."
Service Cost : ".$scost." ";
$headers = "From:vehiclecare7@gmail.com";
mail($to_email, $subject, $message, $headers);
echo "<script>window.location.href='customer.php'; </script>";
?>