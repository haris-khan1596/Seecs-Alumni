<?php

$sql="delete from academic_awards where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from academic_detail where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from address where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from emp_detail where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from entry_log where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from family_detail where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from pic where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from publications where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from reference_detail where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from research_experience where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from teaching_experience where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from thesis where sid='" . $sid . "' ";
mysql_query($sql);

$sql="delete from personal_data where sid='" . $sid . "' ";
mysql_query($sql);

?>