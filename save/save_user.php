<?php 
ob_start();
session_start(); 
include "../control/session.php" ;
include "../control/dbcode.php";
include "../control/main.php";

//--------------------------------------------

$autonum=autonum("users","autonum");

$email=$_POST['txtemail'];
$user_name=$_POST['txtuser_name'];
$pass=$_POST['txtpassword'];
$role="1";

$result="select * from users where email='" . $email . "' ";
mysql_query($result);
if(mysql_affected_rows()>0)
{
echo "E-Mail address you entered is already used, unable to create your Account";
exit;
}

//-----------------------------------------------------------------

$sql = "Insert into users values(" . $autonum . ",'" . $email . "','" . $user_name . "','" . $pass . "'," . $role . " )";
mysql_query($sql);

$URL="../personal_info.php";
header ("Location: $URL");
?>