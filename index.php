<!-- GoodTenders - Home Page -->

<?php
	session_start();
	include('dbconnect.php');
	mysqli_query ($conn,"set character_set_results='utf8'");
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
	<head>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!--
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122870321-1"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());

  		gtag('config', 'UA-122870321-1');
	</script>
	-->

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Best Tenders Portal">
	<meta name="keywords" content="tenders, indian tenders, latest tenders, online tenders">
	<meta name="robots" content="index,follow">

	<link rel="icon" href="assets/img/favicon_gt.ico" type="image/x-icon"/>
    <title>GoodTenders | Best Tenders Portal | Construction tenders | Railways tenders | Education tenders | 
    Agriculture tenders | Roads & Highways Tenders | Global Tenders across the world</title>

    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" media="all" href="assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap-theme.min.css">
	<!-- Bootstrap Select Option css -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap-select.min.css">
	<!-- Bootstrap wysihtml5 ditor-->
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap-wysihtml5.css">
	 
	<!--owl Carousel-->
	<link rel="stylesheet" href="assets/plugins/owl-carousel/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/plugins/owl-carousel/css/owl.theme.css">
	<link href="assets/css/select2.css" rel="stylesheet"/>
	
    <!-- Icons -->
    <link href="assets/plugins/font-awesome/font-awesome.css" rel="stylesheet">
	<link href="assets/plugins/line-font/line-font.css" rel="stylesheet">
    
    <!-- Animate -->
    <link href="assets/plugins/animate/animate.css" rel="stylesheet">
    <link href="assets/flags/flags.css" rel="stylesheet">
    
    <!-- Bootsnav -->
    <link href="assets/css/bootsnav.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/index_css.css">
    
    <!-- Custom style -->
    <link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/colors/green-style.css" rel="stylesheet">
	<link href="assets/css/responsiveness.css" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	<style type="text/css">
	.brows-job-company-img .fa
	{
		font-size: 25px;
	}
	.adsearch{
		padding: 2%;
		border: none;
		background: none;
		color:#fff;
	}
    #advanced_search {
  		color:#282C32;
  		padding: 16px;
  		margin-bottom: 10px;
  		opacity: 0;
  		transform: scale(1.5);
  		transform-style: preserve-3d;
  		transition: .8s ease opacity,.8s ease transform;
		border-radius: 0px;
		width:100%;
	}
	.form-group .form-control::-webkit-input-placeholder{
		font-size: 0.9em;
	}
	.form-group .form-control {
    	font-weight: normal;
	}
	.form-group label{
		margin-top: 2%;
	}
	.form-group label span{
		float: right;
		margin-right: -25px;
		color: red;
		margin-top: 8%;
		font-size: 2.1em;
	}
	#subscribe{
		margin-bottom: -10px !important;
		margin-left: -1% !important;
		margin-right: -4% !important;
	}
	.circleBase {
    	border-radius: 50%;
    }
	.circleMain {
    	width: 100%;
    	height: 100%;
    	background: #35434e;
    	border: 15px solid #07b107;
    	color: #fff;
    	padding: 15%; 
	}
	.circleMain h3{
		font-size: 1.4em;
	}
	.rowork h4{
		color:#ffffff;
	}
	.work-details{
		background:rgba(53, 67, 78,0.7);
		margin-top: 2%;
	}
	.work-details .main-heading{
		margin-top:-5% !important; 
	}
	.rowork{
		padding: 10px;
		margin-bottom: -5%;
	}
	.main_footer_content li a:hover{
		color: #ffffff !important;
	}

	/* Top Button CSS */
	#myBtn {
  		display: none;
  		position: fixed;
  		bottom: 50px;
  		right: 10px;
  		z-index: 99;
  		border: none;
  		border-radius: 50%;
  		outline: none;
  		background-color: #07b107;
  		color: white;
  		cursor: pointer;
  		padding: 15px;
	}
	#myBtn:hover {
  		background-color: #07b107;
	}	
	
	/* Captcha Sections */
	#ran{
		color: #07b107;
		background-image: url('assets/img/captcha.jpg');
		font-weight: bold;
		font-size: 25px;
		text-align: center;
	}
	.special-padd1{
		padding-left:15px; 
		padding-right: 0px;
	}
	.special-padd2{
		padding-left: 0px;
		padding-right: 2px;
	}

	/* Search Button CSS */
	.btm_btn{
		text-transform:uppercase; 
	}

	.btm_btn:hover{
		color:#07b107;

	}
	.signup-padd{
		padding-left: 20px;
		padding-right: 15px;
	}
	
	/* Tenders By Setor More Btn */
	.btn-more{
		background-color: rgba(53, 67, 78,0.7);
		color: #ffffff;
		border: none;
		padding: 10px 14px;
		font-size: 16px;
		float: right;
		margin-top: -10%;
	}
	.btn-more:hover{
		background-color: #07b107;
		color: #ffffff;
	}
	.banner-text{
		margin-top: -10px;
	}
	.work-process-caption a{
		color: blue;
	}
	.footer-form .form-control{
		background-color: #ffffff;
		font-style: oblique;
	}
	/* Media Query For Responsiveness */
	@media screen and (max-width: 320px) { 
		#advanced_search {
			width:100%;
		}
		    	#adreset{
    		display: none;
    	}
	}
	@media screen and (max-width: 1240px) { 
    .banner{
    		height: 100%;
    	}
	}

	@media screen and (min-width: 1240px) { 
    .banner{
    		height: 100%;
    	}
	}
	@media screen and (max-width: 780px) { 
    	select{
    		width:100%;
    		font-size: 0.5em;
    		height:100%;
    	}
    	#adreset{
    		display: none;
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

		#myBtn {
			display: none;
			position: fixed;
			bottom: 80px;
			right: 20px;
			z-index: 99;
			border: none;
			border-radius: 50%;
			outline: none;
			background-color: #07b107;
			color: white;
			cursor: pointer;
			padding: 15px;
		}
		/* Loading Icons Start */
		.loader {
		    position: fixed;
		    left: 0px;
		    top: 0px;
		    width: 100%;
		    height: 100%;
		    z-index: 9999;
		    background: url('assets/img/goodtenders_mobile.gif') 50% 50% no-repeat rgb(249,249,249);
		    opacity: 0.95;
		}
		/* Loading Icons End */
	}
		
	@media screen and (min-width: 1000px) { 
    	.brows-job-list{
			max-height: 20vh !important;
		}
		.brows-job-position h3{
			font-size: 1.5em;
		}
		
		/* Loading Icons Start */
		.loader {
		    position: fixed;
		    left: 0px;
		    top: 0px;
		    width: 100%;
		    height: 100%;
		    z-index: 9999;
		    background: url('assets/img/goodtenders_loader.gif') 50% 50% no-repeat rgb(249,249,249);
		    opacity: 0.95;
		}
		/* Loading Icons End */
	}
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
	small{
		font-size: 0.5em !important;
		color:#ffffff !important;
		position: absolute;
		left:0px;
		top:0px;
		padding: 2px;
	}
	small img{
		width:24px;
		height: 24px;
	}
	.selectpicker option{
		width: 100% !important;
	}
	.captcha_img{
        height: 50px;
        width: 350px;
    }
	#gtid::-webkit-input-placeholder {
			/* WebKit, Blink, Edge */
			color: #979A9A;
	}
	#gtid:-moz-placeholder {
			/* Mozilla Firefox 4 to 18 */
			color: silver;
			opacity: 1;
	}
	#gtid::-moz-placeholder {
			/* Mozilla Firefox 19+ */
			color: silver;
			opacity: 1;
	}
	#gtid:-ms-input-placeholder {
			/* Internet Explorer 10-11 */
			color: silver;
	}
	#deadline1::-webkit-input-placeholder {
			/* WebKit, Blink, Edge */
			color: #979A9A;
	}
	#deadline1::-moz-placeholder {
			/* Mozilla Firefox 19+ */
			color: silver;
			opacity: 1;
	}
	#deadline2::-webkit-input-placeholder {
			/* WebKit, Blink, Edge */
			color: #979A9A;
	}
	#deadline2::-moz-placeholder {
			/* Mozilla Firefox 19+ */
			color: silver;
			opacity: 1;
	}
	#img_logo{
		max-height: 40px;
	}
	</style>
	


	<meta name="google-site-verification" content="dFZYcSYjtl5NDlhFZlR2h2VyJ3KC6eVg89tRevnyTVs" />
	
	</head>
	<body>

		<!-- Loader Html starts -->

			<div class="loader img-responsive"></div>

		<!-- Loader Html Ends -->

		<div class="wrapper">  
			<!-- Start Navigation -->
			<nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
            
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars" style="margin-left:20px;"></i>
					</button>
					<!-- Start Header Navigation -->
					<div class="navbar-header">
						<a class="navbar-brand" href="index.php">
						<!-- <strong>GoodTenders</strong> -->
						<img src="assets/img/GoodTenders_logo.png" class="img-responsive" alt="GoodTenders" id="img_logo">
						</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="navbar-menu">
						<ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
					<!--	<li class="active"><input type="text" class="form-control" id="find" placeholder="Find Tenders"></li>-->
							<li class="dropdown megamenu-fw"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Browse</a>
								<ul class="dropdown-menu megamenu-content" role="menu">
									<li>
										<div class="row">
											<div class="col-menu col-md-3">
												<h6 class="title">Search</h6>
												<div class="content">
													<ul class="menu-col">
														<li><a href="tenderbycountry.php">Tenders by Country</a></li>
														<li><a href="tenderbyregion.php">
														Tenders by Region</a></li>
														<li><a href="politicalregion.php">Tenders by Political Region</a></li>
														<li><a href="tenderbysector.php">Tenders by Sector</a></li>
														<li><a href="funding_agency.php">Tenders by Funding Agency</a></li>
													</ul>
												</div>
											</div><!-- end col-3 -->
											<div class="col-menu col-md-3">
												<h6 class="title">Data</h6>
												<div class="content">
													<ul class="menu-col">
														<li><a href="showtenders.php?Pageid=Tenders&Page=allAds&page=1">Tenders</a></li>
														<li><a href="project.php?Page=allAds&page=1">Projects</a></li>
														<li><a href="contract_awards.php?Page=allAds&page=1">Contract Awards</a></li>
														<li><a href="news.php?Page=allAds&page=1">Business News</a></li>
													</ul>
												</div>
											</div><!-- end col-3 -->
											<div class="col-menu col-md-3">
												<h6 class="title">Services</h6>
												<div class="content">
												<ul class="menu-col">
													<li><a href="services.php#email-alerts">Daily Email Alerts</a></li>
													<li><a href="services.php#website-access">Website Access</a></li>
													<li><a href="services.php#archive-tenders">Archive Tenders</a></li>
													<li><a href="services.php#tender-analytics">Tender Analytics</a></li>
													<li><a href="services.php#bidding-assistance">Bidding Assistance</a></li>
													<li><a href="services.php#export-feature">Excel Sheet Report</a></li>
												</ul>
												</div>
											</div>    
											<div class="col-menu col-md-3">
												<h6 class="title">More</h6>
												<div class="content">
													<ul class="menu-col">
														<li><a href="aboutus.php">About us</a></li>
														<li><a href="contact.php">Contact</a></li>
														<li><a href="faq.php">FAQ</a></li>
														<li><a href="blog.php">Blogs</a></li>
														<li><a href="freetenders.php?Page=allAds&page=1">Free Tenders</a></li>
														<li><a href="javascript:void(Tawk_API.toggle())">Help Chat</a></li>
													</ul>
												</div>
											</div><!-- end col-3 -->
										</div><!-- end row -->
									</li>
								</ul>
							</li>
							<!--<li><a href="#search">Search</a></li>-->
							<li><a href="showtenders.php?Pageid=Tenders&Page=allAds&page=1"></i>Tenders</a></li>
							<li><a href="project.php?Page=allAds&page=1"></i>Projects</a></li>
							<li><a href="contract_awards.php?Page=allAds&page=1"></i>Contract Award</a></li>
							<li><a href="publishtenders.php">Publish Tenders</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
						<!--<li><a href="login.html"><i class="fa fa-pencil" aria-hidden="true"></i>SignUp</a></li>-->
							<li><a href="#pricing"><i class="fa fa-sign-in" aria-hidden="true"></i>Pricing</a></li>
							<li><a href="pay.php">Pay</a></li>

							<?php if(isset($_SESSION["id"])): ?>
							<li class="left-br"><a>Welcome <?php echo $_SESSION["name"];?>
								<i class="fa fa-user-circle"></i></a></li>
							<li><a href="logout.php" class="signin">Logout</a></li>
							<?php else: ?>
							<li class="left-br"><a href="javascript:void(0)"  data-toggle="modal" data-target="#login" class="signin">Log In</a></li>
							<li><a href="javascript:void(0)"  data-toggle="modal" data-target="#register" class="signin">Register</a></li>
							<?php endif; ?>
						</ul>
					</div><!-- /.navbar-collapse -->
				 
			</nav>
			<!-- End Navigation -->
			<div class="clearfix"></div>

			
				<!-- Main Banner Section Start -->
			<div class="banner" id="search" 
			style="background-image:url(assets/img/Blue_World.png);">  
			<div class="container">				
			<div class="banner-caption ">
				<div class="row">
				<div class="col-md-12 col-sm-12 banner-text">
				<h1><span class="counter-count" style="color: #fff;">700000</span>+ Tenders</h1>
			<form class="form-horizontal" action="showtenders.php" method="post" target="_blank">
				<div class="row">	
				<div class="col-sm-12 col-xs-12 col-md-5 " style="margin: 10px 0 0 0">
					<select class="keywords" data-style="form-control" data-width="100%" data-dropup-auto="false" multiple name="ikeyword[]">
					</select>			
				</div>
				<div class="col-sm-12 col-xs-12 col-md-4 " style="margin: 10px 0 10px 0">
					<select class="locations" data-style="form-control" data-width="100%" data-dropup-auto="false" multiple name="ilocation[]">
					</select>
				</div>
				
					<div class="col-md-3 col-xs-12" style="margin-top: 10px">
						<input type="submit" id="search" onclick="" value="Search" class="btn btn-primary searchbtn">
					</div>
				</div>
				
				<!-- Advanced Search Section Start -->
				<div class="container" id="advanced_search" style="display: none;">
				<div class="col-md-12 col-sm-12">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12 no-padd">
						<select class="cpv" data-style="form-control" data-width="100%" 
						multiple="multiple" name="icpv[]" data-dropup-auto="false">
						</select>	
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 no-padd sector_div">
						<select class="sector" data-style="form-control" data-width="100%" title="Select a Sector" 
							data-size="4" name="isector">
								<option onclick=""></option>
								<option value="NDUwMDAwMDAsNzAwMDAwMDAsNzEwMDAwMDA=">Infrastructure & Construction</option>
								<option value="OTAwMDAwMCw0NTI1MDAwMCw2NTMwMDAwMCw2NTQwMDAwMA==">Energy and Power</option>
								<option value="NzEzMTAwMDAsODA1NDAwMDAsOTAwMDAwMDA=">Environment</option>
								<option value="NzYwMDAwMDAsNDUyNTAwMDAsNDMxMzAwMDAsNDQxNjEwMDAsNDUyNjI0MjI=">Oil & Gas</option>
								<option value="MzMwMDAwMDAsODUwMDAwMDA=">Healthcare and Medical</option>
								<option value="MzUwMDAwMDAsNzUyMjAwMDA=">Defense & Security</option>
								<option value="MzQ5NjAwMDAsMzQ5OTcwMDAsNDUyMTMzMzMsNDUyMzUxMDAsNDUzMTYyMjAsNTEyMjEwMDAsNTE2MTExMTAsNjM3MzEwMDAsNzEzMTEyNDAsOTEzMTAwMCw0ODEzMDAwMCw2MDQyMzAwMCw1MDIxMDAwMA==">Airport & Aviation</option>
								<option value="MzAwMDAwMDAsMzI0MDAwMDAsNDgwMDAwMDAsNzIwMDAwMDA=">Information Technology</option>
								<option value="NjYwMDAwMDAsMDAwMDAwMDA=">Banking and Finance</option>
								<option value="MzQ2MDAwMDAsNDUyMzQwMDAsNTAyMjAwMDAsNjAyMDAwMDAsNTAyMjAwMDA=">Railways</option>
								<option value="NDUyMzMwMDAsNjM3MTIyMDAsNzEzMTEyMTAsNzEzMTEyMjAsNTAyMzAwMDA=">Roads,Bridges & Highways</option>
								<option value="MzQ1MDAwMDAsMzQ5MzAwMDAsNDUyNDAwMDAsNTAyNDAwMDAsNzEzNTQ1MDAsNzMxMTIwMDAsOTgzNjAwMDA=">Marine</option>
								<option value="MjIwMDAwMDAsNzk4MDAwMDAsNzk5MDAwMDA=">Printing & Packaging</option>
								<option value="NDEwMDAwMDAsOTAwMDAwMDAsNDUyMzEzMDAsNDUyNTIwMDA=">Water & Sanitation</option>
								<option value="MzIwMDAwMDAsNjQyMDAwMDA=">Telecommunication</option>
								<option value="ODAwMDAwMDAsMDAwMDAwMDA=">Education & Training</option>
								<option value="MzQwMDAwMDAsNjAwMDAwMDAsNjMwMDAwMDA=">Transportation</option>
								<option value="NjYxNzAwMDAsNzEwMDAwMDAsNzMwMDAwMDAsNzkxMjAwMDAsNzk0MDAwMDAsOTA3MTMwMDA=">Consultancy</option>
								<option value="MzUwMDAwMDAsNzUyNTAwMDAsNzk3MDAwMDAsMzQxNDQyMTAsMzE2MjUyMDA=">Fire safety & security</option>
								<option value="MTYwMDAwMDAsMzAwMDAwMDAsMzEwMDAwMDAsMzIwMDAwMDAsMzMwMDAwMDAsMzQwMDAwMDAsMzUwMDAwMDAsMzgwMDAwMDAsMzkwMDAwMDAsNDIwMDAwMDAsNDMwMDAwMDA=">Machinery & Equipment</option>
								<option value="MTQwMDAwMDAsMDAwMDAwMDA=">Mining and Ores</option>
								<option value="MzAwMDAwMCwxNTAwMDAwMCw3NzAwMDAwMA==">Food, Beverage and Agriculture</option>
								<option value="MzAwMDAwMCw5MDAwMDAwLDE0MDAwMDAwLDE1MDAwMDAwLDE4MDAwMDAwLDE5MDAwMDAwLDIyMDAwMDAwLDI0MDAwMDAwLDMwMDAwMDAwLDMxMDAwMDAwLDMyMDAwMDAwLDMzMDAwMDAwLDM0MDAwMDAwLDM1MDAwMDAwLDM3MDAwMDAwLDM5MDAwMDAwLDQ0MDAwMDAw">Industry</option>
								<option value="NTAwMDAwMDAsNTEwMDAwMDAsNTUwMDAwMDAsNjMwMDAwMDAsNjQwMDAwMDAsNjUwMDAwMDAsNzUwMDAwMDAsNzkwMDAwMDAsODUwMDAwMDAsOTIwMDAwMDAsOTgwMDAwMDA=">Other Services</option>
						</select>			
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 no-padd">
						<input type="text" id="deadline1" name="ideadline1" class="form-control" placeholder="Deadline From">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12 no-padd">
						<select class="live" data-style="form-control" data-width="100%" title="Live Tenders" data-size="2" data-dropup-auto="true" name="ilive">
						    
						    <option onclick=""></option>
						    <option value="Live">Live</option>
						    <option value="Archive-2018_tbl_tenders">Archive-2018</option>
							<option value="Archive-2017_tbl_tenders">Archive-2017</option>
							<option value="Archive-2016_tbl_tenders">Archive-2016</option>
							<option value="Archive-2015_tbl_tenders">Archive-2015</option>
						</select>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 no-padd">
						<select class="funding" data-style="form-control" id="financier"  data-width="100%" data-size="3" data-dropup-auto="false" data-autoname="financier" name="ifunding_agency">

						</select>		
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 no-padd">
						<input type="text" id="deadline2" name="ideadline2" class="form-control" placeholder="Deadline To">					
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12 no-padd">
						<select class="tender_type" data-style="form-control" data-width="100%" title="Tender Type" name="itender_type">
							<option onclick=""></option>
							<option value="icb">ICB</option>
							<option value="ncb">NCB</option>
						</select>	
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 no-padd">
						<select class="tender_value" data-style="form-control" data-width="100%" title="Tender Value" name="itender_value">
							<option onclick=""></option>
							<option value="1">High</option>
							<option value="2">Low</option>
						</select> 
						
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 no-padd">
						<input type="text" class="form-control" name="igtid" id="gtid" placeholder="GoodTenders ID"/>
					</div>
					<input type="hidden" name="index" />
					<button type="reset" class="btn btn-link" style="color:white;text-decoration:underline;float: right;" id="adreset" onclick="resetSelect()">Reset</button> 
				</div>
				</div>
				</div>
				</form>
				<!-- Advanced Search Section End -->
					<button class="adsearch" id="adbtn">
					<a style="color:white;" id="texttoggle">Show Advanced Search</a>
					<span class="fa fa-angle-down"></span>
					</button>

				</div>	
				</div>
			</div>
				</div>

				<!-- Company sliding carousel -->			
				<div class="company-brand" >
					<div class="container">
						<div id="company-brands" class="owl-carousel">
							<div class="brand-img">
								<img src="assets/img/microsoft-home.png" class="img-responsive" alt="" />
							</div>
							<div class="brand-img">
								<img src="assets/img/img-home.png" class="img-responsive" alt="" />
							</div>
							<div class="brand-img">
								<img src="assets/img/mothercare-home.png" class="img-responsive" alt="" />
							</div>
							<div class="brand-img">
								<img src="assets/img/paypal-home.png" class="img-responsive" alt="" />
							</div>
							<div class="brand-img">
								<img src="assets/img/serv-home.png" class="img-responsive" alt="" />
							</div>
							<div class="brand-img">
								<img src="assets/img/xerox-home.png" class="img-responsive" alt="" />
							</div>
							<div class="brand-img">
								<img src="assets/img/yahoo-home.png" class="img-responsive" alt="" />
							</div>
							<div class="brand-img">
								<img src="assets/img/mothercare-home.png" class="img-responsive" alt="" />
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
			<!-- Company Carousel Ended -->
			<div class="clearfix"></div>
			<!-- Main Banner Section End -->
			
			<!-- Tenders By Sector Started-->
			<section>
				<div class="container">
					
					<div class="row">
						<div class="main-heading">
							<p>categorized Tenders</p>
							<h2>Tenders By <span>Sector</span></h2>
						</div>
					</div>
					<div class="row extra-mrg">
						
						<div class="col-md-3 col-sm-6">
							<div class="grid-view brows-job-list" onclick="window.open('tenderbysector.php','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-building"></span>
								</div>
								<div class="brows-job-position" style="padding: 0px;">
									<h3><a href="index.php">Infrastructure & Construction</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">5500+ Tenders</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6">
							<div class="grid-view brows-job-list" onclick="window.open('tenderbysector.php','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-flash"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="index.php">Energy & Power</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">3450+ Tenders</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6">
							<div class="grid-view brows-job-list" onclick="window.open('tenderbysector.php','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-envira"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="index.php">Environment</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">3100+ Tenders</span>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6">
							<div class="grid-view brows-job-list" onclick="window.open('tenderbysector.php','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-fire"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="index.php">Oil & Gas</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">4990+ Tenders</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6">
							<div class="grid-view brows-job-list" onclick="window.open('tenderbysector.php','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-plus-square"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="index.php">Healthcare & Medical</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">3800+ Tenders</span>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6">
							<div class="grid-view brows-job-list" onclick="window.open('tenderbysector.php','_blank')">
								<div class="brows-job-company-img">
									<i class="fa fa-lock"></i>
								</div>
								<div class="brows-job-position">
									<h3><a href="index.php">Defense & Security</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">2700+ Tenders</span>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6">
							<div class="grid-view brows-job-list" onclick="window.open('tenderbysector.php','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-plane"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="index.php">Aviation</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">4500+ Tenders</span>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6">
							<div class="grid-view brows-job-list" onclick="window.open('tenderbysector.php','_blank')">
								<div class="brows-job-company-img">
									<span class="fa fa-laptop"></span>
								</div>
								<div class="brows-job-position">
									<h3><a href="index.php">Information Technology</a></h3>
								</div>
								<div class="job-position">
									<span class="job-num">2000+ Tenders</span>
								</div>
							</div>
							<a href="tenderbysector.php" title="More Sectors" class="btn btn-more">More <i class="fa fa-bars"></i></a>
						</div>
						
					</div>
					<!-- Tenders By Sector Ended-->
						
				</div>
			</section>
			<div class="clearfix"></div>
			
			<!-- Tenders Marquee started-->
			
			<div class="container-fluid">
			<div class="row">
				<div class="main-heading">
					<p>Tenders</p>
					<h2>Live<span>Tenders</span></h2>
				</div>
			</div>
			<div class="panel panel-marquee">
			<div class='card-body'>
            <div class='row no-mrg' style='margin-top:5px;'>
    		<div class='col-md-6 col-sm-6'>
    		<strong>DESCRIPTION</strong>
    		</div>
    		<div class='col-md-3 col-sm-3'>
    		<strong>COUNTRY</strong>
    		</div>	
    		<div class='col-md-3 col-sm-3'>
    		<strong>Deadline</strong>
    		</div>
    		</div><hr>
    		<marquee behavior="scroll" id="marqueeTender" direction="up" height="400px" onmouseover="this.stop();" 
    		onmouseout="this.start();">
        <?php

  			$sql = "SELECT B.*, A.Country FROM tbl_tenders AS B INNER JOIN tbl_country as A ON (B.org_country=A.code) ORDER BY RAND() LIMIT 25";
  			$result = mysqli_query($conn,$sql);
  			$row = mysqli_num_rows($result);
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
	
			echo "
			<article class='advance-search-job marquee_data'>";
			if(isset($_SESSION["id"])):
			echo"<div class='row no-mrg' onclick='onRedirect(".$row['gt_id'].")'>";
			else:
			echo"<div class='row no-mrg' onclick='errorModal()'>";
			endif;	
			echo"<div class='col-md-6 col-sm-6'>
    		<div class='advance-search-caption' style='margin-left:-10px;'>
    			<h4>".$row['short_description']."</h4>
				<h5>".$row['tender_notice_no']."</h5>
			</div>
			</div>
			<div class='col-md-3 col-sm-3'>
			<div class='advance-search-job-locat'>
			<h5><img src='assets/flags/blank.gif' class='flag flag-".strtolower($row['org_country'])."'/> ".$row['Country']."</h5>
			</div>
			</div>
			<div class='col-md-3 col-sm-3'>
			<div class='advance-search-job-locat'>
				<h5><i class='fa fa-calendar'></i>".date_format (new DateTime($row['deadline']), 'd-m-Y')."</h5>
			</div>
			</div>
			<span class='".$tag_color."'>".$tags."</span>
			</div>
			</article>";
			}

		?>	
		</marquee>
		</div>
		</div>
		</div>

			<!-- Tenders Marquee Ended-->	

			<div class="clearfix"></div>

			<!-- work-details section Start -->
			<section class="work-details">
				<div class="container text-center">
					<div class="row">
						<div class="main-heading">
							<p style="color:#fff;">Company Info</p>
							<h2>Our Work <span>Details</span></h2>
						</div><br>
						<div class="row">
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 rowork">
						<div class="circleBase circleMain">	
							<div class="main-heading">	
							<span class="fa fa-database fa-5x"></span>
							<h3><span>27 Million+</span></h3>
							</div>
						</div><br>
						<h4>Tenders Database</h4>		
						</div>	
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 rowork">
						<div class="circleBase circleMain">	
							<div class="main-heading">
							<span class="fa fa-globe fa-5x"></span>	
							</div>
							<h3><span>700,000</span></h3>
							</div><br>
						<h4>Live Tenders</h4>	
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 rowork">
						<div class="circleBase circleMain">	
							<div class="main-heading pcont">	
							<span class="fa fa-industry fa-5x"></span>
							</div>	
							<h3><span>300+</span></h3>
							</div><br>
						<h4>Industries</h4>	
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 rowork">
						<div class="circleBase circleMain">	
							<div class="main-heading">	
							<span class="fa fa-search fa-5x"></span>
							</div>	
							<h3><span>D.R.I.L</span></h3>
							</div><br>
						<h4>Data Refinement via Intensive Logic System</h4>	
						</div>
					</div>
				</div>
					</div>	
					<!--/row-->
				</div>	
			</section>
			<div class="clearfix"></div>
			

			<!-- Work Process Counter Section Start -->
			<section class="wp-process">
				<div class="container">
					<div class="row">
						<div class="main-heading">
							<p>How We Work</p>
							<h2>Our Work <span>Process</span></h2>
						</div>
					</div>
					<!--/row-->
					
					<div class="col-md-4 col-sm-6">
						<div class="work-process">
							<div class="work-process-icon">
								<span class="icon-layers"></span>
							</div>
							<div class="work-process-caption">
								<h4>Data Accumulation</h4>
								<p>Global Tenders, Projects, News & Contract Awards from 200+ Countries.</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-6">
						<div class="work-process">
							<div class="work-process-icon">
								<span class="icon-cloud"></span>
							</div>
							<div class="work-process-caption">
								<h4>Data Seggregation</h4>
								<p>Classification of data through various parameters such as Region, Industries, Financier etc.</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-6">
						<div class="work-process">
							<div class="work-process-icon">
								<span class="icon-search"></span>
							</div>
							<div class="work-process-caption">
								<h4>D.R.I.L</h4>
								<p>Using "Data Refinement Intensive Logic" system to extract the most reliable information.</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-6">
						<div class="work-process">
							<div class="work-process-icon">
								<span class="icon-mobile"></span>
							</div>
							<div class="work-process-caption">
								<h4>You Connect</h4>
								<p>Fill in the 
									<a href="signform.php" target="_blank" title="Do Registration">Registration</a> form, 
									<a href="javascript:void(Tawk_API.toggle())" title="Chat With US">chat</a> with us or 
									<a href="mailto:info@goodtenders.com" title="Mail US">mail</a> us.</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-6">
						<div class="work-process">
							<div class="work-process-icon">
								<span class="icon-profile-male"></span>
							</div>
							<div class="work-process-caption">
								<h4>We Assist</h4>
								<p>We guide you to our services so that you can get the best out of it.</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-4 col-sm-6">
						<div class="work-process">
							<div class="work-process-icon">
								<span class="icon-happy"></span>
							</div>
							<div class="work-process-caption">
								<h4>Both Happy</h4>
								<p>Do not forget to write us a Testimonial</p>
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- Work Process Counter Section End -->
			
			<div class="clearfix"></div>
			
			<!-- pricing Section Start -->
			<section class="pricing" id="pricing">
				<div class="container">
					<div class="row">
						<div class="main-heading">
							<h2>Our <span>Subscription Plans</span></h2>
						</div>
					</div>
					<div class="col-md-3 col-sm-3">
						<div class="pr-table">
							<div class="pr-header">
								<div class="pr-plan">
									<h4>Plan "S"</h4>
								</div>
							
							</div>
							<div class="pr-buy-button">
								<a href="membership.php?price=S" class="pr-btn" title="Price Button"
								style="margin-bottom: -15%;">Get Started</a>
							</div>
							<div class="pr-features">
								<ul>
									<li>Unlimited access</li>
									<li>1 User License</li>
									<li>Tenders information</li>
									<li>Dashboard</li>
									<li>Data Export</li>
									<li>Supporting Documents</li>
								</ul>
							</div>
							<div class="pr-buy-button">
								<a href="membership.php?price=S" class="pr-btn" title="Price Button">Get Started</a>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-3">
						<div class="pr-table">
							<div class="pr-header">
								<div class="pr-plan">
									<h4>Plan "M"</h4>
								</div>
							</div>
							<div class="pr-buy-button">
								<a href="membership.php?price=M" class="pr-btn" title="Price Button"
								style="margin-bottom: -15%;">Get Started</a>
							</div>
							<div class="pr-features">
								<ul>
									<li>Unlimited access</li>
									<li>1 User License</li>
									<li>Tenders information</li>
									<li>Dashboard</li>
									<li>Data Export</li>
									<li>Tender Analytics</li>
									<li>Supporting Documents</li>
									<li>Customer Care</li>
									<li>Daily Alerts on 1 email id</li>
								</ul>
							</div>
							<div class="pr-buy-button">
								<a href="membership.php?price=M" class="pr-btn" title="Price Button">Get Started</a>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-3">
						<div class="pr-table">
							<div class="pr-header active">
								<div class="pr-plan">
									<h4>Plan "L"</h4>
								</div>
							</div>
							<div class="pr-buy-button">
								<a href="membership.php?price=L" class="pr-btn active" title="Price Button"
								style="margin-bottom: -15%;">Get Started</a>
							</div>
							<div class="pr-features">
								<ul>
									<li>Unlimited access</li>
									<li>2 User License</li>
									<li>Tenders information</li>
									<li>Dashboard</li>
									<li>Data Export</li>
									<li>Tender Analytics</li>
									<li>Supporting Documents</li>
									<li>Customer Care</li>
									<li>Daily Alerts on 2 email id</li>
									<li>Projects information</li>
									<li>Procurement News</li>
									<li>Contract Awards</li>
									<li>Archive Tenders</li>
									<li>Key Account Manager</li>
								</ul>
							</div>
							<div class="pr-buy-button">
								<a href="membership.php?price=L" class="pr-btn active" title="Price Button">Get Started</a>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-3">
						<div class="pr-table">
							<div class="pr-header">
								<div class="pr-plan">
									<h4>Plan "XL"</h4>
								</div>
							</div>
							<div class="pr-buy-button">
								<a href="membership.php?price=XL" class="pr-btn" title="Price Button"
								style="margin-bottom: -15%;">Get Started</a>
							</div>
							<div class="pr-features">
								<ul>
									<li>Unlimited access</li>
									<li>3 User License</li>
									<li>Tenders information</li>
									<li>Dashboard</li>
									<li>Data Export</li>
									<li>Tender Analytics</li>
									<li>Supporting Documents</li>
									<li>Customer Care</li>
									<li>Daily Alerts on 3 email id</li>
									<li>Projects information</li>
									<li>Procurement News</li>
									<li>Contract Awards</li>
									<li>Archive Tenders</li>
									<li>Key Account Manager</li>
									<li>Bidding Services</li>
								</ul>
							</div>
							<div class="pr-buy-button">
								<a href="membership.php?price=XL" class="pr-btn" title="Price Button">Get Started</a>
							</div>
						</div>
					</div>
					</div>
					
				</div>
			</section>
			<!-- End Pricing Section -->
			
			<div class="clearfix"></div>
			<!-- Download app Section End -->
			
			
			<!-- Footer Section Start -->
			<footer class="footer" id="footer">
				<div class="row lg-menu">
					<div class="container">
						<div class="col-md-4 col-sm-4">
						<!-- <strong>GoodTenders</strong> -->
						<img src="assets/img/GoodTenders_logo.png" class="img-responsive" alt="GoodTenders" id="img_logo"> 
						</div>
						<div class="col-md-8 co-sm-8 pull-right">
							<ul class="main_footer_content">
								<li><a href="index.php" title="Home Page">Home</a></li>
								<li><a href="pricing.php" title="Pricing">Pricing</a></li>
								<li><a href="faq.php" title="FAQ">FAQ</a></li>
								<li><a href="aboutus.php" title="About us">About us</a></li>
								<li><a href="contact.php" title="Contact Us">Contact Us</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row no-padding">
					<div class="container">
						<div class="col-md-3 col-sm-12">
							<div class="footer-widget">
							<h3 class="widgettitle widget-title">About GoodTenders</h3>
							<div class="textwidget">
							<p style="text-transform: unset;"><strong>Email:</strong> info@goodtenders.com</p>
							<p><strong>Call:</strong> +91 2226 820 344</p>
							<p><strong>Whats-app:</strong> +91 9867 848 333</p>
							<ul class="footer-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
							</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-3">
							<div class="footer-widget">
							<h3 class="widgettitle widget-title">Policy Statement</h3>
							<div class="textwidget">
								<div class="textwidget">
								<ul class="footer-navigation">
									<li><a href="policy.php" title="Privacy Policy">Privacy Policy</a></li>
									<li><a href="terms_conditions.php" title="Terms of Use">Terms of Use</a></li>
									<li><a href="getBackSoon.php" title="Site Map">Site Map</a></li>
								</ul>
							</div>
							</div>
							</div>
						</div>

						<div class="col-md-3 col-sm-3">
							<div class="footer-widget">
							<h3 class="widgettitle widget-title">Navigation</h3>
							<div class="textwidget">
								<ul class="footer-navigation">
									<li><a href="tenderbycountry.php">Tenders by Country</a></li>
									<li><a href="tenderbyregion.php">Tenders by Region</a></li>
									<li><a href="politicalregion.php">Tenders by Political Region</a></li>
									<li><a href="tenderbysector.php">Tenders by Sector</a></li>
									<li><a href="funding_agency.php">Tenders by Funding Agency</a></li>
								</ul>
							</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-3">
							<div class="footer-widget">
								<h3 class="widgettitle widget-title">Connect with us</h3>
								<div class="textwidget">
								<form class="footer-form" name="form1" action="connectusmail.php" method="POST">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padd">
									<input type="text" class="form-control" name="name" placeholder="Your Name" required>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padd">
									<input type="email" name="mail_id" class="form-control" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padd">
									<textarea class="form-control" name="q" 
									placeholder="I am interested in tenders for ..." required></textarea>
									</div>
									<div class="form-group">
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-6 no-padd">	
									<img src='captcha.php'>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-6 no-padd">
                  					<input type="text" class="form-control" name="code" id="code" placeholder="Enter Captcha" required>
                  					</div>
                  					</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padd">
									<button type="submit" value="send" name="send" class="btn btn-primary">Connect</button>
                  					</div>
								</form>
								</div>
							</div>
						</div>
							
					</div>
				</div>
				<div class="row copyright">
					<div class="container">
						<p>Copyright GoodTenders © 2018. All Rights Reserved </p>
					</div>
				</div>
			</footer>
			<div class="clearfix"></div>
			<!-- Footer Section End -->
			<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

			<!-- Login Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
				<div class="modal-dialog modal-login">
					<div class="modal-content">
						<div class="modal-header text-center" style="margin-bottom:4vh;background-color: #35434e;">
                		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                		<h2 class="modal-title" style="color:#07b107;"><strong>Log in</strong></h2>
            		</div>
						<div class="modal-body">
							<div class="subscribe wow fadeInUp">
							<form class="form-inline" action="login.php" method="post">
							<div class="col-sm-offset-1 col-sm-10 col-xs-12">
							<div class="form-group"  style="margin-top: 5%;">
							<input type="email"  name="email" class="form-control" placeholder="Email ID" required value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
							<input type="password" name="password" class="form-control"  placeholder="Password" required value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>">
							<div class="checkbox">
                                <label>
                                <input type="checkbox" id="remember" name="remember"><strong> Remember me</strong>
                                </label>
                            </div>
							<div class="center"><br>
							<button type="submit" id="login-btn" class="btn btn-primary"> 
								<i class="fa fa-sign-in"></i> Login </button>
							</div>
							</div>
							<div class="col-sm-offset-4 col-sm-4"><br>
                            <a href="forgot_password.php" class="btn btn-link btm_btn">
                                Forgot Password</a>
                                
                            </div>
							</div>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>


				<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-dialog modal-register">
						<div class="modal-content">
							<div class="modal-header text-center" style="margin-bottom:4vh;background-color: #35434e;">
                				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                				<h2 class="modal-title" style="color:#07b107;"><strong>Sign up</strong>
                					<small><img src="assets/img/whatsapp.png" /> +91 9867848333</small>
                				</h2>
                			</div>	
							<div class="modal-body">
							<form class="form-horizontal" action="signup.php" method="post" name="form_log" style="margin-top:-30px;margin-bottom: -30px;">
							<div class="col-sm-12 col-lg-12 col-xs-12">
							<div class="form-group">
							<label class="col-lg-3 col-sm-3 col-xs-12">Name :<span>*</span></label>	
							<div class="col-lg-9 col-sm-9 col-xs-12 signup-padd">
							<input type="text" name="name" class="form-control" placeholder="Your Name" required style="height:6vh;">
							</div>
							</div>
							<div class="form-group">
							<label class="col-lg-3 col-sm-3 col-xs-12">Email ID :<span>*</span></label>	
							<div class="col-lg-9 col-sm-9 col-xs-12 signup-padd">	
							<input type="email" name="email" class="form-control" placeholder="Company Email Id" required style="height:6vh;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
							</div>
							</div>
							<div class="form-group">
							<label class="col-lg-3 col-sm-3 col-xs-12">Organization :</label>	
							<div class="col-lg-9 col-sm-9 col-xs-12 signup-padd">	
							<input type="text" name="orgname" class="form-control" placeholder="Organization Name" style="height:6vh;">
							</div>
							</div>
							<div class="form-group">
							<label class="col-lg-3 col-sm-3 col-xs-12">Country :<span>*</span></label>	
							<div class="col-lg-9 col-sm-9 col-xs-12 signup-padd">	
							<select name="country" class="form-control" style="height:6vh;">
							<?php													   	
								$sql = mysqli_query($conn, "SELECT DISTINCT Country From tbl_country");
								$numRows = mysqli_num_rows($sql);
								if($numRows>0){
								while ($row = mysqli_fetch_array($sql)){
									echo "<option value='".$row['Country'] ."'>
										".$row['Country']."</option>" ;
									}
								}
							
							?>
							</select>
							</div>
							</div>
							<div class="form-group">
							<label class="col-lg-3 col-sm-3 col-xs-12">Contact No:<span>*</span></label>	
							<div class="col-lg-9 col-sm-9 col-xs-12 signup-padd">
							<input type="text" name="contact" class="form-control" required 
							style="height:6vh;" minlength=4>
							</div>
							</div>
							<div class="form-group">
							<label class="col-lg-3 col-sm-3 col-xs-12">Categories :<span>*</span></label>	
							<div class="col-lg-9 col-sm-9 col-xs-12 signup-padd">	
							<input type="text" name="category" class="form-control" 
							placeholder="What product/service tenders you are looking at" 
							required style="height:6vh;">
							</div>
							</div>	
							<div class="form-group">
							<div class="col-md-6 col-lg-6 col-xs-12">	
							<img src='captcha.php' class="img-responsive captcha_img">
							</div>
							<div class="col-md-6 col-lg-6 col-xs-12">
                  			<input type="text" class="form-control" name="code_captcha_signup" id="code_captcha" placeholder="Enter Captcha" required>
                  			</div>
                  			</div>					
							<div class="center">
							<button type="submit" id="subscribe" class="btn btn-primary btn-block"
							> Create Free Account </button>
							</div>
							</div>
							</form>
							</div>
							
							</div>
							</div>
						</div>
			<!-- End Sign Up Window -->
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
								<button type="button" class="btn btn-info" data-dismiss="modal" id="connect_modal">Connect us</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#register" data-dismiss="modal">Register</button>
							</div>
						</div>
					</div>
				</div>

			<!-- START JAVASCRIPT -->
			<!-- Placed at the end of the document so the pages load faster -->
			<script type="text/javascript" src="assets/js/jquery.min.js"></script>
			<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
			<script src="assets/js/bootsnav.js"></script>
			<script src="assets/js/viewportchecker.js"></script>
			<script src="assets/plugins/bootstrap/js/bootstrap-select.min.js"></script>
			
			<!-- wysihtml5 editor js -->
			<script src="assets/plugins/bootstrap/js/wysihtml5-0.3.0.js"></script>
			<script src="assets/plugins/bootstrap/js/bootstrap-wysihtml5.js"></script>
			
			<!-- Owl carousel Js -->
			<script type="text/javascript" src="assets/plugins/owl-carousel/js/owl.carousel.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
			<script src="assets/js/jquery_marquee.js"></script>
			<script src="assets/js/select2.js"></script>
			<script src="assets/js/bootstrap-formhelpers-countries.js"></script>
			<script src="assets/js/bootstrap-formhelpers.min.js"></script>
			<script src="assets/js/bootstrap-formhelpers-phone.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
			<!-- Custom Js -->
			<script src="assets/js/custom.js"></script>
			<!--Start of Tawk.to Script-->
			<script type="text/javascript">
			var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
			(function(){
				var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
				s1.async=true;
				s1.src='https://embed.tawk.to/5b5830e8df040c3e9e0bf049/default';
				s1.charset='UTF-8';
				s1.setAttribute('crossorigin','*');
				s0.parentNode.insertBefore(s1,s0);
				})();

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
				allowClear: true,
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
				placeholder: "Select a Sector",
				allowClear: true,
			});

			$('.tender_type').select2({
				placeholder: "Tender Type",
				allowClear: true,
			});

			$('.tender_value').select2({
				placeholder: "Tender Value",
				allowClear: true,
			});

			$('.live').select2({
				placeholder: "Live Tenders",
				allowClear: true,
			});

			$(window).load(function() {
			    $(".loader").fadeOut("slow");
			});
			function errorModal(){
				$('#errorModal').modal('toggle');
				$('#errorModal').modal('show');
			}

			$("#connect_modal").click(function() {
    			$('html,body').animate({
        		scrollTop: $(".footer-widget").offset().top},
        		'slow');
			});

			/* Start of Counter Number Loading */
			$('.counter-count').each(function() {
        		var $this = $(this);
        		jQuery({Counter: 0}).animate({Counter: $this.text()}, {
            		duration: 5000,
            		easing: 'swing',
            		step: function() {
                		var num = Math.ceil(this.Counter).toString();
                			if(Number(num) > 999){
                    			while (/(\d+)(\d{3})/.test(num)) {
                        			num = num.replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
                    			}
                			}
                		$this.text(num);
            		}
        		});
        	});
			/* End of Counter Number Loading */

			function onRedirect(id){
				var noRedirect = '.btn';
  				if (!event.target.matches(noRedirect)) {
    				window.open("tenderdetails.php?tnd="+id,"_blank");
  				}
  			}

  			function resetSelect(){

  				$(".keywords").val('').trigger('change');
  				$(".locations").val('').trigger('change');
  				$(".cpv").val('').trigger('change');
  				$(".sector").val('').trigger('change');
  				$(".funding").val('').trigger('change');
  				$('.selectpicker').val('').trigger('change');
  				
  				var dates = $('#deadline1','#deadline2');

  				dates.attr('value','');
  				dates.each(function(){
  					$.datepicker._clearDate(this);
  				})
  				//dates.datepicker('setDate',null);
  				
  			}
  		</script>
			<!--End of Tawk.to Script-->
	</body>
</html>