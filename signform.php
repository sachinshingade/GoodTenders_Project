<?php
	session_start();
	include('header.php');
	require 'dbconnect.php';
?>
	<style>
	.main-heading{
		margin-top: 5%;
	}
	.card-body{
		margin:3%;
		padding: 5%;
		border: 1px solid #BFBFBF;
    	background-color: #f5f5f5;
    	box-shadow: 3px 3px 3px #aaaaaa;	
	}
	.form-group label span{
		margin-top: 5px !important;
		margin-left: -20px;
	}
	.form-group label{
		margin-top: 10px !important;
		font-size: 1.2em;
	}
	
	</style>
	</head>
	<body>
	<section>	
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12">	
				<div class="row">
					<div class="main-heading">
						<p>Welcome to GoodTenders</p>
						<h2>Register<span> Yourself</span></h2>
					</div>
				</div>
			</div>
		</div>
		<div class="container">	
			<div class="card-body">
			<div class="row">	
					<div class="col-lg-2">
						<img src="assets/img/reg.png" width="180vh" height="200vh"
						style="margin-top: 10%;" alt="GoodTenders Registration">
					</div>
					<div class="col-lg-10">
					<form class="form-horizontal" action="signup.php" method="post" name="form_log">
					<div class="form-group">
						<label class="col-lg-offset-1 col-lg-3">Name :<span>*</span></label>	
						<div class="col-lg-8 signup-padd">
						<input type="text" name="name" class="form-control" placeholder="Your Name" required style="height:6vh;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-offset-1 col-lg-3">Email ID :<span>*</span></label>	
						<div class="col-lg-8 signup-padd">	
						<input type="email" name="email" class="form-control" placeholder="Company Email Id" required style="height:6vh;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-offset-1 col-lg-3">Organization :</label>	
						<div class="col-lg-8 signup-padd">	
						<input type="text" name="orgname" class="form-control" placeholder="Organization Name" style="height:6vh;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-offset-1 col-lg-3">Country :<span>*</span></label>	
						<div class="col-lg-8 signup-padd">	
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
						<label class="col-lg-offset-1 col-lg-3">Contact No:<span>*</span></label>	
						<div class="col-lg-8 signup-padd">
						<input type="text" name="contact" class="form-control" required style="height:6vh;" minlength="4">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-offset-1 col-lg-3">Categories :<span>*</span></label>	
						<div class="col-lg-8 signup-padd">	
						<input type="text" name="category" class="form-control" 
						placeholder="What product/service tenders you are looking at" 
						required style="height:6vh;">
						</div>
					</div>	
					<div class="form-group">
						<div class="col-lg-offset-4 col-lg-4">	
						<img src='captcha.php' class="img-responsive captcha_img">
						</div>
						<div class="col-lg-4">
                  		<input type="text" class="form-control" name="code_captcha_signup" id="code_captcha_signup" placeholder="Enter Captcha" required>
                  		</div>	
					</div>					
					<div class="col-lg-offset-2 col-lg-8">
						<button type="submit" id="subscribe" class="btn btn-primary btn-block"
						> Create Free Account </button>
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