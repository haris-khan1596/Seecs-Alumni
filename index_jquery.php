<?php 
session_start();
include "control/main.php";
?>

<link href="style.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="javascript/js/jquery.js"></script>
<script type="text/javascript" src="javascript/js/easySlider.packed.js"></script>
<script type="text/javascript">
	$(document).ready(function(){	
		$("#slider").easySlider({
			prevText:'Previous',
			nextText:'Next News',
			orientation:'vertical'
		});
	});
</script>

<style>

#slider ul, #slider li{
		margin:0;
		padding:0;
		list-style:none;
		}
	#slider, #slider li{ 
		width:400px;
		height:150px;
		overflow:hidden; 
		}
	#slider li{ 
		background:#FFFFFF;
		}		
	#slider li h2{ 
		margin:0 0px;
		padding-top:0px;
		}	
	#slider li p{ 
		margin:0px;
		}				
span#prevBtn {
position:absolute;
margin-top:10px;
margin-left:230px

}
span#nextBtn {
position:absolute;
margin-top:10px;
margin-left:300px
}				

/* // Easy Slider */

.style3 {font-size: 11px}
</style>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td><?php include "header.php" ?></td>
  </tr>
  <tr>
    <td><br>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="55%"><p class="new_heading">Welcome to SEECS Alumni Family</p>
          <p align="justify" class="b_text">We are proud to launch this special website, exclusively developed for  the former graduates of NUST School of Electrical Engineering and Computer Science (NUST-SEECS). This is a token of love and care from your own alma mater. The idea is to provide you all with a dedicated link to share with your former faculty and successive generations of NUST-SEECS students your thoughts, memories, feelings, views and passions. The new website is a means to knit NUSTian into a fraternity of life-long friends and companions. Let's make this chapter most cherished and delightful. </p>
          <p align="justify" class="b_text">&nbsp;</p></td>
        <td width="2%">&nbsp;</td>
       
<?php if(!isset($_SESSION['user_id'])) { ?>
       
        <td width="43%" valign="top"><p class="new_heading">Alumni Login</p>

<form action="save/chk_login.php" method="post" name="frm_alumniuser" onSubmit="return validate_alumni_login()">
        
          <table width="69%"  border="0" align="left" cellpadding="0" cellspacing="0" bordercolor="#999999">
          <tr bordercolor="#999999">
            <td width="37%" class="b_text" scope="col">User Name * </td>
            <th width="63%" scope="col"><div align="right"><span class="b_text">
                <input name="txtuser" type="text" class="b_text" id="txtemail4" size="25" >
            </span></div></th>
          </tr>
          <tr bordercolor="#999999">
            <td><div align="left"><span class="b_text">Password: *</span></div></td>
            <td align="left" valign="top" class="b_text"><div align="right">
                <input name="txtpassword" type="password" class="b_text" id="txtpassword" size="25">
            </div></td>
          </tr>
          <tr bordercolor="#999999">
            <td colspan="2"><div align="right"><a href="forgot_pwd.php" class="b_link">Forgot Password</a> </div></td>
          </tr>
          <tr bordercolor="#999999">
            <td>&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr bordercolor="#999999">
            <td>&nbsp;</td>
            <td align="right"><input name="cmdsubmit2" type="submit" class="Table_heading" id="cmdsubmit2" value="Login"></td>
          </tr>
        </table>
        
        </form>
        </td>
        
<?php } ?>
        
<?php 
include "control/dbcode.php";

function getpic()
{
$qry_pic="select * from pic where user_id=" . $_SESSION['user_id'] . "";
$result_pic=mysql_query($qry_pic);
$row_pic=mysql_fetch_array($result_pic);

$pic_url=$url . $row_pic["folder_name"] . "/" . $row_pic["file_name"];

if(file_exists($pic_url))
return $pic_url;
else
return $url . $row_pic["folder_name"] . "/no_pic.jpg";
}



