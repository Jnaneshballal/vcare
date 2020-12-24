<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    //if user not logged in
    echo "<script>window.location.href='login/login.php'; </script>";
}
$s_query = mysqli_query($con, "SELECT * FROM service_info WHERE uid='$global_uid' AND rstatus=3");

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
            <div class="col-md-5">
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
                                <i class="fa fa-calendar"></i> Service Keep Date <span class="badge pull-right"><?php echo $s_info['sdate']; ?></span>
                            </li>
                            <?php if ($s_info['sstatus'] == "0") {
                                $status = "Under Service";
                            }
                            if ($s_info['sstatus'] == "1") {
                                $status = "Service Done Vehicle Ready to collect.";
                            }
                            if ($s_info['sstatus'] == "3") {
                                $status = "Vehicle Delivered..";
                            }
                            ?>
                            <?php if (isset($status)) { ?>
                                <li class="list-group-item">
                                    <i class="fa fa-home"></i> Vehicle Status <span class="badge pull-right" style="color:red;"><?php echo $status; ?></span>
                                </li>
                            <?php } ?>
                            <li class="list-group-item">
                                <i class="fa fa-phone"></i> Service Cost <span class="badge pull-right"><?php echo $s_info['scost']; ?></span>
                            </li>
                            <li class="list-group-item">
                                <span style="color:red;"><i class="fa fa-info"></i>) You can make payment offline or online</span>
                                <a href="payment.php?sid=<?php echo $s_info['sid']; ?>">
                                    <button type="button" class="btn btn-primary mb-1 pull-right" data-toggle="modal" data-target="#mediumModal" style="border-radius:100px;" onclick="delvehicle(this)">
                                        <i class="fa fa-money"> Pay</i>
                                    </button>
                                </a>
                            </li>
                        </ul>
                    </section>
                </aside>
            </div>
        <?php } ?>
    </div>
    <?php include 'ui/jslink.php' ?>
</body>

</html>