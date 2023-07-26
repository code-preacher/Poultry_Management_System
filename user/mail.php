<?php
function sendMail($to,$em,$message,$subject){
 $headers = 'MIME-Version: 1.0' . "\r\n";
 $headers .= "From: " . $em . "\r\n"; // Sender's E-mail  ---charset=iso-8859-1
 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

@mail($to, $subject, $message, $headers);
}
?>

