<?php
require_once ('DbConfig.php');
session_start();
$message = '';
$reset = false;
$error = '';

// OTP Verification
if (isset($_POST['verify_btn'])) {
    $user_otp = $_POST['otp'] ?? '';

    if (!isset($_SESSION['OTP']) || !isset($_SESSION['OTP_EXPIRY'])) {
        $message = "OTP not found. Please request a new one.";
    } elseif (time() > $_SESSION['OTP_EXPIRY']) {
        $message = "OTP has expired. Please request a new one.";
        $goback = "<a href='reset-password.php'>Get OTP again</a>";
        unset($_SESSION['OTP'], $_SESSION['OTP_EXPIRY']);
    } elseif ($user_otp == $_SESSION['OTP']) {
        $message = "✅ OTP verified successfully!";
        unset($_SESSION['OTP'], $_SESSION['OTP_EXPIRY']);
        $reset = true;
    } else {
        $message = "❌ Invalid OTP. Please try again.";
    }
}

// Password Reset
if (isset($_POST['reset_btn'])) {
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $Cpassword = mysqli_real_escape_string($con, $_POST['Confirm_password']);

    if ($password !== $Cpassword) {
        $error = "Passwords do not match!";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $email = $_SESSION['email'];

        $stmt = mysqli_prepare($con, "UPDATE users SET password = ? WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $email);

        if (mysqli_stmt_execute($stmt)) {
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                $message = "✅ Password updated successfully.";
                unset($_SESSION['email']);
                $reset = false;
            } else {
                $error = "⚠️ No user found or password already the same.";
            }
        } else {
            $error = "❌ Failed to update password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 40px;
        }
        .container {
            text-align: center;
            background: white;
            padding: 30px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            justify-content: center;
        }
        input[type="text"], input[type="password"] {
            width: 70%;
            padding: 10px;
            margin-top: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .message {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (!$reset) { ?>
            <h2>Enter OTP</h2>
            <form method="post">
                <input type="text" name="otp" id="otp" maxlength="6" required placeholder="OTP Code">
                <input type="submit" name="verify_btn" value="Verify OTP">
            </form>
            <?php if ($message): ?>
                <div class="message"><?= htmlspecialchars($message) ?>
                    <br>
                    <?= isset($goback) ? $goback : ''; ?>
                    <a href='signup.php'>Log in &laquo;&laquo;</a>
                </div>
            <?php endif; ?>
        <?php } else { ?>
            <h2>Reset Password</h2>
            <form method="post">
                <input type="password" name="password" required placeholder="Enter new password">
                <input type="password" name="Confirm_password" required placeholder="Confirm new password">
                <input type="submit" name="reset_btn" value="Reset password">
            </form>
            <?php if ($message): ?>
                <div class="message" style="color: green;"><?= htmlspecialchars($message) ?></div>
                
            <?php endif; ?>
            <?php if ($error): ?>
                <div class="message" style="color: red;"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
        <?php } ?>
    </div>
</body>
</html>
