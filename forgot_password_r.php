<?php
session_start();
?>
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
  require 'phpmailer/PHPMailerAutoload.php';


    if(isset($_POST) & !empty($_POST)){
      $fpemail = $_POST['fpemail'];
      $username = mysqli_real_escape_string($conn, $_POST['fpemail']);
      $sql = "SELECT * FROM `tbl_users` WHERE email = '$fpemail'";
      $res = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($res);
      if($count == 1){

      while($row = mysqli_fetch_array($res)){
        $name = $row["name"];
        $to_id = $row["email"];
        $fpassword = $row["password"];
      }  
      
      $username = 'info@goodtenders.com';  
      $email = 'info@goodtenders.com';                  
      $password = 'goodtenders@2018';
      $subject = 'Forgot Password - Goodtenders';
    
  
    $body_msg = '
                  <h2 style="color:#07b107;"><b>GoodTenders</b></h2>
                  <h3>Dear '.$name.',</h3>
                  <h3>Please use this password to login:- '.$fpassword.'</h3>

                  <p>Best Regards<br>
                  Sales Team<br>
                  Good Tenders<br>
                  info@goodtenders.com<br>
                  sales@goodtenders.com<br>
                  +91 9867848333<br>
                  +912226 820 344</p>';

    $mail = new PHPMailer();

    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';

    $mail->Port = 465;

    $mail->SMTPSecure = 'ssl';

    $mail->SMTPAuth = true;

    $mail->Username = $username;

    $mail->Password = $password;

    $mail->setFrom('info@goodtenders.com', 'Good Tenders');

    $mail->addReplyTo('info@goodtenders.com', 'Good Tenders');

    $mail->AddCC('info@goodtenders.com');
    
    $mail->addAddress($to_id);

    $mail->Subject = $subject;

    $mail->msgHTML($body_msg);

    if (!$mail->send()) {
        echo "<script type='text/javascript'>
        $(document).ready(function(){
        $('#errorModal').modal('show');
        });
        </script>";    
    } 
    else {
        echo "<script type='text/javascript'>
        $(document).ready(function(){
        $('#welcomeModal').modal('show');
        });
        </script>";
    } 

    }else{
        echo "<div class='container' style='margin-top:15%;'>
              <div class='jumbotron text-center'>
              <h2 style='color:#07b107';>GoodTenders</h2><br>
              <h3>User Login Credentials does not exist in database</h3><br>
              <a href='index.php' class='btn btn-info text-center'>Try again with your login id</a>
              </div></div>
              ";
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
                	<h2><strong><span>We Have Sent You Mail Regarding Your Login Credentials</span></strong></h2><br> 
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
                	<h2><strong>There's Something Problem</strong></h2><br> 
                		<h3>Try Again...</h3><br>
                	<div class="modal-footer" text-center> 
                	<button class="btn btn-login" style="float: right;margin-bottom: -30px;">Contact us</button>   
        		</div>
    		</div>
		</div>

		<script type="text/javascript">
			function RedirectY(){
				window.location="index.php";
			}
			function RedirectN(){
				window.location="contact.php";
			}
			
		</script>
