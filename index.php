<?php include("partial/header.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Movie Website</title>
    <style>
        body {
            background-color: #0a0a0a;
            font-family: 'Helvetica Neue', sans-serif;
            color: #fff;
            margin: 0;
        }
    </style>
</head>

<body>
    <section id="nowShowing">
        <div class="carousel">
            <div class="list-moive">
                <div class="movie active">
                    <img src="images/New folder/poster.jpg" alt="poster" class="img-poster">
                    <div class="content">
                        <div class="title">
                            <h1>GUARDIANS OF THE GALAXY Vol-2</h1>
                        </div>
                        <div class="status">
                            <h3> Now Showing</h3>
                        </div>


                        <div class="buttons">
                            <button><i class="fa-solid fa-circle-play fa-2x" id="playBtn"
                                    onclick="openPopup('https://www.youtube.com/embed/u3V5KDHRQvk?si=i-0eQ4UQJMlH0yPk')"></i></button><label
                                for="">TRAILER</label>
                            <button><i class="fa-solid fa-ticket fa-2x" id="ticketBtn"></i></button><label for="">GET
                                TICKET NOW</label>
                        </div>
                    </div>
                </div>

                <div class="movie">
                    <img src="images/New folder/poster1.jpg" alt="poster" class="img-poster">
                    <div class="content">
                        <div class="title">
                            <h1>John Wick</h1>
                        </div>
                        <div class="status">
                            <h3> Now Showing</h3>
                        </div>


                        <div class="buttons">
                            <button><i class="fa-solid fa-circle-play fa-2x" id="playBtn"
                                    onclick="openPopup('https://www.youtube.com/embed/qEVUtrk8_B4?si=J9jYK3o46IDWNvvy')"></i></button><label
                                for="playBtn">TRAILER</label>
                            <button><i class="fa-solid fa-ticket fa-2x" id="ticketBtn"></i></button><label
                                for="ticketBtn">GET TICKET NOW</label>
                        </div>
                    </div>
                </div>

                <div class="movie">
                    <img src="images/New folder/poster3.jpg" alt="poster" class="img-poster">
                    <div class="content">
                        <div class="title">
                            <h1>JAWS</h1>
                        </div>
                        <div class="status">
                            <h3> Now Showing</h3>
                        </div>


                        <div class="buttons">
                            <button><i class="fa-solid fa-circle-play fa-2x" id="playBtn"
                                    onclick="openPopup('https://www.youtube.com/embed/YIhxgIZJSbk?si=cE_ihKz9Z0Qh7JX_')"></i></button><label
                                for="playBtn">TRAILER</label>
                            <button><i class="fa-solid fa-ticket fa-2x" id="ticketBtn"></i></button><label
                                for="ticketBtn">GET TICKET NOW</label>
                        </div>
                    </div>
                </div>

                <div class="movie">
                    <img src="images/New folder/poster4.jpg" alt="poster" class="img-poster">
                    <div class="content">
                        <div class="title">
                            <h1>DUNE</h1>
                        </div>
                        <div class="status">
                            <h3> Now Showing</h3>
                        </div>


                        <div class="buttons">
                            <button><i class="fa-solid fa-circle-play fa-2x" id="playBtn"
                                    onclick="openPopup('https://www.youtube.com/embed/n9xhJrPXop4?si=8cGcLdumUyeLjiIb')"></i></button><label
                                for="playBtn">TRAILER</label>
                            <button><i class="fa-solid fa-ticket fa-2x" id="ticketBtn"></i></button><label
                                for="ticketBtn">GET TICKET NOW</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="arrows_right">
                <button class="arrows_button" id="prev">&#10094;</button>
            </div>
            <div class="arrows_left">
                <button class="arrows_button" id="next">&#10095;</button>
            </div>

            <div class="thumbnail">
                <div class="item active">
                    <img src="images/New folder/thumbnail1.jpg" alt="">
                </div>

                <div class="item">
                    <img src="images/New folder/thumbnail2.jpg" alt="">
                </div>

                <div class="item">
                    <img src="images/New folder/thumbnail3.jpg" alt="">
                </div>

                <div class="item">
                    <img src="images/New folder/thumbnail4.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- pop TRAILER up -->
        <div class="popup-overlay" id="popup">
            <div class="popup-content">
                <button class="close-btn" onclick="closePopup()">×</button>
                <iframe id="videoFrame" src="" frameborder="0" allowfullscreen
                    allow="autoplay; encrypted-media"></iframe>
            </div>
        </div>

    </section>
    <section id="upcomingMovie" class="upcomingMovie">
        <h1 class="Coming_soon_font">Coming Soon to Cineplanet Theatres</h1>
        <br>
        <div class="Coming_soon_container">
            <div class="ComingSoon_card">
                <img src="images/New folder/thumbnail1.jpg" alt="">
                <button onclick="openPopup('https://www.youtube.com/embed/u3V5KDHRQvk?si=i-0eQ4UQJMlH0yPk')"><i
                        class="fa-solid fa-play" class="playIcon"></i></button>
                <a href="#">
                    <h2>Movie1</h2>
                </a>
            </div>
            <div class="ComingSoon_card">
                <img src="images/New folder/thumbnail2.jpg" alt="">
                <button onclick="openPopup('https://www.youtube.com/embed/qEVUtrk8_B4?si=J9jYK3o46IDWNvvy')"><i
                        class="fa-solid fa-play" class="playIcon"></i></button>
                <a href="#">
                    <h2>Movie2</h2>
                </a>
            </div>
            <div class="ComingSoon_card">
                <img src="images/New folder/thumbnail3.jpg" alt="">
                <button onclick="openPopup('https://www.youtube.com/embed/YIhxgIZJSbk?si=cE_ihKz9Z0Qh7JX_')"><i
                        class="fa-solid fa-play" class="playIcon"></i></button>
                <a href="#">
                    <h2>Movie3</h2>
                </a>
            </div>
            <div class="ComingSoon_card">
                <img src="images/New folder/thumbnail4.jpg" alt="">
                <button onclick="openPopup('https://www.youtube.com/embed/n9xhJrPXop4?si=8cGcLdumUyeLjiIb')"><i
                        class="fa-solid fa-play" class="playIcon"></i></button>
                <a href="#">
                    <h2>Movie4</h2>
                </a>
            </div>
        </div>







    </section>

    <section class="News">
        
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="images/New folder/POSTER.png" > 
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="images/New folder/POSTER1.png" >    
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="images/New folder/POSTER2.jpg" >    
                </div>

                <a class="Newsprev" onclick="plusSlides(-1)">❮</a>
                <a class="Newsnext" onclick="plusSlides(1)">❯</a>

                <div class = "dotsNews" style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
            </div>
            <br>

            

    </section>
    <script src="javascript.js"></script>
    <?php include("partial/footer.php"); ?>