<?php include("partial/header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cinema</title>

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f9f9f9;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #8F87F1;
    }
  </style>
</head>

<body>
  <h1>CINEMAS</h1>

  <!-- Search Bar -->
  <div class="search-container">
    <button class="search-btn"><i class="fas fa-search"></i></button>
    <input type="text" id="searchInput" placeholder="Search cinemas..." />
  </div>

  <!-- Cinema Cards -->
  <div id="cinemaList" class="cinema-list"></div>


 <script src="searchjs.js"></script>


<?php include("partial/footer.php");
?>