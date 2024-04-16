<?php 
ob_start();
session_start(); 
include "session.php";
include "../control/dbcode.php";
include "../control/main.php";
?>

<html>
<head>

<script language="javascript">
function isnum(sText)
{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;

 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
   return IsNumber;
   
   }


function datediff(date1,date2)
{

var getdate1=new Date(date1)
var getdate2=new Date(date2)


year1=(getdate1.getFullYear())
month1=(getdate1.getMonth()+1)
day1=(getdate1.getDate())

year2=(getdate2.getFullYear())
month2=(getdate2.getMonth()+1)
day2=(getdate2.getDate())

date1=year1 + "/" + day1 + "/" + month1
date2=year2 + "/" + day2 + "/" + month2

var getdate1=new Date(date1)
var getdate2=new Date(date2)

//document.write(date1 + "<br>" + date2 )

var one_day=24*60*60*1000
//Calculate difference btw the two dates, and convert to days
var result=Math.ceil((getdate2.getTime()-getdate1.getTime())/(one_day))
return result;

}




var dtCh= "-";
var minYear=1900;
var maxYear=2100;

function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   } 
   return this
}

function isDate(dtStr,dtlevel) //dtlevel means the complete date of only mm-yyyy if dtlevel=2 then (mm-yyyy) and if dtlevel=3 then (dd-mm-yyyy)
{
	var daysInMonth = DaysArray(12)
	var pos1=dtStr.indexOf(dtCh)
	var pos2=dtStr.indexOf(dtCh,pos1+1)
	var strDay=dtStr.substring(0,pos1)
	var strMonth=dtStr.substring(pos1+1,pos2)
	var strYear=dtStr.substring(pos2+1)
	strYr=strYear
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
	}
	day=parseInt(strDay)
	month=parseInt(strMonth)
	year=parseInt(strYr)
	if (pos1==-1 || pos2==-1){
		
		if (dtlevel==2){
		alert("The date format should be : mm-yyyy \n please also check the seperator it must be  ( - ) ")}
		else{
		alert("The date format should be : dd-mm-yyyy \n please also check the seperator it must be  ( - ) ")}
		
		return false;
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		alert("Please enter a valid day")
		return false;
	}

	if (strMonth.length<1 || month<1 || month>12){
		alert("Please enter a valid month")
		return false;
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		alert("Please enter a valid 4 digit year between "+minYear+" and "+maxYear)
		return false;
	}
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		alert("Please enter a valid date")
		return false;
	}
//return true
}

function validate()
{
	if(frmadmin_search.txtsearch.value=="")
	{
			alert("Please enter Search text");
			frmadmin_search.txtsearch.focus()
			return false;
	}
}

function validate_datewise()
{

	if(frmadmin_datewise.txtdate1.value=="")
		{
			alert("please enter Start Date ");
			frmadmin_datewise.txtdate1.focus()
			return false;
		}
		
	else if (isDate(frmadmin_datewise.txtdate1.value,3)==false)
	{
	frmadmin_datewise.txtdate1.focus()
	return false;
	}

	if(frmadmin_datewise.txtdate2.value=="")
		{
			alert("please enter End Date ");
			frmadmin_datewise.txtdate2.focus()
			return false;
		}
		
	else if (isDate(frmadmin_datewise.txtdate2.value,3)==false)
	{
	frmadmin_datewise.txtdate2.focus()
	return false;
	}

}

</script>

<title></title>

<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: large;
}
-->
</style>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>

<body>
<br>
<?php include "control/admin_links.php"; ?>
<hr>
<table width="100%"  border="0">
  <tr>
    <td valign="top" class="new_heading">Class Wise Report </td>
    <td valign="top" class="new_heading">Search Student by Fields </td>
    <td class="new_heading">Qualification Wise Report </td>
  </tr>
  <tr>
    <td colspan="3" valign="top"><hr></td>
  </tr>
  <tr>
    <td width="33%" rowspan="2" valign="top"><?php

