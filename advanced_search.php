<?php

require 'dbconnect.php';
require 'stopwords.php';


@$keyword 		= $_REQUEST['keyword'];
@$location 		= $_REQUEST['location'];
@$cpv 			= $_REQUEST['cpv'];
@$sector 		= $_REQUEST['sector'];
@$deadline_frm 	= $_REQUEST['deadline1'];
@$deadline_to 	= $_REQUEST['deadline2'];
@$funding_type 	= $_REQUEST['funding_type'];
@$financier 	= $_REQUEST['funding_agency'];
@$live 			= $_REQUEST['live'];
@$tender_type 	= $_REQUEST['tender_type'];
@$tender_value 	= $_REQUEST['tender_value'];


if($live == 'Archive-2015_tbl_tenders'){
	$live_table = 'Archive-2015_tbl_tenders';
}else if($live == 'Archive-2016_tbl_tenders'){
	$live_table = 'Archive-2016_tbl_tenders';
}else if($live == 'Archive-2017_tbl_tenders'){
	$live_table = 'Archive-2017_tbl_tenders';
}else if($live == 'Archive-2018_tbl_tenders'){
	$live_table = 'Archive-2018_tbl_tenders';
}else{
	$live_table = 'tbl_tenders';
}


	# Breaking of keywords for efficient search
			@$kw = explode(" ", $keyword );
			
		# Removing Stopwords from English Library
		foreach ($kw as $kwi) {
			if (!in_array($kwi, $stopwords) && (trim($kwi) != '')) {
				$searchKey[] = $kwi;
			} else {
				$junkKey[] = $kwi;
			}
		}

		# Breaking of keywords for efficient search
			$kws = explode(" ",$sector);
			
		# Removing Stopwords from English Library
		foreach ($kws as $word) {
			if (!in_array($word, $stopwords) && (trim($word) != '')) {
				$searchWords[] = $word;
			} else {
				$junkWords[] = $word;
			}
		}

		
