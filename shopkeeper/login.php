<?php
include_once 'global/garageaccesscontrol.php';
session_start();
if(isset($_POST['glogin'])){
    $gname=$_POST['gname'];
    $gpassword=$_POST['gpassword'];
    $gquery=mysqli_query($con,"SELECT * FROM garage WHERE (gname='$gname' OR gemail='$gname') AND gpassword='$gpassword' ");
    $gcount=mysqli_num_rows($gquery);
    $ginfo=mysqli_fetch_assoc($gquery);
    if($gcount>=1){
        $_SESSION['gid']=$ginfo['gid'];
        $_SESSION['gname']=$ginfo['gname'];
        $gsmsg="Login success!! Redirecting in 1 second...";
        header("refresh:1;url=index.php");
    }else{
        $gemsg="Error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'ui/csslink.php'; ?>
</head>

<body class="bg-theme bg-theme1">
    <!-- Start wrapper-->
    <div id="wrapper">
        <!--End topbar header-->
        <div class="card card-authentication1 mx-auto my-5">
            <div class="card-body">
                <div class="card-content p-2">
                    <div class="text-center">
                        <img src="assets/images/logo-icon.png" alt="logo icon">
                    </div>
                    <div class="card-title text-uppercase text-center py-3">Sign In</div>
                    <hr width="100%">
                    <form method="POST">
                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Username</label>
                            <div class="position-relative has-icon-right">
                                <input type="text" id="exampleInputUsername" name="gname" class="form-control input-shadow" placeholder="Enter Username">
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword" class="sr-only">Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" id="exampleInputPassword" name="gpassword" class="form-control input-shadow" placeholder="Enter Password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-row">
                            <div class="form-group col-6">
                                <div class="icheck-material-white">
                                    <input type="checkbox" id="user-checkbox" checked="">
                                    <label for="user-checkbox">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group col-6 text-right">
                                <a href="reset-password.html">Reset Password</a>
                            </div>
                        </div> -->
                        <button type="submit" name="glogin" class="btn btn-light btn-block">Sign In</button>
                        <!-- <div class="text-center mt-3">Sign In With</div>

                        <div class="form-row mt-4">
                            <div class="form-group mb-0 col-6">
                                <button type="button" class="btn btn-light btn-block"><i class="fa fa-facebook-square"></i> Facebook</button>
                            </div>
                            <div class="form-group mb-0 col-6 text-right">
                                <button type="button" class="btn btn-light btn-block"><i class="fa fa-twitter-square"></i> Twitter</button>
                            </div>
                        </div> -->

                    </form>
                </div>
            </div>
            <div class="card-footer text-center py-3">
                <p class="text-warning mb-0">Do not have an account? <a href="register.php"> Sign Up here</a></p>
            </div>
        </div>
    </div>
    <?php include 'ui/jslink.php'; ?>
</body>

</html>