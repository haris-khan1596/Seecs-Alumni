<?php 
ob_start();
session_start(); 
include "control/session.php";
$cat="10";
?>

<html>
<head>
<title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) about NUST-SEECS </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
-->
.list{
     padding-right: 20px;
	 list-style-image:url('images/cap.gif')  
}
</style>






		<!-- right menu Jquery and java script files added here-->
 





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
    <td align="left" valign="top"><div align="left"></div>
    <table width="98%" border="0" align="center" cellpadding="3" cellspacing="0" >
      <tr>
        <td height="993" valign="top">
		
		<p>
		
<?php		
include "control/dbcode.php";
include "control/main.php";
$uid=$_SESSION['user_id'];

$sql="select * from personal_data where user_id='" . $uid . "' ";
//echo $sql;
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>
<script language="javascript" src="javascript/validate.js"></script>
<script language="javascript">
function foc()
{
frmpersonal.txtreg1.focus()
}

function chknum(field)
{
  if(isnum(field.value)==false)
  {
  alert("Please enter Numeric Values")
  field.focus()
  return false;
  }
}
</script>
<style type="text/css">
<!--
.style2 {font-size: 10px}
-->
</style>        
	            <p>
              <?php
				$sql="select * from personal_data where user_id=" . $uid . " ";
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				?>

            <?php if($_GET['chk']=='ok') { ?>                
				<div class="msgbox_green">
    	        Profile updated successfully
        	    </div>
             <?php } ?>
             <?php if($_GET['chk']=='failed') { ?>                
				<div class="msgbox_red">
    	        Unable to update profile, please try again
        	    </div>
             <?php } ?>
            
             <!--

             <img src="<?php echo $url ?>images/icons/no2.png" border="0" align="left">
             -->
            </div>
	


		    <p><a href="liProfile.php"><img src="<?php echo $url ?>images/linkedin.jpg" border="0" align="right"></a>
		    <table width="100%" border="0" cellpadding="4" class="b_text">
              <tr>
                <td width="10%" height="62" rowspan="4" valign="middle" align="center"><?php	
																$sql_pic="select * from pic where user_id=" . $uid . " ";
																//echo $sql_pic;
																//echo $sql_pic['folder_name'];
																$result_pic=mysql_query($sql_pic);
																if(mysql_affected_rows()<=0)
																	{$found_pic="0";
																	echo "<img border=0 src='" . $url . "upload_pic/no_pic.jpg" . "' border=0 height=80 width=80>";
																	}
																else
																{
																	$row_pic=mysql_fetch_array($result_pic);
																	$file_name=trim($row_pic['file_name']);
																	$folder_name=trim($row_pic['folder_name']) . "/";
																	$strurl=$folder_name . $file_name;
																	if(file_exists($strurl))
																		{echo "<img border=0 src='" . $strurl . "' border=0 height=80 width=80>";}
																	else
																		{echo "<img border=0 src='upload_pic/no_pic.jpg' border=0 height=80 width=80>";}
																	
																}
																
															?><strong><span class="b_heading" style="text-align:center"><br>
                <a href="pic.php" class="b_link">Change</a></span></strong></td>
                <td width="90%" rowspan="4" valign="middle"><?php echo "<div class=new_heading>" .  $row['name'] . "</div>"; ?>
                  <?php echo $row['job_title']; ?><br>
                    <?php echo $row['job_company_name']; ?>
                <p>&nbsp;</p></td>
              </tr>
            </table>
		    <hr noshade class="Marquee_links" style="border-bottom-style:dotted; color:#CCCCCC" >
		    <table width="50%" border="0" align="left" cellpadding="5" class="b_text">
              <br>
              <tr>
                <td colspan="2"><span class="new_heading">Personal Information <a href="personal_info.php" class="b_link">Edit</a></span></td>
              </tr>
              <tr>
                <td>NUST Reg No :</td>
                <td><?php echo $row['reg1'] . "-" . $row['reg2'] . "-" . return_title("class_name","class_all","class_id",$row["reg3"]) . "-" . $row['reg4']  ?></td>
              </tr>
              <tr>
                <td>Date of Birth: </td>
                <td><?php echo show_date($row['dob'],"DDMMYYYY"); ?></td>
              </tr>
              <tr>
                <td>National ID Card No: </td>
                <td><?php echo $row['nic1'] . "-" . $row['nic2'] . "-" . $row['nic3']; ?></td>
              </tr>
              <tr>
                <td width="38%">Gender: </td>
                <td width="62%"><?php echo $row['gender']; ?></td>
              </tr>
              <tr>
                <td>Marital Status: </td>
                <td><?php echo $row['marital_status']; ?></td>
              </tr>
              <tr>
                <td>Blood Group: </td>
                <td><?php echo $row['blood_group']; ?></td>
              </tr>
              <tr>
                <td>Last Degree Passed from NIIT/SEECS: </td>
                <td><?php echo $row['last_degree_niit']; ?>-<?php echo $row['year_passing_niit']; ?></td>
              </tr>
              <tr>
                <td>Emergency Contact No:</td>
                <td><?php echo $row['emergency_contact_no']; ?></td>
              </tr>
            </table>
		    <table width="50%" cellpadding="5" class="b_text">

              <tr>
                <td colspan="2"><span class="new_heading">Contact Information</span></td>
              </tr>
              <tr>
                <td width="18" valign="top"><div align="right"><img src="images/icons/adress.png" alt="Address" align="top"></div></td>
                <td width="423"><?php echo $row['address']; ?></td>
              </tr>
              <tr>
                <td valign="top"><div align="right"><img src="images/icons/phone.png" alt="Phone No" align="top"></div></td>
                <td><?php echo $row['ph']; ?></td>
              </tr>
              <tr>
                <td valign="top"><div align="right"><img src="images/icons/mobile.png" alt="Mobile No" align="top"></div></td>
                <td><?php echo $row['mob']; ?></td>
              </tr>
              <tr>
                <td valign="top"><div align="right"><img src="images/icons/email.png" alt="E-Mail Address" align="top"></div></td>
                <td><?php echo $row['sec_email']; ?></td>
              </tr>
              <tr>
                <td valign="top"><div align="right"><img src="images/icons/facebook.png" alt="Skype ID" width="18" align="top"></div></td>
                <td><?php echo $row['facebook']; ?></td>
              </tr>
              <tr>
                <td valign="top"><div align="right"><img src="images/icons/skype.png" alt="Skype ID" align="top"></div></td>
                <td><?php echo $row['skype']; ?></td>
              </tr>
              <tr>
                <td height="33" valign="top"><div align="right"><img src="images/icons/twitter1.png" alt="Twitter ID" align="top"></div></td>
                <td><?php echo $row['twitter']; ?></td>
              </tr>
            </table>
		    <p align="center"><br>            
		    <hr noshade class="Marquee_links" style="border-bottom-style:dotted; color:#CCCCCC" >
		    <table width="99%" height="123" border="0" align="left">
              <tr>
                <td width="48%" height="119" valign="top"><table width="100%" height="117" border="0" align="left" cellpadding="5" cellspacing="3" class="b_text">
				<tr>
                    <td height="38" colspan="2"><span class="new_heading">Current Job Detail <a href="personal_info.php#job_detail" class="b_link">Edit</a></span></td>
  		        </tr>
				<tr valign="top">
                   	<td height="70">
                      	<?php if(isset($row['job_title']) && $row['job_title'] !=''){ 
                  			echo "Working as  <em>".$row['job_title']."</em>  in  <em>".$row['job_company_name']."</em>  in the industry of  <em>".$row['job_company_industry']."</em>
							from  <em>". show_date($row['job_startdate'],"dd-mm-yyyy")."</em>. My job summary is  <em>".$row['job_summary']."</em>.";
                         } else { 
                         
						 echo "Not yet posted";
						 
                         } ?>
                                              </td>
                 </tr>
              </table></td>
              </tr>
            </table>
            
              
				<!--////////////////////////////Academic Details/----------------------------------->
			<hr noshade class="Marquee_links" style="border-bottom-style:dotted; color:#CCCCCC" >
			  <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
               <hr noshade class="Marquee_links" style="border-bottom-style:dotted; color:#CCCCCC" >
			<p><span class="new_heading">Academic Details</span>
                 <?php
						$sql="select * from academic_detail where user_id=" . $uid . " order by duration_from DESC ";
						$result=mysql_query($sql);
						if(mysql_affected_rows()<=0)
						echo "<span class=b_text>: NIL </span>  <a href=academic_detail.php>Edit</a> </p>";
						else{
				?>
       	    <a href="academic_detail.php" class="b_link">Edit</a> </p>
            	<?php
                    $i=1;
					while($rows=mysql_fetch_array($result))
						{
						?>              

                            <ul >
                                <li class="b_text"><em><?php echo $rows['degree']; ?> </em>(<em><?php echo show_date($rows['duration_from'],"mmyyyy") ?> </em>to
                                <em> <?php echo show_date($rows['duration_to'],"mmyyyy") ?> </em>) equals to <em><?php echo $rows['degree_equal']; ?> </em>passing with
                                <em><?php echo $rows['gpa']; ?> </em>having Majors <em><?php echo $rows['major']; ?></em> from <em><?php echo $rows['university']; ?> </em> </li>
                            </ul>
						<?php 
                        $i=$i+1;
                        }//wend
                        ?>
      <?php 
                }//end if
                ?>

              <!-- /////////////////-----------Research Experience-----------///////////////////// -->
              
              <hr noshade class="Marquee_links" style="border-bottom-style:dotted; color:#CCCCCC" >
              
              <p></p>
              <p><span class="b_text"><strong><span class="new_heading">Research Experience</span></strong></span>
                  <?php
					$sql="select * from research_experience where user_id=" . $uid . " order by duration_from DESC";
					$result=mysql_query($sql);
					if(mysql_affected_rows()<=0)
					echo "<span class=b_text>: NIL </span>  <a href=research_info.php>Edit</a> </p>";
					else
					{
					?>
	                  <a href="research_info.php" class="b_link">Edit</a> </p>
					<?php
					 $i=1;
						while($rows=mysql_fetch_array($result))
						{
						?>             
                            <ul class="b_text" >
                            <li class="b_text"><em><?php echo $rows['post']; ?> </em> after <em><?php echo $rows['after_degree']; ?></em> 
                            (<em><?php echo show_date($rows['duration_from'],"mmyyyy") ?> </em>to<em> <?php echo show_date($rows['duration_to'],"mmyyyy") ?> </em>) 
                            from <em><?php echo $rows['university']; ?> </em> </li>
                            </ul>
<p>
		                      <?php 
						$i=$i+1;
						}
						?>
            </p>
		                    <p>
		                      <?php 
						$i=$i+1;
						}
						?>
                              <!-- /////////////////-----------PUBLICATIONS-----------///////////////////// -->
                              
            <hr noshade class="Marquee_links" style="border-bottom-style:dotted; color:#CCCCCC" >
