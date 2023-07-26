<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>User | Order History</title>
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
	<style>
		#myInput {
			background-image: url('/css/searchicon.png'); /* Add a search icon to input */
			background-position: 10px 12px; /* Position the search icon */
			background-repeat: no-repeat; /* Do not repeat the icon image */
			width: 100%; /* Full-width */
			font-size: 14px; /* Increase font-size */
			padding: 12px 20px 12px 40px; /* Add some padding */
			border: 1px solid #ddd; /* Add a grey border */
			margin-bottom: 12px; /* Add some space below the input */
		}

		#myTable {
			border-collapse: collapse; /* Collapse borders */
			width: 100%; /* Full-width */
			border: 1px solid #ddd; /* Add a grey border */
			font-size: 14px; /* Increase font-size */
		}

		#myTable th, #myTable td {
			text-align: left; /* Left-align text */
			padding: 10px; /* Add padding */
		}

		#myTable tr {
			/* Add a bottom border to all table rows */
			border-bottom: 1px solid #ddd; 
		}

		#myTable tr.header, #myTable tr:hover {
			/* Add a grey background color to the table header and on hover */
			background-color: #f1f1f1;
		}
	</style>
	
	<script>
		function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
  	td = tr[i].getElementsByTagName("td")[2];
  	if (td) {
  		if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
  			tr[i].style.display = "";
  		} else {
  			tr[i].style.display = "none";
  		}
  	} 
  }
}
</script>
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
								<h1 class="mainTitle">User  | Products Order History</h1>
							</div>
							<ol class="breadcrumb">
								
								<li class="active">
									<span><?php
									$Today = date('y:m:d',time());
									$new = date('l, F d, Y', strtotime($Today));
									echo $new;
									?></span>
								</li><br/><br/>
								<li>
									<span>User </span>
								</li>
								<li class="active">
									<span>Order History</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						

						<div class="row">
							<div class="col-md-12">
								
								<div class="form-group">
									
									<input type="text" id="myInput" onkeyup="myFunction()" class="form-control"  placeholder="Search for Order Date"  required>
								</div>
								<div class="table-responsive">
									
									<table id="myTable" class="table table-bordered">
										
										
										
										
										<thead>
											<tr class="header"> 
												<th>S/N</th>
												<th>Items</th>
												<th>Date</th>
												
												
											</tr>
										</thead>
										<tbody>
											<?php
											$sql=mysqli_query($con,"select * from orderhistory where  userid = '".$_SESSION['id']."' order by id desc");
											if (mysqli_num_rows($sql) > 0) {
$cnt=0;
while($row=mysqli_fetch_array($sql))
{
	$cnt++;
?>
												<tr>
													<td class="center"><?php echo $cnt;?>.</td>
													<td class="center"><?php echo $row['item'];?>.</td>
													<td class="center"><?php echo $row['date'];?></td>
													
													</tr>
																															<?php 
											 }
											 	# code...
} else { ?>
<tr>
	<td colspan="5">No product order at the moment</td>
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
			<script src="vendor/select2.min.js"></script>
			<script src="vendor/bootstrap-datepicker.min.js"></script>
			<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
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
