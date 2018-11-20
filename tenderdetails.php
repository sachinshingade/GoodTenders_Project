	<!-- Header File -->		
	<?php
		session_start();
		include('header.php');
		require 'dbconnect.php';
	?>	
	<title>GoodTenders | Tenders By Regions | Tenders By Country | Tenders By Keywords | Tenders By Political Regions | Tenders By Sector | Tenders By Funding Agency</title>
	<style type="text/css">
		.view{
			margin-top: 2%;
			margin-bottom: -5%;
		}
		.full-detail h3{
			font-size: 1.3em;
		}
		.side-widget .btn-nomatch{
			background-color: #07b107;
			width: 100%;
			height: 100%;
			color:#ffffff;
			border-radius: 4px;
			box-shadow: 2px 2px 2px silver; 
		}
		.side-widget .btn-nomatch:hover{
			background-color: #07b107;
			width: 100%;
			height: 100%;
			color:#ffffff;	
		}		
		.btn-download{
			background-color: #34434e;
			color: #ffffff;
			float: right;
			margin-top: 3%;

		}
		.btn-download:hover{
			background-color: #07b107;
		}
		.row-bottom li{
			text-align-last:left;
		}
		.text-overflow {
		      width:100%;
		      height:120px;
		      display:block; 
		      overflow:hidden;
		      word-break: break-word;
		      word-wrap: break-word;
		  }

		  .btn-overflow {
		    display: none;
		    text-decoration: none; 
		  }
	</style>
	<?php
	if(isset($_SESSION["id"])){

	?>					
		<div class="clearfix"></div>
		<!-- Tenders Full Details Sections -->
		<section class="view">
		<div class="container text-center">
		<div class="col-lg-12 col-md-12 col-sm-12">	
			<div class="row">
				<div class="main-heading">
					<p>Full View</p>
					<h2>Tender <span>Details</span></h2>
				</div>
			</div>
		</div>
		</div>
		</section>
		<hr>
		<section class='full-detail-description full-detail'>
		<div class='container'>
					
		<!-- Tenders full details Start -->
		<?php
		if(isset($_GET['tnd']))
		{
			$id = $_GET['tnd'];

			mysqli_query ($conn,"set character_set_results='utf8'");

			$sql = 'SELECT B.*, A.Country,C.* FROM tbl_tenders AS 
				B INNER JOIN tbl_country as A 
				ON (B.org_country=A.code) 
				INNER JOIN tbl_financier as C
				ON (B.financier=C.id)
				WHERE gt_id = "'.$id.'"';
				
			$result = mysqli_query($conn,$sql);
			
		if(count($result) > 0)
		{
			$row = mysqli_num_rows($result);
			while($row = mysqli_fetch_assoc($result))
			{

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
		
			echo    "<div class='col-md-12 col-sm-12'>
					<h3>".$row['short_description']."</h3>
					</div>
					<div class='col-md-9 col-sm-12'>
						<div class='full-card'>
						<div class='row row-bottom mrg-0'>
						<a href='".$row['file_name']."' class='btn btn-download' target='_blank'>Download <i class='fa fa-download'></i></a>
							<h2 class='detail-title'>Good Tender Id:".$row['gt_id']."</h2>
							<div class='table-responsive'>
							<table class='table table-striped'>
							<tr>
							<th class='col-lg-4'>Country:</th>
							<td class='col-lg-8'><img src='assets/flags/blank.gif' 
							class='flag flag-".strtolower($row['org_country'])."'/> 
							".$row['Country']."</td>
							</tr>
							<tr>
							<th class='col-lg-4'>Deadline:</th>
							<td class='col-lg-8'>".date_format (new DateTime($row['deadline']), 'd-m-Y')."</td>
							</tr>
							<tr><th class='col-lg-4'>Tender Type:</th><td class='col-lg-8'>".strtoupper($row['ncbicb'])."</td></tr>
							<tr><th class='col-lg-4'>Financier:</th><td class='col-lg-8'>".$row['financier']."</td></tr>
							<tr><th class='col-lg-4'>Document Reference Number:</th><td class='col-lg-8'>".$row['tender_notice_no']."</td></tr>
							</table>
							</div>
						</div>
						
						<div class='row row-bottom mrg-0'>
							<h2 class='detail-title'>Tendering Authority/Purchaser</h2>
							<div class='table-responsive'>
							<table class='container table table-striped'>
								<tr><th class='col-lg-4'>Name:</th><td class='col-lg-8'>".$row['organisation_name']."</td></tr>
								<tr><th class='col-lg-4'>Address:</th><td class='col-lg-8'>".$row['org_address']."</td></tr>
								<tr><th class='col-lg-4'>Email:</th><td class='col-lg-8'>".$row['org_email']."</td></tr>
								<tr><th class='col-lg-4'>URL:</th><td class='col-lg-8'>".$row['org_url']."</td></tr>
							</table>
							</div>
						</div>
						
						<div class='row row-bottom mrg-0'>
							<h2 class='detail-title'>Tender Description</h2>
							<ul class='job-detail-des'>
							<div class='text-overflow'>
							<li style='text-align:justify;'>
							<p>".$row['tender_details']."</p>
							</li>
							</div>
							<a class='btn-overflow' href='#text-overflow' style='color:#07b107;'>Show more</a>
							</ul>
						</div>
													
						<div class='row row-bottom mrg-0'>
							<h2 class='detail-title'>Map Location</h2>
							<div id='map' class='full-width' style='height:400px;'></div>
						</div>
					</div>
					</div>";
				}
			}else if(count($result) < 1){
				$sql_15 = 'SELECT B.*, A.Country,C.* FROM Archive-2015_tbl_tenders AS 
				B INNER JOIN tbl_country as A 
				ON (B.org_country=A.code) 
				INNER JOIN tbl_financier as C
				ON (B.financier=C.id)
				WHERE gt_id = "'.$id.'"';
				
				$result_15 = mysqli_query($conn,$sql_15);
				$row = mysqli_num_rows($result_15);
				while($row = mysqli_fetch_assoc($result_15))
				{

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
			
				echo    "<div class='col-md-12 col-sm-12'>
						<h3>".$row['short_description']."</h3>
						</div>
						<div class='col-md-9 col-sm-12'>
							<div class='full-card'>
							<div class='row row-bottom mrg-0'>
							<a href='".$row['file_name']."' class='btn btn-download' target='_blank'>Download <i class='fa fa-download'></i></a>
								<h2 class='detail-title'>Good Tender Id:".$row['gt_id']."</h2>
								<div class='table-responsive'>
								<table class='table table-striped'>
								<tr>
								<th class='col-lg-4'>Country:</th>
								<td class='col-lg-8'><img src='assets/flags/blank.gif' 
								class='flag flag-".strtolower($row['org_country'])."'/> 
								".$row['Country']."</td>
								</tr>
								<tr>
								<th class='col-lg-4'>Deadline:</th>
								<td class='col-lg-8'>".date_format (new DateTime($row['deadline']), 'd-m-Y')."</td>
								</tr>
								<tr><th class='col-lg-4'>Tender Type:</th><td class='col-lg-8'>".strtoupper($row['ncbicb'])."</td></tr>
								<tr><th class='col-lg-4'>Financier:</th><td class='col-lg-8'>".$row['financier']."</td></tr>
								<tr><th class='col-lg-4'>Document Reference Number:</th><td class='col-lg-8'>".$row['tender_notice_no']."</td></tr>
								</table>
								</div>
							</div>
							
							<div class='row row-bottom mrg-0'>
								<h2 class='detail-title'>Tendering Authority/Purchaser</h2>
								<div class='table-responsive'>
								<table class='container table table-striped'>
									<tr><th class='col-lg-4'>Name:</th><td class='col-lg-8'>".$row['organisation_name']."</td></tr>
									<tr><th class='col-lg-4'>Address:</th><td class='col-lg-8'>".$row['org_address']."</td></tr>
									<tr><th class='col-lg-4'>Email:</th><td class='col-lg-8'>".$row['org_email']."</td></tr>
									<tr><th class='col-lg-4'>URL:</th><td class='col-lg-8'>".$row['org_url']."</td></tr>
								</table>
								</div>
							</div>
							
							<div class='row row-bottom mrg-0'>
								<h2 class='detail-title'>Tender Description</h2>
								<ul class='job-detail-des'>
								<div class='text-overflow'>
								<li style='text-align:justify;'>
								<p>".$row['tender_details']."</p>
								</li>
								</div>
								<a class='btn-overflow' href='#text-overflow' style='color:#07b107;'>Show more</a>
								</ul>
							</div>
														
							<div class='row row-bottom mrg-0'>
								<h2 class='detail-title'>Map Location</h2>
								<div id='map' class='full-width' style='height:400px;'></div>
							</div>
						</div>
						</div>";
					}
				}else if(count($result_15) < 1){
					
				$sql_16 = 'SELECT B.*, A.Country,C.* FROM Archive-2016_tbl_tenders AS 
				B INNER JOIN tbl_country as A 
				ON (B.org_country=A.code) 
				INNER JOIN tbl_financier as C
				ON (B.financier=C.id)
				WHERE gt_id = "'.$id.'"';
				
				$result_16 = mysqli_query($conn,$sql_16);
				$row = mysqli_num_rows($result_16);
				while($row = mysqli_fetch_assoc($result_16))
				{

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
			
				echo    "<div class='col-md-12 col-sm-12'>
						<h3>".$row['short_description']."</h3>
						</div>
						<div class='col-md-9 col-sm-12'>
							<div class='full-card'>
							<div class='row row-bottom mrg-0'>
							<a href='".$row['file_name']."' class='btn btn-download' target='_blank'>Download <i class='fa fa-download'></i></a>
								<h2 class='detail-title'>Good Tender Id:".$row['gt_id']."</h2>
								<div class='table-responsive'>
								<table class='table table-striped'>
								<tr>
								<th class='col-lg-4'>Country:</th>
								<td class='col-lg-8'><img src='assets/flags/blank.gif' 
								class='flag flag-".strtolower($row['org_country'])."'/> 
								".$row['Country']."</td>
								</tr>
								<tr>
								<th class='col-lg-4'>Deadline:</th>
								<td class='col-lg-8'>".date_format (new DateTime($row['deadline']), 'd-m-Y')."</td>
								</tr>
								<tr><th class='col-lg-4'>Tender Type:</th><td class='col-lg-8'>".strtoupper($row['ncbicb'])."</td></tr>
								<tr><th class='col-lg-4'>Financier:</th><td class='col-lg-8'>".$row['financier']."</td></tr>
								<tr><th class='col-lg-4'>Document Reference Number:</th><td class='col-lg-8'>".$row['tender_notice_no']."</td></tr>
								</table>
								</div>
							</div>
							
							<div class='row row-bottom mrg-0'>
								<h2 class='detail-title'>Tendering Authority/Purchaser</h2>
								<div class='table-responsive'>
								<table class='container table table-striped'>
									<tr><th class='col-lg-4'>Name:</th><td class='col-lg-8'>".$row['organisation_name']."</td></tr>
									<tr><th class='col-lg-4'>Address:</th><td class='col-lg-8'>".$row['org_address']."</td></tr>
									<tr><th class='col-lg-4'>Email:</th><td class='col-lg-8'>".$row['org_email']."</td></tr>
									<tr><th class='col-lg-4'>URL:</th><td class='col-lg-8'>".$row['org_url']."</td></tr>
								</table>
								</div>
							</div>
							
							<div class='row row-bottom mrg-0'>
								<h2 class='detail-title'>Tender Description</h2>
								<ul class='job-detail-des'>
								<div class='text-overflow'>
								<li style='text-align:justify;'>
								<p>".$row['tender_details']."</p>
								</li>
								</div>
								<a class='btn-overflow' href='#text-overflow' style='color:#07b107;'>Show more</a>
								</ul>
							</div>
														
							<div class='row row-bottom mrg-0'>
								<h2 class='detail-title'>Map Location</h2>
								<div id='map' class='full-width' style='height:400px;'></div>
							</div>
						</div>
						</div>";
					}
					
				}else if(count($result_16) < 1){
					
				$sql_17 = 'SELECT B.*, A.Country,C.* FROM Archive-2017_tbl_tenders AS 
				B INNER JOIN tbl_country as A 
				ON (B.org_country=A.code) 
				INNER JOIN tbl_financier as C
				ON (B.financier=C.id)
				WHERE gt_id = "'.$id.'"';
				
				$result_17 = mysqli_query($conn,$sql_17);
				$row = mysqli_num_rows($result_17);
				while($row = mysqli_fetch_assoc($result_17))
				{

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
			
				echo    "<div class='col-md-12 col-sm-12'>
						<h3>".$row['short_description']."</h3>
						</div>
						<div class='col-md-9 col-sm-12'>
							<div class='full-card'>
							<div class='row row-bottom mrg-0'>
							<a href='".$row['file_name']."' class='btn btn-download' target='_blank'>Download <i class='fa fa-download'></i></a>
								<h2 class='detail-title'>Good Tender Id:".$row['gt_id']."</h2>
								<div class='table-responsive'>
								<table class='table table-striped'>
								<tr>
								<th class='col-lg-4'>Country:</th>
								<td class='col-lg-8'><img src='assets/flags/blank.gif' 
								class='flag flag-".strtolower($row['org_country'])."'/> 
								".$row['Country']."</td>
								</tr>
								<tr>
								<th class='col-lg-4'>Deadline:</th>
								<td class='col-lg-8'>".date_format (new DateTime($row['deadline']), 'd-m-Y')."</td>
								</tr>
								<tr><th class='col-lg-4'>Tender Type:</th><td class='col-lg-8'>".strtoupper($row['ncbicb'])."</td></tr>
								<tr><th class='col-lg-4'>Financier:</th><td class='col-lg-8'>".$row['financier']."</td></tr>
								<tr><th class='col-lg-4'>Document Reference Number:</th><td class='col-lg-8'>".$row['tender_notice_no']."</td></tr>
								</table>
								</div>
							</div>
							
							<div class='row row-bottom mrg-0'>
								<h2 class='detail-title'>Tendering Authority/Purchaser</h2>
								<div class='table-responsive'>
								<table class='container table table-striped'>
									<tr><th class='col-lg-4'>Name:</th><td class='col-lg-8'>".$row['organisation_name']."</td></tr>
									<tr><th class='col-lg-4'>Address:</th><td class='col-lg-8'>".$row['org_address']."</td></tr>
									<tr><th class='col-lg-4'>Email:</th><td class='col-lg-8'>".$row['org_email']."</td></tr>
									<tr><th class='col-lg-4'>URL:</th><td class='col-lg-8'>".$row['org_url']."</td></tr>
								</table>
								</div>
							</div>
							
							<div class='row row-bottom mrg-0'>
								<h2 class='detail-title'>Tender Description</h2>
								<ul class='job-detail-des'>
								<div class='text-overflow'>
								<li style='text-align:justify;'>
								<p>".$row['tender_details']."</p>
								</li>
								</div>
								<a class='btn-overflow' href='#text-overflow' style='color:#07b107;'>Show more</a>
								</ul>
							</div>
														
							<div class='row row-bottom mrg-0'>
								<h2 class='detail-title'>Map Location</h2>
								<div id='map' class='full-width' style='height:400px;'></div>
							</div>
						</div>
						</div>";
					}
					
				}else if(count($result_17) < 1){
					
				$sql_18 = 'SELECT B.*, A.Country,C.* FROM Archive-2018_tbl_tenders AS 
				B INNER JOIN tbl_country as A 
				ON (B.org_country=A.code) 
				INNER JOIN tbl_financier as C
				ON (B.financier=C.id)
				WHERE gt_id = "'.$id.'"';
				
				$result_18 = mysqli_query($conn,$sql_18);
				$row = mysqli_num_rows($result_18);
				while($row = mysqli_fetch_assoc($result_18))
				{

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
			
				echo    "<div class='col-md-12 col-sm-12'>
						<h3>".$row['short_description']."</h3>
						</div>
						<div class='col-md-9 col-sm-12'>
							<div class='full-card'>
							<div class='row row-bottom mrg-0'>
							<a href='".$row['file_name']."' class='btn btn-download' target='_blank'>Download <i class='fa fa-download'></i></a>
								<h2 class='detail-title'>Good Tender Id:".$row['gt_id']."</h2>
								<div class='table-responsive'>
								<table class='table table-striped'>
								<tr>
								<th class='col-lg-4'>Country:</th>
								<td class='col-lg-8'><img src='assets/flags/blank.gif' 
								class='flag flag-".strtolower($row['org_country'])."'/> 
								".$row['Country']."</td>
								</tr>
								<tr>
								<th class='col-lg-4'>Deadline:</th>
								<td class='col-lg-8'>".date_format (new DateTime($row['deadline']), 'd-m-Y')."</td>
								</tr>
								<tr><th class='col-lg-4'>Tender Type:</th><td class='col-lg-8'>".strtoupper($row['ncbicb'])."</td></tr>
								<tr><th class='col-lg-4'>Financier:</th><td class='col-lg-8'>".$row['financier']."</td></tr>
								<tr><th class='col-lg-4'>Document Reference Number:</th><td class='col-lg-8'>".$row['tender_notice_no']."</td></tr>
								</table>
								</div>
							</div>
							
							<div class='row row-bottom mrg-0'>
								<h2 class='detail-title'>Tendering Authority/Purchaser</h2>
								<div class='table-responsive'>
								<table class='container table table-striped'>
									<tr><th class='col-lg-4'>Name:</th><td class='col-lg-8'>".$row['organisation_name']."</td></tr>
									<tr><th class='col-lg-4'>Address:</th><td class='col-lg-8'>".$row['org_address']."</td></tr>
									<tr><th class='col-lg-4'>Email:</th><td class='col-lg-8'>".$row['org_email']."</td></tr>
									<tr><th class='col-lg-4'>URL:</th><td class='col-lg-8'>".$row['org_url']."</td></tr>
								</table>
								</div>
							</div>
							
							<div class='row row-bottom mrg-0'>
								<h2 class='detail-title'>Tender Description</h2>
								<ul class='job-detail-des'>
								<div class='text-overflow'>
								<li style='text-align:justify;'>
								<p>".$row['tender_details']."</p>
								</li>
								</div>
								<a class='btn-overflow' href='#text-overflow' style='color:#07b107;'>Show more</a>
								</ul>
							</div>
														
							<div class='row row-bottom mrg-0'>
								<h2 class='detail-title'>Map Location</h2>
								<div id='map' class='full-width' style='height:400px;'></div>
							</div>
						</div>
						</div>";
					}
					
				}else{
					
					echo "	<div class='col-md-9 col-sm-12'>
							<div class='jumbotron text-center' style='background-color:#337ab7;color:white;'>
							<h2>Result Not Found</h2><br>
							 
							</div>
							</div>
						";
				
				}
					echo "	<div class='col-md-9 col-sm-12'>
							<div class='jumbotron text-center' style='background-color:white;color:#07b107;'>
							<h2>Result Not Found</h2><br>
							<p>contact admin :- info@goodtenders.com</p>
							</div>
							</div>
						";
			
			?>
					<!-- End Tenders Description -->
			
					<!-- Start Sidebar -->
					<div class="col-md-3 col-sm-12">
						<div class="sidebar right-sidebar">
							<div class="side-widget">
								<h2 class="side-widget-title">Tenders Alert</h2>
								<div class="job-alert">
									<div class="widget-text">
										<form>
											<input type="text" name="keyword" class="form-control" placeholder="Keywords">
											<input type="email" name="email" class="form-control" placeholder="Email ID">
											<button type="submit" class="btn btn-alrt">Add Alert</button>
										</form>
									</div>
								</div>
							</div>
							
							<div class="side-widget" style="margin-top: 15%;">
								<a type="button" href="showtenders.php" target="_blank" class="btn btn-nomatch btn-lg">Not searching for this !! <br>Search Again</a>
								
							</div>
						</div>
					</div>
					<!-- End Sidebar -->
				</div>
			</section>
			<?php
				}
				else{
					echo "	<div class='container text-center'>
							<div class='jumbotron'>
							<h3>No Tenders Details Here</h3>
							<p>Please Browse From Here <a href='showtenders.php' style='color:blue;text-decoration:underline;'>Latest Tenders</a>
							</p></div></div>";
				}
			?>	
					
		<script> 
			  // Initialize and add the map
				function initMap() {
				  // The location of Uluru
				  var uluru = {lat: 21.7679, lng: 78.8718};
				  // The map, centered at Uluru
				  var map = new google.maps.Map(
				      document.getElementById('map'), {zoom: 4, center: uluru});
				  // The marker, positioned at Uluru
				  var marker = new google.maps.Marker({position: uluru, map: map});
				}
   			</script>
    		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfMthtKu2h1E8AF_0JlsLDC8mJuroTk6E&callback=initMap"></script>

	<!-- Footer File -->		
	<?php
		}
		else{
			echo "<div class='container text-center' style='margin-top:5%;'>
							<div class='jumbotron'>
							<h3>No Tenders Details Here</h3>
							<p>Please Browse From Here <a href='showtenders.php' style='color:blue;text-decoration:underline;'>Latest Tenders</a>
							</p></div></div>";
		}
		include('footer.php');
	  ?>		

	  <script type="text/javascript">
	  	var text = $('.text-overflow'),
     	btn = $('.btn-overflow'),
       	h = text[0].scrollHeight; 

		if(h > 120) {
			btn.addClass('less');
			btn.css('display', 'block');
		}

		btn.click(function(e) 
		{
		  e.stopPropagation();

		  if (btn.hasClass('less')) {
		      btn.removeClass('less');
		      btn.addClass('more');
		      btn.text('Show less');

		      text.animate({'height': h});
		  } else {
		      btn.addClass('less');
		      btn.removeClass('more');
		      btn.text('Show more');
		      text.animate({'height': '120px'});
		  }  
		});

	  </script>