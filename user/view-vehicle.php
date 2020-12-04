<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    echo "<script>window.location.href='login/login.php'; </script>";
}
$fetch_info = mysqli_query($con, "SELECT * FROM vehicle_info WHERE vuid=$global_uid");
if (isset($_POST['delete'])) {
    $vno = $_POST['veno'];
    $del_query = mysqli_query($con, "DELETE from vehicle_info WHERE vno='$vno'");
    if ($del_query) {
        $smsg = "Vehicle Deleted";
        header("refresh:1;url=view-vehicle.php");
    } else {
        $emsg = "Error!!";
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
        <?php while ($info = mysqli_fetch_assoc($fetch_info)) {

        ?>
            <div class="col-md-4">
                <aside class="profile-nav alt">
                    <section class="card">
                        <div class="card-header user-header alt bg-dark">
                            <div class="media">
                                <a href="#">
                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="ui/images/car.png">
                                </a>
                                <div class="media-body">
                                    <h2 class="text-light display-6"><?php echo $info['vmodel']; ?></h2>
                                    <p><?php echo $info['vno']; ?></p>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="fa fa-user"></i> Owner Name <span class="badge pull-right"><?php echo strtoupper($info['vownername']); ?></span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-calendar"></i> Emission Expire Date <span class="badge badge-danger pull-right"><?php echo $info['vemissionexdate']; ?></span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-calendar"></i> Insurance Expire Date <span class="badge badge-danger pull-right"><?php echo $info['vinsureexdate']; ?></span>
                            </li>
                            <li class="list-group-item">
                                <button type="button" vel-id="<?php echo $info['vid']; ?>" vel-no="<?php echo $info['vno']; ?>" class="btn btn-danger mb-1" data-toggle="modal" data-target="#mediumModal1" style="border-radius:100px;" onclick="delvehicle(this)">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <button type="button" class="btn btn-warning pull-right mb-1" data-toggle="modal" data-target="#mediumModal2" style="border-radius:100px;" onclick="updatevehicle(this)">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </li>
                        </ul>

                    </section>
                </aside>
            </div>
        <?php } ?>
        <!-- Deletion -->
        <div class="modal fade" id="mediumModal1" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">DELETE!!..</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php if (isset($smsg)) { ?>
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Success</span>
                            <?php echo $smsg; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    <?php } ?>
                    <?php if (isset($emsg)) { ?>
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                            <span class="badge badge-pill badge-danger">Error!!</span>
                            <?php echo $emsg; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    <?php } ?>
                    <div class="modal-body">
                        <p>
                            Are You Sure You want to Delete vehicle <span id="vehid"></span> ??
                        </p>
                    </div>
                    <form method="POST">
                        <div class="modal-footer">
                            <input type="hidden" name="veno" veh-id="vno">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius:110px;"><i class="fa fa-times">CANCEL</i></button>
                            <button type="submit" class="btn btn-success" style="border-radius:100px;" name="delete"><i class="fa fa-check">DELETE</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- update-->
        <div class="modal fade" id="mediumModal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">UPDATE VEHICLE DETAILS!!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Vehicle Owner Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="vownername" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Emission Expire Date</label></div>
                            <div class="col-12 col-md-9"><input type="Date" id="password-input" name="vemissionexdate" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Insurance Expire Date</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="text-input" name="vinsureexdate" class="form-control"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius:110px;"><i class="fa fa-times">CANCEL</i></button>
                        <button type="submit" class="btn btn-primary" style="border-radius:100px;"><i class="fa fa-check">UPDATE</i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'ui/jslink.php' ?>
    <script>
        function delvehicle(vehicle) {
            vid = vehicle.getAttribute('vel-id');
            vno = vehicle.getAttribute('vel-no');

            document.getElementById("vehid").innerHTML = vno;
            document.getElementById.value = vid;
        }
    </script>
</body>

</html>