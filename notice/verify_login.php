<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php

if (isset($_POST["username"]))
$username=$_POST["username"];
if (isset($_POST["password"]))
$password=$_POST["password"];

/*--------- DATABASE CONNECTION INFO---------*/ 
$hostname="localhost"; 
$mysql_login="root"; 
$mysql_password="BingoBus"; 
$database="alumni"; 

// connect to the database server 
if (!($db = mysql_pconnect($hostname, $mysql_login , $mysql_password))){ 
  die("Can't connect to database server.");     
}else{ 
  // select a database 
    if (!(mysql_select_db("$database",$db))){ 
     die("Can't connect to database."); 
    } 
} 

$request = mysql_query("select * from admin_users where user_name='" . $username . "' AND password='" . $password . "' "); 
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
include "links.php";
}
?>




<p></p>
</body>
</html>
