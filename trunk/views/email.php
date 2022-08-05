<?php
		require("../PHPMailer_v5.1/class.phpmailer.php");
		//echo $to. "   ". $pass;
		$mail = new PHPMailer();
		$mail->IsSMTP(); // send via SMTP
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = ""; // SMTP username
		$mail->Password = ""; // SMTP password
		$webmaster_email = ""; //Reply to this email ID
		$email=''; // Recipients email ID
		$name= ''; // Recipient's name
		$mail->From = "";
		//$mail->FromName = "XXX";
		$mail->AddAddress("", "Display Name");
		//$mail->AddReplyTo("","Webmaster");
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