<?php
$cat = "10";
session_start();
?>
<html>
    <head>
        <title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) about NUST-SEECS </title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="style.css" rel="stylesheet" type="text/css">
        <script language="javascript" src="javascript/validate.js"></script>
        <script language="javascript" src="javascript/js/jquery.js"> </script>
        
		<script language="javascript">
			$(document).ready(function(){
			$("#txtuser").focus();
			});
		</script>
        
        
    </head>
    <body>
        <table border="0" align="center" cellpadding="0" cellspacing="0" class="table_main">
            <tr>
                <td height="0" colspan="3" align="left" valign="top" style="background:url(images/bg.jpg); background-repeat:repeat-x;">
                    <?php include "header.php"; ?>
                </td>
            </tr>


            <tr>
                <td colspan="2" align="left" valign="top">
                    <?php include "../header2.php"; ?>
                </td>
                <td width="10" rowspan="2" align="left" valign="top">&nbsp;
                </td>
            </tr>
            <tr>
                <td align="left" valign="top" class="table_left">
                    <span class="right_bgcolor">
                        <?php include "control/right.php"; ?>
                    </span>	</td>
                <td align="left" valign="top">
                <table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
                        <tr>
                            <td height="323" valign="top" >
							<?php 
							if ($_GET['err'] == 1) 
							echo "<div class=msgbox_red>Login Failed - Invalid User Name or Password </div>";
							elseif ($_GET['err_cm'] == 1) 
							echo "<div class=msgbox_info>Your card has been made, kindly contact the Alumni Relation Officer at <a href='mailto:shafaq.soomro@seecs.edu.pk' class=b_link>shafaq.soomro@seecs.edu.pk </a> to collect your card. If you just want to update your profile <a href=login.php class=b_link>Click Here</a> </div>";
                            
							 ?>
                            <br>
                            <div class="round_div b_gradient" style="height:120px ; width:350px" >
                                  
                                  <?php
								  //if($_GET["wz"]=="1")
								  //$submit_url="save/chk_login.php?wz=1";
								  //else
								  $submit_url="save/chk_login.php";
								  ?>
                                  <form action="<?php echo $submit_url ?>" method="post" name="frm_alumniuser" onSubmit="return validate_alumni_login()">
                                    
                                    
                                    
                                    <table width="98%" border="0" cellpadding="2" >
                              <tr>
                                                <td width="40"><img src="images/home_icon/lock.png" align="middle"></td>
                                <td width="314"><span class="img_heading">Alumni Login</span></td>
                              </tr>

                                            <tr>
                                                <td height="108" colspan="2">

                                                    <table width="100%" height="93"  border="0" align="left" cellpadding="3" cellspacing="0">
                                                  <tr>
                                                            <td width="28%" class="b_text">User Name *</td>
                                                            <td width="72%"><span class="b_text">
                                                            <input name="txtuser" type="text" class="fbinput" id="txtuser" size="25" ></span>                                                            </td>
                                                      </tr>
                                                        <tr>
                                                            <td width="28%" height="27" class="b_text">Password: *</td>
                                                          <td align="left" valign="top"><input name="txtpassword" type="password" class="fbinput" id="txtpassword" size="25">                                                          </td>
                                                      </tr>
                                                        <tr>
                                                          <td>&nbsp;</td>
                                                          <td> <input name="cmdsubmit2" type="submit" class="black_button" id="cmdsubmit2" value="Login">                                                          </td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td align="right"><a href="register.php" class="b_link">Register Now</a> |
                                                            <a href="forgot_pwd.php" class="b_link">Forgot Password</a></td>
                                                        </tr>
                                              </table></td>
                                            </tr>
                                    </table>
                                  </form>
                              </div>   
                                
                            </td>
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
