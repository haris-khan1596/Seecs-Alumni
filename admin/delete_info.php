<?php 
ob_start();
session_start(); 
include "../control/dbcode.php";

$id=$_GET["id"];
$sql="delete from post_request where autoid=" . $id;
mysql_query($sql);
header("location:show_all_info.php");


?>
