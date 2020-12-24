<?php
include '../global/garageaccesscontrol.php';
if (!$glogin) {
    echo "<script>window.location.href='shoplogin.php'; </script>";
}
$request_query = mysqli_query($con, "SELECT * FROM service_info WHERE gid='$global_gid' AND rstatus=0");
if (isset($_POST['accept'])) {
    $accept_query = mysqli_query($con, "UPDATE service_info SET rstatus=1");
    if ($accept_query) {
        $smsg = "Vehicle Accepted";
    }
}
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
            <div class="container-fluid">
                <form method="POST">
                    <div class="row md-12">
                        <?php while ($get_rows = mysqli_fetch_assoc($request_query)) {
                            $uid = $get_rows['uid'];
                            $user_query = mysqli_query($con, "SELECT * FROM user_info WHERE uid='$uid'");
                            $user_info = mysqli_fetch_assoc($user_query);
                        ?>

                            <div class="col-md-5">
                                <div class="card profile-card-2">
                                    <div class="card-img-block"><br>

                                        <img class="card-img-block" src="./ui/assets/images/c1.png" alt="Card image cap">
                                    </div>
                                    <div class="card-body pt-5">
                                        <img src="./ui/assets/images/c2.png" alt="profile-image" class="profile">
                                        <u>
                                            <h5 class="card-title">Customer Info</h5>
                                        </u>
                                        <p class="card-text">
                                            <font style="color:white;">Customer Name</font> : <?php echo $get_rows['vownername']; ?><br>
                                            <font style="color:white;">Vehicle Number</font> : <?php echo $get_rows['vno']; ?><br>
                                            <font style="color:white;">Customer Phone</font> : <?php echo $get_rows['uphone']; ?><br>
                                            <font style="color:white;">Service Request Date</font> : <?php echo $get_rows['sdate']; ?><br>
                                            <font style="color:white;">Customer Address </font> : <?php echo $user_info['uaddress']; ?><br>
                                            <font style="color:white;">Door Pick-up </font> : <?php echo $get_rows['dpick']; ?><br>
                                            <font style="color:white;">Door Drop </font> : <?php echo $get_rows['ddrop']; ?><br>
                                        </p>
                                        <a href="accept-service.php?sid=<?php echo $get_rows['sid']; ?>">
                                            <div class="icon-block">
                                                <button type="button" class="btn btn-light btn-block waves-effect waves-light" name="accept" style="border-radius:50px;">Accept</button>
                                            </div>
                                        </a>
                                        <a href="reject-service.php?sid=<?php echo $get_rows['sid']; ?>">
                                            <div class="icon-block">
                                                <button type="button" class="btn btn-danger btn-block waves-effect waves-light" name="reject" style="border-radius:50px;">Reject</button>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        <?php } ?>

                    </div>
                </form>





                <!--start overlay-->
                <!-- <div class="overlay toggle-menu"></div> -->
                <!--end overlay-->

            </div>
            <!-- End container-fluid-->

        </div>


    </div>
    <!--End wrapper-->

    <!--js links-->
    <?php include './ui/jslink.php'; ?>


</body>

</html>