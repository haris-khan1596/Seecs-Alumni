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


//----------------------------Validate Alumni Login---------------------------
function validate_alumni_login()
{

	if(frm_alumniuser.txtuser.value=="")
		{
			alert("Please enter User Name");
			frm_alumniuser.txtuser.focus()
			return false;
		}
	else if(frm_alumniuser.txtpassword.value=="")
		{
			alert("Please enter password");
			frm_alumniuser.txtpassword.focus()
			return false;
		}
}

//----------------------------Validate E-Mail User---------------------------

function validate_email_user()
	{
		if(frmuser.txtemail.value=="")
		{
			alert("E-Mail field found empty unable to continue");
			frmuser.txtemail.focus()
			return false;
		}

		txt=(frmuser.txtemail.value)
		if (txt.indexOf("@")>0)
		{
		alert("Only use email address not need to enter @ niit.edu.pk");
		frmuser.txtemail.focus()
		return false;
		}
	
		if(frmuser.txtpassword.value=="")
		{
			alert("Please enter password");
			frmuser.txtpassword.focus()
			return false;
		}
	}

//----------------------------Validate Alumni User---------------------------

function validate_user()
	{

		if(frmuser.txtemail.value=="")
		{
			alert("E-Mail field found empty unable to continue");
			frmuser.txtemail.focus()
			return false;
		}

		txt=(frmuser.txtemail.value)
		if (txt.indexOf("@")>0)
		{
		alert("Only use email address not need to enter @ niit.edu.pk");
		frmuser.txtemail.focus()
		return false;
		}
	
		if(frmuser.txtuser_name.value=="")
		{
			alert("Please enter user name");
			frmuser.txtuser_name.focus()
			return false;
		}

		if(frmuser.txtpassword.value=="")
		{
			alert("Please enter password");
			frmuser.txtpassword.focus()
			return false;
		}

		if(frmuser.txtpassword2.value=="")
		{
			alert("Please enter confirm password");
			frmuser.txtpassword2.focus()
			return false;
		}

		if(frmuser.txtpassword.value != frmuser.txtpassword2.value)
		{
			alert("Password not match with each other please re-enter passowrd");
			frmuser.txtpassword.focus()
			return false;
		}
		
		pas=(frmuser.txtpassword.value)
		len=pas.length
		if(len<4)
		{
		alert("Password you entered is not 4 characters long");
			frmuser.txtpassword.focus()
			return false;
		}
	}
	

//----------------------------Validate Personal---------------------------

