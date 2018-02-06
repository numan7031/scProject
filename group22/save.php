<html>
<head>
<title>Lab2</title>
</head>
<body>
	<?php
	$conn = mysqli_connect("localhost","root","","scdb");
	$conn->query("SET NAMES UTF8");
if (isset($_POST['Submit'])) {
	$target_path="./img/";
	$userID = $_POST["iduser"];
	$username = $_POST["textUsername"];
	$fname = $_POST["textFirstName"];
	$lname = $_POST["textLastName"];
	$email = $_POST["txtUsername"];
	$password = $_POST["txtPassword"];
	$target_path=$target_path.basename($_FILES['uploadedfile']['name']);
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)){

    $sql = "UPDATE users SET username = '$username',
                             fname = '$fname',
                             lname = '$lname',
														 email = '$email',
														 password = '$password',
														 image = '$target_path'
                         WHERE
                             userID = '$userID'";
    $update = $conn->query($sql);
    if ($update) {
      echo "Update successfully!!";
    } else {
      //echo "ErrorException";
			echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}

 ?>
 <form>
 	<p><a href="editRegister.php">Go to Profile</a></p>
 </form>
</body>
</html>
