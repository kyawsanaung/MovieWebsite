
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
    <div class="carousel">
        <div class="list-moive">
            <div class="movie active">
                <img src="images/New folder/poster.jpg" alt="poster" class="img-poster">
                <div class="content">
                    <div class="title"><h1>GUARDIANS OF THE GALAXY Vol-2</h1></div>
                    <div class="status"><h3> Now Showing</h3></div>                
                
                
                <div class="buttons">
                    <button><i class="fa-solid fa-circle-play fa-2x" id="playBtn"></i></button><label for="">TRAILER</label>
                    <button><i class="fa-solid fa-ticket fa-2x" id="ticketBtn"></i></button><label for="">GET TICKET NOW</label>
                </div>
                </div>
            </div>
            
            <div class="movie" >
                <img src="images/New folder/poster1.jpg" alt="poster"  class="img-poster">
                <div class="content">
                    <div class="title"><h1>John Wick</h1></div>
                    <div class="status"><h3> Now Showing</h3></div>                
                
                
                <div class="buttons">
                    <button><i class="fa-solid fa-circle-play fa-2x" id="playBtn"></i></button><label for="playBtn">TRAILER</label>
                    <button><i class="fa-solid fa-ticket fa-2x" id="ticketBtn"></i></button><label for="ticketBtn">GET TICKET NOW</label>
                </div>
                </div>
            </div>

            <div class="movie" >
                <img src="images/New folder/poster3.jpg" alt="poster"  class="img-poster">
                <div class="content">
                    <div class="title"><h1>JAWS</h1></div>
                    <div class="status"><h3> Now Showing</h3></div>                
                
                
                <div class="buttons">
                    <button><i class="fa-solid fa-circle-play fa-2x" id="playBtn"></i></button><label for="playBtn">TRAILER</label>
                    <button><i class="fa-solid fa-ticket fa-2x" id="ticketBtn"></i></button><label for="ticketBtn">GET TICKET NOW</label>
                </div>
                </div>
            </div>

            <div class="movie" >
                <img src="images/New folder/poster4.jpg" alt="poster"  class="img-poster">
                <div class="content">
                    <div class="title"><h1>DUNE</h1></div>
                    <div class="status"><h3> Now Showing</h3></div>                
                
                
                <div class="buttons">
                    <button><i class="fa-solid fa-circle-play fa-2x" id="playBtn"></i></button><label for="playBtn">TRAILER</label>
                    <button><i class="fa-solid fa-ticket fa-2x" id="ticketBtn"></i></button><label for="ticketBtn">GET TICKET NOW</label>
                </div>
                </div>
            </div>
        </div>

        <div class="arrows">
        <button id="prev"><</button>
        <button id="next">></button>
        </div>

        <div class="thumbnail">
            <div class="item active">
                <img src="images/New folder/thumbnail1.jpg" alt="">
                <div class="movie-name">GOTG Vol-2</div>
            </div>

            <div class="item">
                <img src="images/New folder/thumbnail2.jpg" alt="">
                <div class="movie-name">John Wick</div>
                
            </div>

            <div class="item">
                <img src="images/New folder/thumbnail3.jpg" alt="">
                <div class="movie-name">JAWS</div>
            </div>

            <div class="item">
                <img src="images/New folder/thumbnail4.jpg" alt="">
                <div class="movie-name">DUNE</div>
            </div>
        </div>
    </div>

<?php include("partial/footer.php"); ?>