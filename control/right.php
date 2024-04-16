<?php 
$cat="10";
$src= $url;
//$src="http://localhost/NUST-SEECS_new/"
?>
	
    
<style type="text/css">
<!--
.style3 {font-size: 11px}
-->
</style>



<style>

#menu10 {
	width: 150px;
	margin: 10px;
	}
	
#menu10 li a {
	height: 24px;
  	voice-family: "\"}\""; 
  	voice-family: inherit;
  	height: 20px;
	text-decoration: none;
	}	
	
#menu10 li a:link, #menu10 li a:visited {
	color: #4D4D4D;
	display: block;
	background:  url(<?php echo $url ?>control/menu10.gif);
	padding: 4px 0 0 12px;
	}
	
#menu10 li a:hover {
	color: #FF9834;
	background:  url(<?php echo $url ?>control/menu10.gif) 0 -24px;
	padding: 4px 0 0 12px;
	}


<!--

	-->
  </style>


<table width="140" height="30" border="0" align="right" cellpadding="3" cellspacing="0" bordercolor="#6B696B">
  <tr>
   <td width="139" height="30" align="left" valign="top">
         
	 <table width="87%"  border="0" align="center" cellpadding="3" bordercolor="#000000">     
       <tr>
       	<td>	
            <div id="menu10">
                  <ul style="list-style: none; margin: 0; padding: 0;">
                        <li><a href="<?php echo $src ?>index.php">Alumni Home</a></li>
                        <?php if(!isset($_SESSION['user_id'])){ ?>
                        <li><a href="<?php echo $src ?>login.php">Alumni Login</a></li>
                        <li><a href="<?php echo $src ?>register.php">Register Now</a></li>
                        <?php } ?>
                        
                        <li><a href="http://dev.seecs.edu.pk/cdo/" target="_blank">CDO</a></li>
                        <li><a href="http://www.seecs.nust.edu.pk/event_calendar/">Event Calendar</a></li>
                <?php if(isset($_SESSION['user_id'])){ ?>
                <li><a href="<?php echo $src ?>profile_info.php">My Profile</a></li>
                        <li><a href="<?php echo $src ?>user_search.php">Find a Friend</a></li>
                        <li><a href="<?php echo $src ?>change_pwd.php">Change Password</a></li>
                        <li><a href="<?php echo $src ?>add_info.php">Your Thoughts</a></li>
                        <li><a href="http://alumni.nust.edu.pk" target="_blank">NUST Alumni</a></li>
                    <li ><a href="<?php echo $src ?>signout.php">Signout</a></li> 
                    </ul>
            </div>
        </td>
       </tr>
     </table>
<?php } ?>

<!--
	   <p align="center" class="marquee"><span class="new_heading"></span>
       <select class="fbinput" onChange="if (this.selectedIndex > 0) location.href=this[this.selectedIndex].value;" style="width:130">
         <option value="0" selected="selected">Quick Links</option>
         <option value="http://www.seecs.nust.edu.pk/event_calendar/">Event Calendar</option>
         <option value="http://www.seecs.nust.edu.pk/Seminars_workshops/Seminars_workshops.php">Seminar & workshops </option>
         <option value="http://www.seecs.nust.edu.pk/notice/notice.php">Notice Board </option>
         <option value="http://www.seecs.nust.edu.pk/press/press_release.php">Press Release</option>
         <option value="http://seecs.nust.edu.pk/tendor_notice/tendor_notice.php">Tender Notices</option>
         <option value="http://www.seecs.nust.edu.pk/head_links/careers.php">Career</option>
         <option value="http://www.seecs.nust.edu.pk/campus_life/photo_gallery.php">Photo Gallery</option>
       </select>
     <p align="center" class="marquee"> 
-->


     <p align="center" class="marquee">
    <p align="center" class="marquee">     </td> 	
  </tr>
</table>

