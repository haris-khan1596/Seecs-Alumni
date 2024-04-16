<?php 
	session_start(); 
?>
<html>
<head>



<script language="javascript" type="text/javascript">


function validate_pop()
{

	if(frmget_reg.txtpop_name.value=="")
	{
		alert("Pleaes enter your name");
		frmget_reg.txtpop_name.focus();
		return false;
	}
	if (frmget_reg.txtpop_year.value.length == "")
		{
			alert("Please enter your Year of Graduation");
			frmget_reg.txtpop_year.focus();
			return false
		}
		if (frmget_reg.txtpop_dicipline.value.length == "")
		{
			alert("Please enter your Discipline (BIT, BICSE)");
			frmget_reg.txtpop_dicipline.focus();
			return false
		}
		if (frmget_reg.txtpop_degree.value.length == "")
		{
			alert("Please enter your Degree (MS, PhD, UG)");
			frmget_reg.txtpop_degree.focus();
			return false
		}
		if (frmget_reg.txtpop_contact.value.length == "")
		{
			alert("Please enter your Contact No");
			frmget_reg.txtpop_contact.focus();
			return false
		}
		if (frmget_reg.txtpop_email.value.length == "")
		{
			alert("Please enter your Email");
			frmget_reg.txtpop_email.focus();
			return false
		}
		  ///////////// Email Address Checker /////////////
  
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var address = frmget_reg.txtpop_email.value;
     if(reg.test(address) == false) {
 
      alert('Invalid email address');
	  frmget_reg.txtpop_email.focus();
      return false;
   }
  /////////////////////////////////////////////////  
		
	return true;		
}


</script>
        

<style>

.msgbox_ok
{
background: url(images/icons/ok.png) no-repeat scroll 8px 5px;
padding:5px 5px 5px 30px;
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 11px;
width:auto
}	

.msgbox_error
{
background: url(images/icons/error.png) no-repeat scroll 8px 5px; 
padding:5px 5px 5px 30px;
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 11px;
width:auto;
}	

</style>


<script language="javascript" src="ajax/ajax_user_chk.js"> </script>

<!-- Concate Registeration No and Calling Ajax (  onClick="ajax_user_chk(this.value)"   ) -->
<script type="text/javascript" language="javascript">



	function getregno()
	{
		var regno1 = document.getElementById("txtreg1").value;
		var regno2 = document.getElementById("txtreg2").value;

        // Getting Selected Text Name from dropdown Select option
		var domNode = document.getElementById("select14");
		var value = domNode.selectedIndex;
		var selected_text = domNode.options[value].text;

		var regno4 = document.getElementById("txtreg4").value;
		
		var regno = regno1.concat("-",regno2,"-",selected_text,"-",regno4);
		
		//alert(regno);
		if(regno4.length>0)
		{
		ajax_user_chk(regno);
		}
		
		return true;	
	}
</script>


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
document.getElementById("txtreg4").value="";
frmregister.txtreg4.value="";
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
		
		
		else if(document.getElementById("div_reg_user_chk").innerHTML!='<div class="marquee msgbox_ok">Registration Number validated</div>')
		{
			alert("Invalid Registration Number");
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
        <td height="323" valign="top"><p class="img_heading">Forgot Registration Number<br>
          
           </p>
           <?php if($_GET['cap_err']==1) { ?>		
            <div class="msgbox_red">Invalid Captcha security code. Please try again</div>
		<?php } ?>
        
          <form id="frmget_reg" method="post" action="req_email.php" onSubmit="return validate_pop()">
                    
                    <table width="100%" cellpadding="5" cellspacing="0" class="b_text">
						<tr>
							<td width="147">Name</td>
							<td width="575">
								<div class="titlebarLeftc">
								<div class="titlebarRightc">
								<div class="titlebar" style="width:250px;">
                                <input name="txtpop_name" type="text" value="" id="txtpop_name"  class="fbinput" />
								</div>
								</div>
								</div>						  </td>
						</tr>

                        
                        <tr>
							<td>Year of Graduation</td>
							<td width="575">
								<div class="titlebarLeftc">
								<div class="titlebarRightc">
								<div class="titlebar" style="width:250px;">
                                <input name="txtpop_year" type="text" value="" id="txtpop_year"  class="fbinput" />
								</div>
								</div>
								</div>						  </td>
						</tr>
                        
                         <tr>
							<td>Discipline (BIT, BICSE)</td>
							<td width="575">
								<div class="titlebarLeftc">
								<div class="titlebarRightc">
								<div class="titlebar" style="width:250px;">
                                <input name="txtpop_dicipline" type="text" value="" id="txtpop_dicipline"  class="fbinput" />
								</div>
								</div>
								</div>						   </td>
                      </tr>
                            
                          <tr>
							<td>Degree (MS, PhD, UG)</td>
							<td width="575">
								<div class="titlebarLeftc">
								<div class="titlebarRightc">
								<div class="titlebar" style="width:250px;">
                                <input name="txtpop_degree" type="text" value="" id="txtpop_degree"  class="fbinput" />
								</div>
								</div>
								</div>							</td>
						</tr>
						
                           <tr>
							<td>Contact No</td>
							<td width="575">
								<div class="titlebarLeftc">
								<div class="titlebarRightc">
								<div class="titlebar" style="width:250px;">
                                <input name="txtpop_contact" type="text" value="" id="txtpop_contact"  class="fbinput" />
								</div>
								</div>
								</div>							</td>
						</tr>
                        
                        <tr>
							<td>Email</td>
							<td width="575">
								<div class="titlebarLeftc">
								<div class="titlebarRightc">
								<div class="titlebar" style="width:250px;">
                                <input name="txtpop_email" type="text" value="" id="txtpop_email"  class="fbinput" />
								</div>
								</div>
								</div>						  </td>
						</tr>
						<tr>
							<td colspan="2">Message (If any)</td>
						</tr>
                    
                    	<tr>
	                    <td colspan="2">
								<textarea name="txtpop_msg" cols="55" rows="5" id="txtpop_msg"></textarea>							</td>
                    	</tr>
                    	<tr>
                    	  <td colspan="2">
                          
                          <img src="captcha.php" id="captcha" /><br/>

<!-- CHANGE TEXT LINK -->
<a class="b_link" href="#" onClick="
    document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
    id="change-image">Not readable? Change text.</a><br/><br/>


<input type="text" name="captcha" id="captcha-form" /><br/>
 
                          
                          </td>
                  	  </tr>
                    </table>
		<br />

							<input name="regsubmit" id="regsubmit" type="submit" value="Submit" class="black_button" style="cursor:pointer"  />
							<input type="button" value="Reset" class="black_button"  style="cursor:pointer" />
</form>
          
          
     </td>
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
