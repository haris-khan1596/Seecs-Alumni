<?php
session_start();
if(!isset($_SESSION['UserChk']))
{
$URL="users/login.php";
header ("Location: $URL");
exit("Unauthorized Access");
}
?>
