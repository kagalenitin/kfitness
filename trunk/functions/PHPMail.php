<?php
class PHPMail{
	public static function sendEMailConfirmation($to, $pass){
				require("PHPMailer_v5.1/class.phpmailer.php");
				//echo $to. "   ". $pass;
			    $mail = new PHPMailer();
				$mail->IsSMTP(); // send via SMTP
				$mail->SMTPAuth = true; // turn on SMTP authentication
				$mail->Username = "kagalenitin"; // SMTP username
				$mail->Password = ""; // SMTP password
				$webmaster_email = "kagalenitin@gmail.com"; //Reply to this email ID
				$email= $to; // Recipients email ID
				$mail->From = "kagalenitin@gmail.com";
				//$mail->FromName = "XXX";
				$mail->AddAddress($to, $_REQUEST["firstname"]." ".$_REQUEST["lastname"]);
				//$mail->AddReplyTo("kagalenitin@gmail.com","Webmaster");
				$mail->WordWrap = 50; // set word wrap
				$mail->IsHTML(true); // send as HTML
				$mail->Subject = "KFitness Webmaster";
				$mail->Body = "This is a confirmation email from KFitness. Your default password is set to ".$pass. " . 
					Please use the Email and this password next time to login.";
				//$mail->SMTPDebug = 2; 
				if(!$mail->Send()){
				   //echo 'Message was not sent.';
				   //echo 'Mailer error: ' . $mail->ErrorInfo;
				   return false;
				}
				else
				{
					return true;
				   //echo 'Thank you for your feedback.';
				}
							
		}
}
?>