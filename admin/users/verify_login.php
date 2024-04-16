<?php
ob_start();
session_start();
include "../../control/dbcode_temp.php";
?>
<html>
<head>
<title>Online CV Form Admin Area</title>
</head>

<body>
<?php

if (isset($_POST["username"]))
$username=$_POST["username"];
if (isset($_POST["password"]))
$password=$_POST["password"];

$request = mysql_query("select * from user where name='" . $username . "' AND password='" . $password . "' "); 
while($row = mysql_fetch_array($request))
{
$chk= $row[1];	
}
if ($chk=="" )
{
echo "<font color=red>Login Denied Please ReCheck User Name and Password <br> <a href=login.php>login again </a>";
session_unregister('UserChk');
}
else
{
$_SESSION['UserChk']=1;

if($username=="adnan")
$URL="../select_admin.php";
else
$URL="../select.php";

header ("Location: $URL");
}
?>

<p></p>
</body>
</html>
