<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pesci_user_database";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }


$name = $_POST["name"];

$email = $_POST['email'];
$skype = $_POST['skypeid'];
$pesciprovider = $_POST['pesciprovider'];
$course = $_POST['course'];
$date = $_POST['date-details-dropdown'];
$time = $_POST['time-details-dropdown'];

if ($course == "course1") {
    $course = "16 Days Course";
}

if ($course == "course2") {
    $course = "4 Days Course";
}

if ($course == "course3") {
    $course = "Mock Test";
}

$latest_id = 0;
$sql = "SELECT MAX(id) from user_info";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // Retrieve first row of result set
    $row = mysqli_fetch_assoc($result);
    // Store id in variable
    $latest_id = $row['id'];
    // Print email
    echo "id: " . $latest_id;
  } else {
    echo "Not found.";
  }

  // payment logic
 $payment_logic = true;

 //if($payment_logic)
 //{
  // Increase the id
$new_id = $latest_id + 1;
$payment_status = 'N';

$sql = "INSERT INTO user_info (
                                id
                               ,name
                               ,email
                               ,skypeid
                               ,pesci_provider
                               ,course_name
                               ,start_date
                               ,start_time
                               ,payment_statusid)
                     VALUES
                     ('$new_id','$name', '$email', '$skype', '$pesciprovider', '$course', '$date', '$time', '$payment_status')";

if (mysqli_query($conn, $sql)) {
  echo "Data inserted successfully!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close MySQL connection
mysqli_close($conn);


$email_from = 'info@contact-check1.000webhostapp.com';
$email_subject = 'DNA PESCI - Expression of Interest';
$email_subject2 = "DNA PESCI - Expression of Interest from user $email";

$message1 = "\n
              Thank you $name for your interest in DNA PESCI Course.\n
              You have selected $course  starting on $date at $time. \n 
              Please pay enrolment amount into the following account.  \n 
              Account Name: DNA PESCI  \n 
              BSB:   \n 
              Account No:   \n 
              Please note that your enrolment confirmation will be sent to you in your email once the course fee is processed. \n 
              we will contact you on your skype id [$skype] to add you into the group. \n
              Thanks again for choosing DNA PESCI $course. \n
              We wish you the very best for your interview and hope to join you soon. \n\n
              Warm regards,
              Admin 
              DNA PESCI "
;
$message2 = "\n
              Thank you $name for your interest in DNA PESCI Course.\n
              You have selected $course  starting on $date at $time. \n 
              Please provide us with your available dates by emailing us at info.dnapesci@gmail.com. \n
              Please pay enrolment amount into the following account.  \n 
              Account Name: DNA PESCI  \n 
              BSB:   \n 
              Account No:   \n 
              Please note that your enrolment confirmation will be sent to you in your email once the course fee is processed. \n 
              we will contact you on your skype id [$skype] to add you into the group. \n
              Thanks again for choosing DNA PESCI $course. \n
              We wish you the very best for your interview and hope to join you soon. \n\n
              Warm regards,
              Admin 
              DNA PESCI "
;


if ($course == "Mock Test") {
    $email_body = $message2;
} else {
    $email_body = $message1;
}

$to = $email;
$to2 = 'arun.chandel86@gmail.com';

$email_body2 = "\n
                $name has submitted enrolment form for interest in DNA PESCI Course.\n
                Email Id : $email. \n
                selected course : $course. \n 
                selected date & Time: $date at $time. \n 
                PESCI Provider : $pesciprovider. \n 
                Skype Id : $skype . \n 
                ";


$headers = "From:  $email_from \r\n";
$headers .= "Reply-To: $email_from \r\n";
$headers2 = "From:  $email_from \r\n";

$result1 = mail($to, $email_subject, $email_body, $headers);
$result2 = mail($to2, $email_subject2, $email_body2, $headers2);

if ($result1 && $result2) {
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Basic HTML File</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    </head>
    <body>
        <div class='card position-absolute top-50 start-50 translate-middle text-primary bg-light mb-4 border-light' style='width: 300px; height:auto;'  >
        
        <i class='fa-solid fa-circle-check fa-beat card-img-top text-primary' aria-hidden='true' style='font-size: 100px;margin-right: 10px; text-align: center; margin-top:40px;'></i>
        <div class='card-body text-center'>
            <h5 class='card-title'>Email Sent</h5>
            <p class='card-text'>An email has been sent to you successfully. We have received your expression of interest, please check your email to complete your enrolment.</p>
            <p>Page will Redirect to home page in 10 secs..</p>
            <p id='countdown' style='font-size: 50px'></p>
            <p>If not then click below</p>
            <a href='https://contact-check1.000webhostapp.com/' class='btn btn-primary'>Back to Website</a>
        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymou'></script>
    <script
          src='https://kit.fontawesome.com/1489f57607.js'
          crossorigin='anonymous'
        ></script>
        <script type='text/javascript' language='JavaScript'>
        setTimeout(function () {
                          location.href = 'https://contact-check1.000webhostapp.com/'; 
                   }, 10000);
                   
                   const countdown = document.getElementById('countdown');
    
    for (let i = 10; i >= 0; i--) {
      setTimeout(() => {
        countdown.textContent = i;
      }, (10 - i) * 1000);
    }
    
    </script>
    
    
    
    
    </body>
    </html> 
        ";
} else {
    echo
        "
    
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Basic HTML File</title>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
</head>
<body>
    <div class='card position-absolute top-50 start-50 translate-middle text-danger bg-light mb-4 border-light' style='width: 300px;'  >
    
    <i class='fa-solid  fa fa-frown-o fa-beat card-img-top text-danger' aria-hidden='true' style='font-size: 100px;margin-right: 10px; text-align: center; margin-top:40px;'></i>
    <div class='card-body text-center'>
        <h5 class='card-title'>Oh Fish!</h5>
        <p class='card-text'>Unable to send Email, please try again later.</p>
        <a href='https://contact-check1.000webhostapp.com/' class='btn btn-danger'>Back to Website</a>
    </div>
</div>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymou'></script>
<script
      src='https://kit.fontawesome.com/1489f57607.js'
      crossorigin='anonymous'
    ></script>
</body>
</html> 
    ";
}

 //}

?>