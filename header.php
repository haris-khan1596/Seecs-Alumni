<?php
$url="http://alumni.seecs.nust.edu.pk/";
//$url="http://localhost/seecs/alumni_nd/";
//$url="http://dev.seecs.edu.pk/alumni/";

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: SEECS Alumni ::</title>
<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
-->
</style>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="964" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><img src="<?php echo $url ?>images/new_design/1_01.jpg" alt="SEECS Alumni" width="1000" height="83" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td width="47" valign="top"><img src="<?php echo $url ?>images/new_design/1_02.jpg" /></td>
    <td width="634" valign="top"><?php include "slideshow.php" ?></td>
    <td width="320" valign="top" background="<?php echo $url ?>images/new_design/1_04.jpg" style="background-repeat:no-repeat"><br />
      <table width="275" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>
        <td width="122">&nbsp;</td>
        <td width="153"><?php
//===================RANDOM PICTURE CODE =========================
mysql_connect("localhost","snust_homepanels","cN^NBTdH]9~g");
mysql_select_db("snust_homepanels");

//mysql_connect("localhost","root","BingoBus");
//mysql_select_db("niit");


Global $getdesc;
Global $geturl;
Global $pickval;

$cat=10;

if($cat<>"")
$sql = "SELECT pid,REPLACE(pdesc,'NUST-SEECS','NUST-SEECS') as pdesc,url,cat,catid FROM pic where cat= " . $cat . " order by rand() limit 1";
else
$sql = "SELECT pid,REPLACE(pdesc,'NUST-SEECS','NUST-SEECS') as pdesc,url,cat,catid FROM pic order by rand() limit 1";

$request=mysql_query($sql);
$row=mysql_fetch_array($request);
if(mysql_affected_rows()<=0)
{
$sql = "SELECT pid,REPLACE(pdesc,'NUST-SEECS','NUST-SEECS') as pdesc,url,cat,catid FROM pic order by rand() limit 1";
$request=mysql_query($sql);
$row=mysql_fetch_array($request);
}

$getdesc=$row["pdesc"];
$geturl=$row["url"];

//echo "<img width=100 height=96 src=" . $geturl . " > ";
//echo "<img width=100 height=96 src=" . $url , "/images/pin.png >";
//===================END RANDOM PICTURE CODE =========================
?></td>
      </tr>
      <tr>
        <td height="57" colspan="2" align="left" valign="top"><table width="84%" border="0" cellspacing="0" cellpadding="10">
            <tr>
              <td><br><span class="Marquee"><?php echo $getdesc; ?></span></td>
            </tr>
          </table>
          <p class="Marquee"><br />
          </p></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="44" colspan="3" background="<?php echo $url ?>images/new_design/1_05.jpg" style="background-repeat:no-repeat">

<table width="695" border="0" align="center">
<tr><td>
	    <?php include "ddmenu/index.php" ?>
</td></tr>
</table>
    
    
    
    </td>

    
  </tr>
</table>



<map name="Map" id="Map">
<area shape="rect" coords="760,9,790,35" href="http://www.facebook.com/NUST.SEECS" target="_blank" alt="Join us on Facebook" title="Join us on Facebook" />
<area shape="rect" coords="800,9,827,35" href="http://twitter.com/nustseecs" target="_blank" alt="Join us on Twitter" title="Join us on Twitter" />
<area shape="rect" coords="838,8,867,38" href="http://www.linkedin.com/companies/nust-school-of-electrical-engineering-&amp;-computer-science" target="_blank" alt="Join us on Linked In" title="Join us on Linked In" />
<area shape="rect" coords="878,10,913,39" href="<?php echo $url ?>index.php" alt="Alumni Home" title="Alumni Home" />
<area shape="rect" coords="924,10,956,38" href="<?php echo $url ?>contact.php" alt="Contact Us" title="Contact Us" />
</map>