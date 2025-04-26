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