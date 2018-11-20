<?php

	include('dbconnect.php');
	mysqli_query ($conn,"set character_set_results='utf8'");

	

	if(!isset($_POST['searchTerm'])){ 
  		$fetchData = mysqli_query($conn,"select code,CONCAT(code, _utf8 ' - ' ,description) AS CPV from tbl_cpv");
		}else{ 
  			$search = $_POST['searchTerm'];   
  			$fetchData = mysqli_query($conn,"select code,CONCAT(code, _utf8 '-' ,description) AS CPV from tbl_cpv where code like '".$search."%' OR description like '".$search."%'");
		} 

		$data = array();
		while ($row = mysqli_fetch_array($fetchData)) {    
		  $data[] = array("id"=>$row['code'], "text"=>$row['CPV']);
		}
		echo json_encode($data);
		
?>
