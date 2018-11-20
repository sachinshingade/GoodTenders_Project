<!-- Free Tenders Page -->

<?php
	session_start();
	include("header.php");
	require 'dbconnect.php';
	$pagination = "";
		if(isset($_GET["page"])) 
		{ 
			$page  = $_GET["page"]; 
		} 
		else{
			$page=1; 
		}
		
		
			if(isset($_SESSION["id"])):
				$num_rec_per_page = 10;
			else:
				if($page == 3)
				{
					$num_rec_per_page = 2;
					
				}else if ($page > 3){
					
					$num_rec_per_page = 0;
					
				}else{
					
					$num_rec_per_page = 10;
				}
			endif;
	
	
	$start_from = ($page-1) * $num_rec_per_page; 

	
?>

<title>Free Tenders | GoodTenders | Tenders By Regions | Tenders By Country | Tenders By Keywords | Tenders By Political Regions | Tenders By Sector | Tenders By Funding Agency</title>

<style type="text/css">
	.card-body
	{
		margin:1% 5% 1% 5%;
		border: 1px solid #BFBFBF;
    	background-color: white;
    	box-shadow: 3px 3px 3px #aaaaaa;
	}
	.free{
		margin-top:3%;
		margin-bottom: 3%;
	}
	.advance-search-job:hover
	{
		border: 1px solid #BFBFBF;
		box-shadow: 3px 3px 3px #aaaaaa;
	}
	#btpadd{
		margin:5%;
	}
	.pr-btn{
		margin-left: 10% !important;
		text-align: center;
		font-weight: bold;
	}
	.advance-search-caption:hover h4{
    	color: #337ab7;
    	cursor: pointer;
    }
    .priceInfo
	{
		padding: 3%;
		position: absolute;
    	top: 40%;
    	left: 50%;
    	transform: translate(-50%, -50%);
    	border: 1px solid #BFBFBF;
    	box-shadow: 3px 3px 3px #aaaaaa;
    	background-color: #35434e;
    	color: #fff;
	}
</style>

	<section>
		<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12">	
		<div class="row">
			<div class="main-heading free">
				<p>More</p>
				<h2><span> Free Tenders</span></h2>
			</div>
		</div>
	</div></div></section>

		
		<!-- Free Tenders Data Fetched From DB Tables -->
