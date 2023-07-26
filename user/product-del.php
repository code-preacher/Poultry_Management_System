<?php
  session_start();
  $id=$_GET['productid'];
  include('include/config.php');
mysqli_query($con,"delete from purchase where productid='$id'");
 header("location:product-order.php");
?>