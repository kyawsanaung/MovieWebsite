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
      });
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
    }, 150);
  });
});

// Toggle the navigation menu
const mobileMenu = document.getElementById('mobile-menu');
const navLinks = document.querySelector('.nav-links');

if (mobileMenu && navLinks) {
  mobileMenu.addEventListener('click', () => {
    navLinks.classList.toggle('active');
  });
}
