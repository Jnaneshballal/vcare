<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    //if user not logged in
    echo "<script>window.location.href='login/login.php'; </script>";
}
$vehicle_query = mysqli_query($con, "SELECT * FROM vehicle_info WHERE vuid='$global_uid'");
$v_count = mysqli_num_rows($vehicle_query);
$vehicle = false;
if ($v_count >= 1) {
    $vehicle = false;
} else {
    $vehicle = true;
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
                <?php if ($vehicle) { ?>
                    <div class="alert alert-primary" role="alert">
                        You haven't registered any vehicle <a href="add-vehicle.php" class="alert-link">"click here to Register"</a>.
                    </div>
                <?php } ?>
                <?php if (!$vehicle) {
                    $fetch_info = mysqli_query($con, "SELECT * FROM vehicle_info WHERE vuid=$global_uid");
                    // $count=mysqli_num_rows($fetch_info);
                    
                    while ($info = mysqli_fetch_assoc($fetch_info)) {
                ?>
                        <div class="col-md-4">
                            <aside class="profile-nav alt">
                                <section class="card">
                                    <div class="card-header user-header alt bg-dark">
                                        <div class="media">
                                            <a href="#">
                                                <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="ui/images/admin.jpg">
                                            </a>
                                            <div class="media-body">
                                                <h2 class="text-light display-6"><?php echo $info['vmodel'];?></h2>
                                                <p><?php echo $info['vno'];?></p>
                                            </div>
                                        </div>
                                    </div>


                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <i class="fa fa-user"></i> Owner Name <span class="badge pull-right"><?php echo $info['vownername'];?></span>
                                        </li>
                                        <li class="list-group-item">
                                             <i class="fa fa-calendar"></i> Emission Expire Date <span class="badge badge-danger pull-right"><?php echo $info['vemissionexdate'];?></span>
                                        </li>
                                        <li class="list-group-item">
                                             <i class="fa fa-calendar"></i> Insurance Expire Date <span class="badge badge-danger pull-right"><?php echo $info['vinsureexdate'];?></span>
                                        </li>
                                        <!-- <li class="list-group-item">
                                             <i class="fa fa-comments-o"></i> Message <span class="badge badge-warning pull-right r-activity">03</span>
                                        </li> -->
                                    </ul>

                                </section>
                            </aside>
                        </div>
                <?php }
                } ?>
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