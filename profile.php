<?php
include('partial/header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color:rgb(218, 218, 218);
        }
    </style>
</head>

<body>
    <div class="profile-container">
        <div class="Profile-header">
            <table>
                <tr>
                    <td>
                        <div class="profile-icon"><?php echo htmlspecialchars($firstLetter) ?></div>
                    </td>
                    <td>
                        <div class="profile-info">
                            <h1> <?php echo $_SESSION['username']; ?> </h1>
                            <h3> <?php echo $_SESSION['email']; ?> </h3>
                            <button>Edit Profile</button> 
                            <button class="topUP">Top up</button>
                        </div>
                    </td>
                </tr>

            </table>


        </div>

        <div class="profile-detail">
            <table>
                <tr>
                    <td><i class="fa-solid fa-wallet fa-2x"></i></td>
                    <td><strong>Balance : 1000 MMK</strong>
                <br><a href=""><p>Top up your Balance</p></a></td>
                </tr>

                <tr>
                    <td><i class="fa-solid fa-ticket fa-2x"></i></td>
                    <td><strong>My Tickets</strong>
                    <br><a href=""><p>Check your tickets</p></a></td>
                </tr>

                <tr>
                    <td><i class="fa-solid fa-shield-halved fa-2x"></i></td>
                    <td><strong>Privacy Policy</strong>
                    <br><a href=""><p>Privacy Policy</p></a></td>
                </tr>

                <tr>
                    <td><i class="fa-solid fa-circle-info fa-2x"></i></td>
                    <td><strong>About Us</strong>
                    <br><a href=""><p>More about us</p></a></td>
                </tr>

                <tr>
                    <td><i class="fa-solid fa-right-from-bracket fa-2x"></i></td>
                    <td><strong>Log out</strong>
                    <br><a href="logout.php"><p>See you soon</p></a></td>
                </tr>
            </table>
            
        </div>

        <div class="profile-footer"><img src="images/NavLogo.png" alt=""></div>
    </div>


    <?php
    include('partial/footer.php');
    ?>