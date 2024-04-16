<?php 
ob_start();
session_start(); 
include "control/session.php";
$cat="10" ?>

<html>
<head>
<title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) about NUST-SEECS </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
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
<?php //include "../header2.php"; ?>
    </td>
    <td width="11" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td width="114" align="left" valign="top" class="table_left">
<span class="right_bgcolor">
<?php include "control/right.php"; ?>
</span>	</td>
    <td align="left" valign="top"><table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
      <tr>
        <td valign="top">
		
		<p>
		
<?php		
include "control/dbcode.php";
include "control/main.php";
$sql="select * from personal_data where user_id='" . $_SESSION['user_id'] . "' ";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>
<script language="javascript" src="javascript/validate.js"></script>
<script language="javascript">
function foc()
{
frmpersonal.txtreg1.focus()
}

function chknum(field)
{
  if(isnum(field.value)==false)
  {
  alert("Please enter Numeric Values")
  field.focus()
  return false;
  }
}
</script>
<style type="text/css">
<!--
.style2 {font-size: 10px}
-->
</style>


<?php 
if(isset($_SESSION["wz"]))
{
include "wz_heading.php";
echo "<span class=b_text>The process being followed is that applications for the membership card will be received till the 14th of every month and the Alumni membership cards of all applicants will be ready in approximately 30 working days  from then. The Alumni Relations Office will contact you via email once your card is ready. </span>";
}
?>


<form action="save/save_personal_data.php" method="post" name="frmpersonal" onSubmit="return validate_personal()">
 <div class="round_div b_gradient">
  <table width="95%" border="0" align="center" cellpadding="5">
<tr><td><p class="img_heading">  Personal Information</p>  </td></tr>
<tr><td>

<table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td colspan="2"><span class="b_text">Registration No : *</span></td>
    <td colspan="2"><div align="left"><span class="b_text">
<?php
$reg3=return_title("class_name","class_all","class_id", $row['reg3']);
/*
if(isset($_POST['li_nme']))
$alumni_name= mysql_real_escape_string($_POST['li_nme']);
else
$alumni_name="not found";
*/

$alumni_name=isset($_POST['li_nme']) ? mysql_real_escape_string($_POST['li_nme']) : $row["name"] ;
$alumni_dob =isset($_POST['li_dob']) ? mysql_real_escape_string($_POST['li_dob']) : show_date($row["dob"],"ddmmyyyy") ;
$alumni_address =isset($_POST['li_addrs']) ? mysql_real_escape_string($_POST['li_addrs']) : $row["address"] ;
$alumni_phone =isset($_POST['li_phone']) ? mysql_real_escape_string($_POST['li_phone']) : $row["mob"] ;
$alumni_country =isset($_POST['li_loc']) ? mysql_real_escape_string($_POST['li_loc']) : $row["country"] ;
$alumni_company =isset($_POST['li_jCompany']) ? mysql_real_escape_string($_POST['li_jCompany']) : $row["job_company_name"] ;
$alumni_jobtitle =isset($_POST['li_jTitle']) ? mysql_real_escape_string($_POST['li_jTitle']) : $row["job_title"] ;
$alumni_facebook =isset($_POST['li_facebook']) ? mysql_real_escape_string($_POST['li_facebook']) : $row["facebook"] ;
$alumni_skype =isset($_POST['li_skype']) ? mysql_real_escape_string($_POST['li_skype']) : $row["skype"] ;
$alumni_twitter =isset($_POST['li_twitter']) ? mysql_real_escape_string($_POST['li_twitter']) : $row["twitter"] ;
$alumni_job_industry =isset($_POST['li_jIndustry']) ? mysql_real_escape_string($_POST['li_jIndustry']) : $row["job_company_industry"] ;
$alumni_job_summary =isset($_POST['li_jSummary']) ? mysql_real_escape_string($_POST['li_jSummary']) : $row["job_summary"] ;
$alumni_job_startdate =isset($_POST['li_jSdate']) ? mysql_real_escape_string($_POST['li_jSdate']) : $row["job_startdate"] ;
$alumni_job_url =isset($_POST['txtjob_url']) ? mysql_real_escape_string($_POST['txtjob_url']) : $row["job_url"] ;

//echo $alumni_name;
//exit;

