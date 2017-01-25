<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header('blog'); ?>

<script type="text/javascript">
		function checkForm(){
			var person_name=document.getElementById('person_name').value;
			var email=document.getElementById('email').value;
			var message=document.getElementById('message').value;
			
			var error="";
			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			var filter1 = /^-{0,1}\d*\.{0,1}\d+$/;								
			
			if(person_name==""){
				error=true;
				document.getElementById('span_person_name').innerHTML="Name can not be empty";
			}else{
				document.getElementById('span_person_name').innerHTML="";
			}
						
			if(email==""){
				error=true;
				document.getElementById('span_email').innerHTML="Email can not be empty";
			}else if(email && !filter.test(email)){				
					error=true;
					document.getElementById('span_email').innerHTML="Invalid email id";
			}else{
				document.getElementById('span_email').innerHTML="";
			}
			
					
			if(message==""){
				error=true;
				document.getElementById('span_message').innerHTML="Message can not be empty";
			}else{
				document.getElementById('span_message').innerHTML="";
			}
						
			if(error==true){
				return false;
			}
		}
		
		function checkField(field_id,div_id,type){
			if(type=="normal"){
				var field_val=document.getElementById(field_id).value;
				if(field_val!=""){
					document.getElementById(div_id).innerHTML="";
				}
			}else if(type=="email"){
				var field_val=document.getElementById(field_id).value;
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
				if(field_val && !filter.test(field_val)){				
					document.getElementById(div_id).innerHTML="Invalid email id";
				}else
				if(field_val!=""){
					document.getElementById(div_id).innerHTML="";
				}
			}
		}
	</script>
	
	<?php
		if($_POST['comment']){	
			$comment_post_id=get_the_ID();
			$person_name=$_POST['person_name'];
			$email=$_POST['email'];
			$website=$_POST['website'];
			$message=$_POST['message'];
			$comment_parent_id=$_POST['comment_parent_id'];
			
			$time = current_time('mysql');
			$data = array(
				'comment_post_ID' => $comment_post_id,
				'comment_author' => $person_name,
				'comment_author_email' => $email,
				'comment_author_url' => $website,
				'comment_content' => $message,
				'comment_type' => '',
				'comment_parent' => $comment_parent_id,
				'comment_date' => $time,
				'comment_approved' => 1,
			);			
			wp_insert_comment($data);
		}
	?>	

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
				
				$author_id=$post->post_author;

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					//get_template_part( 'content', get_post_format() );
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
					
					
					<div class="col-xs-12 col-sm-8">
						<!---------------each blog------------>
						<div class="blogdtlssec">
							<div class="blog_short_head">
								<h2 class="heading1"><?php the_title();?></h2>
<!--
								<div class="cateautorwrp">
									<h5 class="category"><a href="#">On <span>8 February, 2015</span></a></h5>
									<h5 class="author"><a href="#">Author <span>Anonymous</span></a></h5>								
								</div>	
-->
							</div>					

							<div class="blog_short_body">
								<?php
									if(has_post_thumbnail()){
								?>
								<figure class="blogimgsec"><?php the_post_thumbnail('full');?></figure>
								<?php
								}
								?>
								<div>On <?=get_the_date("d F, Y",get_the_ID());?>&nbsp;&nbsp; By <?=get_the_author_meta('display_name', $author_id );?></div>
								<p><?php the_content();?></p>
							</div>
						</div>
						
						<div class="comment_box" id="comment_field">
							<h2 class="heading1">Comments</h2>
							<?php
							$comments_count = wp_count_comments(get_the_ID());
							if($comments_count!=0){
							 ?>
							<ul class="comments-list">
							<?php
								global $wpdb;
								$comments=$wpdb->get_results("select * from ".$wpdb->prefix."comments 
								where comment_parent=0 and  comment_post_ID=".get_the_ID());
									foreach ($comments as $comment):
							?>
								<li>
									<div class="comments">
										<div class="comment-wrap">
											<a href="<?=get_permalink();?>?replytocom=<?=$comment->comment_ID;?>#respond" class="comment-reply-link">Reply &rarr;</a>
											<figure><?php echo get_avatar($comment->comment_author_email, '60');?></figure>
											<div class="comment_cont">
												<h4><?php echo $comment->comment_author;?></h4>
												<span><?=@date("M d, Y",strtotime($comment->comment_date));?></span>
												<p><?php echo stripslashes($comment->comment_content);?></p>
											</div>
										</div>
										<?php
												$reply_comments=$wpdb->get_results("select * from ".$wpdb->prefix."comments 
												where comment_parent=".$comment->comment_ID);
												if($reply_comments){
										?>
										<ul class="children">
										<?php
											foreach ($reply_comments as $reply): 
										?>
											<li>
												<div class="comment-wrap">
													<?php /*?><a href="#" class="comment-reply-link">Reply &rarr;</a><?php */?>
													<figure><?php echo get_avatar($reply->comment_author_email, '60'); ?></figure>
													<div class="comment_cont">
														<h4><?php echo $reply->comment_author;?></h4>
														<span><?=@date("M d, Y",strtotime($reply->comment_date));?></span>
														<p><?php echo stripslashes($reply->comment_content);?></p>
													</div>
												</div>
											</li>
											<?php endforeach; ?>
										</ul>
										<?php
									}
								?>
									</div>
								</li>
									<?php endforeach; ?>
							</ul>
							<?php
							}
							?>
						</div>

						<div class="blog_reply" id="respond">
										<?php
										if($_GET['replytocom']){
											$title="Leave a Reply";
										}else{
											$title="Leave a Comment";
										}
										$comment_parent_id=($_GET['replytocom'])?$_GET['replytocom']:"0";
										?>
							<form class="contactform" id="frmmsg" name="frmmsg" action="#comment_field" onSubmit="return checkForm()" method="post">
								<h2 class="heading1"><?=$title;?></h2>
								<div class="formfld">
									<label>Name</label>
									<input type="text" placeholder="Name" value="" name="person_name" id="person_name" 
											onBlur="checkField('person_name','span_person_name','normal')" />
											<div style="color:#FF0000;" id="span_person_name"></div>
								</div>
								<div class="formfld">
									<label>Email</label>
									<input type="text" placeholder="Email" value="" name="email" id="email" 
											onBlur="checkField('email','span_email','email')" />
											<div style="color:#FF0000;" id="span_email"></div>
								</div>
								<div class="formfld">
									<label>Description</label>
									<textarea placeholder="Leave Message" name="message" id="message" 
									onBlur="checkField('message','span_message','normal')"></textarea>
									<div style="color:#FF0000;" id="span_message"></div>
								</div>
								
								<div class="formfld">
								<div class="g-recaptcha" data-sitekey="6LdM-A8TAAAAAOnLu2Z-PA9UmBS33F-TwbYwlwmE"></div>
							</div>
								<input type="submit" value="Submit" id="comment" name="comment" />
							     <input type="hidden" name="comment_parent_id" value="<?=$comment_parent_id;?>" />
							</form>
						</div>	
					</div>
					<aside class="col-xs-12 col-sm-4">						
						<?php dynamic_sidebar('sidebar-1');?>	
					</aside>
				</div>	
			</div>
		</div>
				<?php

					// Previous/next post navigation.
					//twentyfourteen_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						//comments_template();
					}
				endwhile;
			?>

<?php
get_footer();
