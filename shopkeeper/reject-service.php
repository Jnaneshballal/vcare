<?php
include '../global/garageaccesscontrol.php';
if(isset($_POST['rmsg'])){
    $sid=$_GET['sid'];
    $rmsg=$_POST['rmsg'];
    $update_reject_query=mysqli_query($con,"UPDATE service_info SET rmsg='$rmsg',rstatus=1 WHERE sid='$sid'");
    if($update_reject_query)
    {
        echo "<script>window.location.href='service-request.php';</script>";
    }
    else{
        echo mysqli_error($con);
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
                        <div class="col-md-5">
                            <div class="card profile-card-2">
                                <!-- <div class="card-img-block"><br>
                                    <img class="card-img-block" src="./ui/assets/images/c1.png" alt="Card image cap">
                                </div> -->
                                <div class="card-body pt-5">
                                    <!-- <img src="./ui/assets/images/c2.png" alt="profile-image" class="profile">-->
                                    
                                        <h5 class="card-title">Reject Service</h5>
                                   
                                    <p class="card-text">
                                        <div class="form-group">
                                            <label for="exampleInputEmailId" class="sr-only">Reject Message</label>
                                            <div class="position-relative has-icon-right">
                                                <textarea id="exampleInputEmailId" height="50" class="form-control input-shadow" placeholder="Enter reason for rejection" name="rmsg" required="true"></textarea>
                                                <div class="form-control-position">
                                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shop-window" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </p>

                                    <div class="icon-block">
                                        <button type="submit" class="btn btn-danger btn-block waves-effect waves-light" name="reject" style="border-radius:50px;">Reject</button>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>
                </form>
            </div>
            <!-- End container-fluid-->

        </div>


    </div>
    <!--End wrapper-->

    <!--js links-->
    <?php include './ui/jslink.php'; ?>


</body>

</html>