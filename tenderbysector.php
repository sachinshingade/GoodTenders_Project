<!-- Tenders of Sector Page -->

<?php
	session_start();
	include('header.php');
?>
<title>Tenders by Sectors | GoodTenders | Best Tenders Portal</title>
<style type="text/css">

	@media screen and (min-width: 1440px) { 
    	.brows-job-list{
			max-height: 22vh !important;
		}
		.brows-job-position h3{
			font-size: 1.5em;
		}
	}

	@media screen and (max-width: 2560px) { 
    	.brows-job-list{
			max-height: 22vh !important;
		}
		.brows-job-position h3{
			font-size: 0.9em;
		}
		.job-position{
		margin: 5%;
		}
	}

	/* For desktop: */
		.col-1 {width: 8.33%;}
		.col-2 {width: 16.66%;}
		.col-3 {width: 25%;}
		.col-4 {width: 33.33%;}
		.col-5 {width: 41.66%;}
		.col-6 {width: 50%;}
		.col-7 {width: 58.33%;}
		.col-8 {width: 66.66%;}
		.col-9 {width: 75%;}
		.col-10 {width: 83.33%;}
		.col-11 {width: 91.66%;}
		.col-12 {width: 100%;}

		@media only screen and (max-width: 768px) {
		    /* For mobile phones: */
		    [class*="col-"] {
		        width: 100%;
		    }
		}



	.job-position{
		margin-top: 8%;
	}
	.job-num{
		background-color: #34434e !important;
		color: #ffffff !important;
	}
	.card-body{
		margin:2%;
		padding: 5%;
		border: 1px solid #BFBFBF;
    	background-color: #ffffff;
    	box-shadow: 3px 3px 3px #aaaaaa;	
	}
	.brows-job-list{
		height: 100vh;
	}
	.brows-job-company-img{
		width: 100px !important;
		margin:10px auto;
		height: 100px !important;
		display:inline-block;
		background: #f4f5f7;
		vertical-align: middle;
		border-color: #07b107 !important; 
		border-radius: 50%;
		line-height: 100px !important;
	}
	.brows-job-company-img span{
		font-size: 2.4em !important;
	}
	.brows-job-list:hover{
		cursor: pointer;
	}
	.brows-job-list:hover .brows-job-company-img{
		background-color: #07b107;
	}
	.brows-job-company-img img{
		width: 40px;
		height: 40px;	
	}
</style>

<body>
<!--
<section class="inner-header-title" style="color:#000;background-image:url(http://via.placeholder.com/1920x850);">
		<div class="container">
			<h1><strong>Tenders by Sector</strong></h1>
		</div>
	</section>
