<?php 
ob_start();
session_start(); 
include "../control/session.php";
include "../control/dbcode.php";
include "../control/main.php";
//--------------------------------------------

$user_id=$_SESSION['user_id'];
$autonum=autonum("publications","autonum");
$author=$_POST['txtauthor'];
$co_author=$_POST['txtcoauthor'];
$title=$_POST['txttitle'];
$publish_in=$_POST['txtpub_in'];
$orgnizer=$_POST['txtorgnizer'];

$no=$_POST['txtno'];	
$vol=$_POST['txtvol'];
$pp=$_POST['txtpp'];
$dates=save_date($_POST['txtdates']);

//-----------------------------------------------------------------

     $sql = "Insert into publications ";
$sql=$sql . "values(" . $autonum . ",'" . $user_id . "','" . $author . "','" . $co_author . "','" . $title . "','" . $publish_in . "','" . $orgnizer . "' ,";
$sql=$sql . " '" . $no . "','" . $vol . "','" . $pp . "','" . $dates . "')";

mysql_query($sql);

$URL="../publication_info.php";
header ("Location: $URL");
?>