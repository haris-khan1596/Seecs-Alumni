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
<p><br>
  <?php
include "control/admin_links.php";
$uid=$_POST['uid'];
$pw=$_POST['txtnewpw'];
$sql="update alumni_users set password='" . $pw . "' where user_id=" . $uid . "";
mysql_query($sql);
echo "<blockquote><p class=b_text><font color=red>Password Reset Successfully</font></p>";
?>
</body>
</html>