<?php 
 ob_start();
 session_start(); 
 include "control/session.php";
 $cat="10";
?>
<link href="style.css" rel="stylesheet" type="text/css">


<script language="javascript" src="javascript/validate.js"></script>
<script language="javascript">

function foc()
{
frmemp.txtorg.focus()
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


</script>
<style>
b.rtop, b.rbottom{display:block;}
b.rtop b, b.rbottom b{display:block;height: 1px;overflow: hidden; background: #9BD1FA}
b.r1{margin: 0 5px}
b.r2{margin: 0 3px}
b.r3{margin: 0 2px}
b.rtop b.r4, b.rbottom b.r4{margin: 0 1px;height: 2px}
</style>


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
    <td width="7" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="table_left">
<span class="right_bgcolor">
<?php include "control/right.php"; ?>
</span>	</td>
    <td align="left" valign="top"><table width="95%" border="0" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td height="323" valign="top">
		
<p>
  <!-- ======================================= -->
  
  <?php
 include "control/dbcode.php";
 include "control/main.php";
?>
</p>
<?php
echo "<br>";
if(isset($_SESSION["wz"]))
include "wz_heading.php";
?>
<form action="save/save_research_info.php" method="post" name="frmresearch" onSubmit="return validate_research()">    
<table border="0" cellpadding="0" cellspacing="0" width="82%" id="table1" align="center">
<tr><td align="center" valign="middle" class="b_text"><div align="left" class="new_heading"><br>
            
<div align="left"><img src="images/icons/research.png" width="32" height="32" align="middle" style="margin-top:-10px"><span class="b_main_heading"> Research Experience</span></div>
</td>
</tr>
	<tr>
		<td height="66" class="b_text"><b class="rtop"><b class="r1"></b><b class="r2"></b><b class="r3"></b><b class="r4"></b></b>
        
        
        	<table width="93%" align="center" cellpadding="5" class="b_text">
            <br>
            	<tr >
            	  <td width="142">
                  <strong>
						  <input type="hidden" value="" name="ano">
						  <input type="hidden" value="" name="sno">
						  After Degree*</strong></td>
            	  <td width="170"><strong>  
            	    <input name="txtdegree" type="text" class="b_text" id="txtdegree2" maxlength="50" onBlur="isAlphabet(frmresearch.txtdegree)"></strong></td>
            	  <td width="42"><strong>Post* </strong></td>
                  <td width="252"><input name="txtpost" type="text" class="b_text" id="txtpost" maxlength="50"></td>
                </tr>
                <tr>
                  <td><span class="style4">From</span><span class="style3">(MM-YYYY)</span>* </td>
                  <td><input name="txtfrom" type="text" class="b_text" id="txtfrom2" size="12" maxlength="10"></td>
                  <td><span class="style5">To</span> </td>
				  <td><input name="txtto" type="text" class="b_text" id="txtto2" size="12" maxlength="10"></td>
                </tr>
                
                <tr>
			      <td class="b_text"><strong>Uni/Inst*</strong></td>
			      <td colspan="3"><strong>  <input name="txtuni" type="text" class="b_text" id="txtuni2" size="70" maxlength="200" onBlur="isAlphabet(frmresearch.txtuni)"></strong></td>
			    </tr>
                <tr>
                	<td></td>
					<td colspan="3" align="right"><div align="right">
      <input name="cmdsubmit" type="submit" class="black_button" id="cmdsubmit3" value="Save & Add New">
		<?php if($_SESSION["wz"]=="1") 
            {include "wz_links.php";}
            else
            {
            ?>         
      <input name="cmdfinish22" type="button" class="black_button"  value="Back" onClick="javascript:location='profile_info.php'">
      <?php } ?>
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
$result=mysql_query("select * from `research_experience` where user_id='" . $user_id . "' order by autonum");
if(mysql_affected_rows()>0)
{
?>
<form action="delete/delete_research_info.php" method="post" name="frmdelete">
<table width="82%" border="0" align="center" cellpadding="0">
			<tr>
            <td colspan="2"><span class="b_heading"> Research Preview</span><br><br>

</td>
            </tr>
<tr>
<td width="100%" height="55" valign="top">

<table width="98%" border="0" align="center" cellpadding="4">

<?php
$i=1;
while($rows=mysql_fetch_array($result))
{
$autonum_val= "t" . $rows['autonum'] ;
?>
<tr class="b_heading">
  <td valign="top"><div align="right">
    <input type=checkbox name="<?php echo $autonum_val; ?>" >
  </div></td>
    
  	<td width="94%" colspan="-2" valign="top"  >
    		<ul>
                	<li class="b_text">At the post of  <?php echo $rows['post']; ?>  after degree of <?php echo $rows['after_degree']; ?> 
                    (<?php echo show_date($rows['duration_from'],"mmyyyy") ?> to <?php echo show_date($rows['duration_to'],"mmyyyy") ?> ) 
                    from <?php echo $rows['university']; ?>  </li>
            </ul>    </td>
  </tr>
<tr>
  <td colspan="2" valign="top"><hr noshade class="Marquee_links" style="border-bottom-style:dotted; color:#CCCCCC" ></td>
  </tr>

<?php 
$i=$i+1;
}
?>
</table></td>
</tr>
<tr>
  <td height="26"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><input name="cmddelete" type="submit" class="black_button" id="cmddelete" value="Delete"></td>
      <td><div align="right">
        <?php if(!isset($_SESSION["wz"])) { ?> 
        <input name="cmdfinish2" type="button" class="black_button"  value="Finish" onClick="javascript:location='profile_info.php'">
        <?php } ?>
      </div></td>
    </tr>
  </table></td>
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
