<?php
/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<?php
	global $wpdb;
	$options=get_option('pu_theme_options');
?>
		
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
						
						//this code is written to apply width and height to each logo, in order to make website A grade for SEO
						$count=1;
						$width=100;
						while ( $query->have_posts() ) : $query->the_post();
						if($count==1){
							$width=156;	
						}
						if($count==2){
							$width=114;	
						}
						if($count==3){
							$width=65;	
						}
						if($count==4){
							$width=77;	
						}
						if($count==5){
							$width=124;	
						}
						if($count==6){
							$width=50;	
						}
						if($count==7){
							$width=109;	
						}
						if($count==8){
							$width=91;	
						}
						//=================end of SEO A grade optimization
						$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
					?>
					<li><img src="<?=$image[0];?>" alt="" width="<?php echo $width;?>" height="45"></li>
					<?php
						$count+=1;
						endwhile;
						wp_reset_query();
					?>						
					</ul>
				</div>
			</div>
		</div>
		
		<div class="advswrp">
			<div class="container">
			<?php
				$post_details=$wpdb->get_row("select * from ".$wpdb->prefix."posts where ID=".CALL_US_TODAY);
			?>
				<div class="row">
					<div class="col-sm-3 hidden-xs">
						<div class="row">
							<figure>
								<?php
									$image = wp_get_attachment_image_src(get_post_thumbnail_id(CALL_US_TODAY), 'full');
								?>
								<img src="<?=$image[0];?>" alt="" width="265" height="478">
							</figure>
						</div>
					</div>
					<div class="col-sm-8 col-sm-offset-1 col-xs-12">
						<div class="row">
							<h2><?=$post_details->post_title;?></h2>
							<?=$post_details->post_content;?>
						</div>
					</div>
				</div>
			</div>	
		</div>
		
		<div class="howdowewrp">
			<div class="container">
				<div class="row">					
					<div class="col-xs-6 col-sm-8">
						<?php
							$post_details=$wpdb->get_row("select * from ".$wpdb->prefix."posts where ID=".GET_PAID);
						?>
						<div class="row">
							<h2><?=$post_details->post_title;?></h2>
								<?=$post_details->post_content;?>
						</div>	
					</div>
					<div class="col-xs-6 col-sm-4">
						<figure class="howdowewrpimg">
						<?php
							$image = wp_get_attachment_image_src(get_post_thumbnail_id(GET_PAID), 'full');
						?>
							<img src="<?=$image[0];?>" width="583" height="362" alt="How we get paid">
						</figure>	
					</div>	
				</div>	
			</div>
		</div>
		
		<div class="whyworkwrp">
			<div class="container">
				<div class="row">
					<?=$options['why_work_with_us'];?>
					<div class="clearfix"></div>
					<div class="row">
						<?php					  
					  	$query =  new WP_Query (array (
							'post_type' =>'service',
							'post_per_page' => 3,		
							'post_status' => 'publish',					
							'orderby'=>'post_date',
							'order'=>'desc'
						));
						
						while ( $query->have_posts() ) : $query->the_post();
						$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
					?>
						<div class="col-xs-12 col-sm-4">
							<h4><img src="<?=$image[0];?>" alt="" width="52" height="52"><?php the_title();?></h4>
							<p><?=strip_tags(get_the_content());?></p>
						</div>
						<?php
						endwhile;
						wp_reset_query();
					?>						
					</div>	
				</div>
			</div>	
		</div>

<?php
get_footer();
