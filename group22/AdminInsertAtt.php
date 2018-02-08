<html>
<head>
<title>Lab2</title>
</head>
<body>
	<?php
	session_start();
	require_once("connect.php");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
if (isset($_POST['Submit'])) {
					$target_path="./img_att/";
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
$sql = "INSERT INTO attractions (`atname`, `adress`, `traveladvice`, `price`, `lat`, `lng`, `activities`, `toilet`, `threeGfourG`, `unseen`, `security`, `facilitiesfordisabled`, `advicefordisabled`, `wifi`, `history`, `tourdesk`, `festival`, `variousnature`, `replacein`, `replaceout`, `Medical`, `type_id`, `typeAttraction`, `image`)";
$sql .="VALUES ";
$sql .="('".$_POST["textAtname"]."','".$_POST["textAdress"]."','".$_POST["textTravel"]."','".$_POST["textPrice"]."','".$_POST["textLat"]."'
,'".$_POST["textLong"]."','".$_POST["textActivity"]."','".$_POST["typeToilet"]."','".$_POST["typeThreeG"]."','".$_POST["typeUnseen"]."'
,'".$_POST["typeSecurity"]."','".$_POST["typefac"]."','".$_POST["textTra"]."','".$_POST["typewifi"]."','".$_POST["textHistory"]."'
,'".$_POST["typeTourdesk"]."','".$_POST["textfestival"]."','".$_POST["textVar"]."','".$_POST["textIn"]."','".$_POST["textout"]."'
,'".$_POST["typeMedical"]."','".$_POST["typeID"]."','".$_POST["typeAttraction"]."','".$target_path."') ";

if ($con->query($sql) === TRUE) {
    echo "Insertion successfully!!";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
 }
}
$con->close();
?>
<form>
	<p><a href="index4.php">Go to Home</a></p>
</form>
</body>
</html>
