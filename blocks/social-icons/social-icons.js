import $ from "jquery";
(function ($) {
  
  /**
   * initialize Social Icons Block
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
      // var $this = $block.find('xxx');
      // if($this.length){      
      //
      // }
  };

  // Initialize each block on page load (front end).
  $(function () {
    $(".wp-block-ehd-social-icons").each(function () {
      //replace with targetting class
      initializeBlock($(this));    
    });
  });

  // Initialize dynamic block preview (editor).
  if (window.acf) {
    window.acf.addAction("render_block_preview/type=ehd/social-icons", initializeBlock);
  }
})(jQuery);
 