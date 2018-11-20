
<!DOCTYPE html>
<html class="no-js" lang="zxx">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Best Tenders Portal">
	<meta name="keywords" content="tenders, indian tenders, latest tenders, online tenders">
	<meta name="robots" content="index,follow">

	<link rel="icon" href="assets/img/favicon_gt.ico" type="image/x-icon"/>
    <!--<title>GoodTenders</title>-->

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
	
    <!-- Icons -->
    <link href="assets/plugins/font-awesome/font-awesome.css" rel="stylesheet">
	<link href="assets/plugins/line-font/line-font.css" rel="stylesheet">
    
    <!-- Animate -->
    <link href="assets/plugins/animate/animate.css" rel="stylesheet">
    <link href="assets/flags/flags.css" rel="stylesheet">
    <link href="assets/css/select2.css" rel="stylesheet"/>
    
    <!-- Bootsnav -->
    <link href="assets/css/bootsnav.css" rel="stylesheet">
    
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
	.bgdiv{
		padding: 20px;
		display: table;
		width: 100%;
		background: rgba(255,255,255,0.2);
		border-radius: 4px;
	}
	input::-webkit-calendar-picker-indicator 
	{
  		display: none;
	}
	.form-group .form-control::-webkit-input-placeholder{
		font-size: 0.9em;
	}
	.form-group .form-control {
    	font-weight: bold;
	}
	.form-group label{
		margin-top: 2%;
	}
	.form-group label span{
		float: right;
		margin-right: -20px;
		color: red;
		margin-top: 8%;
		font-size: 2.1em;
	}
	#subscribe{
		margin-bottom: -10px !important;
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
	/* Footer Content */
	.main_footer_content li a:hover{
		color: #ffffff !important;
	}
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
	.btm_btn{
		font-weight: bold;
	}

	.btm_btn:hover{
		color:#07b107;

	}
	.signup-padd{
		padding-left: 20px;
		padding-right: 15px;
	}
	.modal-open {
    overflow: visible;
	}
	.modal-open, .modal-open .navbar-fixed-top, .modal-open .navbar-fixed-bottom {
    padding-right:0px!important;
	}
	.footer-form .form-control{
		background-color: #ffffff;
		font-style: oblique;
	}
	.signupmodal{
		width:50vw;
	}

	/* Responsive Content on Mobiles */
	@media screen and (max-width: 780px) { 
    	select{
    		width:50%;
    		font-size: 0.5em;
    	}
    	.modal-dialog{
    		max-width: 600px;
        	width: auto;    	
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
	}

	@media screen and (min-width: 1000px) { 
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
	.captcha_img{
        height: 50px;
        width: 350px;
    }
	#img_logo{
		max-height: 40px;
	}
	</style>
	<body>
		<!-- Loader Html starts -->

			<div class="loader"></div>

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
						<!--<li class="active"><input type="text" class="form-control" id="find" placeholder="Find Tenders"></li>-->
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
							<li><a href="pricing.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Pricing</a></li>
							<li><a href="pay.php">Pay</a></li>
							<?php if(isset($_SESSION["id"])): ?>
							<li class="left-br"><a>Welcome <?php echo $_SESSION["name"];?> 
							<i class="fa fa-user"></i></a></li>
							<li><a href="logout.php" class="signin">Logout</a></li>
							<?php else: ?>
							<li class="left-br"><a href="javascript:void(0)"  data-toggle="modal" data-target="#login" class="signin">Log In</a></li>
							<li><a href="javascript:void(0)"  data-toggle="modal" data-target="#register" class="signin">Register</a></li>
							<?php endif; ?>
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav><!-- End Navigation -->

			<div class="clearfix"></div>




