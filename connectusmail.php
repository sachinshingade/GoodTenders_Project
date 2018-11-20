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

// dbconnect 
require 'dbconnect.php';

// fetch query from user
if($_POST["code"]==$_SESSION['vercode'])
{
    if(!empty($_POST)){
    
    $query = $_POST['q'];
    
// explode & form query 
$kw = explode(" ", $query );
      $sql ="SELECT gt_id,short_description,tender_details,deadline FROM tbl_tenders WHERE short_description like '%" . $query . "%'";
      
     for($i = 1; $i < count($kw); $i++) {
        if(!empty($kw[$i])) {
            $sql .= " OR short_description like '%" . $kw[$i] . "%'";
        }
      }
      
      $sql .= " LIMIT 3";

// fire query over db 
$result = mysqli_query($conn , $sql);

// Return result as json

$anchors = "<table border='1' width='100%'>";
while($row = mysqli_fetch_assoc($result)) {
    $anchors .= "<tr> <td width='30%' align='center'> <b>Title :</b> </td> <td width='70%'> 
                <h4>". $row["short_description"]."</h4> </td><tr>
                 <tr> <td width='30%' align='center'> <b>Details :</b> </td> <td width='70%'>
                 <a href='http://94.130.142.174/contact.php'>".substr($row["tender_details"],0,300)."</a></td> </tr>
                 <tr> <td width='30%' align='center'> <b>Deadline :</b> </td> <td width='70%'><b><i>".date_format (new DateTime($row['deadline']), 'd-m-Y')."</i></b> </td> </tr>";
}
$anchors .= "</table>";
# print json_encode($row);
# echo $anchors;


// send mail of top 3 records using mail 
    require 'phpmailer/PHPMailerAutoload.php';

    $username = 'info@goodtenders.com';  
    $email = 'info@goodtenders.com';                  
    $password = 'goodtenders@2018';
    $subject = 'Connect us - Goodtenders';
    
    $name = $_POST['name'];
    $to_id = $_POST['mail_id'];                  
    //$message = $_POST['message'];

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

    } else {
    echo "Error in initialization";
    }
    // insert into the database

    $dt1=date("Y-m-d");
    $dt2=date("Y-m-d H:i:s");

    $query = "insert into `contactus`
        (name, email, phone, subject, message, date, timestamp) values ('$name','$to_id', 
        '', '','$query', '$dt1', '$dt2' )";
        $result = mysqli_query($conn,$query);

        if($result){
    
        echo "";
        }
        else
        {
            echo "Failed";
            
        }
     }
     else{
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
                    <h2><strong><span>Thank You For Connecting us</span></strong></h2><br> 
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
                window.location="index.php";
            }
            function RedirectN(){
                window.location="contact.php";
            }
            function Redirect_Captcha(){
                window.location="index.php";
            }
            
        </script>



