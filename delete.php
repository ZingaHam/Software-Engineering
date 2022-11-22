<?php
//automatic redirection back to the landing page by specifying it in a header
header("location:index.php"); 
// Built-in PHP function to delete file
unlink($_GET["name"]);
 

