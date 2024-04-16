<?php
ob_start();
session_start();
session_unregister('UserChk');
session_unregister('role');
session_unregister('uid');
echo "Signout Successfull";
$URL="index.php";
header("location:$URL");
?>