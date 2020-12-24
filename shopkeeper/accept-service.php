<?php
include '../global/garageaccesscontrol.php'; 
$sid=$_GET['sid'];
$user_info_query=mysqli_query($con,"SELECT * FROM service_info WHERE sid='$sid'");
$user_info_row=mysqli_fetch_assoc($user_info_query);
$uid=$user_info_row['uid'];
$user_query=mysqli_query($con,"SELECT * FROM user_info WHERE uid='$uid'");
$user_row=mysqli_fetch_assoc($user_query);
$to_email=$user_row['uemail'];
$uname=$user_info_row['vownername'];
$gname=$user_info_row['gname'];
$update_service=mysqli_query($con,"UPDATE service_info SET rstatus=3 WHERE sid='$sid'");
if($update_service)
{
    $subject="Service Response";
    $message="Hello, $uname your Service Request has Been Accepted by $gname";
    $headers="From:vehiclecare7@gmail.com";
    mail($to_email,$subject,$message,$headers);
    echo "<script>window.location.href='customer.php';</script>";
}
else{
    echo mysqli_error($con);
}
?>