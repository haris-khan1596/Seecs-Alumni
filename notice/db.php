<?php

include "config.php";
include "links.php";
?>

<html>
<head>
<title>Welcome to NUST-SEECS Home Page</title>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: large;
}
-->
</style>
</head>

<body>

<h2 class="style1">Welcome to Administrative Area </h2>
<form name="frmDb" action="Delete.php" method="post">

<?php

if (isset($_POST["t1"])){
$a=$_POST["t1"];
$sql="SELECT * FROM notice order by sdate  "; 
}
else
$sql="SELECT * FROM notice order by sdate "; 

$request = mysql_query("select * from notice order by sdate"); 

echo "<table border=1 cellspacing=0 cellpading=0 >";
echo "<tr>";
echo "<td>.</td>";
echo "<td><b>nid</td>";
echo "<td><b>Notice</td>";
echo "<td><b>sdate</td>";
echo "<td><b>edate</td>";
echo "<td><b>Status</td>";
echo "<td><b>Detail</td>";
echo "<td><b>URL</td>";
echo "</tr>";


while($row = mysql_fetch_array($request))
{

$strname=$row["nid"];
echo "<tr><td>";
echo "<input type=checkbox name= t" . $strname . ">";
echo "</td><td>";
echo $row["nid"];
echo "</td><td>";
echo $row["notice"];
echo "</td><td>";
echo $row["sdate"];
echo "</td><td>";
echo $row["edate"];
echo "</td><td>";
echo $row["status"];
echo "</td><td>";
echo $row["detail"];
echo "</td><td>";
echo $row["url"];

echo "</td></tr>";

}

?>
</table>
<br>
  <input type="submit" name="cmdDelete" value="Delete">
  <input type="submit" name="cmdEdit" value="Edit">

</form>
</body>
</html>