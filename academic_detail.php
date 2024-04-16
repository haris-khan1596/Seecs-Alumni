<?php 
ob_start();
session_start(); 
include "control/session.php";
$cat="10";
?>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="javascript/validate.js"></script>
<script language="javascript">

function set_btn()
{
if(document.getElementById('chk').checked==true)
	{
	document.getElementById('cmdsubmit').style.display="none";
	document.getElementById('btn_cont').style.display="inline";
	}
else
	{
	document.getElementById('cmdsubmit').style.display="inline";
	document.getElementById('btn_cont').style.display="none";
	}
}

function foc()
{
frmad.txtdegree.focus()
}

function chkgpa(field)
{
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
		/*
		alert("Please enter characters");
		field.value="";
		field.focus();
		return false;*/
	}
}


</script>



<style type="text/css">
<!--

.style3 {font-size: 8px}
.style4 {
	font-size: 9px;
	font-weight: bold;
}
.style5 {
	font-size: 10px;
	font-weight: bold;
}
-->
.list{
     padding-right: 20px;
	 list-style-image:url('images/cap.gif');
}

</style>


<style>
b.rtop, b.rbottom{display:block;}
b.rtop b, b.rbottom b{display:block;height: 1px;overflow: hidden; background: #9BD1FA}
b.r1{margin: 0 5px}
b.r2{margin: 0 3px}
b.r3{margin: 0 2px}
b.rtop b.r4, b.rbottom b.r4{margin: 0 1px;height: 2px}
</style>




<?php $cat="1" ?>
<html>
<head>
<title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) </title>
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
<?php include "../header2.php"; ?>
    </td>
    <td width="4" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td width="26" align="left" valign="top" class="table_left">
<span class="right_bgcolor">
<?php include "control/right.php"; ?>
</span>	</td>
    <td align="left" valign="top"><table width="98%" border="0" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td height="323" valign="top">
<!-- ==================================== -->		
<?php
include "control/dbcode.php";
include "control/main.php";
?>		
	<br>	
	<?php 
    if(isset($_SESSION["wz"]))
    include "wz_heading.php";
    ?>
        
        
		<form action="save/save_academic_detail.php" method="post" name="frmad" onSubmit="return validate_ad()">        
		<table border="0" cellpadding="0" cellspacing="0" width="82%" id="table1" align="center">
			<tr>
            	<td align="center" valign="middle" class="b_text"><div align="left" class="new_heading">        
					<div align="left"><img src="images/icons/cap.gif" align="middle" style="margin-top:-10px"><span class="b_main_heading"> Higher Education Details</span></div>
				</td>
			</tr>
			<tr>
				<td height="66" class="b_text"><b class="rtop"><b class="r1"></b><b class="r2"></b><b class="r3"></b><b class="r4"></b></b>
		        	<table width="82%" border="0" align="left" cellpadding="5" class="b_text">
