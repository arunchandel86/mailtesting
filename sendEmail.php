<?php


$name = $_POST['fullname'];
$email = $_POST['email'];
$skype = $_POST['skype'];
$pesciprovider = $_POST['pesciprovider'];
$course = $_POST['course'];
$date = $_POST['date-details-dropdown'];
$time = $_POST['time-details-dropdown'];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);


$mail->Host = "smtp.example.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "arun.chandel86@gmail.com";
$mail->Password = "password@";

$email_from = 'info@dnapesci.com';
$email_subject = 'DNA PESCI - Expression of Interest';

$mail->setFrom($email_from , $name);
$mail->addAddress("dave@example.com", "Dave");

$mail->Subject = $email_subject;

$email_body = "Thank you $name for your interest in DNA PESCI Course.\n"  ;  


$mail->Body = $email_body;

$mail->send();

header("Location: sent.html");



/*
$to = $email;


$headers = "From:  $email_from \r\n";
$headers .= "Reply-To: $email \r\n";

mail($to, $email_subject, $email_body, $headers);
/*
if(mail($to, $subject, $email_body, $headers)){
    echo 'An email has been sent to you successfully. We have received your expression of interest, please check your email to complete your enrolment. \n ';
} else{
    echo 'Unable to send email. Please try again.';
}
*/
//header("Location: index.html"); 
?>
