<?php
session_start();
include('include/config.php');
$_SESSION['login']=="";
#date_default_timezone_set('Asia/Kolkata');
#$ldate=date( 'd-m-Y h:i:s A', time () );
$date=date("d/m/y \@ g:i A");
mysqli_query($con,"UPDATE userlog  SET logout = '$date',status='0' WHERE email = '".$_SESSION['login']."' ");
session_unset();
//session_destroy();
$_SESSION['smsg']="You have successfully logged out";
?>
<script language="javascript">
document.location="../login.php";
</script>
