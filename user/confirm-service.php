<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    //if user not logged in
    echo "<script>window.location.href='login/login.php'; </script>";
}
date_default_timezone_set('Asia/Kolkata');
$date=date("d-m-Y H:i:s");
$vid=$_GET['vid'];
$gid=$_GET['gid'];
$user_query=mysqli_query($con,"SELECT * FROM user_info WHERE uid='$global_uid'");
$user_info=mysqli_fetch_assoc($user_query);
$garage_query=mysqli_query($con,"SELECT * FROM garage WHERE gid='$gid'");
$garage_info=mysqli_fetch_assoc($garage_query);
$vehicle_query=mysqli_query($con,"SELECT * FROM vehicle_info WHERE vid='$vid'");
$vehicle_info=mysqli_fetch_assoc($vehicle_query);
$vno=$vehicle_info['vno'];
$vownername=$vehicle_info['vownername'];
$sstatus=0;
$gname=$garage_info['gname'];
$gphone=$garage_info['gphone'];
$uphone=$user_info['uphone'];
$uemail=$user_info['uemail'];
$scost=0;
if(isset($_POST['submit'])){
    $insert_service=mysqli_query($con,"INSERT INTO service_info (gid,vno,vownername,sstatus,gname,gphone,uphone,uid,sdate,uemail,scost) VALUES ('$gid','$vno','$vownername','$sstatus','$gname','$gphone','$uphone','$global_uid','$date','$uemail','$scost') ");
    if($insert_service)
    {
        $smsg="Service Booked";
    }
    else{
        $emsg="Error";
    }
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <?php include './ui/csslink.php'; ?>
</head>

<body>
    <?php include 'ui/leftbar.php'; ?>
    <div id="right-panel" class="right-panel">
        <?php include 'ui/header.php' ?>
        <div class="col-lg-6">
            <div class="card" style="border:2px solid grey;border-radius:5px;">
                <div class="card-header">
                    <strong style="color:grey;">Book Service!!</strong>
                </div>
                <?php if (isset($smsg)) { ?>
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span>
                        <?php echo $smsg ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <?php } ?>
                <?php if (isset($emsg)) { ?>
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger">Error!!</span>
                        <?php echo $emsg ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <?php } ?>
                <form action="" method="post" class="form-horizontal">
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-5"><label for="hf-email" class=" form-control-label"><b>Vehicle Number :</b></label></div>
                            <div class="col-12 col-md-5"><label id="hf-email" name="vno" class="form-control-label"><strong style="color:red;"><?php echo strtoupper($vehicle_info['vno']); ?></strong></label></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-5"><label for="hf-email" class=" form-control-label"><b>Garage Name :</b></label></div>
                            <div class="col-12 col-md-5"><label id="hf-email" name="gname" class="form-control-label"><strong style="color:red;"><?php echo $garage_info['gname']; ?></strong></label></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-5"><label for="hf-email" class=" form-control-label"><b>Contact Number :</b></label></div>
                            <div class="col-12 col-md-5"><label id="hf-email" name="gphone" class="form-control-label"><strong style="color:red;"><?php echo $garage_info['gphone']; ?></strong></label></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-5"><label for="hf-email" class=" form-control-label"><b>Garage Address :</b></label></div>
                            <div class="col-12 col-md-5"><label id="hf-email" name="gaddress" class="form-control-label"><strong style="color:red;"><?php echo $garage_info['gaddress']; ?></strong></label></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-sm mb-1 pull-right" name="submit" style="border-radius:100px;">
                            <i class="fa fa-check"> Book Service</i>
                        </button>
                        <a href="view-vehicle.php">
                            <button type="button" class="btn btn-danger btn-sm mb-1" style="border-radius:100px;">
                                <i class="fa fa-times"> Cancel</i>
                            </button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'ui/jslink.php' ?>
</body>

</html>