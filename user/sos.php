<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    echo "<script>window.location.href='login/login.php'; </script>";
}
if (isset($_POST['search'])) {
    $city = $_POST['city'];
    $get_garage = mysqli_query($con, "SELECT * FROM  garage WHERE gcity='$city'");
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
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <strong><i class="fa fa-phone"> S O S</i></strong> Helpline..
                </div>
                <div class="card-body card-block">
                    <form method="POST" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <p>Enter the near by city to get faster Access ...</p>
                                <div class="input-group">
                                    <input type="text" placeholder="City" class="form-control" name="city">
                                    <div class="input-group-btn"><button class="btn btn-primary" type="submit" name="search"><i class="fa fa-search"> Search</i></button></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php while ($garage = mysqli_fetch_assoc($get_garage)) { ?>
            <div class="col-sm-12 mb-4">
                <div class="card-group" >
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body" style="border:2px solid red;border-radius:5px;">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="fa fa-home"></i></i>
                            </div>

                            <div class="h4 mb-0">
                                <span><?php echo $garage['gname']; ?></span>
                            </div>

                            <small class="text-muted font-weight-bold">|<i class="fa fa-phone"></i>| <?php echo $garage['gphone']; ?></small><br>
                            <small class="text-muted font-weight-bold">|<i class="fa fa-home"></i>| <?php echo $garage['gaddress']; ?></small>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php include 'ui/jslink.php' ?>

</body>

</html>