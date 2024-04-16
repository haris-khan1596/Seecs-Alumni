<?php
$cat="10"; 
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
    <td width="10" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="table_left">
<span class="right_bgcolor">
<?php include "control/right.php"; ?>
</span>	</td>
    <td width="621" align="left" valign="top"><table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
      <tr>
        <td width="543" height="323" valign="top"><br>  
 <!-- =========================================================== -->
<?php

include "control/dbcode.php";
include "control/main.php";
$user_id1=$_GET['uid'];
$sql="select * from personal_data where user_id = " . $user_id1 . "";
$result = mysql_query($sql); 
$row=mysql_fetch_array($result);
echo "<table border=0 width=90%><tr><td>" . "<p class=b_heading> Profile of " . $row["name"] . "</p>" . "</td><td><div align=right><a href=javascript:history.back()>Back</a></div></td></tr></table><br>";

echo "<div class='round_div b_gradient'>";

echo "<table border=0 cellpadding=5 class=b_text width=90%>";
echo "<tr>";
echo "<td width=200><b>Registration No</b></td>";
echo "<td>" . $row['reg1'] . "-" . $row['reg2'] . "-" . return_title("class_name","class_all","class_id",$row["reg3"]) . "-" . $row['reg4'] . "</td>";
echo "</tr><tr>";
echo "<td><b>Name</b></td>";
echo "<td>" . $row['name'] . "</td>";
echo "</tr><tr>";
echo "<td><b>Father's Name</b></td>";
echo "<td>" . $row['fname'] . "</td>";
echo "</tr><tr>";

echo "<td><b>Gender</b></td>";
echo "<td>" . $row['gender'] . "</td>";
echo "</tr><tr>";

echo "<td><b>Blood Group</b></td>";
echo "<td>" . $row['blood_group'] . "</td>";
echo "</tr><tr>";



echo "<td><b>Marital Status</b></td>";
echo "<td>" . $row['marital_status'] . "</td>";
echo "</tr><tr>";

echo "<td><b>Current Job Title</b></td>";
echo "<td>" . $row['job_title'] . "</td>";
echo "</tr><tr>";

echo "<td><b>Current Employer</b></td>";
echo "<td>" . $row['job_company_name'] . "</td>";
echo "</tr><tr>";



echo "<td><b>Year of Passing from SEECS</b></td>";
echo "<td>" . $row['year_passing_niit'] . "</td>";
echo "</tr><tr>";
echo "<td><b>Last Degree from SEECS</b></td>";
echo "<td>" . $row['last_degree_niit'] . "</td>";

echo "<tr><td><b>E-Mail</b></td>";
echo "<td><a href=mailto:" . $row['sec_email'] . " target=_blank class=b_link>" . $row['sec_email'] . "</td>";
echo "</tr><tr>";

if($row["address_open"]==1){
echo "<td><b>Address</b></td>";
echo "<td>" . $row['address'] . "</td>";
echo "</tr><tr>";}

echo "</tr>";
echo "</table>";

echo "</div>";

echo "<p class=b_text align=right><small>Last Updated: " . show_date($row['entry_date'],"DDMMYYYY") . "(" . $row['entry_time'] . ")</small></p>";
?>
 <!-- =========================================================== -->		  
        </td>
      </tr>
    </table>  <br>
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