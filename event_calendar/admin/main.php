<?php
include "db_code.php";

function autonum($table,$field)
{
$sql="select max( " . $field . " ) from " . $table . " ";
$request=mysql_query($sql);
$row=mysql_fetch_array($request);
return $row[0]+1;
}

function autocatid($cat)
{
$sql="select max(catid) from pic where cat=" . $cat . " ";
$request=mysql_query($sql);
$row=mysql_fetch_array($request);
return $row[0]+1;
}

?>