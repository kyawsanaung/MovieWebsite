<?php
session_start();
include("DbConfig.php");

// Check if the token is provided in the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Query to find the user by token
    $query = "SELECT * FROM users WHERE verification_code = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $token);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // User found, update the user's verification status
        $user = mysqli_fetch_assoc($result);
        $userId = $user['user_id'];

        $updateQuery = "UPDATE users SET is_verified = 1, verification_code = NULL WHERE user_id = ?";
        $updateStmt = mysqli_prepare($con, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, "i", $userId);
        mysqli_stmt_execute($updateStmt);

        if (mysqli_stmt_affected_rows($updateStmt) > 0) {
            $_SESSION['message'] = "Your email has been successfully verified! You can now log in.";
            header("Location: signup.php");
            exit;
        } else {
            $_SESSION['error_message'] = "There was an issue verifying your email. Please try again.";
            header("Location: signup.php");
            exit;
        }
    } else {
        $_SESSION['error_message'] = "Invalid verification link.";
        header("Location: signup.php");
        exit;
    }
} else {
    $_SESSION['error_message'] = "No verification token provided.";
    header("Location: signup.php");
    exit;
}
?>
