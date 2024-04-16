<?php 
ob_start();
session_start(); 
?>
<?php

include "control/dbcode.php";
include "control/main.php";

if(!isset($_SESSION['s_email']))
{
$URL="login.php";
header ("Location: $URL");
exit;
}


$sql="select * from personal_data where email='" . $_SESSION['s_email'] . "' ";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>
<script language="javascript" src="javascript/validate.js"></script>
<script language="javascript">
function foc()
{
frmpersonal.txtreg1.focus()
}

function chknum(field)
{
  if(isnum(field.value)==false)
  {
  alert("Please enter Numeric Values")
  field.focus()
  return false;
  }
}
</script>
<style type="text/css">
<!--
.style2 {font-size: 10px}
-->
</style>
</head>

<body onLoad="foc()">

<form action="save/save_personal_data.php" method="post" name="frmpersonal" onsubmit="return validate_personal()">
  <table border="2" align="center" cellpadding="5">
<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
<td width="375"><p class="b_main_heading"><span class="b_text">Step 2/4</span><br>
  Personal Information</p>  </td>
</tr>

<tr bgcolor="#E0E0E0"><td bgcolor="#E0DABE"><table width="100%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#999999">
  <tr bordercolor="#999999">
    <td colspan="2"><div align="left"><span class="b_text">Registration No : *</span></div></td>
    <td><div align="left"><span class="b_text">
      <input name="txtreg1" type="text" class="b_text" id="txtreg1" size="4" maxlength="4" onBlur="chknum(frmpersonal.txtreg1)" value="<?php echo $row["reg1"] ?>">
      <input name="txtreg2" type="text" class="b_text" id="txtreg2" size="4" maxlength="4" value="<?php echo $row["reg2"] ?>">

<select name="cboreg3" class="b_text" id="select14">

<?php
	$sql_c="select * from class_all order by class_id";
	$result_c=mysql_query($sql_c);

	while($row_c=mysql_fetch_array($result_c))
	{
	if($row['reg3']==$row_c['class_id'])
	echo "<option selected value=" . $row_c['class_id'] . ">" . $row_c['class_name'] . "</option>";
	else
	echo "<option value=" . $row_c['class_id'] . ">" . $row_c['class_name'] . "</option>";
	}
?>
</select>
      <input name="txtreg4" type="text" class="b_text" id="txtreg4" size="4" maxlength="4" onBlur="chknum(frmpersonal.txtreg4)" value="<?php echo $row["reg4"] ?>">
    </span></div></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2" class="b_text">Class</td>
    <td><span class="b_text">

    </span></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2"><div align="left"><span class="b_text">Name: *</span></div></td>
    <td width="66%" align="left" valign="top" class="b_text"><input name="txtname" type="text" class="b_text" id="txtname" size="40" value="<?php echo $row["name"] ?>"></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2"><div align="left"><span class="b_text">Father Name: *</span></div></td>
    <td align="left" valign="top" class="b_text"><input name="txtfname" type="text" class="b_text" id="txtfname" size="40" value="<?php echo $row["fname"] ?>"></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2"><div align="left"><span class="b_text">Date of Birth: *</span></div></td>
    <td align="left" valign="top" class="b_text"><span class="b_text">
      <input name="txtdob" type="text" class="b_text" id="txtdob5" size="15" maxlength="10" value="<?php echo show_date($row["dob"],"") ?>">
  (DD-MM-YYYY)</span></td>
  </tr>
  <tr bordercolor="#999999">
    <td width="17%" rowspan="2" class="b_text">Nationality</td>
    <td width="17%" class="b_text">By Birth </td>
    <td align="left" valign="top" class="b_text"><input name="txtnationalitybb" type="text" class="b_text" id="txtnationalitybb" size="40" value="<?php echo $row["nationality_b"] ?>"></td>
  </tr>
  <tr bordercolor="#CCCCCC">
    <td width="17%" class="b_text">Present *</td>
    <td align="left" valign="top" class="b_text"><input name="txtnationality_p" type="text" class="b_text" id="txtname4" size="40" value="<?php echo $row["nationality_p"] ?>"></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2"><div align="left"><span class="b_text">Gender: * </span></div></td>
    <td align="left" valign="top" class="b_text">

<select name="cbogender" class="b_text" id="select4" style="width:80" >
 <?php
	if($row["gender"]=="Male"  or $row["Gender"]=="")
    echo "<option selected value=Male>Male</option>";
	else
	echo "<option value=Male>Male</option>";

	if($row["gender"]=="Female")
    echo "<option selected value=Female>Female</option>";
	else
	echo "<option value=Female>Female</option>";
 ?>
</select>

</td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2"><div align="left"><span class="b_text">Marital Status: * </span></div></td>
    <td align="left" valign="top" class="b_text">
