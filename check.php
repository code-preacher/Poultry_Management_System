<?php
session_start();
error_reporting(0);
include("config.php");
if(isset($_POST['submit']))
{
$uname=Cleanse(mysqli_real_escape_string($con,$_POST['username']));
$pass=Cleanse(md5(mysqli_real_escape_string($con,$_POST['password'])));
	
	
	#user
$ret=mysqli_query($con,"SELECT * FROM users WHERE email='$uname' and password='$pass'");
$num=mysqli_fetch_array($ret);

if($num>0)
{
$extra="user/dashboard.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$dt=date("d/m/y \@ g:i A");
$log=mysqli_query($con,"update userlog set userip='$uip',status='$status',loginTime='$dt' where email='".$_POST['username']."' ");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}

#admin
$ret3=mysqli_query($con,"SELECT * FROM admin WHERE email='$uname' and password='$pass'");
$num3=mysqli_fetch_array($ret3);


if($num3>0)
{
$extra="admin/dashboard.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else{
	$_SESSION['errmsg']="Invalid email or password";
	header("location:login.php");
}
}


function Cleanse($Data)
{
#$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
$Data = htmlentities($Data, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
$Data = stripslashes($Data); /** Add Strip Slashes Protection */
return $Data;
}
?>

