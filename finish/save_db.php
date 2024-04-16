<?php 
ob_start();
session_start(); 
session_id();
include "links.php" ;
include "../control/dbcode_temp.php";
include "../control/main.php";
//--------------------------------------------
?>
<link href="../style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 5px;
	margin-top: 5px;
}
.style3 {font-size: 8px}
.style9 {font-size: 10px}
-->
</style>
<?php
$sid=session_id();
include "delete_before_save.php";
$ano=autonum("p_personal_data","ano");

//-----------------------------------SAVE PERSONAL DATA-----------------------------------
$sql="select * from personal_data where sid='" . $sid . "' ";
$result=mysql_query($sql);
if(mysql_affected_rows()!=0)
{
$row=mysql_fetch_array($result);

$name=$row["name"];
$post=$row["post"];

$autonum_personal=autonum("p_personal_data","autonum");
     $sql = "Insert into p_personal_data ";
$sql=$sql . "values(" . $ano . ",'" . $sid . "'," . $autonum_personal . ",'" . $row["post"] . "','" . $row["name"] . "','" . $row["fname"] . "','" . $row["nationality_b"] . "', ";
$sql=$sql . " '" . $row["nationality_p"] . "','" . $row["marital_status"] . "','" . $row["medical_fitness"] . "','" . $row["religion"] . "','" . $row["dob"] . "','" . $row["pob"] . "', ";
$sql=$sql . " '" . $row["nic1"] . "','" . $row["nic2"] . "','" . $row["nic3"] . "','" . $row["date_to_join_nust"] . "','" . $row["political_affiliation"] . "','" . $row["political_detail"] . "','" . $row["passport_no"] . "','" . $row["p_doi"] . "','" . $row["p_poi"] . "', ";
$sql=$sql . " '" . $row["valid_upto"] . "','" . $row["pre_apply_nust"] . "','" . $row["apply_detail"] . "','" . $row["pre_selected"] . "','" . $row["selected_detail"] . "', ";
$sql=$sql . " '" . $row["choice_of_college_1"] . "','" . $row["choice_of_college_2"] . "','" . $row["choice_of_college_3"] . "','" . $row["choice_of_college_4"] . "','" . date("Y-m-d") . "','" . date("Hi") . "')";

mysql_query($sql);
}// end if

//-----------------------------------END PERSONAL -----------------------------------


//-----------------------------------SAVE EMPLOYMENT DATA-----------------------------------

$sql="select * from emp_detail where sid='" . $sid . "' ";
$result=mysql_query($sql);
if(mysql_affected_rows()!=0)
{
while($row=mysql_fetch_array($result))
{
$autonum_emp=autonum("p_emp_detail","autonum");

     $sql = "Insert into p_emp_detail ";
$sql=$sql . "values(" . $autonum_emp . "," . $ano . ",'" . $sid . "','" . $row["name_org"] . "','" . $row["designation"] . "','" . $row["duration_from"] . "','" . $row["duration_to"] . "','" . $row["location"] . "' )";

mysql_query($sql);

}// wend
}// end if

//-----------------------------------END EMP -----------------------------------

//------------------------------SAVE FAMILY DATA-----------------------------------

$sql="select * from family_detail where sid='" . $sid . "' ";
$result=mysql_query($sql);
if(mysql_affected_rows()!=0)
{
while($row=mysql_fetch_array($result))
{
$autonum_family=autonum("p_family_detail","autonum");

     $sql = "Insert into p_family_detail ";
$sql=$sql . "values(" . $ano . ",'" . $sid . "'," . $autonum_family . ",'" . $row["name"] . "','" . $row["relation"] . "'," . $row["age"] . ",'" . $row["nationality_b"] . "','" . $row["nationality_p"] . "' )";

mysql_query($sql);

}// wend
}// end if

//-----------------------------------END FAMILY -----------------------------------

//------------------------------SAVE ACADEMIC AWARDS-----------------------------------

