<?php 
$cat="10";
session_start(); 

header("location:../register.php");
exit();

?>

<html>
<head>
<title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) Alumni </title>
<script type="text/javascript">
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

function foc()
{
frmregister.txtreg1.focus()
}
function chknum(field)
{
  if(isnum(field.value)==false)
  {
  alert("Please enter Numeric Values")
  field.value="";
  field.focus();
  return false;
  }
}

function chkgpa(field)
{
  num1 = parseInt(field.value[0]);
  num2 = parseInt(field.value[2]);
  if(num1>4)
  {
    alert("Maximum CGPA is 4")
	//alert(num2)
	field.value="";
    field.focus();
  	return false;
  }

  if(isnum(field.value)==false)
  {
  alert("Pleasesd enter Numeric Values")
  
  field.value="";
  field.focus();
  return false;
  }
  
}




function isAlphabet(field)
{
	var alphaExp = /^[a-zA-Z ]+$/;
	if(field.value.match(alphaExp)){
		return true;
	}else{
		alert("Please enter characters");
		field.value="";
		field.focus();
		return false;
	}
}











function validate()
	{
		/*if(frmregister.txtreg1.value=="")
		{
			alert("Registration No Field 1 is empty unable to proceed");
			frmregister.txtreg1.focus()
			return false;
		}*/
		if(frmregister.txtreg2.value=="")
		{
			alert("Registration No Field 2 is empty unable to proceed");
			frmregister.txtreg2.focus()
			return false;
		}
		else if(frmregister.txtreg4.value=="")
		{
			alert("Registration No Field 4 is empty unable to proceed");
			frmregister.txtreg4.focus()
			return false;
		}
		else if(frmregister.txtname.value=="")
		{
			alert("Name Field is empty unable to proceed");
			frmregister.txtname.focus()
			return false;
		}
		else if(frmregister.txtfname.value=="")
		{
			alert("Father's Name Field is empty unable to proceed");
			frmregister.txtfname.focus()
			return false;
			
		}
		else if(frmregister.txtcgpa.value=="")
		{
			alert("CGPA Field is empty unable to proceed");
			frmregister.txtcgpa.focus()
			return false;
		}
		else if(frmregister.txtmobile.value=="")
		{
			alert("Mobile Number Field is empty unable to proceed");
			frmregister.txtmobile.focus()
			return false;
		}
		else if(frmregister.txthome.value=="")
		{
			alert("Home Telephone Field is empty unable to proceed");
			frmregister.txthome.focus()
			return false;
		}
		
		else if(frmregister.txtemail.value=="")
		{
			alert("E-Mail Field is empty unable to proceed");
			frmregister.txtemail.focus()
			return false;
		}	
		txt=(frmregister.txtemail.value)
		if (txt.indexOf("@")<2)
		{
			alert("E-Mail you enter is invalid")
			frmregister.txtemail.focus()
			return false;
		}
/*		txt2=(frmregister.txtemail.value)		
		if(txt.indexOf(".")<5)
		{
			alert("Invalid Email Address")
			frmregister.txtemail.focus()
			return false;
		}		*/
		else if(frmregister.txtuser_name.value=="")
		{
			alert("User Name Field is empty unable to proceed");
			frmregister.txtuser_name.focus()
			return false;
		}	

		un_len=(frmregister.txtuser_name.value)
		len=un_len.length
		if(len<3)
		{
		alert("The length of User Name is not less then 3");
		frmregister.txtuser_name.focus()
		return false;
		}

		var illegalChars = /\W/;
		if (illegalChars.test(frmregister.txtuser_name.value)) 
		{
			alert ("Only Characters, Numbers and Underscore is allowed in User Name field");
			frmregister.txtuser_name.focus()
			return false;
		} 
		
		var str;
		str=frmregister.txtuser_name.value;
		if(str.search(/[A-Z]+/) > -1){
		alert("Please enter User Name with Lower Case");
		change_to_lower=str.toLowerCase(); 
		frmregister.txtuser_name.value=change_to_lower;
		frmregister.txtuser_name.focus()
		return false;
		}
		
		else if(frmregister.txtpassword.value=="")
		{
			alert("Password Field is empty unable to proceed");
			frmregister.txtpassword.focus()
			return false;
		}	
			pas=(frmregister.txtpassword.value)
			len=pas.length
			if(len<6)
			{
			alert("your password must be atleast 6 characters long");
			frmregister.txtpassword.value=""
			frmregister.txtre_enter.value=""
			frmregister.txtpassword.focus()
			return false;
			}
		pass1=(frmregister.txtpassword.value)		
		pass2=(frmregister.txtre_enter.value)		
		if(pass1!=pass2)
		{
			alert("Password not match, please try again")
			frmregister.txtpassword.value=""
			frmregister.txtre_enter.value=""
			frmregister.txtpassword.focus()
			return false;
		}		


	}
