<?php
require_once('DbConfig.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure Composer autoload is included

function generateOTP($length = 6) {
    return substr(str_shuffle('0123456789'), 0, $length);
}

function sendOTP($otp, $con) {

    $email = $_POST['txt_reset_email'];
    $subject = "Reset your password";
    $message = "Hello <br><br>Your OTP code is: <strong>$otp</strong><br><br>Thank you!";

    $stmt = $con->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows == 0) {
        echo "<script>alert('User do not exist.'); window.location.href='reset-password.php';</script>";
        exit;
    }
    $stmt->close();

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username = 'kyawsanaung2911@gmail.com';
        $mail->Password = 'aaeh cuxm bski njts'; // Note: Replace with App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('cineplanet@example.com', 'CinePlanetMovie');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = strip_tags($message);

        $mail->send();
        $_SESSION['OTP'] = $otp;
        $_SESSION['OTP_EXPIRY'] = time() + 300; // valid 5 mins
        header("Location: verifyOTP.php");

    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}
if (isset($_POST['OTP_btn'])) {
    $email = $_POST['txt_reset_email'];
    $_SESSION['email'] = $email;
    sendOTP(generateOTP(), $con);  
}

include('partial/header.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        /* Apply this to your main HTML file */

        body {
            background-image: url("images/Background.png");
            background-size: cover;
            /* Ensures the background covers the entire screen */
            background-position: center;
            /* Centers the image for responsiveness */
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* Optional: Makes background stay while scrolling */
            align-items: center;
            height: 100vh;
            color: white;
        }
    </style>
</head>
<body>
        <div class="login_container">
            <center>
                <img class="login_logo" src="images/NavLogo.png" alt="Logo">
            </center>
            <form action="reset-password.php" method="post" class="login_form">
                <center><p>Enter Your email to recover your password!</p></center>
                <input type="email" placeholder="  Email" class="login_input" required name = "txt_reset_email"><br>
                

                <center class="action_center">
                    <input type="submit" name="OTP_btn" class="login_input" value="GET OTP">                   
                </center>
            </form>
        </div>

<?php
include('partial/footer.php');
?>