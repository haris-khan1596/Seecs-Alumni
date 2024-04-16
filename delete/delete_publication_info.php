<?php 
ob_start();
session_start(); 
include "../control/session.php";
include "../control/dbcode.php";
include "../control/main.php";
//--------------------------------------------

$user_id=$_SESSION['user_id'];
$sql="SELECT * FROM publications where user_id='" . $user_id . "' "; 
$request = mysql_query($sql);
while($row = mysql_fetch_array($request))
{
     if(isset($_POST["t". $row["autonum"]]))
     {
       $getid = $row["autonum"];
       $sSql="Delete from publications where autonum='" . $getid . "' ";
       mysql_query($sSql);
     }
}

$URL="../publication_info.php";
header ("Location: $URL");

?>