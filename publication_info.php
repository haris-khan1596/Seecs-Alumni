<?php 

ob_start();
session_start(); 
include "control/session.php";
$set_active_link="publication_info";
$cat="10";
?>

<html>
<head>
<script language="javascript" src="javascript/validate.js"></script>
<script language="javascript">
function foc()
{
frmpub.txttitle.focus()
}

function chknum(field)
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
	var alphaExp = /^[a-zA-Z ,"]+$/;
	if(field.value.match(alphaExp)){
		return true;
	}else{
		alert("Please enter characters");
		field.value="";
		field.focus();
		return false;
	}
}
</script>

<link href="style.css" rel="stylesheet" type="text/css">
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
<?php include "../header2.php"; ?>
    </td>
    <td width="5" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="table_left">
<span class="right_bgcolor">
<?php include "control/right.php"; ?>
</span>	</td>
    <td align="left" valign="top"><table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
      <tr>
        <td height="323" valign="top">
         
		 <!-- ============================================= -->
<?php
include "control/dbcode.php";
include "control/main.php";
?>		 

<?php 
echo "<br>";
if(isset($_SESSION["wz"]))
include "wz_heading.php";
?>
         
<form action="save/save_publication_info.php" method="post" name="frmpub" onSubmit="return validate_pub()">
  <table border="0" cellpadding="0" cellspacing="0" width="82%" id="table1">
<tr><td align="center" valign="middle" class="b_text"><div align="left" class="new_heading"><br>
            
<div align="left"><img src="images/icons/publications.png" width="32" height="32" align="middle" style="margin-top:-10px"><span class="b_main_heading"> Publications</span></div>
</td>
</tr>
	<tr>
		<td height="66" class="b_text"><b class="rtop"><b class="r1"></b><b class="r2"></b><b class="r3"></b><b class="r4"></b></b>
        
        
        	<table width="82%" align="left" cellpadding="5" class="b_text">
            <br>
            	<tr >
				<td width="256" class="b_text"><strong>Title of Paper/ Presentation </strong>*</td>
				<td colspan="11"><input name="txttitle" type="text" class="b_text" id="txttitle3" size="50" maxlength="200">  
				<div align="left"><span class="style3"></span></div>  <div align="center"></div></td>
                </tr>
                <tr>
                  <td class="b_text"><strong>Author Name * </strong></td>
   				 <td colspan="11" class="b_text"><input name="txtauthor" type="text" class="b_text" id="txtauthor5" size="50" maxlength="50" onBlur="isAlphabet(frmpub.txtauthor)"></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3"></td>
                    <td colspan="2"></td>
                    <td width="70"></td>
                    <td width="218"></td>
                    <td width="14"></td>
                    <td width="22" colspan="3"></td>
                </tr>
  				<tr>
                    <td class="b_text"><strong>Co-Author name</strong></td>
                    <td colspan="11"><span class="b_text">
                      <input name="txtcoauthor" type="text" class="b_text" id="txtcoauthor5" size="50" maxlength="50" onBlur="isAlphabet(frmpub.txtcoauthor)">
                    </span></td>
 			   </tr>
                <tr>
                  <td class="b_text"><strong>Published in Conference/Journal * </strong></td>
                  <td colspan="11"><span class="b_text">
                    <input name="txtpub_in" type="text" class="b_text" id="txtpub_in6" size="50" maxlength="200" onBlur="isAlphabet(frmpub.txtpub_in)">
                  </span><span class="b_text">  </span></td>
 			   </tr>
			    <tr>
			      <td class="b_text"><strong>Organizer/Publisher * </strong></td>
			      <td colspan="11"><input name="txtorgnizer" type="text" class="b_text" id="txtorgnizer3" size="50" maxlength="200" onBlur="isAlphabet(frmpub.txtorgnizer)"></td>
			      </tr>
			    <tr>
                  <td class="b_text"><table width="98%" border="0">
                    <tr>
                      <td width="15%" class="b_text"><strong>No*</strong></td>
                      <td width="39%" class="b_text"><input name="txtno" type="text" class="b_text" id="txtno5" size="3" maxlength="5" onBlur="chknum(frmpub.txtno)"></td>
                      <td width="16%" class="b_text"><strong>Vol*</strong></td>
                      <td width="30%" class="b_text"><input name="txtvol" type="text" class="b_text" id="txtvol6" size="5" maxlength="100" onBlur="chknum(frmpub.txtvol)"></td>
                    </tr>
                  </table></td>
                  <td colspan="11"><table width="98%" border="0">
                    <tr>
                      <td width="10%" class="b_text"><strong>PP*</strong></td>
                      <td width="25%" class="b_text"> <input name="txtpp" type="text" class="b_text" id="txtpp4" size="8" maxlength="100"></td>
                      <td width="38%" class="b_text"><strong>Dates</strong>(DD-MM-YYY)</td>
                      <td width="27%" class="b_text"><input name="txtdates" type="text" class="b_text" id="txtdates4" size="13" maxlength="10"></td>
                    </tr>
                  </table></td>
  				</tr>
				<tr>
                  <td height="23" colspan="12" class="b_heading">      <div align="right">
                          <input name="cmdsubmit" type="submit" class="black_button" id="cmdsubmit3" value="Save">
                          <span class="b_text">
                          <?php if($_SESSION["wz"]=="1") 
							{include "wz_links.php";}
							else
							{
							?>                                   
                          <input name="cmdfinish2" type="button" class="black_button"  value="Back" onClick="javascript:location='profile_info.php'">
                          <?php } ?>
                          </span>		  <?php
                			$user_id=$_SESSION['user_id'];
                         ?>			
                      </div></td>
  				</tr>
            </table>        </td>
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
$result=mysql_query("select * from publications where user_id='" . $user_id . "' order by autonum");
if(mysql_affected_rows()<=0)
exit;
?>
<form action="delete/delete_publication_info.php" method="post" name="frmdelete">
  <table width="82%" border="0" align="left" cellpadding="0" class="b_text">
  
  			<tr>
            <td colspan="2"><div class="b_heading"> Publication Preview</div><br>
