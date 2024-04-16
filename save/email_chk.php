<?php 
ob_start();
session_start(); 

?>
<link href="../style.css" rel="stylesheet" type="text/css">
<?php

include "../control/top.php" ;
include "../control/dbcode.php";
include "../control/main.php";
//--------------------------------------------

$_SESSION['s_email']=$_POST['txtemail'];
$_SESSION['user_type']="N";//new user entry

$email=$_POST['txtemail'];
$pass=$_POST['txtpassword'];

//$result="select * from email_accounts where email='" . $email . "' AND password='" & $password & "' ";
$result="select * from email_accounts where email='" . $email . "' AND password='" . $pass . "' ";

mysql_query($result);
if(mysql_affected_rows()<=0)
{
echo "<blockquote> <p class=b_text> E-Mail/Password you entered is not valid please try again</p>";
echo "<a href=../email.php class=b_link> back </a></blockquote>";
exit;
}
else

//------------------------Check email already used----

$result2="select * from users where email='" . $email . "' ";

mysql_query($result2);
if(mysql_affected_rows()>0)
{
echo "<blockquote><p class=b_text>E-Mail you entered is already used, only one alumni account is authorized against one NUST-SEECS email</p>";
echo "<a href=../email.php class=b_link>back </a> ";
echo " | <a href=../login.php class=b_link> Login</a></blockquote>";
exit;
}
//----------------------------------------------------
{
$_SESSION['s_email']=$email;
$URL="../user_info.php";
header ("Location: $URL");
}

?>

