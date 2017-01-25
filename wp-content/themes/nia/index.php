<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header('blog'); ?>
<div class="clientwrp">
			<div class="container">
				<div class="row">
					<h2>Get Quotes from Companies Like:</h2>
					<ul class="clientlist">
					<?php					  
					  	$query =  new WP_Query (array (
							'post_type' =>'partner_logo',
							'post_per_page' => -1,		
							'post_status' => 'publish',					
							'orderby'=>'post_date',
							'order'=>'desc'
						));
						
						while ( $query->have_posts() ) : $query->the_post();
						$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
					?>
					<li><img src="<?=$image[0];?>" alt=""></li>
					<?php
						endwhile;
						wp_reset_query();
					?>						
					</ul>
				</div>
			</div>
		</div>
<div class="innertxt" style="padding-top:10px !important;">
			<div class="container">			
				<div class="row">	
								
					<div class="col-xs-12 col-sm-8 bloglistwrp">					
						<ul class="bloglist">

				<?php
						$page_permalink=get_permalink(BLOG);						
						
						 $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
						 $pno=$paged;
						 
						  $query_args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => '-1'
						 );
												
                        $the_query = new WP_Query( $query_args );  			
						$total=$the_query->found_posts;					
						$total_page=@ceil($total/SHOW_PER_PAGE);
						
						$query_args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => SHOW_PER_PAGE,
							'paged' => $paged,
							'order' => 'desc'
						 );
							
                        $the_query = new WP_Query( $query_args );  
						while ( $the_query->have_posts() ) : $the_query->the_post();
						$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'thumbnail');
						
						$author_id=$post->post_author;						
				?> 	
						<li>
								<?php /*?><figure>
									<img src="<?=$image[0];?>">
								</figure><?php */?>
								<div class="bloglist_r">
									<h2><a href="<?=get_permalink();?>"><?php the_title();?></a></h2>
									<div>On <?=get_the_date("d F, Y",get_the_ID());?>&nbsp;&nbsp; By <?=get_the_author_meta('display_name', $author_id );?></div>
									<?php
										$content=strip_tags(substr(get_the_content(),0,200));
										mb_internal_encoding("UTF-8");
										$string = $content;
										$mystring = mb_substr($content,0,-2);
									?>
									<p><?=$mystring;?> <a href="<?=get_permalink();?>" class="readmore">Read More</a></p>
								</div>	
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
							echo "<li class='active'><a href='".$page_permalink.$i."'>$i</a></li>";
						}else{
							echo "<li><a href='".$page_permalink.$i."'>$i</a></li>";
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
