<?php
include "config.php";
include "links.php";
?>

<html>
<head>
<title>Welcome to NUST-SEECS Home Page</title>

<body>

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////	-->			  
<form name="form1" action="db_add.php" method="post">
  <table width="722">
<tr>
<td width="69"><span class="style26">NID:</span></td>
<td width="641"><input name="nid" type="text" id="nid" value="Auto" readonly="true"></td>
</tr>
<tr>
<td valign="top"><span class="style26">Detail :</span></td>
<td><textarea name="notice" cols="50" rows="8" id="notice"></textarea></td>
</tr>

<tr>
<td width="69"><span class="style26">sDate</span></td>
<td width="641"><input name="sdate" type="text" id="sdate"></td>
</tr>

<tr>
<td width="69"><span class="style26">edate</span></td>
<td width="641"><input name="edate" type="text" id="edate"></td>
</tr>

<tr>
<td width="69"><span class="style26">Status</span></td>
<td width="641"><input name="status" type="text" id="status"></td>
</tr>

<tr>
<td width="69"><span class="style26">Detail</span></td>
<td width="641"><input name="detail" type="text" id="detail"></td>
</tr>

<tr>
<td width="69"><span class="style26">URL</span></td>
<td width="641"><input name="url" type="text" id="url"></td>
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