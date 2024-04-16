<?php
ob_start();
/*
 +---------------------------------------------------------+
 + Calendar Script by Midgard (bahadir@eggdrop.gen.tr)     +
 + It's a free software                                    +
 +---------------------------------------------------------+
 + http://www.eggdrop.gen.tr                               +
 +---------------------------------------------------------+
 */

// Error Reporting
error_reporting(E_ALL ^ E_NOTICE);

// Include: Configuration file
$include_config = @include('config.php');
if (!$include_config) {
	echo '<b style="color: red;">Error:</b> config.php missin!';
	exit('<p><b style="color: red;">Code:</b> <u>0004</u></p>');
}

// Include: Global Header (<html>, <head>, etc. ...)
$include_gh = @include('liblary/global_header.php');
if (!$include_gh) {
	echo '<b style="color: red;">Error:</b> global_header.php missing!';
	exit('<p><b style="color: red;">Code:</b> <u>0005</u></p>');
}

/*
 +-----------------------------------------------------+
 + Starting ...                                        +
 +-----------------------------------------------------+
 */

// if action is login
if ($_GET['act'] == 'login') {
	$include_login = @include('liblary/login.php');
	if (!$include_login) {
		echo '<b style="color: red;">Error:</b> login.php missin!';
		exit('<p><b style="color: red;">Code:</b> <u>0006</u></p>');
	}
// isn't login, show the login-form or management
} else {
	$include_main = @include('liblary/main.php');
	if (!$include_main) {
		echo '<b style="color: red;">Error:</b> main.php missing!';
		exit('<p><b style="color: red;">Code:</b> <u>0007</u></p>');
	}
}
// if-else end (login, login-form, management)

/*
 +-----------------------------------------------------+
 + Starting ...                                        +
 +-----------------------------------------------------+
 */

// Include: Site footer
$include_footer = @include('liblary/footer.php');
if (!$include_footer) {
	echo '<b style="color: red;">Error:</b> footer.php missing!';
	exit('<p><b style="color: red;">Code:</b> <u>0008</u></p>');
}

/* EOF! */
ob_end_flush();
?>
