<?php
session_start();
	include('header.php');	
?>
	<title>Contact US | Best Tenders Portal</title>

		<!-- Contact Page Section Start -->
			<section class="contact-page">
				<div class="container">
				<h2><span style="color:#07b107;">Contact us</span></h2>
				
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="contact-box">
							<i class="fa fa-envelope"></i>
							<p style="text-transform: unset;">info@goodtenders.com<br>sales@goodtenders.com</p>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="contact-box">
							<i class="fa fa-phone"></i>
							<p>+91 9867 848 333<br>+91 2226 820 344</p>
						</div>
					</div>
					
				</div>
			</section>
			<!-- contact section End -->
			
			<!-- contact form -->
			<section class="contact-form">
				<div class="container">
					<h2>Drop A Mail</h2>
					<form action="contactus_insert.php" method="POST">
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" placeholder="Your Name" name="name" required>
					</div>
					
					<div class="col-md-6 col-sm-6">
						<input type="email" class="form-control" placeholder="Your Email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
					</div>
					
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" placeholder="Phone Number" name="phone" required minlength=4>
					</div>
					
					<div class="col-md-6 col-sm-6">
						<input type="text" class="form-control" placeholder="Subject" name="subject" required>
					</div>
					
					<div class="col-md-12 col-sm-12">
						<textarea class="form-control" placeholder="Message" name="message"></textarea>
					</div>
					
					<div class="col-md-12 col-sm-12">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					</form>
				</div>
			</section>
			<!-- Contact form End -->
			
<?php
	include('footer.php');
?>	