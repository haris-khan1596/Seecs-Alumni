<?php 
ob_start();
session_start(); 
include "../control/dbcode.php";
include "../control/main.php";

if (empty($_SESSION['captcha']) || strtolower(trim($_REQUEST['captcha'])) != $_SESSION['captcha']) {
	header("Location:../forgot_pwd.php?cap_err=1");
	exit;
}
//==============Email Script========================
include("../control/phpmailer/PHPMailer_v5.1/class.phpmailer.php");
function phpmail($to_address,$subj,$msg)
	{
	$mail = new PHPMailer();
	$mail->IsSMTP();	 // set mailer to use SMTP
	$mail->Host = "ssl://smtp.gmail.com"; 	// specify main and backup server
	$mail->Port = 465;	 // set the SMTP port for the GMAIL server
	$mail->SMTPAuth = true;       // enable SMTP authentication
	$mail->Username = "web.admin@seecs.edu.pk";   // your SMTP username or your gmail username
	$mail->Password = "P@ssw0rd3";    // your SMTP password or your gmail password
	$from = "web.admin@seecs.edu.pk"; // Reply to this email
	$to=$to_address; 	// Recipients email ID
	//$name="SEECS Web Admin"; 	// Recipient's name
	$mail->From = $from;
	$mail->FromName = "SEECS Web Admin"; 	// Name to indicate where the email came from when the recepient received
	$mail->AddAddress($to,$name);
//	$mail->AddReplyTo($from,"Web Developer"); //$mail->AddReplyTo("reply@email.com","reply name"); they answer here, optional
	$mail->WordWrap = 50; 	// set word wrap
	$mail->IsHTML(true); 	// send as HTML
	$mail->Subject = $subj;
	$mail->Body = $msg; 	//HTML Body
	$mail->AltBody = "This is the body when user views in plain text format"; 	//Text Body
	return(!$mail->Send());

	}
//============End Email script==============

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

$to=$email_db;

$chk= phpmail($to,$subject, $msg);

			if($chk=="")
			{
			$URL="../forgot_pwd.php?err=nil";
			header ("Location: $URL");
			exit;
			}
			else
			{
			$URL="../forgot_pwd.php?err=failed";
			header ("Location: $URL");
			exit;	
			}


?>