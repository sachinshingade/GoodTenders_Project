<?php
	
	include('dbconnect.php');
	mysqli_query ($conn,"set character_set_results='utf8'");




	if(!isset($_POST['searchTerm'])){ 
  		$fetchData = mysqli_query($conn,"select id,financier from tbl_financier ORDER BY financier");
		}else{ 
  			$search = $_POST['searchTerm'];   
  			$fetchData = mysqli_query($conn,"select id,financier from tbl_financier where financier like '%".$search."%' ORDER BY financier");
		} 

	$data = array();
		while ($row = mysqli_fetch_array($fetchData)) {    
		  $data[] = array("id"=>$row['id'], "text"=>$row['financier']);
		}
	echo json_encode($data);
	?>