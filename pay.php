<!-- PayPal Payment Page -->

<?php
	session_start();
	include('header.php');
	include('dbconnect.php');	
?>
<title>Pay | GoodTenders | Best Tenders Portal</title>
<style type="text/css">
	.panel{
		border: 1px solid #07b107;
	}
	.panel .panel-heading{
		background-color: #07b107 !important;
		color: #ffffff;
		border: 1px solid #07b107;
	}

	.pay{
		margin-top: 3%;
	}
	.payp{
		text-align: justify;
		padding: 5px;
		color: #000000 !important;
		font-size: 1em !important;
		line-height: 150% !important;
	}
	#publish label{
		float: left;
		margin-left: 4%;
	}
	#publish .star{
		float: left;
		color: red;
		padding-top: 3%;
		padding-left: 1%;
		font-size: 2.0em;
		font-weight: bold;
	}
	
	hr{
		border-color: #07b107;
		margin-top: -1%;
	}
	#publish img{
		width:100%;
	}
	.paypal_entire{
		border:1px solid #07b107;
	}
	#publish .form-group{
		margin:-5px;
	}
	.captcha_img{
        height: 50px;
        width: 350px;
    }
	
</style>
<body>

	<section class="pay">
	<div class="container text-center">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
			<div class="row">
				<div class="main-heading">
					<p>Payment Section</p>
					<h2>Pay By <span>PayPal</span></h2>
				</div>
			</div>

			<!-- PayPal Information page -->
			<div class="row">
				<div class="col-lg-6 col-md-6 com-sm-12 col-xs-12">
				<div class="panel panels">
				<div class="panel-heading"><h3> <i class="fa fa-paypal"></i> PayPal</h3></div>
				<div class="panel-body">
					<h5 class="payp">PayPal is an electronic payment processor that allows customers to send money securely without divulging your bank information to the merchant. You can use this service even if you do not want to sign up for an account of your own. Making payments with PayPal is free of charge for the buyer. The business (GoodTenders) receiving the money is responsible for paying any PayPal transaction fees.</h5>
					<br><hr>
					<h4><b>3 Easy Steps</b></h4> 		
					<h5 class="payp">
					<b>Step 1.</b>
					Click on the PayPal link on our website. Fill the form with basic details like Name, Email ID, Company name and Amount to pay before you can move on to the PayPal payment screen. The page opens asking for subscription details and amount. Please mention the  details as per the package chosen</h5>
					<h5 class="payp">
					<b>Step 2.</b>
					If you have a PayPal account you can pay using your PayPal login details.
					OR
					Look for a section on the payment screen that reads Pay with Debit/Credit Card
					Select this link to open the credit/debit card input screen.</h5>
					<h5 class="payp">
					<b>Step 3.</b>
					You will be redirected to PayPal Guest Checkout. Enter your personal information, billing address and credit or debit card information into the appropriate lines on the input screen. Click on Pay Now button to finalize your payment.</h5>
					<h5 class="payp">
					As soon as the payment is processed you will be routed to our site. A intimation mail will be received to both the parties. As soon as the payment is reflected from PayPal to our bank account, we will activate your Membership and send the activation details with login credentials.</h5>
					</div>
				</div>
				</div>

				<!-- Paypal Submission Form -->
				<div class="col-lg-6 col-md-6 com-sm-12 col-xs-12 paypal_entire">
					<form class="form-horizontal" action="pay_save.php" method="post" target="_top" id="publish" name="publish" >
							<div class="form-group">
							<label>Name: </label><span class="star">*</span>	
							<div class="signup-padd">
							<input type="text" name="name" class="form-control" placeholder="Your Name" required style="height:5vh;">
							</div>
							</div>
							<div class="form-group">
							<label>Email ID :</label><span class="star">*</span>	
							<div class="signup-padd">	
							<input type="email" name="email" class="form-control" placeholder="Company Email Id" required style="height:5vh;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
							</div>
							</div>
							<div class="form-group">
							<label>Company :</label><span class="star">*</span>	
							<div class="signup-padd">	
							<input type="text" name="company" class="form-control" placeholder="Company Name" required style="height:5vh;">
							</div>
							</div>
							<div class="form-group">
							<label>Subscription Amount :</label><span class="star">*</span>	
							<div class="signup-padd">	
							<input type="text" name="amount" class="form-control" placeholder="Amount" required style="height:5vh;">
							</div>
							</div>
							<div class="form-group"><br>
							<div class="signup-padd">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">	
							<img src='captcha.php' class="img-responsive" style="height:6vh;"> 
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                  			<input type="text" class="form-control" name="code_pay" id="code_pay" placeholder="Enter Captcha" required style="height:6vh;">
                  		 	</div>
                  			</div></div><br>
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="WWRJNNRL6SM6E">
							<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<img src="assets/img/paypal.png" alt="paypal">
							</div>
							</form>	
							
							
						</div>
					

							
				</div>
			</div>


		</div>
	
	</section>


</body>

<?php
	include('footer.php');
?>	