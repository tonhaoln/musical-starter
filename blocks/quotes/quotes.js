import $ from "jquery";
(function ($) {
  
  /**
   * initialize Quotes Block
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
      
      const carouselCheck = $block.find('.carousel');



      if (carouselCheck.length > 0) {
        
       
       let carousel = $block[0].querySelector('.carousel');

      var myCarousel = new Carousel(carousel, { 
        infinite: true,
        center: false,
        slidesPerPage: 'auto',
        transition: "fade",
        Dots: {
          minCount: 20,
        },
        Thumbs: false,
        Autoplay : {
          timeout : 5000,
          showProgress: false,
        }
      }, {
        Autoplay
      });

      } else {
        console.log("Carousel div not found.");
      }

  };

  // Initialize each block on page load (front end).
  $(function () {
    $(".wp-block-ehd-quotes").each(function () {
      //replace with targetting class
      initializeBlock($(this));    
    });
  });

  // Initialize dynamic block preview (editor).
  if (window.acf) {
    window.acf.addAction("render_block_preview/type=ehd/quotes", initializeBlock);
  }
})(jQuery);
 