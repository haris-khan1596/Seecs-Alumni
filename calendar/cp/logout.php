<?php
/*
 +---------------------------------------------------------+
 + Calendar Script by Midgard (bahadir@eggdrop.gen.tr)     +
 + It's a free software                                    +
 +---------------------------------------------------------+
 + http://www.eggdrop.gen.tr                               +
 +---------------------------------------------------------+
 */
session_start();
session_unset();
session_destroy();

if (isset($_COOKIE['CalendarAdmin'])) {
	$time = time(); 
	setcookie("CalendarAdmin", "", time() - 3600);
	setcookie("CalendarAdmin[user]", "", time() - 3600);
	setcookie("CalendarAdmin[session]", "", time() - 3600);
}

echo '
	<script language="JavaScript">
		window.location = \'index.php\';
	</script>';

exit();

?>
