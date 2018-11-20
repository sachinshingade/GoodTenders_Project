<link rel="stylesheet" media="all" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/colors/green-style.css" rel="stylesheet">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
	#myModalLabel1, #myModalLabel2{
		color:#07b107;
		font-weight: bold; 
	}
	#welcomeModal 
	{
   		top: 100px;
   		right: 100px;
   		bottom: 0;
   		left: 100px;
   		overflow: auto;
   	}
   	#errorModal 
	{
   		top: 100px;
   		right: 100px;
   		bottom: 0;
   		left: 100px;
   		overflow: auto;
   	}
</style>

<?php

   require 'dbconnect.php';
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $previous = $_SERVER['HTTP_REFERER'];

      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM tbl_users WHERE email = '$email' and password = '$password' LIMIT 1";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $name = $row['name'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {

      session_start();

      $_SESSION["id"] = $row["id"];
      $_SESSION['name'] = $row['name'];     
      
      if(!empty($_POST["remember"])) {
        setcookie ("email",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
      } else {
        if(isset($_COOKIE["email"])) {
          setcookie ("email","");
        }
        if(isset($_COOKIE["password"])) {
          setcookie ("password","");
        }
      } 
		  
        echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#welcomeModal').modal('show');
				});
				</script>";
		  
		  //echo "<script>$('#thankyouModal').modal('show')</script>";

		  
		 }
		 else {
		  
         echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#errorModal').modal('show');
				});
				</script>";
			}
		}
			
?>
			
		<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" onclick="RedirectY()">
    		<div class="modal-dialog">
        		<div class="modal-content">
            		<div class="modal-header text-center" style="background-color: #35434e;">
                		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                		<h2 class="modal-title" id="myModalLabel1">GoodTenders</h2>
                		<p style="color: #fff;">Best Tenders Portal</p>
            		</div>
            		<div class="modal-body text-center">
                	<h2>Hello <strong><span><?php echo $name;?>,</span></strong></h2><br> 
                		<h3>Welcome to GoodTenders</h3>
                	<p>Browse Tenders From Every Sector</p><br>       
                	</div>
                	<div class="modal-footer" text-center> 
                	<button class="btn btn-login" style="float: right;margin-bottom: -30px;">Proceed</button>   
        		</div>
    		</div>
		</div>
	</div>

		<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" onclick="RedirectN()">
    		<div class="modal-dialog">
        		<div class="modal-content">
            		<div class="modal-header text-center" style="background-color: #35434e;">
                		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                		<h2 class="modal-title" id="myModalLabel2">GoodTenders</h2>
                		<p style="color: #fff;">Best Tenders Portal</p>
            		</div>
            		<div class="modal-body text-center">
                	<h2><strong>Your Details Are Incorrect!!!</strong></h2><br> 
                		<h3>Try Again...</h3><br>
                	<div class="modal-footer" text-center> 
                	<button class="btn btn-login" style="float: right;margin-bottom: -30px;">Login</button>   
        		</div>
    		</div>
		</div>

		<script type="text/javascript">
			function RedirectY(){
        document.location.href='<?php echo $previous; ?>';
      }
			function RedirectN(){
				window.location="loginform.php";
			}
		</script>
