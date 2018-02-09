<html>
<head>
<title>Lab2</title>
</head>
<body>
	<?php
	session_start();
	require_once("connect.php");
if (isset($_POST['Submit'])) {
	$target_path="./img_souvenir/";
	$attID = $_POST["attID"];
	$servID = $_POST["servID"];
	$textname = $_POST["textname"];
	$adress = $_POST["adress"];
	$textphone = $_POST["textphone"];
	$textLat = $_POST["textLat"];
	$textLong = $_POST["textLong"];

	$target_path=$target_path.basename($_FILES['upload']['name']);
	if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)){

    $sql = "UPDATE souvenir SET name = '$textname',
                             adress = '$adress',
														 lat = '$textLat',
														 lng = '$textLong',
														 phone = '$textphone',
														 attracID = '$attID',
														 image = '$target_path'
                         WHERE
                             	servID = '$servID'";
    $update = $con->query($sql);
    if ($update) {
      echo "Update successfully!!";
    } else {
      //echo "ErrorException";
			echo "Error: " . $sql . "<br>" . $con->error;
    }
}
}

 ?>
 <form>
 	<p><a href="selectSou.php">กลับไปยังหน้าข้อมูลสถานที่ท่องเที่ยว</a></p>
 </form>
</body>
</html>
