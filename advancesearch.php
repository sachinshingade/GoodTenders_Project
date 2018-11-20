<?php

	session_start();
	include_once('header.php');
	require 'dbconnect.php';
	require 'stopwords.php';
	$pagination = "";
	$searchKey[] = "";
	$searchWords[] = "";
	mysqli_query ($conn,"set character_set_results='utf8'");

	
		if(isset($_GET["page"])) 
		{ 
			$page  = $_GET["page"]; 
		} 
		else{
			$page=1; 
		}
		
		
			if(isset($_SESSION["id"])):
				$num_rec_per_page = 10;
			else:
				if($page ==3 )
				{
					$num_rec_per_page = 2;
					
				}else if ($page > 3){
					
					$num_rec_per_page = 0;
					
				}else{
					
					$num_rec_per_page = 10;
				}
			endif;
	
	
	$start_from = ($page-1) * $num_rec_per_page; 

?>
<html>
<head>

<title>GoodTenders | Tenders By Regions | Tenders By Country | Tenders By Keywords | Tenders By Political Regions | Tenders By Sector | Tenders By Funding Agency</title>

<style type="text/css">

	@media screen and (max-width: 425px) { 
    	.check_tender{
    		margin-top: 1% !important; 
    	}
    }	
	.card-body
	{
		margin:5%;
		border: 1px solid #BFBFBF;
    	background-color: white;
    	box-shadow: 3px 3px 3px #aaaaaa;
	}
	.list-inline{
		margin: 5% 5% -4% 5%;
	}
	.list-inline a{
		width: 100%;
		height: 100%;
		display: block;
		background: linear-gradient(to right, #07b107 50%, #34434e 50%);
		background-size: 200% 100%;
		background-position: right bottom;
		transition: all .5s ease-out;
		color: #ffffff;
	}
	.list-inline a:hover{
		background-color: #07b107;
		color: #ffffff;
		border: 1px solid #344343;
		background-position: left bottom;
	}
	.advance-search-job:hover
	{
		border: 1px solid #BFBFBF;
		box-shadow: 3px 3px 3px #aaaaaa;
	}
	input[type="checkbox"]{
		cursor: pointer;
		width: 15px;
		height: 15px;
	}
	.priceInfo
	{
		padding: 3%;
		position: absolute;
    	top: 40%;
    	left: 50%;
    	transform: translate(-50%, -50%);
    	border: 1px solid #BFBFBF;
    	box-shadow: 3px 3px 3px #aaaaaa;
    	background-color: #35434e;
    	color: #fff;
	}
	.adsearch{
		float: right;
		margin:10px;
		color:#000;
	}
	#advanced_search{
		margin-top:10px;
		padding-top: 2%;
		padding-bottom: 2%;
		display: none;
		background-color: #35434e;
	}
	.btn .btn-title{
		background-color: #35434e; 
	}
	.label{
		font-size: 1.1em;
		color: #000;
	}
	#btpadd{
		margin:5%;
	}
	.tender_content h5{
		font-size: 1.1em;
		color: #000000;
		text-align: justify;
	}
	.pr-btn{
		margin-left: 10% !important;
		text-align: center;
		font-weight: bold;
	}
	.inner-header-title{
		background: #6e7272;
		color:#282C32; ; 
	}
	.inner-header-title .form-control{
		color: #000000;
	}
	.inner-header-title h3{
		margin-bottom: 2%;
		color:#ffffff; 
	}
	.btns_section .btn-conf{
    	background-color: #344343;
    	color: #ffffff;
    }
    .advance-search-caption{
    	cursor: pointer;
    }

    .advance-search-caption:hover h4{
    	color: #337ab7;
    }
    @media screen and (max-width: 780px) { 
    	select{
    		width:100%;
    		font-size: 0.5em;
    	}
    	#datepicker1{
    		margin-top: 10px;
    	}
    	#datepicker2{
    		margin-top: 10px;
    	}
    	.sector_div{
    		margin-top: 10px;
    	}
    	.locations_div{
    		margin-top: 10px;
    		margin-bottom: 10px;
    	}
    }	
