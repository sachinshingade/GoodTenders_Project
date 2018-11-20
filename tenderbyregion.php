<!-- Tenders By Regions Page -->

<?php
	session_start();
	include('header.php');
?>
<title>Tenders by Regions | GoodTenders | Best Tenders Portal</title>
<style type="text/css">
	.regions{
		margin-top: 10%;
	}
	.map{
		border: 1px solid #07b107;
		border-radius: 5px;
		padding:15px;
		margin:17px;
		transition: all .2s ease-in-out; 
		-webkit-box-shadow: 3px 11px 60px -17px rgba(0,0,0,0.75);
		-moz-box-shadow: 8px 11px 60px -20px rgba(0,0,0,0.75);
		box-shadow: 8px 11px 60px -20px rgba(0,0,0,0.75);
		cursor: pointer;
	}
	.map:hover{
		border: 2px ridge #07b107;
	    box-shadow: 5px 8px 10px silver;
	    transform: scale(1.01,1.01);
		background-color: #6e7272;
}
	.map:hover h4{
		color:#ffffff;
	}
	.map h4{
		margin-top: 15%;
		font-weight: bold;
		font-size: 1.3em;
		width: 100%;
	}
	.map img{
		max-width: 150vw !important;
		max-height: 180vh !important;
	}
	
	@media screen and (max-width: 1440px) { 
    	.map h4{
			font-size: 1.3em;
		}
		.map{
			margin: 10px;
		}
		
	}

	@media screen and (max-width: 2560px) { 
    	.map h4{
			font-size: 0.8em;
		}
		.map{
			margin: 12px;
		}
		
		
	}

	.col-2 {width: 20%;}
		
</style> 	
	<!-- Regions Section Start -->

	<div class="container regions text-center">
		<div class="col-lg-12 col-md-12 col-sm-12">	
			<div class="row">
				<div class="main-heading">
					<p>categorized Tenders</p>
					<h2>Tenders By <span>Regions</span></h2>
				</div>
			</div>
		</div>
	</div>
	<!-- Map Of Regions -->
		<div class="container text-center">	
			<div class="card-body">
			<div class="row"> 
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 map" onclick="Asia()" 
					title="Asia Region">
					<img src="assets/img/Asia_map.png" class="img-responsive" width="100%" height="100%">
					<h4>Asia</h4>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 map" onclick="Europe()" 
					title="Europe Region">
					<img src="assets/img/Europe_map.png" class="img-responsive" width="100%" height="100%">
					<h4>Europe</h4>
				</div>	
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 map" onclick="Africa()" 
					title="Africa Region">
					<img src="assets/img/Africa.png" class="img-responsive" width="100%" height="100%">
					<h4>Africa</h4>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 map" onclick="AusCon()" 
					title="Australia Continents Region">
					<img src="assets/img/AusCon_map.png" class="img-responsive" width="100%" height="100%">
					<h4>Australia/Oceania</h4>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 map" onclick="America()" 
					title="America Region">
					<img src="assets/img/America_map.png" class="img-responsive" width="100%" height="100%">
					<h4>America</h4>
				</div>
			</div>
		</div>
	</div>			

	<!-- Regions Section End -->

<?php
	include('footer.php');
?>		


	<script type="text/javascript">
		function Asia(){
  			window.open("showtenders.php?region=Asia", "_blank");
		}
		function Europe(){
  			window.open("showtenders.php?region=Europe", "_blank");
		}
		function Africa(){
  			window.open("showtenders.php?region=Africa", "_blank");
		}
		function AusCon(){
  			window.open("showtenders.php?region=Australia/Oceania", "_blank");
		}
		function America(){
  			window.open("showtenders.php?region=Americas", "_blank");
		}
	</script>