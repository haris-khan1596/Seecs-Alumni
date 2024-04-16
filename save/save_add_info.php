<?php 
ob_start();
session_start(); 
include "../control/dbcode.php";
include "../control/main.php";

//--------------------------------------------

function getIp()
{

$ip_address=$_SERVER['HTTP_X_FORWARDED_FOR'];

if ($ip_address==NULL){
$ip_address=$_SERVER[REMOTE_ADDR]; }
return $ip_address;
}

$autoid=autonum("post_request","autoid");
$user_id=$_SESSION['user_id'];
$notice_type=$_POST['cbonotice'];
$msg=$_POST['txttext'];

$sql="insert into post_request values(". $autoid . ", " . $user_id . ",'" . $notice_type . "', '" . $msg . "' )";
//echo $sql;
//exit;
mysql_query($sql);


//--------------------------------------Send Email--------------------------------

$email="adnan.rasheed@seecs.edu.pk, shafaq.soomro@seecs.edu.pk";
$name="Alumni Admin";
//$to =$row['email'];
$subject = "NUST-SEECS Alumni Thoughts and Suggestion entry";
$subject_wm = "Alumni Request: " . "sIP: " . getIp() . "- pIP:" . $_SERVER[REMOTE_ADDR];

$msg="<p><font face=Verdana size=2>Dear " . $name . ",</font></p><p><font face=Verdana size=2>";
$msg=$msg . "A new thoughts and suggestion entry is received from SEECS Alumni Web Portal. Please login and view the details";
$msg=$msg . "</font></p><p><font face=Verdana size=2>Best Regards,<br>Webmaster<br>";
$msg=$msg . "NUST School of Electrical Engineering and Computer Science<br><a href=http://seecs.nust.edu.pk>http://seecs.nust.edu.pk</a></font></p>";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To:' .  $email . '  ' . "\r\n";
$headers .= 'From: Webmaster NUST-SEECS <webmaster@seecs.edu.pk>' . "\r\n";
$headers .= 'Cc: adnan.rasheed@seecs.edu.pk,fatima.tauqir@seecs.edu.pk,shafaq.soomro@seecs.edu.pk' . "\r\n";

if (mail($to, $subject, $msg, $headers))
{
//   echo("<p>Message sent!</p>");
}
else
{
//  echo("<p>Message delivery failed...</p>");
}

$URL="../add_info.php?err=nil";
header("location:$URL");
?>