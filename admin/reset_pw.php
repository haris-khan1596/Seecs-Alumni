<?php 
ob_start();
session_start(); 

if($_SESSION['role']<>"webmaster")
{
header("Location:signout.php");
exit;
}

include "session.php";
include "../control/dbcode.php";
include "../control/main.php";
?>

<html>
<head>
<script language="javascript">
function validate()
{
if(frm_pw_reset.txtnewpw.value=="")
{
alert("Password field is mandatory")
frm_pw_reset.txtnewpw.focus()
return false;
}
}

</script>
<title></title>

<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: large;
}
-->
</style>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body>
<br>
<?php
include "control/admin_links.php";
$uid=$_GET['uid'];
?>

<form action="save_reset_pw.php" method="post" name="frm_pw_reset" onSubmit="return validate()">
  <table width="48%"  border="0">
    <tr>
      <td width="32%" class="b_heading"><div align="right">New Password </div></td>
      <td width="39%" height="24"><p>
        <input name="txtnewpw" type="password" class="b_text">
          <input type="hidden" name="uid" value="<?php echo $uid ?>">
      </p>      </td>
      <td width="29%"><input name="submit" type="submit" class="Table_heading" value="Reset Password"></td>
    </tr>
  </table>
  <p>&nbsp;    </p>
</form>

</body>
</html>