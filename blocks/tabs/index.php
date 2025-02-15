<?php
  /**
  * Text Block
  *
  * This block was generated by create-acf-block-json.
  *
  * @package WordPress
  *
  * @param   array $block The block settings and attributes.
  * @param   string $content The block inner HTML (empty).
  * @param   bool $is_preview True during AJAX preview.
  * @param   (int|string) $post_id The post ID this block is saved to.
  */

  $className = "block-tabs container tabs-wrapper block-tab-container";

  $wrapper_attributes = get_block_wrapper_attributes(
    [
      'class' => $className
    ]
  );
?>
  <div <?php echo $wrapper_attributes; ?>>
    <div class="ehd-tabs">
      <header>
        <ul class="tabs-nav">
          <?php
          // for each tab label

          foreach ($attributes['tabLabelsArray'] as $tabLabel) {
            // output an ahref - id is to be #tab-label-hyphen-separated format
            $tabID = sanitize_title($tabLabel);

            // if it's the first item, mark it active
            $classes = "tab-nav-link";
          ?>
            <li><a id="<?php echo 'tab-'.$tabID; ?>" class="<?php echo esc_attr($classes); ?>" href="#<?php echo $tabID; ?>" data-tab="<?php echo $tabID; ?>"><?php echo $tabLabel; ?></a></li>
          <?php
          }
          ?>
        </ul>
      </header>
      <section class="tabs__panels" id="tabsection" tabindex="1">
        <?php echo $content; ?>
      </section>
    </div>
  </div>
