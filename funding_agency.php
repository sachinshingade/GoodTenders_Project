<!-- Tenders By Funding Agency Page -->
               
<?php
	session_start();
     include("header.php");
     require 'dbconnect.php';
?>
<title>Tenders by Funding Agency | GoodTenders | Best Tenders Portal</title>

<style type="text/css">
	a{
		color: #000000;
	}
	.links{
		color: #07b107;
		font-size: 1.1em;
		list-style-type: square;
	}
	li{
		margin-bottom: 10px;
	}
     .card-body{
          margin: 15px;
          padding: 2%;
          border: 1px solid #BFBFBF;
          background-color: #ffffff;
          box-shadow: 3px 3px 3px #aaaaaa;   
     }
     .funding{
          margin-top: 5%;
     }

</style>
<body>

	<section>
		<div class="container funding">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
		<div class="row">
			<div class="main-heading">
				<p>categorized tender</p>
				<h2>Tenders by<span> Funding Agencies</span></h2>
			</div>
		</div>
		</div>
          </div>
          <div class="container">
            <div class="col-lg-12">
               <div class="card-body">  
          
                    <div class="row">
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <ul class="links">

                         <!-- Fetching Funding Agency Data From Database and showing in <ul><li>-->     
                         <?php 
                              mysqli_query ($conn,"set character_set_results='utf8'");  
                              $sql = "SELECT financier FROM tbl_financier ORDER BY financier";
                              $result = mysqli_query($conn,$sql);
                              $row = mysqli_num_rows($result);
                              while ($row = mysqli_fetch_assoc($result)){
                                   echo "<li class='col-lg-4 col-md-4 col-sm-6 col-xs-12'><a href='showtenders.php?financier=".$row['financier']."' target='_blank'>".$row['financier']."</a></li>";
                              }
                         ?>       
                         </ul>
                         </div>
			<?php 
			    if($row){
				    die("Check line number 68 in funding_agency.php");
			    }
		    	?>
                         
                    </div>
                    </div>
               </div>
          </div>
</section>

</body>
<?php
	include('footer.php');
?>		
