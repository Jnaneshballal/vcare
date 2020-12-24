<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    //if user not logged in
    echo "<script>window.location.href='login/login.php'; </script>";
}
$dflag = 0;
$s_query = mysqli_query($con, "SELECT * FROM service_info WHERE dflag=0 AND  uid='$global_uid'");

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
        <form method="post">
            <?php while ($get_record = mysqli_fetch_assoc($s_query)) { ?>
                <div class="col-md-5">
                    <aside class="profile-nav alt">
                        <section class="card" style="border:2px solid red;border-radius:5px;">
                            <div class="card-header user-header alt bg-dark">
                                <div class="media">
                                    <a href="#">
                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="ui/images/car.png">
                                    </a>
                                    <div class="media-body">
                                        <h2 class="text-light display-6"><?php echo $get_record['vno']; ?></h2>
                                        <p>Owner</p>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="fa fa-home"></i> Garage Name <span class="badge pull-right"><?php echo $get_record['gname']; ?></span>
                                </li>
                                <li class="list-group-item">
                                    <i class="fa fa-phone"></i> Garage Contact Number <span class="badge pull-right"><?php echo $get_record['gphone']; ?></span>
                                </li>
                                <li class="list-group-item">
                                    <i class="fa fa-calendar"></i> Service Keep Date <span class="badge pull-right"><?php echo $get_record['sdate']; ?></span>
                                </li>
                                <?php
                                if ($get_record['rstatus'] == 0) {
                                    $status = "Yet to Confirm !!";
                                } else if ($get_record['rstatus'] == 3) {
                                    $status = "Service Confirmed And Booked";
                                } else if ($get_record['rstatus'] == 1) {
                                    $status = "Service Aborted or Cancelled";
                                    $dflag = 1;
                                }
                                ?>

                                <li class="list-group-item">
                                    <i class="fa fa-home"></i> Vehicle Service Status <span class="badge pull-right" style="color:red;"><?php echo $status; ?></span>
                                </li>
                                <?php if ($dflag == 1) { ?>
                                    <li class="list-group-item">
                                        <i class="fa fa-home"></i> Service Cancellation Reason <span class="badge pull-right" style="color:red;"><?php echo $get_record['rmsg']; ?></span>
                                    </li>
                                    <?php $dflag = 0 ?>
                                <?php } ?>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="updateflag.php?sid=<?php echo $get_record['sid']; ?>">
                                        <button type="button" class="btn btn-danger mb-1 pull-right" name="del" style="border-radius:100px;">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </section>
                    </aside>
                </div>
            <?php } ?>
        </form>
    </div>
    <?php include 'ui/jslink.php' ?>
</body>

</html>