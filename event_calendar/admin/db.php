<?php 
include "session.php";
include "links.php";
include "db_code.php";
include "main.php";
?>

<html>
<head>
<title>Show All Records</title>
</head>

<body>
<p></p>
<span class="b_text"><font size="3"><b> Welcome to Administrative Area (Event Calendar)</b></font></span>
<form name="frmDb" action="Delete.php" method="post">
<?php

if (isset($_POST["t1"])){
$a=$_POST["t1"];
$sql="SELECT * FROM event_calendar order by edate  "; 
}
else
$sql="SELECT * FROM event_calendar order by edate"; 

$request = mysql_query($sql); 
echo "<table border=1 cellspacing=0 cellpading=0 class=b_text>";
echo "<tr>";
echo "<td>.</td>";
echo "<td><b>id</td>";
echo "<td><b>date</td>";
echo "<td><b>txt</td>";
echo "<td><b>url</td>";
echo "</tr>";

while($row = mysql_fetch_array($request))
{

$strid=$row["id"];
echo "<tr><td>";
echo "<input type=checkbox name= t" . $strid . ">";
echo "</td><td>";
echo $row["id"];
echo "</td><td>";
echo $row["edate"];
echo "</td><td>";
echo $row["txt"];
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