<?php
include '../global/connection.php';
session_start();
if (isset($_POST['login'])) {
	$gname = $_POST['gname'];
	$gpsd = md5($_POST['gpassword']);
	$query = mysqli_query($con, "SELECT * FROM garage WHERE (gname='$gname' OR gemail='$gname') AND gpassword='$gpsd' ");
	$check = mysqli_num_rows($query);
	$row = mysqli_fetch_assoc($query);
	if ($check >= 1) {
		$_SESSION['gid'] = $row['gid'];
		$_SESSION['gname'] = $row['gname'];
		$smsg = "Login successfull,Redirection in 1 sec..";
		header("refresh:1;url=./index.php");
	} else {
		$emsg = "Invalid Login";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include './assets/csslink.php'; ?>
</head>

<body class="bg-theme bg-theme1">

	<!-- start loader -->
	<div id="pageloader-overlay" class="visible incoming">
		<div class="loader-wrapper-outer">
			<div class="loader-wrapper-inner">
				<div class="loader"></div>
			</div>
		</div>
	</div>
	<!-- end loader -->

	<!-- Start wrapper-->
	<div id="wrapper">

		<div class="loader-wrapper">
			<div class="lds-ring">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
		<div class="card card-authentication1 mx-auto my-5" style="width:450px">
			<div class="card-body">
				<div class="card-content p-2">
					<div class="text-center">
						<img src="assets/images/logo-icon.png" alt="logo icon">
					</div>
					<div class="card-title text-uppercase text-center py-3">Sign In</div>
					<?php
					if (isset($smsg)) {
						echo $smsg;
					}
					?>
					<?php
					if (isset($emsg)) {
						echo $emsg;
					}
					?>
					<form method="POST">
						<div class="form-group">
							<label for="exampleInputUsername" class="sr-only">Username/Email</label>
							<div class="position-relative has-icon-right">
								<input type="text" id="exampleInputUsername" class="form-control input-shadow" placeholder="Enter Username or Email" name="gname">
								<div class="form-control-position">
									<i class="icon-user"></i>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword" class="sr-only">Password</label>
							<div class="position-relative has-icon-right">
								<input type="password" id="exampleInputPassword" class="form-control input-shadow" placeholder="Enter Password" name="gpassword">
								<div class="form-control-position">
									<i class="icon-lock"></i>
								</div>
							</div>
						</div>

						<!-- <div class="form-row">
			 <div class="form-group col-6">
			   <div class="icheck-material-white">
                <input type="checkbox" id="user-checkbox" checked="" />
                <label for="user-checkbox">Remember me</label>
			  </div>
			 </div>
			 <div class="form-group col-6 text-right">
			  <a href="reset-password.html">Reset Password</a>
			 </div>
			</div> -->
						<button type="submit" class="btn btn-light btn-block" name="login">Sign In</button>
						<!-- <div class="text-center mt-3">Sign In With</div> -->

						<!-- <div class="form-row mt-4">
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
				<p class="text-warning mb-0">Do not have an account? <a href="shopregister.php"> Sign Up here</a></p>
			</div>
		</div>

		<!--Start Back To Top Button-->
		<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
		<!--End Back To Top Button-->

		<!--start color switcher-->
		<div class="right-sidebar">
			<div class="switcher-icon">
				<i class="zmdi zmdi-settings zmdi-hc-spin"></i>
			</div>
			<div class="right-sidebar-content">

				<p class="mb-0">Gaussion Texture</p>
				<hr>

				<ul class="switcher">
					<li id="theme1"></li>
					<li id="theme2"></li>
					<li id="theme3"></li>
					<li id="theme4"></li>
					<li id="theme5"></li>
					<li id="theme6"></li>
				</ul>

				<p class="mb-0">Gradient Background</p>
				<hr>

				<ul class="switcher">
					<li id="theme7"></li>
					<li id="theme8"></li>
					<li id="theme9"></li>
					<li id="theme10"></li>
					<li id="theme11"></li>
					<li id="theme12"></li>
					<li id="theme13"></li>
					<li id="theme14"></li>
					<li id="theme15"></li>
				</ul>

			</div>
		</div>
		<!--end color switcher-->

	</div>
	<!--wrapper-->

	<!-- Bootstrap core JavaScript-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- sidebar-menu js -->
	<script src="assets/js/sidebar-menu.js"></script>

	<!-- Custom scripts -->
	<script src="assets/js/app-script.js"></script>

</body>

</html>