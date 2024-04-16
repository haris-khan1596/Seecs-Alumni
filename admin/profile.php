<?php
ob_start();
session_start(); 
session_id();
include "session.php" ;
include "../control/dbcode.php";
include "../control/main.php";
//--------------------------------------------

$uid=$_GET['uid'];
?>
<html>
<head>
<link href="../style.css" rel="stylesheet" type="text/css">
<title>Alumni Profile</title>
</head>
<body>
<br>
<?php include "control/admin_links.php"; ?>
<table width="83%"  border="0">
  <tr>
    <td align="right">
	<?php // include "admin/control/admin_links.php" ?>
	</td>
  </tr>
</table>
<br>
<table width="670" height="354" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
  <td height="305">

  <?php
$sql="select * from personal_data where user_id=" . $uid . " ";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>
<span class="b_main_heading">Profile of <?php echo $row['name']; ?> </span>
  <br>
  <br>
<table width="670" border="1" cellpadding="3" cellspacing="0" style="border-right-style:hidden;border-left-style:hidden ">
  <tr>
    <th align="left" valign="top" class="b_text" scope="col"><b>Registration</b> <strong>No</strong> </th>
    <th colspan="2" align="left" class="b_text" scope="col"><?php echo $row['reg1'] . "-" . $row['reg2'] . "-" . return_title("class_name","class_all","class_id",$row["reg3"]) . "-" . $row['reg4']  ?></th>
    <th align="left" class="b_text" scope="col">&nbsp;</th>
    <th width="191" rowspan="5" align="center" class="b_text" scope="col">

<?php	
$sql_pic="select * from pic where user_id=" . $uid . " ";
$result_pic=mysql_query($sql_pic);
if(mysql_affected_rows()<=0)
{
$found_pic="0";
}
$row_pic=mysql_fetch_array($result_pic);
	if($found_pic!="0")
	{	
	$file_name=trim($row_pic['file_name']);
	$folder_name=trim($row_pic['folder_name']);
	$strurl="../upload/" . $folder_name . $file_name;
	echo "<img src=" . $strurl . " height=100 width=100 border=0>";
	}

