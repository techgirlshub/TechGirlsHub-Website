<?php

session_start();//create a session for each user and use the session states

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php'; //Import PHPMailer
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['submitContact']))
{

        //use htmlspecialchars to prevent cross-site scripting and propper handling of special characters
        $yourname = htmlspecialchars($_POST['yourname']);
        $email = htmlspecialchars($_POST['email']);
        $phonenumber = htmlspecialchars($_POST['phonenumber']);;
        $message= htmlspecialchars($_POST['message']);

        $requestCallback =  isset($_POST['requestCallback']) ? 'Yes' : 'No';
       
        // Do your email processing here, such as sending the email
            
        //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                            //Enable verbose debug output
                $mail->isSMTP();                                                   //Send using SMTP
                $mail->SMTPAuth   = true;                                         //Enable SMTP authentication

                $mail->Host       = 'mail.techgirlshub.co.za';                    //Set the SMTP server to send through
                $mail->Username   = 'testaccount3@techgirlshub.co.za';            //SMTP username        
                $mail->Password   = 'TestAccount3';                              //SMTP password                            
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;             //Enable implicit TLS encryption
                $mail->Port       = 587;                                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('testaccount3@techgirlshub.co.za', 'TechGirlsHub - Test Account 3');
                $mail->addAddress('testaccount3@techgirlshub.co.za');
            
                //$mail->addAddress($email, $yourname);     //Add a recipient

                //Content
                $mail->isHTML(true);                                            //Set email format to HTML

                // Set the email subject
                $mail->Subject = 'New Contact Us Form Submission';

                // HTML email content
                $mail->Body = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f4f4f4;
                            margin: 0;
                            padding: 20px;
                        }
                        .container {
                            background-color: #ffffff;
                            border-radius: 8px;
                            box-shadow: 0 0 10px rgba(0,0,0,0.1);
                            padding: 20px;
                            max-width: 600px;
                            margin: 0 auto;
                        }
                        .header {
                            background-color: #007bff;
                            color: white;
                            padding: 10px;
                            text-align: center;
                            border-radius: 8px 8px 0 0;
                        }
                        .content {
                            padding: 20px;
                            font-size: 16px;
                            line-height: 1.5;
                            color: #333;
                        }
                        .footer {
                            margin-top: 20px;
                            text-align: center;
                            color: #999;
                            font-size: 14px;
                        }
                        .footer a {
                            color: #007bff;
                            text-decoration: none;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="header">
                            <h2>New Contact Us Form Submission</h2>
                        </div>
                        <div class="content">
                            <p>Hello,</p>
                            <p>You have received a new message from the contact form on your website. Here are the details:</p>
                            <p><strong>Name:</strong> ' . $yourname . '</p>
                            <p><strong>Email:</strong> ' . $email . '</p>
                            <p><strong>Phone Number:</strong> ' . $phonenumber . '</p>
                            <p><strong>Message:</strong> ' . nl2br($message) . '</p>
                            <p><strong>Request to callback:</strong> ' . nl2br($requestCallback) . '</p>
                            <p>Best regards,<br>Your Website</p>
                        </div>
                        <div class="footer">
                            <p>&copy; 2024 Your Website. All rights reserved.</p>
                            <p><a href="https://yourwebsite.com">Visit our website</a></p>
                        </div>
                    </div>
                </body>
                </html>
                ';

                // Send the email to the admin
        if ($mail->send()) {
            // Now send a no-reply email to the user
            $mail->clearAddresses(); // Clear the previous recipient
            $mail->addAddress($email, $name); // Add the user's email
            
            // Set the subject for the user email
            $mail->Subject = 'Thank You for Your Feedback';
            $mail->Body = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 20px;
                    }
                    .container {
                        background-color: #ffffff;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0,0,0,0.1);
                        padding: 20px;
                        max-width: 600px;
                        margin: 0 auto;
                    }
                    .header {
                        background-color: #007bff;
                        color: white;
                        padding: 10px;
                        text-align: center;
                        border-radius: 8px 8px 0 0;
                    }
                    .content {
                        padding: 20px;
                        font-size: 16px;
                        line-height: 1.5;
                        color: #333;
                    }
                    .footer {
                        margin-top: 20px;
                        text-align: center;
                        color: #999;
                        font-size: 14px;
                    }
                    .footer a {
                        color: #007bff;
                        text-decoration: none;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <h2>Thank You for your Contact Us Request</h2>
                    </div>
                    <div class="content">
                        <p>Hello ' . $yourname . ',</p>
                        <p>Thank you for reaching out to us. We have received your enquiry. One of our team members will get back to you shortly.</p>
                        <p>Best regards,<br>TechGirlsHub</p>
                    </div>
                    <div class="footer">
                        <p>&copy; 2024 Your Website. All rights reserved.</p>
                        <p><a href="https://techgirlshub.co.za">Visit our website</a></p>
                    </div>
                </div>
            </body>
            </html>
            ';

            // Send the no-reply email to the user
            $mail->setFrom('no-reply@techgirlshub.co.za', 'TechGirlsHub - No Reply'); // Set no-reply address
            if ($mail->send()) {
                $_SESSION['status'] = "Your enquiry has been submitted!";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit(0);
            } else {
                $_SESSION['status'] = "Feedback Response could not be sent to the user. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $_SESSION['status'] = "Feedback could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } catch (Exception $e) {
        echo "Feedback could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // After processing, redirect to the main page
    header("Location: contactUs.php");
    exit;
}
?>