function validate_personal()
	{

		if(frmpersonal.txtreg1.value=="")
		{
			alert("Registration No Filed 1 is empty unable to proceed");
			frmpersonal.txtreg1.focus()
			return false;
		}

		else if(frmpersonal.txtreg2.value=="")
		{
			alert("Registration No Filed 2 is empty unable to proceed");
			frmpersonal.txtreg2.focus()
			return false;
		}
		
				else if(frmpersonal.txtreg4.value=="")
		{
			alert("Registration No Filed 4 is empty unable to proceed");
			frmpersonal.txtreg4.focus()
			return false;
		}

		else if(frmpersonal.txtname.value=="")
		{
			alert("please enter your name");
			frmpersonal.txtname.focus()
			return false;
		}

		else if(frmpersonal.txtfname.value=="")
		{
			alert("please enter your father name");
			frmpersonal.txtfname.focus()
			return false;
		}

		else if(frmpersonal.txtdob.value=="")
		{
			alert("please enter your Date of Birth");
			frmpersonal.txtdob.focus()
			return false;
		}
		
				else if (isDate(frmpersonal.txtdob.value,3)==false) //------------------------Date of Birth Check
				{
				frmpersonal.txtdob.focus()
				return false;
				}
/*		
		else if(frmpersonal.txtnationality_p.value=="")
		{
			alert("please enter your present nationality");
			frmpersonal.txtnationality_p.focus()
			return false;
		}
*/
		else if(frmpersonal.txtnic1.value=="")
		{
			alert("please enter National ID Card No");
			frmpersonal.txtnic1.focus()
			return false;
		}

		else if(frmpersonal.txtnic2.value=="")
		{
			alert("please enter National ID Card No");
			frmpersonal.txtnic2.focus()
			return false;
		}

		else if(frmpersonal.txtnic3.value=="")
		{
			alert("please enter National ID Card No");
			frmpersonal.txtnic3.focus()
			return false;
		}			

		else if(frmpersonal.txtyear_passing_niit.value=="")
		{
			alert("please enter your year of passing from NIIT/SEECS");
			frmpersonal.txtyear_passing_niit.focus()
			return false;
		}			

		else if(frmpersonal.txtlast_degree_niit.value=="")
		{
			alert("please enter your last degree passed from NIIT/SEECS");
			frmpersonal.txtlast_degree_niit.focus()
			return false;
		}	

		else if(frmpersonal.txtaddress.value=="")
		{
			alert("please enter your address");
			frmpersonal.txtaddress.focus()
			return false;
		}			

		address_txt=(frmpersonal.txtaddress.value)
		len=address_txt.length
		if(len>150)
		{
		alert("Only 150 Characters are allowed in Address Field ---> Characters Count= " + len + " ");
		frmpersonal.txtaddress.focus()
		return false;
		}

		else if(frmpersonal.txtcity.value=="")
		{
			alert("please enter your current city");
			frmpersonal.txtcity.focus()
			return false;
		}			

		else if(frmpersonal.txtcountry.value=="")
		{
			alert("please enter your current country");
			frmpersonal.txtcountry.focus()
			return false;
		}			

		else if(frmpersonal.txtph.value=="")
		{
			alert("please enter your phone no");
			frmpersonal.txtph.focus()
			return false;
		}			

		else if(frmpersonal.txtemergency_contact_no.value=="")
		{
			alert("please provide your Emergency Contact No. This number is required to display on your Alumni Card");
			frmpersonal.txtemergency_contact_no.focus()
			return false;
		}			

		else if(frmpersonal.txtmob.value=="")
		{
			alert("please enter your Mobile Number");
			frmpersonal.txtmob.focus()
			return false;
		}			
		else if(frmpersonal.txtfacebook.value=="")
		{
			alert("please enter your Facebook ID");
			frmpersonal.txtfacebook.focus()
			return false;
		}


		if(frmpersonal.txtcompany_name.value=="" && document.getElementById("rdo_job_status_nothing").checked==false)
		{
			alert("please enter your Company Name");
			frmpersonal.txtcompany_name.focus()
			return false;
		}
		else if(frmpersonal.txtjob_title.value=="" && document.getElementById("rdo_job_status_nothing").checked==false)
		{
			alert("please enter your Job Title");
			frmpersonal.txtjob_title.focus()
			return false;
		}
		else if(frmpersonal.txtjob_industry.value=="" && document.getElementById("rdo_job_status_nothing").checked==false)
		{
			alert("please enter your Job Industry");
			frmpersonal.txtjob_industry.focus()
			return false;
		}
		else if(frmpersonal.txtjob_summary.value=="" && document.getElementById("rdo_job_status_nothing").checked==false)
		{
			alert("please enter your Job Summary or Business Profile");
			frmpersonal.txtjob_summary.focus()
			return false;
		}
		else if(frmpersonal.txtjob_startdate.value=="" && document.getElementById("rdo_job_status_nothing").checked==false)
		{
			alert("please enter your Start date of your Job/Business");
			frmpersonal.txtjob_startdate.focus()
			return false;
		}
		else if(frmpersonal.txtjob_url.value=="" && document.getElementById("rdo_job_status_nothing").checked==false)
		{
			alert("please enter your Job/Busniesss Web Address");
			frmpersonal.txtjob_url.focus()
			return false;
		}


}


//----------------------------Validate Academic Detail---------------------------
function validate_ad()

	{
		if(frmad.txtdegree.value=="")
		{
			alert("please enter your Degree Information");
			frmad.txtdegree.focus()
			return false;
		}
		else if(frmad.txtfrom.value=="")
		{
			alert("please enter From Date");
			frmad.txtfrom.focus()
			return false;
		}
		
				 else if (isDate("01-" +  frmad.txtfrom.value,2)==false) //------------------------Date From
				 {
				 frmad.txtfrom.focus()
				 return false;
				 }


		
		else if(frmad.txtto.value=="")
		{
			alert("please enter To Date");
			frmad.txtto.focus()
			return false;
		}
		
				 else if (isDate("01-" +  frmad.txtto.value,2)==false) //------------------------Date To
				 {
				 frmad.txtto.focus()
				 return false;
				 }

	else if(datediff("01-" + frmad.txtfrom.value,"01-" + frmad.txtto.value)<=0)
	{	
	alert("From Date must be Earlier then To Date");
		  frmad.txtfrom.focus()
		  return false;
	}
	
	
		else if(frmad.txtgpa.value=="")
		{
			alert("please enter your GPA or Percentage or Grade");
			frmad.txtgpa.focus()
			return false;
		}
		else if(frmad.txtmajor.value=="")
		{
			alert("please enter your Major Subject Information");
			frmad.txtmajor.focus()
			return false;
		}
		else if(frmad.txtuni.value=="")
		{
			alert("please enter University or Institure or College Information releated to Degreee you entered");
			frmad.txtuni.focus()
			return false;
		}
	}
	
