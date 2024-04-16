<?php 
 ob_start();
 session_start(); 
?>
<link href="style.css" rel="stylesheet" type="text/css">
<?php
 if(!isset($_SESSION['s_email']))
 {
 $URL="login.php";
 header ("Location: $URL");
 exit;
 }
?>

<script language="javascript" src="javascript/validate.js"></script>
<script language="javascript">

function foc()
{
frmemp.txtorg.focus()
}
</script>

<style type="text/css">
<!--
.style3 {font-size: 8px}
-->
</style>


<?php $cat="1" ?>
<html>
<head>
<title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) about NUST-SEECS </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="0" colspan="3" align="left" valign="top">
<?php include "header.php"; ?>
	</td>
  </tr>


  <tr>
    <td colspan="2" align="left" valign="top"> 
<?php include "../header2.php"; ?>
    </td>
    <td width="123" rowspan="2" align="left" valign="top" class="right_bgcolor">
<?php include "../right.php"; ?>
	</td>
  </tr>
  <tr>
    <td width="136" align="left" valign="top" class="left_bgcolor">
<?php include "../left.php"; ?>
	</td>
    <td width="493" align="left" valign="top"><table width="468" border="0" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td width="543" height="323" valign="top">
		
		<!-- ========================================= -->
<?php
 include "control/dbcode.php";
 include "control/main.php";
?>

		<form action="save/save_emp_info.php" method="post" name="frmemp" onSubmit="return validate_emp()">
<table width="663" border="2" align="center" cellpadding="5">
<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
<td width="415"><p class="b_main_heading"><span class="b_text">Step 4/4</span><br>
  Employment Information</p></td>
<td width="174"><div align="right"></div></td>
</tr>
<tr bgcolor="#E0E0E0"><td colspan="2" bgcolor="#E0DABE">
  <table width="497" border="0">
<tr class="b_text">
<td></td>
<td></td>
<td class="b_text"><strong>Organization*</strong></td>
<td><strong>Designation*</strong></td>
<td><strong>From</strong> <span class="style3">(MM-YYYY)</span>*</td>
<td><strong>To</strong> <span class="style3">(MM-YYYY)</span>*</td>
<td><strong>Location*</strong></td>
</tr>

  <tr>
    <td class="b_text"><input type="hidden" value="" name="ano"></td>
    <td class="b_text"><input type="hidden" value="" name="sno"></td>
    <td class="b_text"><input name="txtorg" type="text" id="txtorg" maxlength="100"></td>
    <td class="b_text"><input name="txtdesi" type="text" id="txtdesi" maxlength="50"></td>
    <td class="b_text"><input name="txtfrom" type="text" id="txtfrom" size="12" maxlength="10"></td>
    <td class="b_text"><input name="txtto" type="text" id="txtto" size="12" maxlength="10"></td>
    <td class="b_text"><input name="txtlocation" type="text" id="txtlocation" maxlength="50"></td>
</tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td colspan="2">
          <div align="right">
              <input name="cmdsubmit" type="submit" class="Table_heading" id="cmdsubmit" value="Save">
              <input name="cmdsubmit22" type="button" class="Table_heading" id="cmdsubmit2" value="Finish" onClick="javascript:location='teaching_info.php'">
          </div></td>
</tr>
</table>
</td></tr></table>
</form>

<!-- //////////////////////////////// LIST CODE ////////////////////////////////////// -->

<?php
$email=$_SESSION['s_email'];
$result=mysql_query("select * from emp_detail where email='" . $email . "' order by autonum");
if(mysql_affected_rows()<=0)
exit;
?>
<form action="delete/delete_emp_info.php" method="post" name="frmdelete">
<table width="665" border="1" align="center" cellpadding="0">
<tr><td colspan="2">

<table width="665" border="1" align="center" cellpadding="2">
<tr bordercolor="#999999" bgcolor="#E0DABE" class="b_text">
  <td></td>
  <td><div align="left"><strong>No</strong></div></td>
  <td width="221"><div align="left"><strong>Organization</strong></div></td>
  <td width="166"><div align="left"><strong>Designation</strong></div></td>
  <td width="65"><div align="center"><strong>From</strong></div></td>
  <td width="65"><div align="center"><strong>To</strong></div></td>
  <td width="104"><div align="center"><strong>Location</strong></div></td>
  </tr>

<?php
$i=1;
while($rows=mysql_fetch_array($result))
{
$autonum_val= "t" . $rows['autonum'] ;
?>

<tr bordercolor="#999999" class="b_text">
<td><input type=checkbox name="<?php echo $autonum_val; ?>" ></td>
<td><?php echo $i ?></td>
<td><?php echo $rows['name_org']; ?></td>
<td><?php echo $rows['designation']; ?></td>
<td><?php echo show_date($rows['duration_from'],"mmyyyy") ?>
<td><?php echo show_date($rows['duration_to'],"mmyyyy") ?></td>
<td><?php echo $rows['location']; ?></td>
</tr>

<?php 
$i=$i+1;
}
?>
</table>
</td></tr>
<tr>
  <td width="606" bgcolor="#E0DABE" class="b_text"><input name="cmddelete" type="submit" class="Table_heading" id="cmddelete" value="Delete"></td>
  <td width="55"><div align="right">
    <input name="cmdsubmit2" type="button" class="Table_heading" id="cmdsubmit22" value="Finish" onClick="javascript:location='login.php'">
  </div></td>
</tr>
</table>
</form>

		<!-- ========================================= -->
		
		
		
		
		                 </td>
      </tr>
    </table>    
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
