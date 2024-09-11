import $ from "jquery";
(function ($) {
  
  /**
   * initialize Image Carousel Block
   *
   * Adds custom JavaScript to the block HTML.
   *
   * @date    15/4/19
   * @since   1.0.0
   *
   * @param   object $block The block jQuery element.
   * @param   object attributes The block attributes (only available when editing).
   * @return  void
   */
  var initializeBlock = function ($block) {
      
      var $this = $block.find('.block-image-carousel-wrapper');
      if($this.length){      
        initCarousel($this);
      }
  };

  // Initialize each block on page load (front end).
  $(function () {
    $(".wp-block-ehd-image-carousel").each(function () {
      //replace with targetting class
      initializeBlock($(this));    
    });
  });

  // Initialize dynamic block preview (editor).
  if (window.acf) {
    window.acf.addAction("render_block_preview/type=ehd/image-carousel", initializeBlock);
  }
})(jQuery);
 

document.addEventListener('DOMContentLoaded', function() {
  var carousels = document.querySelectorAll('.ehd-image-carousel');
  if(carousels){
    carousels.forEach(function(carousel) {
      initCarousel(carousel);
    });
  }
});

 function initCarousel(carouselWrapper){
    var nativeElement = carouselWrapper.get(0);
    var carousel = nativeElement.querySelectorAll('.carousel')[0];
    if(carousel){
      console.log('running carousel');
        var myCarousel = new Carousel(carousel, { 
          infinite: true,
          center: false,
          slidesPerPage: 'auto',
          transition: false,
          adaptiveHeight: true,
          Dots: false,
          Autoplay : {
            showProgress : false,
            timeout : 5000
          },
          Navigation: {
            prevTpl: "<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 27 42\"><path stroke=\"#fff\" stroke-width=\"8\" d=\"M24 3 6 21l18 18\"/></svg>",

            nextTpl: "<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 27 42\"><path stroke=\"#fff\" stroke-width=\"8\" d=\"m3 39 18-18L3 3\"/></svg>",
          }
        }, {
          Autoplay
        });
    }
  }