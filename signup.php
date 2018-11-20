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
$to_id = $_POST["email"];
$orgname = $_POST["orgname"];
$country = $_POST["country"];
$contact = $_POST["contact"];
$category= $_POST["category"];
$date=date("Y-m-d");
$timestamp=date("Y-m-d H:i:s");
$password = "";
  
if($_POST["code_captcha_signup"]==$_SESSION['vercode'])
{  
  // Function for auto-generating password 
  function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
  }

  $password = randomPassword();


  $user_check_query = "select email,country from tbl_users Where email='$to_id' AND country='$country' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

 
  if ($user['email'] == $to_id && $user['country']== $country) 
	{
      echo ("<script LANGUAGE='JavaScript'>
			window.alert('User already exist !!!');
			window.location.href='signform.php';
			</script>");
    }
	else
	{
		$query = "insert into `tbl_users`
        (name, email, password, orgname, country, contact, category, date, timestamp) values ('$name','$to_id', 
        '$password', '$orgname','$country', '$contact', '$category', '$date', '$timestamp')";
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


    $username = 'info@goodtenders.com';  
    $email = 'info@goodtenders.com';                  
    $password = 'goodtenders@2018';
    $subject = 'Register - Goodtenders';
    
  
    $body_msg = '
                  <h2 style="color:#07b107;"><b>GoodTenders</b></h2>
                  <h3>Dear '.$name.',</h3> 
                  <h3>Thank you for your registration.One of our sales representative will get in touch with you shortly to know your requirements and assist you further.</h3>
                  <h3>For any further information, please send us an email to sales@goodtenders.com</h3>
                  
                  <p>Best Regards<br>
                  Sales Team<br>
                  Good Tenders<br>
                  info@goodtenders.com<br>
                  sales@goodtenders.com<br>
                  +91 9867848333<br>
                  +912226 820 344</p>
                  ';

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
  }
    
  }else{
     echo "<script type='text/javascript'>
        $(document).ready(function(){
        $('#captchaModal').modal('show');
        });
        </script>";
  }  
  mysqli_close($conn);

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
                	<h2><strong><span>You Are Successfully Registered With Us.</span></strong></h2><br> 
                	<p>Login to Continue..</p><br>       
                	</div>
                	<div class="modal-footer" text-center> 
                	<button class="btn btn-login" style="float: right;margin-bottom: -30px;">Login</button>   
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
                	<h2><strong>Registration Failed!!!</strong></h2><br> 
                		<h3>Try Again...</h3><br>
                	<div class="modal-footer" text-center> 
                	<button class="btn btn-login" style="float: right;margin-bottom: -30px;">Register</button>   
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
				window.location="loginform.php";
			}
			function RedirectN(){
				window.location="signform.php";
			}
      function Redirect_Captcha(){
        window.location="signform.php";
      }
		</script>
