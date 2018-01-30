<html>
<head>
<title>Lab2</title>
</head>
<body>
	<?php
	session_start();
	require_once("../connect.php");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
if (($_POST["typeAttraction"] <> "") &&($_POST["typeID"] <> "") &&($_POST["txtWifi"] <> "") &&($_POST["txtThreeG"] <> "") &&($_POST["txtUnseen"] <> "") &&($_POST["txtToilet"] <> "")
&&($_POST["txtTourdesk"] <> "") &&($_POST["txtMedical"] <> "") &&($_POST["txtFac"] <> "") &&($_POST["txtHistory"] <> "") &&($_POST["txtActivities"] <> "") &&($_POST["txtFestival"] <> "")
&&($_POST["txtSecurity"] <> "") &&($_POST["txtVar"] <> "") &&($_POST["txtOut"] <> "") &&($_POST["txtIn"] <> "")
&&($_POST["textAtname"] <> "") && ($_POST["textTravel"] <> "") && ($_POST["textPrice"] <> "") &&($_POST["textLat"] <> "") && ($_POST["textLong"] <> "") && ($_POST["textAdress"] <> ""))
        {
					$typeAttraction = $_POST["typeAttraction"];
					$type_id = $_POST["typeID"];
					$wifi = implode(',', $_POST["txtWifi"]);
          $threeGfourG = implode(',', $_POST["txtThreeG"]);
          $unseen = implode(',', $_POST["txtUnseen"]);
          $toilet = implode(',', $_POST["txtToilet"]);
					$tourdesk = implode(',', $_POST["txtTourdesk"]);
					$Medical = implode(',', $_POST["txtMedical"]);
					$facilitiesfordisabled = implode(',', $_POST["txtFac"]);
					$history = implode(',', $_POST["txtHistory"]);
					$activities = implode(',', $_POST["txtActivities"]);
					$festival = implode(',', $_POST["txtFestival"]);
					$security = implode(',', $_POST["txtSecurity"]);
					$variousnature = implode(',', $_POST["txtVar"]);
					$replaceout = implode(',', $_POST["txtOut"]);
					$replacein = implode(',', $_POST["txtIn"]);
					$atname = $_POST["textAtname"];
					$traveladvice = $_POST["textTravel"];
					$price = $_POST["textPrice"];
					$lat = $_POST["textLat"];
					$lng = $_POST["textLong"];
					$adress = $_POST["textAdress"];
					$target_path=$_POST['uploadedfile'];

 }
$sql = "INSERT INTO attractions (typeAttraction,type_id,wifi,threeGfourG,unseen,toilet,tourdesk,Medical,facilitiesfordisabled,history,activities,festival,security,variousnature,replaceout,replacein,atname,traveladvice,price,lat,lng,adress,image)";
$sql .="VALUES ";
$sql .="('".$_POST["typeAttraction"]."','".$_POST["typeID"]."','".$_POST["txtWifi"]."','".$_POST["txtThreeG"]."','".$_POST["txtUnseen"]."','".$_POST["txtToilet"]."','".$_POST["txtTourdesk"]."'
,'".$_POST["txtMedical"]."','".$_POST["txtFac"]."','".$_POST["txtHistory"]."','".$_POST["txtActivities"]."','".$_POST["txtFestival"]."','".$_POST["txtSecurity"]."','".$_POST["txtVar"]."','".$_POST["txtOut"]."'
,'".$_POST["txtIn"]."','".$_POST["textAtname"]."','".$_POST["textTravel"]."','".$_POST["textPrice"]."','".$_POST["textLat"]."','".$_POST["textLong"]."','".$_POST["textAdress"]."','".$_POST["uploadedfile"]."') ";

if ($con->query($sql) === TRUE) {
    echo "Insertion successfully!!";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
<form>
	<p><a href="index4.php">Go to Home</a></p>
</form>
</body>
</html>
