<?php 
session_start(); 
ob_start();
include "../control/session.php";
include "../control/dbcode.php";
include "../control/main.php";
//--------------------------------------------

$user_id=$_SESSION['user_id'];
$sql="SELECT * FROM emp_detail where user_id='" . $user_id . "' "; 
$request = mysql_query($sql);
while($row = mysql_fetch_array($request))
{
     if(isset($_POST["t". $row["autonum"]]))
     {
       $getid = $row["autonum"];
       $sSql="Delete from emp_detail where autonum='" . $getid . "' ";
       mysql_query($sSql);
     }
}

$URL="../emp_info.php";
header ("Location: $URL");

?>