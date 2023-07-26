<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PMS-Login</title>
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
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="#"><h3>  <img src="images/vin.png" alt="" width="150" height="80" /> |  Login</h2></a>
				</div>

				<div class="box-login">
					<form action="check.php" class="form-login" method="post">
						<fieldset>
							<legend>
								Sign in to your account
							</legend>
							<p>
								Please enter your email and password to log in.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
								<span style="color:green;"><?php echo $_SESSION['smsg']; ?><?php echo $_SESSION['smsg']="";?></span>
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="username" placeholder="Email" required>
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i>
									 </span>
							</div>
							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Login <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="new-account">
								Don't have an account yet?
								<a href="registration.php">
									Create an account
								</a>
								|
									<a href="index.php">
										Home
									</a>
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
	
	</body>
	<!-- end: BODY -->
</html>