<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{

	$n=$_POST['nm'];
	$p=$_POST['pr'];
	$d=$_POST['dt'];


	$gimage=$_FILES['gimage']['name'];
	$temp=$_FILES['gimage']['tmp_name'];
	$folder="../images/product/" ;  
	$pos=strpos($gimage,'.');
	$len=strlen($gimage);
	$ext=substr($gimage, $pos, $len); 
	$gimage1=str_replace($gimage,'.',uniqid().$ext); 
	$gimagef='product-'.$gimage1;

	move_uploaded_file($temp,$folder.$gimagef)  ;
	$sql=mysqli_query($con,"insert into product(name,price,description,image) values('$n','$p','$d','$gimagef')");
	if($sql)
	{
		$_SESSION['msg']="product was Added Successfully";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Add product</title>
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
								<h1 class="mainTitle">Admin | Add product</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin </span>
								</li>
								<li class="active">
									<span>Add product</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<p>	
									<span style="color:green;"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg']="");?></span>
								</p>
								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Add product</h5>
											</div>

											<form role="form" name="edit" method="post" enctype="multipart/form-data">


												<div class="form-group">
													<label for="name">
														product Name
													</label>
													<input type="text" name="nm" class="form-control" required />
												</div>

												<div class="form-group">
													<label for="Description">
														product Description
													</label>
													<input type="text" name="dt" class="form-control" required />
												</div>

												<div class="form-group">
													<label for="fname">
														product Price
													</label>
													<input type="number" name="pr" class="form-control" pattern="[0-9]+" required />
												</div>


												<div class="form-group">
													<label for="exampleInputFile">Choose Image for upload :</label>
													<input type="file" name="gimage" class="btn-info" required="required">
												</div>






												<button type="submit" name="submit" class="btn btn-o btn-primary">
													Add product
												</button>
											</form>

										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="panel panel-white">


							</div>
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
