<?php

  get_header(); 
  
  if (have_posts()) :
   while (have_posts()) :
      the_post();
      get_template_part(TEMPLATE_PATH . 'post', 'stub');
   endwhile;
  endif;
	
  get_footer();