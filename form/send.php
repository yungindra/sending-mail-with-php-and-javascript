<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

// if(isset($_POST['submit']))
if (isset($_POST['firstName'], $_POST['lastName'], $_POST['title'], $_POST['email'], $_POST['message'])) 
{
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $firstName       = $_POST['firstName'];
    $lastName     = $_POST['lastName'];
    $title    = $_POST['title'];
    $email              = $_POST['email'];
    $message             = $_POST['message'];

    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('', 'Testing');
    $mail->addAddress($email, $firstName);     // Add a recipient
    
    $mail->addReplyTo('', 'Testing');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Capitalize the firstName
    $first_Name = ucfirst($firstName);

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'New message from ' . $first_Name;
    $mail->Body = '<h1>Hello, ' . $title . ' ' . $first_Name . '</h1>' . 
                  '<p><b>First Name:</b> ' . $firstName . '</p>' . 
                  '<p><b>Last Name:</b> ' . $lastName . '</p>' . 
                  '<p><b>Email:</b> ' . $email . '</p>' . 
                  '<p><b>Message:</b> ' . $message . '</p>';
    

    if($mail->send())
    {
        header("location:../success.php") ;
    }
    else{
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else{
    echo "Press the button";
}
