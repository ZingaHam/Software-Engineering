<?php
//connecting to sql server
define('DB_SERVER', '172.31.86.95:3306');
define('DB_USERNAME', 'web_server');
define('DB_PASSWORD', 'CS_Seniors23');
define('DB_DATABASE', 'site_data');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Check connection
if (!($db)){
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>