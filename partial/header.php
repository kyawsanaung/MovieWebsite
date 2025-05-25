<?php
    include('DbConfig.php');
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <title>CinePlanet: Orbiting Around Awesome Movies.</title>
  <link rel="stylesheet" href="style.css">
</head>

<!-- Start of header  -->
<header>

  <body>
   
    <nav class="infobar">
      <div class="logo" id="infoLogo">CinePlanet: Where Stories Orbit the Globe.</div>
      <ul class="info-links">
        <li><a href="#">Help</a></li>
        <li><a href="#">gift cards</a></li>
        <li><a href="#">Find a Theater</a></li>
      </ul>
    </nav>
    <nav class="navbar">

      <div class="menu-toggle" id="mobile-menu">
        <i class="fa-solid fa-ellipsis-vertical fa-2x"></i>
      </div>

      <div class="logo"><a href="index.php"><img src="images/NavLogo.png" alt="Logo"></a></div>
      <ul class="nav-links">
        <button onclick="closeNav()" class="close_nav-bar"><i class="fa-solid fa-xmark"></i></button>
        <li><a href="#">
            <p>MOVIES</p>
          </a></li>
        <li><a href="#">
            <p>EVENTS</p>
          </a></li>
        <li><a href="Cinema.php">
            <p>CINEMAS</p>
          </a></li>
        <li class="getTicket_li">
          <div class="ticket_icon2" id="ticket"><svg xmlns="http://www.w3.org/2000/svg" width="2em" height="100%"
              fill="currentColor" viewBox="0 0 25 24" class="mb-1 mr-2 w-6">
              <path
                d="M23.473 16.761c-.124-.506-.447-.857-.76-1.096a3.73 3.73 0 0 0-.962-.492 1.049 1.049 0 0 1-.66-.729c-.085-.343.01-.691.232-.938.208-.232.456-.532.624-.89.167-.356.282-.815.158-1.32l-.23-.902c-.246-.964-1.203-1.553-2.157-1.319l-2.105.516 1.106-1.85a1.815 1.815 0 0 0-.617-2.482l-.78-.479a1.888 1.888 0 0 0-1.303-.226 3.58 3.58 0 0 0-1.023.337.972.972 0 0 1-.967-.05 1.038 1.038 0 0 1-.489-.838 3.758 3.758 0 0 0-.187-1.074c-.131-.38-.373-.79-.816-1.054l-.788-.477a1.765 1.765 0 0 0-2.441.608L1.852 14.469a1.823 1.823 0 0 0 .608 2.483l.78.48c.445.273.921.29 1.314.233a3.323 3.323 0 0 0 1.03-.349.972.972 0 0 1 .967.05c.3.185.471.498.486.83-.005.25-.105.494-.27.668-.217.235-.465.536-.632.893-.177.359-.298.829-.165 1.332l.214.876a1.794 1.794 0 0 0 2.16 1.328l14.05-3.453a1.79 1.79 0 0 0 1.298-2.185l-.22-.894ZM10.608 2.798a.247.247 0 0 1 .348-.086l.787.477c.034.02.096.082.154.24.06.168.093.38.097.628a2.57 2.57 0 0 0 1.233 2.1c.768.472 1.68.488 2.43.122.22-.11.42-.179.594-.202.165-.022.245-.003.28.026l.78.48c.122.075.16.228.086.352l-1.863 3.118-6.776-4.16 1.85-3.095ZM4.32 16.133c-.165.021-.247-.007-.28-.027l-.78-.48a.255.255 0 0 1-.086-.352l5.072-8.5 5.952 3.654-8.486 2.09a1.794 1.794 0 0 0-1.3 2.175l.219.895c.035.144.086.275.153.393a2.44 2.44 0 0 1-.464.152Zm3.654 5.652a.258.258 0 0 1-.312-.192l-.214-.875c-.011-.046-.014-.131.062-.284.052-.099.128-.213.215-.32.051-.061.1-.13.16-.193a2.562 2.562 0 0 0 .674-1.879c-.013-.169-.015-.331-.057-.503a2.568 2.568 0 0 0-1.646-1.817c-.229-.088-.43-.173-.57-.282-.137-.1-.175-.177-.186-.222l-.22-.894a.258.258 0 0 1 .188-.314l8.326-2.05 1.222-.3 1.903 7.767-9.545 2.358Zm14.059-3.455-3.513.86-1.906-7.775 3.478-.852a.258.258 0 0 1 .311.192l.23.9c.012.046.014.132-.053.282a2.487 2.487 0 0 1-.367.51 2.595 2.595 0 0 0 1.043 4.177c.227.08.42.175.559.275.138.1.175.177.187.223l.228.892c.017.148-.063.283-.197.316Z">
              </path>
            </svg>
            GET TICKETS
          </div>
        </li>
        <!-- <li><a href="#">Showtimes</a></li> -->
      </ul>
      <div class="icons">
        <form action="" method="post">
          <div class="search_box">
            <div class="row">
              <button class="bsearch" name="btnsearch"><i class="fa fa-search"></i></button>
              <input type="text" placeholder="Search..." autocomplete="off" class="search" id="search" required
                name="search">
            </div>

          </div>
        </form>
        <div class="ticket_icon" id="ticket"><svg xmlns="http://www.w3.org/2000/svg" width="2em" height="100%"
            fill="currentColor" viewBox="0 0 25 24" class="mb-1 mr-2 w-6">
            <path
              d="M23.473 16.761c-.124-.506-.447-.857-.76-1.096a3.73 3.73 0 0 0-.962-.492 1.049 1.049 0 0 1-.66-.729c-.085-.343.01-.691.232-.938.208-.232.456-.532.624-.89.167-.356.282-.815.158-1.32l-.23-.902c-.246-.964-1.203-1.553-2.157-1.319l-2.105.516 1.106-1.85a1.815 1.815 0 0 0-.617-2.482l-.78-.479a1.888 1.888 0 0 0-1.303-.226 3.58 3.58 0 0 0-1.023.337.972.972 0 0 1-.967-.05 1.038 1.038 0 0 1-.489-.838 3.758 3.758 0 0 0-.187-1.074c-.131-.38-.373-.79-.816-1.054l-.788-.477a1.765 1.765 0 0 0-2.441.608L1.852 14.469a1.823 1.823 0 0 0 .608 2.483l.78.48c.445.273.921.29 1.314.233a3.323 3.323 0 0 0 1.03-.349.972.972 0 0 1 .967.05c.3.185.471.498.486.83-.005.25-.105.494-.27.668-.217.235-.465.536-.632.893-.177.359-.298.829-.165 1.332l.214.876a1.794 1.794 0 0 0 2.16 1.328l14.05-3.453a1.79 1.79 0 0 0 1.298-2.185l-.22-.894ZM10.608 2.798a.247.247 0 0 1 .348-.086l.787.477c.034.02.096.082.154.24.06.168.093.38.097.628a2.57 2.57 0 0 0 1.233 2.1c.768.472 1.68.488 2.43.122.22-.11.42-.179.594-.202.165-.022.245-.003.28.026l.78.48c.122.075.16.228.086.352l-1.863 3.118-6.776-4.16 1.85-3.095ZM4.32 16.133c-.165.021-.247-.007-.28-.027l-.78-.48a.255.255 0 0 1-.086-.352l5.072-8.5 5.952 3.654-8.486 2.09a1.794 1.794 0 0 0-1.3 2.175l.219.895c.035.144.086.275.153.393a2.44 2.44 0 0 1-.464.152Zm3.654 5.652a.258.258 0 0 1-.312-.192l-.214-.875c-.011-.046-.014-.131.062-.284.052-.099.128-.213.215-.32.051-.061.1-.13.16-.193a2.562 2.562 0 0 0 .674-1.879c-.013-.169-.015-.331-.057-.503a2.568 2.568 0 0 0-1.646-1.817c-.229-.088-.43-.173-.57-.282-.137-.1-.175-.177-.186-.222l-.22-.894a.258.258 0 0 1 .188-.314l8.326-2.05 1.222-.3 1.903 7.767-9.545 2.358Zm14.059-3.455-3.513.86-1.906-7.775 3.478-.852a.258.258 0 0 1 .311.192l.23.9c.012.046.014.132-.053.282a2.487 2.487 0 0 1-.367.51 2.595 2.595 0 0 0 1.043 4.177c.227.08.42.175.559.275.138.1.175.177.187.223l.228.892c.017.148-.063.283-.197.316Z">
            </path>
          </svg>
          GET TICKETS
        </div>
        <?php
        if (isset($_SESSION['userId']) && isset($_SESSION['username'])) {
          // Get the first letter of the username, make it uppercase
          $firstLetter = strtoupper(substr($_SESSION['username'], 0, 1));
          ?>
          <button class="icon profile-initial" onclick="window.location.href='profile.php';">
           <?php echo htmlspecialchars($firstLetter); ?>  
          </button>
        <?php
        } else { ?>
          <button class="icon" onclick="window.location.href='signup.php';">
            <i class="fa-regular fa-user fa-2x"></i>
          </button>
          <?php
        }
        ?>



      </div>
    </nav>
</header>
<!-- End of header  -->