<?php 
	ob_start();
	session_start(); 
	include "../control/session.php";
	include "../control/dbcode.php";
	include "../control/main.php";
	
//--------------------------------------------

$user_id=$_SESSION['user_id'];
$autonum=autonum("emp_detail","autonum");

$org=$_POST['txtorg'];
$desi=$_POST['txtdesi'];
$from=save_date("01-" . $_POST['txtfrom']);
$to=save_date("01-" . $_POST['txtto']);
$location=$_POST['txtlocation'];

//-----------------------------------------------------------------

     $sql = "Insert into emp_detail ";
$sql=$sql . "values(" . $autonum . ",'" . $user_id . "','" . $org . "','" . $desi . "','" . $from . "','" . $to . "','" . $location . "' )";

mysql_query($sql);


$URL="../emp_info.php";
header ("Location: $URL");
?>