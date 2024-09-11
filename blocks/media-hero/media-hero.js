import $ from "jquery";
(function ($) {
  
  /**
   * initialize Media Hero Block
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
      
      // Find something in the block and do something to it.
      var $this = $block.find('.inner-carousel');
      const carousel = $this[0];
      if($this.length){      
        initCarousel(carousel);
      }
  };

  // Initialize each block on page load (front end).
  $(function () {
    $(".wp-block-ehd-media-hero").each(function () {
      //replace with targetting class
      initializeBlock($(this));    
    });
  });

  // Initialize dynamic block preview (editor).
  if (window.acf) {
    window.acf.addAction("render_block_preview/type=ehd/media-hero", initializeBlock);
  }
})(jQuery);

 function initCarousel(carousel){
    if(carousel){
        var myCarousel = new Carousel(carousel, { 
          infinite: true,
          center: false,
          slidesPerPage: 'auto',
          transition: 'fade',
          adaptiveHeight: false,
          Dots: false,
          Autoplay : {
            showProgress : false,
            timeout : 8000
          },
          Navigation:false
        }, {
          Autoplay
        });
    }
  }
 