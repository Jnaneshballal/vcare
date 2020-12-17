<?php
include '../global/connection.php';
session_start();
if (isset($_POST['glogin'])) {
	$gname = $_POST['gname'];
	$gpassword = md5($_POST['gpassword']);
	$garage_query = mysqli_query($con, "SELECT * FROM garage WHERE (gname='$gname' OR gemail='$gname') AND gpassword='$gpassword' ");
	$garage_check = mysqli_num_rows($garage_query);
	$grow = mysqli_fetch_assoc($garage_query);
	if ($garage_check >= 1) {
		$_SESSION['gid'] = $grow['gid'];
		$_SESSION['gname'] = $grow['gname'];
		$gsmsg = "Login successfull,Redirection in 1 sec..";
		header("refresh:1;url=index.php");
	} else {
		$gemsg = mysqli_error($con);
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
					<?php
					if (isset($gsmsg)) {
						echo $gsmsg;
					}
					if (isset($gemsg)) {
						echo $gemsg;
					}
					?>
					<form method="POST">
						<div class="form-group">
							<label for="exampleInputPassword" class="sr-only">Password</label>
							<div class="position-relative has-icon-right">
								<input type="text" id="exampleInputPassword" class="form-control input-shadow" placeholder="Enter Username" name="gname">
								<div class="form-control-position">
									<i class="icon-lock"></i>
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
						<button type="submit" class="btn btn-light btn-block" name="glogin">Sign In</button>
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