<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Customer Session Logs</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				

					<?php include('include/header.php');?>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin  | Customer Session Logs</h1>
																	</div>
								<ol class="breadcrumb"><li class="active">
										<span><?php
								$Today = date('y:m:d',time());
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?></span>
									</li><br/><br/>
									<li>
										<span>Admin </span>
									</li>
									<li class="active">
										<span>Customer Session Logs</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">
									
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
									<div class="table-responsive">
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th class="hidden-xs">User Email</th>
												<th>Username</th>
												<th>User IP</th>
												<th>Login time</th>
												<th>Logout Time </th>
												<th> Status </th>
												
												
											</tr>
										</thead>
										<tbody>
<?php
$sql=mysqli_query($con,"select * from userlog ");
if (mysqli_num_rows($sql) > 0) {
$cnt=0;
while($row=mysqli_fetch_array($sql))
{
	$cnt++;
?>


											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['email'];?></td>
												<td class="hidden-xs"><?php echo $row['username'];?></td>
												<td><?php echo $row['userip'];?></td>
												<td><?php echo $row['loginTime'];?></td>
												<td><?php echo $row['logout'];?>
												</td>
												
												<td>
<?php if($row['status']==1)
{
	echo "Online";
}
else
{
	echo "Offline";
}?>

</td>
												
											</tr>
																<?php 
											 }
											 	# code...
} else { ?>
<tr>
	<td colspan="7">No User log at the moment</td>
</tr>
<?php
}
?>
											
										</tbody>
									</table></div>
								</div>
							</div>
								</div>
						
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery.min.js"></script>
		<script src="vendor/bootstrap.min.js"></script>
		<script src="vendor/modernizr.js"></script>
		<script src="vendor/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/jquery.maskedinput.min.js"></script>
		<script src="vendor/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize.min.js"></script>
		<script src="vendor/classie.js"></script>
		<script src="vendor/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="vendor/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="vendor/form-elements.js"></script>
		
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
