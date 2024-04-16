<?php 
include "session.php";
include "links.php";
include "db_code.php";
include "main.php";
?>

<html>
<head>
</head>

<body>
		  
<?php

$id=$_POST["txtid"];
$edate=$_POST["txtedate"];
$txt=$_POST["txttext"];
$url=$_POST["txturl"];

$sql="delete from event_calendar where id=" . $id . " ";
mysql_query($sql);

$sql="Insert into event_calendar values(" . $id . ",'" . $edate ."','" . $txt ."','" . $url ."')";
mysql_query($sql);

echo "<p class=b_text>Record updated Successfully </p>";

?>
    <!-- /////////////////////////////////////////////////////////////////////////////////////////////	-->	
				  
				  
</body>
</html>