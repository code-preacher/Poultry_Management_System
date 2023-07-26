<?php
 error_reporting(E_ALL);
  ini_set("display_errors","on");
  session_start();
  $id=$_GET['userid'];
  include('include/config.php');
 $ut=mysqli_query($con,"select * from users where id='$id'");
 $xt=mysqli_fetch_assoc($ut);
 $nt=$xt['fullname'];
 $no=$xt['number'];
  $em=$xt['email'];
 
  $za=mysqli_query($con,"select * from purchase where userid='$id'");
$k='';
$hs='';
$jp='';
$ref="PMS-".uniqid();
 while($xa=mysqli_fetch_array($za)){
 $dt=$xa['description'];
 $qt=$xa['quantity'];
  $pz=$xa['price'];

  $k=$k .'<tr><td>'.$dt.'</td>'.'<td>'. $qt.'</td>'.'<td>'.'&#8358;'.$pz.'</td></tr>';
  $hs=$hs .'('.$qt.')  '. $dt.'  '.'&#8358;'.$pz.',';
  $jp=$jp .'('.$qt.')  '. $dt.'  '.'&#8358;'.$pz.',';
 
 $_SESSION['dismsg']='Order has been sent,we will contact you shortly';
 }
 $hs=$hs.' = '.'&#8358;'.$_SESSION['total'];
 $jp='PMS product request: '.$jp.'Total = '.'&#8358;'.$_SESSION['total'].' | Customer Details : '.$nt.' ,'.$no;
 $total='<span style="font-weight:bolder;font-size:20px;">'.'Total Cost :  '.'&#8358;'.$_SESSION['total'].'</span>';


$dt=date("h:i:s A");
 $d = date('y:m:d',time());
$cdt = date('l, F d, Y', strtotime($d));

 #mail preparation 
 $message="<br/><br/><br/><br/><br/>
  <div style='margin:auto;width:70%;max-height:auto;background:#f5f5f6;font-family:trebuchet ms; border:1px #fff;border-radius:8px;padding:0px;font-size:14px;color:#4f80d4;'>
<div style='width:100%;color:#fff;text-align:center;max-height:auto;margin-top:-40px;background:#8c90e9;font-family:trebuchet ms;font-size:18px; border:1px #fff;border-radius:8px 8px 0px 0px;'>
PMS PRODUCT REQUEST RECEIPT
</div><br/>
<table border='1' cellpadding='10px' cellspacing='10px' style='border:1px solid #fff;border-collapse:collapse;font-size:14px;color:#8a1c1c;width:100%;'>
<tr style='font-weight:bold;'>
<td>product Name</td><td>Quantity</td><td>Price</td>
</tr>

$k
<tr style='border:1px solid #fff;'>
<td colspan='3'>**********************************************************************************************************************************</td>
</tr>

<tr style='border:1px solid #fff;'><td>&nbsp; </td>
<td> $total</td>
<td>&nbsp;</td>
</tr>

<tr style='border:1px solid #fff;'><td>Customer Name :<br>$nt </td>
<td>Customer Number : <br>$no</td>
<td>Customer Email : <br>$em</td>
<td>Item Reference : <br>$ref</td>
</tr>
</table>

<br/><br/><br/><p align='right'>Date : $cdt @ $dt</p><br/><br/>
<hr>
 <a href='product-order-history.php' class='btn btn-primary'>Click to View Order History</a>|
 <a href='javascript:print()' class='btn btn-primary'>Click to Print Order</a><br><br>
</div>
";
  echo $message;

$rat=mysqli_query($con,"select * from contact");  
$cat=mysqli_fetch_assoc($rat);
$phone=$cat['number'];
$to=$cat['email'];
  

 #sms function
#include 'sms-api.php';
#sendSms($phone, $jp);

 

 #update order history
 $new=date("d/m/y \@ g:i A");
mysqli_query($con,"insert into orderhistory(userid,item,item_ref,date) values('$id','$hs','$ref','$new')");
 
#delete all user data from purchase
mysqli_query($con,"delete from purchase where userid='$id'");
//header("location:products-order.php");
?>



