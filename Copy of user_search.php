<?php 
$cat="10";
session_start(); 
include "control/session.php";
?>

<html>
<head>
<title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) Alumni </title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function validate()
{
	if(frm_search.txtsearch.value=="")
	{
			alert("Please enter Search text");
			frm_search.txtsearch.focus()
			return false;
	}
}

</script>
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
    <td width="12" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="table_left">
<span class="right_bgcolor">
<?php include "control/right.php"; ?>
</span>	</td>
    <td align="left" valign="top"><table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
      <tr>
        <td width="543" height="323" valign="top"><p><br>
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
