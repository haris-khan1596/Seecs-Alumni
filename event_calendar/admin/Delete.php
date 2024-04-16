<?php 
include "session.php";
include "links.php";
include "db_code.php";
include "main.php";
?>
<html>
<head>
<title>Welcome to NUST-SEECS Home Page</title>
</head>

<body>
		  
<!-- ///////////////////////////////////////////////////////////////////////////////////// -->

<?php

if (isset($_POST["cmdDelete"]))
  {
   $del=$_POST["cmdDelete"];
   Delete();
  }
elseif (isset($_POST["cmdEdit"]))
  {
   $Edit=$_POST["cmdEdit"];
   edit();
  }


function Delete()
{
$sql="SELECT * FROM event_calendar"; 
$request = mysql_query($sql); 
while($row = mysql_fetch_array($request))
{
     if(isset($_POST["t". $row["id"]]))
     {
       $getid = $row["id"];
       $sSql="Delete from event_calendar where id='" . $getid . "' ";
       mysql_query($sSql);
     }
}
echo "<p class=b_text> Record Deleted Successfully </p>";
}

function Edit()
{

Global $getpid,$sSql,$rs1;

$sql="SELECT * FROM event_calendar"; 
$request = mysql_query($sql); 

while($row = mysql_fetch_array($request))
{
     if(isset($_POST["t".$row["id"]]))
     {
       $getid = $row["id"];
       $sSql="Select * from event_calendar where id='" . $getid . "' ";
       $rs1=mysql_query($sSql);
	   $getedate= $row["edate"];
	   $gettxt= $row["txt"];
	   $geturl= $row["url"];
     }

}

echo "<form name=frmEdit action=edit.php method=post>";
echo "<table width=722 border=1>";
echo "<tr><td>ID</td><td>";
echo "<input type=text Name=txtid value=" . $getid . " readonly=true>";
echo "</td></tr>";
echo "<tr><td>Date</td><td>";
echo "<input type=text name=txtedate value='" . $getedate . "' size=50><br>";
echo "</td></tr>";
echo "<tr><td>Text</td><td>";
echo "<input type=text Name=txttext value='" . $gettxt . "' size=100><br>";
echo "</td></tr>";
echo "<tr><td>URL</td><td>";
echo "<input type=text Name=txturl value='" . $geturl . "' size=100><br>";
echo "</td></tr>";
echo "<tr><td></td><td>";
echo "<input type=submit Value=Save>";
echo "</td></tr>";
echo "</tr></table>";
echo "</form>";
}

?>

<!-- ///////////////////////////////////////////////////////////////////////////////////// -->

				  
</body>
</html>