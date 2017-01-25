<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	
	<!-- Bootstrap -->
	<link href="<?=get_bloginfo('template_directory');?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=get_bloginfo('template_directory');?>/css/style.css" rel="stylesheet">
	<link href="<?=get_bloginfo('template_directory');?>/css/media.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>	
	<link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>	
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="js/html5shiv.js"></script>
	  <script src="js/respond.min.js"></script>
	<![endif]-->
	
	<script type="text/javascript">
			function checkQuoteForm(){
			var quote_name=document.getElementById('quote_name').value;
			var quote_phone=document.getElementById('quote_phone').value;
			var quote_email=document.getElementById('quote_email').value;
			var quote_comment=document.getElementById('quote_comment').value;
			
			var error="";
			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			var filter1 = /^-{0,1}\d*\.{0,1}\d+$/;								
			
			if(quote_name==""){
				error=true;
				document.getElementById('span_quote_name').style.display='';
				document.getElementById('span_quote_name').innerHTML="Name can not be empty";
			}else{
				document.getElementById('span_quote_name').style.display='none';
				document.getElementById('span_quote_name').innerHTML="";
			}
			
			 if(quote_phone && !filter1.test(quote_phone)){				
					error=true;
					document.getElementById('span_quote_phone').style.display='';
					document.getElementById('span_quote_phone').innerHTML="Invalid phone no";
			}else{
				document.getElementById('span_quote_phone').style.display='none';
				document.getElementById('span_quote_phone').innerHTML="";
			}
						
			if(quote_email==""){
				error=true;
				document.getElementById('span_quote_email').style.display='';
				document.getElementById('span_quote_email').innerHTML="Email can not be empty";
			}else if(quote_email && !filter.test(quote_email)){				
					error=true;
					document.getElementById('span_quote_email').style.display='';
					document.getElementById('span_quote_email').innerHTML="Invalid email id";
			}else{
				document.getElementById('span_quote_email').style.display='none';
				document.getElementById('span_quote_email').innerHTML="";
			}
			
					
			if(quote_comment==""){
				error=true;
				document.getElementById('span_quote_comment').style.display='';
				document.getElementById('span_quote_comment').innerHTML="Comment can not be empty";
			}else{
				document.getElementById('span_quote_comment').style.display='none';
				document.getElementById('span_quote_comment').innerHTML="";
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
			}else if(type=="phone"){
				var field_val=document.getElementById(field_id).value;
				var filter = /^-{0,1}\d*\.{0,1}\d+$/;	
				if(field_val && !filter.test(field_val)){				
					document.getElementById(div_id).innerHTML="Invalid phone number";
				}else
				if(field_val!=""){
					document.getElementById(div_id).innerHTML="";
				}
			}
		}
	</script>	
	
	<?php wp_head(); ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
<?php
		$options=get_option('pu_theme_options');
	?>
	<div class="top_header">
			<div class="container">
				<div class="row">
					<div class="top_header_l"><?=$options['top_bar_text'];?></div>
					<div class="top_header_r"><span>Follow Us :</span>
						<ul>
							<li>								
								<a href="mailto:<?=$options['email'];?>" class="fa fa-envelope"></a>
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
						</ul>
					</div>
				</div>	
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="navigationwrp">
			<div class="container">
				<div class="row">
					<div class="navbar-header">
						<a class="navbar-brand" href="<?=site_url();?>"><img src="<?=$options['upload_image'];?>" alt=""></a>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse">						
						 <?php
							$defaults = array(
										'theme_location'  => '',
										'menu'            => 'header_menu',
										'container'       => '',
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => '',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul id="" class="nav navbar-nav menu pull-right">%3$s</ul>',
										'depth'           => 0,
										'walker'          => ''
									);						
								wp_nav_menu( $defaults );
						   ?>   	
					</div>
				</div>	
			</div>
			<div class="clearfix"></div>
		</div>
		
		<div class="banner inner">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-8">
						<div class="row">
							<div class="bannertxt">
									<?=$options['banner_text'];?>
							</div>	
						</div>
					</div>
				</div>
			</div>	
		</div>	
