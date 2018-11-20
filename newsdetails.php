	<!-- Header File -->		
	<?php
	session_start();
		include('header.php');
		require 'dbconnect.php';
	?>	
	<title>Business News | GoodTenders | Best Tenders Portal</title>

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
		<!-- Projects Full Details Sections -->
		<section class="view">
		<div class="container text-center">
		<div class="col-lg-12 col-md-12 col-sm-12">	
			<div class="row">
				<div class="main-heading">
					<p>Full View</p>
					<h2>News <span>Details</span></h2>
				</div>
			</div>
		</div>
		</div>
		</section>
		<hr>
		<!-- Tenders full details Start -->
		<?php
		if(isset($_GET['nsid']))
		{
			$id = $_GET['nsid'];

			mysqli_query ($conn,"set character_set_results='utf8'");
			$sql = "SELECT B.*, A.Country,C.Sector_Name FROM tbl_news AS B 
					INNER JOIN tbl_country as A 
					ON (B.country=A.code)
					LEFT JOIN tbl_sector C
            		ON B.sector = C.Sub_Sector_Id Where B.id = '".$id."' LIMIT 1";

			$result = mysqli_query($conn,$sql);
			$row = mysqli_num_rows($result);

			while($row = mysqli_fetch_assoc($result))
			{

			echo"<section class='full-detail-description full-detail'>
				<div class='container'>
					<div class='col-md-12 col-sm-12 col-lg-12'>
					<h3>".$row['headline']."</h3>
						<div class='full-card'>
						<div class='row row-bottom mrg-0'>
							<h2 class='detail-title'>Good Tender Id:".$row['id']."</h2>
							<ul class='job-detail-des'>
							<li><span>Project Location </span>
							<img src='assets/flags/blank.gif' 
							class='flag flag-".strtolower($row['country'])."'/> 
							".$row['Country']."</li></ul>
							</div>
						
						
						<div class='row row-bottom mrg-0'>
							<h2 class='detail-title'>Details</h2>
							<ul class='job-detail-des'>
							<div class='text-overflow'>
							<li style='text-align:justify;'>
							<p>".$row['details']."</p>
							</li>
							</div>
							<a class='btn-overflow' href='#text-overflow' style='color:#07b107;'>Show more</a>
							</ul>
						</div>

						<div class='row row-bottom mrg-0'>
							<h2 class='detail-title'>Source URL</h2>
							<ul class='job-detail-des'>
							<li>".$row['source_url']."</li>
							</ul>
						</div>
													
					</div>
					</div>";
				}
			
			?>
					<!-- End Tenders Description -->
				</div>
			</section>
			<?php
				}
				else{
					echo "	<div class='container text-center'>
							<div class='jumbotron'>
							<h3>No News Details Here</h3>
							<p>Please Browse From Here <a href='news.php' style='color:blue;text-decoration:underline;'>Business News</a>
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
			echo "	<div class='container text-center' style='margin-top:5%;'>
							<div class='jumbotron'>
							<h3>No Project Details Here</h3>
							<p>Please Browse From Here <a href='news.php' style='color:blue;text-decoration:underline;'>Projects</a>
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