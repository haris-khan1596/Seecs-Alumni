<?php
session_start();
if(!isset($_SESSION['user_id']))
{
//$URL="http://dev.seecs.edu.pk/alumni/login.php";
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
session_destroy();

$url= $src . "/login.php";
header ("Location: $URL");
exit("Unauthorized Access");
}
?>
