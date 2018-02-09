<?php
	$conn = mysqli_connect("localhost","root","","scdb");
	$conn->query("SET NAMES UTF8");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

    $id = $_REQUEST['id'];

	$sql = "DELETE souvenir FROM souvenir LEFT JOIN attractions ON souvenir.attracID = attractions.attracID WHERE servID=" . $id;

	if (mysqli_query($conn, $sql)) {
		echo "ID " . $id . " Deleted Already!!<br><br>";
		echo "<a href=\"selectSou.php\">Go to Home</a>";
	} else {
		echo "Error deleting record: " . mysqli_error($conn);
	}

	mysqli_close($conn);
?>
