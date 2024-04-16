<?php 
session_start(); 
?>
<link href="style.css" rel="stylesheet" type="text/css">
<?php

include "control/top.php";
include "control/dbcode.php";
include "control/main.php";

session_unregister('s_email');

?>

<html>
<head>
<title>NUST-SEECS-Alumni</title>

<script language="javascript" src="javascript/validate.js"></script>
<script language="javascript">
function foc()
{
frmuser.txtemail.focus()
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

<form action="save/email_chk.php" method="post" name="frmuser" onsubmit="return validate_email_user()">
<p>&nbsp;</p>
<table border="2" align="center" cellpadding="15">
<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
<td width="376"><p class="b_main_heading">NUST-SEECS E-Mail Login <br>
    <span class="b_text style3">(Please provide NUST-SEECS e-mail and password to continue) </span></p>  </td>
</tr>

<tr bgcolor="#E0E0E0"><td height="108" bgcolor="#E0DABE"><table width="100%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#999999">
  <tr bordercolor="#999999">
    <th width="36%" scope="col"><div align="left"><span class="b_text">NUST-SEECS-Email: * </span></div></th>
    <th width="64%" scope="col"><div align="left"><span class="b_text">
          <input name="txtemail" type="text" class="b_text" id="txtemail4" size="25" >
          <strong>@niit.edu.pk </strong> </span></div></th>
  </tr>
  <tr bordercolor="#999999">
    <td><div align="left"><span class="b_text">Password: *</span></div></td>
    <td align="left" valign="top" class="b_text"><input name="txtpassword" type="password" class="b_text" id="txtpassword" size="40"></td>
  </tr>
  <tr bordercolor="#999999">
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr bordercolor="#999999">
    <td>&nbsp;</td>
    <td align="right"><input name="cmdsubmit2" type="submit" class="Table_heading" id="cmdsubmit2" value="Continue"></td>
  </tr>
</table></td>
</tr></table>

</form>

</body>
</html>