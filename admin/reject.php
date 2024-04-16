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
$sql="update requests set status='rejected',reject_date='" . date("Y-m-d") . "',reject_time='" . date("Hi") . "',uid='" . $uid . "' where rid=" . $rid . ""; 
$request = mysql_query($sql); 

$sql_users="select * from requests where rid=" . $rid . "";
$request=mysql_query($sql_users);
$row = mysql_fetch_array($request);

/*
//--------------------------------------Send Email--------------------------------

$name=$row['name'];
//$to =$row['email'];
$subject = "NUST-SEECS Alumni registration";

$msg="<p><font face=Verdana size=2>Dear " . $name . ",</font></p><p><font face=Verdana size=2>";
$msg=$msg . "It is to inform you that your request for NUST-SEECS Alumni Registration has not been accepted. Please Register again with correct information. For any query regarding registration process please contact <a href=http://niit.edu.pk/alumni/pages/contact.php> NUST-SEECS Alumni Officers</a>";
$msg=$msg . "</font></p><p><font face=Verdana size=2>Best Regards,<br>Webmaster<br>";
$msg=$msg . "NUST School of Electrical Engineering and Computer Science<br><a href=http://niit.edu.pk>http://niit.edu.pk</a></font></p>";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To:' .  $row['email'] . '  ' . "\r\n";
$headers .= 'From: Webmaster NUST-SEECS <webmaster@niit.edu.pk>' . "\r\n";
$headers .= 'Cc: adnan.rasheed@niit.edu.pk' . "\r\n";

if (mail($to, $subject, $msg, $headers))
{
//   echo("<p>Message sent!</p>");
}
else
{
//  echo("<p>Message delivery failed...</p>");
}
*/


$URL="show_all.php?qry=" . $qry . "";
header("location:$URL");
?>
</body>
</html>