<?php
	include('header.php');
	require 'dbconnect.php';

	$plan = $_GET['price']
?>
<style type="text/css">
	.form-group label{
		vertical-align: middle;
		margin-top: 10px;
		padding-left: 8%;
	}
	.form-group label span{
		margin-top: 2% !important;
	}
	h3{
		font-size: 1.5em;
		padding-left: 5%;
		font-weight: bold;
	}
	#membership_form{
		border: 1px solid #07b107;
	}
	#dpd{
		background-color: #07b107;
		color: #ffffff;
		font-weight: bold;
	}
	option{
		background-color: #34434e;
		color: #ffffff;
	}

</style>

<body>

	
	<div class="clearfix"></div>

	<section>
		<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12">	
		<div class="row">
			<div class="main-heading">
				<h2><span> Membership Options </span></h2>
			</div>
		</div>
		</div>
		<form class="form-horizontal" action="membership_insert.php" method="POST" name="membership_form" id="membership_form">
		<label class="col-lg-offset-3 col-lg-2" style="margin-top: 10px;font-size: 1.2em;">Your Selected Plan:</label>
		<div class="col-lg-4">
		<select class="form-control" id="dpd" name="plan">
			<option value="S"<?php if($plan == "S") echo "SELECTED";?>>PLAN "S"</option>
			<option value="M"<?php if($plan == "M") echo "SELECTED";?>>PLAN "M"</option>
			<option value="L"<?php if($plan == "L") echo "SELECTED";?>>PLAN "L"</option>
			<option value="XL"<?php if($plan == "XL") echo "SELECTED";?>>PLAN "XL"</option>
		</select>
	</div>
			
							<div class="col-lg-12 col-sm-12">
							<h3>About You</h3>	
							<div class="form-group">
							<label class="col-sm-offset-1 col-sm-3">Name :<span>*</span></label>	
							<div class="col-sm-6 signup-padd">
							<input type="text" name="name" class="form-control" placeholder="Please enter your name" required style="height:6vh;">
							</div>
							</div>
							<div class="form-group">
							<label class="col-sm-offset-1 col-sm-3">Email ID :<span>*</span></label>	
							<div class="col-sm-6 signup-padd">	
							<input type="email" name="emailid" class="form-control" placeholder="Please enter your business email id" required style="height:6vh;" 
							pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
							</div>
							</div>
							<h3>About Your Organization</h3>
							<div class="form-group">
							<label class="col-sm-offset-1 col-sm-3">Organization Name:<span>*</span></label>	
							<div class="col-sm-6 signup-padd">	
							<input type="text" name="orgname" class="form-control" placeholder="Name of your organization" style="height:6vh;" required>
							</div>
							</div>
							<div class="form-group">
							<label class="col-sm-offset-1 col-sm-3">Organization Address:<span>*</span></label>	
							<div class="col-sm-6 signup-padd">	
							<input type="text" name="orgaddr" class="form-control" placeholder="Please provide your address details" style="height:6vh;" required>
							</div>
							</div>
							<div class="form-group">
							<label class="col-sm-offset-1 col-sm-3">City :<span>*</span></label>	
							<div class="col-sm-6 signup-padd">	
							<input type="text" name="city" class="form-control" placeholder="Please enter your city" style="height:6vh;" required>
							</div>
							</div>
							<div class="form-group">
							<label class="col-sm-offset-1 col-sm-3">Country :<span>*</span></label>	
							<div class="col-sm-6 signup-padd">	
							<select id="countries_phone1" name="country" class="form-control bfh-countries" data-flags="true"data-country="US" style="height:6vh;"></select>
							</div>
							</div>
							<div class="form-group">
							<label class="col-sm-offset-1 col-sm-3">Contact No:<span>*</span></label>	
							<div class="col-sm-2 signup-padd">
							<input type="text" name="contact_code" class="form-control bfh-phone" placeholder="Country code" required style="height:6vh;" data-country="countries_phone1" disabled>
							</div>
							<div class="col-sm-4 signup-padd">
							<input type="text" name="contact_number" class="form-control" placeholder="Phone number" required style="height:6vh;" minlength=4>
							</div>
							</div>
							<div class="form-group">
							<label class="col-sm-offset-1 col-sm-3">Website :<span>*</span></label>	
							<div class="col-sm-6 signup-padd">	
							<input type="text" name="website" class="form-control" placeholder="www." style="height:6vh;" required>
							</div>
							</div>
							<div class="form-group">
							<label class="col-sm-offset-1 col-sm-3">Product & Services :</label>	
							<div class="col-sm-6 signup-padd">	
							<input type="text" name="services" class="form-control" 
							placeholder="Please tell us about your business profile (Product/Services)" 
							 style="height:6vh;">
							</div>
							</div>
							<div class="form-group">
							<label class="col-sm-offset-1 col-sm-3">Geographical Preference :</label>	
							<div class="col-sm-6 signup-padd">	
							<input type="text" name="geo_pre" class="form-control" 
							placeholder="Please tell us if you are interested in Global tender/particular region" 
							style="height:6vh;">
							</div>
							</div>

							<div class="center">
								<p style="font-size: 10px;"><span class="text-danger">By clicking submit you are agree to our (www.goodtenders.com) Terms & Conditions and Privacy Policy</span></p> 
							<button type="submit" class="btn-login"
							> SUBMIT </button>
							</div>
							</div>
							</form>
				
		</div>
		</div>
	</section>

</body>	

<?php
	include('footer.php');
