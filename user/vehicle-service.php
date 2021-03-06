<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    echo "<script>window.location.href='login/login.php'; </script>";
}
$vid=$_GET['vid'];
$user_city = mysqli_query($con, "SELECT * FROM user_info WHERE uid='$global_uid'");
$usercity_info = mysqli_fetch_assoc($user_city);
$ucity = strtolower($usercity_info['ucity']);
$vehicle_query = mysqli_query($con, "SELECT * FROM garage WHERE gcity='$ucity'");
// $record = mysqli_fetch_assoc($vehicle_query);
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
        <?php while ($record = mysqli_fetch_assoc($vehicle_query)) { ?>
            <div class="col-md-4">
                <div class="feed-box text-center">
                    <section class="card" style="border:2px solid red;border-radius:10px;">
                        <div class="card-body">
                            <!-- <div class="corner-ribon blue-ribon">
                            <i class="fa fa-twitter"></i>
                        </div> -->
                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="ui/images/garage.png">
                            <h2><?php echo $record['gname'];  ?></h2>
                            <hr width="100%" color="red">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label pull-left mb-1">Contact Number</label>
                                        <div class="input-group">
                                            <input type="text" id="phno" name="username2" value="<?php echo $record['gphone']; ?>" class="form-control" style="border-color:red;border-radius:5px;">
                                            <div class="input-group-addon" style="border-color:red;border-radius:5px;"><i class="fa fa-phone"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label pull-left mb-1">Address</label>
                                        <div class="input-group">
                                            <textarea name="textarea-input" id="textarea-input" rows="4" class="form-control" style="border-color:red;border-radius:5px;" disabled="disabled"><?php echo $record['gaddress']; ?></textarea>
                                            <div class="input-group-addon" style="border-color:red;border-radius:5px;"><i class="fa fa-home"></i></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="confirm-service.php?gid=<?php echo $record['gid'];?>&vid=<?php echo $vid; ?>">
                                        <button type="button" class="btn btn-danger pull-right mb-1" style="border-radius:100px;">
                                            <i class="fa fa-trash"> Book Slot</i>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php include 'ui/jslink.php' ?>
</body>

</html>