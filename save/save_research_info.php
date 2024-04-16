<?php 
ob_start();
session_start(); 
session_id();
include "../control/session.php";
include "../control/dbcode.php";
include "../control/main.php";
//--------------------------------------------

$user_id=$_SESSION['user_id'];
$autonum=autonum("research_experience","autonum");
$degree=$_POST['txtdegree'];
$post=$_POST['txtpost'];
$from=save_date("01-" . $_POST['txtfrom']);
$to=save_date("01-" . $_POST['txtto']);
$uni=$_POST['txtuni'];

//-----------------------------------------------------------------

     $sql = "Insert into research_experience ";
$sql=$sql . "values(" . $autonum . ",'" . $user_id . "','" . $degree . "','" . $post . "','" . $from . "','" . $to . "','" . $uni . "' )";

mysql_query($sql);


$URL="../research_info.php";
header ("Location: $URL");
?>