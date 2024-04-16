<?php
/*
 +---------------------------------------------------------+
 + Calendar Script by Midgard (bahadir@eggdrop.gen.tr)     +
 + It's a free software                                    +
 +---------------------------------------------------------+
 + http://www.eggdrop.gen.tr                               +
 +---------------------------------------------------------+
 */
?>
<div style="margin: 0px; padding: 8px; border: 1px solid #DDDDDD; background-color: #FFFFFF; width: 780px;">
	<div>
		<table cellspacing="0" border="0" cellpadding="0" width="100%">
			<tr>
				<td align="center" valign="top" nowrap>
					<?php include('liblary/menu.php'); ?>
				</td>
				<td align="left" valign="top" width="100%" style="padding-left: 8px;">
					<?php
						if ($_GET['act']) {
							$include = 'act/' . $_GET['act'] . '.php';
							$include_section = @include($include);
							if (!$include_section) {
								@include('liblary/section_not_found.php');
							}
						} elseif ($_GET['act'] == 'home') {
							$include_section = @include('act/home.php');
							if (!$include_section) {
								@include('liblary/section_not_found.php');
							}
						} else {
							$include_section = @include('act/home.php');
							if (!$include_section) {
								@include('liblary/section_not_found.php');
							}
						}
					?>
				</td>
			</tr>
		</table>
	</div>
</div>