<?php
	
	// tenders listing section fixed headers
    echo   "<div class='card-body'>
    	<div class='row no-mrg' style='margin-top:5px;'>
    	<div class='col-md-6 col-sm-6'>
    	<strong><i class='fa fa-newspaper-o'></i> SUMMARY OF TENDERS</strong>
    	</div>
    	<div class='col-md-2 col-sm-6'>
    	<strong><i class='fa fa-map-marker'></i> LOCATION</strong>
    	</div>
    	<div class='col-md-2 col-sm-6'>
    	<strong><i class='fa fa-hourglass-half'></i> DEADLINE</strong>
    	</div>	
    	<div class='col-md-2 col-sm-6'>
    	<strong><i class='fa fa-search'></i> QUICK VIEW</strong>
    	</div><hr>
    	</div>";

	mysqli_query ($conn,"set character_set_results='utf8'");
	if(empty($_SESSION["id"]))
	{
        $sql = "SELECT B.*, A.Country FROM tbl_tenders AS B INNER JOIN tbl_country as A ON (B.org_country=A.code) WHERE ext1 = 2 LIMIT $start_from, $num_rec_per_page";

		$result = mysqli_query($conn,$sql);
		$row = mysqli_num_rows($result);
  		$total_records = mysqli_num_rows($result);  

  		$psql = "SELECT B.*, A.Country FROM tbl_tenders AS B INNER JOIN tbl_country as A ON (B.org_country=A.code) WHERE ext1 = 2";
  		$presult = mysqli_query($conn,$psql);
		$prow = mysqli_num_rows($presult);
		
		if($prow > 10 && $prow <= 20){
			$total_pages = 2;
		}else if($prow > 20){
			$total_pages = 3;	
		}else{
			$total_pages = 1;
		}
  		
    	
    	global $pagination;
						$pagination =  "<div class='row'>
										<ul class='pagination'>
										<li class='disabled'>";
					
						$pagination .= "<a>" . '&laquo;' . "</a> </li>"; // Goto 1st page  
						for ($i = 1; $i <= $total_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='freetenders.php?Page=allAds&page=" . $i . "'>" . $i . "</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled'>" . 
											'&raquo;' . "</a> </li>
										</ul></div>";
						#echo $pagination;
		}else if(isset($_SESSION["id"])){	

			$sql = "SELECT B.*, A.Country FROM tbl_tenders AS B INNER JOIN tbl_country as A ON (B.org_country=A.code) WHERE ext1 = 2 LIMIT $start_from, $num_rec_per_page";

			$result = mysqli_query($conn,$sql);
			$row = mysqli_num_rows($result);
	  		$total_records = mysqli_num_rows($result);  
	  		$total_pages = ceil($total_records / $num_rec_per_page);
	  		$psql = "SELECT B.*, A.Country FROM tbl_tenders AS B INNER JOIN tbl_country as A ON (B.org_country=A.code) WHERE ext1 = 2";
	  		$presult =  mysqli_query($conn,$psql);
						$prow = mysqli_num_rows($presult);	           	 		
						$ptotal_records = mysqli_num_rows($presult);  //count number of records						
						$ptotal_pages = ceil($ptotal_records / $num_rec_per_page);
						
						if ($ptotal_pages <= 10) {
						    $start = 1;   // Startin pagination
						    $end   = $ptotal_pages;   // End at total pages
						} else { 
							// Total page greater than 10

							// Checks maximum of both n gives out greater one
						    $start = max(1, ($page - 4));

						    // Checks minimum of both n gives out min one
						    $end   = min($ptotal_pages, ($page + 5));
						    
						    if ($start === 1) {
						        $end = 10;
						    } elseif ($end === $ptotal_pages) {
						        $start = ($ptotal_pages - 9);
						    }
						}
						global $pagination,$start_from,$num_rec_per_page;
						$pagination =  "<div class='row'>
											<ul class='pagination'>
												<li class='disabled'>";
					
						$pagination .=  "<a href='freetenders.php?Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; 
						// Goto 1st page  
						
						for ($i = $start; $i <= $end; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='freetenders.php?Page=allAds&page=" . $i . "'>" 
											. $i . 
											"</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='freetenders.php?Page=allAds&page=$total_pages'>" 
											. '&raquo;' . "</a> 
										</li>
										</ul></div>";
										
						} else {
							echo "<h3 class='text-center'> No Tenders Found</h3>";
					}

			$total = $row*100; // For Blur Image Data on 3rd Pages
	
			while($row = mysqli_fetch_assoc($result))
				{
				
				$id=$row['gt_id'];
				$tags = "";
				$tag_color = "";

			    	if($row['financier'] == 0)
					{
						$tags="Self-Financed";
						$tag_color="tg-themetag tg-featuretag";
					}else{
						$tags="Funded";
						$tag_color="tg-themetag1 tg-featuretag1";
					}
				
					
				// tenders listing coming from database 

				 echo " <article class='advance-search-job'>
						<div class='row no-mrg'>
						<div class='col-md-6 col-sm-6'>
			    		<div class='advance-search-caption' style='margin-left:-10px;' 
			    		onclick='onRedirect(".$row['gt_id'].")' title='Click to See Full Details'>
			    			<h4>".$row['short_description']."</h4>
						</div>
						</div>
						<div class='col-md-2 col-sm-2'>
						<div class='advance-search-job-locat'>
						<p><img src='assets/flags/blank.gif' class='flag flag-".strtolower($row['org_country'])."'/>&nbsp;".$row['Country']."</p>
						</div>
						</div>
						<div class='col-md-2 col-sm-2'>
						<div class='advance-search-job-locat'>
						<p><i class='fa fa-calendar'></i>".date_format (new DateTime($row['deadline']), 'd-m-Y')."</p>
						</div>
						</div>
						<div class='col-md-2 col-sm-2'>
						<a href='#".$id."' id='btpadd' data-toggle='modal' class='btn btn-primary' title='View Details'>Quick View</a>
						</div>
						</div>
							<span class='".$tag_color."'>".$tags."</span>
						</article>";
					?>		
						<div class="modal fade" id="<?php echo $id ?>">
			    		<div class="modal-dialog">
			        	<div class="modal-content">
			            <div class="modal-header" style="background-color: #07b107;color: #ffffff;">
			              <a href="#" data-dismiss="modal" class="class pull-right"><span class="fa fa-remove"></span></a>
			              <h3 class="modal-title text-center">Tenders Details</h3>
			            </div>
			            <div class="modal-body" style="margin-top: 5%;margin-bottom: 1%;">
			            <?php

			                echo "<div class='row'>
			                    <div class='col-md-12 tender_content'>
			                    <h5><strong>Good Tender IDN:</strong> ".$row['gt_id']."</h5>
			                    <hr>
			                	</div>
			                    <div class='col-md-12 tender_content'>
			                    <h5><b>Title:</b> ".$row['short_description']."</h5>  
			                    <hr>
			                    </div>
			                    <div class='col-md-6 tender_content'>
			                    <h5><strong>Deadline:</strong> ".date_format (new DateTime($row['deadline']), 'd-m-Y')."</h5>     
			                    </div>
			                    <div class='col-md-6 tender_content'>
			                    <h5><strong>Location:</strong>
			                    <img src='assets/flags/blank.gif' class='flag flag-".strtolower($row['org_country'])."'/>
			                     ".$row['Country']."</h5>     
			                    </div>
			                    <div class='col-md-6 tender_content'><hr>
			                    <h5><strong>Financier:</strong> ".$tags."</h5> 
			                    <hr>  
			                    </div>
			                    <div class='col-md-12 tender_content'>
			                    <h5><strong>Description:</strong><br> ".substr($row['tender_details'],0,300)."</h5>
			                    </div>
			                    </div>
			                </div>";
			               if(isset($_SESSION["id"])):
			                	echo "";
			                else:	
			                echo"<div class='modal-footer' style='margin-bottom: -3%;'>
			                    <div class='col-md-12 text-center' style='margin-top: -10px;margin-bottom: -10px;''>	
			                    <h5><b>Register and view more details</b></h5>
			                	</div>
			                	<div class='col-md-offset-2 col-md-4 pr-buy-button'>
			                		<a href='signform.php' target='_blank' class='pr-btn'>Register</a>
			                	</div>	
			                	<div class='col-md-4 pr-buy-button'>
			                		<a href='pricing.php' target='_blank' class='pr-btn'>Pricing</a>
			                	</div>
			                </div>";
			                endif;   
			        	echo "</div>
			    	</div>
				</div>";
				?>
					<?php 
						}
						
						if($page == 3)
						{
						if(isset($_SESSION["id"])):
						echo "";
						else:	
						//Popup Div on Blur Images 

						echo "<article class='advance-search-job'>
						<img src='assets/img/blurimg.PNG' class='img-responsive' style='filter:blur(5px);'>
						<img src='assets/img/blurimg.PNG' class='img-responsive' style='filter:blur(5px);'>
						<div class='priceInfo'>
						<h5>
						More results available for your search. Register and view more details.
						</h5><br>
						<div class='col-md-6'>
						<a href='signform.php' class='btn btn-warning btn-lg btn-block'>Register</a>
						</div>
						<div class='col-md-6'>
						<a href='pricing.php' class='btn btn-success btn-lg btn-block'>See Pricing</a>			
						</div>
						</div>
						</div>
						</article>
						</div>";
					endif;


					}

						if(mysqli_affected_rows($conn) >= 1){
							global $pagination;
							echo $pagination;
							echo "</div>";	           	 	
						}else{
							echo "No Tenders Available";
							echo "</div>";
						}

				?>  



<?php
	include("footer.php");
?>	

	<script type="text/javascript">
		function onRedirect(id){
				var noRedirect = '.btn';
  				window.open("free_tenders_details.php?fr_tnd="+id,"_blank");
  			}
	</script>