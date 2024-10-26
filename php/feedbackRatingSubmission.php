
<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['feedbackRatingSubmission'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $rating = htmlspecialchars($_POST['rating']);
    $message = htmlspecialchars($_POST['comment']);

    // Create an instance of PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->SMTPAuth   = true;
        $mail->Host       = 'mail.techgirlshub.co.za';
        $mail->Username   = 'admin@techgirlshub.co.za';
        $mail->Password   = 'TestAccount1';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        // Email to admin
        $mail->setFrom('admin@techgirlshub.co.za', 'TechGirlsHub - Test Account 1');
        $mail->addAddress('admin@techgirlshub.co.za'); // Add admin email

        // Set the email subject
        $mail->Subject = 'New Feedback Form Submission';

        // HTML email content for the admin
        $mail->isHTML(true);
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
                    <h2>New Feedback & Rating Form Submission</h2>
                </div>
                <div class="content">
                    <p>Hello,</p>
                    <p>You have received a new comment & rating from the feedback form on your website. Here are the details:</p>
                    <p><strong>Submitted By:</strong> ' . $name . '</p>
                    <p><strong>Email:</strong> ' . $email . '</p>
                    <p><strong>Comment:</strong> ' . nl2br($message) . '</p>
                    <p><strong>Rating:</strong> ' . $rating . '</p>
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
                        <h2>Thank You for Your Feedback</h2>
                    </div>
                    <div class="content">
                        <p>Hello ' . $name . ',</p>
                        <p>Thank you for reaching out to us. We have received your feedback and rating, we will take your suggestions under consideration.</p>
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
                $_SESSION['status'] = "Your feedback has been submitted!";
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
    header("Location: ../feedbackRating.php");
    exit;
}
?>
