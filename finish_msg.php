
<?php
session_start();
$cat = "10";
include_once "control/session.php";
include_once "control/main.php";
include "control/dbcode.php";

?>

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
<?php include_once "header.php"; 
include "control/dbcode.php";
?>

	</td>
  </tr>


  <tr>
    <td colspan="2" align="left" valign="top"> 
<?php include_once "../header2.php"; ?>
    </td>
    <td width="8" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="table_left">
<span class="right_bgcolor">
<?php include_once"control/right.php"; ?>
</span>	</td>
    <td align="left" valign="top"><table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
      <tr>
        <td height="323" valign="top">
		<p>        
		<p><span class="img_heading">Congratulations!</span><br>  
        <p class=msgbox_green><font color=green>
Your request for Alumni Membership Card has been received. You will be contacted via email once your card is ready. In case of any problems in your application, the Alumni Relations Officer will contact you.</font><br>
        </p>	   
        <p class="rimm_heading">Alumni Card Preview</p>
        <table width="350" border="0" cellpadding="10">
          <tr>
            <td>
            
            <?php include "alumni_card/card.php" ?>
            
            </td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p class=b_text><a href="profile_info.php" target="_parent" class="black_button"><font color="white">View Profile</font></a></p>
<br>

<?php

include_once("add_info_part.php");

include("control/phpmailer/PHPMailer_v5.1/class.phpmailer.php");
include ("control/phpmailer/mail_function.php");


$qry_em="select name, year_passing_niit, last_degree_niit, emergency_contact_no,nic1,nic2,nic3 from $database.personal_data where user_id=" . $_SESSION["user_id"];
$result_em=mysql_query($qry_em);
$row_em=mysql_fetch_array($result_em);

$alumni_name=$row_em["name"];
$alumni_degree=$row_em["last_degree_niit"];
$alumni_batch=$row_em["year_passing_niit"];
$alumni_nic=$row_em["nic1"] . "-" . $row_em["nic2"] . "-" . $row_em["nic3"];
$alumni_emergency_contact=$row_em["emergency_contact_no"];
$pic_path=return_title("file_name","$database.pic","user_id",$_SESSION["user_id"]);

$name="Alumni Officer";
$to ="shafaq.soomro@seecs.edu.pk";
//$to ="adnan.rasheed@seecs.edu.pk";

$subject = "Alumni Profile Update";

$msg="<p><font face=Verdana size=2>Dear " . $name . ",</font></p><p><font face=Verdana size=2>";
$msg=$msg . $_SESSION['user_name'] . " Has updated his/her profile, please find the details for his alumni card <br><br>";

$msg=$msg . "Name: " . $alumni_name;
$msg=$msg . "<br>Degree/Batch: " . $alumni_degree . "/" . $alumni_batch;
$msg=$msg . "<br>School: SEECS";
$msg=$msg . "<br>CNIC: " . $alumni_nic;
$msg=$msg . "<br>Emergency Contact No: " . $alumni_emergency_contact;
$msg=$msg . "<br>Picture: " . $pic_path;

$msg=$msg . "</font></p><p><font face=Verdana size=2>Best Regards,<br>Webmaster<br>";
$msg=$msg . "NUST School of Electrical Engineering and Computer Science<br><a href=http://alumni.seecs.nust.edu.pk>http://alumni.seecs.nust.edu.pk</a></font></p>";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To:' .  $to . '  ' . "\r\n";
$headers .= 'From: Webmaster NUST-SEECS <webmaster@seecs.edu.pk>' . "\r\n";
$headers .= 'Cc: adnan.rasheed@seecs.edu.pk' . "\r\n";

$chk= phpmail($to,$subject, $msg);
			if($chk=="")
			{
			//session_unset($_SESSION['form']);
			//session_unset('form');
			//$URL="../msg_request.php?err=0";
			//header ("Location: $URL");
			}
			else
			{
			//session_unset($_SESSION['form']);
			//session_unset('form');
			//$URL="../msg_request.php?err=1";
			//header ("Location: $URL"); 	
			}


$_SESSION['wz']="";
session_unregister('wz');


?>

        

        
        </td>
      </tr>
    </table>    
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">
<span class="b_link"><?php include_once "footer.php" ?>
	</span></td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">
<span class="b_link"><?php include_once "../footerlinks.php"; ?>
	</span></td>
  </tr>
</table>

</body>
</html>
