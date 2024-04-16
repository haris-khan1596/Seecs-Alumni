<?php 
ob_start();
session_start(); 

?>
<link href="../style.css" rel="stylesheet" type="text/css">
<?php

include "../control/dbcode.php";
include "../control/main.php";
//--------------------------------------------

$_SESSION['user_type']="N";//new user entry

$user=mysql_real_escape_string($_POST['txtuser']);
$pass=mysql_real_escape_string($_POST['txtpassword']);

//$result="select * from email_accounts where email='" . $email . "' AND password='" & $password & "' ";

// check if card is already made
if($_GET["wz"]=="1")
{
	$qry_chk_card="select count(*) from vw_alumni_card_made where user_name='$user'";
	$result_chk_card=mysql_query($qry_chk_card);
	$row_chk_card=mysql_fetch_array($result_chk_card);
	
	if($row_chk_card[0]>0)
	{
	$URL="../login.php?wz=1&err_cm=1";
	header ("Location: $URL");
	exit;
	}
}
//============

$ssql="select * from alumni_users where user_name='" . $user . "' AND password='" . $pass . "' ";
$result=mysql_query($ssql);
while($row=mysql_fetch_array($result))
{
$user_id=$row['user_id'];
$status=$row['status'];
$alumni_name=return_title("name","personal_data","user_id",$user_id);
}
if(mysql_affected_rows()<=0)
{
echo "<blockquote><p class=b_text><font color=red> User name/Password you entered is not valid please try again </font>";
echo "<br><a href=../login.php class=b_link> back </a></blockquote></p>";
if($_GET["wz"]=="1")
$URL="../login.php?wz=1&err=1";
else
$URL="../login.php?err=1";

header ("Location: $URL");
session_unregister('UserChk');
session_unregister('user_id');
session_unregister('user_name');
session_unregister('wz');
exit;
}
elseif($status=="blocked")
	{
if($_GET["wz"]=="1")
$URL="../login.php?wz=1&err=2";
else
$URL="../login.php?err=2";

	header ("Location: $URL");
	session_unregister('UserChk');
	session_unregister('user_id');
	session_unregister('user_name');
	session_unregister('wz');
	exit;
	}
else
{
$_SESSION['user_id']=$user_id;
$_SESSION['user_name']=$user;
$_SESSION['alumni_name']=$alumni_name;


if($_GET["wz"]=="1")
{
$URL="../personal_info.php";
$_SESSION['wz']="1";
}
else
{
$URL="../welcome.php";
$_SESSION['wz']="";
session_unregister('wz');
}

header ("Location: $URL");
}
?>