function auto_user_name_old()
{
var a
a=frmregister.txtreg1.value+"-"+frmregister.txtreg2.value+"-"+document.frmregister.cboreg3[frmregister.cboreg3.selectedIndex].text+"-"+frmregister.txtreg4.value;
frmregister.txtuser_name.value=a
}
function auto_user_name()
{
//var a
//a=frmregister.txtname.value+frmregister.txtreg4.value;

  //var myExp = /\s/g;
  //var myName = a;
  //var myName2 = myName.replace(myExp,"_");
  //var mail_address=frmregister.txtemail;
  //var user=mail_address.toLowerCase();
  var email=txtemail.value;
  change_to_lower=email.toLowerCase(); 
//change_to_lower=myName2.toLowerCase(); 


frmregister.txtuser_name.value=change_to_lower;
}


function fun_open(address)
{

if(frmregister.txtuser_name.value=="")
{
	alert("User Name Field is empty unable to proceed");
	frmregister.txtuser_name.focus()
	return;
}	

un_len=(frmregister.txtuser_name.value)
len=un_len.length
if(len<3)
{
alert("The length of User Name is not less then 3");
frmregister.txtuser_name.focus()
return;
}


var illegalChars = /\W/;
if (illegalChars.test(frmregister.txtuser_name.value)) 
{
	alert ("Only Characters, Numbers and Underscore is allowed in User Name field");
	frmregister.txtuser_name.focus()
	return;
} 

var str;
str=frmregister.txtuser_name.value;
if(str.search(/[A-Z]+/) > -1){
alert("Please enter User Name with Lower Case");
change_to_lower=str.toLowerCase(); 
frmregister.txtuser_name.value=change_to_lower;
frmregister.txtuser_name.focus()
return;
}

var a,address2
a=frmregister.txtuser_name.value;
address2=address+"?"+a
window.open(address2,"mypage","toolbar=no,width=350,height=100")
}

</script>



<link href="../style.css" rel="stylesheet" type="text/css">
<link href="ddmenu.css" rel="stylesheet" type="text/css">
</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" class="table_main">
  <tr>
    <td height="0" colspan="3" align="left" valign="top">
<?php include "../header.php"; ?>
	</td>
  </tr>


  <tr>
    <td colspan="2" align="left" valign="top"> 
<?php include "../../header2.php"; ?>
    </td>
    <td width="12" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="table_left">
<span class="right_bgcolor">
<?php include "left_menu/m1_left.php"; ?>
</span>	</td>
    <td align="left" valign="top"><table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
      <tr>
        <td width="543" height="323" valign="top"><p></p>
           <p align="left" class="rimm_heading"><strong>Membership and Benefits</strong></p>
           <br>
           
<div class="round_div b_gradient" style="height:170px"  >
          <form action="../save/save_request.php" method="post" name="frmregister" onSubmit="return validate()">
<?php 
include "../control/dbcode.php";
include "../control/main.php";
?>      
<br>
<table border="0" align="left" cellpadding="10">
<tr  >
<td width="597"><p class="img_heading">Alumni Registration Request Form     
    </p>  </td>
</tr>

<tr >
  <td height="108" class="left_bgcolor">
   <table width="99%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr >
    <th width="195"  class="fblabel" scope="col"><div align="left" class="fblabel">Registration No*</div></th>
    <th width="345" class="fbinput" scope="col"><div align="left"><span class="b_text">
    <select name="txtreg1" class="b_text" id="txtreg1">
      <option value="1999" selected>1999</option>
      <option value="2000">2000</option>
      <option value="2001">2001</option>
      <option value="2002">2002</option>
      <option value="2003">2003</option>
      <option value="2004">2004</option>
      <option value="2005">2005</option>
      <option value="2006">2006</option>
      <option value="2006">2007</option>
    </select>
    <input name="txtreg2" type="text" class="b_text" id="txtreg2" value="NUST" size="4" maxlength="4" readonly="true">
    <select name="cboreg3" class="b_text" id="select14">
