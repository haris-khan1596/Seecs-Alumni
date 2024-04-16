<?php 
$cat="10";
$src="http://seecs.edu.pk/"
//$src="http://localhost/NUST-SEECS_new/"
?>
<style type="text/css">
<!--
.style3 {font-size: 11px}
-->
</style>


<table width="140" height="263" border="0" align="right" cellpadding="3" cellspacing="0" bordercolor="#6B696B">
  <tr>
   <td width="139" height="30" align="left" valign="top"><p align="center" class="marquee"><span class="Marquee">
   
   </span>
       <select class="b_link" onChange="if (this.selectedIndex > 0) location.href=this[this.selectedIndex].value;" style="width:130">
         <option value="0" selected="selected">Latest Updates</option>
         <option value="http://www.seecs.edu.pk/event_calendar/">Event Calendar</option>
         <option value="http://www.seecs.edu.pk/Seminars_workshops/Seminars_workshops.php">Seminar & workshops </option>
         <option value="http://www.seecs.edu.pk/notice/notice.php">Notice Board </option>
         <option value="http://www.seecs.edu.pk/press/press_release.php">Press Release</option>
         <option value="http://seecs.edu.pk/tendor_notice/tendor_notice.php">Tender Notices</option>
         <option value="http://www.seecs.edu.pk/head_links/careers.php">Career</option>
         <option value="http://www.seecs.edu.pk/campus_life/photo_gallery.php">Photo Gallery</option>
       </select>
     <p align="center" class="marquee">             
	 <table width="87%"  border="1" align="center" cellpadding="3" bordercolor="#000000">
       <tr>
         <td><a href="<?php echo $src ?>alumni/index.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Alumni Home</span></font></a></td>
       </tr>
<?php if(!isset($_SESSION['user_id'])){ ?>
       <tr>
         <td><a href="<?php echo $src ?>alumni/login.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Alumni Login</span></font></a></td>
       </tr>
       <tr>
         <td><a href="<?php echo $src ?>alumni/register.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Register Now </span></font></a></td>
       </tr>
       <tr>
<?php } ?>	   
         <td><a href="<?php echo $src ?>alumni/pages/career.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Job Opportunities </span></font></a></td>
       </tr>
       <tr>
         <td><span class="marquee"><a href="<?php echo $src ?>alumni/event_calendar/index.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Event Calendar </span></font></a></span></td>
       </tr>
<!--       <tr>
         <td><a href="http://niit.edu.pk/alumni/forum" class="b_link" target="_blank"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Alumni Forum </span></font></a></span></td>
       </tr>

       <tr>
         <td><a href="http://www.niit.edu.pk/campus_life/photo_gallery.php" class="b_link" ><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Photo Gallery </span></font></a></span></td>
       </tr>
	   <tr>
-->	   	
         <td><a href="<?php echo $src ?>alumni/pages/contact.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Contact Us </span></font></a></span></td>
       </tr>
       <tr>
         <td><a href="http://seecs.edu.pk" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">SEECS Home</span></font></a></td>
       </tr>
      </table><br>
<?php if(isset($_SESSION['user_id'])){ ?>
<table width="87%"  border="1" align="center" cellpadding="3" bordercolor="#000000">
       <tr>
         <td><a href="<?php echo $src ?>alumni/user_search.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Find a Friend</span></font></a></td>
       </tr>
       <tr>
         <td><span class="marquee"><a href="<?php echo $src ?>alumni/profile_info.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">My Profile</span></font></a></span></td>
       </tr>
       <tr>
         <td><span class="marquee"><a href="<?php echo $src ?>alumni/change_pwd.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Change Password</span></font></a></span></td>
       </tr>
       <tr>
         <td><span class="marquee"><a href="<?php echo $src ?>alumni/add_info.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Contribute</span></font></a></span></td>
       </tr>
       <tr>
         <td><span class="marquee"><a href="<?php echo $src ?>alumni/signout.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Signout</span></font></a></span></td>
       </tr>
     </table>
<?php } ?>

     <p align="center" class="marquee">
    <p align="center" class="marquee">     </td> 	
  </tr>
  <tr>
    <td align="left" bgcolor="E5E4CE">
  </tr>
  <tr>
    <td height="18" bgcolor="#F3AC18"><div align="center"><span class="Headings">Do you Know </span></div></td>
  </tr>
  <tr>
    <td height="126" align="left" valign="top" style="padding-top:0;padding-left:0;padding-right:0;padding-bottom:0" ><div align="center">
<?php
//-------------------------Random Pictures-----------------------------------
mysql_connect("localhost","root","BingoBus");
//mysql_connect("localhost","root","");
mysql_select_db("niit");

function getrandom($catval)
{
Global $getdesc;
Global $geturl;
Global $pickval;

if(empty($catval))
$sql="select pid,catid from pic order by catid";
else
$sql="select pid,catid from pic where cat= '" . $catval . "' order by catid";

$request=mysql_query($sql);
$row=mysql_fetch_array($request);
$min=$row["catid"];
while($row=mysql_fetch_array($request))
{
$max=$row["catid"];
}
$pickval= rand($min,$max);

if(empty($catval))
$sql="select * from pic where catid=" . $pickval . " ";
else
$sql="select * from pic where catid=" . $pickval . " AND cat='" . $catval . "' ";

$request2=mysql_query($sql);
$row2=mysql_fetch_array($request2);

$getdesc=$row2["pdesc"];
$geturl=$row2["url"];

}
//------------------------End Random-------------------------------------
?>

<?php

$catval=$cat;
getrandom($catval);

echo "<img width=138 height=126 src=" . $geturl . " > ";
?>
    </div></td>
  </tr>
  <tr>
    <td height="57" align="left" valign="top"><p class="Marquee">
	  <?php echo $getdesc; ?>
    </p>      </td>
  </tr>
</table>
