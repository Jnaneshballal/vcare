<?php
include '../global/connection.php';
<<<<<<< HEAD:shopkeeper/shopownerlogin.php
session_start();
if (isset($_POST['gologin'])) {
	$goname = $_POST['goname'];
	$gopassword = md5($_POST['gopassword']);
	$gquery = mysqli_query($con, "SELECT * FROM garageowner WHERE (goname='$goname' OR goemail='$goemail') AND gopassword='$gopassword' ");
	$gcheck = mysqli_num_rows($gquery);
	$grow = mysqli_fetch_assoc($gquery); 
	if ($gcheck >= 1) {
		$_SESSION['goid'] = $grow['goid'];
		$_SESSION['goname'] = $grow['goname'];
=======

if(isset($_SESSION['gid'])){
	echo "<script> window.location.href='index.php'</script>";
}

if (isset($_POST['glogin'])) {
	$gname = $_POST['gname'];
	$gpassword = md5($_POST['gpassword']);
	$gquery = mysqli_query($con, "SELECT * FROM garage WHERE (gname='$gname' OR gemail='$gname') AND gpassword='$gpassword' ");
	$gcheck = mysqli_num_rows($gquery);
	$grow = mysqli_fetch_assoc($gquery);
	if ($gcheck >= 1) {
		session_start();

		$_SESSION['gid'] = $grow['gid'];
		$_SESSION['gname'] = $grow['gname'];

>>>>>>> 3a98350349adc63f2d2f4ebcfe71cb98c384550e:shopkeeper/shoplogin.php
		$gsmsg = "Login successfull,Redirection in 1 sec..";
		header("refresh:1;url=index.php");
	} else {
		$gemsg ="Error!!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include './ui/csslink.php'; ?>
</head>

<body class="bg-theme bg-theme1">
	<div id="wrapper">
		<div class="card card-authentication1 mx-auto my-5" style="width:450px">
			<div class="card-body">
				<div class="card-content p-2">
					<div class="text-center">
						<img src="./ui/assets/images/fflogo-icon.png" alt="logo icon">
					</div>
					<div class="card-title text-uppercase text-center py-3">Sign In</div>
					<form method="POST">
						<?php
						if (isset($gsmsg)) {
							echo $gsmsg;
						}
						if (isset($gemsg)) {
							echo $gemsg;
						}
						?>
						<div class="form-group">
							<label for="exampleInputUsername" class="sr-only">Username/Email</label>
							<div class="position-relative has-icon-right">
								<input type="text" id="exampleInputUsername" class="form-control input-shadow" placeholder="Enter Username or Email" name="goname">
								<div class="form-control-position">
									<i class="icon-user"></i>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword" class="sr-only">Password</label>
							<div class="position-relative has-icon-right">
								<input type="password" id="exampleInputPassword" class="form-control input-shadow" placeholder="Enter Password" name="gopassword">
								<div class="form-control-position">
									<i class="icon-lock"></i>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-light btn-block" name="gologin">Sign In</button>
					</form>
				</div>
			</div>
			<div class="card-footer text-center py-3">
				<p class="text-warning mb-0">Do not have an account? <a href="shopownerregister.php"> Sign Up here</a></p>
			</div>
		</div>
	</div>
	<?php include 'ui/jslink.php'; ?>

</body>

</html>