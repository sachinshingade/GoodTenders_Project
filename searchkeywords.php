<?php

	include('dbconnect.php');
	mysqli_query ($conn,"set character_set_results='utf8'");

	if(!isset($_POST['searchTerm'])){ 
  		$fetchData = mysqli_query($conn,"select keywordstext from keywords");
		}else{ 
  			$search = $_POST['searchTerm'];   
  			$fetchData = mysqli_query($conn,"select keywordstext from keywords where keywordstext like '%".$search."%'");
		} 

		$data = array();
		while ($row = mysqli_fetch_array($fetchData)) {    
		  $data[] = array("id"=>$row['keywordstext'], "text"=>$row['keywordstext']);
		}
		echo json_encode($data);
?>