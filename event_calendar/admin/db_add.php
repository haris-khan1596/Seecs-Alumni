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

$edate=$_POST["txtedate"];
$txt=$_POST["txttext"];
$url=$_POST["txturl"];

$id = autonum('event_calendar','id');

$sql="Insert into event_calendar values(" . $id . ",'" . $edate ."','" . $txt ."','" . $url ."')";
mysql_query($sql);
echo "<p class=b_text> New Record Added Successfully </p>";
?>		  

</body>
</html>