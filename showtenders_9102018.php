<!-- Tenders Listing Page -->
<!-- Traffic from every page came here to show tenders data -->

<?php
	session_start();
	include('header.php');
	require 'dbconnect.php';
	require 'stopwords.php';
	$pagination = "";
	$searchKey[] = "";
	$searchWords[] = "";
	$pquery = "";
	$searchLoc[] = "";
	$junkLoc[] = "";
	$arloci = "";
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


	// Fetching Data fro populating advanced search in showtenders page

				@$keyword 		= $_REQUEST['ikeyword'];
				@$location 		= $_REQUEST['ilocation'];
				//echo $location.'<br>';
				$arloc = array();
				$arloc = explode(',', $location);
				//print_r($arloc);

				foreach ($arloc as $arloci) {
						if (!in_array($arloci, $stopwords) && (trim($arloci) != '')) {
							$searchLoc[] = $arloci;
						} else {
							$junkLoc[] = $arloci;
						}
					}

					$searchLoc = array_filter($searchLoc);
					$searchLoc = array_unique($searchLoc);
					//print_r($searchLoc);
					$searchLocStr = implode(',',$searchLoc);
					//echo $searchLocStr;
				
				@$cpv 			= $_REQUEST['icpv'];
				@$sector 		= $_REQUEST['isector'];
				@$deadline_frm 	= $_REQUEST['ideadline1'];
				@$deadline_to 	= $_REQUEST['ideadline2'];
				@$funding_type 	= $_REQUEST['ifunding_type'];
				@$financier 	= $_REQUEST['ifunding_agency'];
				@$live 			= $_REQUEST['ilive'];
				@$tender_type 	= $_REQUEST['itender_type'];
				@$tender_value 	= $_REQUEST['itender_value'];
			
				

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

?>

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

<body>
	
	<!-- Header showing search and advanced search -->
	<section class='inner-header-title'>
			<div class='container'>
				<h3>Search For Latest Tenders</h3>
				<div class="col-md-12 col-sm-12" style="margin-bottom: -5%;">
				<form class="form-horizontal" action="showtenders.php?q=advancedsearch" method="post">
				<div class="row" style="margin-bottom: 1%;">	
				<div class="col-md-5 small-padd">
					<select class="keywords" data-style="form-control" data-width="100%" data-dropup-auto="false" multiple name="ikeyword">
					
					</select>	
				</div>
				<div class="col-md-4 small-padd locations_div">
					<select class="locations" data-style="form-control" data-width="100%" data-dropup-auto="false" multiple name="ilocation">
										   	
					</select>
				</div>
				<div class="col-md-3 small-padd">
					<button type="submit" id="search" class="btn btn-primary searchbtn"><strong>SEARCH</strong></button>
				</div>
				</div>
				<div class="row">		
					<div class="col-md-4 col-sm-4 small-padd">
						<select class="cpv" data-style="form-control" data-width="100%" 
						multiple="multiple" name="icpv" data-dropup-auto="false">
						
						</select>
					</div>
					<div class="col-md-4 col-sm-4 small-padd sector_div">
						<select class="sector" data-style="form-control" data-width="100%" title="Select a Sector" data-size="5" name="isector">
							
						</select>			
					</div>
					<div class="col-md-4 col-sm-4 small-padd">
						<input type="text" id="deadline1" name="ideadline1" class="form-control" placeholder="Deadline From">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 small-padd">
						<select class="selectpicker" data-style="form-control" data-width="100%" title="Select Funding Type" name="ifunding_type">
							
							<option value="Financed">Financed</option>
							<option value="Self Financed">Self Financed</option>
						</select>
					</div>
					<div class="col-md-4 col-sm-4 small-padd">
						<select class="funding" data-style="form-control" data-width="100%" data-size="5" name="ifunding_agency">
						
						</select>	
					</div>
					<div class="col-md-4 col-sm-4 small-padd">
						<input type="text" id="deadline2" name="ideadline2" class="form-control" placeholder="Deadline To">					
					</div>
	
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 small-padd">
						<select class="selectpicker" data-style="form-control" data-width="100%" title="Live Tenders" name="ilive">
							
						    <option value="Live">Live</option>
							<option value="Archive-2018_tbl_tenders">Archive-2018</option>
							<option value="Archive-2017_tbl_tenders">Archive-2017</option>
							<option value="Archive-2016_tbl_tenders">Archive-2016</option>
							<option value="Archive-2015_tbl_tenders">Archive-2015</option>
						</select>
					</div>
					<div class="col-md-4 col-sm-4 small-padd">
						<select class="selectpicker" data-style="form-control" data-width="100%" title="Tender Type" name="itender_type">
							
							<option value="icb">ICB</option>
							<option value="ncb">NCB</option>
						</select>	
					</div>
					<div class="col-md-4 col-sm-4 small-padd">
						<select class="selectpicker" data-style="form-control" data-width="100%" title="Tender Value" name="itender_value">
							
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

<!--	<div class='clearfix' style='margin-top:6%;'>	
		<a href="index.php" class="btn btn-primary" style="float:right;margin: 2%;max-width: 15%;">Refine Your Search</a>
