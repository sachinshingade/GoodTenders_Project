<!-- Project Page -->

<?php
	session_start();
	include('header.php');
	require 'dbconnect.php';
	mysqli_query ($conn,"set character_set_results='utf8'");
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
				if($page ==3 )
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

<title>Tenders Project | Tenders By Regions | Tenders By Country | Tenders By Keywords | Tenders By Political Regions | Tenders By Sector | Tenders By Funding Agency</title>

<style type="text/css">
	.card-body
	{
		margin-left:-5%;
		margin-right:-5%;
		padding: 15px;
		border: 1px solid #BFBFBF;
    	background-color: white;
    	box-shadow: 3px 3px 3px #aaaaaa;
	}
	.projects{
		margin-top:3%;
		margin-bottom: 3%;
	}
	.advance-search-job:hover
	{
		border: 1px solid #BFBFBF;
		box-shadow: 3px 3px 3px #aaaaaa;
	}
	.advance-search-caption{
    	cursor: pointer;
    }

    .advance-search-caption:hover h4{
    	color: #337ab7;
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
	.pr-btn{
		margin-left: 10% !important;
		text-align: center;
		font-weight: bold;
	}
	#btpadd{
		margin:5%;
	}
</style>
	<section>
		<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12">	
		<div class="row">
			<div class="main-heading projects">
				<p>categorized data</p>
				<h2><span> Projects </span></h2>
			</div>
		</div>

		<!-- Projects data to be fetched from DB -->

            <div class="card-body">
            <div class='row no-mrg' style='margin-top:5px;'>
    		<div class='col-md-4 col-sm-4'>
    		<strong>PROJECT TITLE</strong>
    		</div>
    		<div class='col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-2'>
    		<strong>COUNTRY</strong>
    		</div>
    		<div class='col-md-3 col-sm-3'>
    		<strong>SECTOR</strong>
    		</div>
    		<div class='col-md-2 col-sm-2'>
    		<strong>QUICK VIEW</strong>
    		</div>	
    		</div><hr>	
        <?php

        	mysqli_query ($conn,"set character_set_results='utf8'");

        	if(empty($_SESSION["id"]))
			{
				$sql = "SELECT B.*, A.Country,C.Sector_Name FROM tbl_projects AS B 
				LEFT JOIN tbl_country as A 
				ON (B.country=A.code)
				LEFT JOIN tbl_sector C
	            ON B.sector = C.Sub_Sector_Id
				ORDER BY B.id DESC LIMIT $start_from, $num_rec_per_page";

  				$result = mysqli_query($conn,$sql);
				$row = mysqli_num_rows($result);
  				$total_records = mysqli_num_rows($result);  
  				$total_pages = 3;

  			global $pagination;
						$pagination =  "<div class='row'>
										<ul class='pagination'>
										<li class='disabled'>";
					
						$pagination .= "<a disabled='disabled'>" . '&laquo;' . "</a> </li>"; // Goto 1st page  
						for ($i = 1; $i <= $total_pages; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='project.php?Page=allAds&page=" . $i . "'>" . $i . "</a></li>";
						}
						$pagination .=  "<li class='disabled'>
											<a disabled='disabled'>" . 
											'&raquo;' . "</a> </li>
										</ul></div>";
						#echo $pagination;
					}else if(isset($_SESSION["id"])){	

						$sql = "SELECT B.*, A.Country,C.Sector_Name FROM tbl_projects AS B 
						LEFT JOIN tbl_country as A 
						ON (B.country=A.code)
						LEFT JOIN tbl_sector C
			            ON B.sector = C.Sub_Sector_Id
						ORDER BY B.id DESC LIMIT $start_from, $num_rec_per_page";

		  				$result = mysqli_query($conn,$sql);
						$row = mysqli_num_rows($result);
		  				$total_records = mysqli_num_rows($result);  
		  				$total_pages = ceil($total_records / $num_rec_per_page);

		  				$psql = "SELECT B.*, A.Country,C.Sector_Name FROM tbl_projects AS B 
						LEFT JOIN tbl_country as A 
						ON (B.country=A.code)
						LEFT JOIN tbl_sector C
			            ON B.sector = C.Sub_Sector_Id
						ORDER BY B.id DESC LIMIT 1000";

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
					
						$pagination .=  "<a href='project.php?Page=allAds&page=1'>" . '&laquo;' . "</a> </li>"; 
						// Goto 1st page  
						
						for ($i = $start; $i <= $end; $i++)
						{
							$active = '';
							if(isset($_GET['page']) && $i == $_GET['page'])
							{
								$active = 'class="active"';        
							}
						$pagination .= "<li $active><a href='project.php?Page=allAds&page=" . $i . "'>" 
											. $i . 
											"</a></li>";
						}
						$pagination .=  "<li >
											<a class='disabled' href='project.php?Page=allAds&page=$total_pages'>" 
											. '&raquo;' . "</a> 
										</li>
										</ul></div>";
										
						} else {
							echo "<h3 class='text-center'> No Tenders Found</h3>";
					}

  				$total = $row*100; // For Blur Image Data on 3rd Pages
  				while($row = mysqli_fetch_assoc($result))
				{
					$id= $row['id'];
					echo " <article class='advance-search-job'>
					<div class='row no-mrg'>";
					if(isset($_SESSION["id"])):
					echo "<div class='col-md-4 col-sm-4'>
		    		<div class='advance-search-caption' style='margin-left:-10px;' onclick='onRedirect(".$row['id'].")' title='Click to See Full Details'>
		    			<h4>".$row['projectname']."</h4>
					</div>
					</div>";
					else:
					echo "<div class='col-md-4 col-sm-4'>
		    		<div class='advance-search-caption' style='margin-left:-10px;' 
		    		onclick='onModal()' title='Click to See Full Details'>
		    			<h4>".$row['projectname']."</h4>
					</div>
					</div>";
					endif;
					echo "<div class='col-md-offset-1 col-md-2 col-sm-offset-1 col-sm-2'>
					<div class='advance-search-job-locat'>";
					if($row['Country']!=""){
						echo "<h5><img src='assets/flags/blank.gif' class='flag flag-".strtolower($row['country'])."'/> ".$row['Country']."</h5>";
					}else{
						echo "<h5> -- </h5>";
					}	
					echo "
					</div>
					</div>
					<div class='col-md-3 col-sm-3'>
					<div class='advance-search-job-locat'>";
					if($row['Sector_Name']!=""){
                		echo "<h5>".$row['Sector_Name']."</h5>";
            		}else{
                		echo "<h5>Others</h5>";
            		}
            		echo "
					</div>
					</div>
					<div class='col-md-2 col-sm-2'>
						<a href='#".$id."' id='btpadd' data-toggle='modal' class='btn btn-primary' title='View Details'>Quick View</a>
					</div>
					
					</div>
					</article>";
				?>  
            <div class="modal fade" id="<?php echo $id ?>">
    		<div class="modal-dialog">
        	<div class="modal-content">
            <div class="modal-header" style="background-color: #07b107;color: #ffffff;">
              <a href="#" data-dismiss="modal" class="class pull-right"><span class="fa fa-remove"></span></a>
              <h3 class="modal-title text-center">Project Details</h3>
            </div>
            <div class="modal-body" style="margin-top: 5%;margin-bottom: 1%;">
            <?php

                echo "<div class='row'>
                
                	<div class='col-md-12 tender_content'>
                    <h5><strong>Good Tender ID:</strong> ".$row['id']."</h5>
                    <hr>
                	</div>
                    <div class='col-md-12 tender_content'>
                    <h5><strong>Project Title:</strong> ".$row['projectname']."</h5>
                    <hr>
                	</div>
                	<div class='col-md-12 tender_content'>";
                	if($row['Country']!=""){
                		echo "<h5><strong>Country:</strong>
                    		  <img src='assets/flags/blank.gif' class='flag flag-".strtolower($row['country'])."'/>".$row['Country']."</h5>";
                	}else{
                		echo "<h5><strong>Country: -- </strong>";
                	}
                    
                    echo "</div>
                    <div class='col-md-12 tender_content'><hr>";
                    if($row['Sector_Name']!=""){
                        echo "<h5><strong>Sector:</strong> ".$row['Sector_Name']."</h5>";
                    }else{
                        echo "<h5><strong>Sector:</strong> Others </h5>";
                    }
                    echo " 
                    <hr>
                    </div>
                    <div class='col-md-12 tender_content'>
                    <h5><strong>Description:</strong><br> ".substr($row['projectdetails'],0,300).".....</h5>
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
			";
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
		</div>
       </div>
    </section>   

    <!-- Modal Error For unregistered users-->
	<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
					<div class="modal-dialog modal-confirm">
						<div class="modal-content">
							<div class="modal-header">
								<div class="box">
									<img src="assets/img/customer.jpg" class="img-circle img-responsive" />
								</div>				
								<h4 class="modal-title">Registration Required</h4>	
				                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							</div>
							<div class="modal-body">
								<p>Complete specifications of tenders are available to only registered users. Allow us to connect and assist you OR whats-app us at +91 9867848333</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-info" data-dismiss="modal" id="connect_modal" data-toggle="tab">Connect us</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#register" data-dismiss="modal">Register</button>
							</div>
						</div>
					</div>
				</div> 

<?php
	include('footer.php');
?>

	<script>
		
		function onRedirect(id){
				var noRedirect = '.btn';
  					window.open("projectdetails.php?pid="+id,"_blank");
  				}
  		function onModal(){
				$('#errorModal').modal('show');
			}
			
		$("#connect_modal").click(function() {
    			$('html,body').animate({
        		scrollTop: $(".footer-widget").offset().top},
        		'slow');
			});			
	</script>