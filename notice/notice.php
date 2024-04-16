<?php 
$cat="2";
session_start(); 
 ?>
<html>
<head>

<title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science)Alumni Notice Board</title>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="0" colspan="3" align="left" valign="top">
<?php include "../header.php"; ?>
	</td>
  </tr>
 <tr>
    <td colspan="2" align="left" valign="top"> 
<?php include "../../header2.php"; ?>
    </td>
    <td width="120" rowspan="2" align="left" valign="top" class="right_bgcolor">
<?php include "../control/right.php"; ?>
	</td>
  </tr>
  <tr>
    <td width="143" align="left" valign="top" class="left_bgcolor">
<?php include "../../left.php"; ?>
	</td>
    <td width="486" align="left" valign="top">
	<table width="475" border="0" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td width="543" height="323" valign="top">
		<p class="b_heading"><span class="b_heading"><br>
          Alumni Notice Board </span></p>
		  
		  <?php 
		  
if (isset($_POST["t1"])){
$a=$_POST["t1"];
$sql="SELECT * FROM notice order by sdate desc  "; 
}
else
$sql="SELECT * FROM notice order by sdate desc "; 


/*--------- DATABASE CONNECTION INFO---------*/ 
$hostname="localhost"; 
$mysql_login="root"; 
$mysql_password="BingoBus"; 
$database="alumni"; 

// connect to the database server 
if (!($db = mysql_pconnect($hostname, $mysql_login , $mysql_password))){ 
  die("Can't connect to database server.");     
}else{ 
  // select a database 
    if (!(mysql_select_db("$database",$db))){ 
     die("Can't connect to database."); 
    } 
} 

$request = mysql_query("select * from notice where status=1 order by sdate desc"); 

echo "<table border=1 cellspacing=0 bordercolor=#cccccc class=b_text width=100%>";

while($row = mysql_fetch_array($request))
{
$strname=$row["nid"];
echo "<tr><td width=60 valign=top>";
echo date("d-m-y",strtotime($row["sdate"]));
echo "</td><td valign=top>";

if($row["detail"]==1)
$msgdetail='<br><a href=' . $row["url"] . ' class="b_link">Click Here for Detail</a>';
else
$msgdetail='';

echo $row["notice"] . $msgdetail;
echo "</td></tr>";
}
echo "</table>";
		  
?>  
		  
		  
          <p class="b_heading"><br>
            </p>
          <p class="b_heading"><font face="Verdana, Arial, Helvetica, sans-serif" style="font-weight: bold; font-variant: normal; text-transform: none; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif; font-style: normal;" #invalid_attr_id="normal"></font></p>
          <p class="b_heading">&nbsp;</p>
          </td>
      </tr>
    </table>    
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">
<span class="b_link"><?php include "../footer.php" ?>
	</span></td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">
<span class="b_link"><?php include "../../footerlinks.php"; ?>
	</span></td>
  </tr>
</table>

</body>
</html>
