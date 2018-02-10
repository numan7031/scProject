<?php
include('connect.php');


if( isset($_REQUEST['id']) ){
    $delete = $_REQUEST['id'];
//=============================================================================
    //ลบแถวไฟล์รูปภาพของตาราง attracimages
		$sql = "SELECT * FROM attracimages WHERE attracID ='".$delete."'";
		$query = mysqli_query($con, $sql);
 //ลบแถวไฟล์รูปภาพของตารางลูก
	while($result = mysqli_fetch_assoc($query)){
				$imageatt = $result['imageURL'];
				$fileatt = $imageatt;
				unlink($fileatt);
		}
    //ลบแถวของ attracimages
		$sql = "DELETE FROM attracimages WHERE attracID ='".$delete."'";
		if ($con->query($sql) === TRUE) {
			 echo "attracimages Record deleted successfully";
		 } else {
				echo "attracimages Error deleting record: " . $con->error;
		 }
//=============================================================================
     //ลบแถวของ review
		 $sql = "DELETE FROM review WHERE attracID ='".$delete."'";
 		if ($con->query($sql) === TRUE) {
 			 echo "review Record deleted successfully";
 		 } else {
 				echo "review Error deleting record: " . $con->error;
 		 }

//=============================================================================
    //ลบแถวที่มีไอดีของสถานที่ท่องเที่ยว
		$sql = "SELECT * FROM souvenir WHERE attracID ='".$delete."'";
		$query = mysqli_query($con, $sql);
		//ค้นหาแถวที่มีID ของสถานที่ท่องเที่ยว
		while($result = mysqli_fetch_assoc($query)){
				$sevid = $result['servID'];
				$servid = $sevid;

		   $sql = "SELECT * FROM souvenirimages WHERE servID ='".$servid."'";
 		   $query = mysqli_query($con, $sql);
  //ลบแถวไฟล์รูปภาพของตารางลูก
 	    while($result = mysqli_fetch_assoc($query)){
 				   $image = $result['imageURL'];
 				   $file= $image;
 				   unlink($file);
 		    }
     //ลบแถวของลูกก่อน
 		$sql = "DELETE FROM souvenirimages WHERE servID ='".$servid."'";
 		if ($con->query($sql) === TRUE) {
 			 echo "souvenirimages Record deleted successfully";
      }else {
				echo "souvenirimages Error deleting record: " . $con->error;
			}
			}
 			 //ลบตารางแม่ต่อ
 			$sql = "SELECT * FROM souvenir WHERE attracID ='".$delete."'";
 	 		$query = mysqli_query($con, $sql);
 			//ลบแถวไฟล์รูปภาพของตารางแม่
 			 while($result = mysqli_fetch_assoc($query)){
 		 				$image = $result['image'];
 		 				$file= $image;
 		 				unlink($file);
 		 		}
 				//ลบแถวแม่ต่อ
 				$sql = "DELETE FROM souvenir WHERE attracID ='".$delete."'";
 				if ($con->query($sql) === TRUE) {
 					 echo "souvenir Record deleted successfully";
 				}else {
 	 				echo "souvenir Error deleting record: " . $con->error;
        }

//=============================================================================
//ลบแถวที่มีไอดีของสถานที่ท่องเที่ยว
$sql = "SELECT * FROM restaurant WHERE attracID ='".$delete."'";
$query = mysqli_query($con, $sql);
//ค้นหาแถวที่มีID ของสถานที่ท่องเที่ยว
while($result = mysqli_fetch_assoc($query)){
	 $residtemp = $result['resID'];
	 $resid = $residtemp;

	$sql = "SELECT * FROM resimages WHERE resID ='".$resid."'";
		$query = mysqli_query($con, $sql);
//ลบแถวไฟล์รูปภาพของตารางลูก
	 while($result = mysqli_fetch_assoc($query)){
				$imageres = $result['imageURL'];
				$fileres= $imageres;
				unlink($fileres);
		 }
 //ลบแถวของลูกก่อน
 $sql = "DELETE FROM resimages WHERE resID ='".$resid."'";
 if ($con->query($sql) === TRUE) {
		echo "resimages Record deleted successfully";
	}else {
	 echo "resimages Error deleting record: " . $con->error;
 }
 }
		//ลบตารางแม่ต่อ
	 $sql = "SELECT * FROM restaurant WHERE attracID ='".$delete."'";
	 $query = mysqli_query($con, $sql);
	 //ลบแถวไฟล์รูปภาพของตารางแม่
		while($result = mysqli_fetch_assoc($query)){
				 $imager = $result['image'];
				 $filer= $imager;
				 unlink($filer);
		 }
		 //ลบแถวแม่ต่อ
		 $sql = "DELETE FROM restaurant WHERE attracID ='".$delete."'";
		 if ($con->query($sql) === TRUE) {
				echo "restaurant Record deleted successfully";
		 }else {
			 echo "restaurant Error deleting record: " . $con->error;
		}
//=============================================================================
//ลบแถวที่มีไอดีของสถานที่ท่องเที่ยว
$sql = "SELECT * FROM accommodation WHERE attracID ='".$delete."'";
$query = mysqli_query($con, $sql);
//ค้นหาแถวที่มีID ของสถานที่ท่องเที่ยว
while($result = mysqli_fetch_assoc($query)){
	 $acidtemp = $result['acID'];
	 $acid = $acidtemp;

	$sql = "SELECT * FROM accomimages WHERE acID ='".$acid."'";
		$query = mysqli_query($con, $sql);
//ลบแถวไฟล์รูปภาพของตารางลูก
	 while($result = mysqli_fetch_assoc($query)){
				$imageac = $result['imageURL'];
				$fileac = $imageac;
				unlink($fileac);
		 }
 //ลบแถวของลูกก่อน
 $sql = "DELETE FROM accomimages WHERE acID ='".$acid."'";
 if ($con->query($sql) === TRUE) {
		echo "accomimages Record deleted successfully";
	}else {
	 echo "accomimages Error deleting record: " . $con->error;
 }
 }
		//ลบตารางแม่ต่อ
	 $sql = "SELECT * FROM accommodation WHERE attracID ='".$delete."'";
	 $query = mysqli_query($con, $sql);
	 //ลบแถวไฟล์รูปภาพของตารางแม่
		while($result = mysqli_fetch_assoc($query)){
				 $imagea = $result['image'];
				 $filea= $imagea;
				 unlink($filea);
		 }
		 //ลบแถวแม่ต่อ
		 $sql = "DELETE FROM accommodation WHERE attracID ='".$delete."'";
		 if ($con->query($sql) === TRUE) {
				echo "accommodation Record deleted successfully";
		 }else {
			 echo "accommodation Error deleting record: " . $con->error;
		}
//=============================================================================
$sql = "SELECT * FROM attractions WHERE attracID ='".$delete."'";
$query = mysqli_query($con, $sql);
//ลบแถวไฟล์รูปภาพของตารางแม่
 while($result = mysqli_fetch_assoc($query)){
			$imageat = $result['image'];
			$fileat= $imageat;
			unlink($fileat);
	}
	//ลบแถวแม่ต่อ
	$sql = "DELETE FROM attractions WHERE attracID ='".$delete."'";
	if ($con->query($sql) === TRUE) {
		 echo "attractions Record deleted successfully";
	}else {
		echo "attractions Error deleting record: " . $con->error;
 }
 //=============================================================================



			$con->close();
			mysqli_close($con);
			header("location:selectAtt.php");
  }else {
	    echo "Error";
}

?>
