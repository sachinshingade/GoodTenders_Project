<?php
	require 'dbconnect.php';
?>
<!-- Footer Section Start -->
			<footer class="footer">
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
									<li><a href="" title="Site Map">Site Map</a></li>
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
									<button type="submit" value="send" name="send" class="btn btn-primary" 
                  					onclick="return validation();">Connect</button>
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
			<!-- Top Button -->
			<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

			<!-- Login Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header text-center" style="margin-bottom:4vh;background-color: #35434e;">
                		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                		<h2 class="modal-title" style="color:#07b107;"><strong>Log in</strong></h2>
            		</div>
						<div class="modal-body">
							<div class="subscribe wow fadeInUp">
							<form class="form-inline" action="login.php" method="post">
							<div class="col-sm-offset-1 col-sm-10">
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

				<!-- Register Modal -->
				<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-dialog">
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
							<input type="tel" name="contact" class="form-control" required 
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
							<button type="submit" id="subscribe" class="btn btn-primary btn-block"> Create Free Account </button>
							</div>
							</div>
							</form>
							</div>
							
							</div>
							</div>
						</div>
			<!-- End Sign Up Window -->


		<!-- Start Forget Password Modal -->					
		<div class="modal fade" id="lostpassword" tabindex="-1" role="dialog">
    		<div class="modal-dialog">
        		<div class="modal-content">
            		<div class="modal-header text-center" style="margin-bottom:4vh;background-color: #35434e;">
                		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                		<h2 class="modal-title" style="color:#07b107;"><strong>Forgot Password</strong></h2>
            		</div>
            		<div class="modal-body text-center">
            		<form name="lostpwd_form" id="forget_form" method="post" onSubmit="return validate_forgot();" style="margin-top: 15px;">
                		<div class="row">
                			<div class="col-lg-12 col-sm-12">
                				<input type="text" name="user-login-name" id="user-login-name" class="form-control" placeholder="Enter Your Name" />
                			</div>
                			<div class="col-lg-12 col-sm-12">
                				<input type="email" name="user-email" id="user-email" class="form-control" placeholder="Enter Your Email" />
                			</div>
                			<div class="col-lg-12 col-sm-12">
                				<input type="submit" name="forgot-password" id="forgot-password" class="btn btn-primary" />
                			</div>
                		</div>
                	</form>      
                	</div>
        		</div>
		</div><!-- End Forget Password Modal -->	

			</body>
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
			<script src="assets/js/select2.js"></script>
			
			<!-- Custom Js -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
			<script src="assets/js/bootstrap-formhelpers-countries.js"></script>
			<script src="assets/js/bootstrap-formhelpers.min.js"></script>
			<script src="assets/js/bootstrap-formhelpers-phone.js"></script>
			
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
			</script>
			<!--End of Tawk.to Script-->

			<script type="text/javascript">
				function lostpassword(){
					$('#login').hide();
					$('#lostpassword').show();
				}

				$(function() {
    				$( "#datepicker1" ).datepicker();
    				$( "#datepicker2" ).datepicker();
				});

				$(document).ready(function(){
     			$(window).scroll(function () {
            		if ($(this).scrollTop() > 50) {
                		$('#myBtn').fadeIn();
            		} else {
                		$('#myBtn').fadeOut();
            		}
        		});
        		// scroll body to 0px on click
        		$('#myBtn').click(function () {
            		//$('#myBtn').tooltip('hide');
            	$('body,html').animate({
                	scrollTop: 0
            		}, 800);
            		return false;
        		});
        
        			$('#myBtn').tooltip('show');

				});

				$(window).load(function() {
			    $(".loader").fadeOut("slow");
			});
			</script>
		</html>	