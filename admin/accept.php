<?php 
ob_start();
session_start(); 

if($_SESSION['role']<>"webmaster" and $_SESSION['role']<>"exam")
{
header("Location:signout.php");
exit;
}

include "session.php";
include "../control/dbcode.php";
include "../control/main.php";
?>

<html>
<head>
<title></title>

<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: large;
}
-->
</style>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php
$qry=$_GET['qry'];
$rid=$_GET['rid'];
$uid=$_SESSION['uid'];
$sql="update requests set status='accepted',accept_date='" . date("Y-m-d") . "',accept_time='" . date("Hi") . "',uid='" . $uid . "' where rid=" . $rid . ""; 
$request = mysql_query($sql); 
//--------------------------------------Add Entry in User Table--------------------------------
$sql_users="select * from requests where rid=" . $rid . "";
$request=mysql_query($sql_users);
$row = mysql_fetch_array($request);

$user_id=autonum("alumni_users","user_id");
$user_name=$row['user_name'];
$password=$row['password'];

$sql_insert="insert into alumni_users values(" . $user_id . ", '" . $user_name . "','" . $password . "',1,'','" . date("Y-m-d") . "','" . date("Hi") . "' )";
mysql_query($sql_insert);

//--------------------------------------Add Entry in Personal Data Table--------------------------------
$sql_p="select * from requests where rid=" . $rid . "";
$request_p=mysql_query($sql_p);
$row_p = mysql_fetch_array($request_p);

$autonum=autonum("personal_data","autonum");
$reg1=$row_p['reg1'];
$reg2=$row_p['reg2'];
$reg3=$row_p['reg3'];
$reg4=$row_p['reg4'];
$name=$row_p['name'];
$fname=$row_p['fname'];
$dob=$row_p['dob'];
$email=$row_p['email'];
$facebook=$row_p['facebook'];


$sql_insert_p="insert into personal_data(autonum,user_id,reg1,reg2,reg3,reg4,name,fname,dob,sec_email,facebook) values(" . $autonum . "," . $user_id . ", '" . $reg1 . "','" . $reg2 . "'," . $reg3 . ",'" . $reg4 . "','" . $name . "','" . $fname . "','" . $dob . "','" . $email . "','" . $facebook . "' )";
mysql_query($sql_insert_p);

//--------------------------------------Send Email--------------------------------

$name=$row['name'];
//$to =$row['email'];
$subject = "NUST-SEECS Alumni registration confirmation";
$to_its='sajid.rauf@seecs.edu.pk';

$msg="<p><font face=Verdana size=2>Dear " . $name . ",</font></p><p><font face=Verdana size=2>";
$msg=$msg . "I am pleased to share with you that your request for NUST-SEECS Alumni Registration has been accepted. Now you can create your profile using the following information</font></p>";
$msg=$msg . "<p><font face=Verdana size=2>URL: <a href=http://alumni.seecs.nust.edu.pk/login.php>http://alumni.seecs.nust.edu.pk/login.php</a> <br>";
$msg=$msg . "User Name: " . $user_name . "<br>";
$msg=$msg . "Password:&nbsp;&nbsp; " . $password . "";
$msg=$msg . "</font></p><p><font face=Verdana size=2>Best Regards,<br>Webmaster<br>";
$msg=$msg . "NUST School of Electrical Engineering and Computer Science<br><a href=http://alumni.seecs.nust.edu.pk>http://alumni.seecs.nust.edu.pk</a></font></p>";

$msg_its=$msg_its . "<p><font face=Verdana size=2>URL: <a href=http://alumni.seecs.nust.edu.pk/login.php>http://alumni.seecs.nust.edu.pk/login.php</a> <br>";
$msg_its=$msg_its . "User Name: " . $user_name . "<br>";
$msg_its=$msg_its . "E-Mail:&nbsp;&nbsp; " . $row['email']  . "";
$msg_its=$msg_its . "</font></p><p><font face=Verdana size=2>Best Regards,<br>Webmaster<br>";
$msg_its=$msg_its . "NUST School of Electrical Engineering and Computer Science<br><a href=http://alumni.seecs.nust.edu.pk>http://alumni.seecs.nust.edu.pk</a></font></p>";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To:' .  $row['email'] . '  ' . "\r\n";
$headers .= 'From: Webmaster NUST-SEECS <webmaster@seecs.edu.pk>' . "\r\n";
$headers .= 'Bcc: adnan.rasheed@seecs.edu.pk' . "\r\n";

$headers_its  = 'MIME-Version: 1.0' . "\r\n";
$headers_its .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers_its .= 'To:' .  $to_its . '  ' . "\r\n";
$headers_its .= 'From: Webmaster NUST-SEECS <webmaster@seecs.edu.pk>' . "\r\n";
$headers_its .= 'Bcc: adnan.rasheed@seecs.edu.pk' . "\r\n";


if (mail($to, $subject, $msg, $headers))
{
mail($to_its, $subject, $msg_its, $headers_its);
//   echo("<p>Message sent!</p>");
}
else
{
//  echo("<p>Message delivery failed...</p>");
}

$URL="show_all.php?qry=" . $qry . "";
header("location:$URL");

?>

</body>
</html>