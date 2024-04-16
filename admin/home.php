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
<br>
<?php include "control/admin_links.php"; ?>
<br>
<?php
$sql="SELECT count(*) FROM requests where Status='new'"; 
$request = mysql_query($sql); 
$row = mysql_fetch_array($request);

echo "<ul>";
echo "<li><a href=show_all.php?qry=new class=b_link><font size=2>New Requests(<b>" . $row[0] . ")</font></b></a>";
echo "</ul>";

$sql="SELECT count(*) FROM requests where Status='accepted'"; 
$request = mysql_query($sql); 
$row = mysql_fetch_array($request);

echo "<ul>";
echo "<li><a href=show_all.php?qry=accepted class=b_link><font size=2>Accepted(<b>" . $row[0] . ")</font></b></a>";
echo "</ul>";

$sql="SELECT count(*) FROM requests where Status='rejected'"; 
$request = mysql_query($sql); 
$row = mysql_fetch_array($request);

echo "<ul>";
echo "<li><a href=show_all.php?qry=rejected class=b_link><font size=2>Rejected(<b>" . $row[0] . ")</font></b></a>";
echo "</ul>";

$sql="SELECT count(*) FROM requests"; 
$request = mysql_query($sql); 
$row = mysql_fetch_array($request);

echo "<ul>";
echo "<li><a href=show_all.php class=b_link><font size=2>View All(<b>" . $row[0] . ")</font></b></a>";
echo "</ul>";


?>
</body>
</html>