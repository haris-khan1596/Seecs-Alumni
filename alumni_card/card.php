<html>
<head>

<?php
$qry_card="select name, year_passing_niit, last_degree_niit, emergency_contact_no,nic1,nic2,nic3 from $database.personal_data where user_id=" . $_SESSION["user_id"];
$result_card=mysql_query($qry_card);
$row_card=mysql_fetch_array($result_card);

$alumni_name_card=$row_card["name"];
$alumni_degree_card=$row_card["last_degree_niit"];
$alumni_batch_card=$row_card["year_passing_niit"];
$alumni_nic_card=$row_card["nic1"] . "-" . $row_card["nic2"] . "-" . $row_card["nic3"];
$alumni_emergency_contact_card=$row_card["emergency_contact_no"];
$folder_path_card=return_title("folder_name","$database.pic","user_id",$_SESSION["user_id"]);
$pic_path_card=return_title("file_name","$database.pic","user_id",$_SESSION["user_id"]);

?>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (Alumni Card.png) -->
<table id="Table_01" width="250" height="390" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="5">
			<img src="alumni_card/images/card_01.jpg" width="250" height="112" alt=""></td>
	</tr>
	<tr>
		<td colspan="5">
			<img src="alumni_card/images/card_02.jpg" width="250" height="3" alt=""></td>
	</tr>
	<tr>
		<td colspan="2">
			<img src="alumni_card/images/card_03.jpg" width="52" height="117" alt=""></td>
		<td>
			<img src="<?php echo $folder_path_card . "/" . $pic_path_card ?>" width="137" height="117" alt=""></td>
		<td colspan="2">
			<img src="alumni_card/images/card_05.jpg" width="61" height="117" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="alumni_card/images/card_06.jpg" width="16" height="62" alt=""></td>
		<td colspan="3" width="225" height="62" valign="top" align="center" style="padding-right:15px">
			<?php
			echo "<span class=b_heading>$alumni_name_card</span><br>";
			echo "<span class=b_heading>$alumni_degree_card ($alumni_batch_card)</span><br>";
			echo "<span class=b_heading>SEECS</span><br>";
			
			 ?>            
            </td>
		<td>
			<img src="alumni_card/images/card_08.jpg" width="9" height="62" alt=""></td>
	</tr>
	<tr>
		<td colspan="5">
			<img src="alumni_card/images/card_09.jpg" width="250" height="95" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="alumni_card/images/spacer.gif" width="16" height="1" alt=""></td>
		<td>
			<img src="alumni_card/images/spacer.gif" width="36" height="1" alt=""></td>
		<td>
			<img src="alumni_card/images/spacer.gif" width="137" height="1" alt=""></td>
		<td>
			<img src="alumni_card/images/spacer.gif" width="52" height="1" alt=""></td>
		<td>
			<img src="alumni_card/images/spacer.gif" width="9" height="1" alt=""></td>
	</tr>
</table>
<!-- End Save for Web Slices -->
</body>
</html>