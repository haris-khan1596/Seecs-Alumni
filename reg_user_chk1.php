<?php
	include "control/dbcode.php";

 	$regno= mysql_real_escape_string($_GET["regno"]);
	
	$db_qry="SELECT regno FROM vw_regno_detail WHERE regno ='" . $regno . "'";
	$rs=mysql_query($db_qry);	
		if(mysql_affected_rows()<=0)
		{
			
			$db_chk="SELECT std_reg_no,std_name FROM std_exam_record WHERE std_reg_no ='" . $regno . "'";
			$rs1=mysql_query($db_chk);
				if(mysql_affected_rows()<=0)
				{
					echo "<div class='marquee msgbox_error'>Invalid Registration No</div>";
				}
				else
				{
					$row=mysql_fetch_array($rs1);
					echo "<div class='marquee msgbox_ok'>Registration Number validated," . $row[1];
				}
		}
		else
		{
			echo "<div class='marquee msgbox_error'>User already Registered</div>";
		}
		
	

?>