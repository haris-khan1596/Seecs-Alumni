<?php

function autonum($table,$field)
{
$sql="select max( " . $field . " ) from " . $table . " ";
$request=mysql_query($sql);
if(mysql_affected_rows()<=0)
return 1;
else{
$row=mysql_fetch_array($request);
return $row[0]+1;}
}

function autocatid($cat)
{
$sql="select max(catid) from pic where cat=" . $cat . " ";
$request=mysql_query($sql);
$row=mysql_fetch_array($request);
return $row[0]+1;
}

//----------------------------------date function

//----Date format for User (DD-MM-YYYY)
function show_date($edate,$format)
{
$day= substr($edate,8,3);
$month= substr($edate,5,2);
$year= substr($edate,0,4);

if($format=="mmyyyy")
{
$setdate= $month . "-" . $year;
}
else
{
$setdate= $day . "-" . $month . "-" . $year;
}

return $setdate;

}
//----Date format for Database (YYYY-MM-DD)
function save_date($edate)
{

$day= substr($edate,0,2);
$month= substr($edate,3,2);
$year= substr($edate,6,4);

$setdate= $year . "-" . $month . "-" . $day;
return $setdate;

}

//-------------------Return title-------------------

function return_title($required_field,$table_name,$criteria_field,$criteria)
{
$sql="select " . $required_field . " from " . $table_name . " where " . $criteria_field . "=" . $criteria . " ";
$result=mysql_query($sql);
if(mysql_affected_rows()<=0)
{
echo mysql_error();
return "";
}
else
{
$row=mysql_fetch_array($result);
return $row[0];
}
}

?>