</style>
</head>

<body>
	
	<!-- Header showing search and advanced search -->
	<section class='inner-header-title'>
			<div class='container'>
				<h3>Search For Latest Tenders</h3>
				<div class="col-md-12 col-sm-12" style="margin-bottom: -5%;">
				<form class="form-horizontal" action="" method="post">
				<div class="row" style="margin-bottom: 1%;">	
				<div class="col-md-5 small-padd">
					<select class="keywords" data-style="form-control" data-width="100%" data-dropup-auto="false" multiple name="keyword">
					
					</select>	
				</div>
				<div class="col-md-4 small-padd locations_div">
					<select class="locations" data-style="form-control" data-width="100%" data-dropup-auto="false" multiple name="location">
										   	
					</select>
				</div>
				<div class="col-md-3 small-padd">
					<button type="submit" id="search" class="btn btn-primary searchbtn"><strong>SEARCH</strong></button>
				</div>
				</div>
				<div class="row">		
					<div class="col-md-4 col-sm-4 small-padd">
						<select class="cpv" data-style="form-control" data-width="100%" 
						multiple="multiple" name="cpv" data-dropup-auto="false">
						
						</select>
					</div>
					<div class="col-md-4 col-sm-4 small-padd sector_div">
						<select class="sector" data-style="form-control" data-width="100%" title="Select a Sector" data-size="5" name="sector">
							
						</select>			
					</div>
					<div class="col-md-4 col-sm-4 small-padd">
						<input type="text" id="deadline1" name="deadline1" class="form-control" placeholder="Deadline From">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 small-padd">
						<select class="selectpicker" data-style="form-control" data-width="100%" title="Select Funding Type" name="funding_type">
							
							<option value="Financed">Financed</option>
							<option value="Self Financed">Self Financed</option>
						</select>
					</div>
					<div class="col-md-4 col-sm-4 small-padd">
						<select class="funding" data-style="form-control" data-width="100%" data-size="5" name="funding_agency">
						
						</select>	
					</div>
					<div class="col-md-4 col-sm-4 small-padd">
						<input type="text" id="deadline2" name="deadline2" class="form-control" placeholder="Deadline To">					
					</div>
	
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 small-padd">
						<select class="selectpicker" data-style="form-control" data-width="100%" title="Live Tenders" name="live">
							
						    <option value="Live">Live</option>
							<option value="Archive-2018_tbl_tenders">Archive-2018</option>
							<option value="Archive-2017_tbl_tenders">Archive-2017</option>
							<option value="Archive-2016_tbl_tenders">Archive-2016</option>
							<option value="Archive-2015_tbl_tenders">Archive-2015</option>
						</select>
					</div>
					<div class="col-md-4 col-sm-4 small-padd">
						<select class="selectpicker" data-style="form-control" data-width="100%" title="Tender Type" name="tender_type">
							
							<option value="icb">ICB</option>
							<option value="ncb">NCB</option>
						</select>	
					</div>
					<div class="col-md-4 col-sm-4 small-padd">
						<select class="selectpicker" data-style="form-control" data-width="100%" title="Tender Value" name="tender_value">
							
							<option value="1">High</option>
							<option value="2">Low</option>
						</select>	
					</div>
					<button type="reset" class="btn btn-link" style="color:white;text-decoration:underline;float: right;" onclick="resetSelect()">Reset</button>
					
				</div>
			</form>
				</div>		
			</div>
	</section>



<?php



