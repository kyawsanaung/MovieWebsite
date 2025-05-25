document.addEventListener('DOMContentLoaded', function () {
  const isMobile = () => window.innerWidth <= 768;

  function setupAccordion() {
    if (!isMobile()) return;

    document.querySelectorAll('.accordion-toggle').forEach(toggle => {
      if (!toggle.hasAttribute('data-listener')) {
        toggle.addEventListener('click', function () {
          const content = toggle.nextElementSibling;
          content.classList.toggle('show');
          toggle.classList.toggle('open');
        });
        toggle.setAttribute('data-listener', 'true');
      }
    });
  }

  function changeInfobar() {
    const infobar = document.getElementById('infoLogo');
    if (!infobar) return;

    infobar.innerHTML = isMobile()
      ? 'Stories Orbit the Globe.'
      : 'CinePlanet: Where Stories Orbit the Globe.';
  }

  function resetAccordionOnDesktop() {
    if (!isMobile()) {
      document.querySelectorAll('.accordion-toggle').forEach(toggle => {
        const content = toggle.nextElementSibling;
        content.classList.remove('show');
        toggle.classList.remove('open');
        closeBtn.classList.remove('active');
      });
    }
  }
  function hideCloseBtn(){
    if(!isMobile()){
    closeBtn.classList.remove('active');
    navLinks.classList.remove('active');
    console.log("closed");
    }
    else{ closeBtn.classList.add('active');
    console.log("wtf");
     }
  }

  // Run on load
  setupAccordion();
  changeInfobar();

  // Re-run on resize with debounce
  let resizeTimeout;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
      setupAccordion();
      changeInfobar();
      resetAccordionOnDesktop();
      hideCloseBtn();
    }, 150);
  });
});

// Toggle the navigation menu
const mobileMenu = document.getElementById('mobile-menu');
const navLinks = document.querySelector('.nav-links');
const closeBtn = document.querySelector('.close_nav-bar');

if (mobileMenu && navLinks) {
  mobileMenu.addEventListener('click', () => {
    navLinks.classList.add('active');
    closeBtn.classList.add('active');
    console.log("Opened");
  });
}

function toggleForm(){
  const loginForm = document.getElementById('login_form');
  const registerForm = document.getElementById('reg_form');
  const welcomeTxt = document.getElementById('welcomeText');
  const welcomeTxt2 = document.getElementById('welcomeText2');
  console.log('clicked');

  loginForm.classList.toggle("active");
  registerForm.classList.toggle("active");

  if (loginForm.classList.contains("active")) {
    welcomeTxt.textContent = "Join us today!";
    welcomeTxt2.textContent = "Create your account! Let’s get started.";
  } else {
    
    welcomeTxt.textContent = "Welcome back!";
    welcomeTxt2.textContent = "LOG IN NOW, Movies await you.";
    
  }
}

function closeNav(){
  navLinks.classList.remove('active');
  closeBtn.classList.remove('active');
}

let movies = document.querySelectorAll('.movie');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let thumbnail = document.querySelectorAll('.thumbnail .item');

// config param
let countItem = movies.length;
let itemActive = 0;
console.log('countItem');
// event next btn
next.onclick = function() {
  itemActive += 1;
  if (itemActive >= countItem) {
    itemActive = 0;
  }
  showSlide();
  
}

// event prev btn
prev.onclick = function() {
  itemActive -= 1;
  if (itemActive < 0) {
    itemActive = countItem - 1;
  }
  showSlide();
  
}

// function to show slide
function showSlide() {
  // remove old active 
  let movieActiveOld = document.querySelector('.movie.active');
  let thumbnailActiveOld = document.querySelector('.thumbnail .item.active');
  
  if (movieActiveOld) movieActiveOld.classList.remove('active');
  if (thumbnailActiveOld) thumbnailActiveOld.classList.remove('active');

  // add active to new
  movies[itemActive].classList.add('active');
  thumbnail[itemActive].classList.add('active');

  clearInterval(refreshInterval);
  refreshInterval = setInterval(() => {
    next.click();
}, 5000);
}
// thumbnail click funtion
thumbnail.forEach((thumbnail, index) => {
  thumbnail.addEventListener('click', () =>{
    itemActive = index;
    showSlide();
  })
});

// auto run
let refreshInterval = setInterval(() => {
    next.click();
}, 5000);

function openPopup(videoUrl) {
  // Get the popup and iframe elements
  const popup = document.getElementById("popup");
  const iframe = document.getElementById("videoFrame");


  // Check if the video URL is a YouTube URL
  if (videoUrl.includes("youtube.com") || videoUrl.includes("youtu.be")) {
    // Add autoplay=1 to the embed URL
    if (!videoUrl.includes("?")) {
      videoUrl += "?autoplay=1&mute=0&controls=0";
    } else {
      videoUrl += "&autoplay=1&mute=0&controls=0";
    }
  }
  // Set the iframe's src to the provided video URL
  iframe.src = videoUrl;

  // Show the popup
  popup.style.display = "flex";

  // Prevent scrolling on the body (optional: add class for no-scroll functionality)
  document.body.classList.add('no-scroll');
}

function closePopup() {
  // Get the popup and iframe elements
  const popup = document.getElementById("popup");
  const iframe = document.getElementById("videoFrame");

  // Stop the video by setting the iframe src to an empty string or resetting the URL
  iframe.src = ''; // Clear the iframe to stop video playback

  // Hide the popup
  popup.style.display = "none";

  // Enable scrolling again on the body
  document.body.classList.remove('no-scroll');
}

let slideIndex = 1;
let newsInterval;
const slideshow = document.querySelector('.slideshow-container');

showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");

  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    slides[i].classList.remove("fade-in");
  }

  for (let i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex - 1].style.display = "block";
  slides[slideIndex - 1].classList.add("fade-in");
  dots[slideIndex - 1].className += " active";

  resetInterval();
}

function resetInterval() {
  clearInterval(newsInterval);
  newsInterval = setInterval(() => {
    plusSlides(1);
  }, 5000);
}

resetInterval();

// Pause on hover
slideshow.addEventListener('mouseenter', () => {
  clearInterval(newsInterval);
});
slideshow.addEventListener('mouseleave', () => {
  resetInterval();
});

// Swipe gestures for mobile
let startX = 0;

slideshow.addEventListener('touchstart', (e) => {
  startX = e.touches[0].clientX;
});

slideshow.addEventListener('touchend', (e) => {
  let endX = e.changedTouches[0].clientX;
  let deltaX = endX - startX;

  if (deltaX > 50) {
    plusSlides(-1);
  } else if (deltaX < -50) {
    plusSlides(1);
  }
});
