<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */


get_header('blog'); ?>

<div class="innertxt">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8">
						<h2>Category: <?=single_cat_title("",false);?></h2>
						<ul class="bloglist">

				<?php
						$cur_cat_id = get_cat_id( single_cat_title("",false) );
						$page_permalink=get_category_link( $cur_cat_id );						
						
						 $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
						 $pno=$paged;
						 
						$paged=($_GET['pno'])?$_GET['pno']:1;
						 $pno=$paged;	
						  
						  $query_args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'cat' => $cur_cat_id,
							'posts_per_page' => '-1'
						 );
												
                        $the_query = new WP_Query( $query_args );  			
						$total=$the_query->found_posts;					
						$total_page=@ceil($total/SHOW_PER_PAGE);
						
						$query_args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'cat' => $cur_cat_id,
							'posts_per_page' => SHOW_PER_PAGE,
							'paged' => $paged,
							'order' => 'desc'
						 );
							
                        $the_query = new WP_Query( $query_args );  
						while ( $the_query->have_posts() ) : $the_query->the_post();						
				?> 	
					
				<li>
								<h2><a href="<?=get_permalink();?>"><?php the_title();?></a></h2>
								<p><?=substr(strip_tags(get_the_content()),0,100);?> <a href="<?=get_permalink();?>" class="readmore">Read More</a></p>
				</li>
				<?php

				endwhile;
				wp_reset_query();
		?>				
				</ul>
				
				<ul class="pagination">
				  <?php
				  	for($i=1;$i<=$total_page;$i++){
						if($pno==$i){
							echo "<li class='active'><a href='".$page_permalink.'?pno='.$i."'>$i</a></li>";
						}else{
							echo "<li><a href='".$page_permalink.'?pno='.$i."'>$i</a></li>";
						}									
					}
				  ?>
				</div>
					<aside class="col-xs-12 col-sm-4">						
						<?php dynamic_sidebar('sidebar-1');?>	
					</aside>
			</div>	
		   </div>
		</div>	
<?php
get_footer();
