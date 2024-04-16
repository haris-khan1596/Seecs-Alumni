<?php include('calendar/cp/config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr" dir="ltr">
<head>
<title></title>
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="-1" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="ALL" />
<meta name="robots" content="INDEX, FOLLOW" />
<meta name="robots" content="NOARCHIVE" />
<style type="text/css" media="all">@import "calendar/style.css";</style>
<script type="text/JavaScript">
function popupEvent(day, monthID, yearID, w, h) {
	var winl = (screen.width - w) / 2;
	var wint = (screen.height - h) / 2;
	win = location="http://www.niit.edu.pk/event_calendar/index.php?day=" + day + "&monthID=" + monthID + "&yearID=" + yearID + "","Calendar","scrollbars=yes, status=yes, location=yes, toolbar=yes, menubar=yes, directories=yes, resizable=yes, width=" + w + ", height=" + h + ", top=";
	if (parseInt(navigator.appVersion) >= 4) {
		win.window.focus();
	}
}
</script>
</head>
<body>
<script type="text/JavaScript">
  var ol_width=140;
  var ol_delay=10;
  var ol_fgcolor="#FFFFFF";
  var ol_bgcolor="#AAAAAA";
  var ol_offsetx=10;
  var ol_offsety=10;
  var ol_border=1;
  var ol_vauto=1;
</script>
<div id="overDiv" style="position: absolute; visibility: hidden; z-index: 1000;"></div>
<script type="text/JavaScript" src="calendar/overlib_mini.js"><!-- overLIB (c) Erik Bosrup --></script>
<center>

<?php
// Free Calendar Script
// Coded and Designed by Bahadir Kocaoglu (bahadir@eggdrop.gen.tr)
// (C) 2007 Eggdrop Inc.
// http://www.eggdrop.gen.tr
// bahadir@eggdrop.gen.tr

if (empty($_GET['month'])) {
	$month = date('m');
} else {
	$month = $_GET['month'];
}

if (empty($_GET['year'])) {
	$year = date('Y');
} else {
	$year = $_GET['year'];
}

$theday = date('w', mktime(0, 0, 0, $month, 1, $year));

$daysinmonth = date("t", mktime(0, 0, 0, $month, 1, $year));
?>

<table cellspacing="1" cellpadding="0" border="0" class="mainTable">
	<tr>
		<td align="center" colspan="7" class="monthRow">
			<a href="<?php echo $_SERVER['PHP_SELF']; if ($month == '01') { $prevmonth = '12'; $prevyear = $year - 1; echo '?month=' . $prevmonth; echo '&year=' . $prevyear; } else { $prevmonth = $month - 1; echo '?month=' . $prevmonth; echo '&year=' . $year; } ?>">&laquo;</a>
			<?php
				$monthName = date('F', mktime(0, 0, 0, $month, 1, $year));
				$yearName = date('Y', mktime(0, 0, 0, $month, 1, $year));
				echo $monthName . ' ' . $yearName;
			?>
			<a href="<?php echo $_SERVER['PHP_SELF']; if ($month == '12') { $nextmonth = '01'; $nextyear = $year + 1; echo '?month=' . $nextmonth; echo '&year=' . $nextyear; } else { $nextmonth = $month + 1; echo '?month=' . $nextmonth; echo '&year=' . $year; } ?>">&raquo;</a>
		</td>
	</tr>
	<tr class="dayNamesText">
		<td class="dayNamesRow" width="25" align="center">S</td>
		<td class="dayNamesRow" width="25" align="center">M</td>
		<td class="dayNamesRow" width="25" align="center">T</td>
		<td class="dayNamesRow" width="25" align="center">W</td>
		<td class="dayNamesRow" width="25" align="center">T</td>
		<td class="dayNamesRow" width="25" align="center">F</td>
		<td class="dayNamesRow" width="25" align="center">S</td>
	</tr>

	<tr class="rows">
	<?php
	for ($i = 0; $i < $theday; $i++) {
	?>
		<td>&nbsp;</td>
	<?php
	}
	for ($list_day = 1; $list_day <= $daysinmonth; $list_day++) {
		$tm = date("U", mktime(0, 0, 0, $month, $list_day, $year)) - 86400; // Bir gün önce
		$tn = date("U", mktime(0, 0, 0, $month, $list_day, $year)); // O gün ...
		$tp = date("U", mktime(0, 0, 0, $month, $list_day, $year)) + 86400; // Bir gün sonra
		$Q = sprintf("SELECT * FROM `events` WHERE `date` > '%s' AND `date` < '%s' AND `day` = '%s';", $tm, $tp, $list_day);
		$R = mysql_query($Q);
		$D = mysql_fetch_assoc($R);

$QQ = sprintf("SELECT TRIM(REPLACE(title,'-','')) as title,id,day,month,year,date FROM `events` WHERE `date` > '%s' AND `date` < '%s' AND `day` = '%s';", $tm, $tp, $list_day);
$RR = mysql_query($QQ);		
$title="";
while($DD=mysql_fetch_array($RR))
{
		$title .= $DD['title'] . "<hr color=#5683B6 size=1>";
}		
		
		$S = mysql_num_rows($R);
		$Y = $D['date'];
		$TheDay = date('d', $Y);
		$TheMon = date('F', $Y);
		$TheYea = date('Y', $Y);
		mysql_free_result($R);
		if ($S) {
		?>
			<td align="center" onclick="popupEvent(<?php echo $D['day']; ?>, <?php echo $D['month']; ?>, <?php echo $D['year']; ?>, 400, 500)" style="background-color: #FAC557; color: #333333; cursor: pointer;" onmouseover="return overlib('&lt;table width=200;100%&quot; border=&quot;0&quot; cellpadding=&quot;2&quot; cellspacing=&quot;0&quot; class=&quot;popupDateTable&quot;&gt;&lt;tr&gt;&lt;td align=&quot;center&quot; class=&quot;popupDate&quot;&gt;<?php echo $TheDay; ?> <?php echo $TheMon; ?> <?php echo $TheYea; ?>&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt;&lt;div class=&quot;popupEventTitle s23&quot;&gt;<?php echo $title; ?> &lt;/div&gt;');" onmouseout="return nd();" title="">
		<?php
		} elseif ($tn > $tm AND $tn < $tp AND date('j') == $list_day AND date('m') == $month AND date('Y') == $year) {
		?>
			<td align="center" style="background-color: #FFC18A; color: #CF0000; cursor: pointer;" onmouseover="return overlib('&lt;div style=&quot;background-color: #FFC18A; color: #CF0000; padding: 4px;&quot;&gt;Today&lt;/div&gt;');" onmouseout="return nd();">
		<?php
		} elseif ($theday == 6 or $theday == 0) {
		?>
			<td align="center" style="background-color: #EEEEEE; color: #666666;">
		<?php
		} else {
		?>
			<td align="center" style="background-color: #CCCCCC; color: #333333;">
		<?php
		}
		
		echo $list_day;

		echo '</td>';

		if ($theday == 6) {
			echo '</tr>';
			echo '<tr class="rows">';
			$theday = -1;
		}
	$theday++;
}
?>
	</tr>
</table>

</center>
</body>
</html>
