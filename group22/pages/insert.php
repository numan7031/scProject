<html>
<head>
<title>Lab2</title>
</head>
<body>
	<?php
	session_start();
	require_once("../connect.php");
	if (($_POST["textUsername"] <> "") && ($_POST["phone"] <> "") && ($_POST["textarea"] <> "") &&
	      ($_POST["textareas"] <> "") && ($_POST["lat"] <> "") && ($_POST["lng"] <> ""))
	        {


							$resname = $_POST["textUsername"];
							$phone = $_POST["phone"];
							$adress = $_POST["textarea"];
							$description = $_POST["textareas"];
							$lat = $_POST["lat"];
							$lng = $_POST["lng"];

							} else exit("คณุยังกรอกขอ้มลูไมค่รบ!");

						 $sql = "INSERT INTO users (resname,phone,adress,description,lat,lng)";
						 $sql .="VALUES ";
						 $sql .="('".$_POST["textUsername"]."','".$_POST["phone"]."','".$_POST["textarea"]."','".$_POST["textareas"]."','".$_POST["lat"]."','".$_POST["lng"]."') ";
    $update = $con->query($sql);
    if ($update) {
      echo "Insert successfully!!";
    } else {
      //echo "ErrorException";
			echo "Error: " . $sql . "<br>" . $con->error;
    }


 ?>
 <form>
 	<p><a href="../pages/insertrestaurant.php">Go to Profile</a></p>
 </form>
</body>
</html>
