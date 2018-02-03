<?php
//db details
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'scdb';

//connect and select db
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 $con->query("SET NAMES UTF8");
?>
