<?php
include "config.php";
include "links.php";
?>

<html>
<head>
<title>Welcome to NUST-SEECS Home Page</title>
</head>

<body>
		  
<!-- ///////////////////////////////////////////////////////////////////////////////////// -->

<p></p>
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
$sql="SELECT * FROM notice"; 
$request = mysql_query($sql); 
while($row = mysql_fetch_array($request))
{
     if(isset($_POST["t". $row["nid"]]))
     {
       $getid = $row["nid"];
       $sSql="Delete from notice where nid='" . $getid . "' ";
       mysql_query($sSql);
     }

}
echo "Record Deleted Successfully";
}

function Edit()
{

Global $getnid,$sSql,$rs1;

$sql="SELECT * FROM notice"; 
$request = mysql_query($sql); 

while($row = mysql_fetch_array($request))
{
     if(isset($_POST["t".$row["nid"]]))
     {
       $getnid = $row["nid"];
       $sSql="Select * from notice where nid='" . $getnid . "' ";
       $rs1=mysql_query($sSql);
	   $getnotice= $row["notice"];
	   $getsdate= $row["sdate"];
	   $getedate= $row["edate"];
	   $getstatus= $row["status"];
	   $getdetailchk= $row["detail"];
	   $geturl= $row["url"];
	   
     }

}

echo "<form name=frmEdit action=edit.php method=post>";
echo "<input type=text Name=txtnid value=" . $getnid . " readonly=true><br>";
echo "<textarea name=txtnotice cols=50 rows=8 value=" . $getnotice . ">" . $getnotice . "</textarea><br>";
echo "<input type=text Name=txtsdate value=" . $getsdate . " ><br>";
echo "<input type=text Name=txtedate value=" . $getedate . " ><br>";
echo "<input type=text Name=txtstatus value=" . $getstatus . " ><br>";
echo "<input type=text Name=txtdetail value=" . $getdetailchk . " ><br>";
echo "<input type=text Name=txturl value=" . $geturl . " ><br>";
echo "<input type=submit Value=Save>";

}

?>

<!-- ///////////////////////////////////////////////////////////////////////////////////// -->

				  
<p>&nbsp;</p>
</body>
</html>