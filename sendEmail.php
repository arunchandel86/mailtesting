<?php


$name = $_POST['fullname'];
$email = $_POST['email'];
$skype = $_POST['skype'];
$pesciprovider = $_POST['pesciprovider'];
$course = $_POST['course'];
$date = $_POST['date-details-dropdown'];
$time = $_POST['time-details-dropdown'];



$email_from = 'info@dnapesci.com';
$email_subject = 'DNA PESCI - Expression of Interest'

$email_body = "Thank you $name for your interest in DNA PESCI Course.\n"
              "You have selected $course course starting on $date at $time. \n "
              "Please pay enrolment amount into the following account.  \n "
              "Account Name: DNA PESCI  \n "
              "BSB:   \n "
              "Account No:   \n "
              "Please note that your enrolment confirmation will be sent to you in your email once the course fee is processed. \n" 
              "we will contact you on your skype id [$skype] to add you into the group. \n" 
              "Thanks again for choosing DNA PESCI $course course. \n"
              "We wish you the very best for your interview and hope to join you soon. \n\n"
              "Warm regards, \n"
              "Admin \n" 
              "DNA PESCI \n"
              ;  

$to = $email;


$headers = "From:  $email_from \r\n";
//$headers .= "Reply-To: $email \r\n";

mail($to, $email_subject, $email_body, $headers);

if(mail($to, $subject, $email_body, $headers)){
    echo 'An email has been sent to you successfully. We have received your expression of interest, please check your email to complete your enrolment. \n ';
} else{
    echo 'Unable to send email. Please try again.';
}

header("Location: index.html");
?>