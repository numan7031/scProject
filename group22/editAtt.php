<html>
<head>
<title>Lab2</title>
</head>
<body>
	<?php
	session_start();
	require_once("connect.php");
if (isset($_POST['Submit'])) {
	$target_path="./img_att/";
	$attracID = $_POST["attracID"];
	$typeAttraction = $_POST["typeAttraction"];
	$typeID = $_POST["typeID"];
	$typeWifi = $_POST["typewifi"];
	$typeThreeG = $_POST["typeThreeG"];
	$typeToilet = $_POST["typeToilet"];
	$typeTourdesk = $_POST["typeTourdesk"];
	$typeMedical = $_POST["typeMedical"];
	$typeSecurity = $_POST["typeSecurity"];
	$typeFac = $_POST["typefac"];
	$typeUnseen = $_POST["typeUnseen"];
	$typeName = $_POST["textAtname"];
	$typeHistory = $_POST["textHistory"];
	$typeAdress = $_POST["textAdress"];
	$typeLat = $_POST["textLat"];
	$typeLong = $_POST["textLong"];
	$typeTravel = $_POST["textTravel"];
	$typeAdvice = $_POST["textTra"];
	$typePrice = $_POST["textPrice"];
	$typeActivity = $_POST["textActivity"];
	$typefestival = $_POST["textfestival"];
	$typeVar = $_POST["textVar"];
	$typeIn = $_POST["textIn"];
	$typeOut = $_POST["textout"];
	$target_path=$target_path.basename($_FILES['upload']['name']);
	if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)){

    $sql = "UPDATE attractions SET atname = '$typeName',
                             adress = '$typeAdress',
                             traveladvice = '$typeTravel',
														 price = '$typePrice',
														 lat = '$typeLat',
														 lng = '$typeLong',
														 activities = '$typeActivity',
														 toilet = '$typeToilet',
														 threeGfourG = '$typeThreeG',
														 unseen = '$typeUnseen',
														 security	 = '$typeSecurity',
														 facilitiesfordisabled = '$typeFac',
														 advicefordisabled = '$typeAdvice',
														 wifi = '$typeWifi',
														 history = '$typeHistory',
														 tourdesk = '$typeTourdesk',
														 festival = '$typefestival',
														 variousnature = '$typeVar',
														 replacein = '$typeIn',
														 replaceout = '$typeOut',
														 Medical = '$typeMedical',
														 type_id = '$typeID',
														 typeAttraction = '$typeAttraction',
														 image = '$target_path'
                         WHERE
                             	attracID = '$attracID'";
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
