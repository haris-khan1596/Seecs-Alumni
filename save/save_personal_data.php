<?php 
ob_start();
session_start(); 
include "../control/session.php";
include "../control/dbcode.php";
include "../control/main.php";

//--------------------------------------------

$autonum=autonum("personal_data","autonum");

$user_id=$_SESSION['user_id'];

$reg1=$_POST['txtreg1'];
$reg2=$_POST['txtreg2'];
$reg3=$_POST['reg3_id'];
$reg4=$_POST['txtreg4'];

$name=mysql_real_escape_string($_POST['txtname']);
$fname=mysql_real_escape_string($_POST['txtfname']);
$dob=save_date($_POST['txtdob']);
$nationality_b=$_POST['txtnationalitybb'];
$nationality_p=$_POST['txtnationality_p'];
$gender=$_POST['cbogender'];
$blood_group=$_POST['txtblood_group'];
$marital_status=$_POST['cbomarital'];

$nic1=$_POST['txtnic1'];
$nic2=$_POST['txtnic2'];
$nic3=$_POST['txtnic3'];

$year_passing_niit=$_POST['txtyear_passing_niit'];
$last_degree_niit=$_POST['txtlast_degree_niit'];
$current_status=trim($_POST['cbostatus']);

$address=mysql_real_escape_string($_POST['txtaddress']);
$city=$_POST['txtcity'];
$country=$_POST['txtcountry'];
$ph=$_POST['txtph'];
$emergency_contact_no=$_POST['txtemergency_contact_no'];
$mob=$_POST['txtmob'];
$fax=$_POST['txtfax'];
$email2=$_POST['txtemail2'];

$skype=$_POST['txtskype'];
$twitter=$_POST['txttwitter'];
$facebook=$_POST['txtfacebook'];





$address_open=$_POST['chkpublic'];

$job_status=$_POST['rdo_job_status'];
$company_name=$_POST['txtcompany_name'];
$company_job_title=$_POST['txtjob_title'];
$company_job_address=mysql_real_escape_string($_POST['txtjob_address']);
$company_job_postalcode=$_POST['txtjob_postalcode'];
$company_city=$_POST['txtjob_city'];
$company_country=$_POST['txtjob_country'];
$company_ph=$_POST['txtjob_ph'];
$company_fax=$_POST['txtjob_fax'];
$company_email=$_POST['txtjob_email'];
$company_url=$_POST['txtjob_url'];

$company_industry=$_POST['txtjob_industry'];
$company_job_summary=$_POST['txtjob_summary'];
$company_job_start_date=save_date($_POST['txtjob_startdate']);

//-----------------------------------------------------------------

//mysql_query("delete from personal_data where user_id='" . $user_id . "' ");
/*
     $sql = "Insert into personal_data ";
//$sql=$sql . "(sid,autonum,post,name,fname,nationality_b,nationality_p,marital_status,medical_fitness,religion_dob,pob,nic,date_to_join_nust,political_affiliation,passport_no,p_doi,p_poi,valid_upto,pre_apply_nust,apply_detail,pre_selected,selected_detail,choice_of_college_1,choice_of_college_2,choice_of_college_3,choice_of_college_4) "; 
$sql=$sql . "values(" . $autonum . ",'" . $user_id . "','" . $reg1 . "','" . $reg2 . "'," . $reg3 . ",'" . $reg4 . "','" . $name . "','" . $fname . "','" . $dob . "','" . $gender . "','" . $blood_group . "', ";
$sql=$sql . " '" . $nationality_b . "','" . $nationality_p . "','" . $marital_status . "', ";
$sql=$sql . " '" . $year_passing_niit . "','" . $last_degree_niit . "','" . $nic1 . "','" . $nic2 . "','" . $nic3 . "','" . $current_status . "','" . $address . "','" . $city . "','" . $country . "','" . $ph . "', ";
$sql=$sql . " '" . $mob . "','" . $fax . "','" . $email2 . "' ,'".$skype."','".$twitter."','" . $address_open . "','" . $company_name . "','" . $company_job_title . "','".$company_industry."','".$company_job_summary."','".$company_job_start_date."','" . $company_job_address . "','" . $company_job_postalcode . "','" . $company_city . "','" . $company_country . "','" . $company_ph . "','" . $company_fax . "','" . $company_email . "','" . $company_url . "','" . date("Y-m-d") . "','" . date("Hi") . "')";
*/

$sql = "Update personal_data SET ";
$sql=$sql."reg1='" . $reg1 . "',reg2='".$reg2."',reg3='".$reg3."',reg4='".$reg4."',name='".$name."',fname='".$fname."',dob='".$dob."',gender='".$gender."',blood_group='".$blood_group."' ";
$sql=$sql.",marital_status='".$marital_status."',year_passing_niit='".$year_passing_niit."',last_degree_niit='".$last_degree_niit."',nic1='".$nic1."',nic2='".$nic2."',nic3='".$nic3."'  ";
$sql=$sql.",status='".$current_status."',address='".$address."',city='".$city."',country='".$country."',ph='".$ph."',emergency_contact_no='" . $emergency_contact_no . "',mob='".$mob."',sec_email='".$email2."',facebook='".$facebook."',skype='".$skype."',twitter='".$twitter."',address_open='".$address_open."',job_status='".$job_status."',job_company_name='".$company_name."',job_title='".$company_job_title."',job_company_industry='".$company_industry."' ";
$sql=$sql.",job_summary='".$company_job_summary."',job_url='".$company_url."',job_startdate='". $company_job_start_date ."',entry_date='".date("Y-m-d")."',entry_time='".date("Hi")."' WHERE user_id='".$user_id."' ";


$chk=mysql_query($sql);

//echo mysql_error();
//exit;

if ($chk==1)
	if($_SESSION["wz"]=="1")
	$URL="../pic.php";
	else	
	$URL="../profile_info.php?chk=ok";
else
$URL="../profile_info.php?chk=failed";

header ("Location: $URL");

?>