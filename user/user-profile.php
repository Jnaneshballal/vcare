<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    echo "<script>window.location.href='login/login.php'; </script>";
}
$user_info = mysqli_query($con, "SELECT * FROM user_info WHERE uid='$global_uid'");
$record = mysqli_fetch_assoc($user_info);
if (isset($_POST['updateprofile'])) {
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];
    $uaddress = $_POST['uaddress'];
    $ucity = $_POST['ucity'];
    $upin = $_POST['upin'];
    $update_query = mysqli_query($con, "UPDATE user_info SET uname='$uname',uemail='$uemail',uaddress='$uaddress',ucity='$ucity',upin='$upin' WHERE uid='$global_uid'");
    if ($update_query) {
        $smsg = "Profile Updated!!";
        header("refresh:1;url=user-profile.php");
    } else {
        $emsg = "ERROR!!";
    }
}
if(isset($_POST['changepsw'])){
    $oldpass=md5($_POST['oldpass']);
    $newpass=md5($_POST['newpass']);
    $rnewpass=md5($_POST['rnewpass']);
    if($oldpass!=$record['upassword'])
    {
        $pemsg="Old Password Not Matching";
    }
    else if($newpass!=$rnewpass){
        $pemsg="Retype Password Same as New Password";
    }
    else if($oldpass==$newpass){
        $pemsg="Old Password and New Password are Same";
    }
    else{
        $update_pass=mysqli_query($con,"UPDATE user_info SET upassword='$newpass'");
        if($update_pass){
            $psmsg="Password Reset Done !!";
            header("refresh:1;url=user-profile.php");
        }
        else
        {
            $pemsg="Password Reset Done !!";
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
    <?php include './ui/csslink.php'; ?>
</head>

<body>
    <?php include 'ui/leftbar.php'; ?>
    <div id="right-panel" class="right-panel">
        <?php include 'ui/header.php' ?>
        <div class="col-lg-8">
            <form method="POST">
                <div class="card" style="border:2px solid red;border-radius:5px;">
                    <div class="card-header">
                        <strong><i class="fa fa-user"></i> User Profile</strong>
                    </div>
                    <?php if (isset($smsg)) { ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $smsg ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($emsg)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $emsg ?>
                        </div>
                    <?php } ?>
                    <div class="card-body card-block">
                        <form action="" method="post" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-sm-5"><label for="input-small" class=" form-control-label">Name </label></div>
                                <div class="col col-sm-6"><input type="text" name="uname" class="input-sm form-control-sm form-control" value="<?php echo  $record['uname']; ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">E-mail</label></div>
                                <div class="col col-sm-6"><input type="email" id="input-normal" name="uemail" class="input-sm form-control-sm form-control" value="<?php echo  $record['uemail']; ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-5"><label for="input-large" class=" form-control-label">Address</label></div>
                                <div class="col col-sm-6"><input type="text" id="input-normal" name="uaddress" class="input-lg form-control-sm form-control" value="<?php echo  $record['uaddress']; ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-5"><label for="input-small" class=" form-control-label">City </label></div>
                                <div class="col col-sm-6"><input type="text" name="ucity" class="input-sm form-control-sm form-control" value="<?php echo  $record['ucity']; ?>"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-sm-5"><label for="input-small" class=" form-control-label">Pin </label></div>
                                <div class="col col-sm-6"><input type="text" name="upin" class="input-sm form-control-sm form-control" value="<?php echo  $record['upin']; ?>"></div>
                            </div>
                            <hr width="100%" height="2px" color="black">
                            <div class="row form-group">
                                <div class="col col-sm" style="color:red;"><span>(<i class="fa fa-info"></i>) If you want to change your profile details, provide the details in given text box's and press update button.</span></div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning btn-sm pull-right" style="border-radius:100px;" name="updateprofile">
                            <i class="fa fa-edit"> Update</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <div class="card" style="border:2px solid red;border-radius:5px;">
                <div class="card-header"><strong>Change Password</strong></div>
                <?php if (isset($psmsg)) { ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $psmsg ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($pemsg)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $pemsg ?>
                        </div>
                    <?php } ?>
                <div class="card-body card-block">
                    <form method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">Old Password</div>
                                <input type="password" id="username3" name="oldpass" class="form-control">
                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">New Password</div>
                                <input type="password" id="email3" name="newpass" class="form-control">
                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">Re-type Password</div>
                                <input type="password" id="password3" name="rnewpass" class="form-control">
                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                            </div>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" style="border-radius:5px;" class="btn btn-danger pull-right btn-sm" name="changepsw"><i class="fa fa-edit"></i> Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'ui/jslink.php' ?>
</body>

</html>