<?php

/**
 * Template Name: Thank you home page
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

	<link href="<?=get_bloginfo('template_directory');?>/css/box.css" rel="stylesheet">

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

	<!-- Hotjar Tracking Code for http://nationalinsuranceadvisors.com/ -->
    
    <?php //echo "ppp".$_POST['quote_name']."<br />";?>

<?php



		if($_POST['quote']){



		$quote_name=$_POST['quote_name'];



		$quote_phone=$_POST['quote_phone'];



		$quote_email=$_POST['quote_email'];



		$quote_insurance=$_POST['quote_insurance'];



		$quote_comment=$_POST['quote_comment'];	



		 

		// insert form data to database

		global $wpdb;

		$wpdb->insert('free_insurance_quotes', array( 
        'quote_name' => $quote_name, 
		'quote_phone' => $quote_phone, 
		'quote_email' => $quote_email, 
		'quote_insurance' => $quote_insurance, 
		'quote_comment' => $quote_comment, 
		), array( 
            '%s','%s','%s','%s','%s' 
        )); 
		// Email send



		$subject="National Insurance Advisors - Free Insurance Quote Details";	



				



		$message_text.="<strong>Name: </strong>".$quote_name."<br><br>";



		$message_text.="<strong>Phone: </strong>".$quote_phone."<br><br>";	



		$message_text.="<strong>Email: </strong>".$quote_email."<br><br>";



		$message_text.="<strong>Insurance: </strong>".$quote_insurance."<br><br>";



		$message_text.="<strong>Comment: </strong>".stripslashes($quote_comment)."<br><br>";




		$ssite = ABSPATH . 'wp-content/plugins/nia_questionnaire/'; 
 
		require_once $ssite . '/Mobile-Detect/Mobile_Detect.php';
		
		$detect = new Mobile_Detect;
			if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {
				
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: <$quote_email>" . "\r\n";
				
				if(mail('rgadalmobilea@gmail.com',$subject,$message_text,$headers)){ 
		
		         //header("Location: http://qa.nationalinsuranceadvisors.com/thank-you"); 
		
			  } else{ 
							
				  echo "Mail was not sent!"; 
							
			  } 
			}else{
				
				
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: <$quote_email>" . "\r\n";
		
			    if(mail('rgadala@gmail.com',$subject,$message_text,$headers)){ 

                  //header("Location: http://qa.nationalinsuranceadvisors.com/thank-you"); 


			}else{ 

                  echo "Mail was not sent!"; 

			} 
			}
		}



	?>

 <script type="text/javascript">
(function(a,e,c,f,g,b,d){var h={ak:"931258116",cl:"dcEgCNO1tGUQhL6HvAM"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[f]||(a[f]=h.ak);b=e.createElement(g);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(g)[0];d.parentNode.insertBefore(b,d);a._googWcmGet=function(b,d,e){a[c](2,b,h,d,null,new Date,e)}})(window,document,"_googWcmImpl","_googWcmAk","script");
_googWcmGet(callback, '855-637-2991');


    var callback = function(formatted_number, mobile_number) {

    // formatted_number: number to display, in the same format as

    // the number passed to _googWcmGet().

    //  (in this case, '1-800-123-4567')

   // mobile_number: number formatted for use in a clickable link

   // with tel:-URI (in this case, '+18001234567')

    var e = document.getElementById("number");

  //e.href = "tel:" + mobile_number;

    e.innerHTML = "";



		      e.appendChild(document.createTextNode(formatted_number));



		    };



</script>  

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73239809-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- Google Code for NIA Lead Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 931258116;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "HN0ECMDSjG0QhL6HvAM";
var google_conversion_value = 10.00;
var google_conversion_currency = "USD";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/931258116/?value=10.00&amp;currency_code=USD&amp;label=HN0ECMDSjG0QhL6HvAM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

</head>



<body onload="_googWcmGet(callback, '1-855-637-2991')">


<script type="text/javascript" src="https://calltracking.nationalinsuranceadvisors.com/js/PhoneFormat.js"></script>

<script type="text/javascript" src="https://calltracking.nationalinsuranceadvisors.com/referrer_dynjs.php?c_id=1&format=US"></script>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-K23Z7Q"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K23Z7Q');</script>
<!-- End Google Tag Manager -->

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

						<a class="navbar-brand" href="<?=site_url();?>"><img src="<?=$options['upload_image'];?>" alt="" width="300" height="89"></a>

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
        
        <div class="advswrp" style="min-height: 325px;text-align: center;vertical-align: middle;padding: 7% 0px;">

			<div class="container">

				<div class="row">

					<div class="col-md-12">
                    
                    <span style="color:#000;font-weight:bold;"> Message sent successfully </span>
                    
                    </div>
                </div>
            </div>
        </div> 

<?php get_footer(); ?>
