<?php
 
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
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
                    <form>
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="email" class="form-control" placeholder="User Name" name="uname">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" height="50" placeholder="Address" name=address></textarea>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                            <label>Re-Type Password</label>
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <!-- <div class="checkbox">
                            <label>
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                        </div> -->
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="register">Register</button>
                        <!-- <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>
                            </div>
                        </div> -->
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