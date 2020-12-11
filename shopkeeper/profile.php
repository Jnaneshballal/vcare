<?php
include '../global/garageaccesscontrol.php';
// if (!$gologin) {
//   echo "<script>window.location.href='shoplogin.php'; </script>";
// }
$fetch_ginfo = mysqli_query($con, "SELECT * FROM garageowner WHERE goid=$global_goid");
$ginfo = mysqli_fetch_assoc($fetch_ginfo);

$fetch_ginfotwo = mysqli_query($con, "SELECT * FROM garage WHERE gouid=$global_goid");
// $ginfotwo = mysqli_fetch_assoc($fetch_ginfotwo);
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

            <h2 style="color:MediumBlue">Profile</h2>

          </div>
        </div>



        <div class="row mt-3">
          <div class="col-lg-4">
            <div class="card profile-card-2">
              <div class="card-img-block"><br>

                <img class="card-img-block" src="./ui/assets/images/c5.jpg" alt="Card image cap">
              </div>
              <div class="card-body pt-5">
                <img src="./ui/assets/images/userr3.jpg" alt="profile-image" class="profile">
                <h5 class="card-title"><?php echo $ginfo['goname']; ?></h5>
                <p class="card-text"><?php echo $ginfo['gophone']; ?><br><?php echo $ginfo['goemail']; ?> </p>
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
          <!--End row 1-->
        </div>

        <div class="row md-12">
          <div class="col-md-12 text-center">

            <h2 style="color:MediumBlue">Garages</h2>

          </div>
        </div>

        <div class="row md-12">
        <?php while ($ginfotwo = mysqli_fetch_assoc($fetch_ginfotwo)) {

        ?>
          
            <div class="col-md-4">
              <div class="card profile-card-2">
                <div class="card-img-block"><br>

                  <img class="card-img-block" src="./ui/assets/images/c1.png" alt="Card image cap">
                </div>
                <div class="card-body pt-5">
                  <img src="./ui/assets/images/c2.png" alt="profile-image" class="profile">
                  <h5 class="card-title"><?php echo $ginfotwo['gname']; ?></h5> 
                  <p class="card-text"><?php echo $ginfotwo['gaddress']; ?><br><?php echo $ginfotwo['gphone']; ?><br><?php echo $ginfotwo['gemail']; ?> </p>
                  <div class="icon-block">
                    <a href="javascript:void();"><i class="fa fa-facebook bg-facebook text-white"></i></a>
                    <a href="javascript:void();"> <i class="fa fa-twitter bg-twitter text-white"></i></a>
                    <a href="javascript:void();"> <i class="fa fa-google-plus bg-google-plus text-white"></i></a>
                  </div>
                </div>
              </div>

            </div>
          <?php } ?>
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