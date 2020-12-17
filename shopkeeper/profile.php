<?php
include '../global/garageaccesscontrol.php';
if (!$glogin) {
  echo "<script>window.location.href='shoplogin.php'; </script>";
}
$fetch_garage_info = mysqli_query($con, "SELECT * FROM garage WHERE gid=$global_gid");
$ginfo = mysqli_fetch_assoc($fetch_garage_info);
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

        <div class="row md-12">
          <div class="col-md-12 text-center">
            <b>
              <h2 style="color:MediumBlue; background-color:cyan; font-family:georgia; border-radius:25px;">
                Profile
              </h2>
            </b>
          </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-8">
              <div class="card profile-card-2" style="margin-left: 350px;">
                <div class="card-img-block"><br>

                  <img class="card-img-block" src="./ui/assets/images/c5.jpg" alt="Card image cap">
                </div>
                <div class="card-body pt-5">
                  <img src="./ui/assets/images/userr3.jpg" alt="profile-image" class="profile">
                  <h5 class="card-title"><?php echo $ginfo['gname']; ?></h5>
                  <p class="card-text">
                  <?php echo $ginfo['goname']; ?><br>
                    <?php echo $ginfo['gphone']; ?><br>
                  <?php echo $ginfo['gemail']; ?><br>
                  <?php echo $ginfo['gaddress'];?>,<?php echo $ginfo['gcity']; ?><br>
                </p>
                </div>
              </div>
            </div>
          <!--start overlay-->
          <div class="overlay toggle-menu"></div>
          <!--end overlay-->
          <!--End row 1-->
        </div>
        <!-- End container-fluid-->
      </div>
      <!--End content-wrapper-->
    </div>
    <!--End wrapper-->

    <!--js links-->
    <?php include './ui/jslink.php'; ?>


</body>

</html>