if(isset($_REQUEST['ikeyword']) || isset($_REQUEST['ilocation']) || isset($_REQUEST['icpv']) || isset($_REQUEST['isector']) || isset($_REQUEST['ideadline1']) || isset($_REQUEST['ideadline2']) || isset($_REQUEST['ifunding_type']) || isset($_REQUEST['ifunding_agency']) || isset($_REQUEST['ilive']) || isset($_REQUEST['itender_type']) || isset($_REQUEST['itender_value']))
			{		
				
			// end pagination logic for tenders data
			    @$keyword 		= $_REQUEST['ikeyword'];
				@$location 		= $_REQUEST['ilocation'];
				@$cpv 			= $_REQUEST['icpv'];
				@$sector 		= $_REQUEST['isector'];
				@$deadline_frm 	= $_REQUEST['ideadline1'];
				@$deadline_to 	= $_REQUEST['ideadline2'];
				@$funding_type 	= $_REQUEST['ifunding_type'];
				@$financier 	= $_REQUEST['ifunding_agency'];
				@$live 			= $_REQUEST['ilive'];
				@$tender_type 	= $_REQUEST['itender_type'];
				@$tender_value 	= $_REQUEST['itender_value'];
			} else {
				echo 'No data set. Please Redirect to index <a href="index.php" > </a>';
			}
				

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

	global $start_from,$num_rec_per_page;	
	# And Query 
	if(isset($keyword , $location , $cpv , $sector ,$deadline_frm, $deadline_to, 
			$funding_type ,$financier, $live,$tender_type, $tender_value ) )
			{
				//echo 'Inside AND isset';
				
				$query = "SELECT * FROM ".$live_table." WHERE ";
				$query .=" short_description like '%" . $keyword . "%'";		
									  
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
						
				$query .= " STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')   >= STR_TO_DATE( '".$deadline_frm."','%d-%m-%Y %H:%i') AND STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')  <= STR_TO_DATE('".$deadline_to."' , '%d-%m-%Y %H:%i')";

				if($funding_type == "Self Financed"){
					$query .= " AND financier = 0";
				}else{
					$query .= " AND financier != 0";
				}
				//$query .= " AND financier = '".$funding_type."'";

				$query .= " AND financier = (select id from tbl_financier where financier = '".$financier."' )";

				$query .= " AND ncbicb = '".$tender_type."'";

				$query .= " AND ext1 = '".$tender_value."'";
				
				$query .= 'ORDER BY gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.'';
				
					//echo $query ;
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
									$query .= " STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')   >= STR_TO_DATE( '".$deadline_frm."','%d-%m-%Y %H:%i') AND STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')  <= STR_TO_DATE('".$deadline_to."' , '%d-%m-%Y %H:%i')";
								}
								
								
							if(isset($funding_type)){
								if($funding_type == "Self Financed"){
										$query .= " AND financier = 0";
									}else{
										$query .= " AND financier != 0";
									}
							}
							
							if(isset($financier)){
								$query .= " AND financier = (select id from tbl_financier where financier = '".$financier."' )";
							}
							
							if(isset($tender_type)){
								$query .= " AND ncbicb = '".$tender_type."'";
							}				
							
							if(isset($tender_value)){
								$query .= " AND ext1 = '".$tender_value."'";
							}
							
							
							$query .= ' ORDER BY gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.' ';
								//echo $query ;
								$result = mysqli_query($conn,$query);
								
						if(mysqli_num_rows($result) > 0){
							$row = mysqli_fetch_array($result);	
							}						
						else{
							
								//echo 'Inside singular';
								
								# Additional Searches

								# Base Query 
								$query = "SELECT * FROM ".$live_table." WHERE ";

								if (!empty($live_table) && is_null($keyword) && is_null($location) && is_null($cpv) && is_null($sector) && is_null($deadline_frm) && is_null($deadline_to) && is_null($funding_type ) && is_null($financier) && is_null($tender_type) && is_null($tender_value )     )
								{
									$query = "SELECT * FROM ".$live_table;
								}


									if(isset($keyword)){
										
										$query .=" short_description like '%" . $keyword . "%'";
										
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
										$query .= " STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')   >= STR_TO_DATE( '".$deadline_frm."','%d-%m-%Y %H:%i') AND STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')  <= STR_TO_DATE('".$deadline_to."' , '%d-%m-%Y %H:%i')";
									}
								   
									if(isset($funding_type)){
										if($funding_type == "Self Financed"){
											$query .= " financier = 0";
										}else{
											$query .= " financier != 0";
										}
									}
								   
									if(isset($financier)){
										$query .= " financier = (select id from tbl_financier where financier = '".$financier."' )";
									}
								   
									if(isset($tender_type)){
										$query .= " ncbicb = '".$tender_type."'";
									}
								   
									if(isset($tender_value)){
										$query .= " ext1 = '".$tender_value."'";
									}
								   
								   
									
									$query .= ' ORDER BY gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.' ';
									//echo $query ;
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
	
		else if((!empty($keyword) || !empty($location) || !empty($cpv) || !empty($sector)) &&
					(!empty($deadline_frm) || !empty($deadline_to) || !empty($funding_type) || !empty($financier) ||
					!empty($live) || !empty($tender_type) || !empty($tender_value )))
		{
				
				
				//echo 'Inside OR Isset';
				$query = "SELECT * FROM ".$live_table." WHERE ";

				if (!empty($live_table) && is_null($keyword) && is_null($location) && is_null($cpv) && is_null($sector) && is_null($deadline_frm) && is_null($deadline_to) && is_null($funding_type ) && is_null($financier) && is_null($tender_type) && is_null($tender_value )     )
					{
						$query = "SELECT * FROM ".$live_table;
					}

					if(isset($keyword)){
						
						$query .=" short_description like '%" . $keyword . "%'";
						
						
					}
					  
					 
					if(isset($location)){
						
						$query .= " OR
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
						
						$query .= " OR cpv_value like '%" .$cpv. "%'";
					
					}
				   
					if(isset($sector)){
						
						$query .= " And short_description like '%" . $sector . "%'";
						
						for($i = 1; $i < count($searchWords); $i++) {
							if(!empty($searchWords[$i])) {
								$query .= " OR short_description like '%" . $searchWords[$i] . "%'";
							}
						}
					}
				   
					if(!empty($deadline_frm) && !empty($deadline_to)){
						$query .= " And STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')   >= STR_TO_DATE( '".$deadline_frm."','%d-%m-%Y %H:%i') AND STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')  <= STR_TO_DATE('".$deadline_to."' , '%d-%m-%Y %H:%i')";
					}
				   
					if(!empty($funding_type)){
						if($funding_type == "Self Financed"){
							$query .= " And financier = 0";
						}else{
							$query .= " And financier!= 0";
						}
					}
				   
					if(!empty($financier)){
						$query .= " And financier = (select id from tbl_financier where financier = '".$financier."' )";
					}
				   
					if(!empty($tender_type)){
						$query .= " And ncbicb = '".$tender_type."'";
					}
				   
					if(!empty($tender_value)){
						$query .= "  And ext1 = '".$tender_value."'";
					}
				   
				   
					
					$query .= ' ORDER BY gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.' ';


					//echo $query ;
					$result = mysqli_query($conn,$query);
					
					if(mysqli_num_rows($result) > 0){
						$row = mysqli_num_rows($result);
						}
					else{
				
						//echo 'Inside singular';
			
			
						# Additional Searches

						# Base Query 
						$query = "SELECT * FROM ".$live_table." WHERE ";

						if (!empty($live_table) && is_null($keyword) && is_null($location) && is_null($cpv) && is_null($sector) && is_null($deadline_frm) && is_null($deadline_to) && is_null($funding_type ) && is_null($financier) && is_null($tender_type) && is_null($tender_value )     )
						{
							$query = "SELECT * FROM ".$live_table;
						}


							if(isset($keyword)){
								
								$query .=" short_description like '%" . $keyword . "%'";
								
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
								$query .= " STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')   >= STR_TO_DATE( '".$deadline_frm."','%d-%m-%Y %H:%i') AND STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')  <= STR_TO_DATE('".$deadline_to."' , '%d-%m-%Y %H:%i')";
							}
						   
							if(isset($funding_type)){
								if($funding_type == "Self Financed"){
									$query .= " financier = 0";
								}else{
									$query .= " financier!= 0";
								}
							}
						   
							if(isset($financier)){
								$query .= " financier = (select id from tbl_financier where financier = '".$financier."' )";
							}
						   
							if(isset($tender_type)){
								$query .= " ncbicb = '".$tender_type."'";
							}
						   
							if(isset($tender_value)){
								$query .= " ext1 = '".$tender_value."'";
							}
						   
						   
							
							$query .= ' ORDER BY gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.' ';
							//echo $query ;
							$result = mysqli_query($conn,$query);
							
							
							$row = mysqli_fetch_array($result);
							
						}
			
				
				
	}else{
				
				//echo 'Inside singular';
	
	
				# Additional Searches

				# Base Query 
				$query = "SELECT * FROM ".$live_table." WHERE ";

				if (!empty($live_table) && is_null($keyword) && is_null($location) && is_null($cpv) && is_null($sector) && is_null($deadline_frm) && is_null($deadline_to) && is_null($funding_type ) && is_null($financier) && is_null($tender_type) && is_null($tender_value )     )
					{
						$query = "SELECT * FROM ".$live_table;
					}

					if(isset($keyword)){
						
						$query .=" short_description like '%" . $keyword . "%'";
						
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
						$query .= " STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')   >= STR_TO_DATE( '".$deadline_frm."','%d-%m-%Y %H:%i') AND STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')  <= STR_TO_DATE('".$deadline_to."' , '%d-%m-%Y %H:%i')";
					}
				   
					if(!empty($funding_type)){
						if($funding_type == "Self Financed"){
							$query .= " financier = 0";
						}else{
							$query .= " financier!= 0";
						}
					}
				   
					if(!empty($financier)){
						$query .= " financier = (select id from tbl_financier where financier = '".$financier."' )";
					}
				   
					if(!empty($tender_type)){
						$query .= " ncbicb = '".$tender_type."'";
					}
				   
					if(!empty($tender_value)){
						$query .= " ext1 = '".$tender_value."'";
					}
				   
				   
					
					$query .= ' ORDER BY gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.' ';
					//echo $query ;
					$result = mysqli_query($conn,$query);
					
					
					$row = mysqli_num_rows($result);
					
				}

				//Pagination on search and advance search when user not logged in
					if(empty($_SESSION["id"]))
					{
						$total_records = mysqli_num_rows($result);  //count number of records						
						$total_pages = 3;
						
						echo $query;
				###
						
						global $pagination;
						$pagination =  "<div class='row'>
												<ul class='pagination'>
													<li class='disabled'>";
					
						$pagination .= "<a href='showtenders.php?Page=allAds";
									if(!is_null($keyword)){
										$pagination .= "&ikeyword=" .$keyword;
									}
									if(!is_null($location)){
										$pagination .= "&ilocation=" .$location;
									}  
									if(!is_null($cpv)){
										$pagination .= "&icpv=" .$cpv;
									}									
									if(!is_null($sector)){
										$pagination .= "&isector=" .$sector;
									}
									if(!is_null($deadline_frm)){
										$pagination .= "&ideadline1=" .$deadline_frm;
									}
									if(!is_null($deadline_to)){
										$pagination .= "&ideadline2=" .$deadline_to;
									}
									if(!is_null($funding_type)){
										$pagination .= "&ifunding_type=" .$funding_type;
									}
									if(!is_null($financier)){
										$pagination .= "&ifunding_agency=" .$financier;
									}
									if(!is_null($live)){
										$pagination .= "&ilive=" .$live;
									}
									if(!is_null($tender_type)){
										$pagination .= "&itender_type=" .$tender_type;
									}
									if(!is_null($tender_type)){
										$pagination .= "&itender_value=" .$tender_value;
									}
						$pagination .= "&page=1'>" . '&laquo;' . "</a> </li>"; // Goto 1st page  
						for ($i = 1; $i <= $total_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='showtenders.php?Page=allAds";
									if(!is_null($keyword)){
										$pagination .= "&ikeyword=" .$keyword;
									}
									if(!is_null($location)){
										$pagination .= "&ilocation=" .$location;
									}  
									if(!is_null($cpv)){
										$pagination .= "&icpv=" .$cpv;
									}									
									if(!is_null($sector)){
										$pagination .= "&isector=" .$sector;
									}
									if(!is_null($deadline_frm)){
										$pagination .= "&ideadline1=" .$deadline_frm;
									}
									if(!is_null($deadline_to)){
										$pagination .= "&ideadline2=" .$deadline_to;
									}
									if(!is_null($funding_type)){
										$pagination .= "&ifunding_type=" .$funding_type;
									}
									if(!is_null($financier)){
										$pagination .= "&ifunding_agency=" .$financier;
									}
									if(!is_null($live)){
										$pagination .= "&ilive=" .$live;
									}
									if(!is_null($tender_type)){
										$pagination .= "&itender_type=" .$tender_type;
									}
									if(!is_null($tender_type)){
										$pagination .= "&itender_value=" .$tender_value;
									}
									

									$pagination .= "&page=" . $i . "'>" . $i . "</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='showtenders.php?Page=allAds";
											if(!is_null($keyword)){
										$pagination .= "&ikeyword=" .$keyword;
									}
									if(!is_null($location)){
										$pagination .= "&ilocation=" .$location;
									}  
									if(!is_null($cpv)){
										$pagination .= "&icpv=" .$cpv;
									}									
									if(!is_null($sector)){
										$pagination .= "&isector=" .$sector;
									}
									if(!is_null($deadline_frm)){
										$pagination .= "&ideadline1=" .$deadline_frm;
									}
									if(!is_null($deadline_to)){
										$pagination .= "&ideadline2=" .$deadline_to;
									}
									if(!is_null($funding_type)){
										$pagination .= "&ifunding_type=" .$funding_type;
									}
									if(!is_null($financier)){
										$pagination .= "&ifunding_agency=" .$financier;
									}
									if(!is_null($live)){
										$pagination .= "&ilive=" .$live;
									}
									if(!is_null($tender_type)){
										$pagination .= "&itender_type=" .$tender_type;
									}
									if(!is_null($tender_type)){
										$pagination .= "&itender_value=" .$tender_value;
									}
									$pagination .= "&page=$total_pages'>" . 
											'&raquo;' . "</a> </li>
										</ul></div>";
					}else{

						$total_records = mysqli_num_rows($result);  //count number of records
						$total_pages = ceil($total_records / $num_rec_per_page);

						global $pagination;
						$pagination =  "<div class='row'>
												<ul class='pagination'>
													<li class='disabled'>";
					
						$pagination .= "<a href='showtenders.php?data1=" .$keyword. "&data2=" .$location. "&data3=" .$cpv. "&data4=" .$sector. "&data5=" .$deadline_frm. "&data6=" .$deadline_to. "&data7=" .$funding_type. "&data8=" .$financier. "&data9=" .$live. "&data10=" .$tender_type. "&data11=" .$tender_value. "&Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; // Goto 1st page  
						for ($i = 1; $i <= $total_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='showtenders.php?data1=" .$keyword. "&data2=" .$location. "&data3=" .$cpv. "&data4=" .$sector. "&data5=" .$deadline_frm. "&data6=" .$deadline_to. "&data7=" .$funding_type. "&data8=" .$financier. "&data9=" .$live. "&data10=" .$tender_type. "&data11=" .$tender_value. "&Page=allAds&page=" . $i . "'>" . $i . "</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='showtenders.php?data1=" .$keyword. "&data2=" .$location. "&data3=" .$cpv. "&data4=" .$sector. "&data5=" .$deadline_frm. "&data6=" .$deadline_to. "&data7=" .$funding_type. "&data8=" .$financier. "&data9=" .$live. "&data10=" .$tender_type. "&data11=" .$tender_value. "&Page=allAds&page=$total_pages'>" . 
											'&raquo;' . "</a> </li>
										</ul></div>";

					}					

?>


<?php

include_once('footer.php');

?>

<script src="assets/js/mab-jquery-taginput.js"></script>
<script src="assets/js/typeahead.bundle.min.js"></script>
				
<script type="text/javascript">
			$(".btns_section").hide();
			var checkboxes = $(".check_tender");
			checkboxes.click(function() {
    			if($(this).is(":checked")) {
        			$(".btns_section").show(300);
    			} else {
        			$(".btns_section").hide(200);
    			}
			});
			
			function onRedirect(id){
				var noRedirect = '.btn';
  				window.open("tenderdetails.php?tnd="+id,"_blank");
  					
			}

			function onModal(){
				$('#errorModal').modal('show');
			}

			$('.keywords').select2({
				placeholder: "Type Keywords....",
				tags:true,
				ajax: {
    				url: "searchkeywords.php",
				   	type: "post",
				   	dataType: 'json',
				   	delay: 250,
					data: function (params) {
					    return {
					    	searchTerm: params.term // search term
					    };
					},
					processResults: function (response) {
					    return {
					    	results: response
					    };
					},
					cache: true
				}
			});
			$('.locations').select2({
				placeholder: "Type Locations....",
				ajax: {
    				url: "searchlocations.php",
				   	type: "post",
				   	dataType: 'json',
				   	delay: 250,
					data: function (params) {
					    return {
					    	searchTerm: params.term // search term
					    };
					},
					processResults: function (response) {
					    return {
					    	results: response
					    };
					},
					cache: true
				}
			});


			$('.cpv').select2({
				placeholder: "CPV",
				ajax: {
    				url: "searchcpv.php",
					type: "post",
					dataType: 'json',
					delay: 250,
					data: function (params) {
					    return {
					    	searchTerm: params.term // search term
					    };
					},
					processResults: function (response) {
					    return {
					    	results: response
					    };
					},
						cache: true
				}
			});

			$('.funding').select2({
				placeholder: "List of Funding Agency",
				ajax: {
    				url: "searchfinancier.php",
				   	type: "post",
				   	dataType: 'json',
				   	delay: 250,
					data: function (params) {
					    return {
					    	searchTerm: params.term // search term
					    };
					},
					processResults: function (response) {
					    return {
					    	results: response
					    };
					},
					cache: true
				}
			});

			$('.sector').select2({
				placeholder: "Select Sector",
				ajax: {
    				url: "searchsector.php",
				   	type: "post",
				   	dataType: 'json',
				   	delay: 250,
					data: function (params) {
					    return {
					    	searchTerm: params.term // search term
					    };
					},
					processResults: function (response) {
					    return {
					    	results: response
					    };
					},
					cache: true
				}
			});

			$("#connect_modal").click(function() {
    			$('html,body').animate({
        		scrollTop: $(".footer-widget").offset().top},
        		'slow');
			});

			function showgetBack(){
				alert("we will get back to you");
			}

			function resetSelect(){

  				$(".keywords").val('').trigger('change');
  				$(".locations").val('').trigger('change');
  				$(".cpv").val('').trigger('change');
  				$(".sector").val('').trigger('change');
  				$(".funding").val('').trigger('change');
  				$(".selectpicker").val('').trigger('change');
  			}

			</script>

	</body>
	
	</html>		
