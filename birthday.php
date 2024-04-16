<?php
//include "control/main.php";
function getmonth($m=0) { 
return (($m==0 ) ? date(M) : date(M, mktime(0,0,0,$m))); 
} 

include "control/dbcode.php";
$cnt=0;
$sql="select reg3,name, DATE(CONCAT(YEAR(CURDATE()),'-',MONTH(dob),'-',DAY(dob))) as new_date, MONTH(dob) as mdob,DAY(dob) as ddob from personal_data where DATE(CONCAT(YEAR(CURDATE()),'-',MONTH(dob),'-',DAY(dob)))=CURDATE() order by date(CONCAT(YEAR(CURDATE()),'-',MONTH(dob),'-',DAY(dob))) limit 0,3";
$request=mysql_query($sql);
if(mysql_affected_rows()>0)
{
	while($row=mysql_fetch_array($request))
	{
	if($cnt<1){
	echo "<br><b>Dear </b>";
	}
	echo "<b>" . $row[1] . " </b>" ;
	if($cnt<>mysql_affected_rows()-1){
	echo "<b> , </b> " ;
	}
	$cnt = $cnt+1;
	}
	echo "<br><br><span style=margin-top:2px><i>Happy Birthday</i></span> !!<br>NUST-SEECS Alumni family wishes you a wonderful day filled with happiness and joys.
	On your birthday, NUST-SEECS wishes you a wonderful and prosperous life ahead.";
}
else
{
	$sql="SELECT distinct(concat(reg1,reg2,reg3,reg4)) AS RegNo,reg3, personal_data.name, DATE(CONCAT(YEAR(CURDATE()),'-',MONTH(dob),'-',DAY(dob))) AS new_date, MONTH(dob) AS mdob, DAY(dob) AS ddob from personal_data where DATE(CONCAT(YEAR(CURDATE()),'-',MONTH(dob),'-',DAY(dob)))>CURDATE() GROUP BY personal_data.reg1, personal_data.reg2, personal_data.reg3, personal_data.reg4
 order by date(CONCAT(YEAR(CURDATE()),'-',MONTH(dob),'-',DAY(dob))) limit 0,3";
	
	$request=mysql_query($sql);
	if(mysql_affected_rows()>0)
	{
		echo "<p><b>Up Coming Birth days</b></p>";
		echo "<table border=0 width=95% class=b_text cellpadding=1>";
		while($row=mysql_fetch_array($request))
		{
		echo "<tr>";
		echo "<td>" . $row["2"] . "</td>";
		//echo "<td width=45>" . return_title("class_name","class_all","class_id",$row[1]) . "</td>";
		echo "<td width=20%>" . $row["ddob"] . ", " . getmonth($row["mdob"]) . "</td>";
		echo "</tr>";
		}
		echo "</table>";
	}

}


?>