?>
	
	
	</th>
  </tr>
  <tr>
    <th width="96" align="left" valign="top" class="b_text" scope="col"><strong>Name:</strong></th>
    <th colspan="2" align="left" class="b_text" scope="col"><?php echo $row['name']; ?></th>
    <th width="164" align="left" class="b_text" scope="col">&nbsp;</th>
    </tr>
  <tr>
    <th align="left" valign="top" class="b_text" scope="col"><strong>Father's Name:</strong></th>
    <th colspan="2" align="left" class="b_text" scope="col"><?php echo $row['fname']; ?></th>
    <th align="left" class="b_text" scope="col">&nbsp;</th>
    </tr>
  <tr>
    <th rowspan="2" align="left" valign="middle" class="b_text" scope="col"><strong>Nationality:</strong></th>
    <th width="65" align="left" class="b_text" scope="col"><strong>By Birth: </strong></th>
    <th width="112" align="left" class="b_text" scope="col"><strong><span class="b_text"><?php echo $row['nationality_b']; ?></span></strong></th>
    <th align="left" class="b_text" scope="col">&nbsp;</th>
    </tr>
  <tr>
    <th align="left" class="b_text" scope="col"><strong>Present:</strong></th>
    <th align="left" class="b_text" scope="col"><strong><span class="b_text"><?php echo $row['nationality_p']; ?></span></strong></th>
    <th align="left" class="b_text" scope="col">&nbsp;</th>
    </tr>
  <tr align="left">
    <th align="left" valign="middle" class="b_text" scope="col"><strong>Marital Status: </strong></th>
    <th colspan="2" class="b_text" scope="col"><?php echo $row['marital_status']; ?></th>
    <th class="b_text" scope="col">&nbsp;</th>
    <th class="b_text" scope="col">&nbsp;</th>
  </tr>
  <tr align="left">
    <th align="left" valign="middle" class="b_text" scope="col"><strong>Gender: </strong></th>
    <th colspan="2" class="b_text" scope="col"><?php echo $row['gender']; ?></th>
    <th class="b_text" scope="col">&nbsp;</th>
    <th class="b_text" scope="col">&nbsp;</th>
  </tr>
  <tr align="left">
    <th align="left" valign="middle" class="b_text" scope="col"><strong>Date of Birth: </strong></th>
    <th colspan="2" class="b_text" scope="col"><?php echo show_date($row['dob'],"DDMMYYYY"); ?></th>
    <th class="b_text" scope="col"><strong>National ID Card No: </strong></th>
    <th class="b_text" scope="col"><?php echo $row['nic1'] . "-" . $row['nic2'] . "-" . $row['nic3']; ?></th>
  </tr>
  <tr align="left">
    <th align="left" valign="middle" class="b_text" scope="col"><strong>Blood Group: </strong></th>
    <th colspan="2" class="b_text" scope="col"><?php echo $row['blood_group']; ?></th>
    <th class="b_text" scope="col"></th>
    <th class="b_text" scope="col"></th>
  </tr>
  <tr align="left">
    <th align="left" valign="middle" class="b_text" scope="col"><b>Current Status:</b></th>
    <th colspan="2" class="b_text" scope="col"><?php echo $row['status']; ?></th>
    <th class="b_text" scope="col"></th>
    <th class="b_text" scope="col"></th>
  </tr>
  <tr align="left">
    <th valign="top" class="b_text" scope="col"><strong>Last Degree Passed from NIIT: </strong></th>
    <th colspan="2" class="b_text" scope="col"><?php echo $row['last_degree_niit']; ?></th>
    <th class="b_text" scope="col"><strong>Year of passing from NIIT: </strong></th>
    <th class="b_text" scope="col"><?php echo $row['year_passing_niit']; ?></th>
  </tr>
  <tr align="left">
    <th valign="top" class="b_text" scope="col">&nbsp;</th>
    <th colspan="2" class="b_text" scope="col">&nbsp;</th>
    <th class="b_text" scope="col">&nbsp;</th>
    <th class="b_text" scope="col">&nbsp;</th>
  </tr>
  <tr align="left">
    <th valign="top" class="b_text" scope="col"><strong>Address:</strong></th>
    <th colspan="4" class="b_text" scope="col"><?php echo $row['address']; ?></th>
    </tr>
  <tr align="left">
    <th valign="top" class="b_text" scope="col"><strong>City:</strong></th>
    <th colspan="2" class="b_text" scope="col"><?php echo $row['city']; ?></th>
    <th class="b_text" scope="col"><strong>Country:</strong></th>
    <th class="b_text" scope="col"><?php echo $row['country']; ?></th>
  </tr>
  <tr align="left">
    <th valign="top" class="b_text" scope="col"><strong>Phone:</strong></th>
    <th colspan="2" class="b_text" scope="col"><?php echo $row['ph']; ?></th>
    <th class="b_text" scope="col"><strong>Mobile:</strong></th>
    <th class="b_text" scope="col"><?php echo $row['mob']; ?></th>
  </tr>
  <tr align="left">
    <th valign="top" class="b_text" scope="col"><strong>Fax:</strong></th>
    <th colspan="2" class="b_text" scope="col"><?php echo $row['fax']; ?></th>
    <th class="b_text" scope="col"><strong>Secondry Email </strong></th>
    <th class="b_text" scope="col"><?php echo $row['sec_email']; ?></th>
  </tr>
  <tr align="left">
    <th valign="top" class="b_text" scope="col">&nbsp;</th>
    <th colspan="2" class="b_text" scope="col">&nbsp;</th>
    <th class="b_text" scope="col">&nbsp;</th>
    <th class="b_text" scope="col">&nbsp;</th>
  </tr>
  <tr align="left" bgcolor="#E7E3E7">
    <th colspan="5" valign="top" class="b_main_heading" scope="col">Current Job Details </th>
    </tr>
  <tr align="left">
    <th valign="top" class="b_text" scope="col"><strong> Company Name: </strong></th>
    <th colspan="2" class="b_text" scope="col"><?php echo $row['job_company_name']; ?></th>
    <th class="b_text" scope="col"><strong> Job Title: </strong></th>
    <th class="b_text" scope="col"><?php echo $row['job_title']; ?></th>
  </tr>
  <tr align="left">
    <th valign="top" class="b_text" scope="col"><strong> Address: </strong></th>
    <th colspan="2" class="b_text" scope="col"><?php echo $row['job_Address']; ?></th>
    <th class="b_text" scope="col"><strong> Postal Code: </strong></th>
    <th class="b_text" scope="col"><?php echo $row['job_postal_code']; ?></th>
  </tr>
  <tr align="left">
    <th valign="top" class="b_text" scope="col"><strong> City: </strong></th>
    <th colspan="2" class="b_text" scope="col"><?php echo $row['job_city']; ?></th>
    <th class="b_text" scope="col"><strong> Country: </strong></th>
    <th class="b_text" scope="col"><?php echo $row['job_country']; ?></th>
  </tr>
  <tr align="left">
    <th valign="top" class="b_text" scope="col"><strong> Telephone: </strong></th>
    <th colspan="2" class="b_text" scope="col"><?php echo $row['job_ph']; ?></th>
    <th class="b_text" scope="col"><strong> Fax: </strong></th>
    <th class="b_text" scope="col"><?php echo $row['job_fax']; ?></th>
  </tr>
  <tr align="left">
    <th valign="top" class="b_text" scope="col"><strong> Company E-Mail: </strong></th>
    <th colspan="2" class="b_text" scope="col"><a href="mailto:<?php echo $row['job_email'] ?>" class="b_link"><?php echo $row['job_email']; ?></a></th>
    <th class="b_text" scope="col"><strong> Company Website: </strong></th>
    <th class="b_text" scope="col"><a href="<?php echo $row['job_url']; ?>" class="b_link" target="_blank"><?php echo $row['job_url']; ?></a></th>
  </tr>

