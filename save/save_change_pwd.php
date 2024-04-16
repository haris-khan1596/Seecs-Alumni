<?php 
ob_start();
session_start(); 
include "../control/session.php";
include "../control/dbcode.php";
include "../control/main.php";
//--------------------------------------------

$pwd_old=$_POST['txtoldpwd'];
$pwd=$_POST['txtnewpwd'];
$user_id=$_SESSION['user_id'];
//----------------------------------Check old password----------
$sql = "select password from alumni_users where user_id=" . $user_id . "";
$request=mysql_query($sql);
$row=mysql_fetch_array($request);
if($pwd_old!=$row[0])
{
$URL="../change_pwd.php?err=1";
header ("Location: $URL");
exit;
}
//----------------------------------End Check old password----------

$sql = "update alumni_users set password='" . $pwd . "' where user_id=" . $user_id . "";
mysql_query($sql);
//-----------------------------------------------------------------

$URL="../change_pwd.php?err=no";
header ("Location: $URL");
?>