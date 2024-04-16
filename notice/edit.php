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

$nid=$_POST["txtnid"];
$notice=$_POST["txtnotice"];
$sdate=$_POST["txtsdate"];
$edate=$_POST["txtedate"];
$status=$_POST["txtstatus"];
$detail=$_POST["txtdetail"];
$url=$_POST["txturl"];

$sql="delete from notice where nid=" . $nid . " ";
mysql_query($sql);

$sql="Insert into notice values(" . $nid . ",'" . $notice ."','" . $sdate ."','" . $edate ."'," . $status ."," . $detail .",'" . $url ."')";
mysql_query($sql);

//$sSql=" update notice set notice= '" . $notice ."',sdate= '" . date($sdate) ."',edate'" . date($edate) ."',status=" . $status . " where nid='" . $nid . "' ";
//mysql_query($sSql);

echo "Record updated Successfully";

?>
    <!-- /////////////////////////////////////////////////////////////////////////////////////////////	-->	
				  
				  
    <p>&nbsp;</p>
</body>
</html>