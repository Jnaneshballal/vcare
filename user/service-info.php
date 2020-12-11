<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    //if user not logged in
    echo "<script>window.location.href='login/login.php'; </script>";
}
$s_query = mysqli_query($con, "SELECT * FROM service_info WHERE uid='$global_uid'");

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
        <?php while ($s_info = mysqli_fetch_assoc($s_query)) { ?>
            <div class="col-md-4">
                <aside class="profile-nav alt">
                    <section class="card" style="border:2px solid red;border-radius:5px;">
                        <div class="card-header user-header alt bg-dark">
                            <div class="media">
                                <a href="#">
                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="ui/images/car.png">
                                </a>
                                <div class="media-body">
                                    <h2 class="text-light display-6"><?php echo $s_info['vno']; ?></h2>
                                    <p>Owner</p>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="fa fa-home"></i> Garage Name <span class="badge pull-right"><?php echo $s_info['gname']; ?></span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-phone"></i> Garage Contact Number <span class="badge pull-right"><?php echo $s_info['gphone']; ?></span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-phone"></i> Service Keep Date <span class="badge pull-right"><?php echo $s_info['sdate']; ?></span>
                            </li>
                            <?php if ($s_info['sstatus'] == "0") {
                                $status = "Under Service";
                            } else {
                                $sstatus = "Service Done Vehicle Ready to collect.";
                            }
                            ?>
                            <?php if (isset($status)) { ?>
                                <li class="list-group-item">
                                    <i class="fa fa-clock-o"></i> Vehicle Status <span class="badge pull-right" style="color:red;"><?php echo $status; ?></span>
                                </li>
                            <?php } ?>
                            <?php if (isset($sstatus)) { ?>
                                <li class="list-group-item">
                                    <i class="fa fa-home"></i> Vehicle Status <span class="badge pull-right" style="color:green;"><?php echo $sstatus; ?></span>
                                </li>
                            <?php } ?>
                        </ul>
                    </section>
                </aside>
            </div>
        <?php } ?>
    </div>
    <?php include 'ui/jslink.php' ?>
</body>

</html>