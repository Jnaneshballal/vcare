<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    echo "<script>window.location.href='login/login.php'; </script>";
}
$fetch_info = mysqli_query($con, "SELECT * FROM vehicle_info WHERE vuid=$global_uid");
// if (isset($_POST['ydel'])) {
//     $vid=$_POST['vhid'];
//     $del_query=mysqli_query($con,"DELETE FROM vehicle_info WHERE vid=$vid");
// }
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
                                <i class="fa fa-user"></i> Owner Name <span class="badge pull-right"><?php echo $info['vownername']; ?></span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-calendar"></i> Emission Expire Date <span class="badge badge-danger pull-right"><?php echo $info['vemissionexdate']; ?></span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-calendar"></i> Insurance Expire Date <span class="badge badge-danger pull-right"><?php echo $info['vinsureexdate']; ?></span>
                            </li>
                            <li class="list-group-item">
                                <button type="button" data-vid="<?php echo $info['vid']; ?>" data-vnum="<?php echo $info['vno']; ?>" onclick="delvechicle(this)" class="btn btn-danger mb-1" data-toggle="modal" data-target="#staticModal" style="border-radius:50px;text-align:center;">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <!-- <a href="#"><span class="badge badge-warning pull-right r-activity">Edit<i class="fa fa-edit"></i></span></a> -->
                                <button type="button" data-veid="<?php echo $info['vid']; ?>" data-veno="<?php echo $info['vno']; ?>" class="btn btn-warning pull-right mb-1" data-toggle="modal" data-target="#mediumModal" style="border-radius:50px;text-align:center;" onclick="updatevehicle(this)">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </li>
                        </ul>

                    </section>
                </aside>
            </div>
        <?php } ?>

        <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">DELETE !!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Are you sure you want to DELETE the vehicle <span id="model-vhno"></span>?
                        </p>
                        <form method="post">
                            <input type="hidden" name="vhid" value="" id="model-vid">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" name="ydel"><i class="fa fa-check"> Yes</i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Update Vehicle Details</h5>
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
                                <div class="col-12 col-md-9"><input type="Date" id="password-input" name="vemissionexdate" placeholder="date" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Insurance Expire Date</label></div>
                                <div class="col-12 col-md-9"><input type="date" id="text-input" name="vinsureexdate" placeholder="date" class="form-control"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="vhid" value="" id="model-vid">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-warning" name="update"><i class="fa fa-edit"></i> Update</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <?php include 'ui/jslink.php' ?>

    <script>
        function delvechicle(ele) {
            var vhno = ele.getAttribute("data-vnum");
            var vhid = ele.getAttribute("data-vid");

            document.getElementById("model-vhno").innerHTML = vhno;
            document.getElementById("model-vid").value = vhid;
            //alert(vhno);
        }
        function updatevehicle(item)
        {
            var veno = ele.getAttribute("data-veno");
            var veid = ele.getAttribute("data-veid");

            document.getElementById("model-vhno").innerHTML = vhno;
            document.getElementById("model-vid").value = vhid;
        }
    </script>

</body>

</html>