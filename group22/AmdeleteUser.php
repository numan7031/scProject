<?php
	include('connect.php');


	if( isset($_REQUEST['id']) ){
	    $delete = $_REQUEST['id'];

		//ลบแถวของลูกก่อน
		$sql2 = "DELETE FROM review WHERE userID ='".$delete."'";
		if ($con->query($sql2) === TRUE) {
			 echo "review Record deleted successfully";


				$sql3 = "SELECT * FROM users WHERE userID ='".$delete."'";
		 		$query3 = mysqli_query($con, $sql3);
				//ลบแถวไฟล์รูปภาพของตารางแม่
				 while($result3 = mysqli_fetch_assoc($query3)){
			 				$image = $result3['image'];
			 				$file= $image;
			 				unlink($file);
			 		}

        //ลบแถวแม่ต่อ
				$sql4 = "DELETE FROM users WHERE userID ='".$delete."'";
				if ($con->query($sql4) === TRUE) {
					 echo "users Record deleted successfully";
				}else {
					echo "users Error deleting record: " . $con->error;
			 }

		 }
 //finloop
		 else {
				echo "review Error deleting record: " . $con->error;
		      }

			$con->close();
			header("location:index1.php");

	  }else {
			echo "Error";
	  }
   mysqli_close($con);
	?>