</div> -->
</body>	

	
<?php

   	//$secretkey = "6Lfk_WUUAAAAACICOGvYuZIINIpYGJKPL7Um8mXs";
	if(isset($_GET['region'])){
		$rgname = $_GET['region'];
		$rgnames = "";
		if($_GET['region'] == "Australia/Oceania")
		{
			$rgnames = "Oceania";
		} else {
			$rgnames = $_GET['region'];
		}
		$sql_region = 'SELECT DISTINCT Sub_Region_Name FROM tbl_region 
						Where Region_Name = "'.$rgnames.'" AND Sub_Region_Name !="" ';
		$result_region = mysqli_query($conn,$sql_region);
		$rgrow = mysqli_num_rows($result_region);
		echo "<ul class='list-inline'>
				<li><a type='button' class='btn btn-tag'>".$_GET['region']."</a></li>";
		while($rgrow = mysqli_fetch_assoc($result_region))
		{
			echo "<li><a type='button' class='btn btn-tag'>".$rgrow['Sub_Region_Name']."</a></li>";
		}
		echo "</ul></div>";	
	}

    
    	
    // tenders listing section fixed headers
    	
    echo   "<div class='card-body'>
    		<div class='btns_section'>
			<div class='col-sm-12 col-lg-12 col-xs-12'>";
			if(isset($_SESSION["id"])):
			echo "
			<button class='btn btn-conf' title='Mark as Favourite' onclick='showgetBack()'
			>Favourite <i class='fa fa-star'></i></button>
			<button class='btn btn-conf' title='Mark as Read' onclick='showgetBack()'>Read <i class='fa'>&#xf2b7;</i></button>
			<button class='btn btn-conf' title='Mark as Delete' onclick='showgetBack()'>Delete <i class='fa fa-trash-o'></i></button>";
			else:
			echo "
			<button class='btn btn-conf' title='Mark as Favourite' data-toggle='modal' data-target='#errorModal'
			>Favourite <i class='fa fa-star'></i></button>
			<button class='btn btn-conf' title='Mark as Read' data-toggle='modal' data-target='#errorModal'>Read <i class='fa'>&#xf2b7;</i></button>
			<button class='btn btn-conf' title='Mark as Delete' data-toggle='modal' data-target='#errorModal'>Delete <i class='fa fa-trash-o'></i></button>";
			endif;	
			echo "</div>
			</div>	
    		<div class='row no-mrg' style='margin-top:5px;'>
    		<div class='col-md-6 col-sm-6'>
    		<strong><i class='fa fa-newspaper-o'></i> SUMMARY OF TENDERS</strong>
    		</div>";
    		if(isset($_SESSION["id"])):
    		echo "<div class='col-md-2 col-sm-6'>
    		<strong><i class='fa fa-map-marker'></i> COUNTRY</strong>
    		</div>";
    		else:
    		echo "<div class='col-md-2 col-sm-6'>
    		<strong><i class='fa fa-map-marker'></i> LOCATION</strong>
    		</div>";
    		endif;
    		echo "<div class='col-md-2 col-sm-6'>
    		<strong><i class='fa fa-hourglass-half'></i> DEADLINE</strong>
    		</div>	
    		<div class='col-md-2 col-sm-6'>
    		<strong><i class='fa fa-search'></i> QUICK VIEW</strong>
    		</div><hr>
    		</div>";

    		if(isset($_GET['Pageid'])){

    			if(empty($_SESSION["id"]))
				{
					$sql = 'SELECT B.*, A.Country FROM tbl_tenders 
							AS B INNER JOIN tbl_country as A 
							ON (B.org_country=A.code) 
							ORDER BY B.gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.'';
					
					$result = mysqli_query($conn,$sql);
					$row = mysqli_num_rows($result);
					$total_records = mysqli_num_rows($result);  //count number of records						
						$total_pages = 3;
							
							global $pagination;
							$pagination =  "<div class='row'>
													<ul class='pagination'>
														<li class='disabled'>";
						
							$pagination .= "<a href='showtenders.php?Pageid=Tenders&Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; // Goto 1st page  
							for ($i = 1; $i <= $total_pages; $i++)
							{
								$active = '';
								if(isset($_GET['page']) && $i == $_GET['page'])
								{
									$active = 'class="active"';        
								}
								$pagination .= "<li $active><a href='showtenders.php?Pageid=Tenders&Page=allAds&page=" . $i . "'>" . $i . "</a></li>";
							}
							$pagination .=  "<li >
												<a class='disabled' href='showtenders.php?Pageid=Tenders&Page=allAds&page=$total_pages'>" . 
												'&raquo;' . "</a> </li>
											</ul></div>";
							#echo $pagination;
				}else if(isset($_SESSION["id"])){
							$sql = 'SELECT B.*, A.Country FROM tbl_tenders 
							AS B INNER JOIN tbl_country as A 
							ON (B.org_country=A.code) 
							ORDER BY B.gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.'';

							$result = mysqli_query($conn,$sql);
							$row = mysqli_num_rows($result);
							$total_records = mysqli_num_rows($result);  //count number of records	
							$total_pages = ceil($total_records / $num_rec_per_page);

							$psql='SELECT B.*, A.Country FROM tbl_tenders 
							AS B INNER JOIN tbl_country as A 
							ON (B.org_country=A.code) 
							ORDER BY B.gt_id DESC';

							$presult =  mysqli_query($conn,$psql);
							$prow = mysqli_num_rows($presult);	           	 		
							$ptotal_records = mysqli_num_rows($presult);  //count number of records						
							$ptotal_pages = ceil($ptotal_records / $num_rec_per_page);
							
							
							global $pagination,$start_from,$num_rec_per_page;
							$pagination =  "<div class='row'>
												<ul class='pagination'>
													<li class='disabled'>";
						
							$pagination .=  "<a href='showtenders.php?Pageid=Tenders&Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; 
							// Goto 1st page  
							
							for ($i = 1; $i <= $ptotal_pages; $i++)
							{
								$active = '';
								if(isset($_GET['page']) && $i == $_GET['page'])
								{
									$active = 'class="active"';        
								}
							$pagination .= "<li $active><a href='showtenders.php?Pageid=Tenders&Page=allAds&page=" . $i . "'>" 
												. $i . 
												"</a></li>";
							}
							$pagination .=  "<li >
												<a class='disabled' href='showtenders.php?Pageid=Tenders&Page=allAds&page=$total_pages'>" 
												. '&raquo;' . "</a> 
											</li>
											</ul></div>";
											
							#echo $pagination;
							
					} else {
							echo "<h3 class='text-center'> No Tenders Found</h3>";
					}
			

			
		} elseif(isset($_GET['q'])) {

					# Put code of index.php query 

			// started Pagination Logic For Tenders Data Started to get values in data's variable
			
			if(isset($_REQUEST['ikeyword']) || isset($_REQUEST['ilocation']) || isset($_REQUEST['icpv']) || isset($_REQUEST['isector']) || isset($_REQUEST['ideadline1']) || isset($_REQUEST['ideadline2']) || isset($_REQUEST['ifunding_type']) || isset($_REQUEST['ifunding_agency']) || isset($_REQUEST['ilive']) || isset($_REQUEST['itender_type']) || isset($_REQUEST['itender_value']))
			{		
				
			// end pagination logic for tenders data
			    @$keyword 		= $_REQUEST['ikeyword'];
				@$location 		= $_REQUEST['ilocation'];
				//echo $location.'<br>';
				$arloc = array();
				$arloc = explode(',', $location);
				//print_r($arloc);

				foreach ($arloc as $arloci) {
					if (!in_array($arloci, $stopwords) && (trim($arloci) != '')) {
						$searchLoc[] = $arloci;
					} else {
						$junkLoc[] = $arloci;
					}
				}

					$searchLoc = array_filter($searchLoc);
					$searchLoc = array_unique($searchLoc);
					//print_r($searchLoc);
					$searchLocStr = implode(',',$searchLoc);
					//echo $searchLocStr;
				
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
	if(isset($keyword ) || isset($location) || isset($cpv) || isset($sector) || isset($deadline_frm) || isset($deadline_to) ||
			isset($funding_type) || isset($financier) || isset($live) || isset($tender_type) || isset($tender_value) )
			{
				//echo 'Inside AND isset';
				
				$query = "SELECT * FROM `".$live_table."` WHERE ";
				
				$query .=" short_description like '%" . $keyword . "%'";
				
				
				if(!empty($location)){
					$query .= " AND
											(org_country LIKE concat('%','".$location."','%')
										OR 
											org_country IN (SELECT 
												Distinct(Country_Short_Code) FROM 
													tbl_region WHERE geo_group_id = '".$searchLocStr."'
																	
										";
												
										foreach($searchLoc AS $s){
											$query .= " OR geo_group_id like concat('%','".$s."','%')";
										}
							$query .= "))";
				}
				
				if(!empty($cpv)){
					$query .= " AND cpv_value like '%" .$cpv. "%'";
				}
				
				if(!empty($sector)) {
					$query .= " AND short_description like '%" . $sector . "%'";
				
						# Breaking of keywords for efficient search
						$kws = explode(" ",$sector);
						for($i = 1; $i < count($searchWords); $i++) {
							if(!empty($searchWords[$i])) {
								$query .= " OR short_description like '%" . $searchWords[$i] . "%'";
							}
						}
					}
			
				if(!empty($deadline_frm) && !empty($deadline_to)){
					$query .= " AND STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')   >= STR_TO_DATE( '".$deadline_frm."','%d-%m-%Y %H:%i') AND STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')  <= STR_TO_DATE('".$deadline_to."' , '%d-%m-%Y %H:%i')";
				}

				if(!empty($funding_type)){
						if($funding_type == "Self Financed"){
							$query .= " AND financier = 0";
						}else{
							$query .= " AND financier != 0";
						}
				}
				//$query .= " AND financier = '".$funding_type."'";

				if(!empty($financier)){
					$query .= " AND financier = (select id from tbl_financier where financier = '".$financier."' )";
				}
				
				if(!empty($tender_type)){
					$query .= " AND ncbicb = '".$tender_type."'";
				}				
				
				if(!empty($tender_value)){
					$query .= " AND ext1 = '".$tender_value."'";
				}
				
				$query .= ' ORDER BY gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.'';
				
					//echo $query.'<br><br>' ;
					$result = mysqli_query($conn,$query);
					
					if(@mysqli_num_rows($result) > 0){
						$row = mysqli_num_rows($result);
					
					}	else if(isset($keyword) || isset($location) || isset($cpv) || isset($sector) ||
					isset($deadline_frm) || isset( $deadline_to) || isset($funding_type) || isset($financier) ||
					isset($live) || isset($tender_type) || isset($tender_value ))
					{
								

							$query = "SELECT * FROM `".$live_table."` WHERE ";
							$query .=" short_description like '%" . $keyword . "%'";		
									
							if(isset($location)) { 
								$query .= " OR (
												org_country LIKE concat('%','".$location."','%')
											OR 
												org_country IN (SELECT 
													Distinct(Country_Short_Code) FROM 
														tbl_region WHERE geo_group_id = '".$searchLocStr."'
																		
									";										
									foreach($searchLoc AS $s){
										$query .= " OR geo_group_id like concat('%','".$s."','%')";
									}
								$query .= "))";
							}
							
							if(isset($cpv)){
								$query .= " OR cpv_value like '%" .$cpv. "%'";
							}
							
							if(isset($sector)){
								$query .= " OR short_description like '%" . $sector . "%'";								
									
									# Breaking of keywords for efficient search
									$kws = explode(" ",$sector);
									for($i = 1; $i < count($searchWords); $i++) {
										if(!empty($searchWords[$i])) {
											$query .= " OR short_description like '%" . $searchWords[$i] . "%'";
										}
									}
							}
									
							if(!empty($deadline_frm) && !empty($deadline_to)){
									$query .= " AND STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')   >= STR_TO_DATE( '".$deadline_frm."','%d-%m-%Y %H:%i') AND STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')  <= STR_TO_DATE('".$deadline_to."' , '%d-%m-%Y %H:%i')";
								}
								
								
							if(!empty($funding_type)){
								if($funding_type == "Self Financed"){
										$query .= " AND financier = 0";
									}else{
										$query .= " AND financier != 0";
									}
							}
							
							if(!empty($financier)){
								$query .= " AND financier = (select id from tbl_financier where financier = '".$financier."' )";
							}
							
							if(!empty($tender_type)){
								$query .= " AND ncbicb = '".$tender_type."'";
							}				
							
							if(!empty($tender_value)){
								$query .= " AND ext1 = '".$tender_value."'";
							}
							
							
							$query .= ' ORDER BY gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.' ';
						//echo $query.'<br><br>' ;
								$result = mysqli_query($conn,$query);
								
						if(@mysqli_num_rows($result) > 0){
							$row = mysqli_fetch_array($result);	
							}						
						else{
							
								//echo 'Inside singular';
								
								# Additional Searches

								# Base Query 
								$query = "SELECT * FROM `".$live_table."` WHERE ";

								if (!empty($live_table) && is_null($keyword) && is_null($location) && is_null($cpv) && is_null($sector) && is_null($deadline_frm) && is_null($deadline_to) && is_null($funding_type ) && is_null($financier) && is_null($tender_type) && is_null($tender_value )     )
								{
									$query = "SELECT * FROM `".$live_table."` ";
								}


									if(isset($keyword)){
										
										$query .=" short_description like '%" . $keyword . "%'";
										
									}
									  
									 
									if(isset($location)){
										
										$query .= "
													org_country LIKE concat('%','".$location."','%')
												OR 
													org_country IN (SELECT 
														Distinct(Country_Short_Code) FROM 
															tbl_region WHERE geo_group_id = '".$searchLocStr."'
																			
												";
														
												foreach($searchLoc AS $s){
													$query .= " OR geo_group_id like concat('%','".$s."','%')";
												}
									$query .= ")";	
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
					}
								
	}  

				//Pagination on search and advance search when user not logged in
					if(empty($_SESSION["id"]))
					{
						$total_records = mysqli_num_rows($result);  //count number of records						
						$total_pages = 3;
						
						//echo $query;
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

						$presult = mysqli_query($conn,$pquery);
						$total_records = mysqli_num_rows($presult);  //count number of records
						$total_pages = ceil($total_records / $num_rec_per_page);

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

					}
	    } else {

					if(isset($_GET['country']) || isset($_GET['region']) || isset($_GET['preg']) ||
					isset($_GET['sector']) || isset($_GET['financier']) || isset($_POST['index']) )	
					{
						$refererUrl = $_SERVER['HTTP_REFERER'];
						@$Exploded_URL = explode("/",$refererUrl);
						#session_start();			
						@$_SESSION['url'] = $Exploded_URL[3]; # Exploded_URL[3] for deployment  |  Exploded_URL[4] for localhost
						# echo $urlToCheck;
						$urlToCheck = $_SESSION['url'];
						
						echo '<font color="white">'.$urlToCheck."</font><br />";
						//echo $_SESSION['url'];				
					

					} else {
							if(isset($_SESSION['url']))
							{
								$urlToCheck = $_SESSION['url'];
								//echo $urlToCheck."<br />";
							} else {
								$urlToCheck = 'index.php';
								//echo "index.php";
							}
							
							
					}
				

			//echo $_SESSION['url'];	
			# if condition for tracking url and showing data accordingly
			
	if(@$urlToCheck == 'index.php'){

				$_SESSION['url'] = $urlToCheck;

			// started Pagination Logic For Tenders Data Started to get values in data's variable
			
			if(isset($_REQUEST['ikeyword']) || isset($_REQUEST['ilocation']) || isset($_REQUEST['icpv']) || isset($_REQUEST['isector']) || isset($_REQUEST['ideadline1']) || isset($_REQUEST['ideadline2']) || isset($_REQUEST['ifunding_type']) || isset($_REQUEST['ifunding_agency']) || isset($_REQUEST['ilive']) || isset($_REQUEST['itender_type']) || isset($_REQUEST['itender_value']))
			{		
				
			// end pagination logic for tenders data
			    @$keyword 		= $_REQUEST['ikeyword'];
				@$location 		= $_REQUEST['ilocation'];
				//echo $location.'<br>';
				$arloc = array();
				$arloc = explode(',', $location);
				//print_r($arloc);

				foreach ($arloc as $arloci) {
					if (!in_array($arloci, $stopwords) && (trim($arloci) != '')) {
						$searchLoc[] = $arloci;
					} else {
						$junkLoc[] = $arloci;
					}
				}

					$searchLoc = array_filter($searchLoc);
					$searchLoc = array_unique($searchLoc);
					//print_r($searchLoc);
					$searchLocStr = implode(',',$searchLoc);
					//echo $searchLocStr;
				
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
	if(isset($keyword ) || isset($location) || isset($cpv) || isset($sector) || isset($deadline_frm) || isset($deadline_to) ||
			isset($funding_type) || isset($financier) || isset($live) || isset($tender_type) || isset($tender_value) )
			{
				//echo 'Inside AND isset';
				
				$query = "SELECT * FROM `".$live_table."` WHERE ";
				
				$query .=" short_description like '%" . $keyword . "%'";
				
				
				if(!empty($location)){
					$query .= " AND
											(org_country LIKE concat('%','".$location."','%')
										OR 
											org_country IN (SELECT 
												Distinct(Country_Short_Code) FROM 
													tbl_region WHERE geo_group_id = '".$searchLocStr."'
																	
										";
												
										foreach($searchLoc AS $s){
											$query .= " OR geo_group_id like concat('%','".$s."','%')";
										}
							$query .= "))";
				}
				
				if(!empty($cpv)){
					$query .= " AND cpv_value like '%" .$cpv. "%'";
				}
				
				if(!empty($sector)) {
					$query .= " AND short_description like '%" . $sector . "%'";
				
						# Breaking of keywords for efficient search
						$kws = explode(" ",$sector);
						for($i = 1; $i < count($searchWords); $i++) {
							if(!empty($searchWords[$i])) {
								$query .= " OR short_description like '%" . $searchWords[$i] . "%'";
							}
						}
					}
			
				if(!empty($deadline_frm) && !empty($deadline_to)){
					$query .= " AND STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')   >= STR_TO_DATE( '".$deadline_frm."','%d-%m-%Y %H:%i') AND STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')  <= STR_TO_DATE('".$deadline_to."' , '%d-%m-%Y %H:%i')";
				}

				if(!empty($funding_type)){
						if($funding_type == "Self Financed"){
							$query .= " AND financier = 0";
						}else{
							$query .= " AND financier != 0";
						}
				}
				//$query .= " AND financier = '".$funding_type."'";

				if(!empty($financier)){
					$query .= " AND financier = (select id from tbl_financier where financier = '".$financier."' )";
				}
				
				if(!empty($tender_type)){
					$query .= " AND ncbicb = '".$tender_type."'";
				}				
				
				if(!empty($tender_value)){
					$query .= " AND ext1 = '".$tender_value."'";
				}
				
				$query .= ' ORDER BY gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.'';
				
					//echo $query.'<br><br>' ;
					$result = mysqli_query($conn,$query);
					
					if(@mysqli_num_rows($result) > 0){
						$row = mysqli_num_rows($result);
					
					}	else if(isset($keyword) || isset($location) || isset($cpv) || isset($sector) ||
					isset($deadline_frm) || isset( $deadline_to) || isset($funding_type) || isset($financier) ||
					isset($live) || isset($tender_type) || isset($tender_value ))
					{
								

							$query = "SELECT * FROM `".$live_table."` WHERE ";
							$query .=" short_description like '%" . $keyword . "%'";		
									
							if(isset($location)) { 
								$query .= " OR (
												org_country LIKE concat('%','".$location."','%')
											OR 
												org_country IN (SELECT 
													Distinct(Country_Short_Code) FROM 
														tbl_region WHERE geo_group_id = '".$searchLocStr."'
																		
									";										
									foreach($searchLoc AS $s){
										$query .= " OR geo_group_id like concat('%','".$s."','%')";
									}
								$query .= "))";
							}
							
							if(isset($cpv)){
								$query .= " OR cpv_value like '%" .$cpv. "%'";
							}
							
							if(isset($sector)){
								$query .= " OR short_description like '%" . $sector . "%'";								
									
									# Breaking of keywords for efficient search
									$kws = explode(" ",$sector);
									for($i = 1; $i < count($searchWords); $i++) {
										if(!empty($searchWords[$i])) {
											$query .= " OR short_description like '%" . $searchWords[$i] . "%'";
										}
									}
							}
									
							if(!empty($deadline_frm) && !empty($deadline_to)){
									$query .= " AND STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')   >= STR_TO_DATE( '".$deadline_frm."','%d-%m-%Y %H:%i') AND STR_TO_DATE(deadline, '%d-%m-%Y %H:%i')  <= STR_TO_DATE('".$deadline_to."' , '%d-%m-%Y %H:%i')";
								}
								
								
							if(!empty($funding_type)){
								if($funding_type == "Self Financed"){
										$query .= " AND financier = 0";
									}else{
										$query .= " AND financier != 0";
									}
							}
							
							if(!empty($financier)){
								$query .= " AND financier = (select id from tbl_financier where financier = '".$financier."' )";
							}
							
							if(!empty($tender_type)){
								$query .= " AND ncbicb = '".$tender_type."'";
							}				
							
							if(!empty($tender_value)){
								$query .= " AND ext1 = '".$tender_value."'";
							}
							
							
							$query .= ' ORDER BY gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.' ';
						//echo $query.'<br><br>' ;
								$result = mysqli_query($conn,$query);
								
						if(@mysqli_num_rows($result) > 0){
							$row = mysqli_fetch_array($result);	
							}						
						else{
							
								//echo 'Inside singular';
								
								# Additional Searches

								# Base Query 
								$query = "SELECT * FROM `".$live_table."` WHERE ";

								if (!empty($live_table) && is_null($keyword) && is_null($location) && is_null($cpv) && is_null($sector) && is_null($deadline_frm) && is_null($deadline_to) && is_null($funding_type ) && is_null($financier) && is_null($tender_type) && is_null($tender_value )     )
								{
									$query = "SELECT * FROM `".$live_table."` ";
								}


									if(isset($keyword)){
										
										$query .=" short_description like '%" . $keyword . "%'";
										
									}
									  
									 
									if(isset($location)){
										
										$query .= "
													org_country LIKE concat('%','".$location."','%')
												OR 
													org_country IN (SELECT 
														Distinct(Country_Short_Code) FROM 
															tbl_region WHERE geo_group_id = '".$searchLocStr."'
																			
												";
														
												foreach($searchLoc AS $s){
													$query .= " OR geo_group_id like concat('%','".$s."','%')";
												}
									$query .= ")";	
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
					}
								
	}  

				//Pagination on search and advance search when user not logged in
					if(empty($_SESSION["id"]))
					{
						$total_records = mysqli_num_rows($result);  //count number of records						
						$total_pages = 3;
						
						//echo $query;
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

						$presult = mysqli_query($conn,$pquery);
						$total_records = mysqli_num_rows($presult);  //count number of records
						$total_pages = ceil($total_records / $num_rec_per_page);

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

					}
									

				
	} else if(@$urlToCheck == 'tenderbycountry.php')
			{

				$_SESSION['url'] = $urlToCheck;
				# @$data = isset($_GET["country"]) ? $_GET['country'] : $_GET['data'];
				if(isset($_GET['country'])){
					$data = $_GET['country'];
				#echo $data;
				} else{
					$data = $_GET['scountry'];
				}
				
				
				global $start_from,$num_rec_per_page;
				
				if(isset($data)){
					$country = $data;			
				
				if(empty($_SESSION["id"]))
					{
	           	 		// Query to get result from tbl_tenders by country name
						$sql = 'SELECT B.*, A.Country FROM tbl_tenders AS B 
							INNER JOIN tbl_country as A 
							ON (B.org_country=A.code) 
							WHERE A.Country = "'.$country.'"
							ORDER BY B.gt_id DESC LIMIT '.$start_from.' ,'.$num_rec_per_page.' ';
						
						$result = mysqli_query($conn,$sql);
						$row = mysqli_num_rows($result);	           	 		
						$total_records = mysqli_num_rows($result);  //count number of records						
						$total_pages = 3;
						
						
				###
						
						global $pagination;
						$pagination =  "<div class='row'>
												<ul class='pagination'>
													<li class='disabled'>";
					
						$pagination .= "<a href='showtenders.php?scountry=" . $country . "&Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; // Goto 1st page  
						for ($i = 1; $i <= $total_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='showtenders.php?scountry=" . $country . "&Page=allAds&page=" . $i . "'>" . $i . "</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='showtenders.php?scountry=" . $country . "&Page=allAds&page=$total_pages'>" . 
											'&raquo;' . "</a> </li>
										</ul></div>";
						#echo $pagination;
					}else if(isset($_SESSION["id"])){
						
						// Query to get result from tbl_tenders by country name
						$sql = 'SELECT B.*, A.Country FROM tbl_tenders AS B 
							INNER JOIN tbl_country as A 
							ON (B.org_country=A.code) 
							WHERE A.Country = "'.$country.'"
							ORDER BY B.gt_id DESC LIMIT '.$start_from.','.$num_rec_per_page.'';
						
						$result = mysqli_query($conn,$sql);
						$row = mysqli_num_rows($result);	           	 		
						$total_records = mysqli_num_rows($result);  //count number of records						
						$total_pages = ceil($total_records / $num_rec_per_page);
						
						
						
						# Pagination
						$psql = 'SELECT B.*, A.Country FROM tbl_tenders AS B 
							INNER JOIN tbl_country as A 
							ON (B.org_country=A.code) 
							WHERE A.Country = "'.$country.'"';
						
						$presult =  mysqli_query($conn,$psql);
						$prow = mysqli_num_rows($presult);	           	 		
						$ptotal_records = mysqli_num_rows($presult);  //count number of records						
						$ptotal_pages = ceil($ptotal_records / $num_rec_per_page);
						
						
						global $pagination,$start_from,$num_rec_per_page;
						$pagination =  "<div class='row'>
											<ul class='pagination'>
												<li class='disabled'>";
					
						$pagination .=  "<a href='showtenders.php?scountry=" . $country . "&Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; 
						// Goto 1st page  
						
						for ($i = 1; $i <= $ptotal_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='showtenders.php?scountry=" . $country . "&Page=allAds&page=" . $i . "'>" 
											. $i . 
											"</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='showtenders.php?scountry=" . $country . "&Page=allAds&page=$total_pages'>" 
											. '&raquo;' . "</a> 
										</li>
										</ul></div>";
										
						#echo $pagination;
						
					} else {
							echo "<h3 class='text-center'> No Tenders Found</h3>";
					}
					      
				
				
				###
				
			
				}
				
				
	 }  else if(@$urlToCheck == 'tenderbyregion.php')
			{
				$_SESSION['url'] = $urlToCheck;
				# @$data = isset($_GET["country"]) ? $_GET['country'] : $_GET['data'];
				if(isset($_GET['region'])){
					$data = $_GET['region'];
				#echo $data;
				} else{
					$data = $_GET['sregion'];
				}
				if($data == "Asia"){
					$region_country = array('KZ','KG','TJ','TM','UZ','CN','HK','MO','KP','JP','MN','KR','TW','AF','BD','BT','IN','IR','MV','NP','PK','LK','BN','KH','ID','LA','MY','MM','PH','SG','TH','TL','VN','AM','AZ','BH','CY','GE','IQ','IL','JO','KW','LB','PS','OM','QA','SA','SY','TR','AE','YE');
				}elseif ($data == "Africa") {
					$region_country = array('BI','KM','DJ','ER','ET','KE','MG','MW','MU','YT','MZ','RE','RW','SC','SO','UG','TZ','ZM','ZW','AO','CM','CF','TD','CG','CD','GQ','GA','ST','DZ','EG','LY','MA','SS','SD','TN','EH','BW','LS','NA','ZA','SZ','BJ','BF','CV','CI','GM','GH','GN','GW','LR','ML','MR','NE','NG','SH','SN','SL','TG');
				}elseif($data == "Europe"){
					$region_country = array('BY','BG','CZ','HU','PL','MD','RO','RU','SK','UA','AX','CX','DK','EE','FO','FI','GG','IS','IE','IM','JE','LV','LT','NO','SJ','SE','GB','AL','AD','BA','HR','GI','GR','VA','IT','MT','ME','PT','SM','RS','SI','ES','MK','AT','BE','FR','D','LI','LU','MC','NL','CH','BY','BG','CZ','HU','PL','MD','RO','RU','SK','UA','AX','CX','DK','EE','FO','FI','GG','IS','IE','IM','JE','LV','LT','NO','SJ','SE','GB','AL','AD','BA','HR','GI','GR','VA','IT','MT','ME','PT','SM','RS','SI','ES','MK','AT','BE','FR','DE','LI','LU','MC','NL','CH');
				}elseif ($data == "Australia/Oceania") {
					$region_country = array('AU','NZ','NF','FJ','NC','PG','SB','VU','GU','KI','MH','FM','NR','MP','PW','AS','CK','CC','PF','NU','PN','WS','TK','TO','TV','WF','HM','TF');	
				}else if($data == "Americas"){
					$region_country = array('BZ','CR','SV','GT','HN','MX','NI','PA','AI','AG','AW','BS','BB','BQ','VG','IO','KY','CU','CW','DM','DO','GD','GP','HT','JM','MQ','MS','PR','BL','KN','LC','MF','VC','SX','TT','TC','VI','BM','CA','GL','PM','US','AR','BO','BR','BV','CL','CO','EC','FK','GF','GY','PY','PE','SR','GS','UY','UM','VE');
				}else{
					$region_country = "";
				}
				
				
					
				#echo $countries;

				global $start_from,$num_rec_per_page;
				
				if(isset($data)){
					$region = $data;		


				if(empty($_SESSION["id"]))
				{	

				// Query to get result from tbl_tenders by region name
				$sql = "SELECT B.*,C.Country FROM tbl_tenders AS 
						B INNER JOIN tbl_country as C
						ON (B.org_country=C.code)
						WHERE B.org_country IN ('".implode("','",$region_country)."') 
						ORDER BY B.gt_id DESC LIMIT ".$start_from.", ".$num_rec_per_page."" ;
				
					$result = mysqli_query($conn,$sql);
					$row = mysqli_num_rows($result);
					$total_records = mysqli_num_rows($result);  //count number of records						
					$total_pages = 3;
						
						
				###
						
						global $pagination;
						$pagination =  "<div class='row'>
												<ul class='pagination'>
													<li class='disabled'>";
					
						$pagination .= "<a href='showtenders.php?sregion=" . $region . "&Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; // Goto 1st page  
						for ($i = 1; $i <= $total_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='showtenders.php?sregion=" . $region . "&Page=allAds&page=" . $i . "'>" . $i . "</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='showtenders.php?sregion=" . 
											$region . "&Page=allAds&page=$total_pages'>" . 
											'&raquo;' . "</a> </li>
										</ul></div>";
						#echo $pagination;
					}else if(isset($_SESSION["id"])){

						
						$sql = "SELECT B.*,C.Country FROM tbl_tenders AS 
						B INNER JOIN tbl_country as C
						ON (B.org_country=C.code)
						WHERE B.org_country IN ('".implode("','",$region_country)."') 
						ORDER BY B.gt_id DESC LIMIT ".$start_from.", ".$num_rec_per_page."" ;
				
						$result = mysqli_query($conn,$sql);
						$row = mysqli_num_rows($result);
						$total_records = mysqli_num_rows($result);  //count number of records
						$total_pages = ceil($total_records / $num_rec_per_page);


						# Pagination
						$psql = "SELECT B.*,C.Country FROM tbl_tenders AS 
						B INNER JOIN tbl_country as C
						ON (B.org_country=C.code)
						WHERE B.org_country IN ('".implode("','",$region_country)."') 
						ORDER BY B.gt_id" ;
						
						$presult =  mysqli_query($conn,$psql);
						$prow = mysqli_num_rows($presult);	           	 		
						$ptotal_records = mysqli_num_rows($presult);  //count number of records						
						$ptotal_pages = ceil($ptotal_records / $num_rec_per_page);
						
						
						global $pagination,$start_from,$num_rec_per_page;
						$pagination =  "<div class='row'>
											<ul class='pagination'>
												<li class='disabled'>";
					
						$pagination .=  "<a href='showtenders.php?sregion=" . $region . "&Page=allAds&page=1'>" . '&laquo;' . "</a></li>"; 
						// Goto 1st page  
						
						for ($i = 1; $i <= $ptotal_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='showtenders.php?sregion=" . $region . "&Page=allAds&page=" . $i . "'>" 
											. $i . 
											"</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='showtenders.php?sregion=" . $region . "&Page=allAds&page=$total_pages'>" 
											. '&raquo;' . "</a> 
										</li>
										</ul></div>";
										
						#echo $pagination;
						
					} else {
							echo "<h3 class='text-center'> No Tenders Found</h3>";
					}
					 
				
				}
		//Tender By Political Region Query	
				
		} else if(@$urlToCheck == 'politicalregion.php')
				{
				$_SESSION['url'] = $urlToCheck;
				# @$data = isset($_GET["country"]) ? $_GET['country'] : $_GET['data'];
				if(isset($_GET['preg'])){
					$data = $_GET['preg'];
				#echo $data;
				} else{
					$data = $_GET['spreg'];
				}
				
				
				global $start_from,$num_rec_per_page;
				
				if(isset($data)){
					$preg = $data;		 

				if(empty($_SESSION["id"]))
				{	
				
				//Query to fetch political region data from tbl_tenders,tbl_region,tbl_pol_region
				$sql = 'SELECT B.*, A.Country,C.Country_Short_Code FROM tbl_tenders AS 
					B INNER JOIN tbl_country as A 
					ON (B.org_country=A.code) 
					INNER JOIN tbl_region as C 
					ON (B.org_country=C.Country_Short_Code)
					WHERE B.org_country  IN (SELECT `Country_Short_Code` FROM  `cms_goodtenders`.`tbl_region` WHERE C.geo_group_id LIKE "%'.$preg.'%")
					ORDER BY B.gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.'';

					$result = mysqli_query($conn,$sql);
					$row = mysqli_num_rows($result);
					$total_records = mysqli_num_rows($result);  //count number of records						
					$total_pages = 3;
						
						global $pagination;
						$pagination =  "<div class='row'>
												<ul class='pagination'>
													<li class='disabled'>";
					
						$pagination .= "<a href='showtenders.php?spreg=" . $preg . "&Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; // Goto 1st page  
						for ($i = 1; $i <= $total_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='showtenders.php?spreg=" . $preg . "&Page=allAds&page=" . $i . "'>" . $i . "</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='showtenders.php?spreg=" . 
											$preg . "&Page=allAds&page=$total_pages'>" . 
											'&raquo;' . "</a> </li>
										</ul></div>";
						#echo $pagination;
					}else if(isset($_SESSION["id"])){

						$sql = 'SELECT B.*, A.Country,C.Country_Short_Code FROM tbl_tenders AS 
								B INNER JOIN tbl_country as A 
								ON (B.org_country=A.code) 
								INNER JOIN tbl_region as C 
								ON (B.org_country=C.Country_Short_Code)
								WHERE B.org_country  IN (SELECT `Country_Short_Code` FROM  `cms_goodtenders`.`tbl_region` WHERE C.geo_group_id LIKE "%'.$preg.'%")
								ORDER BY B.gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.'';

						$result = mysqli_query($conn,$sql);
						$row = mysqli_num_rows($result);
						$total_records = mysqli_num_rows($result);  //count number of records
						$total_pages = ceil($total_records / $num_rec_per_page);				
						

						$psql='SELECT B.*, A.Country,C.Country_Short_Code FROM tbl_tenders AS 
							B INNER JOIN tbl_country as A 
							ON (B.org_country=A.code) 
							INNER JOIN tbl_region as C 
							ON (B.org_country=C.Country_Short_Code)
							WHERE B.org_country  IN (SELECT `Country_Short_Code` FROM  `cms_goodtenders`.`tbl_region` WHERE C.geo_group_id LIKE "%'.$preg.'%")';
					
						$presult =  mysqli_query($conn,$psql);
						$prow = mysqli_num_rows($presult);	           	 		
						$ptotal_records = mysqli_num_rows($presult);  //count number of records						
						$ptotal_pages = ceil($ptotal_records / $num_rec_per_page);
						
						
						global $pagination,$start_from,$num_rec_per_page;
						$pagination =  "<div class='row'>
											<ul class='pagination'>
												<li class='disabled'>";
					
						$pagination .=  "<a href='showtenders.php?spreg=" . $preg . "&Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; 
						// Goto 1st page  
						
						for ($i = 1; $i <= $ptotal_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='showtenders.php?spreg=" . $preg . "&Page=allAds&page=" . $i . "'>" 
											. $i . 
											"</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='showtenders.php?spreg=" . $preg . "&Page=allAds&page=$total_pages'>" 
											. '&raquo;' . "</a> 
										</li>
										</ul></div>";
										
						#echo $pagination;
						
					} else {
							echo "<h3 class='text-center'> No Tenders Found</h3>";
					}
				}
					
		// Tender By Sector Query Section

			
	}  else if(@$urlToCheck == 'tenderbysector.php')
		{

				$_SESSION['url'] = $urlToCheck;
				# @$data = isset($_GET["country"]) ? $_GET['country'] : $_GET['data'];
				if(isset($_GET['sector'])){
					$data = $_GET['sector'];
				#echo $data;
				} else{
					$data = $_GET['ssector'];
				}
				
				global $start_from,$num_rec_per_page;
				
				if(isset($data)){
					$sector = base64_decode($data);		

				if(empty($_SESSION["id"]))
				{
				
				$cpv = explode(",", $sector );

				for($i = 1; $i < count($cpv); $i++) {
        			if(!empty($cpv[$i])) {

        			// Query to get tenders by sector cpv values	
            		$sql = 'SELECT B.*, A.Country FROM tbl_tenders AS 
						B INNER JOIN tbl_country as A 
						ON (B.org_country=A.code) 
						WHERE B.cpv_value like "%'.$cpv[$i].'%"
						';
						foreach($cpv AS $c){
							$sql .= " OR B.cpv_value like concat('%','".$c."','%')";
						}
					$sql .= ' ORDER BY B.gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.'';
        			}
      			}

      			//echo $sql;
				
					$result = mysqli_query($conn,$sql);
					$row = mysqli_num_rows($result);
					$total_records = mysqli_num_rows($result);  //count number of records						
					$total_pages = 3;
						
						
				###
						global $pagination;
						$pagination =  "<div class='row'>
												<ul class='pagination'>
													<li class='disabled'>";
					
						$pagination .= "<a href='showtenders.php?ssector=" . $data . "&Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; // Goto 1st page  
						for ($i = 1; $i <= $total_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='showtenders.php?ssector=" . $data . "&Page=allAds&page=" . $i . "'>" . $i . "</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='showtenders.php?ssector=" . 
											$data . "&Page=allAds&page=$total_pages'>" . 
											'&raquo;' . "</a> </li>
										</ul></div>";
						#echo $pagination;
					}else if(isset($_SESSION["id"])){
						$cpv = explode(",", $sector );
							for($i = 1; $i < count($cpv); $i++) {
        					if(!empty($cpv[$i])) {

        					// Query to get tenders by sector cpv values	
            				$sql = 'SELECT B.*, A.Country FROM tbl_tenders AS 
								B INNER JOIN tbl_country as A 
								ON (B.org_country=A.code) 
								WHERE B.cpv_value like "%'.$cpv[$i].'%"
								';
								foreach($cpv AS $c){
									$sql .= " OR B.cpv_value like concat('%','".$c."','%')";
								}
							$sql .= ' ORDER BY B.gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.'';
		        			}
		      			}
      						$result = mysqli_query($conn,$sql);
							$row = mysqli_num_rows($result);
							$total_records = mysqli_num_rows($result);  //count number of records
							$total_pages = ceil($total_records / $num_rec_per_page);	

							// Query to get tenders by sector cpv values
							$cpv = explode(",", $sector );
							for($i = 1; $i < count($cpv); $i++) {
        					if(!empty($cpv[$i])) {
	
            				$psql = 'SELECT B.*, A.Country FROM tbl_tenders AS 
								B INNER JOIN tbl_country as A 
								ON (B.org_country=A.code) 
								WHERE B.cpv_value like "%'.$cpv[$i].'%"
								';
								foreach($cpv AS $c){
									$psql .= " OR B.cpv_value like concat('%','".$c."','%')";
								}
							}
      					}
      					$presult =  mysqli_query($conn,$psql);
						$prow = mysqli_num_rows($presult);	           	 		
						$ptotal_records = mysqli_num_rows($presult);  //count number of records						
						$ptotal_pages = ceil($ptotal_records / $num_rec_per_page);
						
						
						global $pagination,$start_from,$num_rec_per_page;
						$pagination =  "<div class='row'>
											<ul class='pagination'>
												<li class='disabled'>";
					
						$pagination .=  "<a href='showtenders.php?ssector=" . $data . "&Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; 
						// Goto 1st page  
						
						for ($i = 1; $i <= $ptotal_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='showtenders.php?ssector=" . $data . "&Page=allAds&page=" . $i . "'>" 
											. $i . 
											"</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='showtenders.php?ssector=" . $data . "&Page=allAds&page=$total_pages'>" 
											. '&raquo;' . "</a> 
										</li>
										</ul></div>";
										
						#echo $pagination;
						
					} else {
							echo "<h3 class='text-center'> No Tenders Found</h3>";
					}
				}

	} else if(@$urlToCheck == 'funding_agency.php') 
		{
				
				$_SESSION['url'] = $urlToCheck;
				# @$data = isset($_GET["country"]) ? $_GET['country'] : $_GET['data'];
				if(isset($_GET['financier'])){
					$data = $_GET['financier'];
				#echo $data;
				} else{
					$data = $_GET['sfinancier'];
				}
				
				
				global $start_from,$num_rec_per_page;
				
				if(isset($data)){
					$financier = $data;		

				if(empty($_SESSION["id"]))
				{	
				
				// Query to get result from tbl_tenders by funding agency
				$sql = 'SELECT B.*, A.Country,C.id FROM tbl_tenders 
					AS B INNER JOIN tbl_country as A 
					ON (B.org_country=A.code)
					INNER JOIN tbl_financier as C
					ON (B.financier=C.id)
					WHERE C.financier = "'.$financier.'"
					ORDER BY B.gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.'';
				
					$result = mysqli_query($conn,$sql);
					$row = mysqli_num_rows($result);
					$total_records = mysqli_num_rows($result);  //count number of records						
					$total_pages = 3;
						
						global $pagination;
						$pagination =  "<div class='row'>
												<ul class='pagination'>
													<li class='disabled'>";
					
						$pagination .= "<a href='showtenders.php?sfinancier=" . $financier . "&Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; // Goto 1st page  
						for ($i = 1; $i <= $total_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='showtenders.php?sfinancier=" . $financier . "&Page=allAds&page=" . $i . "'>" . $i . "</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='showtenders.php?sfinancier=" . 
											$financier . "&Page=allAds&page=$total_pages'>" . 
											'&raquo;' . "</a> </li>
										</ul></div>";
						#echo $pagination;
					}else if(isset($_SESSION["id"])){

						$sql = 'SELECT B.*, A.Country,C.id FROM tbl_tenders 
						AS B INNER JOIN tbl_country as A 
						ON (B.org_country=A.code)
						INNER JOIN tbl_financier as C
						ON (B.financier=C.id)
						WHERE C.financier = "'.$financier.'"
						ORDER BY B.gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.'';
					
						$result = mysqli_query($conn,$sql);
						$row = mysqli_num_rows($result);
						$total_records = mysqli_num_rows($result);  //count number of records	
						$total_pages = ceil($total_records / $num_rec_per_page);

						$psql='SELECT B.*, A.Country,C.id FROM tbl_tenders 
						AS B INNER JOIN tbl_country as A 
						ON (B.org_country=A.code)
						INNER JOIN tbl_financier as C
						ON (B.financier=C.id)
						WHERE C.financier = "'.$financier.'"';

						$presult =  mysqli_query($conn,$psql);
						$prow = mysqli_num_rows($presult);	           	 		
						$ptotal_records = mysqli_num_rows($presult);  //count number of records						
						$ptotal_pages = ceil($ptotal_records / $num_rec_per_page);
						
						
						global $pagination,$start_from,$num_rec_per_page;
						$pagination =  "<div class='row'>
											<ul class='pagination'>
												<li class='disabled'>";
					
						$pagination .=  "<a href='showtenders.php?sfinancier=" . $financier . "&Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; 
						// Goto 1st page  
						
						for ($i = 1; $i <= $ptotal_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='showtenders.php?sfinancier=" . $financier . "&Page=allAds&page=" . $i . "'>" 
											. $i . 
											"</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='showtenders.php?sfinancier=" . $financier . "&Page=allAds&page=$total_pages'>" 
											. '&raquo;' . "</a> 
										</li>
										</ul></div>";
										
						#echo $pagination;
						
				} else {
						echo "<h3 class='text-center'> No Tenders Found</h3>";
				}
			}
				
				
	} else {
			if(empty($_SESSION["id"]))
			{
				$sql = 'SELECT B.*, A.Country FROM tbl_tenders 
					AS B INNER JOIN tbl_country as A 
					ON (B.org_country=A.code) 
					ORDER BY B.gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.'';
				
				$result = mysqli_query($conn,$sql);
				$row = mysqli_num_rows($result);
				$total_records = mysqli_num_rows($result);  //count number of records						
					$total_pages = 3;
						
						global $pagination;
						$pagination =  "<div class='row'>
												<ul class='pagination'>
													<li class='disabled'>";
					
						$pagination .= "<a href='showtenders.php?&Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; // Goto 1st page  
						for ($i = 1; $i <= $total_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='showtenders.php?&Page=allAds&page=" . $i . "'>" . $i . "</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='showtenders.php?&Page=allAds&page=$total_pages'>" . 
											'&raquo;' . "</a> </li>
										</ul></div>";
						#echo $pagination;
			}  else if(isset($_SESSION["id"])) {
						$sql = 'SELECT B.*, A.Country FROM tbl_tenders 
						AS B INNER JOIN tbl_country as A 
						ON (B.org_country=A.code) 
						ORDER BY B.gt_id DESC LIMIT '.$start_from.', '.$num_rec_per_page.'';

						$result = mysqli_query($conn,$sql);
						$row = mysqli_num_rows($result);
						$total_records = mysqli_num_rows($result);  //count number of records	
						$total_pages = ceil($total_records / $num_rec_per_page);

						$psql='SELECT B.*, A.Country FROM tbl_tenders 
						AS B INNER JOIN tbl_country as A 
						ON (B.org_country=A.code) 
						ORDER BY B.gt_id DESC';

						$presult =  mysqli_query($conn,$psql);
						$prow = mysqli_num_rows($presult);	           	 		
						$ptotal_records = mysqli_num_rows($presult);  //count number of records						
						$ptotal_pages = ceil($ptotal_records / $num_rec_per_page);
						
						
						global $pagination,$start_from,$num_rec_per_page;
						$pagination =  "<div class='row'>
											<ul class='pagination'>
												<li class='disabled'>";
					
						$pagination .=  "<a href='showtenders.php?&Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; 
						// Goto 1st page  
						
						for ($i = 1; $i <= $ptotal_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='showtenders.php?&Page=allAds&page=" . $i . "'>" 
											. $i . 
											"</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='showtenders.php?&Page=allAds&page=$total_pages'>" 
											. '&raquo;' . "</a> 
										</li>
										</ul></div>";
										
						#echo $pagination;
				
			} else {
					echo "<h3 class='text-center'> No Tenders Found</h3>";
			}

		}
	}
		


	## End of tracffic tracking 
	//echo "Affected rows: " . mysqli_affected_rows($conn);
    //$total = $row*100; // For Blur Image Data on 3rd Pages		
	while($row = mysqli_fetch_assoc($result))
	{
	
	$id=$row['gt_id'];
	$tags = "";
	$tag_color = "";

    	if($row['financier'] == 0)
		{
			$tags="Self-Financed";
			$tag_color="tg-themetag tg-featuretag";
		}else{
			$tags="Funded";
			$tag_color="tg-themetag1 tg-featuretag1";
		}
	
		
	// tenders listing coming from database 

	 echo " <article class='advance-search-job'>
			<div class='row no-mrg'>
			<div class='col-md-1 col-sm-6'>
			<input type='checkbox' class='check_tender' onclick='valueChanged()' style='margin-top:50%;'>
			</div>";
			if(isset($_SESSION["id"])):
			echo"<div class='col-md-5 col-sm-5'>
    		<div class='advance-search-caption' style='margin-left:-20px;' 
    		onclick='onRedirect(".$row['gt_id'].")' title='Click to See Full Details'>
    			<h4>".$row['short_description']."</h4>
			</div>
			</div>
			<div class='col-md-2 col-sm-2'>
			<div class='advance-search-job-locat'>";
			if(!isset($row['Country'])){
                echo "<p><b><img src='assets/flags/blank.gif' class='flag flag-".strtolower($row['org_country'])."'/>&nbsp;".$row['org_country']."</b></p></div>
			</div>";
            }else{
                echo "<p><b><img src='assets/flags/blank.gif' class='flag flag-".strtolower($row['org_country'])."'/>&nbsp;".$row['Country']."</b></p></div>
			</div>";
            }
			"</div>
			</div>";
			else:
			echo "
			<div class='col-md-5 col-sm-5'>
    		<div class='advance-search-caption' style='margin-left:-20px;' 
    		onclick='onModal()' title='Click to See Full Details'>
    			<h4>".$row['short_description']."</h4>
			</div>
			</div>
			<div class='col-md-2 col-sm-2'>
			<div class='advance-search-job-locat'>";
			if(!isset($row['Country'])){
                echo "<p><b><img src='assets/flags/blank.gif' class='flag flag-".strtolower($row['org_country'])."'/>&nbsp;".$row['org_country']."</b></p></div>
			</div>";
            }else{
                echo "<p><b><img src='assets/flags/blank.gif' class='flag flag-".strtolower($row['org_country'])."'/>&nbsp;".$row['Country']."</b></p></div>
			</div>";
            }
            endif;
            echo "
			<div class='col-md-2 col-sm-2'>
			<div class='advance-search-job-locat'>
			<p><b><i class='fa fa-calendar'></i>".date_format (new DateTime($row['deadline']), 'd-m-Y')."</b></p>
			</div>
			</div>
			<div class='col-md-2 col-sm-2'>
			<a href='#".$id."' id='btpadd' data-toggle='modal' class='btn btn-primary' title='View Details'>Quick View</a>
			</div>
			</div>
				<span class='".$tag_color."'>".$tags."</span>
			</article>";
		?>		
			<div class="modal fade" id="<?php echo $id ?>">
    		<div class="modal-dialog">
        	<div class="modal-content">
            <div class="modal-header" style="background-color: #07b107;color: #ffffff;">
              <a href="#" data-dismiss="modal" class="class pull-right"><span class="fa fa-remove"></span></a>
              <h3 class="modal-title text-center">Tenders Details</h3>
            </div>
            <div class="modal-body" style="margin-top: 5%;margin-bottom: 1%;">
            <?php

                echo "<div class='row'>
                    <div class='col-md-12 tender_content'>
                    <h5><strong>Good Tender ID:</strong> ".$row['gt_id']."</h5>
                    <hr>
                	</div>
                    <div class='col-md-12 tender_content'>
                    <h5><b>Title:</b> ".$row['short_description']."</h5>  
                    <hr>
                    </div>
                    <div class='col-md-6 tender_content'>
                    <h5><strong>Deadline:</strong> ".date_format (new DateTime($row['deadline']), 'd-m-Y')."</h5>     
                    </div>
                    <div class='col-md-6 tender_content'>
                    <h5><strong>Country:</strong>";
                    if(!isset($row['Country'])){
                    	echo "<img src='assets/flags/blank.gif' class='flag flag-".strtolower($row['org_country'])."'/>
                     ".$row['org_country']."</h5> ";
                    }else{
                    	echo "<img src='assets/flags/blank.gif' class='flag flag-".strtolower($row['org_country'])."'/>
                     ".$row['Country']."</h5>";
                    }
                    echo "</div>
                    <div class='col-md-6 tender_content'><hr>
                    <h5><strong>Financier:</strong> ".$tags."</h5> 
                    <hr>  
                    </div>
                    <div class='col-md-12 tender_content'>
                    <h5><strong>Description:</strong><br> ".substr($row['tender_details'],0,200).".....</h5>
                    </div>
                    </div>
                </div>";
                if(isset($_SESSION["id"])):
                	echo "";
                else:	
                echo"<div class='modal-footer' style='margin-bottom: -3%;'>
                    <div class='col-md-12 text-center' style='margin-top: -10px;margin-bottom: -10px;''>	
                    <h5><b>Register and view more details</b></h5>
                	</div>
                	<div class='col-md-offset-2 col-md-4 pr-buy-button'>
                		<a href='signform.php' target='_blank' class='pr-btn'>Register</a>
                	</div>	
                	<div class='col-md-4 pr-buy-button'>
                		<a href='pricing.php' target='_blank' class='pr-btn'>Pricing</a>
                	</div>
                </div>";
                endif;   
        	echo "</div>
    	</div>
	</div>";
	?>
		<?php 
			}
			
			if($page == 3)
			{

			//Popup Div on Blur Images 
			if(isset($_SESSION["id"])):
			echo "";
			else:	
			echo "<article class='advance-search-job'>
			<img src='assets/img/blurimg.PNG' style='filter:blur(5px);'>
			<img src='assets/img/blurimg.PNG' style='filter:blur(5px);'>
			<div class='priceInfo'>
			<h5>
			More results available for your search. Register and view more details.
			</h5><br>
			<div class='col-md-6'>
			<a href='signform.php' class='btn btn-warning btn-lg btn-block'>Register</a>
			</div>
			<div class='col-md-6'>
			<a href='pricing.php' class='btn btn-success btn-lg btn-block'>See Pricing</a>			
			</div>
			</div>
			</div>
			</article>
			</div>";
			endif;
		}
				if(mysqli_affected_rows($conn) >= 1){
					global $pagination;
						echo $pagination;
						echo "</div>";	           	 	
				}else{
					echo "<h3 class='text-center'>No Tenders Found</h3>";
					echo "</div>";
				}
				 ?>
					

<!-- Modal Error For unregistered users-->
				<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
					<div class="modal-dialog modal-confirm">
						<div class="modal-content">
							<div class="modal-header">
								<div class="box">
									<img src="assets/img/customer.jpg" class="img-circle img-responsive" />
								</div>				
								<h4 class="modal-title">Registration Required</h4>	
				                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							</div>
							<div class="modal-body">
								<p>Complete specifications of tenders are available to only registered users. Allow us to connect and assist you OR whats-app us at +91 9867848333</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-info" data-dismiss="modal" id="connect_modal" data-toggle="tab">Connect us</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#register" data-dismiss="modal">Register</button>
							</div>
						</div>  
					</div>
				</div>

<?php
	include('footer.php');
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
				allowClear:true,
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


  			    var unloaded = false;
				    $(window).on('beforeunload', unload);
				    $(window).on('unload', unload);	 
				    function unload(){		
				    	if(!unloaded){
				    		$('body').css('cursor','wait');
				    		$.ajax({
				    			type: 'get',
				    			async: true,
				    			url: window.location.origin+'session_destroy_url.php',
				    			success:function(){ 
				    				unloaded = true; 
				    				$('body').css('cursor','default');
				    			},
				    			timeout: 5000
				    		});
				    	}
				}

			</script>
