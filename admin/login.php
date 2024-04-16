<?php session_start(); ?>

<html>
<head>
<title>Welcome to NUST-SEECS Home Page</title>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style2 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<body>
<div align="left">
  <p align="center"><font size="2"><strong><font face="Verdana, Arial, Helvetica, sans-serif"> 
    &quot;Alumni &quot; Administrative Area</font></strong></font></p>
</div>
<table border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#666666" bgcolor="#E2E2E2">
  <tr>
        <th scope="col"><table border="0" align="center" bgcolor="#EAEAEA">
        <tr>
            <td colspan="2">
			
            <?php if($_GET['cap_err']==1) { ?>
			<div align="center"><span class="style19"><span class="style1"><span class="style2">
			Invalid Captcha, Try Again </span><br>
			<?php } ?>
			
			<?php if($_GET['err']==1) { ?>
			<div align="center"><span class="style19"><span class="style1"><span class="style2">
			Invalid User Name or Password, Try Again </span><br>
			<?php } ?>
            Please Login with User Name and Password</span>. </span> </div></td>
          </tr>
          <form name="form1" action="verify_login.php" method="post">
            <tr>
              <td class="style1"><div align="left"><span class="style26">User Name:</span></div></td>
              <td>
                <input name="username" type="text">              </td>
            </tr>
            <tr>
              <td class="style1"><div align="left"><span class="style26">Password:</span></div></td>
              <td>
                <div align="left">
                  <input type="password" name="password">
              </div></td>
            </tr>
            <tr>
              <td></td>
              <td>
              
              <!-- Captcha -->

<img src="captcha.php" id="captcha" /><br/>

<!-- CHANGE TEXT LINK -->
	<a class="b_link" href="#" onClick="
    document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
    id="change-image">Not readable? Change text.</a><br/><br/>

<input type="text" name="captcha" id="captcha-form" /><br/>
              
              </td>
            </tr>
            <tr>
              <td></td>
              <td align="right"><div align="left">
                  <input name="submit" type="submit" value="Login">
              </div></td>
            </tr>
          </form>
    </table></th>
  </tr>
</table>
    <!-- /////////////////////////////////////////////////////////////////////////////////////////////	-->	
<script language="JavaScript">
document.form1.username.focus()
</script>

				  
</body>
</html>