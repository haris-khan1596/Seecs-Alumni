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
$uid=$_GET['uid'];
$sql="update alumni_users set status='blocked' where user_id=" . $uid . ""; 
$request = mysql_query($sql); 

$URL="show_all_admin.php?qry=" . $qry . "";
header("location:$URL");
?>
</body>
</html>