<?php
 function regadd($fname,$address,$city,$gender,$no,$email,$password){ 
   include('config.php');
 $rd=date("d/m/y \@ g:i A");
 $ud=date("d/m/y \@ g:i A");
 $ip=$_SERVER['REMOTE_ADDR'];
$query=mysqli_query($con,"insert into users(fullname,address,city,gender,number,email,password,regDate,updationDate) values('$fname','$address','$city','$gender','$no','$email','$password','$rd','$ud')");
if($query)
{
	mysqli_query($con,"insert into userlog(email,username,userip,status,loginTime,logout) values('$email','$fname','$ip','0','','')");

	$_SESSION['dismsg']='Successfully Registered. You can login now';


}
 }