<?php
 
// Getting uploaded file
$file = $_FILES["file"];
 
// Uploading in "uploads" folder
move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);
 
// Redirecting back
if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != ""){
$url = $_SERVER['HTTP_REFERER'];
}else{
$url = "index.php";
}

header("Location: ".$url);;