?>

      <input name="txtreg1" type="text" class="b_text" id="txtreg1" size="4" maxlength="4" onBlur="chknum(frmpersonal.txtreg1)" value="<?php echo $row["reg1"] ?>" >
      <input name="txtreg2" type="text" class="b_text" id="txtreg2" size="4" maxlength="4" value="<?php echo $row["reg2"] ?>" r>
      <input name="txtreg3" type="text" class="b_text" id="txtreg3" size="10" maxlength="4" value="<?php echo $reg3 ?>" >
	  <input type="hidden" name="reg3_id" value="<?php echo $row["reg3"] ?>">
      <input name="txtreg4" type="text" class="b_text" id="txtreg4" size="4" maxlength="4" onBlur="chknum(frmpersonal.txtreg4)" value="<?php echo $row["reg4"] ?>" >
    </span></div></td>
  </tr>
  <tr>
    <td colspan="2"><span class="b_text">Name: *</span></td>
    <td colspan="2" align="left" valign="top" class="b_text">
    <input name="txtname" type="text" class="b_text" id="txtname" size="40" value="<?php echo $alumni_name ?>" >    </td>
  </tr>
  <tr>
    <td colspan="2"><span class="b_text">Father Name: *</span></td>
    <td colspan="2" align="left" valign="top" class="b_text"><input name="txtfname" type="text" class="b_text" id="txtfname" size="40" value="<?php echo $row["fname"] ?>"></td>
  </tr>
  <tr >
    <td colspan="2"><span class="b_text">Date of Birth: *</span></td>
    <td colspan="2" align="left" valign="top" class="b_text"><span class="b_text">
      <input name="txtdob" type="text" class="b_text" id="txtdob5" size="15" maxlength="10" value="<?php echo $alumni_dob ?>" >
  (DD-MM-YYYY)</span></td>
  </tr>
  
  <!--
  <tr >
    <td width="14%" rowspan="2" class="b_text">Nationality</td>
    <td width="14%" class="b_text">By Birth </td>
    <td colspan="2" align="left" valign="top" class="b_text"><input name="txtnationalitybb" type="text" class="b_text" id="txtnationalitybb" size="40" value="<?php echo $row["nationality_b"] ?>"></td>
  </tr>
  <tr bordercolor="#CCCCCC">
    <td width="14%" class="b_text">Present *</td>
    <td colspan="2" align="left" valign="top" class="b_text"><input name="txtnationality_p" type="text" class="b_text" id="txtname4" size="40" value="<?php echo $row["nationality_p"] ?>"></td>
  </tr>
  -->
  
  
  <tr >
    <td colspan="2"><span class="b_text">Gender: * </span></td>
    <td colspan="2" align="left" valign="top" class="b_text">

<select name="cbogender" class="b_text" id="select4" style="width:80" >
 <?php
	if($row["gender"]=="Male"  or $row["Gender"]=="")
    echo "<option selected value=Male>Male</option>";
	else
	echo "<option value=Male>Male</option>";

	if($row["gender"]=="Female")
    echo "<option selected value=Female>Female</option>";
	else
	echo "<option value=Female>Female</option>";
 ?>
</select></td>
  </tr>
  <tr>
    <td colspan="2" class="b_text">Blood Group: * </td>
    <td colspan="2" align="left" valign="top" class="b_text"><input name="txtblood_group" type="text" class="b_text" id="txtblood_group" value="<?php echo $row["blood_group"] ?>" size="7" maxlength="7"> For Blood Donation Purpose </td>
  </tr>
  <tr >
    <td colspan="2"><span class="b_text">Marital Status: * </span></td>
    <td colspan="2" align="left" valign="top" class="b_text">
<select name="cbomarital" class="b_text" id="cbomarital" style="width:80">
  <?php
	if($row["marital_status"]=="Single"  or $row["marital_status"]=="")
    echo "<option selected value=Single>Single</option>";
	else
	echo "<option value=Single>Single</option>";

	if($row["marital_status"]=="Married")
	echo  "<option value=Married selected>Married</option>";
	else
	echo  "<option value=Married>Married</option>";	
  ?>
