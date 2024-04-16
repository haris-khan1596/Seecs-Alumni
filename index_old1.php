<?php 
$cat="10";
session_start();
?>
<html>
<head>
<title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) about NUST-SEECS </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {font-size: 12px}
-->
</style>
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
    <td width="8" rowspan="2" align="left" valign="top">&nbsp;	</td>
  </tr>
  <tr>
    <td width="128" height="631" align="left" valign="top" class="left_bgcolor"><span class="right_bgcolor">
      <?php include "control/right.php"; ?>
    </span>
	</td>
    <td align="left" valign="top"><table width="794" border="0" align="left" cellpadding="3" cellspacing="0">
      <tr>
        <td width="788" height="323" valign="top">		<table border="0">
          <tr valign="middle">
            <td height="51"><span class="b_heading"><img src="images/niit_alumni_family.jpg"></span>              <div align="right"> <a href="login.php"> </a></div>              <div align="right"></div></td>
            <td width="141" align="right"><div align="right"><a href="register.php"><img src="images/new_user.jpg" border="0"></a></div></td>
            <td width="75" align="right"><div align="right"><a href="login.php"><img src="images/login.jpg" border="0"></a></div></td>
          </tr>
          <tr>
            <td height="101" colspan="3" valign="top"><p align="justify" class="b_heading">                    <span class="b_text"> We  are proud to launch this special website, exclusively developed for &nbsp;the former  graduates of NUST School of Electrical Engineering and Computer Science (NUST-SEECS). This is a token of love and care from your own alma mater. The idea is to provide you all with a dedicated link to share with your former faculty and successive generations of NUST-SEECS students your thoughts, memories, feelings, views and passions. The new website is a means to knit NUSTian into a fraternity of life-long friends and companions. Let's make this chapter most cherished and delightful. Long live, NUST-SEECS alumni! We are truly proud of you!! <br>
              <br>
            </span></p></td>
          </tr>
        </table>          
          <table width="781"  border="0" cellpadding="3">
          <tr>
            <td width="355" height="103" valign="top" class="b_heading"><table width="103%"  border="1" align="left">
              <tr>
                <td bgcolor="#E5E4CE" class="Table_heading style1">News and 

 
                  <strong>Announcements </strong> </td>
              </tr>
              <tr>
                <td height="135" valign="top" class="b_text"><div align="center">
                  <table width="181" height="131" border="0" align="left" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="6" height="131"></td>
                        <td width="169" align="left" valign="top">
                          <iframe name="I1" src="news.php" height="150" width="365" scrolling="auto" frameborder="0" marginheight="0" marginwidth="0" align="right"> </iframe>                        </td>
                      </tr>
                    </table>
                </div></td>
              </tr>
            </table>        
			<?php
			$pic=array();
			$pic[1]="images/index_pics/BIT-4_group_picture.jpg";
			$pic[2]="images/index_pics/naac.jpg";
			$pic[3]="images/index_pics/bit5.jpg";
			$pic[4]="images/index_pics/bicse1.jpg";
			$pic1=rand(1,4)
			?>              </td>
            <td width="408" rowspan="2" valign="top"><div align="right"><img src="<?php echo $pic[$pic1] ?>" width="400" height="259"></div></td>
          </tr>
          <tr>
            <td height="103" valign="top" class="b_heading"><table width="368" border="1" align="left">
              <tr>
                <td width="350" bgcolor="#E5E4CE" class="Table_heading">Words from Alumni </td>
              </tr>
              <tr>
                <td height="64" valign="top"><p class="b_text">Contribute you articles, quotes, poetry etc</p>
                    <p align="right"><a href="add_info.php" target="_parent" class="b_link">Contribute</a></p></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="103" colspan="2" valign="top" class="b_text">
			<?php
			include "birthday.php"
			?>			</td>
            </tr>
        </table>      </tr>
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
