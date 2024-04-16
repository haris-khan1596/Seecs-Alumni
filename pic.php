<?php 
ob_start();
session_start(); 
include "control/session.php";
$cat="10" ?>

<html>
<head>
<title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) about NUST-SEECS </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {font-size: 11px; font-style: normal; line-height: normal; font-variant: normal; text-transform: none; color: #666666; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif;}
-->
</style>
<script language="javascript">
function chk()
{
if(frmpic.uploadedfile.value=="")
{
alert("please select a picture and then click upload")
frmpic.uploadedfile.focus();
return false;
}
}


function chk_img()
{
if(document.getElementById("alumni_img_thumb"))
{
location.href='academic_detail.php';}
else
	{
	alert("Please upload your picture. It will be used for Alumni Card");
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
<?php //include "../header2.php"; ?>
    </td>
    <td width="4" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="table_left">
<span class="right_bgcolor">
<?php include "control/right.php"; ?>
</span>	</td>
    <td align="left" valign="top"><table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
      <tr>
        <td height="323" valign="top">		<p>
		
<?php		
include "control/dbcode.php";
include "control/main.php";
$sql="select * from pic where user_id='" . $_SESSION['user_id'] . "' ";
$result=mysql_query($sql);
//echo $sql;
$row=mysql_fetch_array($result);
?>
<style type="text/css">
<!--
.style2 {font-size: 10px}
-->
</style> 
            <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
            <p>
            <?php 
				if(isset($_SESSION["wz"]))
				include "wz_heading.php";
				?> 
			<?php include "upload_crop.php" ?>
            
          <p> </td>
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
<span class="b_link"><?php //include "../footerlinks.php"; ?>
	</span></td>
  </tr>
</table>

</body>
</html>
