<?php

$upload_dir = "upload_pic"; 				// The directory for the images to be saved in
$upload_path = $upload_dir."/";				// The path to where the image will be saved
//$large_image_name = base64_encode($_SESSION["user_id"]).".jpg"; 		// New name of the large image
//$thumb_image_name = base64_encode($_SESSION["user_id"])."_thumb.jpg"; 	// New name of the thumbnail image

$large_image_name = $_SESSION["alumni_name"] . "_" . $_SESSION["user_id"] . ".jpg"; 		// New name of the large image
$thumb_image_name = $_SESSION["alumni_name"] . "_" . $_SESSION["user_id"] . "_thumb.jpg"; 	// New name of the thumbnail image


$max_file = "1148576"; 						// Approx 1MB
$max_width = "500";							// Max width allowed for the large image
$thumb_width = "120";						// Width of thumbnail image
$thumb_height = "120";						// Height of thumbnail image

//Image functions
//You do not need to alter these functions
function resizeImage($image,$width,$height,$scale) {
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	$source = imagecreatefromjpeg($image);
	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
	imagejpeg($newImage,$image,90);
	chmod($image, 0777);
	return $image;
}
//You do not need to alter these functions
function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	$source = imagecreatefromjpeg($image);
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
	imagejpeg($newImage,$thumb_image_name,90);
	chmod($thumb_image_name, 0777);
	return $thumb_image_name;
}
//You do not need to alter these functions
function getHeight($image) {
	$sizes = getimagesize($image);
	$height = $sizes[1];
	return $height;
}
//You do not need to alter these functions
function getWidth($image) {
	$sizes = getimagesize($image);
	$width = $sizes[0];
	return $width;
}

//Image Locations
$large_image_location = $upload_path.$large_image_name;
$thumb_image_location = $upload_path.$thumb_image_name;

//Create the upload directory with the right permissions if it doesn't exist
if(!is_dir($upload_dir)){
	mkdir($upload_dir, 0777);
	chmod($upload_dir, 0777);
}

//Check to see if any images with the same names already exist
if (file_exists($large_image_location)){
	if(file_exists($thumb_image_location)){
		$thumb_photo_exists = "<img id=alumni_img_thumb src=\"".$upload_path.$thumb_image_name."\" alt=\"Thumbnail Image\"/>";
	}else{
		$thumb_photo_exists = "";
	}
   	$large_photo_exists = "<img src=\"".$upload_path.$large_image_name."\" alt=\"Large Image\"/>";
} else {
   	$large_photo_exists = "";
	$thumb_photo_exists = "";
}

if (isset($_POST["upload"])) { 
	//Get the file information
	$userfile_name = $_FILES['image']['name'];
	$userfile_tmp = $_FILES['image']['tmp_name'];
	$userfile_size = $_FILES['image']['size'];
	$filename = basename($_FILES['image']['name']);
	$file_ext = substr($filename, strrpos($filename, '.') + 1);
	
	//Only process if the file is a JPG and below the allowed limit
	if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) {
		if (($file_ext!="jpg") && ($userfile_size > $max_file)) {
			$error= "ONLY jpeg images under 1MB are accepted for upload";
		}
	}else{
		$error= "Select a jpeg image for upload";
	}
	//Everything is ok, so we can upload the image.
	if (strlen($error)==0){
		
		if (isset($_FILES['image']['name'])){
			
			move_uploaded_file($userfile_tmp, $large_image_location);
			chmod($large_image_location, 0777);
			
			$width = getWidth($large_image_location);
			$height = getHeight($large_image_location);
			//Scale the image if it is greater than the width set above
			if ($width > $max_width){
				$scale = $max_width/$width;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}else{
				$scale = 1;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}
			//Delete the thumbnail file so the user can create a new one
			if (file_exists($thumb_image_location)) {
				unlink($thumb_image_location);
			}
		}
		//Refresh the page to show the new uploaded image
		header("location:".$_SERVER["PHP_SELF"] . "?upload=ok");
		exit();
	}
}

if (isset($_POST["upload_thumbnail"]) && strlen($large_photo_exists)>0) {
	//Get the new coordinates to crop the image.
	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	//Scale the image to the thumb_width set above
	$scale = $thumb_width/$w;
	$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	
	$user_id=$_SESSION["user_id"];
	mysql_query("delete from pic where user_id='" . $user_id . "' "); 
	$autonum=autonum("pic","autonum");
	$sql="insert into pic values(" . $autonum . ", '" . $user_id . "','" . $upload_dir . "','" . $thumb_image_name . "' )";
	mysql_query($sql);
	
	//Reload the page again to view the thumbnail
	header("location:".$_SERVER["PHP_SELF"]. "?thumb=ok");
	exit();
}

