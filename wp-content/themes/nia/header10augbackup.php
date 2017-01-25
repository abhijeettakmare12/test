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



	<link href="<?=get_bloginfo('template_directory');?>/css/box.css" rel="stylesheet">



	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 



	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>	



	<link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>	



	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>	


	<script src='https://www.google.com/recaptcha/api.js'></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->



	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->



	<!--[if lt IE 9]>



	  <script src="js/html5shiv.js"></script>



	  <script src="js/respond.min.js"></script>



	<![endif]-->



	<!-- Hotjar Tracking Code for http://nationalinsuranceadvisors.com/ -->



<script>



    (function(h,o,t,j,a,r){



        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};



        h._hjSettings={hjid:153420,hjsv:5};



        a=o.getElementsByTagName('head')[0];



        r=o.createElement('script');r.async=1;



        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;



        a.appendChild(r);



    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');



</script>



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



			}else if(type=="text"){



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



	



	<?php



		if($_POST['quote']){



		$quote_name=$_POST['quote_name'];



		$quote_phone=$_POST['quote_phone'];



		$quote_email=$_POST['quote_email'];



		$quote_insurance=$_POST['quote_insurance'];



		$quote_comment=$_POST['quote_comment'];	



		



		// insert form data to database



		$wpdb->insert('free_insurance_quotes', array(



        'quote_name' => $quote_name,



		'quote_phone' => $quote_phone,



		'quote_email' => $quote_email,



		'quote_insurance' => $quote_insurance,



		'quote_comment' => $quote_comment,



		));



		



		// Email send



		$subject="National Insurance Advisors - Free Insurance Quote Details";	



				



		$message_text.="<strong>Name: </strong>".$quote_name."<br><br>";



		$message_text.="<strong>Phone: </strong>".$quote_phone."<br><br>";	



		$message_text.="<strong>Email: </strong>".$quote_email."<br><br>";



		$message_text.="<strong>Insurance: </strong>".$quote_insurance."<br><br>";



		$message_text.="<strong>Comment: </strong>".stripslashes($quote_comment)."<br><br>";



				



		



		$to=get_option('admin_email');			



		// Always set content-type when sending HTML email



		$headers = "MIME-Version: 1.0" . "\r\n";



		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



		$headers .= "From: <$quote_email>" . "\r\n";



		//@mail($to,$subject,$message_text,$headers);

		

		//$quote_msg="Message sent successfully";

		

		

		 if(mail($to,$subject,$message_text,$headers)){ 

  header("Location: https://nationalinsuranceadvisors.com/thank-you"); 

}else{ 

  echo "Mail was not sent!"; 

} 





	}



	?>



	<?php wp_head(); ?>



	<script src='https://www.google.com/recaptcha/api.js'></script>



    



 <script type="text/javascript">



(function(a,e,c,f,g,b,d){var h={ak:"931258116",cl:"dcEgCNO1tGUQhL6HvAM"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[f]||(a[f]=h.ak);b=e.createElement(g);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(g)[0];d.parentNode.insertBefore(b,d);a._googWcmGet=function(b,d,e){a[c](2,b,h,d,null,new Date,e)}})(window,document,"_googWcmImpl","_googWcmAk","script");



_googWcmGet(callback, '855-637-2991');







		    var callback = function(formatted_number, mobile_number) {



		      // formatted_number: number to display, in the same format as



		      //        the number passed to _googWcmGet().



		      //        (in this case, '1-800-123-4567')



		      // mobile_number: number formatted for use in a clickable link



		      //        with tel:-URI (in this case, '+18001234567')



		      var e = document.getElementById("number");



		      //e.href = "tel:" + mobile_number;



		      e.innerHTML = "";



		      e.appendChild(document.createTextNode(formatted_number));



		    };



</script>   

</head>







<body onload="_googWcmGet(callback, '1-855-637-2991')">
 
<?php 
$referrer = $_SERVER['HTTP_REFERER']; 

if($referrer =='http://nationalinsuranceadvisors.com/lp3/') { 
?>
<!-- Google Code for National Insurance Advisors - lp3 Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 931258116;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "4uGyCKb2qmQQhL6HvAM";
var google_conversion_value = 1.00;
var google_conversion_currency = "USD";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/931258116/?value=1.00&amp;currency_code=USD&amp;label=4uGyCKb2qmQQhL6HvAM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
   
<?php    
}elseif ($referrer =='http://nationalinsuranceadvisors.com/lp1/') { 
?>    
<!-- Google Code for National Insurance Advisors - lp1 Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 931258116;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "GYAKCPTbqmQQhL6HvAM";
var google_conversion_value = 1.00;
var google_conversion_currency = "USD";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/931258116/?value=1.00&amp;currency_code=USD&amp;label=GYAKCPTbqmQQhL6HvAM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

 
<?php
}  
?>



<script type="text/javascript" src="https://calltracking.nationalinsuranceadvisors.com/js/PhoneFormat.js"></script>



<script type="text/javascript" src="https://calltracking.nationalinsuranceadvisors.com/referrer_dynjs.php?c_id=1&format=US"></script>







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



		



		<div class="banner">



			<div class="container">



				<div class="row">



					<div class="col-xs-12 col-sm-8">



						<div class="row">



							<div class="bannertxt">



								<?=$options['banner_text'];?>



							</div>	



						</div>



                       <div class="row">



                       			<div style="padding-top:8px;">



                                	<a href="javascript:void();" onClick="show_video();"><div id="play" class="play_button">



                                    	<img src="/video/sam_image.png" width="100%">



                                    </div></a>



                                    <div id="video" style="display:none;">



                       				<video id="videoId" width="550" height="270" controls>



                                      <source src="http://nationalinsuranceadvisors.com/video/home.mp4" type="video/mp4">



                                    



                                    Your browser does not support the video tag.



                                    </video>



                                    </div>



                                </div>



                               



                       </div>



					</div>



					<div class="col-xs-12 col-sm-4">



						<div class="row">



							<form class="bannerform" onSubmit="return checkQuoteForm()" method="post" action="/thank-you">



							<h1>FREE INSURANCE QUOTES</h1>



							<?php



								//if($quote_msg){



								//	echo '<span style="color:#fff;font-weight:bold;">'.$quote_msg.'</span>';

	                        

								//}

								



							?>



							<div class="row">



							<div class="col-xs-6 col-sm-12">



								<input type="text" name="quote_name" id="quote_name" placeholder="Full Name" onBlur="checkField('quote_name','span_quote_name','normal')">



								<span style="color:#FF0000; display:none;" id="span_quote_name"></span>



							</div>								



							<div class="col-xs-6 col-sm-12">



								<input type="text" name="quote_phone" id="quote_phone" placeholder="Phone" onBlur="checkField('quote_phone','span_quote_phone','phone')">



								<span style="color:#FF0000; display:none;" id="span_quote_phone"></span>



							</div>



							<div class="col-xs-6 col-sm-12">



								<input type="text" name="quote_email" id="quote_email" placeholder="Email" onBlur="checkField('quote_email','span_quote_email','email')">



								<span style="color:#FF0000; display:none;" id="span_quote_email"></span>



							</div>



							<div class="col-xs-6 col-sm-12">



								<div class="selectwrp"><select name="quote_insurance" id="quote_insurance">



									<option value="Life Insurance">Life Insurance</option>



									<option value="Health Insurance">Health Insurance</option>



								</select><div class="selctxt">Life Insurance</div></div>



							</div>



							<div class="col-xs-12 col-sm-12">



								<textarea name="quote_comment" id="quote_comment" placeholder="Comments" onBlur="checkField('quote_comment','span_quote_comment','normal')"></textarea>



								<span style="color:#FF0000; display:none;" id="span_quote_comment"></span>



							</div>
                            
                            <div class="col-xs-12 col-sm-12" style="margin-bottom: 30px;">
                            
                            <?php echo do_shortcode('[bws_google_captcha]'); ?>

 
							</div>
                            
                            </div>



							<input type="submit" name="quote" id="submit_data" value="submit info">



						</form>



						</div>



					</div>						



				</div>



			</div>	



		</div>	



<script language="javascript">



function show_video(){



	$('#play').hide();	



	$('#videoId').get(0).play()



	$('#video').show();	



}



</script>