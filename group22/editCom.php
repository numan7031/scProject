<html>
<head>
<title>Lab2</title>
</head>
<body>
	<?php
	session_start();
	require_once("connect.php");
if (isset($_POST['Submit'])) {
	$target_path="./img_accom/";
	$attID = $_POST["attID"];
	$acID = $_POST["acID"];
	$textacname = $_POST["textacname"];
	$adress = $_POST["adress"];
	$textphone = $_POST["textphone"];
	$description = $_POST["description"];
	$textLat = $_POST["textLat"];
	$textLong = $_POST["textLong"];

	$target_path=$target_path.basename($_FILES['upload']['name']);
	if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)){

    $sql = "UPDATE accommodation SET acname = '$textacname',
                             adress = '$adress',
														 lat = '$textLat',
														 lng = '$textLong',
														 phone = '$textphone',
														 description = '$description',
														 attracID = '$attID',
														 image = '$target_path'
                         WHERE
                             	acID = '$acID'";
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
 	<p><a href="selectRes.php">กลับไปยังหน้าข้อมูลสถานที่ท่องเที่ยว</a></p>
 </form>
</body>
</html>
