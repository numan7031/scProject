
	<?php
	// connect to the database
	$_review = $_REQUEST['rev'];
	$_user = 1;
	$_point = $_REQUEST['poin'];
	$_attrac = $_REQUEST['att'];
	$_datenow = date("Y-m-d H:i:s");

	if( !isset($_SESSION["userID"]) ){
	    header("location:../../index3.php");
	    exit();
	}else {
		$_user = $_SESSION["userID"];
	}
	//echo "'.$_images.'<br />";

	$conn=mysqli_connect("localhost", "root", "","scdb");
	$conn->query("SET NAMES UTF8");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	//echo $_gender;
	//$_genderup = ucwords($_gender);
	//echo $_genderup;

	$sql = "INSERT INTO review(datereview,reviewdes, score, userID, attracID) VALUES ('$_datenow','$_review','$_point','$_user','$_attrac')";

	if(mysqli_query($conn, $sql)){

		echo "Insertion successfully.";

	} else{

		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

	}



	// close connection

	mysqli_close($conn);

	?>
