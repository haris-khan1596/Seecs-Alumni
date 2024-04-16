<?php
/*
 +---------------------------------------------------------+
 + Calendar Script by Midgard (bahadir@eggdrop.gen.tr)     +
 + It's a free software                                    +
 +---------------------------------------------------------+
 + http://www.eggdrop.gen.tr                               +
 +---------------------------------------------------------+
 */

if (!isset($_COOKIE['CalendarAdmin'])) {
	$include_login_form = @include('liblary/login-form.php');
	if (!$include_login_form) {
		echo '<b style="color: red;">Error:</b> login-form.php missing!';
		exit('<p><b style="color: red;">Error No:</b> <u>0003</u></p>');
	}
} else { // if session else management
	$include_act = @include('liblary/act.php');
	if (!$include_act) {
		echo '<b style="color: red;">Error:</b> act.php missing!';
		exit('<p><b style="color: red;">Error No:</b> <u>0002</u></p>');
	}
} // if session else end
?>
