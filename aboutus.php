<?php
	include('header.php');	
?>
<title>About US | Best Tenders Portal</title>			
<style type="text/css">
	.about-page{
		margin-top: 2%;
	}
	.about-page li{
		list-style: none;
	}
	.about-page p{
		text-align: justify;
		font-size: 1.1em;
		text-transform: unset;
	}
	.about-page a{
		color:#337ab7;
		text-decoration: underline;
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
		line-height: 110px !important;
	}
	.brows-job-company-img span{
		font-size: 2.4em !important;
	}
	.brows-job-company-img:hover{
		cursor: pointer;
		background-color: #07b107;
	}
	

</style>			
			
			
			<!-- About us Page Section Start -->
			<section class="about-page">
				<div class="container">
				<div class="main-heading">
					<h2><span> About us </span></span></h2>
				</div>
				</div>
	
				<div class="container">
					<div class="left_icons col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center">
						<ul>
							<li>
								<div class="brows-job-company-img">
									<span class="fa fa-building"></span>
								</div>
							</li>
							<li>
								<div class="brows-job-company-img">
									<span class="fa fa-flash"></span>
								</div>
							</li>
							<li>
								<div class="brows-job-company-img">
									<span class="fa fa-envira"></span>
								</div>
							</li>
							<li>
								<div class="brows-job-company-img">
									<span class="fa fa-fire"></span>
								</div>
							</li>
						</ul>
					</div>
					<div class="center_section col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<br>
						<p><a href="index.php" target="_blank">GoodTenders</a> is the largest databank of Global Tenders, Projects, News and Contract Awards Information.</p>

						<p>We are collecting information from various sources like newspapers, electronic mediums, local partners, channel partners, multilateral funding agencies/donor agencies, government sites, public procurement sites, e-tendering portals etc. The coverage of information is from 300+ industry sectors and covers information/opportunities from 200+ countries.</p>

						<p><strong>The website consists of 27 Million+ tenders in our database.</strong></p>

						<p>Our aim is to not miss out a single opportunity available in the Public Procurement Domain</p>

						<p>Our vision is to be the most comprehensive search engine for our clients.
						</p>

						<p>Our website is most useful to Fortune 500 companies, Blue chip companies, Multinationals and SME organizations.</p>

						<p>Using our site, <Strong>our clients will not have to spend any resources
						</strong> /In-house team to extract the leads.
						Our website will be the one stop source for all your public requirements. This data is extracted, classified into CPV and goes through a quality check.</p>

						<p>Please view our different services on our <a href="services.php" 
							target="_blank">Services Page</a> and our different Subscriptions Plans on <a href="pricing.php" target="_blank">Pricing Page.</a></p>


					</div>
					<div class="right_icons col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center">
						<ul>
							<li>
								<div class="brows-job-company-img">
									<span class="fa fa-plus-square"></span>
								</div>
							</li>
							<li>
								<div class="brows-job-company-img">
									<span class="fa fa-lock"></span>
								</div>
							</li>
							<li>
								<div class="brows-job-company-img">
									<span class="fa fa-plane"></span>
								</div>
							</li>
							<li>
								<div class="brows-job-company-img">
									<span class="fa fa-laptop"></span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</section>
			<!-- contact section End -->

<?php
	include('footer.php');
?>

	<script type="text/javascript">
		$(".brows-job-company-img").click(function(){

			window.open("tenderbysector.php","_blank");

		});
	</script>