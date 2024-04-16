<?php 
ob_start();
session_start(); 
include "../control/session.php";
include "../control/dbcode.php";
include "../control/main.php";

//--------------------------------------------

$user_id=$_SESSION['user_id'];
$autonum=autonum("academic_detail","autonum");

$degree=$_POST['txtdegree'];
$equalto=$_POST['cboequal'];
$from=save_date("01-" . $_POST['txtfrom']);
$to=save_date("01-" . $_POST['txtto']);
$gpa=$_POST['txtgpa'];
$major=$_POST['txtmajor'];
$uni=$_POST['txtuni'];

//-----------------------------------------------------------------

     $sql = "Insert into `academic_detail` ";
$sql=$sql . "values(" . $autonum . ",'" . $user_id . "','" . $degree . "','" . $equalto . "','" . $from . "','" . $to . "','" . $gpa . "','" . $major . "','" . $uni . "' )";

mysql_query($sql);

$URL="../academic_detail.php";
header ("Location: $URL");
?>