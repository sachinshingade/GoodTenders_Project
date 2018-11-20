<!-- Pricing Page -->

<?php

		session_start();
		include('header.php');
		require 'dbconnect.php';
	?>
	<title>Pricing | Get Tenders Pricing | GoodTenders | Best Tenders Portal </title>

	<style type="text/css">
		#pricing{
			margin-top: 2%;
		}
		.price_title{
			margin-top: 2%;
			margin-bottom: 5%;
		}
		.marquee_data{
			margin: 2%;
			padding: 5px;
			border:1px ridge #07b107 !important;
		}
		.marquee_data:hover{
			transform: scale(1.02);
			transition: all .5s ease-out;
			box-shadow: 3px 3px 3px #aaaaaa;
			cursor:pointer;
		}
	</style>	 

			<!-- Title Header Start 
			<section class="inner-header-title" style="color:black;background-image:url(http://via.placeholder.com/1920x850);">
				<div class="container">
					<h1>Our Package</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			-->
			<!-- Pricing Section Started -->
			<section class="pricing" id="pricing">
				<div class="container">
				<div class="main-heading price_title">
					<p>Pricing Plan</p>
					<h2><span>Our Subscription Plans</span></h2>
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
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
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
								<a href="membership.php?price=L" class="pr-btn active" title="Price btn">Get Started</a>
							</div>
						</div>
					</form>
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
								<a href="membership.php?price=XL" class="pr-btn" title="Price btn">Get Started</a>
							</div>
						</div>
					</div>
					</div>
					
				</div>
			</section>

			
			<?php
				include('footer.php');
			?>
			<!-- Sign Up Window Code -->
			<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							<div class="tab" role="tabpanel">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">Sign In</a></li>
								<li role="presentation"><a href="#register" role="tab" data-toggle="tab">Sign Up</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content" id="myModalLabel2">
								<div role="tabpanel" class="tab-pane fade in active" id="login">
									<img src="assets/img/logo.png" class="img-responsive" alt="" />
									<div class="subscribe wow fadeInUp">
										<form class="form-inline" method="post">
											<div class="col-sm-12">
												<div class="form-group">
													<input type="email"  name="email" class="form-control" placeholder="Username" required="">
													<input type="password" name="password" class="form-control"  placeholder="Password" required="">
													<div class="center">
													<button type="submit" id="login-btn" class="submit-btn"> Login </button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>

								<div role="tabpanel" class="tab-pane fade" id="register">
								<img src="assets/img/logo.png" class="img-responsive" alt="" />
									<form class="form-inline" method="post">
											<div class="col-sm-12">
												<div class="form-group">
													<input type="text"  name="email" class="form-control" placeholder="Your Name" required="">
													<input type="email"  name="email" class="form-control" placeholder="Your Email" required="">
													<input type="email"  name="email" class="form-control" placeholder="Username" required="">
													<input type="password" name="password" class="form-control"  placeholder="Password" required="">
													<div class="center">
													<button type="submit" id="subscribe" class="submit-btn"> Create Account </button>
													</div>
												</div>
											</div>
										</form>
								</div>
							</div>
							</div>
						</div>
						</div>
				</div>
			</div>   
			<!-- End Sign Up Window -->
			
	</body>
</html>