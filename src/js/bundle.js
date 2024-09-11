import $ from 'jquery';

window.addEventListener('load', function () {
  $('body').removeClass('no-js').addClass('js');
});

// vendor
// import './vendor/lite-yt-embed';
// import './vendor/lite-vimeo-embed';

import './components/navToggle';

document.addEventListener('DOMContentLoaded', function() {
  const parallaxCovers = document.querySelectorAll('.is-style-ehd-cover-parallax .wp-block-cover__image-background');

  const calculateParallax = () => {
    parallaxCovers.forEach(parallaxCover => {
      const coverRect = parallaxCover.parentElement.getBoundingClientRect();
      const coverHeight = coverRect.height;
      const coverTopPosition = coverRect.top;
      const windowHeight = window.innerHeight;

      // Only proceed if the cover is within the viewport
      if (coverTopPosition + coverHeight > 0 && coverTopPosition < windowHeight) {
        // Calculate the parallax offset
        let offset = (coverTopPosition / windowHeight) * -80; // Adjust '50' to control the effect's intensity

        // Apply the transform
        parallaxCover.style.transform = `translateY(${offset}px)`;
      }
    });
  };

  // Listen for scroll and resize events
  window.addEventListener('scroll', calculateParallax);
  window.addEventListener('resize', calculateParallax);
});