<?php include('cp/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr" dir="ltr">
<head>
<title>Event(s)</title>
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="-1" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="ALL" />
<meta name="robots" content="INDEX, FOLLOW" />
<meta name="robots" content="NOARCHIVE" />
<meta name="author" content="Bahadir Kocaoglu" />
<meta name="copyright" content="(C) 2007 Eggdrop Inc." />
<meta name="generator" content="Eggdrop Inc. - Free Calendar Script" />
<meta name="description" content="Eggdrop Inc. - Free Calendar Script" />
<meta name="keywords" content="calendar script" />
<style type="text/css" media="all">@import "style.css";</style>
<script language="JavaScript" type="text/javascript">
	window.defaultStatus="Event(s)";
</script>
<style type="text/css" media="all">
body {
	margin: 0px;
}
</style>
</head>
<body style="background-image: url('images/alt_bg.jpg'); background-attachment: scroll; background-repeat: repeat-x; background-position: bottom;">

<table cellspacing="0" cellpadding="0" width="100%" height="56">
	<tr>
		<td style="background-image: url('images/ust_bg.jpg'); background-repeat: repeat-x;" width="100%" height="56" valign="top" align="left">
			<div style="color: #335467; font-family: Trebuchet MS, Tahoma, Verdana, Arial, sans-serif; font-weight: bold; font-size: 14px; margin-left: 12px; margin-top: 10px;">
				Event(s)
			</div>
		</td>
		<td align="right" valign="middle" nowrap><img src="images/logo.jpg" alt="" border="0" width="133" height="56" /></td>
	</tr>
</table>

<?php
$Q = mysql_query(sprintf("SELECT * FROM `events` WHERE `day` = '%s' AND `month` = '%s' AND `year` = '%s';", $_GET['day'], $_GET['month'], $_GET['year']));
while ($D = mysql_fetch_assoc($Q)) {
?>

<table cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td width="100%" valign="top" align="left">
			<!-- Event Date -->
			<div style="text-align: center; width: 100%; margin: 12px; margin-bottom: 0px; padding: 2px; color: #335467; font-family: Georgia, Arial, sans-serif; font-weight: bold; font-size: 14px;">
					<?php echo stripslashes($D['title']); ?>
					<br />
					<?php echo date("d.m.Y", $D['date']); ?>
					<br />
					<?php echo '@' . stripslashes($D['location']); ?>
				</div>
			</div>
			<!-- Picture 1 -->
			<?php if ($D['picture_1']) { ?>
			<div style="border: 1px solid #EEEEEE; margin: 12px; margin-bottom: 0px;"><div style="text-align: center; padding: 2px; border: 1px solid #DDDDDD; margin: 1px;"><img src="event_images/<?php echo $D['picture_1']; ?>" alt="" border="0"></div></div>
			<?php } ?>
			<!-- Event Details -->
			<div style="border: 1px solid #EEEEEE; margin: 12px;">
				<div style="padding: 8px; border: 1px solid #DDDDDD; margin: 1px; color: #333333; font-family: Tahoma, Verdana, Arial, sans-serif; font-weight: normal; font-size: 12px;">
					<?php echo stripslashes($D['event']); ?>
				</div>
			</div>
			<!-- Picture 2 -->
			<?php if ($D['picture_2']) { ?>
			<div style="border: 1px solid #EEEEEE; margin: 12px; margin-top: 0px;"><div style="text-align: center; padding: 2px; border: 1px solid #DDDDDD; margin: 1px;"><img src="event_images/<?php echo $D['picture_2']; ?>" alt="" border="0"></div></div>
			<?php } ?>
		</td>
	</tr>
</table>

<?php
}
?>

<div style="padding-bottom: 40px;">&nbsp;</div>

</body>
</html>
