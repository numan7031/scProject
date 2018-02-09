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
	$history = $_POST["history"];
	$adress = $_POST["adress"];
	$typeLat = $_POST["textLat"];
	$typeLong = $_POST["textLong"];
	$traveladvice = $_POST["traveladvice"];
	$advicefordisabled = $_POST["advicefordisabled"];
	$typePrice = $_POST["textPrice"];
	$activities = $_POST["activities"];
	$typefestival = $_POST["textfestival"];
	$variousnature = $_POST["variousnature"];
	$replacein = $_POST["replacein"];
	$replaceout = $_POST["replaceout"];
	$target_path=$target_path.basename($_FILES['upload']['name']);
	if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)){

    $sql = "UPDATE attractions SET atname = '$typeName',
                             adress = '$adress',
                             traveladvice = '$traveladvice',
														 price = '$typePrice',
														 lat = '$typeLat',
														 lng = '$typeLong',
														 activities = '$activities',
														 toilet = '$typeToilet',
														 threeGfourG = '$typeThreeG',
														 unseen = '$typeUnseen',
														 security	 = '$typeSecurity',
														 facilitiesfordisabled = '$typeFac',
														 advicefordisabled = '$advicefordisabled',
														 wifi = '$typeWifi',
														 history = '$history',
														 tourdesk = '$typeTourdesk',
														 festival = '$typefestival',
														 variousnature = '$variousnature',
														 replacein = '$replacein',
														 replaceout = '$replaceout',
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
