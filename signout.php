<?php
session_start();
session_unregister('UserChk');
session_unregister('user_id');
session_unregister('user_name');
session_unregister('wz');

unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
session_destroy();

$URL="index.php";
header ("Location: $URL");
?>