</select></td>
  </tr>
  <tr >
    <td colspan="2"><span class="b_text">NIC No:</span></td>
    <td colspan="2" align="left" valign="top" class="b_text"><span class="b_text">
      <input name="txtnic1" type="text" class="b_text" id="txtnic1" value="<?php echo $row["nic1"] ?>" size="5" maxlength="5" onBlur="chknum(frmpersonal.txtnic1)">
      <input name="txtnic2" type="text" class="b_text" id="txtnic2" value="<?php echo $row["nic2"] ?>" size="7" maxlength="7" onBlur="chknum(frmpersonal.txtnic2)">
      <input name="txtnic3" type="text" class="b_text" id="txtnic3" value="<?php echo $row["nic3"] ?>" size="1" maxlength="1" onBlur="chknum(frmpersonal.txtnic3)">
    </span> For Alumni Card </td>
  </tr>
  <tr >
  </tr>
  <tr >
    <td colspan="3" class="b_text">Year of passing from <br>
      NIIT/SEECS: *</td>
    <td width="63%" class="b_text"><input name="txtyear_passing_niit" type="text" class="b_text" id="txtyear_passing_niit" size="4" maxlength="4" onBlur="chknum(frmpersonal.txtyear_passing_niit)" value="<?php echo $row["year_passing_niit"] ?>">
      <span class="style2">(YYYY) </span></td>
  </tr>
  <tr >
    <td colspan="3" class="b_text">Last Degree Passed from <br>
      NIIT/SEECS: *</td>
    <td class="b_text"><input name="txtlast_degree_niit" type="text" class="b_text" id="txtlast_degree_niit" size="15" maxlength="15" value="<?php echo $row["last_degree_niit"] ?>">e.g. BIT, BICSE, BEE etc</td>
  </tr>
  <tr >
    <td colspan="4" class="b_text">&nbsp;</td>
  </tr>
  <tr >
    <td colspan="4"><hr></td>
  </tr>
  <tr >
    <td colspan="4" class="b_heading">Contact Information</td>
  </tr>
  <tr >
    <td colspan="2" align="left" valign="top" class="b_text">Address *</td>
    <td colspan="2" align="left" valign="top"><span class="b_text">
      <textarea name="txtaddress" cols="37" rows="3" class="b_text" id="textarea2"><?php echo $alumni_address ?></textarea>
    </span></td>
  </tr>
  <tr >
    <td colspan="2" class="b_text">City *</td>
    <td colspan="2"><span class="b_text">
      <input name="txtcity" type="text" class="b_text" id="txtcity" size="20" maxlength="50" value="<?php echo $row["city"] ?>">
    </span></td>
  </tr>
  <tr >
    <td colspan="2" class="b_text">Country: *</td>
    <td colspan="2"><span class="b_text">
      <input name="txtcountry" type="text" class="b_text" id="txtcountry" size="20" maxlength="50" value="<?php echo $row["country"] ?>">
    </span></td>
  </tr>
  <tr >
    <td colspan="2" class="b_text">Phone *</td>
    <td colspan="2"><span class="b_text">
      <input name="txtph" type="text" class="b_text" id="txtph" size="20" maxlength="50" value="<?php echo $row["ph"] ?>">
    </span></td>
  </tr>
  <tr >
    <td colspan="2" class="b_text"><p>Emergency Contact number *<br>
    </p></td>
    <td colspan="2"><span class="b_text">
      <input name="txtemergency_contact_no" type="text" class="b_text" id="emergency_contact_no" size="20" maxlength="50" value="<?php echo $row["emergency_contact_no"] ?>">
    For Alumni Card</span></td>
  </tr>
  <tr >
    <td colspan="2" class="b_text">Mobile No: *</td>
    <td colspan="2"><span class="b_text">
      <input name="txtmob" type="text" class="b_text" id="txtmob2" size="20" maxlength="50" value="<?php echo $alumni_phone ?>">
    </span></td>
  </tr>
  <tr >
    <td colspan="2" class="b_text">Facebook: *</td>
    <td colspan="2"><span class="b_text">
      <input name="txtfacebook" type="text" class="b_text" id="txtfacebook" size="20" maxlength="50" value="<?php echo $alumni_facebook ?>">
    </span></td>
  </tr>
    <tr >
    <td colspan="2" class="b_text">Skype:</td>
    <td colspan="2"><span class="b_text">
      <input name="txtskype" type="text" class="b_text" id="txtskype" size="20" maxlength="50" value="<?php echo $alumni_skype ?>">
    </span></td>
  </tr>
  <tr >
    <td colspan="2" class="b_text">Twitter:</td>
    <td colspan="2"><span class="b_text">
      <input name="txttwitter" type="text" class="b_text" id="txttwitter" size="20" maxlength="50" value="<?php echo $alumni_twitter ?>">
    </span></td>
  </tr>
  

  <tr >
    <td colspan="2" align="left" valign="middle" class="b_text"><span class="style1"> E-Mail</span></td>
    <td colspan="2"><span class="b_text">
      <input name="txtemail2" type="text" class="b_text" id="txtemail222" size="40" maxlength="50" value="<?php echo $row["sec_email"] ?>">
    </span></td>
  </tr>
  <tr valign="middle" >
    <td height="23" class="b_text">&nbsp; </td>
    <td height="23" class="b_text">&nbsp;</td>
    <td height="23" colspan="2" class="b_text">
	<?php
	if($row["address_open"]==1)
	echo "<input name=chkpublic type=checkbox id=chkpublic2 value=1 checked>";
	else
	echo "<input name=chkpublic type=checkbox id=chkpublic2 value=1>";
	?> 

	
