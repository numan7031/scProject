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
					$target_path="./img_accom/";
					$attID = $_POST["attID"];
					$textresname = $_POST["textacname"];
					$textadress = $_POST["textadress"];
					$textphone = $_POST["textphone"];
					$textDescription = $_POST["textDescription"];
					$textLat = $_POST["textLat"];
					$textLong = $_POST["textLong"];
					$target_path=$target_path.basename($_FILES['upload']['name']);
					if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)){
$sql = "INSERT INTO accommodation (`acname`, `lat`, `lng`, `description`, `adress`, `phone`, `attracID`, `image`)";
$sql .="VALUES ";
$sql .="('".$_POST["textacname"]."','".$_POST["textLat"]."','".$_POST["textLong"]."','".$_POST["textDescription"]."','".$_POST["textadress"]."'
,'".$_POST["textphone"]."','".$_POST["attID"]."','".$target_path."') ";

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
	<p><a href="index1.php">Go to Home</a></p>
</form>
</body>
</html>
