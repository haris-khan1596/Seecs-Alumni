<?php 
session_start(); 

?>
<html>
<head>
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
		if(frmregister.txtreg1.value=="")
		{
			alert("Registration No Field 1 is empty unable to proceed");
			frmregister.txtreg1.focus()
			return false;
		}
		else if(frmregister.txtreg2.value=="")
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
		
		else if(frmregister.cboday1.value=="" || frmregister.cboday1.value=="selected")
		{
			alert("Day is missing in Date of Birth field unable to proceed");
			frmregister.cboday1.focus()
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
			//alert ("Only Characters, Numbers and Underscore is allowed in User Name field");
			//frmregister.txtuser_name.focus()
			//return false;
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

		if(frmregister.captcha.value=="")
		{
			alert("Please enter Captcha Security Code");
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
  var email=document.frmregister.txtemail.value;
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
	//alert ("Only Characters, Numbers and Underscore is allowed in User Name field");
	//frmregister.txtuser_name.focus()
	//return;
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

<title>:: SEECS Alumni ::</title>
<link href="style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body onLoad="foc()">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="table_main">
  <tr>
    <td height="0" colspan="3" align="left" valign="top" style="background:url(images/bg.jpg); background-repeat:repeat-x;">
<?php include "header.php";



 ?>
	</td>
  </tr>


  <tr>
    <td colspan="2" align="left" valign="top"> 
<?php include "../header2.php"; 

?>
    </td>
    <td width="4" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="table_left">      <?php include "control/right.php";  ?>	</td>
    <td align="left" valign="top"><table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
      <tr>
        <td height="323" valign="top">
         <div class="msgbox_red" id="ajaxDiv" style="visibility:hidden"></div>
        
          <?php if(isset($_SESSION['user_id'])) { 
	        echo "<p class=msgbox_red> You are already logged in, please log out for new user registration</p>";    
         	exit();
		 } 
		 ?>
		  <?php if($_GET['err']==1) { ?>		
            <div class="msgbox_red">The User Name is already registered or in process of registration with NUST-SEECS Alumni, 
            unable to create new Request</div>
		<?php } ?>
        
        
         <?php if($_GET['cap_err']==1) { ?>		
            <div class="msgbox_red">Invalid Captcha security code. Please try again</div>
		<?php } ?>
        
        
		<p class="img_heading"><strong>
		  Membership and Benefits</strong> </p><br>

        
      
        
  
<?php 
include "control/dbcode.php";
include "control/main.php";
?>      
<form action="save/save_request.php" method="POST" name="frmregister" onSubmit="return validate()">
<div class="round_div b_gradient" style="width:80%">
<table width="687" border="0" align="left" cellpadding="10">
<tr  >
<td width="597"><p class="img_heading">Alumni Registration Request Form     
    <br>
    <span class="b_text">* Fields are compulsary</span></p>  </td>
</tr>

<tr >
  <td height="108" class="left_bgcolor">
   <table width="99%"  border="0" cellpadding="0" cellspacing="0">
  <tr >
    <td width="30%"  class="b_text" scope="col"><span class="b_text">Registration No*</span></td>
    <td width="70%" class="fbinput" scope="col">
    <div align="left" style="width:280px"><span class="b_text">
    <select name="txtreg1" class="b_text" id="txtreg1">
      <option value="<?php echo $_SESSION['form']['txtreg1'] ?>" selected><?php echo $_SESSION['form']['txtreg1'] ?></option>
      <option value="1999">1999</option>
      <option value="2000">2000</option>
      <option value="2001">2001</option>
      <option value="2002">2002</option>
      <option value="2003">2003</option>
      <option value="2004">2004</option>
      <option value="2005">2005</option>
      <option value="2006">2006</option>
      <option value="2007">2007</option>
      <option value="2008">2008</option>
      <option value="2009">2009</option>            
    </select>
    <input name="txtreg2" type="text" class="b_text" id="txtreg2" value="NUST" size="4" maxlength="4" readonly="true">
    <select name="cboreg3" class="b_text" id="select14">
<?php
	$sql_c="select * from class_all order by class_id";
	$result_c=mysql_query($sql_c);
	while($row_c=mysql_fetch_array($result_c))
	{
	if ($_SESSION['form']['cboreg3']==$row_c['class_id'])
	echo "<option value=" . $row_c['class_id'] . " selected>" . $row_c['class_name'] . "</option>";
	else
	echo "<option value=" . $row_c['class_id'] . ">" . $row_c['class_name'] . "</option>";
	}

?>
    </select>
    <input name="txtreg4" type="text" class="b_text" id="txtreg4" size="3" maxlength="3" onBlur="chknum(frmregister.txtreg4)" value="<?php echo $_SESSION['form']['txtreg4'] ?>">
</span></div></td>
  </tr>
  <tr >
    <td width="30%" class="b_text">Name*</td>
    <td width="70%" align="left" valign="top" class="fbinput">
	<input name="txtname" type="text"  id="txtname" size="34" onBlur="isAlphabet(frmregister.txtname)" value="<?php echo $_SESSION['form']['txtname'] ?>">	</td>
  </tr>
  <tr >
    <td width="30%" class="b_text">Father's Name*</td>
    <td width="70%" align="left" valign="top" class="fbinput"><input name="txtfname" type="text"  id="txtfname" size="34" onBlur="isAlphabet(frmregister.txtfname)" value="<?php echo $_SESSION['form']['txtfname'] ?>" ></td>
  </tr>
  <tr >
    <td width="30%" class="b_text">Date of Birth*</td>
    <td width="70%" align="left" valign="top"  class="fbinput" style="width:280px">
<?php 
	echo "<select name=cboday1 class=b_text>";
	
	if($_SESSION['form']['cboday1']!="")
	{
	echo "<option value=" . $_SESSION['form']['cboday1'] . " selected>" . $_SESSION['form']['cboday1'] . "</option>";
	}
	
	for($day1=1;$day1<32;$day1+=1) { 
		if($day1<10)
		echo"<option value=0$day1>0$day1</option>";
	else
		echo"<option value=$day1>$day1</option>";
	}
	echo "</select>";
?>
      <select name="cbomonth1" class="b_text">
     
     <?php if($_SESSION['form']['cbomonth1']!="") { ?>
     <option value="<?php echo $_SESSION['form']['cbomonth1'] ?>" selected><?php echo date("F",mktime(0,0,0,$_SESSION['form']['cbomonth1'])) ?></option>
     <?php } ?>
      
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
	echo "<option value=" . $_SESSION['form']['cboyear1'] . " selected>" . $_SESSION['form']['cboyear1'] . "</option>";
	echo "</select>";
?></td>
  </tr>
  <tr >
    <td width="30%" class="b_text"> Email Address*</td>
    <td width="70%" align="left" valign="top" class="fbinput"><input name="txtemail" type="text"  id="txtemail" size="34" onBlur="auto_user_name()" value="<?php echo $_SESSION['form']['txtemail'] ?>"></td>
  </tr>
   <tr  class="b_text">
    <td colspan="2" class="Marquee_links">Will be used in Alumni Mailing List </td>
  </tr>
  <tr >
    <td width="30%" class="b_text"> Mobile Number*</td>
    <td width="70%" align="left" valign="top" class="fbinput"><input name="txtmobile" type="text" id="txtmobile" size="34" onBlur="chknum(frmregister.txtmobile)" value="<?php echo $_SESSION['form']['txtmobile'] ?>"></td>
  </tr>
  <tr >
    <td width="30%" class="b_text"> Home Telephone*</td>
    <td width="70%" align="left" valign="top" class="fbinput"><input name="txthome" type="text"  id="txthome" size="34" onBlur="chknum(frmregister.txthome)" value="<?php echo $_SESSION['form']['txthome'] ?>"></td>
  </tr>
  <tr >
    <td width="30%" class="b_text"> Facebook ID</td>
    <td width="70%" align="left" valign="top" class="fbinput"><input name="txtfacebook" type="text"  id="txtfacebook" size="34" onBlur="auto_user_name()" value="<?php echo $_SESSION['form']['txtfacebook'] ?>"></td>
  </tr>
  <tr >
    <td width="30%" class="b_text">Alumni User Name*</td>
    <td width="70%" class="fbinput"><input name="txtuser_name" type="text"  id="txtuser_name" size="34"  readonly="true" onFocus="auto_user_name()" value="<?php echo $_SESSION['form']['txtuser_name'] ?>">
      <a href="javascript:fun_open('verify.php')" class="b_link">Check Availability</a></td>
  </tr>
  <tr  class="b_text">
    <td width="30%" class="b_text">Password*</td>
    <td width="70%" class="fbinput"><input name="txtpassword" type="password"  id="txtpassword" size="34"></td>
  </tr>
  <tr  class="b_text">
    <td width="30%"  class="b_text">Re-Enter Password*</td>
    <td width="70%" class="fbinput"><input name="txtre_enter" type="password"  id="txtre_enter" size="34"></td>
  </tr>
  <tr  class="b_text">
    <td  class="b_text">&nbsp;</td>
    <td class="fbinput" style="width:300px">
    
    
<!-- Captcha -->

<img src="captcha.php" id="captcha" /><br/>

<!-- CHANGE TEXT LINK -->
<a class="b_link" href="#" onClick="
    document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
    id="change-image">Not readable? Change text.</a><br/><br/>


<input type="text" name="captcha" id="captcha-form" /><br/>
 
    
    </td>
  </tr>
  <tr  class="b_text">
    <td width="30%"  class="b_text">&nbsp;</td>
    <td width="70%" class="fbinput"><br>
      <input name="submit" type="submit" class="black_button" id="submit" value="Register"></td>
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
