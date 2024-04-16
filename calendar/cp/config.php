<?php
/*
 +---------------------------------------------------------+
 + Calendar Script by Midgard (bahadir@eggdrop.gen.tr)     +
 + It's a free software                                    +
 +---------------------------------------------------------+
 + http://www.eggdrop.gen.tr                               +
 +---------------------------------------------------------+
 */

// Variables for MySQL
// Usage:
//    MySQL_Hostname:MySQL_UserName:MySQL_Password:MySQL_Database
// Example:
//    192.168.1.4:MyU:MyPw:MyDb
$SQLconn = '192.168.1.4:MyU:MyPw:MyDb';
list($hostname, $username, $password, $database) = explode(':', $SQLconn);

// MySQL Connection:
mysql_connect("localhost", "snust_homepanels", "cN^NBTdH]9~g");
mysql_select_db("snust_homepanels");

// MySQL Charset Collation:
mysql_query("SET NAMES 'latin5'");
mysql_query("SET collation_connection = 'latin5_turkish_ci'");
// Site Name:
$site_name = 'Calendar ';

/*
 +-------------------------------------------+
 + USEFUL CUSTOM FUNCTIONS - 07.03.2007      +
 +-------------------------------------------+
 */

function top_navigation($message, $act, $home_link, $refresh_link, $back_link, $logout_link)
{
?>
<div style="margin-bottom: 8px;">
	<table cellspacing="1" border="0" cellpadding="0" width="100%" style="background-color: #CCCCCC;">
		<tr>
			<td align="left" valign="middle" class="TopNavy" style="padding-left: 6px; padding-right: 6px;">
				<span style="float: left; cursor: hand;" onClick="window.parent.document.location.href='index.php?act=<?php echo $act; ?>';"><?php echo $message; ?></span>
				<span style="float: right;">
					<?php if ($back_link) { ?><a href="javascript:history.back();">&laquo; Go Back</a> -<?php } ?>
					<?php if ($refresh_link) { ?><a href="javascript:window.location.reload(true);">Refresh This Page</a> -<?php } ?>
					<?php if ($home_link) { ?><a href="index.php">Home</a> -<?php } ?>
					<?php if ($logout_link) { ?><a href="logout.php">Logout</a><?php } ?>
				</span>
			</td>
		</tr>
	</table>
</div>
<?php
}

// Random Keys
function randomkeys($length)
{
	$pattern = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	for($i=0;$i<$length;$i++) {
		$key .= $pattern{rand(0,35)};
	}
	return $key;
}
?>
