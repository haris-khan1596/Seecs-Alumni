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
top_navigation('Event Manager', 'event_manager', 1, 1, 1, 1);
?>


<?php
/*
   +-------------------------------------+
   + EDIT                                +
   +-------------------------------------+
*/
if ($_GET['sa'] == 'edit') {
/*
   +-------------------------------------+
   + EDIT                                +
   +-------------------------------------+
*/
?>


<?php
$Q = mysql_query(sprintf("SELECT * FROM `events` WHERE `event_id` = '%s';", $_GET['id']));
$D = mysql_fetch_assoc($Q);
$time = $D['time'];
list($hour, $minute) = explode(':', $time);
?>
<div class='tableborder'>
	<div class="tableheader">
		Edit Event
	</div>
	<form action="index.php?act=event_manager&sa=update" method="post" enctype="multipart/form-data">
	<input type="hidden" name="event_id" value="<?php echo $D['event_id']; ?>">
	<table width="100%" cellpadding="4" cellspacing="0" border="0">
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Event Title:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<input type="text" name="title" value="<?php echo stripslashes($D['title']); ?>" class="text-input">
			</td>
		</tr>
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Event Details:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<textarea name="event" value="" class="text-area"><?php echo stripslashes($D['event']); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Location:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<input type="text" name="location" value="<?php echo stripslashes($D['location']); ?>" class="text-input">
			</td>
		</tr>
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Full Date:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<select name="day" class="my-select">
					<option value="1"<?php if ($D['day'] == '1') { echo ' selected'; } ?>>01</option>
					<option value="2"<?php if ($D['day'] == '2') { echo ' selected'; } ?>>02</option>
					<option value="3"<?php if ($D['day'] == '3') { echo ' selected'; } ?>>03</option>
					<option value="4"<?php if ($D['day'] == '4') { echo ' selected'; } ?>>04</option>
					<option value="5"<?php if ($D['day'] == '5') { echo ' selected'; } ?>>05</option>
					<option value="6"<?php if ($D['day'] == '6') { echo ' selected'; } ?>>06</option>
					<option value="7"<?php if ($D['day'] == '7') { echo ' selected'; } ?>>07</option>
					<option value="8"<?php if ($D['day'] == '8') { echo ' selected'; } ?>>08</option>
					<option value="9"<?php if ($D['day'] == '9') { echo ' selected'; } ?>>09</option>
					<option value="10"<?php if ($D['day'] == '10') { echo ' selected'; } ?>>10</option>
					<option value="11"<?php if ($D['day'] == '11') { echo ' selected'; } ?>>11</option>
					<option value="12"<?php if ($D['day'] == '12') { echo ' selected'; } ?>>12</option>
					<option value="13"<?php if ($D['day'] == '13') { echo ' selected'; } ?>>13</option>
					<option value="14"<?php if ($D['day'] == '14') { echo ' selected'; } ?>>14</option>
					<option value="15"<?php if ($D['day'] == '15') { echo ' selected'; } ?>>15</option>
					<option value="16"<?php if ($D['day'] == '16') { echo ' selected'; } ?>>16</option>
					<option value="17"<?php if ($D['day'] == '17') { echo ' selected'; } ?>>17</option>
					<option value="18"<?php if ($D['day'] == '18') { echo ' selected'; } ?>>18</option>
					<option value="19"<?php if ($D['day'] == '19') { echo ' selected'; } ?>>19</option>
					<option value="20"<?php if ($D['day'] == '20') { echo ' selected'; } ?>>10</option>
					<option value="21"<?php if ($D['day'] == '21') { echo ' selected'; } ?>>11</option>
					<option value="22"<?php if ($D['day'] == '22') { echo ' selected'; } ?>>22</option>
					<option value="23"<?php if ($D['day'] == '23') { echo ' selected'; } ?>>23</option>
					<option value="24"<?php if ($D['day'] == '24') { echo ' selected'; } ?>>24</option>
					<option value="25"<?php if ($D['day'] == '25') { echo ' selected'; } ?>>25</option>
					<option value="26"<?php if ($D['day'] == '26') { echo ' selected'; } ?>>26</option>
					<option value="27"<?php if ($D['day'] == '27') { echo ' selected'; } ?>>27</option>
					<option value="28"<?php if ($D['day'] == '28') { echo ' selected'; } ?>>28</option>
					<option value="29"<?php if ($D['day'] == '29') { echo ' selected'; } ?>>29</option>
					<option value="30"<?php if ($D['day'] == '30') { echo ' selected'; } ?>>30</option>
					<option value="31"<?php if ($D['day'] == '31') { echo ' selected'; } ?>>31</option>
				</select>
				<select name="month" class="my-select">
					<option value="1"<?php if ($D['month'] == '1') { echo ' selected'; } ?>>January</option>
					<option value="2"<?php if ($D['month'] == '2') { echo ' selected'; } ?>>February</option>
					<option value="3"<?php if ($D['month'] == '3') { echo ' selected'; } ?>>March</option>
					<option value="4"<?php if ($D['month'] == '4') { echo ' selected'; } ?>>April</option>
					<option value="5"<?php if ($D['month'] == '5') { echo ' selected'; } ?>>May</option>
					<option value="6"<?php if ($D['month'] == '6') { echo ' selected'; } ?>>June</option>
					<option value="7"<?php if ($D['month'] == '7') { echo ' selected'; } ?>>July</option>
					<option value="8"<?php if ($D['month'] == '8') { echo ' selected'; } ?>>August</option>
					<option value="9"<?php if ($D['month'] == '9') { echo ' selected'; } ?>>September</option>
					<option value="10"<?php if ($D['month'] == '10') { echo ' selected'; } ?>>October</option>
					<option value="11"<?php if ($D['month'] == '11') { echo ' selected'; } ?>>November</option>
					<option value="12"<?php if ($D['month'] == '12') { echo ' selected'; } ?>>December</option>
				</select>
				<select name="year" class="my-select">
					<option value="2005"<?php if ($D['year'] == '2005') { echo ' selected'; } ?>>2005</option>
					<option value="2006"<?php if ($D['year'] == '2006') { echo ' selected'; } ?>>2006</option>
					<option value="2007"<?php if ($D['year'] == '2007') { echo ' selected'; } ?>>2007</option>
					<option value="2008"<?php if ($D['year'] == '2008') { echo ' selected'; } ?>>2008</option>
					<option value="2009"<?php if ($D['year'] == '2009') { echo ' selected'; } ?>>2009</option>
					<option value="2010"<?php if ($D['year'] == '2010') { echo ' selected'; } ?>>2010</option>
					<option value="2011"<?php if ($D['year'] == '2011') { echo ' selected'; } ?>>2011</option>
					<option value="2012"<?php if ($D['year'] == '2012') { echo ' selected'; } ?>>2012</option>
					<option value="2013"<?php if ($D['year'] == '2013') { echo ' selected'; } ?>>2013</option>
					<option value="2014"<?php if ($D['year'] == '2014') { echo ' selected'; } ?>>2014</option>
					<option value="2015"<?php if ($D['year'] == '2015') { echo ' selected'; } ?>>2015</option>
				</select>
				&nbsp; &nbsp;
				-
				&nbsp; &nbsp;
				<input type="text" name="hour" value="<?php echo $hour; ?>" class="text-input2" style="width: 22px; text-align: center;">
				:
				<input type="text" name="minute" value="<?php echo $minute; ?>" class="text-input2" style="width: 22px; text-align: center;">
			</td>
		</tr>
<?php
if ($D['picture_1']) {
?>
		<tr>
			<td class="tablerow1" align="center" valign="middle" colspan="2" style="padding: 0px;">
				<div style="padding: 10px; height: 100px; overflow: auto;">
					<img src="../event_images/<?php echo $D['picture_1']; ?>" border="0" alt="" />
				</div>
			</td>
		</tr>
<?php
} else {
?>
		<tr>
			<td class="tablerow1" align="center" valign="middle" colspan="2" style="padding: 0px;">
				<div style="padding: 10px;">
					-- Picture 1 Not Fount --
				</div>
			</td>
		</tr>
<?php
}
?>
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Picture 1:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<input type="file" name="picture_1" value="" class="file-input">
			</td>
		</tr>
<?php
if ($D['picture_2']) {
?>
		<tr>
			<td class="tablerow1" align="center" valign="middle" colspan="2" style="padding: 0px;">
				<div style="padding: 10px; height: 100px; overflow: auto;">
					<img src="../event_images/<?php echo $D['picture_2']; ?>" border="0" alt="" />
				</div>
			</td>
		</tr>
<?php
} else {
?>
		<tr>
			<td class="tablerow1" align="center" valign="middle" colspan="2" style="padding: 0px;">
				<div style="padding: 10px;">
					-- Picture 2 Not Found --
				</div>
			</td>
		</tr>
<?php
}
?>
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Picture 2:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<input type="file" name="picture_2" value="" class="file-input">
			</td>
		</tr>
		<tr>
			<td class="tablerow2" align="center" valign="middle" colspan="2">
				<input type="submit" value="Save" class="submit-input" />
				<input type="button" value="Cancel" class="submit-input" onclick="javascript:history.back(-1);" />
			</td>
		</tr>
	</table>
	</form>
</div>


<?php
/*
   +-------------------------------------+
   + UPDATE                              +
   +-------------------------------------+
*/
} elseif ($_GET['sa'] == 'update') {
/*
   +-------------------------------------+
   + UPDATE                              +
   +-------------------------------------+
*/
?>


<?php
// Variables from Form
$event_id = $_POST['event_id'];
$title = trim(addslashes($_POST['title']));
$event = trim(addslashes($_POST['event']));
$location = trim(addslashes($_POST['location']));
$day = trim($_POST['day']);
$month = trim($_POST['month']);
$year = trim($_POST['year']);
$hour = trim($_POST['hour']);
$minute = trim($_POST['minute']);
$date = date('U', mktime(0, 0, 0, $month, $day, $year));
$time = $hour.':'.$minute;

// Image Uploading ...
$dir = "../event_images";
$types = array("image/png","image/x-png","image/gif","image/jpeg","image/pjpeg");
$fullpath = "$dir/";

if (!empty($_FILES['picture_1']['name'])) {
	if ($_FILES['picture_1']['size'] == 0) {
		$message  = '<b>Error:</b> Image (0 byte) <p>&laquo; <a href="javascript:history.go(-1)">Go back!</a></p>';
		die($message);
	} elseif ($_FILES['picture_1']['size'] > 524288) {
		$message  = '<b>Error:</b> Image (Max.: 512 k.byte)<p>&laquo; <a href="javascript:history.go(-1)">Go back!</a></p>';
		die($message);
	}
	$picture_1_tmp_name = $_FILES['picture_1']['tmp_name']; 
	$picture_1_new_name = $_FILES['picture_1']['name']; 
	$picture_1_clean_name = substr($picture_1_new_name, -4);
	$picture_1_date = randomkeys(10);
	$picture_1 = $picture_1_date . $picture_1_clean_name;
	if (in_array($_FILES['picture_1']['type'], $types)) {
		move_uploaded_file($picture_1_tmp_name, $fullpath . $picture_1);
		$sorgu = mysql_query(sprintf("UPDATE `events` SET `picture_1` = '%s' WHERE `event_id` = '%s';", $picture_1, $event_id));
	} else {
		$message  = '<b>Error:</b> Extension fail for Image!';
		die($message);
	}
}

if (!empty($_FILES['picture_2']['name'])) {
	if ($_FILES['picture_2']['size'] == 0) {
		$message  = '<b>Error:</b> Image (0 byte) <p>&laquo; <a href="javascript:history.go(-1)">Go back!</a></p>';
		die($message);
	} elseif ($_FILES['picture_2']['size'] > 524288) {
		$message  = '<b>Error:</b> Image (Max.: 512 k.byte)<p>&laquo; <a href="javascript:history.go(-1)">Go back!</a></p>';
		die($message);
	}
	$picture_2_tmp_name = $_FILES['picture_2']['tmp_name']; 
	$picture_2_new_name = $_FILES['picture_2']['name']; 
	$picture_2_clean_name = substr($picture_2_new_name, -4);
	$picture_2_date = randomkeys(10);
	$picture_2 = $picture_2_date . $picture_2_clean_name;
	if (in_array($_FILES['picture_2']['type'], $types)) {
		move_uploaded_file($picture_2_tmp_name, $fullpath . $picture_2);
		$sorgu = mysql_query(sprintf("UPDATE `events` SET `picture_2` = '%s' WHERE `event_id` = '%s';", $picture_2, $event_id));
		echo '<p>'.$sorgu.'</p>';
	} else {
		$message  = '<b>Error:</b> Extension fail for Image!';
		die($message);
	}
}

// Query
$query = sprintf("UPDATE `events` SET `location` = '%s', `title` = '%s', `event` = '%s', `day` = '%s', `month` = '%s', `year` = '%s', `date` = '%s', `time` = '%s' WHERE `event_id` = '%s';", $location, $title, $event, $day, $month, $year, $date, $time, $event_id);

// Run it
$run = mysql_query($query);

// Redirect to list.
echo '
	<script language="JavaScript">
		window.location = \'index.php?act=event_manager&message=Event Edited!\';
	</script>';
?>


<?php
/*
   +-------------------------------------+
   + DELETE                              +
   +-------------------------------------+
*/
} elseif ($_GET['sa'] == 'delete') {
/*
   +-------------------------------------+
   + DELETE                              +
   +-------------------------------------+
*/
?>


<?php
// Delete Event
$query = mysql_query(sprintf("DELETE FROM `events` WHERE `event_id` = '%s';", $_GET['id']));

// Redirect to list.
echo '
	<script language="JavaScript">
		window.location = \'index.php?act=event_manager&message=Event Deleted!\';
	</script>';
?>


<?php
/*
   +-------------------------------------+
   + NEW                                 +
   +-------------------------------------+
*/
} elseif ($_GET['sa'] == 'new') {
/*
   +-------------------------------------+
   + NEW                                 +
   +-------------------------------------+
*/
?>


<div class='tableborder'>
	<div class="tableheader">
		Add New Event
	</div>
	<form action="index.php?act=event_manager&sa=save" method="post" enctype="multipart/form-data">
	<table width="100%" cellpadding="4" cellspacing="0">
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Event Title:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<input type="text" name="title" value="" class="text-input">
			</td>
		</tr>
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Event Details:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<textarea name="event" class="text-area"></textarea>
			</td>
		</tr>
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Location:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<input type="text" name="location" value="" class="text-input">
			</td>
		</tr>
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Full Date:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<select name="day" class="my-select">
					<option value="1"<?php if (date('j') == '1') { echo ' selected'; } ?>>01</option>
					<option value="2"<?php if (date('j') == '2') { echo ' selected'; } ?>>02</option>
					<option value="3"<?php if (date('j') == '3') { echo ' selected'; } ?>>03</option>
					<option value="4"<?php if (date('j') == '4') { echo ' selected'; } ?>>04</option>
					<option value="5"<?php if (date('j') == '5') { echo ' selected'; } ?>>05</option>
					<option value="6"<?php if (date('j') == '6') { echo ' selected'; } ?>>06</option>
					<option value="7"<?php if (date('j') == '7') { echo ' selected'; } ?>>07</option>
					<option value="8"<?php if (date('j') == '8') { echo ' selected'; } ?>>08</option>
					<option value="9"<?php if (date('j') == '9') { echo ' selected'; } ?>>09</option>
					<option value="10"<?php if (date('j') == '10') { echo ' selected'; } ?>>10</option>
					<option value="11"<?php if (date('j') == '11') { echo ' selected'; } ?>>11</option>
					<option value="12"<?php if (date('j') == '12') { echo ' selected'; } ?>>12</option>
					<option value="13"<?php if (date('j') == '13') { echo ' selected'; } ?>>13</option>
					<option value="14"<?php if (date('j') == '14') { echo ' selected'; } ?>>14</option>
					<option value="15"<?php if (date('j') == '15') { echo ' selected'; } ?>>15</option>
					<option value="16"<?php if (date('j') == '16') { echo ' selected'; } ?>>16</option>
					<option value="17"<?php if (date('j') == '17') { echo ' selected'; } ?>>17</option>
					<option value="18"<?php if (date('j') == '18') { echo ' selected'; } ?>>18</option>
					<option value="19"<?php if (date('j') == '19') { echo ' selected'; } ?>>19</option>
					<option value="20"<?php if (date('j') == '20') { echo ' selected'; } ?>>10</option>
					<option value="21"<?php if (date('j') == '21') { echo ' selected'; } ?>>11</option>
					<option value="22"<?php if (date('j') == '22') { echo ' selected'; } ?>>22</option>
					<option value="23"<?php if (date('j') == '23') { echo ' selected'; } ?>>23</option>
					<option value="24"<?php if (date('j') == '24') { echo ' selected'; } ?>>24</option>
					<option value="25"<?php if (date('j') == '25') { echo ' selected'; } ?>>25</option>
					<option value="26"<?php if (date('j') == '26') { echo ' selected'; } ?>>26</option>
					<option value="27"<?php if (date('j') == '27') { echo ' selected'; } ?>>27</option>
					<option value="28"<?php if (date('j') == '28') { echo ' selected'; } ?>>28</option>
					<option value="29"<?php if (date('j') == '29') { echo ' selected'; } ?>>29</option>
					<option value="30"<?php if (date('j') == '30') { echo ' selected'; } ?>>30</option>
					<option value="31"<?php if (date('j') == '31') { echo ' selected'; } ?>>31</option>
				</select>
				<select name="month" class="my-select">
					<option value="1"<?php if (date('n') == '1') { echo ' selected'; } ?>>January</option>
					<option value="2"<?php if (date('n') == '2') { echo ' selected'; } ?>>February</option>
					<option value="3"<?php if (date('n') == '3') { echo ' selected'; } ?>>March</option>
					<option value="4"<?php if (date('n') == '4') { echo ' selected'; } ?>>April</option>
					<option value="5"<?php if (date('n') == '5') { echo ' selected'; } ?>>May</option>
					<option value="6"<?php if (date('n') == '6') { echo ' selected'; } ?>>June</option>
					<option value="7"<?php if (date('n') == '7') { echo ' selected'; } ?>>July</option>
					<option value="8"<?php if (date('n') == '8') { echo ' selected'; } ?>>August</option>
					<option value="9"<?php if (date('n') == '9') { echo ' selected'; } ?>>September</option>
					<option value="10"<?php if (date('n') == '10') { echo ' selected'; } ?>>October</option>
					<option value="11"<?php if (date('n') == '11') { echo ' selected'; } ?>>November</option>
					<option value="12"<?php if (date('n') == '12') { echo ' selected'; } ?>>December</option>
				</select>
				<select name="year" class="my-select">
					<option value="2005"<?php if (date('Y') == '2005') { echo ' selected'; } ?>>2005</option>
					<option value="2006"<?php if (date('Y') == '2006') { echo ' selected'; } ?>>2006</option>
					<option value="2007"<?php if (date('Y') == '2007') { echo ' selected'; } ?>>2007</option>
					<option value="2008"<?php if (date('Y') == '2008') { echo ' selected'; } ?>>2008</option>
					<option value="2009"<?php if (date('Y') == '2009') { echo ' selected'; } ?>>2009</option>
					<option value="2010"<?php if (date('Y') == '2010') { echo ' selected'; } ?>>2010</option>
					<option value="2011"<?php if (date('Y') == '2011') { echo ' selected'; } ?>>2011</option>
					<option value="2012"<?php if (date('Y') == '2012') { echo ' selected'; } ?>>2012</option>
					<option value="2013"<?php if (date('Y') == '2013') { echo ' selected'; } ?>>2013</option>
					<option value="2014"<?php if (date('Y') == '2014') { echo ' selected'; } ?>>2014</option>
					<option value="2015"<?php if (date('Y') == '2015') { echo ' selected'; } ?>>2015</option>
				</select>
				&nbsp; &nbsp;
				-
				&nbsp; &nbsp;
				<input type="text" name="hour" value="<?php echo date('H'); ?>" class="text-input2" style="width: 22px; text-align: center;">
				:
				<input type="text" name="minute" value="<?php echo date('i'); ?>" class="text-input2" style="width: 22px; text-align: center;">
			</td>
		</tr>
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Picture 1:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<input type="file" name="picture_1" value="" class="file-input">
			</td>
		</tr>
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Picture 2:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<input type="file" name="picture_2" value="" class="file-input">
			</td>
		</tr>
		<tr>
			<td class="tablerow2" align="center" valign="middle" colspan="2">
				<input type="submit" value="Add" class="submit-input" />
				<input type="button" value="Cancel" class="submit-input" onclick="javascript:history.back(-1);" />
			</td>
		</tr>
	</table>
	</form>
</div>


<?php
/*
   +-------------------------------------+
   + SAVE                                +
   +-------------------------------------+
*/
} elseif ($_GET['sa'] == 'save') {
/*
   +-------------------------------------+
   + SAVE                                +
   +-------------------------------------+
*/
?>


<?php
// Variables from Form
$title = trim(addslashes($_POST['title']));
$event = trim(addslashes($_POST['event']));
$location = trim($_POST['location']);
$day = trim($_POST['day']);
$month = trim($_POST['month']);
$year = trim($_POST['year']);
$hour = trim($_POST['hour']);
$minute = trim($_POST['minute']);
$date = date('U', mktime(0, 0, 0, $month, $day, $year));
$time = $hour.':'.$minute;

// Image Uploading ...
$dir = "../event_images";
$types = array("image/png","image/x-png","image/gif","image/jpeg","image/pjpeg");
$fullpath = "$dir/";

if (!empty($_FILES['picture_1']['name'])) {
	if ($_FILES['picture_1']['size'] == 0) {
		$message  = '<b>Error:</b> Image (0 byte) <p>&laquo; <a href="javascript:history.go(-1)">Go back!</a></p>';
		die($message);
	} elseif ($_FILES['picture_1']['size'] > 524288) {
		$message  = '<b>Error:</b> Image (Max.: 512 k.byte)<p>&laquo; <a href="javascript:history.go(-1)">Go back!</a></p>';
		die($message);
	}
	$picture_1_tmp_name = $_FILES['picture_1']['tmp_name']; 
	$picture_1_new_name = $_FILES['picture_1']['name']; 
	$picture_1_clean_name = substr($picture_1_new_name, -4);
	$picture_1_date = randomkeys(10);
	$picture_1 = $picture_1_date . $picture_1_clean_name;
	if (in_array($_FILES['picture_1']['type'], $types)) {
		move_uploaded_file($picture_1_tmp_name, $fullpath . $picture_1);
	} else {
		$message  = '<b>Error:</b> Extension fail for Image!';
		die($message);
	}
}

if (!empty($_FILES['picture_2']['name'])) {
	if ($_FILES['picture_2']['size'] == 0) {
		$message  = '<b>Error:</b> Image (0 byte) <p>&laquo; <a href="javascript:history.go(-1)">Go back!</a></p>';
		die($message);
	} elseif ($_FILES['picture_2']['size'] > 524288) {
		$message  = '<b>Error:</b> Image (Max.: 512 k.byte)<p>&laquo; <a href="javascript:history.go(-1)">Go back!</a></p>';
		die($message);
	}
	$picture_2_tmp_name = $_FILES['picture_2']['tmp_name']; 
	$picture_2_new_name = $_FILES['picture_2']['name']; 
	$picture_2_clean_name = substr($picture_2_new_name, -4);
	$picture_2_date = randomkeys(10);
	$picture_2 = $picture_2_date . $picture_2_clean_name;
	if (in_array($_FILES['picture_2']['type'], $types)) {
		move_uploaded_file($picture_2_tmp_name, $fullpath . $picture_2);
	} else {
		$message  = '<b>Error:</b> Extension fail for Image!';
		die($message);
	}
}

// Query
$query = sprintf("INSERT INTO `events` (`event_id`, `location`, `title`, `event`, `picture_1`, `picture_2`, `day`, `month`, `year`, `date`, `time`) VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');", $location, $title, $event, $picture_1, $picture_2, $day, $month, $year, $date, $time);

// Run it!
$run = mysql_query($query);

// Redirect to list.
echo '
	<script language="JavaScript">
		window.location = \'index.php?act=event_manager&message=Event Added!\';
	</script>';
?>


<?php
/*
   +-------------------------------------+
   + LIST                                +
   +-------------------------------------+
*/
} else {
/*
   +-------------------------------------+
   + LIST                                +
   +-------------------------------------+
*/
?>


<?php
$Q = mysql_query("SELECT * FROM `events` ORDER BY 'date' DESC;");
?>
<div class='tableborder'>
	<div class="tableheader">
		<span style="float: left;">
		Event(s)<?php if ($_GET['message']) { echo ' - '.$_GET['message']; } ?>
		</span>
		<span style="float: right;">
		<a href="index.php?act=event_manager&sa=new">Add New &raquo;</a>
		</span>
	</div>
	<table width="100%" cellpadding="4" cellspacing="0">
		<tr>
			<td class="tablerow2" align="center" valign="middle" nowrap>
				<b>#</b>
			</td>
			<td class="tablerow2" width="100%">
				<b>Event Title</b> (Date) @ Location
			</td>
			<td class="tablerow2" align="center" valign="middle" nowrap>
				<b>Delete</b>
			</td>
			<td class="tablerow2" align="center" valign="middle" nowrap>
				<b>Edit</b>
			</td>
		</tr>
	<?php
		$alternate = true;
		$i = 1;
		while ($D = mysql_fetch_array($Q)) {
	?>
		<tr>
			<td class="tablerow<?php if ($alternate) { echo '1'; } else { echo '2'; } ?>" align="center" valign="middle" nowrap>
				<?php echo $i . '.'; ?>
			</td>
			<td class="tablerow<?php if ($alternate) { echo '1'; } else { echo '2'; } ?>" width="100%">
				<?php echo stripslashes($D['title']) . ' (' . date('d.m.Y', $D['date']) . ' - ' . $D['time'] . ') @ ' . $D['location']; ?>
			</td>
			<td class="tablerow<?php if ($alternate) { echo '1'; } else { echo '2'; } ?>" align="center" valign="middle" nowrap>
				<a href="index.php?act=event_manager&sa=delete&id=<?php echo $D['event_id']; ?>" onclick="return onay()"><img src="images/delete.png" alt="Sil" border="0" /></a>
			</td>
			<td class="tablerow<?php if ($alternate) { echo '1'; } else { echo '2'; } ?>" align="center" valign="middle" nowrap>
				<a href="index.php?act=event_manager&sa=edit&id=<?php echo $D['event_id']; ?>"><img src="images/edit.png" alt="Düzenle" border="0" /></a>
			</td>
		</tr>
	<?php
		$alternate = !$alternate;
		$i++;
		}
	?>
	</table>
</div>
<?php
mysql_free_result($Q);
?>


<?php
/*
   +-------------------------------------+
   + END OF SCRIPT                       +
   +-------------------------------------+
*/
}
/*
   +-------------------------------------+
   + END OF SCRIPT                       +
   +-------------------------------------+
*/
?>

