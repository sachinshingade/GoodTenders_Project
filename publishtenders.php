<!-- Publish Tenders Page -->
<?php
    session_start();
    require 'dbconnect.php';
    include('header.php');
?>
<title>Publish Tenders | Tenders By Regions | Tenders By Country | Tenders By Keywords | Tenders By Political Regions | Tenders By Sector | Tenders By Funding Agency</title>
<style type="text/css">
    .main{
        margin-top: 3%;
    }
	.form-group label{
		margin: 0% !important;
	}
	.form-group label span{
		margin-top: 7px !important;
	}
	#publish{
		border: 1px solid #07b107;
	}
    .captcha_img{
        height: 50px;
        width: 350px;
    }
    
</style>

<body>
			<!--- Publish Tenders --->
			<section>
			<div class="container main">
			<div class="col-lg-12 col-md-12 col-sm-12">	
			<div class="row">
				<div class="main-heading">
					<p>Services</p>
					<h2>Publish<span>Tenders</span></h2>
				</div>
			</div>

            <!-- Publish Tenders Forms -->

			<form class="form-horizontal" action="publishtenders_insert.php" method="POST" id="publish" name="publish">
                        <div class="text-center ">
                            <span style="color:red;" id="ResultMsg"><h1></h1></span>
                        </div>
                       
                        <div class="col-md-6 col-sm-6 publoader">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name<span class="text-danger">*</span></label>
                                    <div>
                                        <input type="text" name="name" id="name" class="form-control" tabindex="1" placeholder="Name" required>
                                        <span id="nameerror" class="text-danger"></span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Organization Name<span class="text-danger">*</span></label>
                                    <div>
                                        <input type="text" name="org_name" id="org_name" class="form-control" tabindex="5"  required placeholder="Organization Name">
                                        <span id="org_namemsg" class="text-danger"></span>
                                    </div>
                                </div>

								<div class="form-group">
                                    <label>Contact No.<span class="text-danger">*</span></label>
                                    <div>
                                        <input type="text" name="tel_number" id="tel_number" class="form-control" required tabindex="8"  placeholder="Contact No" minlength=4>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                       
                        <div class="col-md-6 col-sm-6 ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email Id<span class="text-danger">*</span></label>
                                    <div>
                                        <input type="email" name="user_email_id"  tabindex="2"  id="user_email_id" class="form-control" placeholder="Email Id"
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"/>
                                        <span id="EmailMsg" required class="text-danger"></span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Country<span class="text-danger">*</span></label>
                                    <div>
                                    <select name="country" class="form-control">
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
                                        <span id="countrymsg" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Website<span class="text-danger">*</span></label>
                                    <div>
                                        <input type="text" name="website" id="website" class="form-control" tabindex="10"   placeholder="Website" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">    
                        <div class="form-group">
							<div class="col-md-offset-2 col-md-4 col-lg-4 col-xs-12">	
							<img src='captcha.php' class="img-responsive captcha_img">
							</div>
							<div class="col-md-4 col-lg-4 col-xs-12">
                  			<input type="text" class="form-control" name="code_captcha" id="code_captcha" placeholder="Enter Captcha" required>
                  			</div>
                  			</div>    
						</div>
                        <div class="col-md-12">
                            <div class="col-md-offset-2 col-md-4">
                                <div class="form-group" align="center">
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    
                                </div></div>
                                <div class="col-md-4">
                                <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>    
                                  </div>  
                                </div>
                            </div>
                    	</div>
                    </form>



		</div>
		</section>
		<!-- Publish Tenders End -->
</body>

<?php
	include('footer.php');
?>