$sql="select * from academic_awards where sid='" . $sid . "' ";
$result=mysql_query($sql);
if(mysql_affected_rows()!=0)
{
while($row=mysql_fetch_array($result))
{
$autonum_aw=autonum("p_academic_awards","autonum");

     $sql = "Insert into p_academic_awards ";
$sql=$sql . "values(" . $autonum_aw . "," . $ano . ",'" . $sid . "','" . $row["detail"] . "')";

mysql_query($sql);

}// wend
}// end if

//-----------------------------------END ACADEMIC AWARDS-----------------------------------


//------------------------------SAVE ACADEMIC DETAIL-----------------------------------

$sql="select * from academic_detail where sid='" . $sid . "' ";
$result=mysql_query($sql);
if(mysql_affected_rows()!=0)
{
while($row=mysql_fetch_array($result))
{
$autonum_ad=autonum("p_academic_detail","autonum");

   $sql = "Insert into p_academic_detail ";
$sql=$sql . "values(" . $autonum_ad . ",'" . $ano . "','" . $sid . "','" . $row["degree"] . "','" . $row["degree_equal"] . "','" . $row["duration_from"] . "','" . $row["duration_to"] . "','" . $row["gpa"] . "','" . $row["major"] . "','" . $row["university"] . "' )";

mysql_query($sql);

}// wend
}// end if

//------------------------------END ACADEMIC DETAIL-----------------------------------

//------------------------------SAVE TEACHING EXPERIENCE-----------------------------------

$sql="select * from teaching_experience where sid='" . $sid . "' ";
$result=mysql_query($sql);
if(mysql_affected_rows()!=0)
{
while($row=mysql_fetch_array($result))
{
$autonum_teaching=autonum("p_teaching_experience","autonum");

	 $sql = "Insert into p_teaching_experience ";
$sql=$sql . "values(" . $autonum_teaching . "," . $ano . ",'" . $sid . "','" . $row["after_degree"] . "','" . $row["post"] . "','" . $row["duration_from"] . "','" . $row["duration_to"] . "','" . $row["university"] . "' )";

mysql_query($sql);

}// wend
}// end if

//------------------------------END TEACHING-----------------------------------

//------------------------------SAVE RESEARCH EXPERIENCE-----------------------------------

$sql="select * from research_experience where sid='" . $sid . "' ";
$result=mysql_query($sql);
if(mysql_affected_rows()!=0)
{
while($row=mysql_fetch_array($result))
{
$autonum_research=autonum("p_research_experience","autonum");

	 $sql = "Insert into p_research_experience ";
$sql=$sql . "values(" . $autonum_research . "," . $ano . ",'" . $sid . "','" . $row["after_degree"] . "','" . $row["post"] . "','" . $row["duration_from"] . "','" . $row["duration_to"] . "','" . $row["university"] . "' )";

mysql_query($sql);

}// wend
}// end if

//------------------------------END RESEARCH-----------------------------------


//------------------------------SAVE THESIS-----------------------------------

$sql="select * from thesis where sid='" . $sid . "' ";
$result=mysql_query($sql);
if(mysql_affected_rows()!=0)
{
while($row=mysql_fetch_array($result))
{
$autonum_thesis=autonum("p_thesis","autonum");

	 $sql = "Insert into p_thesis ";
$sql=$sql . "values(" . $autonum_thesis . "," . $ano . ",'" . $sid . "','" . $row["during_degree"] . "','" . $row["topic"] . "','" . $row["specialty"] . "')";

mysql_query($sql);

}// wend
}// end if

//------------------------------END THESIS-----------------------------------

//------------------------------SAVE References-----------------------------------

$sql="select * from reference_detail where sid='" . $sid . "' ";
$result=mysql_query($sql);
if(mysql_affected_rows()!=0)
{
while($row=mysql_fetch_array($result))
{
$autonum_ref=autonum("p_reference_detail","autonum");

     $sql = "Insert into p_reference_detail ";
$sql=$sql . "values(" . $autonum_ref . "," . $ano . ",'" . $sid . "','" . $row["name"] . "','" . $row["address"] . "','" . $row["designation"] . "','" . $row["org"] . "')";
mysql_query($sql);

}// wend
}// end if

//------------------------------END REF-----------------------------------

