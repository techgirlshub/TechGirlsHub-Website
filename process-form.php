<?php
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$name =htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$budget =htmlspecialchars($_POST['budget']);
$service = htmlspecialchars($_POST['service']);
$details = htmlspecialchars($_POST['details']);


$mail = new PHPMailer(true);

try {
    // Server settings for your email service
    $mail->isSMTP();
    $mail->Host = 'mail.techgirlshub.co.za';    // Specify your SMTP server here (e.g., smtp.gmail.com for Gmail)
    $mail->SMTPAuth = true;
    $mail->Username = 'admin@techgirlshub.co.za'; // Your SMTP username (email address)
    $mail->Password = 'Root96void23.';         // Your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;                        // Usually 587 for TLS

    // Recipients
    $mail->setFrom('no-reply@techgirlshub.com', 'TechGirlsHub'); // Your email and name
    $mail->addAddress($email, $name);                              // Send the confirmation to the client's email

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Service Request Confirmation - TechGirlsHub';

    // HTML body
    $mail->Body = '
        <div style="font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 20px; color: #333;">
            <div style="background-color: :#007bff; padding: 20px; text-align: center; border-radius: 10px;">
                <h2 style="color: #fcfcfc;">Thank You for Your Request!</h2>
            </div>
            <div style="padding: 20px; background-color: #ffffff; border: 1px solid #e4e4e4; border-radius: 10px; margin-top: 10px;">
                <p>Dear ' . htmlspecialchars($name) . ',</p>
                <p>Thank you for reaching out to us. We have received your request for the service <strong>' . htmlspecialchars($service) . '</strong>.</p>
                <p><strong>Details of Your Request:</strong></p>
                <ul>
                    <li><strong>Phone:</strong> ' . htmlspecialchars($phone) . '</li>
                    <li><strong>Budget:</strong> ' . htmlspecialchars($budget) . '</li>
                    <li><strong>Additional Details:</strong> ' . htmlspecialchars($details) . '</li>
                </ul>
                <p>We will be in touch shortly with more information. Feel free to contact us if you have any further questions.</p>
                <p>Best regards, <br> <strong>TechGirlsHub Team</strong></p>
            </div>
            <div style="text-align: center; font-size: 12px; color: #777; margin-top: 20px;">
                <p>&copy; 2024 TechGirlsHub. All rights reserved.</p>
                <p><a href="http://techgirlshub.co.za" style="color: #007bff; text-decoration: none;">Visit our website</a></p>
            </div>
        </div>
    ';

    // Send the email
    $mail->send();

    // Display SweetAlert2 success message and redirect
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
            Swal.fire({
                title: 'Your request has been submitted successfully!',
                text: 'Expect feedback soon!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'requestForm.html'; // Redirect to form page or another page
                }
            });
          </script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
