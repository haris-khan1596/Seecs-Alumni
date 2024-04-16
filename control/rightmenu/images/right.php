<?php 
$cat="10";
$src= $url;
//$src="http://localhost/NUST-SEECS_new/"
?>
	
    <!--
    <link type="text/css" href="<?php echo $url ?>control/rightmenu/menu.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo $url ?>control/rightmenu/jquery.js"></script>
    <script type="text/javascript" src="<?php echo $url ?>control/rightmenu/menu.js"></script>
	-->


<style type="text/css">
<!--
.style3 {font-size: 11px}
-->
</style>



<style>
#menu14 {
	width: 200px;
	margin: 10px;
	}
	
#menu14 li a {
	height: 32px;
  	voice-family: "\"}\""; 
  	voice-family: inherit;
  	height: 24px;
	text-decoration: none;
	}	
	
#menu14 li a:link, #menu14 li a:visited {
	color: #333;
	display: block;
	background:  url(control/rightmenu/menu14.gif);
	padding: 8px 0 0 10px;
	}
	
#menu14 li a:hover {
	color: #FFF;
	background:  url(control/rightmenu/menu14.gif) 0 -32px;
	padding: 8px 0 0 10px;
	}				
  </style>





<table width="140" height="30" border="0" align="right" cellpadding="3" cellspacing="0" bordercolor="#6B696B">
  <tr>
   <td width="139" height="30" align="left" valign="top"><p align="center" class="marquee"><span class="Marquee">
   
   </span>
       <select class="b_link" onChange="if (this.selectedIndex > 0) location.href=this[this.selectedIndex].value;" style="width:130">
         <option value="0" selected="selected">Latest Updates</option>
         <option value="http://www.seecs.nust.edu.pk/event_calendar/">Event Calendar</option>
         <option value="http://www.seecs.nust.edu.pk/Seminars_workshops/Seminars_workshops.php">Seminar & workshops </option>
         <option value="http://www.seecs.nust.edu.pk/notice/notice.php">Notice Board </option>
         <option value="http://www.seecs.nust.edu.pk/press/press_release.php">Press Release</option>
         <option value="http://seecs.nust.edu.pk/tendor_notice/tendor_notice.php">Tender Notices</option>
         <option value="http://www.seecs.nust.edu.pk/head_links/careers.php">Career</option>
         <option value="http://www.seecs.nust.edu.pk/campus_life/photo_gallery.php">Photo Gallery</option>
       </select>
     <p align="center" class="marquee">             
	 <table width="87%"  border="0" align="center" cellpadding="3" bordercolor="#000000">
 <!--
       <tr>
         <td><a href="<?php echo $src ?>index.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Alumni Home</span></font></a></td>
       </tr>
<?php if(!isset($_SESSION['user_id'])){ ?>
       <tr>
         <td><a href="<?php echo $src ?>login.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Alumni Login</span></font></a></td>
       </tr>
       <tr>
         <td><a href="<?php echo $src ?>register.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Register Now </span></font></a></td>
       </tr>
       <tr>
<?php } ?>	   
         <td><a href="<?php echo $src ?>pages/career.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Job Opportunities </span></font></a></td>
       </tr>
       <tr>
         <td><span class="marquee"><a href="<?php echo $src ?>event_calendar/index.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Event Calendar </span></font></a></span></td>
       </tr>
 	
         <td><a href="<?php echo $src ?>pages/contact.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Contact Us </span></font></a></span></td>
       </tr>
       <tr>
         <td><a href="http://seecs.nust.edu.pk" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">SEECS Home</span></font></a></td>
       </tr>
      </table><br>
<?php if(isset($_SESSION['user_id'])){ ?>
<table width="87%"  border="1" align="center" cellpadding="3" bordercolor="#000000">
       <tr>
         <td><a href="<?php echo $src ?>user_search.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Find a Friend</span></font></a></td>
       </tr>
       <tr>
         <td><span class="marquee"><a href="<?php echo $src ?>profile_info.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">My Profile</span></font></a></span></td>
       </tr>
       <tr>
         <td><span class="marquee"><a href="<?php echo $src ?>change_pwd.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Change Password</span></font></a></span></td>
       </tr>
       <tr>
         <td><span class="marquee"><a href="<?php echo $src ?>add_info.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Contribute</span></font></a></span></td>
       </tr>
       <tr>
         <td><span class="marquee"><a href="<?php echo $src ?>signout.php" class="b_link"><font color="#333333" face="Verdana, Arial, Helvetica, sans-serif" style="font-weight:normal"><span class="marquee style3">Signout</span></font></a></span></td>
       </tr>
       
      --> 
       
       
       <tr>
       	<td>	
            <div id="menu14">
                  <ul>
                        <li><a href="<?php echo $src ?>index.php"><span>Alumni Home</span></a></li>
                        <?php if(!isset($_SESSION['user_id'])){ ?>
                        <li><a href="<?php echo $src ?>login.php"><span>Alumni Login</span></a></li>
                        <li><a href="<?php echo $src ?>register.php"><span>Register Now</span></a></li>
                        <?php } ?>
                        <li><a href="<?php echo $src ?>pages/career.php"><span>Job Opportunities</span></a></li>
                        <li><a href="<?php echo $src ?>event_calendar/index.php"><span>Event Calendar</span></a></li>
                        <li><a href="http://seecs.nust.edu.pk"><span>SEECS Home</span></a></li>
                        <li ><a href="<?php echo $src ?>pages/contact.php"><span>Contact Us</span></a></li>
                        <?php //if(isset($_SESSION['user_id'])){ ?>
                        <li><a href="<?php echo $src ?>user_search.php"><span>Find a Friend</span></a></li>
                        <li><a href="<?php echo $src ?>profile_info.php"><span>My Profile</span></a></li>
                        <li><a href="<?php echo $src ?>change_pwd.php"><span>Change Password</span></a></li>
                        <li><a href="<?php echo $src ?>add_info.php"><span>Contribute</span></a></li>
                        <li ><a href="<?php echo $src ?>signout.php"><span>Signout</span></a></li> 
                    </ul>
            </div>
        </td>
       </tr>
       
       
       
       
       
       
     </table>
<?php } ?>

     <p align="center" class="marquee">
    <p align="center" class="marquee">     </td> 	
  </tr>
</table>

<div style="visibility:hidden">
<a href="http://apycom.com/">Apycom jQuery Menus</a>
</div>