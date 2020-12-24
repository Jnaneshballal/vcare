<?php
include '../global/useraccesscontrol.php';
$sid=$_GET['sid']; 
$update_flag=mysqli_query($con,"UPDATE service_info SET dflag=1 WHERE sid='$sid'");
if($update_flag)
{
    echo "<script>window.location.href='service-request-status.php'; </script>";
}
else{
    echo mysqli_error($con);
}
?>