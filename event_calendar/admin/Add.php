<?php 
include "session.php";
include "links.php";
include "db_code.php";
include "main.php";
?>

<html>
<head>
<title>Welcome to NUST-SEECS Home Page</title>

<body>

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////	-->			  
<form name="form1" action="db_add.php" method="post">

  <table width="722" border="1" class="b_text" cellspacing="1">
    <tr>
      <td width="69"><span class="style26">ID:</span></td>
<td width="641"><input name="pid" type="text" id="pid" disabled value="Auto"></td>
</tr>
<tr>
      <td valign="top"><span class="style26">Date:</span></td>
      <td align="left">
<input name="txtedate" type="text" id="txtedate" size="50">
      </td>
</tr>

<tr>
      <td width="69">Text:</td>
      <td width="641"><input name="txttext" type="text" id="txttext" size="100"></td>
</tr>

<tr>
      <td width="69">URL</td>
      <td width="641"><input name="txturl" type="text" id="txturl" size="100"></td>
</tr>

<tr>
<td></td>
<td><input type="submit" value="Add"></td></tr>
</table>
</form>

		  
		   </td>
        </tr>


</table>
    <!-- /////////////////////////////////////////////////////////////////////////////////////////////	-->	
				  
				  
</body>
</html>