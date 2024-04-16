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
                if(frmregister.txtuser_name.value=="")
                {
                    alert("Please enter user name");
                    frmregister.txtuser_name.focus()
                    return false;
                }
                else if(frmregister.txtemail.value=="")
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
                if(txt.indexOf(".")<5)
                {
                    alert("Invalid Email Address")
                    frmregister.txtemail.focus()
                    return false;
                }
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
                <td width="928" align="left" valign="top"><p class="b_text"><br>
                  <img src="images/cs.jpg" alt="" width="300" height="300" align="center"></p>
                  <p class="b_text">&nbsp;</p>
                  <p class="b_text"><br>  
                      <br>
                    </p>
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
