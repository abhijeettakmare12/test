<?php
/**
 * Template Name: Insurance
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */


get_header('blog'); ?>

<?php
	global $wpdb;
	$pid=get_the_ID();	
	$post_details=$wpdb->get_row("select * from ".$wpdb->prefix."posts where ID=$pid");
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
              <div class="innertxt" style="padding-top:30px !important;">	
              	 <div class="container">			
					<div class="row">	
					<div class="col-xs-12 col-sm-8 bloglistwrp">	
						<h2><?=$post_details->post_title;?></h2>
						<p><?=$post_details->post_content;?></p>										
								
				</div>
					<aside class="col-xs-12 col-sm-4">						
						<?php dynamic_sidebar('sidebar-1');?>	
					</aside>
			</div>	
		   </div>
		</div>	
<?php
get_footer();
