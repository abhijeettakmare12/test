<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					//get_template_part( 'content', 'page' );
			?>
				<div class="innertxt">
			<div class="container">
				<div class="row">
					<h2><?php the_title();?></h2>
					<?php
						if(has_post_thumbnail()){
					?>
						<?php "<p>".the_post_thumbnail('full')."</p>";?>
					<?php
						}
					?>
					<p><?php the_content();?></p>					
				</div>	
			</div>
		</div>
			<?php

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						//comments_template();
					}
				endwhile;
			?>
<?php
get_footer();
