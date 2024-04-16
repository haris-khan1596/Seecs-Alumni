<?php
ob_start();
session_start();


if (empty($_SESSION['captcha']) || strtolower(trim($_REQUEST['captcha'])) != $_SESSION['captcha']) {
	header("Location:login.php?cap_err=1");
	exit;
}


?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php

include "../control/dbcode.php";

if (isset($_POST["username"]))
$username= mysql_real_escape_string($_POST["username"]);
if (isset($_POST["password"]))
$password= mysql_real_escape_string($_POST["password"]);

/*--------- DATABASE CONNECTION INFO---------*/ 


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
$uid=$row['uid'];
$role=$row['role'];
$user_name=$row['user_name'];

}
if ($chk=="" )
{
session_unregister('UserChk');
$URL="login.php?err=1";
header ("Location: $URL");
}
else
{
$_SESSION['uid']=$uid;
$_SESSION['UserChk']=1;
$_SESSION['role']=$role;
$_SESSION['username']=$user_name;
$URL="admin_home.php";
header ("Location: $URL");
}
?>




<p></p>
</body>
</html>
