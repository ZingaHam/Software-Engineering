<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);

echo 'You have cleaned session';
$conn = null;
header('Refresh: 2; URL = login.php');
?>