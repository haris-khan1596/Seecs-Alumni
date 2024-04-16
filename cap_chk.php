<?php
session_start();

$cap_val=$_GET["cap_val"];

if ($cap_val != $_SESSION['captcha']) 
echo "false";
else
echo "true";

?>

