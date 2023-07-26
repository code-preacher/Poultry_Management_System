<?php
  session_start();
  $id=$_SESSION['id'];
  include('include/config.php');
if (isset($_POST['sub'])) {
	$pdt=$_POST['pdt'];
	$qty=$_POST['qty'];
	
$rt=mysqli_query($con,"select * from product where id='$pdt'");
$gt=mysqli_fetch_assoc($rt);
$pr=$gt['price'];
$dpt=$gt['description'];
$nm=$gt['name'];
$cg=$qty*$pr;
 mysqli_query($con,"insert into purchase(userid,productid,name,price,charge,quantity,description) values('$id','$pdt','$nm','$pr','$cg','$qty','$dpt')");}
 header("location:product-order.php");
?>