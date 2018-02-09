<html>
<head>
<title>Lab2</title>
</head>
<body>
	<?php
	session_start();
	require_once("connect.php");
if (isset($_POST['Submit'])) {
	$target_path="./img_res/";
	$attID = $_POST["attID"];
	$textresname = $_POST["textresname"];
	$description = $_POST["description"];
	$adress = $_POST["adress"];
	$textLong = $_POST["textLong"];
	$textphone = $_POST["textphone"];
	$textLat = $_POST["textLat"];
	$textLong = $_POST["textLong"];
	$resID = $_POST["resID"];
	$target_path=$target_path.basename($_FILES['upload']['name']);
	if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)){

    $sql = "UPDATE restaurant SET resname = '$textresname',
                             lat = '$textLat',
                             lng = '$textLong',
														 description = '$description',
														 adress = '$adress',
														 phone = '$textphone',
														 image = '$target_path',
														 attracID = '$attID'
                         WHERE
                             resID = '$resID'";
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
 	<p><a href="selectAtt.php">กลับไปยังหน้าข้อมูลสถานที่ท่องเที่ยว</a></p>
 </form>
</body>
</html>
