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
    #captchaModal 
    {
      top: 100px;
      right: 100px;
      bottom: 0;
      left: 100px;
      overflow: auto;
    }
</style>

<?php
  session_start();
	require 'dbconnect.php';
  require 'phpmailer/PHPMailerAutoload.php';

	$name = $_POST["name"];
  $orgname = $_POST["org_name"];
	$phone = $_POST["tel_number"];
	$to_id = $_POST["user_email_id"];
  $country = $_POST["country"];
	$website = $_POST["website"];
  $dt=date("Y-m-d");

 
  if($_POST["code_captcha"]==$_SESSION['vercode'])
  {
    $username = 'info@goodtenders.com';  
    $email = 'info@goodtenders.com';                  
    $password = 'goodtenders@2018';
    $subject = 'Publish tenders - Goodtenders';
    
    
  $body_msg = '   <h2 style="color:#07b107;"><b>GoodTenders</b></h2>
                  <h3>Dear '.$name.',</h3> 
                  <h3>Thank you for connecting. We will connect with you soon.</h3>
                  <h3>Please send us an email to sales@goodtenders.com with the tender to be published so that we can inform you on the further formalities.</h3>
                  
                  <p>Best Regards<br>
                  Sales Team<br>
                  Good Tenders<br>
                  info@goodtenders.com<br>
                  sales@goodtenders.com<br>
                  +91 9867848333<br>
                  +912226 820 344</p>';

    $mail = new PHPMailer;

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

    $query = "insert into `tbl_publish_tenders`
        (name, orgname, phone, email, country, website, date) values ('$name','$orgname', 
        '$phone', '$to_id','$country', '$website' ,'$dt')";
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

  }else{
      echo "<script type='text/javascript'>
        $(document).ready(function(){
        $('#captchaModal').modal('show');
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
  </div> 
</div>  

<div class="modal fade" id="captchaModal" tabindex="-1" role="dialog" onclick="Redirect_Captcha()">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #35434e;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h2 class="modal-title" id="myModalLabel2">GoodTenders</h2>
                    <p style="color: #fff;">Best Tenders Portal</p>
                </div>
                <div class="modal-body text-center">
                  <h2><strong>Invalid Captcha !!!</strong></h2><br> 
                    <div class="modal-footer" text-center> 
                  <button class="btn btn-login" style="float: right;margin-bottom: -30px;">Try Again...</button> 
                </div>
          </div>
      </div>
</div>

		<script type="text/javascript">
			function RedirectY(){
				window.location="publishtenders.php";
			}
			function RedirectN(){
				window.location="publishtenders.php";
			}
			function Redirect_Captcha(){
        window.location="publishtenders.php";
      }
		</script>
