<?php
include '../global/connection.php';
if (isset($_POST['goregister'])) {
	$goname = $_POST['goname'];
	$goemail = $_POST['goemail'];
	$gophone = $_POST['gophone'];
	$gopassword = md5($_POST['gopassword']);
	$gquery = mysqli_query($con, "SELECT * FROM garageowner WHERE goemail='$goemail'");
	$gcount = mysqli_num_rows($gquery);
	if ($count > 0) {
		$gemsg = "Shop Owner already exists";
	} else {
		$ginsert_Query = mysqli_query($con, "INSERT INTO garageowner (goname,goemail,gophone,gopassword) VALUES ('$goname','$goemail','$gophone','$gopassword')");
		if ($ginsert_Query) {
			header("refresh:1;url=./shopownerlogin.php");
			$smsg = "Registerd Successfully redirecting ......";
		} else {
			$gemsg = "ERROR !!!";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include './ui/csslink.php'; ?>
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

		<div class="card card-authentication1 mx-auto my-4" style="width:450px">
			<div class="card-body">
				<div class="card-content p-6">
					<div class="text-center">
						<!-- <img src="assets/images/logo-icon.png" alt="logo icon"> -->
					</div>

					<div class="card-title text-uppercase text-center py-3">Sign Up</div>
					<?php if (isset($emsg)) {
						echo $emsg;
					}
					?>
					<?php if (isset($smsg)) {
						echo $smsg;
					}
					?>
					<form method="POST">

						<div class="form-group">
							<label for="exampleInputName" class="sr-only">Garage Owner Name</label>
							<div class="position-relative has-icon-right">
								<input type="text" class="form-control input-shadow" placeholder="Enter Owner Name" name="goname">
								<div class="form-control-position">
									<i class="icon-user"></i>
								</div>
							</div>
						</div>


						<div class="form-group">
							<label for="exampleInputEmailId" class="sr-only">Email ID</label>
							<div class="position-relative has-icon-right">
								<input type="text" class="form-control input-shadow" placeholder="Enter Owner Email ID" name="goemail">
								<div class="form-control-position">
									<i class="icon-envelope-open"></i>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputEmailId" class="sr-only">Phone Number</label>
							<div class="position-relative has-icon-right">
								<input type="text" class="form-control input-shadow" placeholder="Enter Conteact Number" name="gophone">
								<div class="form-control-position">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tablet-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
									</svg>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="exampleInputPassword" class="sr-only">Password</label>
							<div class="position-relative has-icon-right">
								<input type="password" id="exampleInputPassword" class="form-control input-shadow" placeholder="Choose Password" name="gopassword">
								<div class="form-control-position">
									<i class="icon-lock"></i>
								</div>
							</div>
						</div>

						<!-- <div class="form-group">
			     <div class="icheck-material-white">
                   <input type="checkbox" id="user-checkbox" checked="" />
                   <label for="user-checkbox">I Agree With Terms & Conditions</label>
			     </div>
			    </div> -->

						<button type="submit" class="btn btn-light btn-block waves-effect waves-light" name="goregister">Sign Up</button>
					</form>
					<!-- <div class="text-center mt-3">Sign Up With</div> -->

					<!-- <div class="form-row mt-4">
			  <div class="form-group mb-0 col-6">
			   <button type="button" class="btn btn-light btn-block"><i class="fa fa-facebook-square"></i> Facebook</button>
			 </div>
			 <div class="form-group mb-0 col-6 text-right">
			  <button type="button" class="btn btn-light btn-block"><i class="fa fa-twitter-square"></i> Twitter</button>
			 </div>
			</div> -->


				</div>
			</div>
			<div class="card-footer text-center py-3">
				<p class="text-warning mb-0">Already have an account? <a href="shopownerlogin.php"> Sign In here</a></p>
			</div>
		</div>

		<!--Start Back To Top Button-->
		<!-- <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a> -->
		<!--End Back To Top Button-->

		<!--start color switcher-->
		<!-- <div class="right-sidebar">
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
		</div> -->
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