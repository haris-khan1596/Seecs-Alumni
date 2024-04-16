<?php
$cat = "10";
ob_start();
session_start();
include "control/session.php";
?>

<html>
    <head>
        <title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) Alumni </title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <script language="javascript">
            function validate()
            {
                if(frmregister.txtoldpwd.value=="")
                {
                    alert("Please enter old password");
                    frmregister.txtoldpwd.focus()
                    return false;
                }

                else if(frmregister.txtnewpwd.value=="")
                {
                    alert("Please enter new password");
                    frmregister.txtnewpwd.focus()
                    return false;
                }
                pas=(frmregister.txtnewpwd.value)
                len=pas.length
                if(len<6)
                {
                    alert("your password must be atleast 6 characters long");
                    frmregister.txtnewpwd.value=""
                    frmregister.txtnewpwd1.value=""
                    frmregister.txtnewpwd.focus()
                    return false;
                }
                pass1=(frmregister.txtnewpwd.value)
                pass2=(frmregister.txtnewpwd1.value)
                if(pass1!=pass2)
                {
                    alert("Password not match, please try again")
                    frmregister.txtnewpwd.value=""
                    frmregister.txtnewpwd1.value=""
                    frmregister.txtnewpwd.focus()
                    return false;
                }
                pass_old=(frmregister.txtoldpwd.value)
                pass_new=(frmregister.txtnewpwd.value)
                if(pass_old==pass_new)
                {
                    alert("Your Old and New password are same please select different password")
                    frmregister.txtnewpwd.value=""
                    frmregister.txtnewpwd1.value=""
                    frmregister.txtnewpwd.focus()
                    return false;
                }

            }

        </script>
        <style type="text/css">
            <!--
            .style1 {color: #FF0000}
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
                <td width="6" rowspan="2" align="left" valign="top">&nbsp;
                </td>
            </tr>
            <tr>
                <td align="left" valign="top" class="table_left">
                    <span class="right_bgcolor">
                        <?php include "control/right.php"; ?>
                    </span>	</td>
                <td align="left" valign="top"><table width="808" border="0" align="center" cellpadding="3" cellspacing="0" class="table_body" >
<tr>
                            <td width="665" height="323" valign="top">
                            
                        <?php if ($_GET['err'] == 1) { ?>
                         <div class="msgbox_red">Invalid old password, please try again</div>
							<?php } ?>
                        <?php if ($_GET['err'] == no) { ?>
                            <div class="msgbox_green">Password changed successfully</div>
                        <?php } ?>
                            
                            <br>
                                <div class=" round_div b_gradient" style="width:60%" >
                                    <form action="save/save_change_pwd.php" method="post" name="frmregister" onSubmit="return validate()">
                                      <table border="0" align="left" cellpadding="15">
<tr  class="img_heading">
                                                <td width="454" ><p class="img_heading">Change Password <span class="b_text style3"></span></p>  </td>
                                          </tr>

                                            <tr>
                                                <td height="108">
												
                                                    <table width="440"  border="0" align="left" cellpadding="5" cellspacing="0" bordercolor="#999999">
<tr bordercolor="#999999">
                                                            <td width="30%" class="b_text" scope="col">User Name: </td>
<td width="70%" scope="col"><div align="left">
                                                                    <?php
                                                                    echo "<div class=b_text>" . $_SESSION['user_name'] . "</div>";
                                                                    ?>
                                                        </div></th>                                                        </tr>
                                                        <tr bordercolor="#999999" class="fbinput">
                                                            <td width="30%" scope="col"><span class="b_text">Old Password:</span></td>
<td width="70%" scope="col"><div align="left" class="b_text">
                                                                    <input name="txtoldpwd" type="password" class="fbinput" id="txtoldpwd" size="28">
                                                                </div></td>
                                                      </tr>
                                                        <tr bordercolor="#999999" class="fbinput">
                                                            <td width="30%"><span class="b_text">New Password: </span></td>
                                                          <td width="70%" align="left" valign="top" class="b_text"><input name="txtnewpwd" type="password" class="fbinput" id="txtnewpwd" size="28"></td>
                                                      </tr>
                                                        <tr bordercolor="#999999">
                                                            <td width="30%" class="b_text">Re-Enter Password:</td>
                                                          <td width="70%" align="left" valign="top" class="b_text"><input name="txtnewpwd1" type="password" class="fbinput" id="txtnewpwd1" size="28"></td>
                                                      </tr>
                                                        <tr bordercolor="#999999">
                                                            <td width="30%">&nbsp;</td>
                                                        <td width="70%" align="right">
                                                      <div align="left">
                                                                <input name="cmdsubmit2" type="submit" class="black_button" id="cmdsubmit2" value="Change Password">
                                                              </div></td>
                                                      </tr>
                                              </table></td>
                                          </tr></table>
                                  </form>


                                    <br>
                                    </p>                                      </div>
                                <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>          </td>
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
