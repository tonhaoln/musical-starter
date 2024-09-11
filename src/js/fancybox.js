import { Fancybox, Carousel } from "@fancyapps/ui";
import { Autoplay } from "@fancyapps/ui/dist/carousel/carousel.autoplay.esm.js";

window.Fancybox = Fancybox;
window.Carousel = Carousel;
window.Autoplay = Autoplay;

document.addEventListener('DOMContentLoaded', function() {
  Fancybox.bind('[data-fancybox]', {
    center: false,
    slidesPerPage: 'auto',
    transition: false,
  });
});