<?php 
ob_start();
session_start(); 
include "../control/dbcode.php";
include "../control/main.php";

if (empty($_SESSION['captcha']) || strtolower(trim($_REQUEST['captcha'])) != $_SESSION['captcha']) {
	header("Location:../forgot_pwd1.php?cap_err=1");
	exit;
}

$email_post=mysql_real_escape_string($_POST['txtemail']);

$e_sql="select * from personal_data where sec_email='" . $email_post . "'";
$e_request=mysql_query($e_sql);

if(mysql_affected_rows()<=0)
{
$URL="../forgot_pwd.php?err=2";
header ("Location: $URL");
exit;
}

$e_row=mysql_fetch_array($e_request);
$email_db=$e_row['sec_email'];
$name=$e_row['name'];
$user_id=$e_row['user_id'];

$sql="select * from alumni_users where user_id='" . $user_id . "'";
$request=mysql_query($sql);
if(mysql_affected_rows()<=0)
{
$URL="../forgot_pwd.php?err=2";
header ("Location: $URL");
exit;
}

$row=mysql_fetch_array($request);
$user_name=$row['user_name'];
$password=$row['password'];


//--------------------------------------Send Email--------------------------------

$subject = "NUST-SEECS Alumni Password Recovery";

$msg="<p><font face=Verdana size=2>Dear " . $name . ",</font></p><p><font face=Verdana size=2>";
$msg=$msg . "Your password has been recovered successfully, here is your login information</font></p>";
$msg=$msg . "<p><font face=Verdana size=2>URL: <a href=http://alumni.seecs.nust.edu.pk/login.php>http://alumni.seecs.nust.edu.pk/login.php</a> <br>";
$msg=$msg . "User Name: " . $user_name . "<br>";
$msg=$msg . "Password:&nbsp;&nbsp; " . $password . "";
$msg=$msg . "</font></p><p><font face=Verdana size=2>Best Regards,<br>Webmaster<br>";
$msg=$msg . "NUST School of Electrical Engineering and Computer Science<br><a href=http://alumni.seecs.nust.edu.pk>http://alumni.seecs.nust.edu.pk</a></font></p>";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To:' .  $email_db . '  ' . "\r\n";
$headers .= 'From: Webmaster NUST-SEECS <webmaster@seecs.edu.pk>' . "\r\n";
//$headers .= 'bcc: adnan.rasheed@niit.edu.pk' . "\r\n";

if (mail($to, $subject, $msg, $headers))
{
   echo("<p>Message sent!</p>");
}
else
{
  echo("<p>Message delivery failed...</p>");
}
$URL="../forgot_pwd.php?err=nil";
header ("Location: $URL");
exit;

?>