<?php
include "config.php";
include "links.php";
?>

<html>
<head>
</head>

<body>
		  
<p></p>
<?php

//$nid=$_POST["nid"];
$notice=$_POST["notice"];
$sdate=$_POST["sdate"];
$edate=$_POST["edate"];
$status=$_POST["status"];
$detail=$_POST["detail"];
$url=$_POST["url"];

$request=mysql_query("select max(nid) from notice");
$row = mysql_fetch_array($request);
$nid=$row[0]+1;

$sql="Insert into notice values(" . $nid . ",'" . $notice ."','" . $sdate ."','" . $edate ."'," . $status ."," . $detail .",'" . $url ."')";
mysql_query($sql);

echo "New Record Added Successfully";

?>
    <!-- /////////////////////////////////////////////////////////////////////////////////////////////	-->	
				  
				  
</body>
</html>