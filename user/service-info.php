<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    //if user not logged in
    echo "<script>window.location.href='login/login.php'; </script>";
}
$s_query=mysqli_query($con,"SELECT * FROM service_info WHERE uid='$global_uid'");
$s_info=mysqli_fetch_assoc($s_query);
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
            <section class="card" style="border:2px solid skyblue;border-radius:5px;">
                <div class="twt-feed blue-bg">
                    <!-- <div class="corner-ribon black-ribon">
                        <i class="fa fa-twitter"></i>
                    </div>
                    <div class="fa fa-twitter wtt-mark"></div> -->

                    <div class="media">
                        <a href="#">
                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="ui/images/car.png">
                        </a>
                        <div class="media-body">
                            <h2 class="text-white display-6"><?php echo strtoupper($s_info['vno']);?></h2>
                            <p class="text-light">Owner</p>
                        </div>
                    </div>
                </div>
                <div class="weather-category twt-category">
                    
                </div>
                <div class="twt-write col-sm-12">
                    <textarea placeholder="Write your Tweet and Enter" rows="1" class="form-control t-text-area"></textarea>
                </div>
                <footer class="twt-footer">
                    <!-- <a href="#"><i class="fa fa-camera"></i></a>
                    <a href="#"><i class="fa fa-map-marker"></i></a>
                    New Castle, UK -->
                    <!-- <span class="pull-right">
                        32
                    </span> -->
                </footer>
            </section>
        </div>
    </div>
    <?php include 'ui/jslink.php' ?>
</body>

</html>