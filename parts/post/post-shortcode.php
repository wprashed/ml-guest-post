<?php

/**
 * Post Shordcode.
 *
 * @link       https://wprashed.com/
 * @since      1.0.0
 *
 * @package    Ml_Guest_Post
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Register Post shortcodes
 *
 * @return null
 */
function ml_guest_post_register_shortcodes() {
    add_shortcode( 'mlgp-post', 'shortcode_ml_guest_post' );
}
add_action( 'init', 'ml_guest_post_register_shortcodes' );

/**
 * Post Shortcode Callback
 * 
 * @param Array $atts
 *
 * @return string
 */

function shortcode_ml_guest_post( $atts ) {
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
 
  $args = array( 
			   'post_type' => 'gpost', 
               'paged' => $paged
             );
			 
$customPostQuery = new WP_Query($args);


?> 

<!-- Step 2: Display the Posts we Queried in the Step 1 -->

<div class="wrap">
 
	<div id="primary" class="content-area">
		
		<main id="main" class="site-main" role="main">
		
			<?php
			
			    if($customPostQuery->have_posts() ): 
			
                while($customPostQuery->have_posts()) :
                   
				$customPostQuery->the_post();
					       
                global $post;
            ?>
		
		    <div class="post-preview">
                <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid">
                <a href="<?php the_permalink(); ?>">
                    <h2 class="post-title"><?php the_title(); ?></h2>        
                </a>
				<?php the_excerpt(); ?>
                <p class="post-meta"> <?php _e('Posted by', 'ml-guest-post'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ); ?>"><?php the_author(); ?></a> <?php _e('On', 'ml-guest-post'); ?> <?php $archive_year  = get_the_time('y'); $archive_month = get_the_time('m'); $archive_day   = get_the_time('d'); ?> <?php echo esc_html( get_the_date() ); ?>
                </p>
            </div>
						  
			<?php endwhile; 
			
	     endif; 
			 wp_reset_query();
			 
	 echo '</div></div></div>';
	if (function_exists("cpt_pagination")) {
				
		cpt_pagination($customPostQuery->max_num_pages); 
				  
	 }
}