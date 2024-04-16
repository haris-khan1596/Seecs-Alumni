<?php 
ob_start();
session_start(); 
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
<?php include "control/admin_links.php" ?>
</body>
</html>