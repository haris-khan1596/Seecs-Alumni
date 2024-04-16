<?php
/*
 +---------------------------------------------------------+
 + Calendar Script by Midgard (bahadir@eggdrop.gen.tr)     +
 + It's a free software                                    +
 +---------------------------------------------------------+
 + http://www.eggdrop.gen.tr                               +
 +---------------------------------------------------------+
 */

// Top Navigation Bar
// Using: top_navigation('Title', 'act= Value', 'Back_Button_:_1/0', 'Refresh_This_Page_Button_:_1/0', 'Home_Button_:_1/0', 'Logout_Button_:_1/0');
top_navigation('An Error Occurred!', '', 1, 1, 1, 1);
?>
<div class='tableborder'>
	<div class="tableheader">
		Error!
	</div>
	<table width='100%' cellpadding='4' cellspacing='0'>
		<tr>
			<td class='tablerow1'>
				<p>Page not found!</p>
				<b>Request:</b> <?php if ($_GET['act']) { echo $_GET['act'] . '.php'; } else { echo 'home.php'; } ?>
				<br />
				<b>Error Code:</b> <u>0001</u>
			</td>
		</tr>
		<tr>
			<td class='tablerow2' align="center">
				Please contact your system administrator.
			</td>
		</tr>
	</table>
</div>
