<?php 
ob_start();
session_start(); 


$submit = $_POST["submit"];

if($submit){setSessionVars();} 
function setSessionVars() {
 
    foreach($_POST as $fieldname => $fieldvalue) {
        $_SESSION['form'][$fieldname] = $fieldvalue;
        }   
    }

include "../control/dbcode.php";
include "../control/main.php";

include("../control/phpmailer/PHPMailer_v5.1/class.phpmailer.php");
include ("../control/phpmailer/mail_function.php");

if (empty($_SESSION['captcha']) || strtolower(trim($_REQUEST['captcha'])) != $_SESSION['captcha']) {
	header("Location:../register.php?cap_err=1");
	exit;
}




//--------------------------------------------

function getIp()
{

$ip_address=$_SERVER['HTTP_X_FORWARDED_FOR'];

if ($ip_address==NULL){
$ip_address=$_SERVER[REMOTE_ADDR]; }
return $ip_address;
}


$rid=autonum("requests","rid");
$reg1=mysql_real_escape_string($_POST['txtreg1']);
$reg2=mysql_real_escape_string($_POST['txtreg2']);
$reg3=mysql_real_escape_string($_POST['cboreg3']);
$reg4=mysql_real_escape_string($_POST['txtreg4']);
$name1=mysql_real_escape_string($_POST['txtname']);
$fname=mysql_real_escape_string($_POST['txtfname']);
$dob=$_POST['cboyear1'] . "/" . $_POST['cbomonth1'] . "/" . $_POST['cboday1'];
$email=$_POST['txtemail'];
$mobile=$_POST['txtmobile'];
$home=$_POST['txthome'];
$facebook=$_POST['txtfacebook'];
$user_name=mysql_real_escape_string($_POST['txtuser_name']);
$password=$_POST['txtpassword'];

if($name1=="")
exit("Unauthorized access");

$result="select user_name from requests where user_name='" . $user_name . "' ";
mysql_query($result);
if(mysql_affected_rows()>0)
{
$URL="../register.php?err=1";
header("location:$URL");
exit;
}

//-----------------------------------------------------------------

$sql = "Insert into requests values(" . $rid . ",'" . $reg1 . "','" . $reg2 . "'," . $reg3 . ",'" . $reg4 . "','" . $name1 . "','" . $fname . "','" . $dob . "','',
		'" . $email . "','" . $mobile . "','" . $home . "','" . $facebook . "','" . $user_name . "'
		,'" . $password . "','new','" . date("Y-m-d") . "','" . date("Hi") . "',NULL,'NULL',NULL,'NULL','NULL' )";
//echo $sql;
mysql_query($sql);
//exit;


//--------------------------------------Send Email--------------------------------

$name=$name1;
$to =$email;

$subject = "NUST-SEECS Alumni registration Request";
$subject_wm = "Alumni Request: " . "sIP: " . getIp() . "- pIP:" . $_SERVER[REMOTE_ADDR];

$msg="<p><font face=Verdana size=2>Dear " . $name . ",</font></p><p><font face=Verdana size=2>";
$msg=$msg . "Your request for NUST-SEECS Alumni Registration has been received and forwarded to exams department for verification. After confirmation, we will send you an email including your login information and details of further procedure.";
$msg=$msg . "</font></p><p><font face=Verdana size=2>Best Regards,<br>Webmaster<br>";
$msg=$msg . "NUST School of Electrical Engineering and Computer Science<br><a href=http://alumni.seecs.nust.edu.pk>http://alumni.seecs.nust.edu.pk</a></font></p>";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To:' .  $email . '  ' . "\r\n";
$headers .= 'From: Webmaster NUST-SEECS <webmaster@seecs.edu.pk>' . "\r\n";
$headers .= 'Cc: adnan.rasheed@seecs.edu.pk,fatima.tauqir@seecs.edu.pk,shafaq.soomro@seecs.edu.pk' . "\r\n";


$chk= phpmail($to,$subject, $msg);
			if($chk=="")
			{
			session_unset($_SESSION['form']);
			session_unset('form');
			$URL="../msg_request.php?err=0";
			header ("Location: $URL");
			}
			else
			{
			session_unset($_SESSION['form']);
			session_unset('form');
			$URL="../msg_request.php?err=1";
			header ("Location: $URL"); 	
			}
/*
if (mail($to, $subject, $msg, $headers))
{
//   echo("<p>Message sent!</p>");
}
else
{
//  echo("<p>Message delivery failed...</p>");
}
*/



?>