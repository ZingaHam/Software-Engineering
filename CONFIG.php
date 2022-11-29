<?php
define('DB_SERVER', 'ip-172-31-86-95.ec2.internal:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'CS_Seniors23');
define('DB_DATABASE', 'site_data');
$db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>