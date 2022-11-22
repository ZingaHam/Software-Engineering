<?php
 
// Built-in PHP function to delete file
unlink($_GET["name"]);
 
// Redirecting back
if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != ""){
$url = $_SERVER['HTTP_REFERER'];
}else{
$url = "index.php";
}

header("Location: ".$url);;
