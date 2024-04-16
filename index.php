<?php
session_start();
ob_start();
include "control/main.php";
?>

<link href="style.css" rel="stylesheet" type="text/css">


<body>
<br>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
            <td><?php include "header.php" ?></td>
        </tr>
        <tr>
            <td><br>
                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <?php if (!isset($_SESSION['user_id'])) {
                        ?>
                            <td width="55%" valign="top">
                                <div class="round_div b_gradient" style="height:170px" >
                                    <span class="img_heading">Welcome to SEECS Alumni Family</span>
                                  <p align="justify" class="b_text" >NUST SEECS  Alumni Association is a token of love and care for our own Alma mater. It  provides all alumni a dedicated platform for sharing with your former faculty  and successive generations of NUST SEECS students your achievements, memories,  views and passions. This association also aims to knit SEECS Alma meter into  fraternity of life-long friends and companions.</p>
                                </div>                            </td>



                            <td width="43%" valign="top">
                                <div class="round_div b_gradient" style="height:170px"  >
                                  <form action="save/chk_login.php" method="post" name="frm_alumniuser" onSubmit="return validate_alumni_login()">
                                    <table width="98%" border="0" cellpadding="2">
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
                                                            <input name="txtuser" type="text" class="fbinput" id="txtemail4" size="25" ></span>                                                            </td>
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
                              </div>                            </td>

                        <?php } ?>
                    </tr>
                    <tr>



                        <td>
                            <div class="round_div b_gradient" style="height:150px; line-height:150%;" >
                                <img src="images/home_icon/news.png" width="32" height="28" align="middle" style="margin-top:-10px"><span class="img_heading"> Campus News</span>
                              <p>
                                <marquee direction="up" scrollamount="1" width="100%" height="120" onMouseOver="stop()" onMouseOut="start()" behavior="scroll">
                                <style>
								.widget-title{display:none}
								.event-content-widget {font-family:Verdana, Geneva, sans-serif; font-size:12px}
								li {list-style-type: none !important;}
								</style>
                                
                                    <?php
                                    echo file_get_contents("http://seecs.nust.edu.pk/includes/news.php", false);
                                    //include "news.php";
                                    ?>
                                </marquee>
                                </p>
                            </div>                        </td>

                        <td valign="top">
                            <div class="round_div b_gradient" style="height:150px">
                                <table width="99%" >
                                    <tr><td width="32">
                                  <img src="images/home_icon/bday.png" align="middle"><br></td>
                                      <td><span class="img_heading">Birthday Alerts</span></td>
                                  </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top"><span class="b_text">
                                                <?php
                                                include "birthday.php"
                                                ?>
                                                <br>
                                            </span></td>
                                    </tr>
                                </table>
                          </div>                        </td>
                    </tr>
                </table>

<?php
                                                if (isset($_SESSION['user_id'])) {
                                                    $URL = "welcome.php";
                                                    header("Location: $URL");
                                                }
                ?>




                                                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td align="center" >
                                                            <br>
<?php include "scroll_news/index.php" ?>
                                                <br>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td><?php include "footer.php" ?></td>
        </tr>
    </table>
