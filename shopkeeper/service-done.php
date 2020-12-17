<?php
include '../global/garageaccesscontrol.php';
if (!$glogin) {
    echo "<script>window.location.href='shoplogin.php'; </script>";
}
if (isset($_POST['done'])) {
    $sid = $_GET['sid'];
    $scost = $_POST['scost'];
    if ($scost == "") {
        $emsg = "Pleace enter the cost!!";
    } else {
        $update_service = mysqli_query($con, "UPDATE service_info SET sstatus=1,scost='$scost' where sid='$sid'");
        if ($update_service) {
            $smsg = "Success";
            header("refresh:1;url=customer.php");
        } else {
            $emsg = "Error!!";
        }
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
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row md-12">
                    <div class="col-md-4">
                        <div class="card profile-card-2">
                            <div class="card-img-block"><br>
                                <img class="card-img-block" src="./ui/assets/images/c1.png" alt="Card image cap">
                            </div>
                            <div class="card-body pt-5">
                                <img src="./ui/assets/images/c2.png" alt="profile-image" class="profile">
                                <?php if (isset($emsg)) {
                                    echo $emsg;
                                }
                                ?>
                                <?php if (isset($smsg)) {
                                    echo $smsg;
                                }
                                ?>
                                <hr width="100%">
                                <!-- <u>
                                    <h5 class="card-title">Customer Info<i class="fa fa-info"></i></h5>
                                </u> -->
                                <form method="POST">
                                    <div class="form-group">
                                        <!-- <label for="exampleInputName" class="sr-only">Garage Name</label> -->
                                        <div class="position-relative has-icon-right">
                                            <input type="text" class="form-control input-shadow" placeholder="Enter Service Cost" name="scost">
                                            <div class="form-control-position">
                                                <i class="icon-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-block">
                                        <button type="submit" class="btn btn-light btn-block waves-effect waves-light" name="done">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--End wrapper-->

    <!--js links-->
    <?php include './ui/jslink.php'; ?>


</body>

</html>