<?php
   $serverName	  = "localhost";
   $user = "root";
   $password = "";
   $database = "products";
   $db = mysqli_connect($serverName,$user,$password,$database);
   $db->query("SET NAMES UTF8");

	if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
		exit();
	}
 ?>
