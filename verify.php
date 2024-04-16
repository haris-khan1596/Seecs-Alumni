<?php
include "control/dbcode.php";
$sql="select user_name from requests where user_name='" . $_SERVER['QUERY_STRING'] . "' ";
mysql_query($sql);
if(mysql_affected_rows()>0)
echo "<div class=msgbox_red>Sorry! User Name <b>" . $_SERVER['QUERY_STRING'] . "</b> is already in Use please try another</div>";
else
echo "<div class=msgbox_green>Congrats! User Name <b>" . $_SERVER['QUERY_STRING'] . "</b> is available to use</div>";
?>


<link href="style.css" rel="stylesheet" type="text/css" />
<div align="center" style="height:50px"><br>
  <a href="javascript:window.close()" class="black_button" style="color:#FFFFFF">Close Window</a>
</div>
