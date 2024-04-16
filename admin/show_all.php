<?php 
ob_start();
session_start(); 
if($_SESSION['role']<>"webmaster" and $_SESSION['role']<>"exam")
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
function confirm_accept(url)
{
var chk
chk=confirm("Are you sure you want to ACCEPT the selected request")
if(chk==true){
window.location=url;}
else
{
return;
}
}
function confirm_reject(url)
{
var chk
chk=confirm("Are you sure you want to REJECT the selected request")
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
$qry=$_GET['qry'];
if (!isset($qry))
$sql="SELECT * FROM requests order by rid  "; 
else
$sql="SELECT * FROM requests where status='" . $qry . "' order by rid  "; 

$request = mysql_query($sql); 

echo "<table border=1 cellspacing=0 cellpading=0 class=b_text width=90% align=center>";
echo "<tr>";
echo "<td><b>Rid</td>";
echo "<td><b>Registration No</td>";
echo "<td><b>Name</td>";
echo "<td><b>Father's Name</td>";
echo "<td><b>Date of Birth</td>";
echo "<td><b>CGPA</td>";
echo "<td><b>E-Mail Address</td>";
echo "<td><b>Request Date</td>";
echo "<td><b>Status</td>";
echo "<td></td>";
echo "</tr>";
$linechk=1;

while($row = mysql_fetch_array($request))
{
if($linechk==1)
echo "<tr bgcolor=#E1E1E1>";
else
echo "<tr>";

echo "<td>";
echo $row["rid"];
echo "</td><td>";
echo $row["reg1"] . "-" . $row["reg2"] . "-" . return_title("class_name","class_all","class_id",$row["reg3"]) . "-" . $row["reg4"];
echo "</td><td>";
echo $row["name"];
echo "</td><td>";
echo $row["fname"];
echo "</td><td>";
echo show_date($row["dob"],"DDMMYYYY");
echo "</td><td>";
echo $row["cgpa"];
echo "</td><td>";
echo $row["email"];
echo "</td><td>";
echo show_date($row["entry_date"],"DDMMYYYY");
echo "</td><td>";
echo $row["status"];
echo "</td><td>";
if($qry=="new")
{
echo "<a class=b_link href=javascript:confirm_accept('accept.php?rid=" . $row["rid"] . "&qry=" . $qry . "') >Accept</a>";
echo "</td><td>";
echo "<a class=b_link href=javascript:confirm_reject('reject.php?rid=" . $row["rid"] . "&qry=" . $qry . "') >Reject</a>";
}

echo "</td></tr>";
	if($linechk==1)
	$linechk=0;
	else
	$linechk=1;
}

?>
</table>
</body>
</html>