<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    echo "<script>window.location.href='login/login.php'; </script>";
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
        <div class="col-md-4">
            <div class="card" style="border:2px solid black;border-radius:5px;">
                <div class="card-header">
                    <strong class="card-title mb-3">Developer</strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <img class="rounded-circle mx-auto d-block" src="ui/images/admin.jpg" alt="Card image cap">
                        <h5 class="text-sm-center mt-2 mb-1">Jnanesh Ballal</h5>
                        <div class="location text-sm-center"><i class="fa fa-map-marker"></i> Mangalore</div>
                    </div>
                    <hr width="100%" color="black">
                    <div class="card-text text-sm-center">
                        <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                        <a href="#"><i class="fa fa-instagram pr-1"></i></a>
                        <a href="#"><i class="fa fa-google pr-1"></i></a>
                        <a href="#"><i class="fa fa-github pr-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="border:2px solid black;border-radius:5px;">
                <div class="card-header">
                    <strong class="card-title mb-3">Developer</strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <img class="rounded-circle mx-auto d-block" src="ui/images/admin.jpg" alt="Card image cap">
                        <h5 class="text-sm-center mt-2 mb-1">Akash Raj</h5>
                        <div class="location text-sm-center"><i class="fa fa-map-marker"></i> Mangalore</div>
                    </div>
                    <hr width="100%" color="black">
                    <div class="card-text text-sm-center">
                        <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                        <a href="#"><i class="fa fa-instagram pr-1"></i></a>
                        <a href="#"><i class="fa fa-google pr-1"></i></a>
                        <a href="#"><i class="fa fa-github pr-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'ui/jslink.php' ?>
</body>

</html>