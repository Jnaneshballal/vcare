<?php
include '../global/garageaccesscontrol.php';
if (!$glogin) {
    echo "<script>window.location.href='shoplogin.php'; </script>";
}
$service_query = mysqli_query($con, "SELECT * FROM service_info WHERE gid='$global_gid'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './ui/csslink.php'; ?>
</head>

<body class="bg-theme bg-theme1">

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
        <?php include './ui/sidebar.php'; ?>
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        <?php include './ui/topbar.php'; ?>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <?php while ($service_info = mysqli_fetch_assoc($service_query)) { ?>
                <div class="container-fluid">
                    <div class="row md-12">
                        <div class="col-md-4">
                            <div class="card profile-card-2">
                                <div class="card-img-block"><br>

                                    <img class="card-img-block" src="./ui/assets/images/c1.png" alt="Card image cap">
                                </div>
                                <div class="card-body pt-5">
                                    <img src="./ui/assets/images/c2.png" alt="profile-image" class="profile">
                                    <u>
                                        <h5 class="card-title">Customer Info<i class="fa fa-info"></i></h5>
                                    </u>
                                    <p class="card-text">
                                        <font style="color:white;">Customer Name</font> : <?php echo $service_info['vownername']; ?><br>
                                        <font style="color:white;">Vehicle Number</font> : <?php echo $service_info['vno']; ?><br>
                                        <font style="color:white;">Customer Phone</font> : <?php echo $service_info['uphone']; ?><br>
                                        <font style="color:white;">Customer Name</font> : <?php echo $service_info['vownername']; ?>
                                    </p>
                                    <a href="service-done.php?sid=<?php echo $service_info['sid']; ?>">
                                        <div class="icon-block">
                                            <button type="button" class="btn btn-light btn-block waves-effect waves-light" name="done">Service Done</button>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php include './ui/jslink.php'; ?>
</body>

</html>