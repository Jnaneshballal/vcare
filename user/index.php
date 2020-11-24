<?php
include '../global/useraccesscontrol.php';

if(!$login){
    //if user not logged in
    echo "not loggedin";
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
        <div class="content mt-3">
            <div class="col-sm-12">
                <div class="alert alert-primary" role="alert">
                    You haven't registered any vehicle <a href="add-vehicle.php" class="alert-link">"click here to Register"</a>.
                </div>
                <!-- <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
            </div>
        </div>
    </div>
    <?php include 'ui/jslink.php' ?>
</body>

</html>