$sql_class="SELECT * FROM class_all order by class_id";
$request_class = mysql_query($sql_class); 
while($row_class = mysql_fetch_array($request_class))
{
$sql="SELECT count(*) FROM personal_data where reg3=" . $row_class["class_id"] . " ";//BIT 
$request = mysql_query($sql); 
$row = mysql_fetch_array($request);

echo "<ul>";
echo "<li><a href=show_all_admin.php?cid=" . $row_class["class_id"] . " class=b_link><font size=2>" . $row_class["class_name"] . "<font color=#990000>(<b>" . $row[0] . ")</font></font></b></a>";
echo "</ul>";
}
?></td>
    <td width="31%" valign="top">
	<form name="frmadmin_search" action="show_all_admin.php" method="post" onSubmit="return validate()">
        <div align="left"></div>
        <table width="86%"  border="0" align="left" cellpadding="0" cellspacing="0" bordercolor="#999999">
          <tr bordercolor="#999999">
            <th width="33%" scope="col"><div align="left"><span class="b_text">Search By* </span></div></th>
            <th width="67%" scope="col"><div align="left"><span class="b_text">
                <select name="cbosearch" class="b_text" id="cbosearch">
                  <option value="name" selected>Name</option>
                  <option value="last_degree_niit">Last Class Passed from NIIT</option>
                  <option value="blood_group">Blood Group</option>
                  <option value="ph">Phone No</option>
                  <option value="sec_email">E-Mail Address</option>
                  <option value="city">City</option>
                  <option value="country">Country</option>
                </select>
            </span></div></th>
          </tr>
          <tr bordercolor="#999999">
            <td><div align="left"><span class="b_text">Search: *</span></div></td>
            <td align="left" valign="top" class="b_text"><input name="txtsearch" type="text" class="b_text" id="txtsearch" size="28"></td>
          </tr>
          <tr bordercolor="#999999">
            <td>&nbsp;</td>
            <td align="right"><input name="cmdsubmit2" type="submit" class="Table_heading" id="cmdsubmit2" value="Search"></td>
          </tr>
        </table>
      </form>
    <p>&nbsp;</p></td>
    <td width="36%" rowspan="2" valign="top">
	
<?php

$sql_edu="SELECT COUNT(*) from academic_detail where degree_equal='Masters'";
$request_edu = mysql_query($sql_edu); 
$row_edu = mysql_fetch_array($request_edu);
echo "<ul>";
echo "<li><a href=show_all_admin.php?aid=Masters class=b_link><font size=2>Masters<font color=#990000>(<b>" . $row_edu[0] . ")</font></font></b></a>";

$sql_edu="SELECT COUNT(*) from academic_detail where degree_equal='PhD'";
$request_edu = mysql_query($sql_edu); 
$row_edu = mysql_fetch_array($request_edu);
echo "<li><a href=show_all_admin.php?aid=PhD class=b_link><font size=2>PhD<font color=#990000>(<b>" . $row_edu[0] . ")</font></font></b></a>";
echo "</ul>";

?>

</td>
  </tr>
  <tr>
    <td valign="top"><p class="new_heading"><br>
      Search Between Two Dates </p>
	<form name="frmadmin_datewise" action="show_all_admin.php" method="post" onSubmit="return validate_datewise()">
      <table width="260" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <th width="78" align="left" class="b_text" scope="col">Start Date*</th>
          <th width="182" align="left" scope="col">
		  <input name="txtdate1" type="text" class="b_text" id="txtdate1" size="10">
              <span class="b_text style2">(dd-mm-yyyy)</span></th>
        </tr>
        <tr>
          <td align="left" class="b_text">End Date*</td>
          <td><input name="txtdate2" type="text" class="b_text" id="txtdate2" size="10">
              <span class="b_text style2">(dd-mm-yyyy)</span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="right">
            <input name="cmdsubmit" type="submit" class="Table_heading" id="cmdsubmit" value="Search">
          </div></td>
        </tr>
      </table> </form>     <p>&nbsp;</p>    

</table>
<p>&nbsp;</p>
</body>
</html>