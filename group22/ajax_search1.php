<?php
require_once('../confic.php');

$actionName = $_POST["action"];
if($actionName == "showPost"){

	$resultData = [];
	$search_key = $_POST["search_key"];
	$search_type = $_POST["search_type"];

	$searchKey = '';
	if(!empty($search_key)){
		if($search_type == 'single'){
			$searchKey .= " where post_title like '%".$search_key."%' ";
			$searchKey .= " or post_desc like '%".$search_key."%' ";
		}else if($search_type == 'many'){
			$searchKey .= " where atname REGEXP '". str_replace(" ", "|", $search_key) ."' ";
			$searchKey .= " or typeAttraction REGEXP '". str_replace(" ", "|", $search_key) ."' ";
		}
	}

	//get rows query
	$query = "SELECT * FROM attractions ".$searchKey." ORDER BY attracID DESC ";
	$result = mysqli_query($con, $query);

	//number of rows
	$rowCount = mysqli_num_rows($result);

	if($rowCount > 0){
	    while($row = mysqli_fetch_assoc($result)){
	    	$resultData[] = $row;
	    }
	}

	echo json_encode($resultData);
}
?>
