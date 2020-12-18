<?php
include '../global/garageaccesscontrol.php';
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
                About Us
              </h2>
            </b>

          </div>
        </div>

        <div>

          <h3 style="font-family:times-new-roman; color:cyan; font-size:40px">Introduction :</h3>
          <p style="font-family:times-new-roman; color:black; font-size:25px; text-align:left;">

            V-Care helps user to find the most reliable vehicle services around
            and look for mechanics near them. The user can contact the service provider or
            mechanic where they come to your doorstep or location offering a hassle-free service.<br>
            V-Care also provides the service of tracking and reminding the vehicle
            details such as PUC, Insurance expiry date, Next service etc where it frees the user
            from burden of remembering these.

          </p>
        </div>

        <div class="row md-12">
          <div class="col-md-12 text-center">

            <b>
              <h2 style="color:MediumBlue; background-color:cyan; font-family:georgia; border-radius:25px;">
                Developers
              </h2>
            </b>

          </div>
        </div>

        <div class="row md-12" style="margin-left: 30px;">
          <div class="col-md-4">
            <div class="card profile-card-2">
              <div class="card-img-block"><br>
                <img class="card-img-block" src="./ui/assets/images/d3.jpg" alt="Card image cap">
              </div>
              <div class="card-body pt-5">
                <img src="./ui/assets/images/userr3.jpg" alt="profile-image" class="profile">
                <u>
                  <h5 class="card-title">Akash Raj</h5>
                </u>
                <p class="card-text">
                  <i class="fa fa-code" aria-hidden="true"></i>Front End Developer<br>
                  <i class="fa fa-phone" aria-hidden="true"></i> : 9964588750<br>
                  <i class="fa fa-envelope-open-o" aria-hidden="true"></i> akashraj.jain2@gmail.com
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4" style="margin-left: 300px;">
            <div class="card profile-card-2">
              <div class="card-img-block"><br>
                <img class="card-img-block" src="./ui/assets/images/d3.jpg" alt="Card image cap">
              </div>
              <div class="card-body pt-5">
                <img src="./ui/assets/images/userr3.jpg" alt="profile-image" class="profile">
                <u>
                  <h5 class="card-title">Jnanesh Ballal</h5>
                </u>
                <p class="card-text">
                  <i class="fa fa-code" aria-hidden="true"></i>Back End Developer<br>
                  <i class="fa fa-phone" aria-hidden="true"></i>: 9964598422<br>
                  <i class="fa fa-envelope-open-o" aria-hidden="true"></i> jnanesh024@gmail.com
                </p>
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