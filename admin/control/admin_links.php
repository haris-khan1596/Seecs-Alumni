<link href="../../style.css" rel="stylesheet" type="text/css">
<table width="100%"  border="0">
  <tr>
    <td width="21%">&nbsp;</td>
    <td width="58%"><div align="center"><span class="b_heading"><font size=+3>NUST-SEECS Alumni</font><br>
            <font size=+2>Administrative Area<br>
          </font></span></div></td>
    <td width="21%" valign="top"><div align="right" class="Marquee">Login As: <?php echo $_SESSION['username'] . "(" . $_SESSION['role'] . ")"; ?> </div></td>
  </tr>
</table>
<p><a href="admin_home.php" class="b_link">Admin Home</a> | 

<?php if($_SESSION['role']=="exam" or $_SESSION['role']=="webmaster") { ?>
<a href="home.php" class="b_link">Exams Home</a> | 
<?php } ?>

<a href="admin_search.php" class="b_link">Search Alumni</a> | 

<?php if($_SESSION['role']=="webmaster") { ?>
<a href="show_all_info.php" class="b_link">Notice Requests</a> |
<?php } ?>

<a href="signout.php" class="b_link">Logoff</a></p>
