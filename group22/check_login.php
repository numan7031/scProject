<?php
	session_start();

	require_once("connect.php");

	$strUsername = mysqli_real_escape_string($con,$_POST['txtUsername']);
	$strPassword = mysqli_real_escape_string($con,$_POST['txtPassword']);

	$strSQL = "SELECT * FROM users WHERE email = '".$strUsername."'
	and Password = '".$strPassword."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
		echo "Username and Password Incorrect!";
		exit();
	}
	else
	{
		if($objResult["status"] == "user")
		{
			$_SESSION["userID"] = $objResult["userID"];
			session_write_close();
			header("location:index.php");
		}
		elseif($objResult["status"] == "admin")
		{
			//*** Update Status Login
			//$sql = "UPDATE member SET LoginStatus = '1' , LastUpdate = NOW() WHERE UserID = '".$objResult["UserID"]."' ";
			//$query = mysqli_query($con,$sql);

			//*** Session
			$_SESSION["userID"] = $objResult["userID"];
			session_write_close();

			//*** Go to Main page
			header("location:index1.php");
		}
		else
		{
			//*** Update Status Login
			//$sql = "UPDATE member SET LoginStatus = '1' , LastUpdate = NOW() WHERE UserID = '".$objResult["UserID"]."' ";
			//$query = mysqli_query($con,$sql);

			//*** Session
			$_SESSION["userID"] = $objResult["userID"];
			session_write_close();

			//*** Go to Main page
			header("location:index2.php");
		}

	}
	mysqli_close($con);
?>
