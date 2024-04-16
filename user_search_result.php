<?php 
$cat="10";
session_start(); 
include "control/session.php";
?>
<html>
<head>
<title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) Alumni </title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="table_main">
  <tr>
    <td height="0" colspan="3" align="left" valign="top">
<?php include "header.php"; ?>
	</td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top"> 
<?php include "../header2.php"; ?>
    </td>
    <td width="4" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="table_left">
<span class="right_bgcolor">
<?php include "control/right.php"; ?>
</span>	</td>
    <td align="left" valign="top"><table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
      <tr>
        <td height="323" valign="top"><br>  
 <!-- =========================================================== -->
<?php

include "control/dbcode.php";
include "control/main.php";

echo "<table border=0 width=90%><tr><td>" . "<p class=b_heading> Alumni Search Result</p>" . "</td><td><div align=right><a href=javascript:history.back()>Back</a></div></td></tr></table><br>";

$searchby=$_POST['cbosearch'];
$search=$_POST['txtsearch'];

$sql="SELECT * from personal_data where " . $searchby . " like '%" . $search . "%' order by " . $searchby . ""; 

$result = mysql_query($sql); 
if(mysql_affected_rows()<=0){
echo "<font color=red>Sorry no record found!</font>";
exit;
}

echo "<div class='round_div b_gradient'>";

echo "<table border=0 class='b_text' width=98% cellpadding=5 align=center>";
echo "<tr>";
echo "<td width=180><b>Name</b></td>";
echo "<td width=180><b>Father Name</b></td>";
echo "<td width=120><b>Year of Passing</b></td>";
echo "<td width=100><b>Degree Name</b></td>";
echo "</tr>";

while($row = mysql_fetch_array($result))
{
echo "<tr>";
echo "<td><a class=b_link href=std_detail.php?uid=" . $row['user_id'] . ">" . $row['name'] . "</a></td>";
echo "<td>" . $row['fname'] . "</td>";
echo "<td>" . $row['year_passing_niit'] . "</td>";
echo "<td>" . $row['last_degree_niit'] . "</td>";
echo "</tr>";
}
echo "</table>";
echo "</div>";
?>
 <!-- =========================================================== -->        </td>
      </tr>
    </table> <br>
<br>
   
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">
<span class="b_link"><?php include "footer.php" ?>
	</span></td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">
<span class="b_link"><?php include "../footerlinks.php"; ?>
	</span></td>
  </tr>
</table>

</body>
</html>