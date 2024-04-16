<?php $cat="10" ?>
<?php 
 ob_start();
 session_start(); 
 include "control/session.php";
?>
<link href="style.css" rel="stylesheet" type="text/css">

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


<title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
    <td width="7" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="table_left">
<span class="right_bgcolor">
<?php include "control/right.php"; ?>
</span>	</td>
    <td align="left" valign="top"><table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
      <tr>
        <td height="323" valign="top">
		
		<!-- ========================================= -->
<?php
 include "control/dbcode.php";
 include "control/main.php";
?>

		<form action="save/save_emp_info.php" method="post" name="frmemp" onSubmit="return validate_emp()">
<table width="98%" border="1" align="center" cellpadding="5">
<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF" class="table_heading_bg">
<td><p class="b_main_heading">  Employment History </p></td>
</tr>
<tr bgcolor="#E0DABE" class="left_bgcolor"><td>
  <table width="690" border="0" cellpadding="0">
<tr class="b_text">
<td width="118" class="b_text"><strong>
  <input type="hidden" value="" name="ano">
  <input type="hidden" value="" name="sno">
  Organization*</strong></td>
<td colspan="3"><input name="txtorg" type="text" class="b_text" id="txtorg2" maxlength="100"></td>
</tr>

  <tr>
    <td class="b_text"><strong>Designation*</strong></td>
    <td width="285" class="b_text"><input name="txtdesi" type="text" class="b_text" id="txtdesi3" maxlength="50"></td>
    <td width="84" class="b_text"><strong>Location*</strong></td>
    <td width="193" class="b_text"><input name="txtlocation" type="text" class="b_text" id="txtlocation2" size="13" maxlength="50"></td>
    </tr>
  <tr>
    <td class="b_text"><strong>From</strong> <span class="style3">(MM-YYYY)</span>*</td>
    <td><span class="b_text">
      <input name="txtfrom" type="text" class="b_text" id="txtfrom2" size="12" maxlength="10">
    </span></td>
    <td class="b_text"><strong>To</strong> <span class="style3">(MM-YYYY)</span>*</td>
    <td><span class="b_text">
      <input name="txtto" type="text" class="b_text" id="txtto2" size="7" maxlength="10">
    </span></td>
  </tr>
  <td colspan="4">          <div align="right">
                <input name="cmdsubmit" type="submit" class="Table_heading" id="cmdsubmit" value="Save">
                <span class="b_text">
                <input name="cmdfinish22" type="button" class="Table_heading"  value="Back" onClick="javascript:location='profile_info.php'">
                </span>          </div></td>
</tr>
</table>
</td></tr></table>
</form>

<!-- //////////////////////////////// LIST CODE ////////////////////////////////////// -->

<?php
$user_id=$_SESSION['user_id'];
$result=mysql_query("select * from emp_detail where user_id='" . $user_id . "' order by autonum");
if(mysql_affected_rows()<=0)
exit;
?>
<form action="delete/delete_emp_info.php" method="post" name="frmdelete">
<table width="97%" border="1" align="center" cellpadding="0" class="b_text">
<tr><td colspan="2">

<?php
$i=1;
while($rows=mysql_fetch_array($result))
{
$autonum_val= "t" . $rows['autonum'] ;
?>


<table width="99%" border="0" align="center" cellpadding="1" class="b_text">
<tr bordercolor="#999999" bgcolor="#E0DABE" class="left_bgcolor">
  <td colspan="5"><input type=checkbox name="<?php echo $autonum_val; ?>" >
 <strong>No</strong>
 <?php echo $i ?></td>
</tr>
<tr>
  <td width="94"><div align="left"><strong>Organization</strong>:</div></td>
  <td colspan="3"><?php echo $rows['name_org']; ?></td>
</tr>
<tr>
  <td width="94"><div align="left"><strong>Designation</strong>:</div></td>
  <td colspan="3"><?php echo $rows['designation']; ?></td>
</tr>
<tr>
  <td width="94"><strong>From:</strong></td>
  <td width="324"><?php echo show_date($rows['duration_from'],"mmyyyy") ?>
  <td width="49"><div align="right"><strong>To:</strong>  
  </div>
  <td width="224"><?php echo show_date($rows['duration_to'],"mmyyyy") ?></tr>
<tr>
  <td width="94"><strong>Location:</strong></td>
  <td colspan="3"><?php echo $rows['location']; ?></td>
</tr>

<?php 
$i=$i+1;
}
?>
</table>
</td></tr>
<tr class="left_bgcolor">
  <td width="655" class="b_text"><input name="cmddelete" type="submit" class="Table_heading" id="cmddelete" value="Delete"></td>
  <td width="55" align="right">    <input name="cmdfinish2" type="button" class="Table_heading"  value="Finish" onClick="javascript:location='profile_info.php'">  </td>
</tr>
</table>
</form>

		<!-- ========================================= -->          </td>
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
