<?php
session_start();
ob_start();
include "control/main.php";
include "control/session.php";
?>
<body>
<br>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
            <td><?php include "header.php" ?></td>
        </tr>
        <tr>
            <td><br>

                <?php
                include "control/dbcode.php";

                function getpic() {
                    $qry_pic = "select * from pic where user_id=" . $_SESSION['user_id'] . "";
                    $result_pic = mysql_query($qry_pic);
                    if (mysql_affected_rows() <= 0)
                        return $url . "upload_pic/no_pic.jpg";
                    else {
                        $row_pic = mysql_fetch_array($result_pic);
                        $pic_url = $url . $row_pic["folder_name"] . "/" . $row_pic["file_name"];

                        if (file_exists($pic_url))
                            return $pic_url;
                        else
                            return $url . "upload_pic/no_pic.jpg";
                    }
                }

                if (isset($_SESSION['user_id'])) {

                    $qry_info = "select * from personal_data where user_id=" . $_SESSION['user_id'] . "";
                    $result_info = mysql_query($qry_info);
                    $row_info = mysql_fetch_array($result_info);
                }
                ?>
                <table width="97%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
                        <!-------   First Column        -->
                        <td valign="top" width="30%">
                           <div class="round_div b_gradient" style="height:195px; width:86%">
                                <table width="100%" border="0" class=""b_text">
                                       <tr>
                                        <td valign="top"><?php echo "<b><span align=left class=b_heading>Welcome Back!<br> <strong>" . $row_info["name"] . "</strong></span>" ?><br>                                        </td>
                                        <td valign="top"><img align=center width="60" border=1 height="60" src="<?php echo getpic() ?>"  style="margin-left:50px"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">

                                            <div>
                                            
                                                <ul class="bullet_menu">
                                                    <li><a href="<?php echo $src ?>profile_info.php" class="b_link">My Profile</a></li>
                                                    <li><a href="<?php echo $src ?>change_pwd.php" class="b_link">Change Password</a></li>
                                                    <li><a href="<?php echo $src ?>add_info.php" class="b_link">Thoughts & Suggestions</a></li>
                                                    <li><a href="cs.php" class="b_link">Request Transcripts</a></li>
                                                    <li><a href="<?php echo $src ?>signout.php" class="b_link">Sign out</a></li>
                                                </ul>
                                            </div>                                        </td>
                                    <tr>
                                </table>
                          </div>
                            <br>
                             <div class="round_div b_gradient" style="width:86%">
                                <table width="99%" style="margin-top:5px">
                                    <tr><td>
                                  <img src="images/home_icon/bcake.png" align="middle" style="margin-top:-10px"><span class="img_heading"> Birthday Alerts</span><br></td></tr>
                                    <tr>
                                        <td align="left" valign="top"><span class="s_text">
                                                <?php
                                                include "birthday.php"
                                                ?>
                                                <br>
                                            </span></td>
                                    </tr>
                                </table>
                            </div>                        </td>


                        <!-------   Second Column        -->

                        <td valign="top" width="40%">
                        <div class="round_div b_gradient">
                                <img src="images/home_icon/news.png" width="32" height="32" align="middle" style="margin-top:-10px"><span class="img_heading"> Campus News</span>
                <marquee direction="up" scrollamount="1" width="100%" height="164" onMouseOver="stop()" onMouseOut="start()" behavior="scroll" style="margin-top:3px">
                                    <?php
                                                $context = stream_context_create(array(
													'http' => array(
													'header'  => "Authorization: Basic " . base64_encode("$username:$password"),
													'proxy' => 'tcp://hr.seecs.nust.edu.pk:80',
													'request_fulluri' => true
														)
													));
												echo file_get_contents("http://seecs.nust.edu.pk/news.php", false);
                                                //include "news.php";
                                    ?>
                          </marquee>
                          </div>
                          <br />
						  <div class="round_div b_gradient">

            <img src="images/home_icon/heo.png" align="middle" style="margin-top:-10px"><span class="img_heading"> Higher Education Opportunities</span>
                                            <p align="justify" class="b_text"><?php echo file_get_contents($url . "/hec/index.php", false); ?> </p>
                                            <p align="right" class="b_text"><a href="http://seecs.nust.edu.pk/admissions/scholarships/latest.php" target=_blank>More >></a></p> </div>                      </td>

            
                                    <!-------   Third Column        -->
                                    <td valign="top" width="25%">
                                        <table border="0" width="100%" cellpadding="1">
                                         <tr valign="top">
                                                <td><a href="cs.php" target="_parent"><img src="images/home_icon/alumni_cdo.jpg" border="0"></a> <br>
                                            <br> </td>
                                          </tr>
                                            <tr>
                                                <td> <?php include "calendar/index.php" ?></td>
                                            </tr>
                                        </table>
                                    <br />
							<div class="round_div b_gradient" style="width:80%">
                                            <form action="user_search_result.php" method="post" name="frm_search" onSubmit="return validate()">
                                                <table width="100%" border="0" cellpadding="2">
                                      <tr>
                                                        <td><img src="images/home_icon/friend.png" align="middle" style="margin-top:-10px"><span class="img_heading"> Find a Friend</span></td>
                                                  </tr>

                                                    <tr>
                                                        <td height="108">

                                                      <table width="111%" height="107"  border="0" align="left" cellpadding="0" cellspacing="0" class="b_text">
                          <tr>
                                                                    <td width="15%">By * </td>
                                                                    <td width="65%"><div align="left"><span class="fbinput">
                                                                                <select name="cbosearch" class="fbinput" id="cbosearch" style="width:150px">
                                                                                    <option value="name" selected>Name</option>
                                                                                    <option value="last_degree_niit">Year Graduated</option>
                                                                                    <option value="blood_group">Blood Group</option>
                                                                                    <option value="ph">Phone No</option>
                                                                                    <option value="sec_email">E-Mail Address</option>
                                                                                    <option value="city">City</option>
                                                                                    <option value="country">Country</option>
                                                                                </select>
                                                                            </span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="15%">&nbsp;</td>
                                                                  <td align="left" valign="top" class="fbinput"><input name="txtsearch" type="text" class="fbinput" id="txtsearch" size="20" style="width:150px" ></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td align="right">                                                              <div align="left">
                                                                            <input name="cmdsubmit2" type="submit" class="black_button" id="cmdsubmit2" value="Search" style="margin-left:5px">
                                                                        </div></td>
                                                                </tr>
                                                          </table></td>
                                                  </tr>
                                                </table>
                              </form>
                                      </div>
                                        <br>                                    </td>
                  </tr>
              </table>          </td>
                            </tr>
                            <tr>
                              <td align="center"><?php include "scroll_news/index.php" ?></td>
                            </tr>
                            <tr>
                                <td><?php include "footer.php" ?></td>
        </tr>
    </table>
