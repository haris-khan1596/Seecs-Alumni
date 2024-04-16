<?php
ob_start();
session_start(); 
//include "../links.php" ;
include "../control/dbcode.php";
include "../control/main.php";

?>
<link href="../style.css" rel="stylesheet" type="text/css">
<?php
$user_id=$_SESSION["user_id"];
//----------------------Validate file extention------------------------
$ext=basename( $_FILES['uploadedfile']['type']);
if($ext <> "pjpeg" and $ext <> "jpeg" and $ext <> "bmp" and $ext <> "png" and $ext <> "gif" and $ext <> "")
{
//echo "<br>  <div class=b_heading><font color=red> &nbsp;&nbsp;&nbsp;&nbsp; file type is not acceptable, Please only Select Image file </font></div>&nbsp;&nbsp;&nbsp;&nbsp; <a href=../pic.php>back</a>";
	$err="1";
	$URL="../pic.php?err=" . $err . " ";
	header ("Location: $URL");

exit;
}

//----------------------Validate Picture Size------------------------
$filesize= basename( $_FILES['uploadedfile']['size']);
if($filesize>100000 OR $filesize==0)//100 KB
{
//echo "<br>  <div class=b_heading><font color=red> &nbsp;&nbsp;&nbsp;&nbsp; Your picture file size exceed the maximum limit please upload picture upto 100 KB </font></div>&nbsp;&nbsp;&nbsp;&nbsp; <a href=../pic.php>back</a>";
	$err="2";
	$URL="../pic.php?err=" . $err . " ";
	header ("Location: $URL");

exit;
}

//----------------------------Start Uploading--------------------------------

// Where the file is going to be placed 
$target_path = "pic/";
// Add the original filename to our target path. Result is "uploads/filename.extension" 
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
$_FILES['uploadedfile']['tmp_name']; // This is how we will get the temporary file... 
//--------------------------------------------
$target_path = "pic/";
$folder_name = "pic/";
$file_name = $user_id . "_" . basename( $_FILES['uploadedfile']['name']);

//$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
//$target_path = $target_path .$sid. basename( $_FILES['uploadedfile']['name']); 

$target_path=$folder_name . "/" . $file_name;

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
     echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
} else{
  //   echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font class=b_text>There was an error uploading the file, please try again OR Choose different Picture! <br>&nbsp;&nbsp;&nbsp;&nbsp; <a href=../pic.php>back</a>";
  	$err="3";
	$URL="../pic.php?err=" . $err . " ";
	header ("Location: $URL");

	 exit;
} 
//-----------------------------Save to Database----------------------------
mysql_query("delete from pic where user_id='" . $user_id . "' "); 
$autonum=autonum("pic","autonum");
$sql="insert into pic values(" . $autonum . ", '" . $user_id . "','" . $folder_name . "','" . $file_name . "' )";
mysql_query($sql); 


$URL="../pic.php";
header ("Location: $URL");
?>
