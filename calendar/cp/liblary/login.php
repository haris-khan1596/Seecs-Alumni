<?php
/*
 +---------------------------------------------------------+
 + Calendar Script by Midgard (bahadir@eggdrop.gen.tr)     +
 + It's a free software                                    +
 +---------------------------------------------------------+
 + http://www.eggdrop.gen.tr                               +
 +---------------------------------------------------------+
 */
?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<div class="dis">
	<div class="orta">
		<table cellspacing="0" cellpadding="4" border="0" width="100%">
			<tr>
				<td width="200" class="tablerow1" valign="top" style="border: 0px; width: 200px">
					<div style='text-align: center; padding-top: 20px'>
						<img src='images/redirect.gif' alt='' border='0' width='90' height='79' />
					</div>
					<br />
					<div class='desctext' style='font-size:10px'>
						<div align='center'><strong>Welcome to the Control Panel</strong></div>
						<br />
						<div style='font-size:9px; color: gray;'>
							&copy; Eggdrop Inc.
							<br />
							This program is protected by international copyright laws as described in the license agreement.
						</div>
					</div>
				</td>
				<td width='300' style='width:300px' valign='top'>
					<form action="index.php?act=login" method="post" style="margin: 0px;">
					<table width='100%' cellpadding='5' cellspacing='0' border='0'>
						<tr>
						<td colspan='2' align='center'>
							<br />
							<img src='images/logo.jpg' width='200' height='53' alt='' border='0' />
						</td>
						</tr>
						<tr>
							<td align='center'>
								<?php
									// Get user & pass
									$user = $_POST['username'];
									$pass = md5($_POST['password']);
									// Check user
									$Q1 = mysql_query(sprintf("SELECT * FROM `admins` WHERE `username` = '%s';", $user));
									$T1 = mysql_num_rows($Q1);
									if ($T1) {
										// OK!! for username
										$Q2 = mysql_query(sprintf("SELECT * FROM `admins` WHERE `username` = '%s' AND `password` = '%s';", $user, $pass));
										$T2 = mysql_num_rows($Q2);
										if ($T2) {
											// OK!! for password
											// Create cookies
											session_start();
											setcookie("CalendarAdmin", "1");
											setcookie("CalendarAdmin[user]", $user);
											setcookie("CalendarAdmin[session]", session_id());
											// Create message
											echo '<p>Success!</p>';
											echo '<strong style="color: red;">Please continue or exit</strong>';
											echo '<p>';
											echo '<input type="button" style="border: 1px solid #AAA; padding: 0px; margin: 2px; width: 90px;" value="&laquo; Exit" onclick="javascript:window.location = \'logout.php\'">';
											echo '<input type="button" style="border: 1px solid #AAA; padding: 0px; margin: 2px; width: 90px;" value="Continue &raquo;" onclick="javascript:window.location = \'index.php\'">';
											echo '</p>';
										} else {
											// FAIL!! for password
											echo '<p>Login Failed!</p><strong style="color: red;">Wrong Password, Please try again.</strong><p>(Password: ******)</p><input type="button" style="border: 1px solid #AAA; padding: 0px; margin: 2px; width: 90px;" value="&laquo; Go Back" onclick="javascript:history.back(-1);">';
										}
									} else {
										// FAIL!! for username
										echo '<p>Login Failed!</p><strong style="color: red;">User not found!</strong><p>(Username: '.$user.')</p><input type="button" style="border: 1px solid #AAA; padding: 0px; margin: 2px; width: 90px;" value="&laquo; Go Back" onclick="javascript:history.back(-1);">';
									}
									mysql_free_result($Q1);
								?>
							</td>
						</tr>
						<tr>
							<td colspan='2'><br /></td>
						</tr>
					</table>
					</form>
				</td>
			</tr>
		</table>
	</div>
</div>
