<?php
	include("header.php");
	require 'dbconnect.php';
	session_start();
?>	

<head>
<title>GoodTenders | Best Tenders Portal | Forgot Password</title>
</head>	
	
	<body>
		<div class="wrapper">  
			
			<!-- Title Header Start -->
			<section class="lost-ps-screen-sec">
				<div class="container">
					<div class="main-heading">
						<h2>Forgot Password</h2>
					</div>
					<div class="lost-ps-screen" style="margin-top: -10px;">
						<form action="forgot_password_r.php" method="POST">
							<input type="email" name="fpemail" class="form-control" placeholder="Enter your Email"><br>
							<button class="btn btn-login" type="submit">Submit</button>
						</form>
					</div>
				</div>
			</section>
			
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
			
			<!-- Slick Slider js -->
			<script src="assets/plugins/slick-slider/slick.min.js"></script>
			
			<!-- Owl carousel Js -->
			<script type="text/javascript" src="assets/plugins/owl-carousel/js/owl.carousel.min.js"></script>
			
			<!-- Custom Js -->
			<script src="assets/js/custom.js"></script>
		</div>
	</body>

	<?php  
		include("footer.php");
	?>