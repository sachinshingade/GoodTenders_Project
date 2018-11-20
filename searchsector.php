<?php

	include('dbconnect.php');
	mysqli_query ($conn,"set character_set_results='utf8'");



	if(!isset($_POST['searchTerm'])){ 
  		$fetchData = mysqli_query($conn,"select DISTINCT Sector_Name from tbl_sector");
		}else{ 
  			$search = $_POST['searchTerm'];   
  			$fetchData = mysqli_query($conn,"select DISTINCT Sector_Name from tbl_sector where Sector_Name like '%".$search."%'");
		} 

		$data = array();
		while ($row = mysqli_fetch_array($fetchData)) {    
		  $data[] = array("id"=>$row['Sector_Name'], "text"=>$row['Sector_Name']);
		}
		echo json_encode($data);
?>