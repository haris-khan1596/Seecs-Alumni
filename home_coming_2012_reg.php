<?php
session_start();
ob_start();
include "control/main.php";
?>

<link href="style.css" rel="stylesheet" type="text/css">


<style type="text/css">
<!--
.style1 {color: #990000}
-->
</style>
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

          <td valign="top"><p align="center" style="margin-right:10px"><img src="images/hc_header.jpg" width="950" height="178" border="0"><br>
          </p>
            <p align="center" class="rimm_heading style1" style="font-size:12px">&nbsp;</p>
            <p align="center" class="rimm_heading style1" style="font-size:12px">Online Registration has been closed. Now you can register on spot at registration desk</p>
            <p class="b_text" style="font-size:12px">&nbsp;</p>
            <p><a href="home_coming_2012.php" target="_parent" class="link_box">Back</a></p>
            <p>&nbsp;</p>
          <p>&nbsp;</p></td>

                    </tr>
                </table>






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
