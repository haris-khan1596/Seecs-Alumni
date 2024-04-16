
<link href="style.css" rel="stylesheet" type="text/css" />
<?php 
$file_name=basename($_SERVER['PHP_SELF']) ;
//echo $file_name;
if($file_name=="personal_info.php") {?>
<input type="submit" class="black_button" value="Save & Continue" />
<?php } 
else if($file_name=="pic.php") {?>
<input type="button" class="black_button" value="Back" onclick="location.href='personal_info.php'" />
<input type="button" class="black_button" value="Save & Continue" onclick="chk_img()" />
<?php } 

else if($file_name=="academic_detail.php") {?>
<input type="button" class="black_button" value="Back" onclick="location.href='pic.php'" />
<input type="button" class="black_button" value="Continue" onclick="location.href='research_info.php'" id="btn_cont" style="display:none" />
<?php } 

else if($file_name=="research_info.php") {?>
<input type="button" class="black_button" value="Back" onclick="location.href='academic_detail.php'" />
<input type="button" class="black_button" value="Skip" onclick="location.href='publication_info.php'" />
<input type="button" class="black_button" value="Continue" onclick="location.href='publication_info.php'" />
<?php } 

else if($file_name=="publication_info.php") {?>
<input type="button" class="black_button" value="Back" onclick="location.href='research_info.php'" />
<input type="button" class="black_button" value="Finish" onclick="location.href='finish_msg.php'" />
<?php } 

else { ?>
    <input type="button" class="black_button" value="Back" onclick="location.href='personal_info.php'" />
    <input type="button" class="black_button" value="Skip" />
    <input type="submit" class="black_button" value="Save & Continue" />
    <input type="button" class="black_button" value="Finish" />
<?php } ?>


