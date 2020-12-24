<?php
include '../../global/connection.php';
if (isset($_POST['register'])) {
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];
    $uphone = $_POST['uphone'];
    $uaddress = $_POST['uaddress'];
    $ucity = $_POST['ucity'];
    $upassword = md5($_POST['upassword']);
    $cpassword = md5($_POST['upassword']);
    if ($upassword != $cpassword) {
        $emsg = "Password Not Matching!!";
    } else {
        $check_query = mysqli_query($con, "SELECT * FROM user_info WHERE uemail='$uemail'");
        $count = mysqli_num_rows($check_query);
        if ($count > 0) {
            $emsg = "User Already registered";
        } else {
            $insert_Query = mysqli_query($con, "INSERT INTO user_info (uname,uemail,uphone,uaddress,ucity,upassword) VALUES ('$uname','$uemail','$uphone','$uaddress','$ucity','$upassword')");
            if ($insert_Query) {
                header("refresh:1;url=./login.php");
                $smsg = "Registred Successfully.Redirecting....";
            } else {
                $emsg = "Error!!";
            }
        }
    }
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
    <title>Register</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

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
                        <h3>Register</h3>
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
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="User Name" name="uname" required="true">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="Email" name="uemail" required="true">
                        </div>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="number" class="form-control" placeholder="Phone number" name="uphone" required="true">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" height="50" placeholder="Address" name="uaddress" required="true"></textarea>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" placeholder="City" name="ucity" required="true">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="upassword" required="true">
                        </div>
                        <div class="form-group">
                            <label>Re-Type Password</label>
                            <input type="password" class="form-control" placeholder="Password" required="true">
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="register">Register</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="login.php"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include '../ui/jslink.php' ?>


</body>

</html>