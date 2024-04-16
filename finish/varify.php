<?php 
ob_start();
session_start(); 
session_id();
include "links.php" ;
include "../control/dbcode_temp.php";
include "../control/main.php";
//--------------------------------------------
?>
<link href="../style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 5px;
	margin-top: 5px;
}
.style3 {font-size: 8px}
.style9 {font-size: 10px}
-->
</style>
<?php

$sid=session_id();

$sql="select * from entry_log where sid='" . $sid . "' ";
mysql_query($sql);
if(mysql_affected_rows()<=0)
{
echo "<p>";
echo "<table border=1 class=b_text>";

echo "<tr><td>";
echo "<a href=../personal_info.php class=b_link>Personal Information</a>";
echo "</td><td>";
echo "<img src=../control/cross.gif>";
$varify=0;
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../pic.php class=b_link>Picture";
echo "</td><td>";
echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../emp_info.php class=b_link>Employment Detail";
echo "</td><td>";
echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../family_info.php class=b_link>Family Detail";
echo "</td><td>";
echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../academic_awards.php class=b_link>Academic Awards";
echo "</td><td>";
echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../academic_detail.php class=b_link>Academic Detail</a>";
echo "</td><td>";
echo "<img src=../control/cross.gif>";
$varify=0;
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../teaching_info.php class=b_link>Teaching Experience";
echo "</td><td>";
echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../research_info.php class=b_link>Research Experience";
echo "</td><td>";
echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../thesis_info.php class=b_link>Thesis";
echo "</td><td>";
echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../reference_info.php class=b_link>References";
echo "</td><td>";
echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../address_info.php class=b_link>Address";
echo "</td><td>";
echo "<img src=../control/cross.gif>";
$varify=0;
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../publication_info.php class=b_link>Publications";
echo "</td><td>";
echo "<img src=../control/cross.gif>";
echo "</td></tr>";
echo "<tr><td>";

echo "</table></tr></td>";

echo "<p class=b_link><font color=red>Unable to Proceed your CV Because, the Mandatory Information is Missing</font></p>";

exit();
}
else
$result=mysql_query($sql);

echo "<p>";
echo "<table border=1 class=b_text>";

while($row=mysql_fetch_array($result))
{

echo "<tr><td>";
echo "<a href=../personal_info.php class=b_link>Personal Information</a>";
echo "</td><td>";
	if($row['personal_data']==1)
		echo "<img src=../control/tick.gif>";
		else{
		echo "<img src=../control/cross.gif>";
		$varify=0;}
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../pic.php class=b_link>Picture";
echo "</td><td>";
	if($row['pic']==1)
		echo "<img src=../control/tick.gif>";
		else
		echo "<img src=../control/cross.gif>";

echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../emp_info.php class=b_link>Employment Detail";
echo "</td><td>";
	if($row['emp_detail']==1)
		echo "<img src=../control/tick.gif>";
		else
		echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../family_info.php class=b_link>Family Detail";
echo "</td><td>";
	if($row['family_detail']==1)
		echo "<img src=../control/tick.gif>";
		else
		echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../academic_awards.php class=b_link>Academic Awards";
echo "</td><td>";
	if($row['academic_awards']==1)
		echo "<img src=../control/tick.gif>";
		else
		echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../academic_detail.php class=b_link>Academic Detail";
echo "</td><td>";
	if($row['academic_detail']==1)
		echo "<img src=../control/tick.gif>";
		else{
		echo "<img src=../control/cross.gif>";
		$varify=0;}
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../teaching_info.php class=b_link>Teaching Experience";
echo "</td><td>";
	if($row['teaching_experience']==1)
		echo "<img src=../control/tick.gif>";
		else
		echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../research_info.php class=b_link>Research Experience";
echo "</td><td>";
	if($row['research_experience']==1)
		echo "<img src=../control/tick.gif>";
		else
		echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../thesis_info.php class=b_link>Thesis";
echo "</td><td>";
	if($row['thesis']==1)
		echo "<img src=../control/tick.gif>";
		else
		echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../reference_info.php class=b_link>References";
echo "</td><td>";
	if($row['references_detail']==1)
		echo "<img src=../control/tick.gif>";
		else
		echo "<img src=../control/cross.gif>";
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../address_info.php class=b_link>Address";
echo "</td><td>";
	if($row['address']==1)
		echo "<img src=../control/tick.gif>";
		else{
		echo "<img src=../control/cross.gif>";
		$varify=0;}
echo "</td></tr>";

echo "<tr><td>";
echo "<a href=../publication_info.php class=b_link>Publications";
echo "</td><td>";
	if($row['publication']==1)
		echo "<img src=../control/tick.gif>";
		else
		echo "<img src=../control/cross.gif>";
echo "</td></tr>";
echo "<tr><td>";

}

echo "</td></tr></table><p class=b_text>";

if($varify=="0"){
echo "<font color=red>Unable to Proceed your CV Because, the Mandatory Information is Missing</font>";
}
else
{
echo "Please Varify all your information before proceeding";
?>
<br><br><input type=button name=cmdproceed value=Submit CV onclick="javascript:location='save_db.php'">
<?php
}

//$URL="../pic.php";
//header ("Location: $URL");
?>