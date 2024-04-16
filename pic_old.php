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
$row=mysql_fetch_array($result);
?>
<style type="text/css">
<!--
.style2 {font-size: 10px}
-->
</style> 
            <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
            <form enctype="multipart/form-data" action="upload/upload.php" method="POST" name="frmpic" onSubmit="return chk()">
            <table border="2" align="center" cellpadding="10" class="table_body">
              <tr bgcolor="#FFFFFF">
                <td width="435"><p class="b_main_heading">                  Upload Picture</p></td>
              </tr>
              <tr bgcolor="#E0E0E0">
                <td class="left_bgcolor"><p class="b_text"><strong>Instructions for Picture </strong></p>
                    <p class="style1">Size Less Then 100 KB<br>
          Minimum Height 150 Pixels <br>
          Minimum Width 150 Pixels <br>
          Must be from the following picture formats (Jpg,jpeg,gif,png,bmp) </p>
                    <?php
if($err==1)
echo "<font class=b_text color=red> <font color=red> file type is not acceptable, Please only Select Image file </font></font>";

elseif($err==2)
echo "<font class=b_text><font color=red> Your picture file size exceed the maximum limit please upload picture upto 100 KB </font></font>";

elseif($err==3)
echo "<font class=b_text><font color=red> There was an error uploading the file, please try again OR Choose different Picture!</font></font>";
?>
                    <table width="435" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <th width="51" align="left" valign="top" scope="col"><div align="left"><span class="b_text"><strong>Picture</strong>:</span></div></th>
                        <th width="224" align="left" valign="top" scope="col"><div align="right"><span class="b_text">
                            <input name="uploadedfile" type="file" class="b_text" id="uploadedfile" size="20">
                            <input name="cmdupload" type="submit" class="Table_heading" id="cmdupload4" value="upload">
                        </span></div></th>
                        <th width="4" align="center" valign="top" scope="col">&nbsp; </th>
                        <th width="156" align="center" valign="top" scope="col">
                          <?php	
if(mysql_affected_rows()!=0)
{
?>
                          <table width="145" border="2" cellpadding="0" cellspacing="0" bordercolor="#666666">
                            <tr>
                              <th width="133" scope="col">
                                <?php

$folder_name=trim($row['folder_name']);
$file_name=trim($row['file_name']);

$strurl=$url . "upload/" . $folder_name . $file_name;

?>
                                <img src="<?php echo $strurl ?>" height=150 width=150> </th>
                            </tr>
                            <tr>
                              <th class="b_text" scope="col">150 x 150 </th>
                            </tr>
                          </table>
                          <br>
                          <div align="right"> </div></th>
                      </tr>
                      <tr>
                        <td height="21">&nbsp;</td>
                        <td height="21" colspan="3"><div align="right">
                            <input name="cmdfinish" type="button" class="Table_heading"  value="Finish" onClick="javascript:location='profile_info.php'">
                            <?php
}
?>
                        </div></td>
                      </tr>
                    </table>
                    <div align="right"> </div></td>
              </tr>
            </table>
            </form>          <p> </td>
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
