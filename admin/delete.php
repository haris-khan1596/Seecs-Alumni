<?php 
ob_start();
session_start(); 

if($_SESSION['role']<>"webmaster")
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
//$qry=$_GET['qry'];
//$rid=$_GET['rid'];
$uid=mysql_real_escape_string($_GET['uid']);
$cid=mysql_real_escape_string($_GET['uid']);


$sql="delete from alumni_users where user_id=" . $uid . ""; 
$request = mysql_query($sql); 

$sql="delete from personal_data where user_id=" . $uid . ""; 
$request = mysql_query($sql); 

$sql="delete from academic_detail where user_id=" . $uid . ""; 
$request = mysql_query($sql); 

$sql="delete from emp_detail where user_id=" . $uid . ""; 
$request = mysql_query($sql); 

$sql="delete from research_experience where user_id=" . $uid . ""; 
$request = mysql_query($sql); 

$sql="delete from publications where user_id=" . $uid . ""; 
$request = mysql_query($sql); 

$URL="show_all_admin.php?cid=" . $cid . "";
header("location:$URL");
?>
</body>
</html>