<br>
            				<tr >
            	 				 <td width="15%">
                 					 <strong>
				  					 <input type="hidden" value="" name="sno">
				  					 <input type="hidden" value="" name="ano">Degree*</strong></td>
           	 				  <td width="35%"><strong>
       	 				      <input name="txtdegree" type="text" class="b_text" id="txtdegree2" size="15" maxlength="50" onBlur="isAlphabet(frmad.txtdegree)"></strong></td>
           	  				  <td width="15%"><strong>Equal To* </strong></td>
               				  <td width="35%"><div align="center"></div>  
				 					 <strong>
				   					 <select name="cboequal" class="b_text" id="select2">
				   					   <option value="Masters" selected>Masters</option>
				   					   <option value="PhD">PhD</option>
				   					   <option value="Post-Doc">Post-Doc</option>
				   					 </select>
				  					</strong> </td>
       				  </tr>
              				<tr>
                                  <td width="15%"><span class="style4">From</span>* </td>
                              <td width="35%"><input name="txtfrom" type="text" class="b_text" id="txtfrom3" size="7" maxlength="7">
                              <span class="Marquee">(MM-YYYY)</span></td>
                              <td width="15%"><span class="style5">To*</span> </td>
                              <td width="35%"><input name="txtto" type="text" class="b_text" id="txtto3" size="7" maxlength="7">
                                <span class="style3"> (MM-YYYY)</span></td>
       				  </tr>
               				<tr>
                                  <td width="15%"><span class="style4"><strong>GPA/%age*</strong></td>
                              <td width="35%"><strong>
                              <input name="txtgpa" type="text" class="b_text" id="txtgpa3" size="7" maxlength="4" onBlur="chkgpa(frmad.txtgpa)"></strong></td>
                              <td width="15%"><strong>Major* </strong></td>
                              <td width="35%"><strong>
                              <input name="txtmajor" type="text" class="b_text" id="txtmajor3" maxlength="50"></strong></td>
           			  </tr>
                            <tr>
                              <td width="15%" class="b_text"><strong>Uni/Inst*</strong></td>
                              <td colspan="3"><strong> <input name="txtuni" type="text" class="b_text" id="txtuni3" size="63" maxlength="120" onBlur="isAlphabet(frmad.txtuni)"></strong></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td colspan="3" align="left"><label>
                              <input type="checkbox" name="chk" id="chk" onClick="set_btn()">
                              I am not pursuing further studies
                              </label></td>
                            </tr>
                            <tr>
                                <td width="15%"></td>
                              <td colspan="3" align="right">
                             <span class="b_text">
                             
                             <?php if($_SESSION["wz"]=="1") 
								{include "wz_links.php";}
								else
								{
								?>                                
                                 <input name="cmdfinish22" type="button" class="black_button"  value="Back" onClick="javascript:location='profile_info.php'">
                             <?php } ?>
                             <input name="cmdsubmit" type="submit" class="black_button" id="cmdsubmit" value="Save &amp; Add New">    
                             </span></td>
                            </tr>
            		</table>    
     			 </td>
			</tr>
			<tr>
				<td bgcolor="#9BD1FA" class="b_text"> </td>
			</tr>
			<tr>
				<td class="b_text"><b class="rbottom"><b class="r4"></b><b class="r3"></b><b class="r2"></b><b class="r1"></b></b></td>
			</tr>
		</table>      
	    </form>  
        
        
  


<!-- //////////////////////////////// LIST CODE ////////////////////////////////////// -->

<?php
$user_id=$_SESSION['user_id'];
$result=mysql_query("select * from academic_detail where user_id='" . $user_id . "' order by autonum");
if(mysql_affected_rows()>0)
{
?>
		
        <form action="delete/delete_academic_detail.php" method="post" name="frmdelete">
		<table width="82%" border="0" align="center" cellpadding="4">
			<tr>
            <td colspan="2"><span class="b_heading"> Academic Preview</span></td>
            </tr>
            <tr>
				<td colspan="2">
				<?php
					$i=1;
					while($rows=mysql_fetch_array($result))
					{
					$autonum_val= "t" . $rows['autonum'] ;
				?>
					<table width="82%" border="0" cellpadding="4" cellspacing="0" class="b_text">
					<tr >
  						<td width="4%" valign="top" class="b_heading"><div align="right">
   							<input name="<?php echo $autonum_val; ?>" type=checkbox class="b_text" >
  						</div></td>
					  <td width="96%" valign="top" >
                  <ul>
                                    <li class="b_text"><b><?php echo $rows['degree']; ?> </b>(<b><?php echo show_date($rows['duration_from'],"mmyyyy") ?> </b>to
                                    <b> <?php echo show_date($rows['duration_to'],"mmyyyy") ?> </b>) equals to <b><?php echo $rows['degree_equal']; ?> </b>passing with
                                    <b><?php echo $rows['gpa']; ?> </b>having Majors <b><?php echo $rows['major']; ?></b> from <b><?php echo $rows['university']; ?> </b> </li>
                            </ul>
    					</td>
                    </tr>
                    <tr>
                      <td colspan="2" valign="top"><hr noshade class="Marquee_links" style="border-bottom-style:dotted; color:#CCCCCC" ></td>
                    </tr>
                    </table>
				<?php 
                $i=$i+1;
                }
                ?>
					<tr>
 						  <td width="50%" height="24" class="left_bgcolor"> 						    <input name="cmddelete" type="submit" class="black_button" id="cmddelete" value="Delete">				      </td>
				    <td width="50%" class="left_bgcolor">
   						  <div align="center">
    						  
<?php if(!isset($_SESSION["wz"])) { ?>                           
<input name="cmdfinish2" type="button" class="black_button"  value="Finish" onClick="javascript:location='profile_info.php'">
<?php } ?>
			     
                         </div></td>
				</tr>
		</table>
		</form>
<?php } ?>

<p>
  <!-- ======================================= -->
</p>
<p>&nbsp;</p>
<p>&nbsp;</p></td>
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