Keep my email address publicly available</td>
  </tr>
  <tr >
    <td colspan="4" class="b_heading">&nbsp;</td>
  </tr>
    <tr >
    <td colspan="4" class="b_heading"><hr></td>
    </tr>
  <tr >
    <td colspan="4" class="b_heading"><p><a name="job_detail"></a>Current Work Details<br>
        </p>
      </td>
    </tr>
  <tr  class="b_text">
    <td colspan="2">Work Status:</td>
    <td colspan="2">
    
<?php if($row["job_status"]=="job") { ?>
      <input type="radio" name="rdo_job_status" id="rdo_job_status_job" value="job" checked>On Job 
<?php } else { ?>
      <input type="radio" name="rdo_job_status" id="rdo_job_status_job" value="job">On Job 
<?php } ?>            
      
<?php if($row["job_status"]=="business") { ?>
      <input type="radio" name="rdo_job_status" id="rdo_job_status_business" value="business" checked>Doing Business
<?php } else { ?>
      <input type="radio" name="rdo_job_status" id="rdo_job_status_business" value="business">Doing Business
<?php } ?>            

<?php if($row["job_status"]=="nothing") { ?>
       <input type="radio" name="rdo_job_status" id="rdo_job_status_nothing" value="nothing" checked>Not pursuing Job or Business</td>
<?php } else { ?>
       <input type="radio" name="rdo_job_status" id="rdo_job_status_nothing" value="nothing">Not pursuing Job or Business</td>
<?php } ?>            
      
      
  </tr>
  <tr  class="b_text">
    <td colspan="2">Company Name:</td>
    <td colspan="2" align="right"><div align="left">
      <input name="txtcompany_name" type="text" class="b_text" id="txtcompany_name" size="40" maxlength="200" value="<?php echo $alumni_company ?>">
    </div></td>
  </tr>
  <tr  class="b_text">
    <td colspan="2">Job Title:</td>
    <td colspan="2" align="right"><div align="left">
      <input name="txtjob_title" type="text" class="b_text" id="txtjob_title" size="40" maxlength="50" value="<?php echo $alumni_jobtitle ?>">
    </div></td>
  </tr>
  
  <tr  class="b_text">
    <td colspan="2">Industry:</td>
    <td colspan="2" align="right"><div align="left">
      <input name="txtjob_industry" type="text" class="b_text" id="txtjob_industry" size="40" maxlength="50" value="<?php echo $alumni_job_industry ?>">
    </div></td>
  </tr>
  <tr  class="b_text">
    <td colspan="2">Job Summary or Buniness Profile:</td>
    <td colspan="2" align="right"><div align="left">
      <input name="txtjob_summary" type="text" class="b_text" id="txtjob_summary" size="40" maxlength="50" value="<?php echo $alumni_job_summary ?>">
    </div></td>
  </tr>
  <tr  class="b_text">
    <td colspan="2">Start Date: <br>
      <span class="Marquee_links">      (Day-Month-Year)</span></td>
    <td colspan="2" align="right"><div align="left">
      <input name="txtjob_startdate" type="text" class="b_text" id="txtjob_startdate" size="40" maxlength="50" value="<?php echo show_date($alumni_job_startdate,"dd-mmm-yyyy") ?>">
    </div></td>
  </tr>
  
  
  
  

  <tr >
    <td colspan="2" class="b_text">Web Address:</td>
    <td colspan="2"><input name="txtjob_url" type="text" class="b_text" id="txtjob_url" size="40" maxlength="50" value="<?php echo $alumni_job_url ?>"></td>
  </tr>
  <tr >
    <td colspan="2">&nbsp;</td>
    <td colspan="2" align="right">
    <?php if($_SESSION["wz"]=="1") 
	{include "wz_links.php";}
	else
	{
	?>
    <input name="cmdsubmit2" type="submit" class="black_button" id="cmdsubmit2" value="Update">            
	<?php } ?>    </td>
  </tr>
</table></td>
</tr></table>
</div>
</form>
        
		</p>         
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
