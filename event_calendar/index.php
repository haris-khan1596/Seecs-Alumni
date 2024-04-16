<?php
$cat="3";
session_start(); 
?>
<html>
<head>
<title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) NUST-SEECS Event Calendar </title>
<link href="../style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {font-size: 9}
-->
</style>
</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="table_main">
  <tr>
    <td height="0" colspan="3" align="left" valign="top">
<?php include "../header.php"; ?>
	</td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top"> 
<?php include "../../header2.php"; ?>
    </td>
    <td width="4" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td width="137" align="left" valign="top" class="left_bgcolor">
<span class="table_left">
<?php include "../control/right.php"; ?>
</span>	</td>
    <td width="629" align="left" valign="top"><table width="800" border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
      <tr>
        <td width="800" height="323" valign="top" bgcolor="#FFFFFF"><p>            <span class="b_main_heading"><br>
          </span><span class="b_heading">Alumni Event Calendar          <br>
          <br>
              <?php include "mysqlevents.php"; ?>
          </span></p>
          <table width="152" border="1" cellpadding="0" cellspacing="0">
            <tr>
              <th width="40" bgcolor="#CAE4FF" scope="col"></th>
              <th width="106" class="b_text" scope="col"><div align="left" class="style2">&nbsp;Today</div></th>
            </tr>
            <tr>
              <td bgcolor="FFFFCC"></td>
              <td class="b_text"><div align="left" class="style2">&nbsp;Events</div></td>
            </tr>
            <tr>
              <td bgcolor="FFDDDD"></td>
              <td class="b_text"><div align="left" class="style2">&nbsp;Selected Event </div></td>
            </tr>
          </table>
          <p><span class="b_heading">          </span></p></td>
      </tr>
    </table>    
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">
<span class="b_link"><?php include "../footer.php" ?>
	</span></td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">
<span class="b_link"><?php include "../../footerlinks.php"; ?>
	</span></td>
  </tr>
</table>

</body>
</html>
