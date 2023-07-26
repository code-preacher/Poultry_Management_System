<?php
session_start();
$_SESSION['login']=="";
session_unset();
// session_destroy();
$_SESSION['smsg']="You have successfully logged out";
?>
<script language="javascript">
document.location="../login.php";
</script>