</p>
		                    <p></p>
		                    <p><span class="b_text"><strong><span class="new_heading">Publications </span></strong><a href="publication_info.php" class="b_link">Edit</a></span>
                                <?php
					$sql="select * from publications where user_id=" . $uid . " order by dates DESC";
					$result=mysql_query($sql);
					if(mysql_affected_rows()<=0)
					echo "<span class=b_text>: NIL </span> </p>";
					else
					{
						echo "</p>";
						$i=1;
						while($rows=mysql_fetch_array($result))
						{
						?>
                            <ul>
                              <li class="b_text"><em><?php echo $rows['author_name']; ?></em>, <?php echo $rows['co_author_name']; ?>, "<em><?php echo $rows['title']; ?> </em>"
							  <?php echo $rows['pub_in']; ?><?php echo ", <em>".$rows['org_pub']."</em>"; ?><?php echo ", Vol.<em>".$rows['vol']."</em>"; ?> 
							  <?php echo ", No <em>".$rows['no']."</em>"; ?> <?php echo ", pp <em>".$rows['pp']."</em>"; ?>, <?php echo show_date($rows['dates'],"ddmmyyyy"); ?></li>
                            </ul>
                            <p>
                              <?php 
							$i=$i+1;
						}
					}
						?>
            </p>
                            <p>
                              <?php 
						echo "<p class=b_text align=right><small>Last Updated: " . show_date($row['entry_date'],"DDMMYYYY") . "(" . $row['entry_time'] . ")</small></p>";
						?>
                                                        </p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
        </table>
    </table>		  </td>
      </tr>
    </table>    
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">
<span class="b_link">
<?php include "footer.php" ?>
	</span>
	</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">
<span class="b_link">
<?php //include "../footerlinks.php"; ?>
	</span></td>
  </tr>
</table>
    
</body>
</html>
