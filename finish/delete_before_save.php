<?php

$sql="delete from p_academic_awards where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from p_academic_detail where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from p_address where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from p_emp_detail where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from p_entry_log where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from p_family_detail where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from p_pic where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from p_publications where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from p_reference_detail where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from p_research_experience where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from p_teaching_experience where sid='" . $sid . "' ";
mysql_query($sql);
$sql="delete from p_thesis where sid='" . $sid . "' ";
mysql_query($sql);

$sql="delete from p_personal_data where sid='" . $sid . "' ";
mysql_query($sql);
?>