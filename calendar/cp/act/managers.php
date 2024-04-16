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
top_navigation('Calendar Managers', 'managers', 1, 1, 1, 1);
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
$Q = mysql_query(sprintf("SELECT * FROM `admins` WHERE `admin_id` = '%s';", $_GET['id']));
$D = mysql_fetch_assoc($Q);
?>
<div class='tableborder'>
	<div class="tableheader">
		Edit Manager: <?php echo $D['username']; ?>
	</div>
	<form action="index.php?act=managers&sa=update" method="post">
	<input type="hidden" name="admin_id" value="<?php echo $D['admin_id']; ?>">
	<table width="100%" cellpadding="4" cellspacing="0">
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Manager Username:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<input type="text" name="username" value="<?php echo $D['username']; ?>" class="text-input">
			</td>
		</tr>
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Password:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<input type="password" name="password" value="" class="password-input">
				<br />
				<span style="font-size: 9px;">
					<b style="color: #FF0000;">(MD5: <?php echo $D['password']; ?>)</b>
					<br />
					MD5, is encrypted.
				</span>
			</td>
		</tr>
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>E-Mail:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<input type="text" name="email" value="<?php echo $D['email']; ?>" class="text-input">
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
mysql_free_result($Q);
?>
<p>
<b>*</b> Please blank password field if you not change it.
</p>


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
// Variables
$username = trim($_POST['username']);
$password = md5($_POST['password']);
$email = trim($_POST['email']);

// Query
if (empty($password)) {
	$query = sprintf("UPDATE `admins` SET username = '$username', email = '$email' WHERE `admin_id` = '%s';", $_POST['admin_id']);
} else {
	$query = sprintf("UPDATE `admins` SET username = '$username', password = '$password', email = '$email' WHERE `admin_id` = '%s';", $_POST['admin_id']);
}

// Run Query
$run = mysql_query($query);

// Redirect to list
echo '
	<script language="JavaScript">
		window.location = \'index.php?act=managers&message=Manager Edited!\';
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
// Delete admin
$sonuc = mysql_query(sprintf("DELETE FROM `admins` WHERE `admin_id` = '%s';", $_GET['id']));

// Redirect to list
echo '
	<script language="JavaScript">
		window.location = \'index.php?act=managers&message=Manager Deleted!\';
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
		Add New Calendar Manager
	</div>
	<form action="index.php?act=managers&sa=save" method="post">
	<table width="100%" cellpadding="4" cellspacing="0">
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Manager Username:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<input type="text" name="username" value="" class="text-input">
			</td>
		</tr>
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>Password:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<input type="password" name="password" value="" class="password-input">
			</td>
		</tr>
		<tr>
			<td class="tablerow2" align="right" valign="middle">
				<b>E-Mail:</b>
			</td>
			<td class="tablerow2" align="left" valign="middle">
				<input type="text" name="email" value="" class="text-input">
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
// Variables
$username = trim($_POST['username']);
$password = $_POST['password'];
$email = trim($_POST['email']);

// Query
$query = sprintf("INSERT INTO `admins` (`admin_id`, `username`, `password`, `email`) VALUES (NULL, '%s', MD5('%s'), '%s');", $username, $password, $email);

// Run Query
$run = mysql_query($query);

// Redirect
echo '
	<script language="JavaScript">
		window.location = \'index.php?act=managers&message=Manager Added!\';
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
$Q = mysql_query("SELECT * FROM `admins` ORDER BY 'admin_id' ASC;");
?>
<div class='tableborder'>
	<div class="tableheader">
		<span style="float: left;">
		Manager List<?php if ($_GET['message']) { echo ' - '.$_GET['message']; } ?>
		</span>
		<span style="float: right;">
		<a href="index.php?act=managers&sa=new">Add New &raquo;</a>
		</span>
	</div>
	<table width="100%" cellpadding="4" cellspacing="0">
		<tr>
			<td class="tablerow2" align="center" valign="middle" nowrap>
				<b>#</b>
			</td>
			<td class="tablerow2" width="100%">
				<b>Username (E-Mail)</b>
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
		while ($D = mysql_fetch_array($Q)) {
	?>
		<tr>
			<td class="tablerow<?php if ($alternate) { echo '1'; } else { echo '2'; } ?>" align="center" valign="middle" nowrap>
				<?php echo $D['admin_id'] . '.'; ?>
			</td>
			<td class="tablerow<?php if ($alternate) { echo '1'; } else { echo '2'; } ?>" width="100%">
				<?php echo $D['username'] . ' (' . $D['email'] . ')'; ?>
			</td>
			<td class="tablerow<?php if ($alternate) { echo '1'; } else { echo '2'; } ?>" align="center" valign="middle" nowrap>
				<a href="index.php?act=managers&sa=delete&id=<?php echo $D['admin_id']; ?>" onclick="return onay()"><img src="images/delete.png" alt="Sil" border="0" /></a>
			</td>
			<td class="tablerow<?php if ($alternate) { echo '1'; } else { echo '2'; } ?>" align="center" valign="middle" nowrap>
				<a href="index.php?act=managers&sa=edit&id=<?php echo $D['admin_id']; ?>"><img src="images/edit.png" alt="Düzenle" border="0" /></a>
			</td>
		</tr>
	<?php
		$alternate = !$alternate;
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

