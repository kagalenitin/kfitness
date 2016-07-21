<?php
		require("../PHPMailer_v5.1/class.phpmailer.php");
		//echo $to. "   ". $pass;
		$mail = new PHPMailer();
		$mail->IsSMTP(); // send via SMTP
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "kagalenitin"; // SMTP username
		$mail->Password = "hari2728"; // SMTP password
		$webmaster_email = "kagalenitin@gmail.com"; //Reply to this email ID
		$email='hectomaniaster@gmail.com'; // Recipients email ID
		$name= 'Nitin Kagale'; // Recipient's name
		$mail->From = "kagalenitin@gmail.com";
		//$mail->FromName = "XXX";
		$mail->AddAddress("hectomaniaster@gmail.com", "Display Name");
		//$mail->AddReplyTo("kagalenitin@gmail.com","Webmaster");
		$mail->WordWrap = 50; // set word wrap
		$mail->IsHTML(true); // send as HTML
		$mail->Subject = "KFitness Webmaster";
		$mail->Body = "This is the mail from KFitness. Please login using ".$pass. " password.";
		$mail->SMTPDebug = 2; 
		if(!$mail->Send()){
		   echo 'Message was not sent.';
		   echo 'Mailer error: ' . $mail->ErrorInfo;
		}
		else
		{
		   echo 'Thank you for your feedback.';
		}
?>