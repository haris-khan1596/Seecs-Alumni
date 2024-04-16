<?php 
ob_start();
session_start(); 

if($_SESSION['role']<>"webmaster")
{
header("Location:signout.php");
exit;
}

include "session.php";
include "../control/dbcode.php";
include "../control/main.php";
?>

<html>
<head>
<script language="javascript">

function confirm_delete(url)
{
	var chk
	chk=confirm("Are you sure you want to Delete the selected record")
	if(chk==true){
	window.location=url;}
	else
	{
	return;
	}
}

</script>
<title></title>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: large;
}
-->
</style>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body>
<br>
<?php include "control/admin_links.php" ?>

<br>
<br>
<?php
$sql="SELECT * from post_request where request_text <> '' order by autoid desc"; 
$request = mysql_query($sql); 

echo "<table border=1 cellspacing=0 cellpading=0 class=b_text align=center width=850 cellpadding=2>";
echo "<tr>";
echo "<td><b>ID</td>";
echo "<td><b>User Name</td>";
echo "<td><b>Type</td>";
echo "<td><b>Text</td>";
echo "</tr>";
$linechk=1;
while($row = mysql_fetch_array($request))
{
if($linechk==1)
echo "<tr bgcolor=#E1E1E1 valign=top>";
else
echo "<tr valign=top>";
echo "<td>";
echo $row["autoid"];
echo "</td><td width=140>";
$user_name=return_title("user_name","alumni_users","user_id",$row["user_id"]);
$user_id=return_title("user_id","alumni_users","user_name","'" . $user_name . "'" );
echo "<a class=b_link href=profile.php?uid=" . $user_id . ">" . $user_name . "</a>";
echo "</td><td>";
echo $row["notice_type"];
echo "</td>";
echo "<td width=500>";
echo $row["request_text"];
echo "</td>";

echo "<td width=50 align=center>";
echo "<a class=b_link href=javascript:confirm_delete('delete_info.php?id=" . $row["autoid"] . "')>Delete</a>";

echo "</td>";

echo "</tr>";
	if($linechk==1)
	$linechk=0;
	else
	$linechk=1;
}
?>
</table>
</body>
</html>