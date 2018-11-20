<?php		
/*
	include('dbconnect.php');
	mysqli_query ($conn,"set character_set_results='utf8'");


		if(!isset($_POST['searchTerm'])){ 
  		$fetchData = "SELECT DISTINCT Country From tbl_country UNION 
  						SELECT DISTINCT Region_Name FROM tbl_region UNION SELECT DISTINCT Sub_Region_Name FROM tbl_region UNION
  						SELECT DISTINCT Region_Name From tbl_pol_region";
  		$result =  mysqli_query($conn,$fetchData);
  		
		}else{ 
  			
  			$search = $_POST['searchTerm'];   
  			$fetchData = "(Select Country From tbl_country where Country like '".$search."%')
  			UNION
  			(SELECT DISTINCT Region_Name FROM tbl_region where Region_Name like '".$search."%') 
  			UNION 
  			(SELECT DISTINCT Sub_Region_Name FROM tbl_region where Sub_Region_Name like '".$search."%') UNION 
  			(SELECT DISTINCT Region_Name From tbl_pol_region where Region_Name like '".$search."%')";
  			
  			$result =  mysqli_query($conn,$fetchData);
		} 

		$data1 = array();
		
		while ($row = mysqli_fetch_array($result)) { 
			$data1[] = array("id"=>$row['Country'], "text"=>$row['Country']);
			
		}
		
		echo json_encode($data1);
	*/						






  include('dbconnect.php');
  mysqli_query ($conn,"set character_set_results='utf8'");


    if(!isset($_POST['searchTerm'])){ 
      $fetchData = "(SELECT DISTINCT (Code) as lcode, (Country) as lcountry From tbl_country) 
      UNION 
              (SELECT Region_Name as lcode, tbl_region.Region_Name as lcountry FROM tbl_region GROUP BY tbl_region.Region_Name) 
      UNION   (SELECT Sub_Region_Name as lcode,     
              tbl_region.Sub_Region_Name as lcountry FROM tbl_region GROUP BY tbl_region.Sub_Region_Name) 
      UNION
              (SELECT DISTINCT (Region_Code) as lcode, (Region_Name) as lcountry From tbl_pol_region)";
      $result =  mysqli_query($conn,$fetchData);
      
    }else{ 
        
        $search = $_POST['searchTerm'];   
        $fetchData = "(Select DISTINCT (Code) as lcode, (Country) as lcountry From tbl_country where tbl_country.Country like '%".$search."%')
        UNION
        (SELECT Region_Name as lcode, tbl_region.Region_Name as lcountry FROM tbl_region GROUP BY tbl_region.Region_Name Having tbl_region.Region_Name like '%".$search."%') 
        UNION 
        (SELECT Sub_Region_Name as lcode, tbl_region.Sub_Region_Name as lcountry FROM tbl_region GROUP BY tbl_region.Sub_Region_Name Having tbl_region.Sub_Region_Name like '%".$search."%') 
        UNION 
        (SELECT DISTINCT (Region_Code) as lcode, (Region_Name) as lcountry From tbl_pol_region Having tbl_pol_region.Region_Name like '%".$search."%')";
        
        $result =  mysqli_query($conn,$fetchData);
    } 

    $data1 = array();
    
    while ($row = mysqli_fetch_array($result)) { 
      $data1[] = array("id"=>$row['lcode'], "text"=>$row['lcountry']);
      
    }
    
    echo json_encode($data1);
              
?>