<?php
include('connect.php');


if( isset($_REQUEST['id']) ){
    $delete = $_REQUEST['id'];

		$sql1 = "SELECT * FROM accomimages WHERE acID ='".$delete."'";
		$query1 = mysqli_query($con, $sql1);
 //ลบแถวไฟล์รูปภาพของตารางลูก
	while($result1 = mysqli_fetch_assoc($query1)){
				$image = $result1['imageURL'];
				$file= $image;
				unlink($file);
		}

    //ลบแถวของลูกก่อน
		$sql2 = "DELETE FROM accomimages WHERE acID ='".$delete."'";
		if ($con->query($sql2) === TRUE) {
			 echo "accomimages Record deleted successfully";

			 //ลบตารางแม่ต่อ
			$sql3 = "SELECT * FROM accommodation WHERE acID ='".$delete."'";
	 		$query3 = mysqli_query($con, $sql3);
			//ลบแถวไฟล์รูปภาพของตารางแม่
			 while($result3 = mysqli_fetch_assoc($query3)){
		 				$image = $result3['image'];
		 				$file= $image;
		 				unlink($file);
		 		}
				//ลบแถวแม่ต่อ
				$sql4 = "DELETE FROM accommodation WHERE acID ='".$delete."'";
				if ($con->query($sql4) === TRUE) {
					 echo "accommodation Record deleted successfully";
				}else {
	 				echo "accommodation Error deleting record: " . $con->error;
	 		 }
		 } else {
				echo "accomimages Error deleting record: " . $con->error;
		 }

			$con->close();
			header("location:EmpSelectCom.php");
}else {
	    echo "Error";
}

?>
