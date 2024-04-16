<?php
	$file_name=basename($_SERVER['PHP_SELF']);
	$status="";
	if($file_name=="personal_info.php")
		$status=" (Step 1 of 5)";
	else if($file_name=="pic.php")
		$status=" (Step 2 of 5)";
	else if($file_name=="academic_detail.php")
		$status=" (Step 3 of 5)";
	else if($file_name=="research_info.php")
		$status=" (Step 4 of 5)";
	else if($file_name=="publication_info.php")
		$status=" (Step 5 of 5)";
?>

<div class="img_heading" style="color:#0033FF">
Alumni Membership Card. <span class="b_text"><?php echo $status ?></span>
</div><br>