<?php
session_start();
if(!isset($_SESSION['UserChk']))
{
$URL="login.php";
header ("Location: $URL");
exit("Unauthorized Access");
}
?>