//----------------------------Validate Employment Detail---------------------------
function validate_emp()
	{
		if(frmemp.txtorg.value=="")
		{
			alert("please enter Organization Name");
			frmemp.txtorg.focus()
			return false;
		}
		else if(frmemp.txtdesi.value=="")
		{
			alert("please enter Designation");
			frmemp.txtdesi.focus()
			return false;
		}
		else if(frmemp.txtfrom.value=="")
		{
			alert("please enter From Date");
			frmemp.txtfrom.focus()
			return false;
		}	
		
				 else if (isDate("01-" +  frmemp.txtfrom.value,2)==false) //------------------------Date From
				 {
				 frmemp.txtfrom.focus()
				 return false;
				 }

			
		else if(frmemp.txtto.value=="")
		{
			alert("please enter To Date");
			frmemp.txtto.focus()
			return false;
		}
		
				 else if (isDate("01-" +  frmemp.txtto.value,2)==false) //------------------------Date To
				 {
				 frmemp.txtto.focus()
				 return false;
				 }

	else if(datediff("01-" + frmemp.txtfrom.value,"01-" + frmemp.txtto.value)<=0)
	{	
	alert("From Date must be Earlier then To Date");
		  frmemp.txtfrom.focus()
		  return false;
	}

		else if(frmemp.txtlocation.value=="")
		{
			alert("please enter Location");
			frmemp.txtlocation.focus()
			return false;
		}
/*
				if (isDate(frmemp.txtfrom.value)==false)
				{
				frmemp.txtfrom.focus()
				return false;
				}
*/


	}
//--------------------------------Validate Research----------------------------

function validate_research()
	{
		if(frmresearch.txtdegree.value=="")
		{
			alert("please enter Degree after you start Research");
			frmresearch.txtdegree.focus()
			return false;
		}
		else if(frmresearch.txtpost.value=="")
		{
			alert("please enter Research Post");
			frmresearch.txtpost.focus()
			return false;
		}
		else if(frmresearch.txtfrom.value=="")
		{
			alert("please enter From Date");
			frmresearch.txtfrom.focus()
			return false;
		}
				 else if (isDate("01-" +  frmresearch.txtfrom.value,2)==false) //------------------------Date From
				 {
				 frmresearch.txtfrom.focus()
				 return false;
				 }

		else if(frmresearch.txtto.value=="")
		{
			alert("please enter To Date");
			frmresearch.txtto.focus()
			return false;
		}
		
				 else if (isDate("01-" +  frmresearch.txtto.value,2)==false) //------------------------Date From
				 {
				 frmresearch.txtto.focus()
				 return false;
				 }

	else if(datediff("01-" + frmresearch.txtfrom.value,"01-" + frmresearch.txtto.value)<=0)
	{	
	alert("From Date must be Earlier then To Date");
		  frmresearch.txtfrom.focus()
		  return false;
	}

		else if(frmresearch.txtuni.value=="")
		{
			alert("please enter University/Institute");
			frmresearch.txtuni.focus()
			return false;
		}

	}
//--------------------------------Validate Publication----------------------------

function validate_pub()
	{
		if(frmpub.txttitle.value=="")
		{
			alert("please enter Publication Title");
			frmpub.txttitle.focus()
			return false;
		}
		else if(frmpub.txtauthor.value=="")
		{
			alert("please enter Author Name");
			frmpub.txtauthor.focus()
			return false;
		}

		else if(frmpub.txtpub_in.value=="")
		{
			alert("please enter the name where Published");
			frmpub.txtpub_in.focus()
			return false;
		}
		else if(frmpub.txtorgnizer.value=="")
		{
			alert("please enter Organizer Name");
			frmpub.txtorgnizer.focus()
			return false;
		}
		else if(frmpub.txtno.value=="")
		{
			alert("please enter No Field Value");
			frmpub.txtno.focus()
			return false;
		}
		else if(frmpub.txtvol.value=="")
		{
			alert("please enter Vol Field Value");
			frmpub.txtvol.focus()
			return false;
		}
		else if(frmpub.txtpp.value=="")
		{
			alert("please enter PP Field Value");
			frmpub.txtpp.focus()
			return false;
		}
		else if(frmpub.txtdates.value=="")
		{
			alert("please enter Dates Field Value");
			frmpub.txtdates.focus()
			return false;
		}
		else if (isDate(frmpub.txtdates.value,3)==false) //------------------------Date of Birth Check
				{
				frmpub.txtdates.focus()
				return false;
				}


	}