if(isset($_SESSION['user_id'])) { 

$qry_info="select * from personal_data where user_id=" . $_SESSION['user_id'] . "";
$result_info=mysql_query($qry_info);
$row_info=mysql_fetch_array($result_info);

?>  
      
 <td width="43%" valign="top">
<table width="90%" border="0" class="b_text">
<tr>
<td valign="top"><?php echo "<b><p align=left>Welcome back " . $row_info["name"]   ?><br>
    <?php echo "(" . $row_info["reg1"] . "-" . $row_info["year_passing_niit"] . ")"   ?><br>
      </p>
    <ul>
    <li><a href="profile_info.php" class="b_link">View/update profile</a>

        </li>
    <li><a href="<?php echo $src ?>user_search.php" class="b_link">Find a Friend</a></li>
    <li><a href="<?php echo $src ?>profile_info.php" class="b_link">My Profile</a></li>
    <li><span class="marquee"><a href="<?php echo $src ?>change_pwd.php" class="b_link">Change Password</a></span></li>
    <li><a href="<?php echo $src ?>add_info.php" class="b_link">Contribute</a></li>
    <li><a href="<?php echo $src ?>signout.php" class="b_link">Signout</a></li>
  </ul>
  </td>
  <td valign="top"><img width="80" height="80" src="<?php echo getpic() ?>"></td> 
</tr>
</table>        
        
        
<?php } ?>        
      </tr>
      <tr>
        <td><p class="new_heading">Birth Day Alert<br>
        </p>
          <table width="99%" height="141" border="0" cellpadding="5" cellspacing="0">
          <tr>
            <td width="23%" height="141" background="images/new_design/1_07.jpg" style="background-repeat:no-repeat">&nbsp;</td>
            <td width="77%" valign="middle" background="images/new_design/1_08.jpg" style="background-repeat:no-repeat"><span class="b_text">
              <?php
			include "birthday.php"
			?>
              <br>
            </span></td>
          </tr>
        </table></td>
        <td>&nbsp;</td>
        <td>
        
          <p><span class="new_heading">Campus News</span></p>
          <div id="slider">
		<ul>				
			<li>
				
              <p class="Marquee">NUST SEECS&nbsp;presents One Day Workshop on Fiber-To-The-Home (FTTH) Technology&nbsp;on  &nbsp;27th of January, &nbsp;2011 (Thursday)<span class="b_text"><br />
  <a  href="Seminars_workshops/pages/ftth/index.php"/ftth/index.php" target="_parent" class="b_link">For detail click here</a></span></p>
   <br>

   <p class="Marquee">NUST SEECS presents a workshop on &ldquo;ITIL &amp; ISO 20000-1&rdquo;       Implementation, Features &amp; Benefits (An overview)&nbsp;on&nbsp;28th of January, 		&nbsp;2011  (Friday)<span class="b_text"><br />
           <a  href="Seminars_workshops/pages/itil_iso/index.php" target="_parent" class="b_link">For detail click here</a></span></p>
			</li>
			<li>
			  <p class="Marquee">NUST SEECS presents a workshop on Learn Real Time PLC Programming &amp; SCADA Implementation From 29th of January 2011(29th  , 30th &nbsp;January and 5th  , 6th February Weekend Program)<br />
                  <span class="b_text"><a  href="Seminars_workshops/pages/caps3/index.php" target="_parent" class="b_link">For detail click here</a></span></p>
<br>
			  <p class="Marquee">NUST SEECS presents 3 days ITIL&reg; V3 Foundation  Preparatory Course on&nbsp;4th,5th  &amp; 6th January, 2011<span class="b_text"><br />
                  <a  href="Seminars_workshops/pages/itil/index.php" target="_parent" class="b_link">For detail click here</a></span></p>
			</li>			
			<li>
			  <p class="Marquee">NUST SEECS ACM Student Chapter has organized NUST Arts Science and Technology Exhibition and Competition (NASTEC 10) from 31st Dec 2010 to 02 Jan 2011<br />
                  <span class="b_text"><a  href="http://nastec.seecs.nust.edu.pk/" target="_blank" class="b_link">For detail click here</a></span></p>
		<br>
	  <p class="Marquee">NUST School of Electrical Engineering and Computer Science (SEECS) presents 2nd Hands-on Workshop on Xilinx FPGA Design Tools 22-23 Dec, 2010<span class="b_text"><br />
                  <a  href="Seminars_workshops/pages/fpga/index.php" target="_parent" class="b_link">For detail click here</a></span></p>
			</li>
		</ul>
</div>        </td>
      </tr>
    </table>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr>
    <td><?php include "footer.php" ?></td>
  </tr>
</table>