# And Query 
if(isset($keyword , $location , $cpv , $sector ,$deadline_frm, $deadline_to, 
			$funding_type ,$financier, $live,$tender_type, $tender_value ) )
			{
				echo 'Inside AND isset';
				
				$query = "SELECT * FROM ".$live_table." WHERE ";
				$query .=" short_description like '%" . $keyword . "%'";		
						
						# Breaking of keywords for efficient search
						@$kw = explode(" ", $keyword );
						
						for($i = 0; $i < count($searchKey); $i++) {
							if(!empty($searchKey[$i])) {
								$query .= " OR short_description like '%" . $searchKey[$i] . "%'";
							}
						  }
						  
				$query .= " AND
										org_country LIKE concat('%','".$location."','%')
									OR 
										org_country IN (SELECT 
											Distinct(R.Country_Short_Code) FROM 
												tbl_region as R 
											INNER JOIN 
												tbl_pol_region as P 
											ON 
												R.geo_group_id like concat('%','".$location."','%') 
											AND 
												P.Region_Code like concat('%','".$location."','%'))
												
									
									";

				$query .= " AND cpv_value like '%" .$cpv. "%'";

				$query .= " AND short_description like '%" . $sector . "%'";
					 
						
						
						# Breaking of keywords for efficient search
						$kws = explode(" ",$sector);
						for($i = 1; $i < count($searchWords); $i++) {
							if(!empty($searchWords[$i])) {
								$query .= " OR short_description like '%" . $searchWords[$i] . "%'";
							}
						}
						
				$query .= " AND deadline BETWEEN  '$deadline_frm' AND  '$deadline_to'";

				$query .= " AND financier = '$funding_type'";

				$query .= " AND financier = (select id from tbl_financier where financier = '$financier' )";

				$query .= " AND ncbicb = '$tender_type'";

				$query .= " AND ext1 = '$tender_value'";
				
				$query .= ' Limit 10 ';
				
					echo $query ;
					$result = mysqli_query($conn,$query);
					
					if(mysqli_num_rows($result) > 0){
						$row = mysqli_num_rows($result);
					
					}
					else if(isset($keyword) || isset($location) || isset($cpv) || isset($sector) ||
					isset($deadline_frm) || isset( $deadline_to) || isset($funding_type) || isset($financier) ||
					isset($live) || isset($tender_type) || isset($tender_value ))
					{
								

							$query = "SELECT * FROM ".$live_table." WHERE ";
							$query .=" short_description like '%" . $keyword . "%'";		
									
									# Breaking of keywords for efficient search
									@$kw = explode(" ", $keyword );
									
									for($i = 0; $i < count($searchKey); $i++) {
										if(!empty($searchKey[$i])) {
											$query .= " OR short_description like '%" . $searchKey[$i] . "%'";
										}
									  }
									  
							$query .= "OR
													org_country LIKE concat('%','".$location."','%')
												OR 
													org_country IN (SELECT 
														Distinct(R.Country_Short_Code) FROM 
															tbl_region as R 
														INNER JOIN 
															tbl_pol_region as P 
														ON 
															R.geo_group_id like concat('%','".$location."','%') 
														AND 
															P.Region_Code like concat('%','".$location."','%'))
															
												
												";

							$query .= " OR cpv_value like '%" .$cpv. "%'";

							$query .= " OR short_description like '%" . $sector . "%'";
								 
									
									
									# Breaking of keywords for efficient search
									$kws = explode(" ",$sector);
									for($i = 1; $i < count($searchWords); $i++) {
										if(!empty($searchWords[$i])) {
											$query .= " OR short_description like '%" . $searchWords[$i] . "%'";
										}
									}
									
							if(!empty($deadline_frm) && !empty($deadline_to)){
									$query .= " AND deadline BETWEEN  '$deadline_frm' AND  '$deadline_to'";
								}
								
								
							if(isset($funding_type)){
								$query .= " AND financier = '$funding_type'";
							}
							
							if(isset($financier)){
								$query .= " AND financier = (select id from tbl_financier where financier = '$financier' )";
							}
							
							if(isset($tender_type)){
								$query .= " AND ncbicb = '$tender_type'";
							}				
							
							if(isset($tender_value)){
								$query .= " AND ext1 = '$tender_value'";
							}
							
							
							$query .= ' Limit 10 ';
								echo $query ;
								$result = mysqli_query($conn,$query);
								
						if(mysqli_num_rows($result) > 0){
							$row = mysqli_fetch_array($result);	
							}						
						else{
							
										echo 'Inside singular';
								
								# Additional Searches

								# Base Query 
								$query = "SELECT * FROM ".$live_table." WHERE ";

									if(isset($keyword)){
										
										$query .=" short_description like '%" . $keyword . "%'";
										
										for($i = 0; $i < count($searchKey); $i++) {
											if(!empty($searchKey[$i])) {
												$query .= " OR short_description like '%" . $searchKey[$i] . "%'";
											}
										  }
										
										
									}
									  
									 
									if(isset($location)){
										
										$query .= "
														org_country LIKE concat('%','".$location."','%')
													OR 
														org_country IN (SELECT 
															Distinct(R.Country_Short_Code) FROM 
																tbl_region as R 
															INNER JOIN 
																tbl_pol_region as P 
															ON 
																R.geo_group_id like concat('%','".$location."','%') 
															AND 
																P.Region_Code like concat('%','".$location."','%'))
																
													
													";
									}
								   
									if(isset($cpv)){
										
										$query .= " cpv_value like '%" .$cpv. "%'";
									
									}
								   
									if(isset($sector)){
										
										$query .= " short_description like '%" . $sector . "%'";
										
										for($i = 1; $i < count($searchWords); $i++) {
											if(!empty($searchWords[$i])) {
												$query .= " OR short_description like '%" . $searchWords[$i] . "%'";
											}
										}
									}
								   
									if(!empty($deadline_frm) && !empty($deadline_to)){
										$query .= " deadline BETWEEN  '$deadline_frm' AND  '$deadline_to'";
									}
								   
									if(isset($funding_type)){
										$query .= " financier = '$funding_type'";
									}
								   
									if(isset($financier)){
										$query .= " financier = (select id from tbl_financier where financier = '$financier' )";
									}
								   
									if(isset($tender_type)){
										$query .= " ncbicb = '$tender_type'";
									}
								   
									if(isset($tender_value)){
										$query .= " ext1 = '$tender_value'";
									}
								   
								   
									
									$query .= ' Limit 10 ';
									echo $query ;
									$result = mysqli_query($conn,$query);
									
									# if data > 0 put in $row
									if(mysqli_num_rows($result) > 0){
										$row = mysqli_num_rows($result);
									}
													
						
						}
								
					}else {
						echo 'No tenders Found';
					}
			}
	
	else if(isset($keyword) || isset($location) || isset($cpv) || isset($sector) ||
					isset($deadline_frm) || isset( $deadline_to) || isset($funding_type) || isset($financier) ||
					isset($live) || isset($tender_type) || isset($tender_value ))
	{
				
				
						echo 'Inside OR Isset';
				
				$query = "SELECT * FROM ".$live_table." WHERE ";
				$query .=" short_description like '%" . $keyword . "%'";		
						
						# Breaking of keywords for efficient search
						@$kw = explode(" ", $keyword );
						
						for($i = 0; $i < count($searchKey); $i++) {
							if(!empty($searchKey[$i])) {
								$query .= " OR short_description like '%" . $searchKey[$i] . "%'";
							}
						  }
						  
				$query .= "OR
										org_country LIKE concat('%','".$location."','%')
									OR 
										org_country IN (SELECT 
											Distinct(R.Country_Short_Code) FROM 
												tbl_region as R 
											INNER JOIN 
												tbl_pol_region as P 
											ON 
												R.geo_group_id like concat('%','".$location."','%') 
											AND 
												P.Region_Code like concat('%','".$location."','%'))
												
									
									";

				$query .= " OR cpv_value like '%" .$cpv. "%'";

				$query .= " OR short_description like '%" . $sector . "%'";
					 
						
						
						# Breaking of keywords for efficient search
						$kws = explode(" ",$sector);
						for($i = 1; $i < count($searchWords); $i++) {
							if(!empty($searchWords[$i])) {
								$query .= " OR short_description like '%" . $searchWords[$i] . "%'";
							}
						}
						
				if(!empty($deadline_frm) && !empty($deadline_to)){
						$query .= " AND deadline BETWEEN  '$deadline_frm' AND  '$deadline_to'";
					}
					
					
				if(isset($funding_type)){
					$query .= " AND financier = '$funding_type'";
				}
				
				if(isset($financier)){
					$query .= " AND financier = (select id from tbl_financier where financier = '$financier' )";
				}
				
				if(isset($tender_type)){
					$query .= " AND ncbicb = '$tender_type'";
				}				
				
				if(isset($tender_value)){
					$query .= " AND ext1 = '$tender_value'";
				}
				
				
				$query .= ' Limit 10 ';
					echo $query ;
					$result = mysqli_query($conn,$query);
					
					if(mysqli_num_rows($result) > 0){
						$row = mysqli_num_rows($result);

						while ($row = mysqli_fetch_array($result)) {
							echo $row['short_description'];
						}
						}
					else{
				
						echo 'Inside singular';
			
			
						# Additional Searches

						# Base Query 
						$query = "SELECT * FROM ".$live_table." WHERE ";

							if(isset($keyword)){
								
								$query .=" short_description like '%" . $keyword . "%'";
								
								for($i = 0; $i < count($searchKey); $i++) {
									if(!empty($searchKey[$i])) {
										$query .= " OR short_description like '%" . $searchKey[$i] . "%'";
									}
								  }
								
								
							}
							  
							 
							if(isset($location)){
								
								$query .= "
												org_country LIKE concat('%','".$location."','%')
											OR 
												org_country IN (SELECT 
													Distinct(R.Country_Short_Code) FROM 
														tbl_region as R 
													INNER JOIN 
														tbl_pol_region as P 
													ON 
														R.geo_group_id like concat('%','".$location."','%') 
													AND 
														P.Region_Code like concat('%','".$location."','%'))
														
											
											";
							}
						   
							if(isset($cpv)){
								
								$query .= " cpv_value like '%" .$cpv. "%'";
							
							}
						   
							if(isset($sector)){
								
								$query .= " short_description like '%" . $sector . "%'";
								
								for($i = 1; $i < count($searchWords); $i++) {
									if(!empty($searchWords[$i])) {
										$query .= " OR short_description like '%" . $searchWords[$i] . "%'";
									}
								}
							}
						   
							if(!empty($deadline_frm) && !empty($deadline_to)){
								$query .= " deadline BETWEEN  '$deadline_frm' AND  '$deadline_to'";
							}
						   
							if(isset($funding_type)){
								$query .= " financier = '$funding_type'";
							}
						   
							if(isset($financier)){
								$query .= " financier = (select id from tbl_financier where financier = '$financier' )";
							}
						   
							if(isset($tender_type)){
								$query .= " ncbicb = '$tender_type'";
							}
						   
							if(isset($tender_value)){
								$query .= " ext1 = '$tender_value'";
							}
						   
						   
							
							$query .= ' Limit 10 ';
							echo $query ;
							$result = mysqli_query($conn,$query);
							
							
							$row = mysqli_fetch_array($result);
							
						}
			
				
				
	}else{
				
				echo 'Inside singular';
	
	
				# Additional Searches

				# Base Query 
				$query = "SELECT * FROM ".$live_table." WHERE ";

					if(isset($keyword)){
						
						$query .=" short_description like '%" . $keyword . "%'";
						
						for($i = 0; $i < count($searchKey); $i++) {
							if(!empty($searchKey[$i])) {
								$query .= " OR short_description like '%" . $searchKey[$i] . "%'";
							}
						  }
						
						
					}
					  
					 
					if(isset($location)){
						
						$query .= "
										org_country LIKE concat('%','".$location."','%')
									OR 
										org_country IN (SELECT 
											Distinct(R.Country_Short_Code) FROM 
												tbl_region as R 
											INNER JOIN 
												tbl_pol_region as P 
											ON 
												R.geo_group_id like concat('%','".$location."','%') 
											AND 
												P.Region_Code like concat('%','".$location."','%'))
												
									
									";
					}
				   
					if(isset($cpv)){
						
						$query .= " cpv_value like '%" .$cpv. "%'";
					
					}
				   
					if(isset($sector)){
						
						$query .= " short_description like '%" . $sector . "%'";
						
						for($i = 1; $i < count($searchWords); $i++) {
							if(!empty($searchWords[$i])) {
								$query .= " OR short_description like '%" . $searchWords[$i] . "%'";
							}
						}
					}
				   
					if(!empty($deadline_frm) && !empty($deadline_to)){
						$query .= " deadline BETWEEN  '$deadline_frm' AND  '$deadline_to'";
					}
				   
					if(isset($funding_type)){
						$query .= " financier = '$funding_type'";
					}
				   
					if(isset($financier)){
						$query .= " financier = (select id from tbl_financier where financier = '$financier' )";
					}
				   
					if(isset($tender_type)){
						$query .= " ncbicb = '$tender_type'";
					}
				   
					if(isset($tender_value)){
						$query .= " ext1 = '$tender_value'";
					}
				   
				   
					
					$query .= ' Limit 10 ';
					echo $query ;
					$result = mysqli_query($conn,$query);
					
					
					$result = mysqli_fetch_array($result);
					
				}
			


?>