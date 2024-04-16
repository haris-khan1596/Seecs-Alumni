<?php 
$cat="10";
session_start(); 
?>

<html>
    <head>
        <title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) Alumni </title>
        <link href="style.css" rel="stylesheet" type="text/css">

        <script language="JavaScript" type="text/javascript" src="TextEditor/richtext.js"></script>

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

                if(frmpost.txtstartdate.value=="")
                {
                    alert("please enter Start Date of Notice ");
                    frmpost.txtstartdate.focus()
                    return false;
                }

                if(frmpost.txttext.value=="")
                {
                    alert("Please enter requested text");
                    frmpost.txttext.focus()
                    return false;
                }
	
                updateRTEs();
                alert("rte1 = " + document.frmpost.rte1.value);
            }


            initRTE("TextEditor/editor_images/", "", "");

        </script>
    </head>
    <body>
        <table border="0" align="center" cellpadding="0" cellspacing="0" class="table_main">
            <tr>
                <td height="0" colspan="3" align="left" valign="top">
                    <?php include "header.php"; ?>
                </td>
            </tr>


            <tr>
                <td colspan="2" align="left" valign="top">
                    <?php include "../header2.php"; ?>
                </td>
                <td width="9" rowspan="2" align="left" valign="top">&nbsp;
                </td>
            </tr>
            <tr>
                <td width="65" align="left" valign="top" class="table_left">
                    <span class="right_bgcolor">
                        <?php include "control/right.php"; ?>
                    </span>	</td>
                 
    <td width="926" align="left" valign="top"><table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
        <tr>
          <td height="287" valign="top"><p><span class="img_heading"><br>
            Contact  NUST SEECS Alumni Coordinator </span> </p>
            <p><span class="b_text"><font face="Verdana, Arial, Helvetica, sans-serif">NUST School of Electrical Engineering and Computer Science, <br>
              Sector H-12, Islamabad, </font></span><span class="b_text"><font face="Verdana, Arial, Helvetica, sans-serif">Pakistan. </font></span></p>
            <table width="90%"  border="0" align="center" cellpadding="5">
              <tr bgcolor="#ACB9D1" class="left_bgcolor">
                <td colspan="2" class="Table_heading"><span class="b_heading">Ms Shafaq Soomro </span><br></td>
              </tr>
              <tr>
                <td width="9%" class="b_text">Phone: </td>
                <td width="91%" class="b_text">92 51 9085 2381</td>
              </tr>
              <tr>
                <td class="b_text">E-Mail:</td>
                <td class="b_text"><a href="mailto:shafaq.soomro@seecs.edu.pk" target="_blank" class="b_link">shafaq.soomro@seecs.edu.pk</a></td>
              </tr>
            </table>
            <p><a href="http://seecs.nust.edu.pk/dir/user/dept.php" target="_blank" class="b_link">Contact NUST-SEECS</a></td>
        </tr>
      </table>
      <p><span class="new_heading"><br>
      </span><br>
        <br>
      </tr>
            <tr>
                <td colspan="3" align="left" valign="top">
                    <span class="b_link"><?php include "footer.php" ?>
                    </span></td>
            </tr>
            <tr>
                <td colspan="3" align="left" valign="top">
                    <span class="b_link"><?php include "../footerlinks.php"; ?>
                    </span></td>
            </tr>
        </table>

    </body>
</html>
