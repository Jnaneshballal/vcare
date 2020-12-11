<?php
include '../global/connection.php';
if (isset($_POST['gregister'])) {
	$gname = $_POST['gname'];
	$gemail = $_POST['gemail'];
	$gphone = $_POST['gphone'];
	$gaddress = $_POST['gaddress'];
	$gcity = $_POST['gcity'];
	$gpassword = md5($_POST['gpassword']);
	$gquery = mysqli_query($con, "SELECT * FROM garage WHERE gemail='$gemail'");
	$gcount = mysqli_num_rows($gquery);
	if ($count > 0) {
		$gemsg = "Garage already exists";
	} else {
		$ginsert_Query = mysqli_query($con, "INSERT INTO garage (gname,gemail,gphone,gaddress,gcity,gpassword) VALUES ('$gname','$gemail','$gphone','$gaddress','$gcity','$gpassword')");
		if ($ginsert_Query) {
			header("refresh:1;url=./shoplogin.php");
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
							<label for="exampleInputName" class="sr-only">Garage Name</label>
							<div class="position-relative has-icon-right">
								<input type="text" class="form-control input-shadow" placeholder="Enter Your  Garage Name" name="gname">
								<div class="form-control-position">
									<i class="icon-user"></i>
								</div>
							</div>
						</div>


						<div class="form-group">
							<label for="exampleInputEmailId" class="sr-only">Email ID</label>
							<div class="position-relative has-icon-right">
								<input type="text" class="form-control input-shadow" placeholder="Enter Garage Email ID" name="gemail">
								<div class="form-control-position">
									<i class="icon-envelope-open"></i>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputEmailId" class="sr-only">Phone Number</label>
							<div class="position-relative has-icon-right">
								<input type="text" class="form-control input-shadow" placeholder="Enter Conteact Number" name="gphone">
								<div class="form-control-position">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tablet-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
									</svg>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputEmailId" class="sr-only">Address</label>
							<div class="position-relative has-icon-right">
								<textarea id="exampleInputEmailId" height="50" class="form-control input-shadow" placeholder="Enter the address" name="gaddress"></textarea>
								<div class="form-control-position">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shop-window" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zm2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5z" />
									</svg>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputEmailId" class="sr-only">City</label>
							<div class="position-relative has-icon-right">
								<input type="text" id="exampleInputEmailId" class="form-control input-shadow" placeholder="Enter City" name="gcity">
								<div class="form-control-position">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
									</svg>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword" class="sr-only">Password</label>
							<div class="position-relative has-icon-right">
								<input type="password" id="exampleInputPassword" class="form-control input-shadow" placeholder="Choose Password" name="gpassword">
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

						<button type="submit" class="btn btn-light btn-block waves-effect waves-light" name="gregister">Sign Up</button>
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
				<p class="text-warning mb-0">Already have an account? <a href="shoplogin.php"> Sign In here</a></p>
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