-->	
	<div class="clearfix"></div>
	<!-- Title Header End -->

		<section class="country">
			<div class="container">
				<div class="main-heading">
					<p>categorized Tenders</p>
					<h2>Tenders By <span>Sector</span></h2>
				</div>

				<!-- Sectors Box In Grid -->
					<div class="row extra-mrg">
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list" 
							onclick="window.open('showtenders.php?sector=NDUwMDAwMDAsNzAwMDAwMDAsNzEwMDAwMDA=','_blank')">
								
								<div class="brows-job-company-img">
									<span class="fa fa-building"></span>
								</div>
								<div class="brows-job-position" style="padding: 0px;">
									<h3><a href="#">Infrastructure & Construction</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">5500+ Tenders</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=OTAwMDAwMCw0NTI1MDAwMCw2NTMwMDAwMCw2NTQwMDAwMA==','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-flash"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Energy & Power</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">3450+ Tenders</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=NzEzMTAwMDAsODA1NDAwMDAsOTAwMDAwMDA=','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-envira"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Environment</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">3100+ Tenders</span>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=NzYwMDAwMDAsNDUyNTAwMDAsNDMxMzAwMDAsNDQxNjEwMDAsNDUyNjI0MjI=','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-fire"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Oil & Gas</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">4990+ Tenders</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=MzMwMDAwMDAsODUwMDAwMDA=',
							'_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-plus-square"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Healthcare & Medical</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">3800+ Tenders</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=MzUwMDAwMDAsNzUyMjAwMDA=',
							'_blank')">
								<div class="brows-job-company-img">
									<i class="fa fa-lock"></i>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Defense & Security</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">2700+ Tenders</span>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=MzQ5NjAwMDAsMzQ5OTcwMDAsNDUyMTMzMzMsNDUyMzUxMDAsNDUzMTYyMjAsNTEyMjEwMDAsNTE2MTExMTAsNjM3MzEwMDAsNzEzMTEyNDAsOTEzMTAwMCw0ODEzMDAwMCw2MDQyMzAwMCw1MDIxMDAwMA==','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-plane"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Aviation</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">4500+ Tenders</span>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=MzAwMDAwMDAsMzI0MDAwMDAsNDgwMDAwMDAsNzIwMDAwMDA=','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-laptop"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Information Technology</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">2000+ Tenders</span>
								</div>
								
							</div>
						</div>
						
					</div>
					<!--/.Browse Sector In Grid-->

					<!--Browse Sector In Grid-->
					<div class="row extra-mrg">
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=NjYwMDAwMDAsMDAwMDAwMDA=',
							'_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-bank"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Banking & Finance</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">5500+ Tenders</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=MzQ2MDAwMDAsNDUyMzQwMDAsNTAyMjAwMDAsNjAyMDAwMDAsNTAyMjAwMDA=','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-train"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Railways</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">3450+ Tenders</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=NDUyMzMwMDAsNjM3MTIyMDAsNzEzMTEyMTAsNzEzMTEyMjAsNTAyMzAwMDA=','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-road"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Roads,Bridges & Highways</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">3100+ Tenders</span>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=MzQ1MDAwMDAsMzQ5MzAwMDAsNDUyNDAwMDAsNTAyNDAwMDAsNzEzNTQ1MDAsNzMxMTIwMDAsOTgzNjAwMDA=','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-venus"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Marine</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">4990+ Tenders</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=MjIwMDAwMDAsNzk4MDAwMDAsNzk5MDAwMDA=',
								'_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-print"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Printing & Packaging</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">3800+ Tenders</span>
								</div>
							</div>
						</div>
	
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=NDEwMDAwMDAsOTAwMDAwMDAsNDUyMzEzMDAsNDUyNTIwMDA=','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-tint"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Water & Sanitation</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">4500+ Tenders</span>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=MzIwMDAwMDAsNjQyMDAwMDA=',
							'_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-phone"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Telecommunication</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">2000+ Tenders</span>
								</div>
								
							</div>
						</div>

						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=ODAwMDAwMDAsMDAwMDAwMDA=','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-book"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Education & Training</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">5500+ Tenders</span>
								</div>
							</div>
						</div>
						
					</div>
					<!--/.Browse Sector In Grid-->

					<!--Browse Sector In Grid-->
					<div class="row extra-mrg">
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=MzQwMDAwMDAsNjAwMDAwMDAsNjMwMDAwMDA=','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-truck"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Transportation</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">3450+ Tenders</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=NjYxNzAwMDAsNzEwMDAwMDAsNzMwMDAwMDAsNzkxMjAwMDAsNzk0MDAwMDAsOTA3MTMwMDA=','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-group"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Consultancy</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">3100+ Tenders</span>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=MzUwMDAwMDAsNzUyNTAwMDAsNzk3MDAwMDAsMzQxNDQyMTAsMzE2MjUyMDA=','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-fire"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Fire Safety & Security</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">4990+ Tenders</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=MTYwMDAwMDAsMzAwMDAwMDAsMzEwMDAwMDAsMzIwMDAwMDAsMzMwMDAwMDAsMzQwMDAwMDAsMzUwMDAwMDAsMzgwMDAwMDAsMzkwMDAwMDAsNDIwMDAwMDAsNDMwMDAwMDA=','_blank')">
								<div class="brows-job-company-img">
									<img src="assets/img/machine_icon.png"/>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Machinery & Equipment</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">3800+ Tenders</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=MTQwMDAwMDAsMDAwMDAwMDA=','_blank')">
								<div class="brows-job-company-img">
									<img src="assets/img/mining_icon.png"/>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Mining & Ores</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">2700+ Tenders</span>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=MzAwMDAwMCwxNTAwMDAwMCw3NzAwMDAwMA==','_blank')">
								<div class="brows-job-company-img">
									<img src="assets/img/food_icon.png"/>
								</div>
								<div class="brows-job-position" style="padding: 0px;">
									<h3><a href="#">Food, Beverage & Agriculture</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">4500+ Tenders</span>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=MzAwMDAwMCw5MDAwMDAwLDE0MDAwMDAwLDE1MDAwMDAwLDE4MDAwMDAwLDE5MDAwMDAwLDIyMDAwMDAwLDI0MDAwMDAwLDMwMDAwMDAwLDMxMDAwMDAwLDMyMDAwMDAwLDMzMDAwMDAwLDM0MDAwMDAwLDM1MDAwMDAwLDM3MDAwMDAwLDM5MDAwMDAwLDQ0MDAwMDAw','_blank')">
								<div class="brows-job-company-img">
									<img src="assets/img/industry_icon.png"/>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Industry</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">2000+ Tenders</span>
								</div>
								
							</div>
						</div>

						<div class="col-md-3 col-xs-12 col-lg-3">
							<div class="grid-view brows-job-list"
							onclick="window.open('showtenders.php?sector=NTAwMDAwMDAsNTEwMDAwMDAsNTUwMDAwMDAsNjMwMDAwMDAsNjQwMDAwMDAsNjUwMDAwMDAsNzUwMDAwMDAsNzkwMDAwMDAsODUwMDAwMDAsOTIwMDAwMDAsOTgwMDAwMDA=','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-info"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="#">Other Services</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">More Tenders</span>
								</div>
							</div>
						</div>
						
				</div>
					<!--/.Browse Sector In Grid-->



			</div>
		</section>		


<?php
	include('footer.php');
?>		