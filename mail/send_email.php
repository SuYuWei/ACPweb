<?php
	include "PHPMailer_5.2.4/class.phpmailer.php"; // include the class name
	
	if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
	$C_name = $_POST['name'];
	$C_email = $_POST['email'];
	$C_tel = $_POST['phone'];
	$C_message = $_POST['message'];

	$mail = new PHPMailer(); 		// create a new object
	$mail->IsSMTP(); 				// enable SMTP
	//$mail->SMTPDebug = 1; 			// debugging: 1 = errors and messages, 2 = messages only
	//$mail->SMTPAuth = true; 		// authentication enabled
	//$mail->SMTPSecure = 'ssl'; 		// secure transfer enabled REQUIRED for GMail
	
	$mail->Host = "airmail.aircom4u.com";	//Gamil的SMTP主機 
	//$mail->Port = 443; 				// or 587
	$mail->IsHTML(true);
	$mail->Username = "info@aircom4u.com";		//Gamil帳號
	$mail->Password = "AIN888168";					//Gamil密碼
	$mail->SetFrom($C_email);						//回覆
	$mail->AddAddress("joseph.su@aircom4u.com");		//收件者郵件及名稱  

	$mail->CharSet = "utf-8";
	$mail->Subject  = $C_name;				//郵件標題
	$mail->Body     = "Name: ".$C_name."<br />E-mail: ".$C_email."<br />Phone: ".$C_tel."<br />Message: ".$C_message;				//郵件內容
	 if(!$mail->Send()){
	    echo "Mailer Error: " . $mail->ErrorInfo;
	}
	else{
	    echo "Message has been sent";
	}
?>