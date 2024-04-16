<?php 
ob_start();
session_start(); 
include "session.php";
include "../control/dbcode.php";
include "../control/main.php";
?>

<html>
<head>

<script language="javascript">
function confirm_block(url)
{
	var chk
	chk=confirm("Are you sure you want to BLOCK the selected user")
	if(chk==true){
	window.location=url;}
	else
	{
	return;
	}
}

function confirm_unblock(url)
{
	var chk
	chk=confirm("Are you sure you want to UNBLOCK the selected user")
	if(chk==true){
	window.location=url;}
	else
	{
	return;
	}
}

function confirm_delete(url)
{
	var chk
	chk=confirm("Are you sure you want to DELETE the selected user and all its data")
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
<?php include "control/admin_links.php"; ?>
<?php
$date1=save_date($_POST["txtdate1"]);
$date2=save_date($_POST["txtdate2"]);
$cid=mysql_real_escape_string($_GET['cid']);
$field=mysql_real_escape_string($_POST['cbosearch']);
$criteria=mysql_real_escape_string($_POST['txtsearch']);
$aid=mysql_real_escape_string($_GET['aid']);

if($date1<>"" and $date1<>"--")
$sql="SELECT alumni_users.*, personal_data.* FROM alumni_users, personal_data where alumni_users.user_id=personal_data.user_id AND alumni_users.entry_date between '" . $date1 . "' and '" . $date2 . "' order by personal_data.name"; 
elseif ($cid<>"")
$sql="SELECT alumni_users.*, personal_data.* FROM alumni_users, personal_data where alumni_users.user_id=personal_data.user_id AND reg3 = " . $cid . " order by personal_data.name"; 
elseif ($aid<>"")
$sql="SELECT personal_data.*, academic_detail.* from personal_data,academic_detail where personal_data.user_id=academic_detail.user_id AND degree_equal='" . $aid . "' order by personal_data.name" ;
else
$sql="SELECT alumni_users.*, personal_data.* FROM alumni_users, personal_data where alumni_users.user_id=personal_data.user_id AND " . $field . " like '%" . $criteria . "%' order by personal_data.name"; 

$request = mysql_query($sql); 

echo "<table border=1 cellspacing=0 cellpading=0 class=b_text width=90% align=center>";
echo "<tr>";
echo "<td width=50><b>User ID</td>";
echo "<td width=150><b>User Name</td>";
echo "<td width=200><b>Name</td>";
echo "<td width=200><b>Email</td>";
echo "<td width=100><b>last Class passed from NIIT</td>";
echo "<td width=100><b>Year of Passing from NIIT</td>";
if($_SESSION['role']=="webmaster") {
echo "<td><b>Status</td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
}
echo "</tr>";

$linechk=1;

while($row = mysql_fetch_array($request))
{
if($linechk==1)
echo "<tr bgcolor=#E1E1E1>";
else
echo "<tr>";

echo "<td>";
echo $row["user_id"];
echo "</td><td>";

if($aid<>"")
echo "<a class=b_link href=profile.php?uid=" . $row["user_id"] . ">" . return_title("user_name","alumni_users","user_id",$row["user_id"]) . "</a>";
else
echo "<a class=b_link href=profile.php?uid=" . $row["user_id"] . ">" . $row["user_name"] . "</a>";

echo "</td><td>";
echo $row["name"];
echo "</td><td>";
echo $row["sec_email"];
echo "</td><td>";
echo $row["last_degree_niit"];
echo "</td><td>";
echo $row["year_passing_niit"];
if($_SESSION['role']=="webmaster") {
echo "</td><td>";
echo $row[4];
echo "</td><td align=center width=50>";
//if($qry=="new")
//{
if($row[4]=="blocked")
echo "<a class=b_link href=javascript:confirm_unblock('unblock.php?uid=" . $row["user_id"] . "') >UnBlock</a>";
else
echo "<a class=b_link href=javascript:confirm_block('block.php?uid=" . $row["user_id"] . "') >Block</a>";

echo "</td><td align=center width=50>";
echo "<a class=b_link href=javascript:confirm_delete('delete.php?uid=" . $row["user_id"] . "&cid=" . $cid . "') >Delete</a>";

echo "</td><td align=center width=80>";
echo "<a class=b_link href=profile.php?uid=" . $row["user_id"] . ">View Profile</a>";

echo "</td><td align=center width=120>";
echo "<a class=b_link href=reset_pw.php?uid=" . $row["user_id"] . ">Reset Password</a>";
} //end if

echo "</td>";
//}
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