//------------------------------SAVE ADDRESS-----------------------------------

$sql="select * from address where sid='" . $sid . "' ";
$result=mysql_query($sql);
if(mysql_affected_rows()!=0)
{
while($row=mysql_fetch_array($result))
{
$autonum_address=autonum("p_address","autonum");

    $sql = "Insert into p_address ";
$sql=$sql . "values(" . $autonum_address . "," . $ano . ",'" . $sid . "','" . $row["address"] . "','" . $row["city1"] . "','" . $row["country1"] . "','" . $row["ph"] . "','" . $row["mob"] . "','" . $row["fax"] . "','" . $row["email"] . "', ";
$sql=$sql . " '" . $row["address2"] . "','" . $row["city2"] . "','" . $row["country2"] . "','" . $row["ph2"] . "','" . $row["fax2"] . "','" . $row["email2"] . "','" . $row["contact_in_pk_1"] . "','" . $row["contact_in_pk_2"] . "','" . $row["contact1_address"] . "','" . $row["contact2_address"] . "') ";
mysql_query($sql);

}// wend
}// end if

//------------------------------END ADDRESS-----------------------------------

//------------------------------SAVE PUBLICATIONS-----------------------------------

$sql="select * from publications where sid='" . $sid . "' ";
$result=mysql_query($sql);
if(mysql_affected_rows()!=0)
{
while($row=mysql_fetch_array($result))
{
$autonum_pub=autonum("p_publications","autonum");

$sql = "Insert into p_publications ";
$sql=$sql . "values(" . $autonum_pub . "," . $ano . ",'" . $sid . "','" . $row["author_name"] . "','" . $row["co_author_name"] . "','" . $row["title"] . "','" . $row["pub_in"] . "','" . $row["org_pub"] . "' ,";
$sql=$sql . " '" . $row["no"] . "','" . $row["vol"] . "','" . $row["pp"] . "','" . $row["dates"] . "')";

mysql_query($sql);

}// wend
}// end if

//------------------------------END PUB-----------------------------------

//------------------------------Move Picture to Parmanent Folder-----------------------------------

$sql="select * from pic where sid='" . $sid . "' ";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
if(mysql_affected_rows()!=0)
{
$old_path= "../upload/" . $row['folder_name'] . $row['file_name'];
$new_path= "../upload/pic/" . $row['file_name'];
$new_file_name=$row['file_name'];

if (file_exists($old_path)) 
{
copy($old_path,$new_path);
unlink($old_path);
}

$autonum_pic=autonum("p_pic","autonum");
$sql = "Insert into p_pic ";
$sql=$sql . "values(" . $autonum_pic . "," . $ano . ",'" . $sid . "','pic','" . $new_file_name . "')";
mysql_query($sql);

}

//include "delete_temp.php";
//session_unregister($sid);

//--------------Send Email to Webmaster---------
$to = "adnan.rasheed@niit.edu.pk";
$subject = "New CV Uploaded by " . $name;

$body = "New CV Uploaded The Details are: ";
$body = $body . "<br> <b>Name:</b> " . $name;
$body = $body . "<br> <b>Post Applied For: </b> " . $post;
$body = $body . "<br> <b>Entry Date: </b>" . date("d-M-Y");
$body = $body . "<br> <b>Entry Time: </b>" . date("Hi");

if (mail($to, $subject, $body))
{
   //echo("<p>Message sent!</p>");
}
else
{
   //echo("<p>Message delivery failed...</p>");
}
//----------------------------------------------

$URL="../print/print_cv.php?ano=" . $ano . " ";
//header ("Location: $URL");
?>
<p class="b_text"><br>
</p>
<table width="80%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th align="left" scope="col"><p class="b_text">Thank you for expressing interest in employment with NUST School of Electrical Engineering and Computer Science (NUST-SEECS). We have received your CV form and stored your information in our database. We will contact you soon for further correspondence.</p>      <span class="b_text">    </span>
    <input type=button name=cmdproceed value="View CV" onclick="javascript:location=' <?php echo $URL ?> '"></th>
  </tr>
</table>
