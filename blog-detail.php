<?php
	session_start();
	include('header.php');
	require 'dbconnect.php';
?>
<title>Tenders Blogs | Tenders By Regions | Tenders By Country | Tenders By Keywords | Tenders By Political Regions | Tenders By Sector | Tenders By Funding Agency</title>
<style type="text/css">
	.blog-detail{
		margin-top: 2%;
		margin-bottom: -2%;
	}
	.section_blog-detail{
		margin-top: -5%;
	}
	.sectorblog{
		margin-top: -10% !important;
	}
</style>

<section class="blog-detail">
<div class="container">
	<div class="col-lg-12 col-md-12 col-sm-12">	
		<div class="row">
			<div class="main-heading blog">
				<h2><span> Blog Detail </span></h2>
			</div>
		</div>
	</div>
</div>
</section>

<!-- Blog Detail -->
<section class="section_blog-detail">
	<div class="container">
		<div class="row no-mrg">
			<div class='col-md-8'>

	<?php

	if(isset($_GET['blogid']))
	{
		
		$blogid = $_GET['blogid'];
				
		$sql = 'SELECT  a.*,c.Sector_Name FROM tbl_blogs 
        			a INNER JOIN tbl_sector c
            		ON a.category = c.ID Where a.id = "'.$blogid.'" LIMIT 1';

  		$result = mysqli_query($conn,$sql);
  		$row = mysqli_num_rows($result);
  		while($row = mysqli_fetch_assoc($result))
		{	
			echo"
			
				<article class='blog-news'>
					<div class='full-blog'>
					
						<figure class='img-holder'>";
							if (isset($row['image_name']) && !empty($row['image_name'])) {
										echo "<img src='".$row['image_name']."' class='img-responsive' alt='News' width='100%' height='100%'>";
										}else{
											echo "<img src='assets/img/goodtenders_loader.gif' class='img-responsive' alt='News' width='100%' height='100%'>";
										}
							echo"<div class='blog-post-date'>
								".$row['publish_date']."
							</div>
						</figure>
						
						<div class='full blog-content'>
							<div class='post-meta'>By: <span class='author'>John Stark</span></div>
							<h2>".$row['title']."</h2>
							<div class='blog-text'>
								<p>".$row['article']."</p>
								<div class='post-meta'>Filed Under: <span class='category'>
								<a href='tenderbysector.php' target='_blank'>".$row['Sector_Name']."</a></span></div>
							</div>
							<div class='row no-mrg'>
								<div class='blog-footer-social'>
									<span>Share <i class='fa fa-share-alt'></i></span>
									<ul class='list-inline social'>
										<li><a href='#'><i class='fa fa-facebook'></i></a></li>
										<li><a href='#'><i class='fa fa-twitter'></i></a></li>
										<li><a href='#'><i class='fa fa-google-plus'></i></a></li>
										<li><a href='#'><i class='fa fa-pinterest'></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						
					</div>
				</article>";
			}
		
		?>
					</div>
						<!-- Start Sidebar -->
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
						<!-- End Start Sidebar -->
					</div>
			</section>
			<!-- Blog Detail End -->
			<?php 
				}
			?>	
<?php
	include('footer.php');
?>				