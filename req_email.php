<?php 
	
	session_start();
	
	include("control/dbcode.php");
	include("control/main.php");
	
	include("control/phpmailer/PHPMailer_v5.1/class.phpmailer.php");
	include ("control/phpmailer/mail_function.php");
	
	if (empty($_SESSION['captcha']) || strtolower(trim($_REQUEST['captcha'])) != $_SESSION['captcha']) {
	header("Location:get_reg_no.php?cap_err=1");
	exit;
}
	
	
	$txtname = mysql_real_escape_string($_POST['txtpop_name']);
	$txtyear = mysql_real_escape_string($_POST['txtpop_year']);
	$txtdicipline = mysql_real_escape_string($_POST['txtpop_dicipline']);
	$txtdegree = mysql_real_escape_string($_POST['txtpop_degree']);
	$txtpop_contact = mysql_real_escape_string($_POST['txtpop_contact']);
	$txtemail = mysql_real_escape_string($_POST['txtpop_email']);
	$txtmsg = mysql_real_escape_string($_POST['txtpop_msg']);
	
//	echo $txtname . "<br>" . $txtyear  . "<br>" . $txtdicipline . "<br>" . $txtdegree . "<br>" . $txtemail . "<br>" . $txtmsg . "<br>";
	
	//$to= "shafaq.soomro@seecs.edu.pk";
	$to= "adnan.rasheed@seecs.edu.pk";
	$subject = "Request for Registration No";
	$msg= "A new Registration No request is received. <br><br><b>Name:</b> ". $txtname . "<br>
	<b>Year of Graduation:</b> ". $txtyear . "<br><b>Discipline:</b> ". $txtdicipline . "<br>
	<b>Degree:</b> ". $txtdegree . "<br><b>Email:</b> ". $txtemail . "<br>
	<b>Contact No:</b> ". $txtpop_contact . " <br><b>Message:</b> ". $txtmsg . "<br>	
	 ";
	
		$chk= phpmail($to,$subject, $msg);
			if($chk=="")
			header("location:register.php?email_err=0"); 
			else
			header("location:register.php?email_err=1"); 	
?>