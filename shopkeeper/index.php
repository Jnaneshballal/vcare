<?php
include '../global/garageaccesscontrol.php';
if (!$glogin) {
  echo "<script>window.location.href='shoplogin.php'; </script>";
}
$fetch_ginfo = mysqli_query($con, "SELECT * FROM garage WHERE gid='$global_gid'");
$ginfo = mysqli_fetch_assoc($fetch_ginfo) ;
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
            <h2>Wellcome to VCare</h2>
          </div>
        </div>

        

        <div class="row mt-3">
          <div class="col-lg-4">
            <div class="card profile-card-2">
              <div class="card-img-block"><br>

                <img class="card-img-block" src="./ui/assets/images/c1.png" alt="Card image cap">
              </div>
              <div class="card-body pt-5">
                <img src="./ui/assets/images/c2.png" alt="profile-image" class="profile">
                <h5 class="card-title"><?php echo "$global_gname" ?></h5>
                <p class="card-text"><?php echo $ginfo['gaddress']; ?><br><?php echo $ginfo['gphone']; ?><br><?php echo $ginfo['gemail']; ?> </p>
                <div class="icon-block">
                  <a href="javascript:void();"><i class="fa fa-facebook bg-facebook text-white"></i></a>
                  <a href="javascript:void();"> <i class="fa fa-twitter bg-twitter text-white"></i></a>
                  <a href="javascript:void();"> <i class="fa fa-google-plus bg-google-plus text-white"></i></a>
                </div>
              </div>
            </div>

          </div>

          <!--start overlay-->
          <div class="overlay toggle-menu"></div>
          <!--end overlay-->

        </div>
        <!-- End container-fluid-->

      </div>
      <!--End content-wrapper-->
      <!--Start Back To Top Button-->
      <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
      <!--End Back To Top Button-->

      <!--Start footer-->
      <!-- <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 Dashtreme Admin
        </div>
      </div>
    </footer> -->
      <!--End footer-->

      <!--start color switcher-->
      <!-- <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div> -->
      <!--end color switcher-->

    </div>
    <!--End wrapper-->

    <!--js links-->
    <?php include './ui/jslink.php'; ?>


</body>

</html>