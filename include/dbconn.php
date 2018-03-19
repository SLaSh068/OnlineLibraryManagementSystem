<?php 
session_start();
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "lms";
mysql_connect($servername, $dbusername,$dbpassword);
mysql_select_db($dbname);
?>