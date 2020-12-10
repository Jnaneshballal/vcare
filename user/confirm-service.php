<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    //if user not logged in
    echo "<script>window.location.href='login/login.php'; </script>";
}
$gid = $_GET['gid'];
$vid = $_GET['vid'];
$gquery = mysqli_query($con, "SELECT * FROM garage WHERE gid='$gid'");
$g_info = mysqli_fetch_assoc($gquery);
$vquery = mysqli_query($con, "SELECT * FROM vehicle_info WHERE vid='$vid'");
$v_info = mysqli_fetch_assoc($vquery);
if(isset($_POST['submit'])){

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
                <div class="card-body card-block">
                    <form action="" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-5"><label for="hf-email" class=" form-control-label"><b>Vehicle Number :</b></label></div>
                            <div class="col-12 col-md-5"><label id="hf-email" name="vno" class="form-control-label"><strong style="color:red;"><?php echo strtoupper($v_info['vno']); ?></strong></label></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-5"><label for="hf-email" class=" form-control-label"><b>Garage Name :</b></label></div>
                            <div class="col-12 col-md-5"><label id="hf-email" name="gname" class="form-control-label"><strong style="color:red;"><?php echo $g_info['gname']; ?></strong></label></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-5"><label for="hf-email" class=" form-control-label"><b>Contact Number :</b></label></div>
                            <div class="col-12 col-md-5"><label id="hf-email" name="gphone" class="form-control-label"><strong style="color:red;"><?php echo $g_info['gphone']; ?></strong></label></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-5"><label for="hf-email" class=" form-control-label"><b>Garage Address :</b></label></div>
                            <div class="col-12 col-md-5"><label id="hf-email" name="gaddress" class="form-control-label"><strong style="color:red;"><?php echo $g_info['gaddress']; ?></strong></label></div>
                        </div>

                    </form>
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
            </div>
        </div>
    </div>
    <?php include 'ui/jslink.php' ?>
</body>

</html>