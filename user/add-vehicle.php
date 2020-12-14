<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    header("url=./login.php");
}
if (isset($_POST['success'])) {
    $vownername = $_POST['vownername'];
    $vno = $_POST['vno'];
    $vengineno = $_POST['vengineno'];
    $vchassino = $_POST['vchassino'];
    $vmodel = $_POST['vmodel'];
    $vemissionexdate = $_POST['vemissionexdate'];
    $vinsureexdate = $_POST['vinsureexdate'];
    $v_check = mysqli_query($con, "SELECT * FROM vehicle_info WHERE vno='$vno'");
    $v_count=mysqli_num_rows($v_check);
    if ($v_count >= 1) {
        $emsg = "Vehicle Already Registered!!";
    } else {
        $query = mysqli_query($con, "INSERT INTO vehicle_info(vuid,vownername,vno,vengineno,vchassino,vmodel,vemissionexdate,vinsureexdate)VALUES('$global_uid','$vownername','$vno','$vengineno','$vchassino','$vmodel','$vemissionexdate','$vinsureexdate')");
        if ($query) {
            $smsg = "Vehicle Registered";
        } else {
            $emsg = mysqli_error($con);
        }
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
            <div class="card">
                <div class="card-header">
                    <strong>Vehicle Registration</strong>
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
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="vownername" placeholder="owner name" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Vehicle Number</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="email-input" name="vno" placeholder="eg : KA-19-MG-2019" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Engine Number</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="vengineno" placeholder="engine no." class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Chassis Number</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="vchassino" placeholder="chassies no." class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Car Model/Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="vmodel" placeholder="eg : SUV/Brezza " class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Emission Expire Date</label></div>
                            <div class="col-12 col-md-9"><input type="Date" id="password-input" name="vemissionexdate" placeholder="date" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Insurance Expire Date</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="text-input" name="vinsureexdate" placeholder="date" class="form-control"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm" name="success">
                            <i class="fa fa-dot-circle-o"></i> Register
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'ui/jslink.php' ?>
</body>

</html>