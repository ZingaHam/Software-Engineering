<?php
define('DB_SERVER', '127.0.0.1:3306');
define('DB_USERNAME', 'swe-root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'SWE_SQL_connection');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>