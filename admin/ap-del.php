<?php
  session_start();
  $id=$_GET['id'];
  include('include/config.php');
$fl=mysqli_query($con,"select * from product where id='$id'");
$lf=mysqli_fetch_assoc($fl);
$us=$lf['id'];
if($fl){
mysqli_query($con,"delete from product where id='$us' ");
 $_SESSION['msg']="product have been deleted !!";

}
 header("location:product.php");
?>