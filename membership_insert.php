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

  $plan = $_POST["plan"];
	$name = $_POST["name"];
  $to_id = $_POST["emailid"];
  $orgname = $_POST["orgname"];
  $orgaddr = $_POST["orgaddr"];
  $city = $_POST["city"];
  $country = $_POST["country"];
	$phone = $_POST["contact_number"];
	$website = $_POST["website"];
  $services = $_POST["services"];
  $geo_pre = $_POST["geo_pre"];


  $username = 'info@goodtenders.com';  
  $email = 'info@goodtenders.com';                  
  $password = 'goodtenders@2018';
  $subject = 'Membership - Goodtenders';
    
    
  $body_msg = '    
                  <h2 style="color:#07b107;"><b>GoodTenders</b></h2>
                  <h3>Dear '.$name.',</h3> 
                  <h3>Thank you for showing your interest in Plan '.$plan.'</h3>
                  <h3>One of our sales representative will get in touch with you shortly.</h3>
                  
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

    $query = "insert into `tbl_membership`
        (plan, name, emailid, org_name, org_address, city, country, contact, website, product_services, geographical) values ('$plan', '$name', '$to_id', '$orgname', '$orgaddr', '$city', '$country', '$phone',
          '$website', '$services', '$geo_pre')";
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
                	<h2><strong><span>Thank for being a member of GoodTenders</span></strong></h2><br> 
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
				window.location="membership.php";
			}
			
		</script>
