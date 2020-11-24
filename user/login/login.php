<?php
include 'connection.php';
session_start();
if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $psw = md5($_POST['psw']);
    $query = mysqli_query($con, "SELECT * FROM user WHERE (uname='$uname' OR email='$uname') AND password='$psw' ");
    $check = mysqli_num_rows($query);
    $row = mysqli_fetch_assoc($query);
    if ($check >= 1) {
        $_SESSION['uid'] = $row['uid'];
        $_SESSION['uname'] = $row['uname'];
        $smsg = "Login successfull,Redirection in 1 sec..";
        header("refresh:1;url=../index.php");
    } else {
        $emsg = "Invalid login..";
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="../ui/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../ui/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../ui/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../ui/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../ui/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../ui/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <!-- <a href="index.html">
                        <img class="align-content" src="../ui/images/logo.png" alt="">
                    </a> -->
                </div>
                <div class="login-form">
                    <div class="register-link m-t-15 text-center">
                        <h3>Log-in</h3>
                    </div>
                    <hr width="100%" height="50px">
                    <?php if (isset($smsg)) { ?>
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Success</span>
                            <?php echo $smsg ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    <?php } ?>
                    <?php if (isset($emsg)) { ?>
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                            <span class="badge badge-pill badge-danger">Error!!</span>
                            <?php echo $emsg ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    <?php } ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="Text" class="form-control" placeholder="username or email" name="uname">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="psw">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login">Sign in</button>
                        <!-- <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                            </div>
                        </div> -->
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="register.php"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>