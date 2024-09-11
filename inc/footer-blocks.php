<?php
function ehd_footer_widget_area() {
    register_sidebar( array(
        'name'          => __( 'EHD Footer', 'text_domain' ),
        'id'            => 'ehd_footer',
        'description'   => __( 'Add widgets here to appear in your EHD Footer.', 'text_domain' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<!--',  // Comment out the title
        'after_title'   => '-->',  // Comment out the title
    ) );
}
add_action( 'widgets_init', 'ehd_footer_widget_area' );
