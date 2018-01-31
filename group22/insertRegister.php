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
if (($_POST["textStatus"] <> "") &&($_POST["textUsername"] <> "") && ($_POST["textFirstName"] <> "") && ($_POST["textLastName"] <> "") &&
      ($_POST["txtUsername"] <> "") && ($_POST["txtPassword"] <> ""))
        {
					$status = $_POST["textStatus"];
					$username = $_POST["textUsername"];
          $fname = $_POST["textFirstName"];
          $lname = $_POST["textLastName"];
          $email = $_POST["txtUsername"];
					$password = $_POST["txtPassword"];
 } else exit("คณุยังกรอกขอ้มลูไมค่รบ!");
$sql = "INSERT INTO users (status,username,fname,lname,email,password)";
$sql .="VALUES ";
$sql .="('".$_POST["textStatus"]."','".$_POST["textUsername"]."','".$_POST["textFirstName"]."','".$_POST["textLastName"]."','".$_POST["txtUsername"]."','".$_POST["txtPassword"]."') ";

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