</td>
            </tr>
  
      <tr bgcolor="#E0E0E0">
      <td valign="top" bordercolor="#FFFFFF" bgcolor="#E0E0E0" class="left_bgcolor">
  
<?php
$i=1;
while($rows=mysql_fetch_array($result))
{
$autonum_val= "t" . $rows['autonum'] ;
?>
<table width="100%" height="44" border="0" align="center"  bgcolor="#FFFFFF" class="b_text">
                <tr  >
                  <td height="38" colspan="5" align="left" valign="top" class="b_text"><input type=checkbox name="<?php echo $autonum_val; ?>" >  <?php echo "<b>" . $i . "</b>" ?></td>
                  <td width="92%" valign="top">
                  	
                    	<b><?php echo $rows['author_name']; ?></b>, <?php echo $rows['co_author_name']; ?>, "<?php echo $rows['title']; ?>"<?php echo ",<b>".$rows['pub_in']."</b>"; ?>
                        	    <?php echo ",<b>".$rows['org_pub']."</b>"; ?> <?php echo ",Vol.<b>".$rows['vol']."</b>"; ?><?php echo ",No<b> ".$rows['no']."</b>"; ?> 
							   <?php echo ",<b>".$rows['pp']."</b>"; ?>,<?php echo show_date($rows['dates'],"ddmmyyyy"); ?>                        </li>
                    </td>
                </tr>
                <tr>
                	 
 					 <td colspan="20" valign="top"><hr noshade class="Marquee_links" style="border-bottom-style:dotted; color:#CCCCCC" ></td>
                     <td></td>
  				</tr>
               
      </table>
<?php 
$i=$i+1;
}
?></td>
    </tr>
      <tr bgcolor="#E0E0E0">
        <td height="23" bordercolor="#FFFFFF" class="left_bgcolor"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>              <input name="cmddelete" type="submit" class="black_button" id="cmddelete" value="Delete">            </td>
            <td><div align="right">
            <?php if(!isset($_SESSION["wz"])) { ?> 
              <input name="cmdfinish" type="button" class="black_button"  value="Finish" onClick="javascript:location='profile_info.php'">
			<?php } ?>
            </div></td>
          </tr>
        </table></td>
        </tr>
  </table>

</form>

		 
		 <!-- ============================================= -->		 </td>
      </tr>
    </table>    
      <p>&nbsp;</p>
      <p>&nbsp;</p>
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
