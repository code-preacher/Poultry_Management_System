<?php
session_start();
#new line
$_SESSION['dismsg']="";

if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$no=$_POST['no'];
$email=$_POST['email'];
$password=md5($_POST['password']);
include "reg-add.php";
regadd($fname,$address,$city,$gender,$no,$email,$password);
}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>User Registration</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="user/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="user/vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="user/vendor/themify-icons/themify-icons.min.css">
		<link href="user/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="user/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="user/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="user/assets/css/styles.css">
		<link rel="stylesheet" href="user/assets/css/plugins.css">
		<link rel="stylesheet" href="user/assets/css/themes/theme-1.css" id="skin_color" />

	</head>

	<body class="login">
		<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="#"><h3>  <img src="images/vin.png" alt="" width="150" height="80" />|User Registration</h3></a>
				</div>
				<!-- start: REGISTER BOX -->
				
				<div class="box-register">
				<p>	
								<span style="color:green;"><?php echo htmlentities($_SESSION['dismsg']); ?><?php echo htmlentities($_SESSION['dismsg']="");?></span>
							</p>
					<form name="registration" id="registration"  method="post">
						<fieldset>
							<legend>
								Sign Up
							</legend>
							<p>
								Enter your personal details below:
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="address" placeholder="Address" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="city" placeholder="City" required>
							</div>
							<div class="form-group">
								<label class="block">
									Gender
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="gender" value="female" >
									<label for="rg-female">
										Female
									</label>
									<input type="radio" id="rg-male" name="gender" value="male">
									<label for="rg-male">
										Male
									</label>
								</div>
							</div>
							
							
							<p>
								Enter your account details below:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control"  name="no" placeholder="Phone Number" required>
									<i class="fa fa-phone"></i> </span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" name="password_again" placeholder="Password Again" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree" required />
									<label for="agree">
										I agree
									</label>
								</div>
							</div>
							<div class="form-actions">
								<p>
									Already have an account?
									<a href="login.php">
										Log-in
									</a>
									|
									<a href="index.php">
										Home
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> PMS</span>. <span>All rights reserved</span>
					</div>

				</div>

			</div>
		</div>
		<script src="user/vendor/jquery/jquery.min.js"></script>
		<script src="user/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="user/vendor/modernizr/modernizr.js"></script>
		<script src="user/vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="user/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="user/vendor/switchery/switchery.min.js"></script>
		<script src="user/vendor/jquery-validation/jquery.validate.min.js"></script>
	
		<script src="user/assets/js/main.js"></script>

		<script src="user/assets/js/login.js"></script>
	
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	
		
	</body>
	<!-- end: BODY -->
</html>