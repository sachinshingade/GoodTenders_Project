<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="google-site-verification" content="PI-ZP6ua4nWrRzz9ZBRHSIioHv3CgSlf9FWicBdYJ5s" />
    <title>  Statistics + Excel & Tableau | Statistics training by rocky sir | best statistics classes in mumbai | Suven Consultants | Data science training </title>
  <link rel="shortcut icon" href="newimage/favicon.ico" type="image/x-icon">
  <link rel="icon" href="newimage/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/digi_main.css">
  
</head>
<body>
<?php

// send mail of top 3 records using mail 
    require 'phpmailer/PHPMailerAutoload.php';

    $username = 'vs181715@gmail.com';  
    $email = 'vs181715@gmail.com';                  
    $password = 'vips645482';
    $subject = 'Contact us - Suven Consultants & Technology Pvt. Ltd.';
    
    $name = $_POST['name'];
	$mobile = $_POST['mobile'];
    $to_id = $_POST['mail_id'];                  
    $purpose = $_POST['purpose'];

    $body_msg = '
                <h2 style="color:#07b107;"><b>GoodTenders</b></h2>
                <h3>Dear '.$name.',</h3> 
                <h3>Thank you for connecting. Please find below a few sample tenders for the keywords you entered.</h3>
                <h3>Please send us an email to sales@goodtenders.com so that we can provide you more sample live tenders matching to your business.</h3>
                ';
    $body_msg.= $anchors;

    $body_msg.= '
                <p>Best Regards<br>
                  Sales Team<br>
                  Good Tenders<br>
                  info@goodtenders.com<br>
                  sales@goodtenders.com<br>
                  +91 9867848333<br>
                  +912226 820 344</p>    
                ';

    $mail = new PHPMailer();

    $mail->isSMTP();

    $mail->SMTPAuth = true; 

    $mail->SMTPSecure = 'ssl';

    $mail->Host = 'smtp.gmail.com';

    $mail->Port = 465;

    $mail->Username = $username;

    $mail->Password = $password;

    $mail->setFrom('info@goodtenders.com', 'Good Tenders');

    $mail->addReplyTo('info@goodtenders.com', 'Good Tenders');

    $mail->AddCC('info@goodtenders.com');

    $mail->addAddress($to_id);

    $mail->IsHTML(true);    

    $mail->Subject = $subject;

    $mail->msgHTML($body_msg);

    if (!$mail->send()) {

    echo"<script type='text/javascript'>
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
	
	
?>	
</body>
</html>