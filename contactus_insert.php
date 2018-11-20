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


    $name = $_POST["name"];
    $to_id = $_POST["email"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $username = 'info@goodtenders.com';  
    $email = 'info@goodtenders.com';                  
    $password = 'goodtenders@2018';
    $subject = 'Contact us - Goodtenders';
    
  
    $body_msg = '
                  <h2 style="color:#07b107;"><b>GoodTenders</b></h2>
                  <h3>Dear '.$name.',</h3>
                  <h3>Thank you for contacting. We will connect with you soon.</h3> 
                  <h3>Please send us an email to sales@goodtenders.com. One of our sales representative would get in touch with you soon.</h3>

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

    echo"";    
    } 
    else {
    echo "";
    } 


	$dt1=date("Y-m-d");
	$dt2=date("Y-m-d H:i:s");

	$query = "insert into `contactus`
        (name, email, phone, subject, message, date, timestamp) values ('$name','$to_id', 
        '$phone', '$subject','$message', '$dt1', '$dt2' )";
		$result = mysqli_query($conn,$query);

		if($result){
	
		echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#welcomeModal').modal('show');
				});
				</script>";
		}
		else
		{
      		echo "<script type='text/javascript'>
				$(document).ready(function(){
				$('#errorModal').modal('show');
				});
				</script>";
			
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
                	<h2><strong><span>We Will Contact You Soon</span></strong></h2><br> 
                	</div>
                	<div class="modal-footer" text-center> 
                	<button class="btn btn-login" style="float: right;margin-bottom: -30px;">Home</button>   
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
