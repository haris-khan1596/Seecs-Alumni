
<html>
    <head>

<style>
iframe{
border-style:dotted; border-color:#666666; border-width:1px
}
</style>

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
      
                            
                            <form action="save/save_add_info.php" method="post" name="frmpost" onSubmit="return validate()">
<div class="round_div b_gradient" style="height:230px; width:600px" >
<table border="0" align="left" cellpadding="10" style="vertical-align:top" >
                                            <tr>
                                                <td width="493" valign="top" ><span class="rimm_heading">Please share your thoughts & suggestions with us</span>  </td>
                                          </tr>

                                            <tr >
                                                <td height="108">

                                                    <?php if ($_GET['err'] == "nil") {
 ?>
                                                    <div align="center"><span class="msgbox_green">Your Request has been submitted to Alumni Officer </span> </div>
                                                        <hr>
<?php } ?>	

                                                    <table width="100%"  border="0" align="left" cellpadding="2" cellspacing="4" bordercolor="#999999">
<tr >
                                                            <td width="20%" scope="col"><span class="b_text">User Name* </span></td>
                    <td scope="col"><?php
                                                                    echo "<div class=b_text>" . $_SESSION['user_name'] . "</div>";
                                                                    ?></td>
                                                      </tr>
                                                        <tr >
                                                            <td width="20%" valign="top" style="visibility:hidden"><span class="b_text">Writing For: *</span></td>
<td align="left" valign="top" class="b_text" style="visibility:hidden"><p>
                                                              <select name="cbonotice" class="b_text" id="cbonotice" disabled>
                                                                <option value="newsandevents">News and Events</option>
                                                                <option value="noticeboard">Notice Board</option>
                                                                <option value="articles">Articles</option>
                                                                <option value="quotes">Quotes</option>
                                                                <option value="poetry">Poetry</option>
                                                                <option value="suggestions" selected>Suggestions</option>
                                                                <option value="other">Other</option>
                                                              </select>
                                                            </p>
                                                          <p>&nbsp; </p></td>
                                                      </tr>
                                                        <tr >
                                                            <td colspan="2" class="b_text"> 
															<textarea name="txttext" cols="50" rows="10"></textarea>
                                                            </td>
                                                      </tr>
                                                        <tr >
                                                            <td height="58" colspan="2" class="b_text"><input name="cmdsubmit2" type="submit" class="black_button" id="cmdsubmit2" value="Submit"></td>
                                                      </tr>
                                              </table></td>
                  </tr></table>

                <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                    </div>
                              </form>
   