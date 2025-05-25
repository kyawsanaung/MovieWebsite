<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


require 'vendor/autoload.php';
require 'DbConfig.php'; // make sure $con is set here


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Handle session timeout only if user is logged in
if (isset($_SESSION['userId'])) {
    if (isset($_SESSION['LAST_ACTIVITY']) && isset($_SESSION['EXPIRE_TIME'])) {
        if (time() - $_SESSION['LAST_ACTIVITY'] > $_SESSION['EXPIRE_TIME']) {
            session_unset();
            session_destroy();
            header("Location: signup.php?session=expired");
            exit;
        } else {
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }
}





if (isset($_POST["register_btn"])) {
    

    // Registration Data
    $username = mysqli_real_escape_string($con, $_POST["txtReg_username"]);
    $password = mysqli_real_escape_string($con, $_POST["txtReg_password"]);
    $email = mysqli_real_escape_string($con, $_POST["txtReg_email"]);
    $Cpassword = mysqli_real_escape_string($con, $_POST["txtReg_confirm_password"]);

    // Password Match Check
    if ($password !== $Cpassword) {
        echo "<script>alert('Passwords do not match!'); window.location.href='signup.php';</script>";
        exit;
    }

    // Check if email already exists


    // Check if email already exists
    $stmt = $con->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        echo "<script>alert('Email already exists.'); window.location.href='signup.php';</script>";
        exit;
    }
    $stmt->close();



    // Generate verification token
    $token = bin2hex(random_bytes(50));

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    if (!$hashedPassword) {
        die("Password hashing failed.");
    }

    // Insert user into database
    $stmt = mysqli_prepare($con, "INSERT INTO users (username, email, password, verification_code) VALUES (?, ?, ?, ?)");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPassword, $token);
        if (!mysqli_stmt_execute($stmt)) {
            die("Database insert failed: " . mysqli_stmt_error($stmt));
        }
        mysqli_stmt_close($stmt);
    } else {
        die("Statement preparation failed: " . mysqli_error($con));
    }

    // Prepare verification email
    $verifyLink = "https://crazy-loops-dance.loca.lt/Movie/verify.php?token=$token";
    $subject = "Verify your email address";
    $message = "Hi $username,<br><br>Please click the following link to verify your email: <a href=\"$verifyLink\">Verify</a><br><br>Thank you!";

    // Send email using PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Host = $_ENV['SMTP_HOST'];
        $mail->Port = $_ENV['SMTP_PORT'];
        $mail->Username = $_ENV['SMTP_USERNAME'];
        $mail->Password = $_ENV['SMTP_PASSWORD'];
        $mail->setFrom($_ENV['SMTP_FROM_EMAIL'], $_ENV['SMTP_FROM_NAME']);

        $mail->addAddress($email, $username);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = strip_tags($message);

        $mail->send();
        echo "<script>alert('Verification email sent. Please check your inbox.'); window.location.href='signup.php';</script>";
        exit;
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}


if (isset($_POST['login_btn'])) {
    

    $email = mysqli_real_escape_string($con, $_POST['txtLogin_email']);
    $password = mysqli_real_escape_string($con, $_POST['txtLogin_password']);

    $stmt = $con->prepare("SELECT user_id, username, email, password, is_verified FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            // Check if account is verified
            if ($user['is_verified'] == 1) {
                $_SESSION['userId'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
        
                // Set session timeout duration (e.g., 30 minutes)
                $_SESSION['LAST_ACTIVITY'] = time(); // mark login time
                $_SESSION['EXPIRE_TIME'] = 60 * 60;  // 30 minutes in seconds
        
                // Redirect to index page
                header("Location: index.php");
                exit;
            } else {
                echo "<script>alert('Please check your email and verify your account before logging in.'); window.location.href='signup.php';</script>";
                exit;
            }
        }
         else {
            echo "<script>alert('Incorrect password.'); window.location.href='reset-password.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Account not found.'); window.location.href='signup.php';</script>";
        exit;
    }

    
}
include("partial/header.php");
ob_end_flush();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
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
    <div class="main">
        <div class="login_message_container">
            <img class="login_logo" src="images/NavLogo.png" alt="Logo">
            <h1 id="welcomeText">Welcome Back!</h1><br>
            <h2 id="welcomeText2">LOG IN NOW, Movies await you.</h2>
        </div>
        <div class="login_container">
            <center>
                <img class="login_logo" src="images/NavLogo.png" alt="Logo">
            </center>
            <form action="" method="post" class="login_form" id='login_form'>
                <input type="email" placeholder="  Email" class="login_input" required name = "txtLogin_email"><br>
                <input type="password" placeholder="  Password" class="login_input" required name = "txtLogin_password">
                <p class="forgot_pwd_link"><a href="reset-password.php">Forgot Password?</a></p>

                <center class="action_center">
                    <input type="submit" name="login_btn" class="login_input" value="LOG IN">
                    <p class="signup_link">Don't have an account? <a href="#" onclick="toggleForm()">Sign up</a> </p>
                </center>
            </form>
            <form action="" method="post" class="register_form" id='reg_form'>
                <input type="text" placeholder="  Username" name="txtReg_username" class="login_input" required><br>
                <input type="email" placeholder="  Email" name="txtReg_email" class="login_input" required><br>
                <input type="password" name="txtReg_password" placeholder="  Password" class="login_input" required>
                <input type="password" name="txtReg_confirm_password" placeholder=" Confirm Password"
                    class="login_input" required>

                <br>
                
                <center class="action_center">
                    <input type="checkbox" id="policy_check" required><label for="policy_check"> By checking this box
                        you agree to the <a href="#" style="color: white"> Terms of use and Privacy Policy.</a></label>
                    <input type="submit" name="register_btn" class="login_input" value="SIGN UP">
                    <p class="signup_link">Already have an account? <a href="#" onclick="toggleForm()">Log in</a> </p>
                </center>
            </form>
        </div>

    </div>
    <?php include("partial/footer.php"); ?>