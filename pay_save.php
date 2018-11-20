<?php

	require 'dbconnect.php';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$company = $_POST['company'];
	$amount = $_POST['amount'];
	

	// Save data in tbl_payment and then redirect to paypal account 

	$sql = "insert into tbl_payment (name, email, company, amount) values('$name', '$email', '$company', '$amount')";
	$result = mysqli_query($conn,$sql);

	if($result){
		ob_start();
		header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=WWRJNNRL6SM6E");
	}else{
		header("Location:pay.php");
	} 

?>