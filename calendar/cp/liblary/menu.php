<?php
/*
 +---------------------------------------------------------+
 + Calendar Script by Midgard (bahadir@eggdrop.gen.tr)     +
 + It's a free software                                    +
 +---------------------------------------------------------+
 + http://www.eggdrop.gen.tr                               +
 +---------------------------------------------------------+
 */

// Using:
// $menus[#] = "Menu Title:menu_link:Menu Description";
$menus = array();
$menus[1] = "Calendar Managers:managers:Calendar Managers";
$menus[2] = "Event Manager:event_manager:Event Manager";
?>
<table cellspacing="1" border="0" cellpadding="0" width="150" style="background-color: #CCCCCC;">
<?php
foreach($menus as $value) {
	list($name, $link, $title) = explode(':', $value);
?>
						<tr>
							<td align="left" valign="middle" <?php if ($_GET['act'] == $link) { ?> class="Menu_Over" <?php } else { ?> class="Menu_Norm" onMouseOver="this.className = 'Menu_Over';" onMouseOut="this.className = 'Menu_Norm';" <?php } ?> onClick="window.parent.document.location.href='index.php?act=<?php echo $link; ?>';" title="<?php echo $title; ?>">
								<img src="images/bullet.gif" style="vertical-align: middle; padding-left: 3px; padding-right: 2px;"> <?php echo $name; ?>

							</td>
						</tr>

<?php
}
?>
					</table>
