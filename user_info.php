<?php 
ob_start();
session_start(); 
include "control/top.php";
include "control/dbcode.php";
include "control/main.php";

if(!isset($_SESSION['s_email']))
{
$URL="email.php";
header ("Location: $URL");
exit;
}
?>

<html>
<head>
<title>NUST-SEECS-Alumni</title>
<link href="style.css" rel="stylesheet" type="text/css">

<script language="javascript" src="javascript/validate.js"></script>
<script language="javascript">
function foc()
{
frmuser.txtuser_name.focus()
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
.style3 {font-size: 9px}
-->
</style>
</head>

<body onLoad="foc()">

<form action="save/save_user.php" method="post" name="frmuser" onsubmit="return validate_user()">
  <img src="images/register_now.jpg" width="281" height="71" align="left">

<table border="2" cellpadding="5">
<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
<td width="410"><p class="b_main_heading"><span class="b_text">Step 1/4</span><br>
  User  Information<br>
    <span class="b_text style3">(In future this information is used to indentify you as NUST-SEECS-alumni member) </span></p>  </td>
</tr>

<tr bgcolor="#E0E0E0"><td bgcolor="#C3CDDE"><table width="100%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#999999">
  <tr bordercolor="#999999">
    <th width="36%" scope="col"><div align="left"><span class="b_text">NUST-SEECS-Email: * </span></div></th>
    <th width="64%" scope="col"><div align="left"><span class="b_text">
          <input name="txtemail" type="text" class="b_text" id="txtemail4" size="25" value="<?php echo $_SESSION['s_email']; ?> " readonly="true">
          <strong>@niit.edu.pk </strong> </span></div></th>
  </tr>
  <tr bordercolor="#999999">
    <td><div align="left"></div></td>
    <td><div align="left"><span class="b_text">
      </span></div></td>
  </tr>
  <tr bordercolor="#999999">
    <td><div align="left"><span class="b_text">User Name: *</span></div></td>
    <td width="64%" align="left" valign="top" class="b_text"><input name="txtuser_name" type="text" class="b_text" id="txtuser_name" size="40" maxlength="20"></td>
  </tr>
  <tr bordercolor="#999999">
    <td><div align="left"><span class="b_text">Password: *</span></div></td>
    <td align="left" valign="top" class="b_text"><input name="txtpassword" type="password" class="b_text" id="txtpassword" size="40" maxlength="20"></td>
  </tr>
  <tr bordercolor="#999999">
    <td><span class="b_text">Re-Enter Password: *</span></td>
    <td><span class="b_text">
      <input name="txtpassword2" type="password" class="b_text" id="txtfname3" size="40" maxlength="20">
    </span></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr bordercolor="#999999">
    <td>&nbsp;</td>
    <td align="right"><input name="cmdsubmit2" type="submit" class="Table_heading" id="cmdsubmit2" value="Save &amp; Continue"></td>
  </tr>
</table></td>
</tr></table>

</form>

</body>
</html>