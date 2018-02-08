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
	$resID = $_POST["resID"];
	$textresname = $_POST["textresname"];
	$textadress = $_POST["textadress"];
	$textphone = $_POST["textphone"];
	$textDescription = $_POST["textDescription"];
	$textLat = $_POST["textLat"];
	$textLong = $_POST["textLong"];

	$target_path=$target_path.basename($_FILES['upload']['name']);
	if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)){

    $sql = "UPDATE restaurant SET resname = '$textresname',
                             adress = '$textadress',
														 lat = '$textLat',
														 lng = '$textLong',
														 phone = '$textphone',
														 description = '$textDescription',
														 attracID = '$attID',
														 image = '$target_path'
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
 	<p><a href="selectRes.php">กลับไปยังหน้าข้อมูลสถานที่ท่องเที่ยว</a></p>
 </form>
</body>
</html>
