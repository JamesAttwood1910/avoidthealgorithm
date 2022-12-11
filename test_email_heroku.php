<?php  

require("vendor/autoload.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$phpmailer = new PHPMailer(true);

try {
  // Configure SMTP
  $phpmailer->isSMTP();
  $phpmailer->SMTPAuth = true;
  $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

  // ENV Credentials
	$phpmailer->Host = 'smtp.mailtrap.io';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 2525;
	$phpmailer->Username = 'a4f4cf01388d47';
	$phpmailer->Password = 'a353a30da17f8d';

  // Mail Headers
  $phpmailer->setFrom("avoidthealgorithm@gmail.com", "Mailer");
  // Change to recipient email. Make sure to use a real email address in your tests to avoid hard bounces and protect your reputation as a sender.
  $phpmailer->addAddress("attwood1910@gmail.com", "Recipient");

  // Message
  $phpmailer->isHTML(true);
  $phpmailer->Subject = "Mailer To Go Test";
  $phpmailer->Body    = "<b>Hi</b>\nTest from Mailer To Go 😊\n";
  $phpmailer->AltBody = "Hi!\nTest from Mailer To Go 😊\n";

  // Send the Email
  $phpmailer->send();
  echo "Message has been sent";
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
}













?>