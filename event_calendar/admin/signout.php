<?php
session_start();
session_unregister('UserChk');
echo "Signout Successfull";
echo "<br><a href=login.php>Login </a>";
?>