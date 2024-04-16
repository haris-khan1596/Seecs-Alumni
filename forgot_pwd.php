<?php
ob_start();
session_start();
$cat = "10";
?>

<html>
    <head>
        <script language="javascript">
            function validate()
            {
               
               if(frmregister.txtemail.value=="")
                {
                    alert("Please enter email address");
                    frmregister.txtemail.focus()
                    return false;
                }
                txt=(frmregister.txtemail.value)
                if (txt.indexOf("@")<2)
                {
                    alert("E-Mail you enter is invalid")
                    frmregister.txtemail.focus()
                    return false;
                }
                txt2=(frmregister.txtemail.value)
                /*if(txt.indexOf(".")<5)
                {
                    alert("Invalid Email Address")
                    frmregister.txtemail.focus()
                    return false;
                }*/
            }
			
        </script>

        <title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) Alumni </title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            <!--
            .style1 {color: #FF0000}
            -->
        </style>
    </head>
    <body>
        <table border="0" align="center" cellpadding="0" cellspacing="0" class="table_main" >
            <tr>
                <td height="0" colspan="3" align="left" valign="top" style="background:url(images/bg.jpg); background-repeat:repeat-x;">
                    <?php include "header.php"; ?>
                </td>
            </tr>


            <tr>
                <td colspan="2" align="left" valign="top">
                    <?php include "../header2.php"; ?>
                </td>
                <td width="8" rowspan="2" align="left" valign="top">&nbsp;
                </td>
            </tr>
            <tr>
                <td width="64" align="left" valign="top" class="table_left">
                    <span class="right_bgcolor">
                        <?php include "control/right.php"; ?>
                    </span>	</td>
                <td width="928" align="left" valign="top"><table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
                        <tr>


                            <td width="450" height="323" valign="top">
                                
                                    <form action="save/send_forgot_pwd.php" method="post" name="frmregister" onSubmit="return validate()">
   
   
        <?php if ($_GET['cap_err'] == 1) { ?>
        <div class="msgbox_red">Invalid Captcha(Security) Key, please try again </div>
     <?php } ?>
        <?php if ($_GET['err'] == 1) { ?>
        <div class="msgbox_red">Invalid User Name </div>
     <?php } ?>
     <?php if ($_GET['err'] == 2) {  ?>
        <div class="msgbox_red">E-Mail address not match with our database </div>
     <?php } ?>
	 <?php if ($_GET['err'] == "nil") { ?>
        <div class="msgbox_green">Your recovered password has been emailed successfully </div>
	 <?php } ?>
   
                                      <br>
                                      <div class="round_div b_gradient" style="height:170px; width:400px"  >
                                  
                                        
                                        <table width="389" border="0" align="left" cellpadding="15">
<tr >
                                                <td width="321"><p class="img_heading">Recover Password </p>
                                                                          

     </td>
                                            </tr>

                                            <tr>
                                                <td valign="top">
                                                   

                                                                <table width="100%"  border="0" align="center" cellpadding="5" cellspacing="0" >
                                                              <tr >
                                                                    <th width="39%" scope="col"><div align="left" class="b_text">Email Address : </div></th>
                                                                    <th width="61%" scope="col"><div align="left" class="b_text">
                                                                            <input name="txtemail" type="text" class="fbinput" id="txtemail" size="28">
                                                                        </div></th>
                                                                </tr>
                                                                <tr>
                                                                  <td>&nbsp;</td>
                                                                  <td align="right"><div align="left"><span class="fbinput" style="width:300px"><img src="captcha.php" id="captcha" /><br/>
                                                                    <!-- CHANGE TEXT LINK -->
                                                                    <a class="b_link" href="#" onClick="
    document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
    id="change-image">Not readable? Change text.</a><br/>
                                                                    <input type="text" name="captcha" id="captcha-form" />
                                                                  </span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td align="right"><div align="left">
                                                                      <input name="cmdsubmit2" type="submit" class="black_button" id="cmdsubmit2" value="Recover Password">
                                                                  </div></td>
                                                                </tr>
                                                            </table>

                                              </td>
                                          </tr>
                                                            </table>
                                        <p>
                                        
    
                                        
                                        </p>
                                      </div>
                                                            </form>


                                                            <br>
                                                            </p>        </td>

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
