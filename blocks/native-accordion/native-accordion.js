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
    $block.find('button').each(function () {
      var $button = $(this);

      $button.on('click', function () {
        var isExpanded = $button.attr('aria-expanded') === 'true';
        $button.attr('aria-expanded', !isExpanded);
        var $content = $('#' + $button.attr('aria-controls'));
        $content.attr('aria-hidden', isExpanded);
      });

      $button.on('keydown', function (event) {
        var key = event.key;
        if (key === 'ArrowDown' || key === 'ArrowUp') {
          event.preventDefault();
          var $nextButton;
          if (key === 'ArrowDown') {
            $nextButton = $button.closest('section').next().find('button');
          } else {
            $nextButton = $button.closest('section').prev().find('button');
          }
          if ($nextButton.length) {
            $nextButton.focus();
          }
        }
      });
    });
  };

  // Initialize each block on page load (front end).
  $(function () {
    $(".wp-block-ehd-native-accordion").each(function () {
      initializeBlock($(this));
    });
  });

  // Initialize dynamic block preview (editor).
  if (window.acf) {
    window.acf.addAction("render_block_preview/type=ehd/native-accordion", initializeBlock);
  }
})(jQuery);
