<?php 
$cat="10";
session_start(); 
include "control/session.php";
?>

<html>
<head>
<title>NUST-SEECS (NUST School of Electrical Engineering and Computer Science) Alumni </title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function validate()
{
	if(frm_search.txtsearch.value=="")
	{
			alert("Please enter Search text");
			frm_search.txtsearch.focus()
			return false;
	}
}

</script>
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
    <td width="12" rowspan="2" align="left" valign="top">&nbsp;
	</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="table_left">
<span class="right_bgcolor">
<?php include "control/right.php"; ?>
</span>	</td>
    <td align="left" valign="top"><table border="0" align="center" cellpadding="3" cellspacing="0" class="table_body">
     <br>
      <td>
<div class="round_div b_gradient" style="width:50%" >
       
                                            <form action="user_search_result.php" method="post" name="frm_search" onSubmit="return validate()">
                                                <table width="98%" border="0" cellpadding="5">
                      <tr>
                                                        <td><img src="images/home_icon/friend.png" align="middle" style="margin-top:-10px"> <span class="img_heading">Find a Friend</span><span class="b_main_heading"><br>  
                                                          <br>
                                                        </span></td>
                                                  </tr>

                                                    <tr>
                                                        <td height="108" >

                                                            <table width="88%" height="107"  border="0" align="right" cellpadding="0" cellspacing="0" bordercolor="#999999" class="b_text">
<tr bordercolor="#999999">
                                                                    <td width="15%">By * </td>
                                                                    <td width="65%"><div align="left"><span class="fbinput">
                                                                                <select name="cbosearch" class="fbinput" id="cbosearch">
                                                                                    <option value="name" selected>Name</option>
                                                                                    <option value="last_degree_niit">Year Graduated</option>
                                                                                    <option value="blood_group">Blood Group</option>
                                                                                    <option value="ph">Phone No</option>
                                                                                    <option value="sec_email">E-Mail Address</option>
                                                                                    <option value="city">City</option>
                                                                                    <option value="country">Country</option>
                                                                                </select>
                                                                            </span></div></td>
                                                                </tr>
                                                                <tr bordercolor="#999999">
                                                                    <td width="15%">Enter:*</td>
                                                                    <td align="left" valign="top" class="fbinput"><input name="txtsearch" type="text" class="fbinput" id="txtsearch" size="20" ></td>
                                                                </tr>
                                                                <tr bordercolor="#999999">
                                                                    <td>&nbsp;</td>
                                                                    <td align="right">                                                              <div align="left">
                                                                            <input name="cmdsubmit2" type="submit" class="black_button" id="cmdsubmit2" value="Search" style="margin-left:4px">
                                                                        </div></td>
                                                                </tr>
                                                            </table></td>
                                                    </tr>
                                                </table>
                                                <p>&nbsp;</p>
                                                <p>&nbsp;</p>
                 </form>
                                        </div>
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
