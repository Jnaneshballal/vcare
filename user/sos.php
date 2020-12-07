<?php
include '../global/useraccesscontrol.php';
if (!$login) {
    echo "<script>window.location.href='login/login.php'; </script>";
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
                    <form method="POST" id="search-form" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-12">
                                <p>Enter the near by city to get faster Access ...</p>
                                <div class="input-group">
                                    <input type="text" id="search-city" placeholder="City" class="form-control" name="city">
                                    <div class="input-group-btn"><button class="btn btn-primary" type="submit" name="search"><i class="fa fa-search"> Search</i></button></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="search-result">

        </div>
    </div>

    <?php include 'ui/jslink.php' ?>
    <script>
        jQuery(document).ready(function(){
            jQuery("#search-form").submit(function(e){
                e.preventDefault();
                var city  = jQuery("#search-city").val();
                jQuery("#search-result").load("./search-sos.php",{
                    city: city
                });
                
                // jQuery.ajax({
                //     url: './search-sos.php',
                //     type: "POST",
                //     data:{
                //         city: city
                //     },
                //     success: function(response){
                //         jQuery("#search-result").html(response);
                //     }
                // })
            })
        })
    </script>

</body>

</html>