<select name="cbomarital" class="b_text" id="cbomarital" style="width:80">
  <?php
	if($row["marital_status"]=="Single"  or $row["marital_status"]=="")
    echo "<option selected value=Single>Single</option>";
	else
	echo "<option value=Single>Single</option>";

	if($row["marital_status"]=="Married")
	echo  "<option value=Married selected>Married</option>";
	else
	echo  "<option value=Married>Married</option>";	
  ?>
</select>
</td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2"><div align="left"><span class="b_text">NIC No: *</span></div></td>
    <td align="left" valign="top" class="b_text"><span class="b_text">
      <input name="txtnic1" type="text" class="b_text" id="txtnic1" value="<?php echo $row["nic1"] ?>" size="5" maxlength="5" onBlur="chknum(frmpersonal.txtnic1)">
      <input name="txtnic2" type="text" class="b_text" id="txtnic2" value="<?php echo $row["nic2"] ?>" size="7" maxlength="7" onBlur="chknum(frmpersonal.txtnic2)">
      <input name="txtnic3" type="text" class="b_text" id="txtnic3" value="<?php echo $row["nic3"] ?>" size="1" maxlength="1" onBlur="chknum(frmpersonal.txtnic3)">
    </span></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2"><div align="left"><span class="b_text">Current Status: * </span></div></td>
    <td><div align="left"><span class="b_text">

<select name="cbostatus" class="b_text" id="select8" style="width:80">
  <?php
	if($row["status"]=="On Job"  or $row["status"]=="")
    echo "<option selected value='On Job'>On Job</option>";
	else
	echo "<option value='On Job'>On Job</option>";

	if($row["status"]=="Job Less")
    echo "<option selected value='Job Less'>Job Less</option>";
	else
	echo "<option value='Job Less'>Job Less</option>";
	
	if($row["status"]=="Student")
    echo "<option selected value=Student>Student</option>";
	else
	echo "<option value=Student>Student</option>";
   ?>
</select>

    </span></div></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="3" class="b_text">&nbsp;</td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="3" class="b_text">Year of passing from NIIT 
      <input name="txtyear_passing_niit" type="text" class="b_text" id="txtyear_passing_NUST-SEECS" size="4" maxlength="4" onBlur="chknum(frmpersonal.txtyear_passing_NUST-SEECS)" value="<?php echo $row["year_passing_niit"] ?>"> 
      <span class="style2">(YYYY) </span></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="3"><div align="left"></div>      
      <div align="left" class="b_text">______________________________________________________<br>
        <br>
      </div></td>
    </tr>
  <tr bordercolor="#999999">
    <td colspan="2" align="left" valign="top" class="b_text">Address *</td>
    <td align="left" valign="top"><span class="b_text">
      <textarea name="txtaddress" cols="37" rows="3" class="b_text" id="textarea2"><?php echo $row["address"] ?></textarea>
    </span></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2" class="b_text">City *</td>
    <td><span class="b_text">
      <input name="txtcity" type="text" class="b_text" id="txtcity" size="20" maxlength="50" value="<?php echo $row["city"] ?>">
    </span></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2" class="b_text">Country: *</td>
    <td><span class="b_text">
      <input name="txtcountry" type="text" class="b_text" id="txtcountry" size="20" maxlength="50" value="<?php echo $row["country"] ?>">
    </span></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2" class="b_text">Phone *</td>
    <td><span class="b_text">
      <input name="txtph" type="text" class="b_text" id="txtph" size="20" maxlength="50" value="<?php echo $row["ph"] ?>">
    </span></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2" class="b_text">Mob:</td>
    <td><span class="b_text">
      <input name="txtmob" type="text" class="b_text" id="txtmob2" size="20" maxlength="50" value="<?php echo $row["mob"] ?>">
    </span></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2" class="b_text">Fax: </td>
    <td><span class="b_text">
      <input name="txtfax" type="text" class="b_text" id="txtfax" size="20" maxlength="50" value="<?php echo $row["fax"] ?>">
    </span></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2" align="left" valign="middle" class="b_text"><span class="style1">Secondary E -Mail</span></td>
    <td><span class="b_text">
      <input name="txtemail2" type="text" class="b_text" id="txtemail222" size="40" maxlength="50" value="<?php echo $row["sec_email"] ?>">
    </span></td>
  </tr>
  <tr valign="middle" bordercolor="#999999">
    <td height="23" class="b_text">&nbsp; </td>
    <td height="23" class="b_text">&nbsp;</td>
    <td height="23" class="b_text">
	<?php
	if($row["address_open"]==1)
	echo "<input name=chkpublic type=checkbox id=chkpublic2 value=1 checked>";
	else
	echo "<input name=chkpublic type=checkbox id=chkpublic2 value=1>";
	?> 

	
Keep my address publicly available</td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="3">&nbsp;</td>
    </tr>
  <tr bordercolor="#999999">
    <td colspan="2">&nbsp;</td>
    <td align="right"><input name="cmdsubmit2" type="submit" class="Table_heading" id="cmdsubmit2" value="Save &amp; Continue"></td>
  </tr>
</table></td>
</tr></table>

</form>