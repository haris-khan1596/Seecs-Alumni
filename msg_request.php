<?php $cat="10" ?>
<html>
<head>
<title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) about NUST-SEECS </title>
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
    <td width="8" rowspan="2" align="left" valign="top">&nbsp;
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
		<p><br>  
<?php 
if($_SESSION['err']==0)
echo "<p class=b_heading align=center><font color=green>
Your request for NUST-SEECS Alumni Registration has been received and forwarded to exams department for verification. After confirmation, we will send you an email including your login information and details of further procedure.</font></p>"
?>			  
		  <br>
        </p>	   </td>
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