</table>
<p> 
<!-- /////////////////-----------PREVIOUS EMPLOYMENT DETAILS-----------///////////////////// -->
    <span class="b_heading">PREVIOUS EMPLOYMENT DETAILS</span>
<?php
$sql="select * from emp_detail where user_id=" . $uid . " ";
$result=mysql_query($sql);
if(mysql_affected_rows()<=0)
echo "<span class=b_text>: NIL </span>  ";
else
{
?>
</p>
<table width="670" border="1" cellpadding="2" style="border-right-style:dashed;border-left-style:dashed ">
  <tr bordercolor="#999999" bgcolor="#E7E3E7" class="b_text">
    <td width="19"><div align="left"><strong>No</strong></div></td>
    <td width="299"><div align="left"><strong>Organization</strong></div></td>
    <td width="166"><div align="left"><strong>Designation</strong></div></td>
    <td width="65"><strong>From</strong></td>
    <td width="65"><strong>To</strong></td>
    <td width="104"><strong>Location</strong></td>
  </tr>

<?php
$i=1;
while($rows=mysql_fetch_array($result))
{
?>
  <tr bordercolor="#999999" class="b_text">
    <td><?php echo $i ?></td>
    <td><?php echo $rows['name_org']; ?></td>
    <td><?php echo $rows['designation']; ?></td>
    <td><?php echo show_date($rows['duration_from'],"mmyyyy") ?>
    <td><?php echo show_date($rows['duration_to'],"mmyyyy") ?></td>
    <td><?php echo $rows['location']; ?></td>
  </tr>
  <?php 
$i=$i+1;
}//wend
?>
</table>
<?php 
}//end if
?>
<span class="b_text"><strong><span class="b_heading">
  </span></strong></span>
<p>    <span class="b_heading">ACADEMIC DETAILS</span>
  <?php
$sql="select * from academic_detail where user_id=" . $uid . " ";
$result=mysql_query($sql);
if(mysql_affected_rows()<=0)
echo "<span class=b_text>: NIL </span>  ";
else{
?>
</p>
<table width="670" border="1" cellpadding="2">
  <tr bordercolor="#999999" bgcolor="#E7E3E7" class="b_text">
    <td width="66"><strong>Degree</strong></td>
    <td width="64"><strong>Equal To</strong></td>
    <td width="55"><strong>From</strong></td>
    <td width="55"><strong>To</strong></td>
    <td width="51"><strong>GPA/%</strong></td>
    <td width="144"><strong>Major</strong></td>
    <td width="285"><strong>University/Institute</strong></td>
  </tr>
  <?php
$i=1;
while($rows=mysql_fetch_array($result))
{
?>
  <tr bordercolor="#999999" class="b_text">
    <td><?php echo $rows['degree']; ?></td>
    <td><?php echo $rows['degree_equal']; ?></td>
    <td><?php echo show_date($rows['duration_from'],"mmyyyy") ?>
    <td><?php echo show_date($rows['duration_to'],"mmyyyy") ?></td>
    <td><?php echo $rows['gpa']; ?></td>
    <td><?php echo $rows['major']; ?></td>
    <td><?php echo $rows['university']; ?></td>
  </tr>
   <?php 
$i=$i+1;
}//wend
?>
</table>
<?php 
}//end if
?>

 <!-- /////////////////-----------Research Experience-----------///////////////////// -->
</p>
<p><span class="b_text"><strong><span class="b_heading">RESEARCH EXPERIENCE</span></strong></span>

