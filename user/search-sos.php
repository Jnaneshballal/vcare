<?php 
include '../global/useraccesscontrol.php';

if (isset($_POST['city'])) {
    $city = $_POST['city'];
    $get_garage = mysqli_query($con, "SELECT * FROM  garage WHERE gcity='$city'");
}

?>
<?php while ($garage = mysqli_fetch_assoc($get_garage)) { ?>
    <div class="col-sm-12 mb-4">
        <div class="card-group">
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