<?php
	session_start();
	include('header.php');
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
						<h2><span> Login </span></h2>
					</div>
				</div>
			</div>
		</div>
		<div class="container">	
			<div class="card-body">
			<div class="row">	
					<div class="col-lg-12">
					<form class="form-horizontal" action="login.php" method="post" name="form_log">
					<div class="form-group">
						<label class="col-lg-offset-2 col-lg-2">Email ID :</label>	
						<div class="col-lg-8 signup-padd">	
						<input type="email" name="email" class="form-control" placeholder="Enter Email Id" required style="height:6vh;" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-offset-2 col-lg-2">Password :</label>	
						<div class="col-lg-8 signup-padd">	
						<input type="password" name="password" class="form-control" placeholder="Enter Password" style="height:6vh;" required value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>">
						</div>
					</div>
					<div class="col-lg-offset-2 col-lg-8">
						<div class="center"><br>
							<button type="submit" id="login-btn" class="btn btn-primary" style="width:50%;"> 
								<i class="fa fa-sign-in"></i> Login </button>
							</div>
							</div>
							<div class="col-lg-offset-4 col-sm-8"><br>
                                <a href="forgot_password.php" type="button" class="btn btn-link btm_btn">Forgot Password</a>
                                <a href="signform.php" type="button" class="btn btn-link btm_btn">Register</a>
                            </div>
							</div>
							
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