<?php
$sql="select * from research_experience where user_id=" . $uid . " ";
$result=mysql_query($sql);
if(mysql_affected_rows()<=0)
echo "<span class=b_text> : NIL </span>  ";
else
{
?>
</p>
<table width="670" border="1" cellpadding="2">
  <tr bordercolor="#999999" bgcolor="#E7E3E7" class="b_text">
    <td width="22"><strong>No</strong></td>
    <td width="158"><strong>After Degree</strong></td>
    <td width="155"><strong>Post</strong></td>
    <td width="54"><strong>From</strong></td>
    <td width="54"><strong>To</strong></td>
    <td width="275"><strong>University/Institute</strong></td>
  </tr>
<?php
$i=1;
while($rows=mysql_fetch_array($result))
{
?>
  <tr bordercolor="#999999" class="b_text">
    <td><?php echo $i ?></td>
    <td><?php echo $rows['after_degree']; ?></td>
    <td><?php echo $rows['post']; ?></td>
    <td><?php echo show_date($rows['duration_from'],"mmyyyy") ?>
    <td><?php echo show_date($rows['duration_to'],"mmyyyy") ?></td>
    <td><?php echo $rows['university']; ?></td>
  </tr>
  <?php 
$i=$i+1;
}
?>
</table>
<?php 
$i=$i+1;
}
?>	

<!-- /////////////////-----------PUBLICATIONS-----------///////////////////// -->


<p><span class="b_text"><strong><span class="b_text"><strong><strong><strong><span class="b_heading">PUBLICATIONS:</span></strong></strong></strong></span></strong></span>
<?php
$sql="select * from publications where user_id=" . $uid . " ";
$result=mysql_query($sql);
if(mysql_affected_rows()<=0)
echo "<span class=b_text> : NIL </span>  ";
else
{
echo "</p>";
$i=1;
while($rows=mysql_fetch_array($result))
{
?>

<table width="670" height="186" border="1" bordercolor="#E7E3E7" bgcolor="#FFFFFF">
  <tr bordercolor="#E7E3E7" bgcolor="#E7E3E7" class="b_text">
    <td height="15" align="left" valign="top" class="b_text"> <?php echo "<b>" . $i . "</b>" ?></td>
    <td colspan="9"></td>
  </tr>
  <tr bordercolor="#CCCCCC" class="b_text">
    <td width="129" height="22" align="left" valign="top" class="b_text style9"><strong>Title of Paper/ Presentation : </strong></td>
    <td colspan="9" align="left" valign="top">
      <div align="left"></div>
      <div align="left"></div>
      <?php echo $rows['title']; ?></td>
  </tr>
  <tr bordercolor="#CCCCCC">
    <td height="20" align="left" valign="middle" class="b_text"><span class="style9"><strong>Author Name : </strong></span></td>
    <td width="228" align="left" valign="top" class="b_text"><?php echo $rows['author_name']; ?></td>
    <td width="99" align="left" valign="top" class="b_text"><strong>Co-Author name </strong></td>
    <td width="186" colspan="4" align="left" valign="top" class="b_text"><?php echo $rows['co_author_name']; ?></td>
  </tr>
  <tr bordercolor="#CCCCCC">
    <td height="28" align="left" valign="top" class="b_text"><span class="style9"><strong>Published in Conference/Journal : </strong></span></td>
    <td colspan="9" align="left" valign="top"> <span class="b_text"><?php echo $rows['pub_in']; ?> </span></td>
  </tr>
  <tr bordercolor="#CCCCCC">
    <td height="20" class="b_text"><span class="style9"><strong>Organizer/Publisher:</strong></span></td>
    <td colspan="9" align="left" valign="top" bordercolor="#E7E3E7"><span class="b_text"><?php echo $rows['org_pub']; ?> </span></td>
  </tr>
  <tr bordercolor="#CCCCCC">
    <td height="40" colspan="10" align="left" valign="middle" class="b_heading"><table width="555" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <th width="71" class="b_text" scope="col"></th>
          <th width="25" scope="col"><div align="left"><span class="b_text"><strong>No:</strong> </span></div></th>
          <th width="47" scope="col"><div align="left"><span class="b_text"><?php echo $rows['no']; ?> </span></div></th>
          <th width="16" scope="col"><div align="left"></div></th>
          <th width="29" scope="col"><div align="left"><span class="b_text"><strong>Vol:</strong></span></div></th>
          <th width="63" scope="col"><div align="left"><span class="b_text"><?php echo $rows['vol']; ?> </span></div></th>
          <th width="35" scope="col"><span class="b_text"><strong>PP:</strong></span></th>
          <th width="59" scope="col"><div align="left"><span class="b_text"><?php echo $rows['pp']; ?> </span></div></th>
          <th width="124" scope="col"><span class="b_text"><strong>Dates </strong></span> <span class="Marquee_links">(DD-MM-YYYY):</span></th>
          <th width="86" scope="col"><div align="left"><span class="b_text"> <?php echo show_date($rows['dates'],"ddmmyyyy"); ?> </span></div></th>
        </tr>
    </table>
<?php 
$i=$i+1;
}
}
?>	</td>
  </tr>
</table>
<?php 
echo "<p class=b_text align=right><small>Last Updated: " . show_date($row['entry_date'],"DDMMYYYY") . "(" . $row['entry_time'] . ")</small></p>";
?>
</body>
</html>