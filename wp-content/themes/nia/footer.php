<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?php
		$options=get_option('pu_theme_options');
	?>
<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="row">
						<div class="col-sm-5 hidden-xs">
							<div class="footerhd"><?=$options['footer_heading1'];?></div>
							<p><?=$options['footer_heading1_desc'];?></p>
						</div>
						<div class="col-sm-3 hidden-xs">
						<?=$options['footer_heading2_desc'];?>
							
						</div>
						<div class="col-sm-4 footerform" >
							<ul class="smallfooterfollow visible-xs">
								<li>
									<a href="#" class="fa-stack fa-lg">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
									</a>
								</li>
								<li>
									<a href="#" class="fa-stack fa-lg">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
									</a>
								</li>
								<li>
									<a href="#" class="fa-stack fa-lg">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
									</a>
								</li>
							</ul>
							
							<div class="footerhd">Sign Up for Updates</div>
							<!--<form class="subscribeform">
								<input type="text" name="" value="" id="" placeholder="Your mail address">
								<input type="button" value="subscribe">
							</form>-->

<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:none; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="//nationalinsuranceadvisors.us13.list-manage.com/subscribe/post?u=e3281f7e2258e66624ca3a710&amp;id=194404c95c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">  
<div class="mc-field-group"> 
	<input type="email" value="" placeholder="Your mail Address" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_e3281f7e2258e66624ca3a710_194404c95c" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->

							<div class="footerfollow hidden-xs">
								<span>Follow Us on</span>
								<ul>
									<li>
									<?php
									$facebook=$options['facebook'];
									if($facebook){
									?>
									<a href="<?=$facebook;?>" target="_blank" class="fa fa-facebook"></a>
									<?php
									}else{
									?>
									<a href="#" class="fa fa-facebook"></a>
									<?php
									}
								?>
									</li>
									<li>
									<?php
									$twitter=$options['twitter'];
									if($twitter){
									?>
									<a href="<?=$twitter;?>" target="_blank" class="fa fa-twitter"></a>
									<?php
									}else{
									?>
									<a href="#" class="fa fa-twitter"></a>
									<?php
									}
								?>
									</li>
									<li>
									<?php
									$google_plus=$options['google_plus'];
									if($google_plus){
									?>
									<a href="<?=$google_plus;?>" target="_blank" class="fa fa-google-plus"></a>
									<?php
									}else{
									?>
									<a href="#" class="fa fa-google-plus"></a>
									<?php
									}
								?>
									</li>
								</ul>	
							</div>
							<ul class="footerlogos hidden-xs">
								<li><img src="<?=get_bloginfo('template_directory');?>/images/footerlogo1.jpg" width="70" height="26" alt=""></li>
								<li><img src="<?=get_bloginfo('template_directory');?>/images/footerlogo2.jpg" width="82" height="26" alt=""></li>
							</ul>	
						</div>
						<div class="clearfix"></div>
						<div class="col-sm-12 hidden-xs">
							<div class="bottomfooter">
								<span><i class="fa fa-phone"></i><?=$options['phone'];?></span>
								<span><i class="fa fa-envelope-o"></i><a href="mailto:<?=$options['email'];?>"><?=$options['email'];?></a></span>
								<?php /*?><span><i class="fa fa-question"></i>Help</span><?php */?>
							</div>
						</div>	
					</div>	
				</div>	
			</div>
		</footer>
		
		
		<div class="copyrightwrp">
			<div class="container">
				<div class="row">
					<?=$options['footer_menu'];?>					
					<div class="copyrightwrp_r">
						<?=$options['copyright_text'];?>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?=get_bloginfo('template_directory');?>/js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?=get_bloginfo('template_directory');?>/js/bootstrap.min.js"></script>
		<script src="<?=get_bloginfo('template_directory');?>/js/custom.js"></script>
		
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/563351c412c71b382ec6888b/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>


<!--End of Tawk.to Script-->
	<?php wp_footer(); ?>

</body>
</html>