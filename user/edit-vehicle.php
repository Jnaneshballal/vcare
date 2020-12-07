<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    echo "<script>window.location.href='login/login.php'; </script>";
}
$vid = $_GET['vid'];
$v_query = mysqli_query($con, "SELECT * FROM vehicle_info WHERE vid='$vid'");
$v_info = mysqli_fetch_assoc($v_query);
if(isset($_POST['update'])){
    $vownername = $_POST['vownername'];
    $vmodel = $_POST['vmodel'];
    $vemissionexdate = $_POST['vemissionexdate'];
    $vinsureexdate = $_POST['vinsureexdate'];
    $up_query=mysqli_query($con,"UPDATE vehicle_info SET vownername='$vownername',vmodel='$vmodel',vemissionexdate='$vemissionexdate',vinsureexdate='$vinsureexdate' WHERE vid='$vid'");
    if($up_query){
        $smsg="Details Successfully Upgraded";
        header("refresh:1;url=view-vehicle.php");
    }
    else{
        $emsg="Error!!";
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
            <div class="card"  style="border:2px solid red;border-radius:5px;">
                <div class="card-header">
                    <h2>Edit Vehicle</h2>
                </div>
                <form method="POST" class="form-horizontal">
                    <div class="card-body card-block">
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
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Vehicle Owner Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="vownername" class="form-control" value="<?php echo $v_info['vownername']; ?>"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Vehicle Number</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="email-input" name="vno" class="form-control" value="<?php echo $v_info['vno']; ?>"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Engine Number</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="vengineno" class="form-control" value="<?php echo $v_info['vengineno']; ?>"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Chassis Number</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="vchassino" class="form-control" value="<?php echo $v_info['vchassino']; ?>"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Car Model/Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="vmodel" class="form-control" value="<?php echo $v_info['vmodel']; ?>"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Emission Expire Date</label></div>
                            <div class="col-12 col-md-9"><input type="Date" id="password-input" name="vemissionexdate" class="form-control" value="<?php echo $v_info['vemissionexdate']; ?>"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Insurance Expire Date</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="text-input" name="vinsureexdate" class="form-control" value="<?php echo $v_info['vinsureexdate']; ?>"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning btn-sm" name="update" style="border-radius:50px;">
                            <i class="fa fa-edit"></i> Update
                        </button>
                        <i class="fa fa-info" style="color:red;"><span> Edit the details and press the button 'Upgrade' to save upgrades!!</span></i>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'ui/jslink.php' ?>
</body>

</html>