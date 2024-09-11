import $ from "jquery";
(function ($) {
  
  /**
   * initializeBlock
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

    var $this = $block.find('.image-gallery');
      if($this.length){              
        Fancybox.bind('[data-fancybox]', {
          center: false,
          slidesPerPage: 'auto',
          transition: false,
        });
      }
  };

  // Initialize each block on page load (front end).
  $(function () {
    $(".wp-block-ehd-image-gallery").each(function () {
      //replace with targetting class
      initializeBlock($(this));    
       
    });
  });

  // Initialize dynamic block preview (editor).
  if (window.acf) {
    // console.log(window.acf);
    window.acf.addAction("render_block_preview/type=ehd/image-gallery", initializeBlock);
  }
})(jQuery);
 