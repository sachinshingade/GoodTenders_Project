<?php
session_start();
	include('header.php');
	require 'dbconnect.php';
?>
<title>Tenders Blogs | Tenders By Regions | Tenders By Country | Tenders By Keywords | Tenders By Political Regions | Tenders By Sector | Tenders By Funding Agency</title>
	
<style type="text/css">
	.blog{
		margin-top: 2%;
		margin-bottom: -2%;
	}
	.more{
		color:#07b107;
		text-decoration: underline;
	}
	.more:hover{
		color:#07b107;
		text-decoration: underline;
	}
	.section_blogs{
		margin-top: -5%;
	}
	.sectorblog{
		margin-top: -10% !important;
	}
</style>	

<section class="blogs">
<div class="container">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<div class="row">
			<div class="main-heading blog">
				<h2><span> Blogs </span></h2>
			</div>
		</div>
	</div>
</div>
</section>
			
		<!-- All blog List Start -->
		<section class="section_blogs">
			<div class="container">
			<div class="row .no-mrg">
			<!-- Start Blogs -->
			<div class="col-md-8">

			<?php

  			$sql = "SELECT  DISTINCT a.*,c.Sector_Name FROM tbl_blogs 
        			a INNER JOIN tbl_sector c
            		ON a.category = c.ID ORDER BY id DESC LIMIT 5 ";

  					$result = mysqli_query($conn,$sql);
  					$row = mysqli_num_rows($result);
  					while($row = mysqli_fetch_assoc($result))
					{

						echo"
							<article class='blog-news'>
								<div class='short-blog'>
									<figure class='img-holder'>
										<a href='blog-detail.php?blogid=".$row['id']."' target='_blank'>
										<img src='".$row['image_name']."' class='img-responsive' alt='News' width='100%' height='100%'></a>
										<div class='blog-post-date'>
											".$row['publish_date']."
										</div>
									</figure>
									<div class='blog-content'>
										<div class='post-meta'>By: <span class='author'>John Stark</span></div>
										<a href='blog-detail.php?blogid=".$row['id']."' target='_blank'><h2>".$row['title']."</h2></a>
										<div class='blog-text'>
											<p style='text-align:justify;'>".substr($row['article'],0,200)." 
											<a href='blog-detail.php?blogid=".$row['id']."' target='_blank' class='more'>More...</a></p>
											<div class='post-meta'>Filed Under: 
											<span class='category'><a href='tenderbysector.php' target='_blank'>".$row['Sector_Name']."</a></span></div>
										</div>
									</div>
								</div>
							</article>";
						}	
						?>
						</div>
						<!-- Sidebar Start -->
						<div class="col-md-4">
							<div class="blog-sidebar">
								<div class="sidebar-widget sectorblog">
									<h4>Popular Category</h4>
									<ul class="sidebar-list">
										<li><a href="blogsbysector.php?sector=Construction">Infrastructure & Construction</a></li>
										<li><a href="blogsbysector.php?sector=Energy">Energy & Power</a></li>
										<li><a href="blogsbysector.php?sector=Environment">Environment</a></li>
										<li><a href="blogsbysector.php?sector=Oil">Oil & Gas</a></li>
										<li><a href="blogsbysector.php?sector=Medical">Healthcare & Medical</a></li>
										<li><a href="blogsbysector.php?sector=Defence">Defense & Security</a></li>
										<li><a href="blogsbysector.php?sector=Other">Aviation</a></li>
										<li><a href="blogsbysector.php?sector=Computer">Information Technology</a></li>
									</ul>
								</div>
								
							</div>
						</div>
						<!-- End Sidebar Start -->
					</div>
				</div>
			</section>
			<!-- All Blog List End -->
			
<?php 
	include('footer.php');
?>	