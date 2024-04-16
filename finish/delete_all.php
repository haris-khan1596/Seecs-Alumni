<?php
include "../control/dbcode_temp.php";

//-----------------Delete Temp Data---------------------

$sql="delete from academic_awards";
mysql_query($sql);
$sql="delete from academic_detail";
mysql_query($sql);
$sql="delete from address";
mysql_query($sql);
$sql="delete from emp_detail";
mysql_query($sql);
$sql="delete from entry_log";
mysql_query($sql);
$sql="delete from family_detail";
mysql_query($sql);
$sql="delete from pic";
mysql_query($sql);
$sql="delete from publications";
mysql_query($sql);
$sql="delete from reference_detail";
mysql_query($sql);
$sql="delete from research_experience";
mysql_query($sql);
$sql="delete from teaching_experience";
mysql_query($sql);
$sql="delete from thesis";
mysql_query($sql);

$sql="delete from personal_data";
mysql_query($sql);

//----------------------Delete Parmanent Data

$sql="delete from p_academic_awards";
mysql_query($sql);
$sql="delete from p_academic_detail";
mysql_query($sql);
$sql="delete from p_address";
mysql_query($sql);
$sql="delete from p_emp_detail";
mysql_query($sql);
$sql="delete from p_entry_log";
mysql_query($sql);
$sql="delete from p_family_detail";
mysql_query($sql);
$sql="delete from p_pic";
mysql_query($sql);
$sql="delete from p_publications";
mysql_query($sql);
$sql="delete from p_reference_detail";
mysql_query($sql);
$sql="delete from p_research_experience";
mysql_query($sql);
$sql="delete from p_teaching_experience";
mysql_query($sql);
$sql="delete from p_thesis";
mysql_query($sql);

$sql="delete from p_personal_data";
mysql_query($sql);

?>