if ($_GET['a']=="delete"){
	if (file_exists($large_image_location)) {
		unlink($large_image_location);
	}
	if (file_exists($thumb_image_location)) {
		unlink($thumb_image_location);
	}
	header("location:".$_SERVER["PHP_SELF"]);
	exit(); 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title></title>
	<script type="text/javascript" src="javascript/pic_upload_js/jquery-pack.js"></script>
	<script type="text/javascript" src="javascript/pic_upload_js/jquery.imgareaselect-0.3.min.js"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
<!--
.style1 {font-size: 18px}
-->
    </style>
</head>
<body>
<?php
//Only display the javacript if an image has been uploaded
if(strlen($large_photo_exists)>0){
	$current_large_image_width = getWidth($large_image_location);
	$current_large_image_height = getHeight($large_image_location);?>
<script type="text/javascript">
function preview(img, selection) { 
	var scaleX = <?php echo $thumb_width;?> / selection.width; 
	var scaleY = <?php echo $thumb_height;?> / selection.height; 
	
	$('#thumbnail + div > img').css({ 
		width: Math.round(scaleX * <?php echo $current_large_image_width;?>) + 'px', 
		height: Math.round(scaleY * <?php echo $current_large_image_height;?>) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	$('#x1').val(selection.x1);
	$('#y1').val(selection.y1);
	$('#x2').val(selection.x2);
	$('#y2').val(selection.y2);
	$('#w').val(selection.width);
	$('#h').val(selection.height);
} 

$(document).ready(function () { 
	$('#save_thumb').click(function() {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("Please drag your mouse within the picture to generate Image Thumbnail");
			return false;
		}else{
			return true;
		}
	});
}); 

$(window).load(function () { 
	$('#thumbnail').imgAreaSelect({ aspectRatio: '1:1', onSelectChange: preview }); 
});

</script>
<?php }?>
<span class="b_main_heading style1">
</span><span class="img_heading">Upload picture</span> <br />

<p class=b_text><strong><font color=red>NOTE:</font></strong>
<font color=red>
<ul class="b_text">
<li>Picture should have blue background and should be in JPEG Format</li>
<li>After upload drag picture to create thumbnail</li>
<li>If the thumbnail image looks the same as the previous one, just hit Cont + F5 button or <a href='javascript: window.location.reload()' class=b_link>Click Here</a> to refresh browser screen</li>
</ul>
</font>
  <?php
//Display error message if there are any
//if(strlen($error)>0){
//	echo "<ul><li><strong>Error!</strong></li><li>".$error."</li></ul>";
//}
if(strlen($large_photo_exists)>0 && strlen($thumb_photo_exists)>0){
	
	if($_GET["thumb"]=='ok')
	{
	echo "<div class=msgbox_green>Image uploaded successfully</div><br>";
	}
	
	
	echo $large_photo_exists."&nbsp;".$thumb_photo_exists;
	echo "<p><a href=\"".$_SERVER["PHP_SELF"]."?a=delete\">Delete Images</a></p>";
}else{
		if(strlen($large_photo_exists)>0){?>
<div align="center">
			<img src="<?php echo  $upload_path.$large_image_name;?>" style="float: left; margin-right: 10px;" id="thumbnail" alt="Create Thumbnail" />
			<div style="float:left; position:relative; overflow:hidden; width:<?php echo $thumb_width;?>px; height:<?php echo $thumb_height;?>px;">
				<img src="<?php echo $upload_path.$large_image_name;?>" style="position: relative;" alt="Thumbnail Preview" />			</div>
			<br style="clear:both;"/>
			<form name="thumbnail" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
				<input type="hidden" name="x1" value="" id="x1" />
				<input type="hidden" name="y1" value="" id="y1" />
				<input type="hidden" name="x2" value="" id="x2" />
				<input type="hidden" name="y2" value="" id="y2" />
				<input type="hidden" name="w" value="" id="w" />
				<input type="hidden" name="h" value="" id="h" />
				<br />
<input name="upload_thumbnail" type="submit" class="black_button" id="save_thumb" value="Save Thumbnail" />
			</form>
		</div>
	<hr />
	<?php 	} ?>
	<form name="photo" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <span class="b_text">Select Picture:</span> 
    <input type="file" name="image" size="30" />
  <input name="upload" type="submit" value="Upload" />



</form>
<p>
    
    
  <?php }  ?>
</p>
    <p>&nbsp;</p>
    <p>

<?php 
if($_GET["thumb"]=="ok" || $_GET["upload"]!="ok") { ?>
    
	<?php 	
	if($_SESSION["wz"]=="1") 
	{include "wz_links.php";}
	else
	{
	?>
    <a href="profile_info.php" target="_parent" class="black_button" style="color:white">Back</a> 
    <?php } ?>

<?php } ?>  
    </p>
<p>&nbsp;</p>
</body>
</html>