<?php
	$sql_c="select * from class_all order by class_id";
	$result_c=mysql_query($sql_c);
	while($row_c=mysql_fetch_array($result_c))
	{
	echo "<option value=" . $row_c['class_id'] . ">" . $row_c['class_name'] . "</option>";
	}
?>
    </select>
    <input name="txtreg4" type="text" class="b_text" id="txtreg4" size="3" maxlength="3" onBlur="chknum(frmregister.txtreg4)">
</span></div></th>
  </tr>
  <tr >
    <td class="fblabel"><div align="left"><span class="b_text">Name*</span></div></td>
    <td align="left" valign="top" class="fbinput">
	<input name="txtname" type="text"  id="txtname" size="34" onBlur="isAlphabet(frmregister.txtname)">	</td>
  </tr>
  <tr >
    <td class="fblabel">Father's Name*</td>
    <td align="left" valign="top" class="fbinput"><input name="txtfname" type="text"  id="txtfname" size="34" onBlur="isAlphabet(frmregister.txtfname)" ></td>
  </tr>
  <tr >
    <td class="fblabel">Date of Birth*</td>
    <td align="left" valign="top"  class="fbinput">
<?php 
	echo "<select name=cboday1 class=b_text>";
	for($day1=1;$day1<32;$day1+=1) { 
if($day1<10)
	echo"<option value=0$day1>0$day1</option>";
else
	echo"<option value=$day1>$day1</option>";
	}
	echo "</select>";
?>
      <select name="cbomonth1" class="b_text">
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
      </select>
      <?php 
	echo "<select name=cboyear1 class=b_text>";
	for($year1=1960;$year1<1995;$year1+=1) { 
	echo"<option value=$year1>$year1</option>";
	}
	echo "</select>";
?></td>
  </tr>
  <tr >
    <td class="fblabel"> Email Address*</td>
    <td align="left" valign="top" class="fbinput"><input name="txtemail" type="text"  id="txtemail" size="34" onBlur="auto_user_name()"></td>
  </tr>
   <tr  class="fblabel">
    <td colspan="2" class="Marquee_links">Will be used in Alumni Mailing List </td>
  </tr>
  <tr >
    <td class="fblabel"> Mobile Number*</td>
    <td align="left" valign="top" class="fbinput"><input name="txtmobile" type="text" id="txtmobile" size="34" onBlur="chknum(frmregister.txtmobile)"></td>
  </tr>
  <tr >
    <td class="fblabel"> Home Telephone*</td>
    <td align="left" valign="top" class="fbinput"><input name="txthome" type="text"  id="txthome" size="34" onBlur="chknum(frmregister.txthome)"></td>
  </tr>
  <tr >
    <td class="fblabel"> Facebook ID</td>
    <td align="left" valign="top" class="fbinput"><input name="txtfacebook" type="text"  id="txtfacebook" size="34" onBlur="auto_user_name()"></td>
  </tr>

  <tr  class="fblabel">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr >
    <td class="fblabel">Alumni User Name*<br>      </td>
    <td class="fbinput"><span class="fbinput">
      <input name="txtuser_name" type="text"  id="txtuser_name" size="34"  readonly="true">
      <a href="javascript:fun_open('verify.php')" class="b_link">Check Availability</a>
</span></td>
  </tr>
  <tr>
    <td colspan="2"><span class="Marquee_links">Only Character, Numbers and Underscore (_) allowed</span> </td>
    </tr>
  <tr  class="b_text">
    <td class="fblabel">Password*</td>
    <td class="fbinput"><input name="txtpassword" type="password"  id="txtpassword" size="34"></td>
  </tr>
  <tr  class="b_text">
    <td  class="fblabel">Re-Enter Password*</td>
    <td class="fbinput"><input name="txtre_enter" type="password"  id="txtre_enter" size="34"></td>
  </tr>
  <tr  class="fblabel">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr  class="fblabel">
    <td colspan="2"><span class="b_text">* Fields are compulsary</span> </td>
  </tr>
  <tr  class="fblabel">
    <td colspan="2">
      <div align="center">
        <input name="cmdsubmit2" type="submit" class="black_button" id="cmdsubmit22" value="Register">
      </div></td>
    </tr>
</table>
   <p>&nbsp;</p>
   <p>&nbsp;</p></td>
</tr></table>

          </form>

			  
			  <br>
          </p>         </td>
      </tr>
    </table>    
</div>
       			  
			 
          </p>         </td>
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
