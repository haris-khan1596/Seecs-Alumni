

<?php


$hostname="localhost"; 
$mysql_login="snust_sch"; 
$mysql_password="1ek~H-NlDIFM"; 
$database="snust_scholarship"; 
// connect to the database server 
if (!($db = mysql_pconnect($hostname, $mysql_login , $mysql_password))){ 
  die("Can't connect to database server.");     
}else{ 
  // select a database 
    if (!(mysql_select_db("$database",$db))){ 
     die("Can't connect to database."); 
    } 
} 


include "../control/main.php";

$sql="SELECT * FROM notice where status=1 and approved=1 and curdate() <= edate order by nid desc LIMIT 3";
$request = mysql_query($sql); 
while($row = mysql_fetch_array($request))
{
echo "<a href=http://seecs.nust.edu.pk/admissions/scholarships/latest_detail.php?id=" . $row["nid"] . " class=b_link target=_blank><p>" . $row["title"] . "</a>";
echo "<br>";
echo "<span class=marquee_links>Expiry Date: " . show_date($row["edate"],"ddmmyyy") . "</span>";
}

?>

