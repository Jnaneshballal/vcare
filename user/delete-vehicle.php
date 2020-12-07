<?php 
include '../global/useraccesscontrol.php';

if (isset($_POST['vid'])) {
    $vno = $_POST['vid'];
    $del_query = mysqli_query($con, "DELETE from vehicle_info WHERE vid='$vno'");
    if ($del_query) {
        $smsg = "Vehicle Deleted";
        header("refresh:1;url=view-vehicle.php");
    } else {
        $emsg = "Error!!";
    }
}

?>