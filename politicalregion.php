<!-- Tender by Political Region Page -->

<?php
	session_start();
	include('header.php');
?>
<title>Tenders by Political Region | GoodTenders | Best Tenders Portal</title>

<style type="text/css">
	.links{
		color: #07b107;
		font-size: 1.1em;
		list-style-type: square;
	}
	.links li{
		margin:5%;
	}
	.links a:hover{
		color: blue;
	}
	.card-body{
		margin:2%;
		padding: 2%;
		border: 1px solid #BFBFBF;
    	background-color: #ffffff;
    	box-shadow: 3px 3px 3px #aaaaaa;	
	}
	.political{
		margin-top: 5%;
	}
</style>

<body>
	<section>
	<div class="container political text-center">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
			<div class="row">
				<div class="main-heading">
					<p>categorized Tenders</p>
					<h2>Tenders By <span>Political Regions</span></h2>
				</div>
			</div>
		</div>
	</div>

	<!-- Listing of political regions -->
	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card-body">
				<div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <ul class="links">
                            <li><a href="showtenders.php?preg=MjAxNgo=" target="_blank"> African Union</a></li>
                            <li><a href="showtenders.php?preg=MjAwMQ==" target="_blank"> Arab World</a></li> 
                            <li><a href="showtenders.php?preg=MjAwMg==" target="_blank"> Asia-Pacific Economic Cooperation, APEC</a></li>
                            <li><a href="showtenders.php?preg=MjAwMw==" target="_blank"> Association of Southeast Asian Nations, ASEAN</a></li>
                            <li><a href="showtenders.php?preg=MjAwNA==" target="_blank"> Balkans</a></li>
                            <li><a href="showtenders.php?preg=MjAwNQ==" target="_blank"> BRICS</a></li>
                            <li><a href="showtenders.php?preg=MjAwNg==" target="_blank"> Commonwealth of Independent States, CIS</a></li>
                            <li><a href="showtenders.php?preg=MjAwNw==" target="_blank"> Common Market for Eastern and Southern Africa</a></li>
                            <li><a href="showtenders.php?preg=MjAxNw==" target="_blank"> COMESA</a></li>
                		</ul>
                	</div>
                	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                		<ul class="links">
                			<li><a href="showtenders.php?preg=MjAwOA==" target="_blank"> Economic Community of West African States</a></li>
                            <li><a href="showtenders.php?preg=MjAxOA==" target="_blank"> ECOWAS</a></li> 
                            <li><a href="showtenders.php?preg=MjAwOQ==" target="_blank"> European Union</a></li>
                            <li><a href="showtenders.php?preg=MjAxMA==" target="_blank"> Gulf Cooperation Council, GCC</a></li>
                            <li><a href="showtenders.php?preg=MjAxMQ==" target="_blank"> Gulf Countries</a></li>
                            <li><a href="showtenders.php?preg=MjAxMg==" target="_blank"> G20</a></li>
                            <li><a href="showtenders.php?preg=MjAxMw==" target="_blank"> Middle East</a></li>
                            <li><a href="showtenders.php?preg=MjAxNA==" target="_blank"> Middle East and North Africa, MENA</a></li>
                            <li><a href="showtenders.php?preg=MjAxNQ==" target="_blank"> South Asian Association for Regional Cooperation (SAARC)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>

<?php
	include('footer.php');
?>		