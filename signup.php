<?php include("partial/header.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <style>
        /* Apply this to your main HTML file */

        body {
            height: 100vh;
            background-image: url("images/Background.png");
            background-size: cover;
            /* Ensures the background covers the entire screen */
            background-position: center;
            /* Centers the image for responsiveness */
            background-repeat: no-repeat;
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
        <h1>Welcome Back!</h1><br>
        <h2>LOG IN NOW, Movies await you.</h2>
    </div>
    <div class="login_container">
        <center>
            <img class="login_logo" src="images/NavLogo.png" alt="Logo">
        </center>
        <form action="post" class="login_form">
            <input type="email" placeholder="  Email" class="login_input" required><br>
            <input type="password" name="" id="" placeholder="  Password" class="login_input" required>
            <p class="forgot_pwd_link"><a href="#">Forgot Password?</a></p>

            <center class="action_center">
                <input type="submit" name="" id="" class="login_input" value="LOG IN">
                <p class="signup_link">Don't have an account? <a href="#" onclick="">Sign up</a> </p>
            </center>
        </form>

    </div>
    </div>
    <?php include("partial/footer.php"); ?>