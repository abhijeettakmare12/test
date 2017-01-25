<?php

/**

 * Template Name: Landing Page B

 *

 * @package WordPress

 * @subpackage Twenty_Fourteen

 * @since Twenty Fourteen 1.0

 */

//get_header('landing');

?>

<!DOCTYPE html>

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

<title>

<?php wp_title( '|', true, 'right' ); ?>

</title>

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

<link href="<?=get_bloginfo('template_directory');?>/css/landingpage1.css" rel="stylesheet">

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
 

<?php wp_head(); ?>

<style type="text/css">

html {

	margin-top: 0px !important;

	overflow-x:hidden;

}

body {

	background: url('../wp-content/themes/nia/images/sky.jpg') no-repeat center;

	width: 100%;

	background-size: 100% 100%;

	min-height:525px;

	font-family: arial;

}

.container {

	left: 3.1%;

	position: relative;

}

.row {

	margin-left: 0;

	margin-right: 0;

}

#top_back .disabled {

	display:none !important;

}

#fb_background {

	background: url('../wp-content/themes/nia/images/lp_fb.png');

	background-repeat: no-repeat;

}

#overlay {

	display: none;

}

#popup {

	display: none;

	position: absolute;

	top: 44%;

	left: 17%;

	background: url('../wp-content/themes/nia/images/majorMedicalPopup.png');

	width: 352px;

	height: 150px;

	z-index: 200;

}

.popupcontent {

	padding: 10px;

}

#button {

	cursor: pointer;

}

 @media screen and (-webkit-min-device-pixel-ratio:0) {

    /* Safari only override */

    ::i-block-chrome, .use_map img {

 margin-left: 17px;

}

}

</style>

<div id="fb-root"></div>
<script type="text/javascript">
(function(a,e,c,f,g,h,b,d){var k={ak:"931258116",cl:"NlJaCPrztW0QhL6HvAM",autoreplace:"855-637-2991"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[g]||(a[g]=k.ak);b=e.createElement(h);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(h)[0];d.parentNode.insertBefore(b,d);a[f]=function(b,d,e){a[c](2,b,k,d,null,new Date,e)};a[f]()})(window,document,"_googWcmImpl","_googWcmGet","_googWcmAk","script");
</script>


<?php

	define( 'WPFP_PATH', plugin_dir_path( __FILE__ ).'plugins/nia_questionnaire/Mobile-Detect/Mobile_Detect.php' );

	$detect = new Mobile_Detect;

	

	if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) { ?>

    



</head>

<body onload="_googWcmGet(callback, '1-855-637-2991')">





<div class="container">

  <div class="row">

    <div id="fb_background">

      <div class="fb-like" data-href="https://www.facebook.com/nationalinsuranceadvisors/" data-layout="standard" data-action="like" data-show-faces="true" data-share="false"></div>

    </div>

  </div>

</div>

<?php } ?>

<?php 

	$detect = new Mobile_Detect;

	if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {?>

<div class='container'>

  <div class="row">

    <div class="col-xs-12 col-sm-9 privacy_notes">

<div class="col-xs-12 col-sm-6" id="footer-logo-images"> <a href="http://nationalinsuranceadvisors.com" target="_blank"><img class="foot_lgo_mobile" src="http://nationalinsuranceadvisors.com/wp-content/themes/nia/images/nialargefinallogo1.png" alt="" width="130px"></a> </div>
<span style="font-size: 12px;position: relative;float: right;">Need Help? Call : <a href="tel:855.637.2991" id="number" style="color: red;text-decoration:none;">855-637-2991</a> (Toll Free)</span>
      <div class="col-xs-12 col-sm-6" id="foot_images_mobile" style="display: none;"> <img src="http://nationalinsuranceadvisors.com/wp-content/themes/nia/images/bbb_logo.jpg" alt=""> <img style="margin-right: 7px;" src="https://nationalinsuranceadvisors.com/wp-content/themes/nia/images/lpThawte_logo.png" alt=""> </div>

    </div>

    <div class="col-xs-12 col-sm-1"> <img id="desk_arraow" class="arrow_img" src="<?=get_bloginfo('template_directory');?>/images/lpBig_arrow.png" alt="" width="80" > </div>

    <div class="col-xs-12 col-sm-8">

      <div id="headline" class="first_blk">

        <div style="text-align:left; text-shadow: 2px 2px 2px #000;"> Help You And Your Family Be Better ... <br>

          With A $500,000 Policy For $27/Month! </div>

        <span style="color: #999999; font-size: 14px; margin-left: 10px;">Purchase Peace of MIND Today</span> </div>

      <div id="headline_second" class="second_blk" style="display:none;">

        <div style=""> Find multiple providers for the <br>

          <span style="font-weight:bold; color:#fff;"><span id="city"></span>, <span id="d_abbreviation"></span> </span> area! <br>

          <span class="mind_today2">Compare quotes with no obligation.</span> </div>

      </div>

    </div>

    <div class="col-xs-12 col-sm-1 m_arrow"> <img class="arrow_img" id="mob_arraow_mobile"  src="<?=get_bloginfo('template_directory');?>/images/down-arrow.png" alt="" width="27" style="z-index:9;"> <img id="m_arraow" class="m_arrow_img" src="<?=get_bloginfo('template_directory');?>/images/arrowFunnelnew2.png" alt="" width="28" style="display:none;" > </div>

  </div>

</div>

<?php

      }

      else{

    ?>

<div class='container'>

  <div class="row">

    <div class="col-xs-1 col-sm-1"> <img id="desk_arraow" class="arrow_img" src="<?=get_bloginfo('template_directory');?>/images/lpBig_arrow.png" alt="" width="88" >

      <?php /*?> <img id="m_arraow" class="m_arrow_img" src="<?=get_bloginfo('template_directory');?>/images/arrowFunnelarrow(1).png" alt="" width="50" style="display:none;" ><?php */?>

      <img id="m_arraow" class="m_arrow_img" src="https://cdn.lmbinsurance.com/ilf-images/presentations/common/arrowFunnel.png" alt="" width="50" style="display:none;" > </div>

    <div class="col-xs-10 col-sm-10">

      <div id="headline">

        <div style="text-align:left; text-shadow: 2px 2px 2px #000;"> Watch Your Worries Disappear... <br>

          With A $500,000 Policy For $27/Month! </div>

      </div>

      <span class="mind_today">Purchase Peace of Mind</span>

      <div id="headline_second" style="display:none;">

        <div style=""> Find multiple providers for the <span style="font-weight:bold; color:#fff;"><span id="city"></span>, <span id="d_abbreviation"></span> </span> area! <br>

          <span class="mind_today2">Compare quotes with no obligation.</span> </div>

      </div>

    </div>

    <div class="col-xs-1 col-sm-1">

      <?php /*?><img class="arrow_img" id="mob_arraow"  src="<?=get_bloginfo('template_directory');?>/images/lpBig_arrow.png" alt="" width="20" style="float:left;"><?php */?>

    </div>

  </div>

</div>

<?php } ?>

<div class='container'>

  <div class="row">

    <section id="wizard" style="margin-left: 0px;margin-top: 4px;">

      <div class="col-xs-12 col-sm-1 before_main_form"> </div>

      <div class="col-xs-12 col-sm-5 main_form">

      <input type="hidden" name="referral-url" value="<?php echo $_SERVER['SERVER_NAME'];?>"/>

        <?php 

		    $detect = new Mobile_Detect;

			if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {?>

        <img class="rqd_login_mobile" src="<?=get_bloginfo('template_directory');?>/images/lp_burst_new.png" alt="" > <?php echo do_shortcode( '[NIA_Questionnaire]' ); ?>

        <?php 

      }

      else{

    ?>

        <?php echo do_shortcode( '[NIA_Questionnaire]' ); ?>

        <?php } ?>

      </div>

      <div id="sidbar_ipad_image" style="display:none"> <img class="rqd_login1" src="https://nationalinsuranceadvisors.com/wp-content/themes/nia/images/life_boxBlue_new.png" alt=""> </div>

      <?php 

	$detect = new Mobile_Detect;

	if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {?>

      <div class="col-xs-12 col-sm-4 mob_life_image">

      

      <div id="heroimaged-ipad" class="dlpPanel mob_image_foot_ipad" style="display:none;"> <img class="rqd_login_ipad" src="https://cdn.lmbinsurance.com/ilf-images/presentations/2014/life1548/life1548.png" alt=""> </div>

      

      

        <div id="heroimaged" class="dlpPanel mob_image_foot"> <img class="rqd_login5" src="<?=get_bloginfo('template_directory');?>/images/heroImg.jpg" alt=""> </div>

        <div id="btf" class="dlpPanel mob_image_foot2" style="display:none;">

          <p class="main">Dad died at 32 with $500K policy. Left a wife and 2 kids in school. Had enough money to pay off the house and send both kids to college.</p>

          <p class="fineprint">The results explained are not typical of any specific offer, savings, or coverage option and are provided for illustration purposes only.</p>

        </div>

      </div>

      <?php

      }

      else{

    ?>

      <div class="col-xs-12 col-sm-4 life_image">

        <div id="heroimage" class="dlpPanel first_image"> <img class="rqd_login" src="<?=get_bloginfo('template_directory');?>/images/lp_burst.png" alt=""> <img class="rqd_mob_login" src="<?=get_bloginfo('template_directory');?>/images/life939a.gif" alt=""> </div>

        <div class="second_image" style="display:none;"> <img class="rqd_login1" src="<?=get_bloginfo('template_directory');?>/images/life_boxBlue_new.png" alt=""> </div>

      </div>

      <?php } ?>

    </section>

  </div>

</div>

<div class='container' id="desk_footer_icon">

  <div class="row">

    <section id="wizard" style="margin-left: 7px;">

      <div class="col-xs-12 col-sm-1"> </div>

      <div class="col-xs-12 col-sm-9 privacy_notes">

        <div class="col-xs-12 col-sm-6"> <a href="http://nationalinsuranceadvisors.com" target="_blank"><img class="foot_lgo" src="<?=get_bloginfo('template_directory');?>/images/nialargefinallogo1.png" alt="" width="172px"></a> </div>
<!--<span style="font-size: 12px;position: relative;text-align: center;">Need Help? Call : <a href="tel:855.637.2991" id="number" style="color:#000;text-decoration:none;">855-637-2991</a> (Toll Free)</span>-->
        <div class="col-xs-12 col-sm-6" id="foot_images"> <img  src="<?=get_bloginfo('template_directory');?>/images/bbb_logo.jpg" alt="" > <img  style="margin-right: 7px;"src="<?=get_bloginfo('template_directory');?>/images/lpThawte_logo.png" alt=""> </div>

        <div id="footerline" class="dlpPanel"></div>

        <div class="col-xs-12 col-sm-5" id="policy_text"> <span>Privacy Policy</span><br><span style="

    font-size: 15px;

">Need Help? Call : <a href="tel:855.637.2991" id="number" style="color:#000;text-decoration:none;">855-637-2991</a> (Toll Free)</span> </div>

        <div class="col-xs-12 col-sm-7" id="">

          <div id="copyright"> Copyright <span> &copy; 2017</span> <span> National Insurance Advisors, Inc. All Rights Reserved <br>

            1101 Brickell Ave South Tower #8 Miami, FL 33131</span> </div>

        </div>

      </div>

      <div class="col-xs-12 col-sm-9 lmb_ins_bkgrd"> <span>National Insurance Advisors is not providing or soliciting insurance and is not a licensed producer. National Insurance Advisors is an insurance provider matching service and is not advertising for any of the companies listed or mentioned on our site. To obtain an individual quote, fill out an insurance quote form, which will refer you to licensed insurers or agents, or contact any of the listed insurers. Advertised Rate Examples are based on the following policy information: Rates current as of the date each advertisement is placed and most recently confirmed as of 02/28/2015 (Example: $500,000 Policy for $27/mo or $350,000 Policy for $21/mo is for 42 year old male, living in California and Non-smoker). Not all policies or insurance products are available in all states. Please contact your insurance provider for additional information, eligibility requirements and/or disclosures. National Insurance Advisors is not a covered entity for purposes of the Health Insurance Portability and Accountability Act of 1996 ("HIPAA"). As such, the additional privacy and security protections afforded to consumers/patients under HIPAA do not apply. Certain state laws may provide additional rights with regard to disclosure of information. If these laws apply to you, you may have additional rights and some or all of the above disclaimers, exclusions or limitations may not apply to you.</span> </div>

    </section>

  </div>

</div>

<script src="<?=get_bloginfo('template_directory');?>/js/jquery-latest.js"></script> 

<script src="<?=get_bloginfo('template_directory');?>/js/jquery.validate.min.js"></script> 

<script src="<?=get_bloginfo('template_directory');?>/js/bootstrap.min.js"></script> 

<script src="<?=get_bloginfo('template_directory');?>/js/jquery.bootstrap.wizard.js"></script> 

<script src="<?=get_bloginfo('template_directory');?>/js/prettify.js"></script> 

<script type="text/javascript">

    // Initialize Variables

    //var closePopup = document.getElementById("popupclose");

    var overlay = document.getElementById("overlay");

    var popup = document.getElementById("popup");

    var button = document.getElementById("popup_contents_yes");

    // Close Popup Event

     

    // Show Overlay and Popup

    button.onclick = function() {

        overlay.style.display = 'block';

        popup.style.display = 'block';

    }

	$( "#popup_contents_no" ).click(function() {

		$( "#popup" ).css("display", "none");

		

	});

</script>



<?php 

//header('Access-Control-Allow-Origin: *');

	if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {?>

<script type="text/javascript">

 



 function checkZip(value) {

        return (/(^\d{5}$)|(^\d{5}-\d{4}$)/).test(value);

    }

 

$( "#home_yes" ).click(function() {

$( "#mArrow" ).removeClass( "movingArrow" );	

$( "#mzip" ).focus(function() {

	$( "#mArrow" ).removeClass( "movingArrow" );

	$( "#bottom_arrow" ).addClass( "yesmovingArrow movingArrow" ); 

});	

$( "#mzip" ).focusout(function() {

	

$( "#bottom_arrow" ).removeClass( "movingArrow yesmovingArrow" );

});

});



$( "#home_no" ).click(function() {

	$( "#mzip" ).focus(function() {

	$( "#mArrow" ).addClass( "movingArrow" ); 

	$( "#bottom_arrow" ).removeClass( "yesmovingArrow movingArrow" ); 

});	

$( "#mzip" ).focusout(function() {

 	$( "#mArrow" ).removeClass( "movingArrow" ); 

});

 });





$( "#email_addes" ).focus(function() {

	

	$( "#bottom_arrow" ).removeClass( "bottomMovingArrow emailMovingArrow" );

	//$("#bottom_arrow").addClass('emaibottomMovingArrow bottomMovingArrow');

	

});



$('#email_addes').blur(function(){

           $('#email_addes').filter(function(){

              var emil=$('#email_addes').val();

              var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

			  if(emil!=""){

				   if( emailReg.test( emil ) ) {

					 $("#bottom_arrow").addClass('emaibottomMovingArrow bottomMovingArrow');

					  }else{

						alert('Please enter a valid email address');

						return false;

						}

			  }else{

				  $( "#bottom_arrow" ).addClass( "bottomMovingArrow emailMovingArrow" );

				  }

           });

   });



	

function checkzip(zip_val){

	 var reply="";

	  var client = new XMLHttpRequest();

	client.open("GET", "https://api.zippopotam.us/us/"+zip_val, false);

		client.onreadystatechange = function() {			

			if(client.readyState == 4) {

				reply=client.responseText;

				var all_data = JSON.parse(client.responseText);

					 //var data_state = (all_data.places[0].state); 

					 var data_state = (all_data.places[0]['place name']);

					 var data_abbreviation = (all_data.places[0]['state abbreviation']);

 					  

					 $("#city").text(data_state);

					 $("#d_abbreviation").text(data_abbreviation);

					 $("input[name='hidden_city_name']").attr("value",data_state);

					 $("input[id='hidden_city_name']").val(data_state);

				 	

			};				 

		};

		

		 client.send();

		return reply;

	 

 }

 

$('.mobi_text').on('click', function () { 

			

	  if($('#tab3').hasClass('active')){ 

		var value = $('#mzip').val();

			 

			if ((document.getElementById('home_no').checked)  || (document.getElementById('home_yes').checked) ) {

					

			} else { 

				alert("Please indicate whether you own your home.")

				return false;

			}

			

			var value = $('#mzip').val();

			if (checkZip(value)) {

					

			} else {

				alert('Please enter a valid U.S. zip code');

				return false;

			}	 

			

			var mynum=0;

	 

			  var zip = $("#mzip").val();

			  

			  var returnzip=checkzip(zip);

			  //alert(returnzip)

			 if(returnzip.length<4){

				 alert("Please enter a valid U.S. zip code");

				return false; 

			 }else{

				 $( "#markBox" ).addClass( "arrow_checked" );

				 return true;

			 }  		

				

	  } 

			

	});


	

$('#mzip').keyup(function () {

	  var zip = $("#mzip").val(); 

	  var returnzip=checkzip(zip);

	 

	if(returnzip.length<4){ 

		 $( "#markBox" ).removeClass( "arrow_checked" );

		return false; 

	 }else{

		 $( "#markBox" ).addClass( "arrow_checked" );

		 return true;

	 }  

});

		

 $(".next").click(function(){

	 

	 

		var div_id=($('div.active').attr("id"));

		current_div=div_id.replace("tab","");

		current_div=eval(current_div)+1;

		if(current_div==8){

			$("#bottom_arrow").addClass('condibottomMovingArrow bottomMovingArrow');

			$("#bottom_arrow").removeClass('wgt_arrow tab7bottomMovingArrow');

		}

		if(current_div==8){

			$("#bottom_arrow").addClass('bottomMovingArrow');

			$("#bottom_arrow").removeClass('condibottomMovingArrow');

		}

		if(current_div==9){

			$("#bottom_arrow").addClass('emailMovingArrow bottomMovingArrow');

			

		}

		if(current_div==5){

			$("#bottom_arrow").addClass('genderbottomMovingArrow bottomMovingArrow'); 

			

		}else{

			$("#bottom_arrow").removeClass('genderbottomMovingArrow');

		}

		if(current_div==6){

			$("#bottom_arrow").addClass('dobbottomMovingArrow bottomMovingArrow'); 

		}  

		if(current_div==7){

			$("#bottom_arrow").addClass('tab7bottomMovingArrow bottomMovingArrow');

		}

		if(current_div==10){

		//alert("Hi")

			$(".mobi_continue ").css("display", "none");

			$("#bottom_arrow").removeClass('emailMovingArrow bottomMovingArrow');

		} 

		if(current_div==11){

		//alert("Hi")

			$(".mobi_continue ").css("display", "none");

		} 

		if(current_div==5){

		$('.selectwrp_multi').on('change', function() { 

			if ($("#dobMonth").val() != "" && $("#dobDate").val()!= "" && $("#dobYear").val()!= "" ){

			$("#bottom_arrow").removeClass('dobbottomMovingArrow bottomMovingArrow'); 

			$("#bottom_arrow").addClass('bottomMovingArrow');

			}

		 }); 

		 $('.selectwrp1').on('change', function() { 

		 if ($("#heightft").val() != "" && $("#heightinch").val()!= "" && $("#weight").val()!= "" ){

			$("#bottom_arrow").removeClass('tab7bottomMovingArrow bottomMovingArrow'); 

			$("#bottom_arrow").addClass('wgt_arrow bottomMovingArrow');

		   }

		 });

	   }

		 if(current_div>=5){

			$("#top_button").addClass('top_pre');

			$("#top_forword").addClass('top_bck'); 

		 }

		if(current_div==4){

			$( "#bottom_arrow" ).css("display", "block");

			$("#bottom_arrow").addClass('bottomMovingArrow');

			$(".mobi_continue").addClass('tb4bottomconti');

			$( "#top_forword" ).css("display", "inline");

			$( "#top_forword" ).css("float", "left");

			

			var client = new XMLHttpRequest();

			var zip = $("#mzip").val();

			

			//alert(zip)

			client.open("GET", "https://api.zippopotam.us/us/"+zip, true);

			client.onreadystatechange = function() {

				if(client.readyState == 4) {

					 //alert(client.responseText); 

					 var all_data = JSON.parse(client.responseText);

					 //var data_state = (all_data.places[0].state); 

					 var data_state = (all_data.places[0]['place name']);

					 var data_zip = (all_data['post code']);

					 var data_abbreviation = (all_data.places[0]['state abbreviation']);

					// $.cookie("new_data_state", data_state); 

					 $("#city").text(data_state);

					 $("#city1").text(data_state);

					 $("#zip1").text(data_zip);

					 $("#d_abbreviation").text(data_abbreviation);

					 $("input[id='hidden_city_name']").val(data_state);

					 //document.commentForm.city.value = data_state;

				};

			}; 

			client.send();

		}else{

			//$("#bottom_arrow").removeClass('bottomMovingArrow');

		}

});



 $(".previous").click(function(){

	 var div_id=($('div.active').attr("id"));

		current_div=div_id.replace("tab","");

		current_div=eval(current_div)+1;

		

	if($('#tab5').hasClass('active')){ 

		$("#bottom_arrow").removeClass('genderbottomMovingArrow');

	}

	if($('#tab6').hasClass('active')){ 

		$("#bottom_arrow").removeClass('dobbottomMovingArrow');

		$("#bottom_arrow").addClass('genderbottomMovingArrow');

	}

	if($('#tab8').hasClass('active')){ 

		$("#bottom_arrow").removeClass('emailMovingArrow bottomMovingArrow');

	}

	if($('#tab8').hasClass('active')){ 

		$("#bottom_arrow").removeClass('tab7bottomMovingArrow');

		$("#bottom_arrow").addClass('wgt_arrow');

		//alert("hi")

	}

	if(current_div==10){

		//alert("Hi")

			$(".mobi_continue ").css("display", "block");

			$("#bottom_arrow").removeClass('emailMovingArrow bottomMovingArrow');

		} 

			

			

			

	if(current_div==4){

			$("#bottom_arrow").removeClass('emaibottomMovingArrow wgt_arrow bottomMovingArrow genderbottomMovingArrow');

} 

		if(current_div==5){

$("#bottom_arrow").removeClass('emaibottomMovingArrow wgt_arrow bottomMovingArrow genderbottomMovingArrow');

}  		

			

	//alert(current_div)

	if(current_div<=11){

		//alert("Hi")

			$(".mobi_continue ").css("display", "block");

		} 

	

	if($('#tab10 div').hasClass('blue-sm-text')){

		//alert('Hi world');

		$('.mobi_continue').css("display", "none !important");

		}

	

	 

 });

</script>

<?php }else { ?>

<script type="text/javascript">

 

 function checkZip(value) {

        return (/(^\d{5}$)|(^\d{5}-\d{4}$)/).test(value);

    }

	

 function checkzip(zip_val){

	 var reply="";

	  var client = new XMLHttpRequest();

	client.open("GET", "https://api.zippopotam.us/us/"+zip_val, false);

		client.onreadystatechange = function() {			

			if(client.readyState == 4) {

				reply=client.responseText;

				var all_data = JSON.parse(client.responseText);

					 //var data_state = (all_data.places[0].state); 

					 var data_state = (all_data.places[0]['place name']);

					 var data_abbreviation = (all_data.places[0]['state abbreviation']);

					 $("#city").text(data_state);

					 $("#d_abbreviation").text(data_abbreviation);

					 $("input[id='hidden_city_name']").val(data_state);

					 //$("#hidden_city_name1").show();

			};				 

		};

		 client.send();

		return reply;

	 

 }

 $("#top_previous").click(function(){

	$("#top_forword ").css("display", "block");

	$("#top_forword ").addClass("desktop_top");

 });

	$('#fisr_conti').on('click', function (eee) {

			 

			

	  if($('#tab9').hasClass('active')){

		

		var value = $('#zip').val();

			if (checkZip(value)) {

				$.cookie('zipcode_cookie', value);

					

			} else {

				alert('Please enter a valid U.S. zip code');

				return false;

			}	

	  }

	  

	  var mynum=0;

	 

	  var zip = $("#zip").val();

	  var returnzip=checkzip(zip);

	 if(returnzip.length<4){

		 alert("Please enter a valid U.S. zip code");

		return false; 

	 }else{

		 return true;

	 } 

			

	});

	 

  

</script>

<?php } ?>

<?php 

// Slider for Mobile devices

	if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {?>

<script type="text/javascript">

	$(document).ready(function() {
		
		

		//setTimeout("alert('Boom!');", 2000);

		$('#rootwizard').bootstrapWizard({

	  		'tabClass': 'nav nav-pills',

	  		'onNext': function(tab, navigation, index) {

	  			var $valid = $("#commentForm").valid();

	  			if(!$valid) {

	  				$validator.focusInvalid();

	  				return false;

	  			}

				else{

				$('.main_form').animate({"left":"200px"},0);

				$('.main_form').animate({"left":"0px"}, "fast");

				

				}

	  		} 

	  	});

		$(".previous").click(function(){

			//$('.main_form').animate({"left":"-200px"},0);

		    //$('.main_form').animate({"left":"0px"}, "fast");

			});

		});

	</script>

<?php } 

 // End Slider for Mobile devices

 ?>

<?php 

	if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {?>

<script type="text/javascript">

	$(document).ready(function() {

		//alert("Hi")

	$(".previous").click(function(){

		

		//$('.main_form').animate({"left":"-200px"},0);

		//$('.main_form').animate({"left":"0px"});

		var div_id=($('div.active').attr("id"));

		current_div=div_id.replace("tab","");

		current_div=eval(current_div)+1;

		//alert(current_div)

		if(current_div<=4){

			$("#top_forword").css("display","none");

		}

	if(current_div==6){ 

		$( ".previous" ).removeClass( "tbl10" );

		$( "#top_forword" ).css( "margin-left", "9px" );

	}

	

	});

	$(".next").click(function(){

		

		var div_id=($('div.active').attr("id"));

		current_div=div_id.replace("tab","");

		current_div=eval(current_div)+1;

		

		if(current_div==4){

			//alert("Hi")

			//$("#top_previous").css("display", "none");

			$( ".previous" ).addClass( "hide_tab3" );

			//$("#tab4").css("margin-top", "35px");

		}else{

			$( ".previous" ).removeClass( "hide_tab3" );

		}

		if(current_div<=4){ 

			$( "#headline" ).hide();

			$( "#headline_second" ).show();

		}else{

			$( "#headline" ).show();

			$( "#headline_second" ).hide();

		}

	});

	$("#top_previous").click(function(){

		

		var div_id=($('div.active').attr("id"));

		current_div=div_id.replace("tab","");

		current_div=eval(current_div)+1;

		//alert(current_div)

		 

		if(current_div==6){ 

			$( ".previous" ).addClass( "hide_tab3" );

			$(".com_img2").css("margin-top", "0px");

		}else{

			$( ".previous" ).removeClass( "hide_tab3" );

		}

		

		if(current_div<=4){  

			$( "#headline_second" ).removeClass( "sss" );

			$( "#headline_second" ).removeClass();

			$( "#heroimaged" ).removeClass( "sss" );

			$( "#btf" ).removeClass();

		}else{

			$( "#headline" ).addClass( "m_img_first" );

			$( "#headline_second" ).addClass( "m_img_second" ); 

			$( "#heroimaged" ).addClass( "m_img_first" );

			$( "#btf" ).addClass( "m_img_second" ); 

		} 

	});

	});

</script>

<?php } ?>



<?php /*?><?php

  if(isset($_COOKIE['cookieName'])){

    echo '<script type="text/javascript">

	$("#fisr_conti").css("display", "block");

	</script>';

  }

?><?php */?>

<!--<style>

#fisr_conti{

	display:none;

}



</style>-->

<!--<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script> --> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>

<script type="text/javascript">

	$(document).ready(function() {

		$('.btn_continue_tab').click(function(){

			//$('.continue_button').css('display','block');

			$.removeCookie('cookieName', { path: '/' });

		});

		

		function myFunction(str) {

			//alert(str);

			if(str!= null){

			var res = str.split(",");

			var array_length = res.length;

			//alert(res);

			var i;

			//$('input[type=radio]#'+res[2]).attr('checked','checked');

		    for(i = 0; i < array_length; i++){ 
			  

		/*  $('input[type=radio]#'+res[i]).attr("checked","checked");

			   //$('#fisr_conti').removeAttr('style');

			   $('#fisr_conti').css('display', 'block !important');

			   $('li.'+res[i]).show();

			   $('#fisr_conti').hide();*/
			   
			   $('input[type=radio]#radio-1-2').attr("checked","checked");

			   //$('#fisr_conti').removeAttr('style');

			   $('#fisr_conti').css('display', 'block !important');

			   $('li.radio-1-2').show();

			   $('#fisr_conti').hide();

		    }

			}

          }

		  

		 $('input[type=radio]').click(function(){

			 $(this).attr('checked','checked');

			 var checked_buttons = [];

			 $('.tab-content input[type=radio]:checked').each(function() {

			 var radio_id = $(this).attr('id');

			 $('.'+radio_id).show();

			 checked_buttons.push(radio_id);

			 

		 });

		 $.cookie("cookieName",checked_buttons);

		 });

        myFunction($.cookie("cookieName"));		

		$(".btn_continue").click(function(){

			$(".btn_continue").css("display", "block");

		});

		

		$(".error").css("top", "120px");

		 

		$("#top_previous").click(function(){

			

		 if(current_div<=1)

			{

				$(".next ").css("display", "block");

				//$(".previous ").css("display", "none !important");

				

			} 

			/*$("#top_forword ").css("display", "block");

			$("#top_forword ").addClass("desktop_top");*/

			/*$("#top_forword ").css("margin-left", "35px");*/

			$("#tab10").css("margin-top","0px");

			$( ".next" ).removeClass( "tbl_top10" ); 

			

		 

		});

		

		

		

		$("#top_forword").click(function(){

			

			var div_id=($('div.active').attr("id"));

			current_div=div_id.replace("tab","");

			current_div=eval(current_div)+1;

			

			if(current_div==17){

				//alert("hi")

				$(".btn_continue1").hide();

			}

			

		});

		

		$(".btn_continue1").click(function(){

			

			var div_id=($('div.active').attr("id"));

			current_div=div_id.replace("tab","");

			current_div=eval(current_div)+1;

			

			if(current_div==17){

				//alert("hi")

				$(".btn_continue1").hide();

			}

			

		});

		$("#dontapply").click(function(){

			var div_id=($('div.active').attr("id"));

			current_div=div_id.replace("tab","");

			current_div=eval(current_div)+1;

			

			if(current_div==17){

				//alert("hi")

				$(".btn_continue1").hide();

			}

			

		});

		

		$(".apply_comm").click(function(){

			

			var div_id=($('div.active').attr("id"));

			current_div=div_id.replace("tab","");

			current_div=eval(current_div)+1;

			

			if(current_div==17){

				//alert("hi")

				$(".btn_continue1").hide();

			}

			

		});

		

		$(".next").click(function(){

			

			//alert('hi');

			var div_id=($('div.active').attr("id"));

			current_div=div_id.replace("tab","");

			current_div=eval(current_div)+1;

		

			if(current_div==10)

			{

				$( ".previous" ).addClass( "tbl10" ); 

				$( "#top_forword" ).addClass( "tbl_top10" ); 

				$( "#tab10" ).css( "margin-top","0px" );

				$( "#tab10" ).addClass( "top_11" ); 

			} 

			

			if(current_div==9)

			{

				$(".btn_continue").css("display", "block");

				$( "#fisr_conti" ).addClass( "popup" );  

			 } 

			 

			if(current_div==17){

				$(".btn_continue1").hide();

				$("#top_forword").hide();

			}

			

			if(current_div<10)

			{

				$(".second_image").hide();

				$("#desk_arraow").show();

				$("#m_arraow").hide();

				$(".lmb_ins_bkgrd").show();

				$("#buttonContinue").hide();

			    $(".first_image").show();

				$(".privacy_notes ").css("background", "rgb(0,0,0,0.0)"); 

				$("#fb_background").show(); 

				$("#headline_second").hide();

				$("#headline").show();	

				$("#btf").hide(); 

			} 

				else{

				$(".second_image").show();

				$("#desk_arraow").hide();

				$("#m_arraow").show();

				//$("#buttonContinue").show();

			    $(".first_image").hide();

				$(".lmb_ins_bkgrd").hide();

				$(".privacy_notes ").css("background", "transparent");

				$("body").css("background", "none repeat scroll 0 0 #76B0D9");

				$("#fb_background").hide();

				$("#headline_second").show();

				$("#headline").hide();

				$('.previous').show(); 

				$(".mind_today").hide();

				$( ".main_form" ).addClass( "after_tab10" ); 

				$(".second_image ").css("margin-top","-11.8%");

				$(".second_image ").css("margin-left","11px");

				$("#btf").show();

				//$("#buttonContinue").css("display", "block");

				$("#btn_nxt").css("display", "block");

				$(".btn_continue").css("display", "none"); 

				$(".control-label").css("margin-left", "19px");

				$(".control-label").css("margin-top", "-10px");

				$("#tab9").css("margin-top", "0px");

				//$("#fisr_conti").css("display", "block");

				//$(".after_tab10").css("width","43.21%");

				$(".control-label").css("font-size", "25px"); 

				$("#policy_for").css("height", "30px");

				$("#policy_for").css("width", "215px");

				$("#policy_for").css("padding", "1px");

				$("#policy_for").css("margin-left", "20px");

			}

			if(current_div<=10)

			{

				$('.previous').show(); 

			}else {

				 

			}

			if(current_div<=3){

				$("#btf").hide();

				$("#heroimaged").show(); 

			}else {

			

				$("#btf").show();

				$("#heroimaged").hide();

				$(".rqd_login_mobile").hide();  

				$(".mobi_continue").css("background", "linear-gradient(to bottom, #fbac43 0%,#e68b09 100%,#2989d8 100%,#2989d8 100%,#2989d8 100%)");

				$(".mobi_text").css("color", "#fff");

				$(".mobi_continue").css("border", "1px solid #221ce1");

				$(".mobi_continue").css("box-shadow", "none");

				

				 var isiPad = window.matchMedia("only screen and (max-device-width: 1280px) and (min-device-width: 768px)");

				 if (isiPad.matches){					  

					  //$("body").css("background", "#76B0D9");

					 $("body").removeAttr('style');

					 //$("body").addAttr('style').css("background", "#76B0D9 !important;"); 

					  $("body").attr('style', 'background: #76B0D9 !important');

					  $(".lmb_ins_bkgrd").attr('style', 'display: none !important');

					  $("#foot_images").attr('style', 'display: none !important');

					  $("#wizard .privacy_notes").attr('style', 'background: #76B0D9 !important');

					  $(".main_form").addClass('section_second_iPad');

					  $(".section_second_iPad").attr('style', 'width: 50% !important');

					  $("#heroimaged-ipad").hide();

					  $(".rqd_login_ipad").hide();

					  $("#sidbar_ipad_image").show();

					  $("#heroimaged").css("display","none !important");

					  $("#heroimaged-ipad").css("display","block !important");

					  $("#heroimaged-ipad").show();

					  $(".main_form").attr('style', 'background: #fff !important');

					   $("#footerline").attr('style', 'border-bottom: 1px solid #ffffff !important');

					   $("#headline_second").show();

					   $("#headline").hide();

					   $("#foot_images_mobile").show();

					   $("#policy_text").attr('style', 'color: #D8D6D6 !important');

					   $("#font-size").attr('style', 'font-size: 12px !important'); 

 					

						if(current_div<=3){

						   $("body").css("background", "#fff !important");

						   $(".rqd_login_mobile").show();

						   $("#m_arraow").hide();

						   $("#mob_arraow_mobile").show();  

					   }else {

						   $(".rqd_login_mobile").hide();

						   $("#m_arraow").show();

						   $("#mob_arraow_mobile").hide();

					   }

					 }

					 

					 

				 var isMobile = window.matchMedia("only screen and (max-device-width: 767px) and (min-device-width: 320px)");

                  if (isMobile.matches) {

	                //$("body").css("background", "#76B0D9");

					 $("body").removeAttr('style');

					 //$("body").addAttr('style').css("background", "#76B0D9 !important;"); 

					  $("body").attr('style', 'background: #76B0D9 !important');

					  $(".lmb_ins_bkgrd").attr('style', 'display: none !important');

					  $("#foot_images").attr('style', 'display: none !important');

					  $("#wizard .privacy_notes").attr('style', 'background: #76B0D9 !important');

					  $(".main_form").attr('style', 'background: #fff !important');

					   $("#footerline").attr('style', 'border-bottom: 1px solid #ffffff !important');

					   $("#headline_second").show();

					   $("#headline").hide();

					   $("#foot_images_mobile").show();

					   $("#policy_text").attr('style', 'color: #D8D6D6 !important');

					   $("#font-size").attr('style', 'font-size: 12px !important'); 

 					

						if(current_div<=3){

						   $("body").css("background", "#fff !important");

						   $(".rqd_login_mobile").show();

						   $("#m_arraow").hide();

						   $("#mob_arraow_mobile").show();  

					   }else {

						   $(".rqd_login_mobile").hide();

						   $("#m_arraow").show();

						   $("#mob_arraow_mobile").hide();

					   }

	               } 

				   

				   /*if(current_div==10){

						$('.mobi_continue').hide();

					}else

						$('.mobi_continue').show();   

						*/

					}

					

					

		});

			

			

		$(".previous").click(function(){

			//$('.main_form').animate({"left":"200px"},10);

			//$('.main_form').animate({"left":"0px"},0);

	        $('.main_form').animate({"left":"-200px"},0);

	        $('.main_form').animate({"left":"0px"}, 100);

			

			var div_id=($('div.active').attr("id"));

			current_div=div_id.replace("tab","");

			current_div=eval(current_div)-1;

			//alert(current_div);

			$("#buttonContinue").show(); 

			

			if(current_div==10)

			{

				$('.previous').hide();

				$(".next ").css("display", "block"); 

				$( "#tab10" ).css( "margin-top", "0px" );

				$( ".mobi_continue" ).css( "display","none" );

				$( "#top_forword" ).css( "margin-left", "35px" );

				$( "#top_forword" ).css( "margin-top", "5px" );

				

			}

			else{

				$('.previous').show();

				//$(".next ").css("display", "none");

			}

			if(current_div>1)

			{

				$(".next ").css("display", "background", "rgb(0,0,0,0.0)");

			} 

			

			if(current_div<10)

			{

				

				$(".second_image").hide();

			    $(".first_image").show();

				$(".lmb_ins_bkgrd").show();

				$("#buttonContinue").hide();

				$(".privacy_notes ").css("background", "rgb(0,0,0,0.0);");

				$("#fb_background").show(); 

				//$("body").css("background", "none repeat scroll 0 0 #76B0D9");

				$("#headline_second").hide();

				$("#headline").show();

				$(".mind_today").show(); 

				$("#fb_background").show();

				$("#headline").show();

				$("#mind_today").show();

				$("#headline_second").hide();

				

			}

			else{

				//alert(current_div)

				$(".second_image").show();

			    $(".first_image").hide();

				$(".lmb_ins_bkgrd").hide();

				$("#buttonContinue").show();

				$(".privacy_notes ").css("background", "transparent"); 

				$("body").css("background", "none repeat scroll 0 0 #76B0D9"); 

				$("#headline_second").show();

				$("#headline").hide();

				$(".mind_today").hide();

				$("#fb_background").hide();

				//$(".css-checkbox").css("width", "17px"); 

				//$(".css-checkbox").css("height", "14px");

				//$(".css-label").css("margin-left", "0px !important");

				//$(".css-label").css("margin-right", "0px !important");

				//$(".css-label").css("margin-top", "0px"); 

			}

			

			if(current_div<=3){

				$("#btf").hide();

				$("#heroimaged").show();

				$(".rqd_login_mobile").show(); 

				//$("#top_forword").hide(); 

			}else {

				$("#btf").hide();

				$("#heroimaged").show();

				$(".rqd_login_mobile").hide();  

				$(".mobi_continue").css("background", "linear-gradient(to bottom, #fbac43 0%,#e68b09 100%,#2989d8 100%,#2989d8 100%,#2989d8 100%)");

				$(".mobi_text").css("color", "#fff");

				$(".mobi_continue").css("border", "1px solid #221ce1");

				$(".mobi_continue").css("box-shadow", "none");

				 

				

				 var isMobile = window.matchMedia("only screen and (max-device-width: 768px) and (min-device-width: 320px)");

                  if (isMobile.matches) {

	                //$("body").css("background", "#76B0D9");

					 $("body").removeAttr('style');

					 //$("body").addAttr('style').css("background", "#76B0D9 !important;"); 

					  $("body").attr('style', 'background: #76B0D9 !important');

					  $(".lmb_ins_bkgrd").attr('style', 'display: none !important');

					  $("#foot_images").attr('style', 'display: none !important');

					  $("#wizard .privacy_notes").attr('style', 'background: #76B0D9 !important');

					  $(".main_form").attr('style', 'background: #fff !important');

					  $("#footerline").attr('style', 'border-bottom: 1px solid #ffffff !important');

                        if(current_div<=3){

					   $("body").css("background", "#fff !important"); 

				   }

				   else {

					   $(".rqd_login_mobile").hide();

					   

				   }

				   

	               } else{

					   $("#btf").show();

				$("#heroimaged").hide();

					   }

				   


				   

				   

			}

			if(current_div<2){ 

				$(".control-label").css("margin-top", "0px");

				$(".control-label").css("padding-top", "0px");

			} 

			

		});

		

		

		$("#top_previous").click(function(){

			$("#main_continue1").show();

			$(".btn_continue1").css( "display", "block");

			//$("#desk_suffix").css( "top", "-100px");

			//alert("HI")

			$(".mind_today").hide();

			

			if(current_div<10){

				$("#fisr_conti").show();

				$("#btn_nxt").hide();

				

			}else {

				$("#fisr_conti").hide();

				$("#btn_nxt").show();

			}

			if(current_div==10){

				$(".headline").hide();

				$(".fb_background").hide();

				$(".mind_today").hide();

				$("#headline_second").show();

				$(".mind_today2").show();

				$("#btn_nxt").show();

			}

			 

			if(current_div<=3){

				$("#btf").hide();

				$("#heroimaged").show();

				

			}else {

				$("#btf").show();

				$("#heroimaged").hide();

				$(".rqd_login_mobile").hide();  

				//$(".mobi_continue").css("background", "linear-gradient(to bottom, #fbac43 0%,#e68b09 100%,#2989d8 100%,#2989d8 100%,#2989d8 100%)");

				$(".mobi_text").css("color", "#fff");

				$(".mobi_continue").css("border", "1px solid #221ce1");

				$(".mobi_continue").css("box-shadow", "none");

				 

				

				 var isMobile = window.matchMedia("only screen and (max-device-width: 768px) and (min-device-width: 320px)");

                  if (isMobile.matches) {

	                //$("body").css("background", "#76B0D9");

					 $("body").removeAttr('style');

					 //$("body").addAttr('style').css("background", "#76B0D9 !important;"); 

					  //$("body").attr('style', 'background: #76B0D9 !important');

					  $(".lmb_ins_bkgrd").attr('style', 'display: none !important');

					  //$("#foot_images").attr('style', 'display: none !important');

					 // $("#wizard .privacy_notes").attr('style', 'background: #76B0D9 !important');

					  //$(".main_form").attr('style', 'background: #fff !important');

					  $(".mobi_continue").css("box-shadow", "1px -2px 8px 0px rgba(34, 28, 225, 0.67)");

					  $(".main_form").attr('style', 'background: #ffdfc0 !important');

					  $(".main_form").css("margin-top","-28px");

					 // $("#top_button").css("padding-top","21px");

					   $("#footerline").attr('style', 'border-bottom: 1px solid #999 !important');

					

					if(current_div<=3){

					   $("body").css("background", "#fff !important");

				   }else{

					   $("#btf").show();

				       $("#heroimaged").hide();

					   }

			if(current_div<10){

				$("#btf").show();

				$("#headline_second").show();

				$("#heroimaged").hide();

				$("#headline").hide();

				$( ".main_form" ).addClass( "after_tab10" );

			}else {

				$( ".main_form" ).removeClass( "after_tab10" );

			}

				   

	               } 

			}

			

			

		});

 

 

 function sleep(milliseconds) {

  var start = new Date().getTime();

  for (var i = 0; i < 1e7; i++) {

    if ((new Date().getTime() - start) > milliseconds){

      break;

    }

  }

}





	  	$('#rootwizard').bootstrapWizard({

	  		'tabClass': 'nav nav-pills',

	  		'onNext': function(tab, navigation, index) {

				 

				   

 	

	  			var $valid = $("#commentForm").valid();

	  			if(!$valid) {

	  				$validator.focusInvalid();

	  				return false;

	  			}

				else{

				 // sleep(5000);

				$('.main_form').animate({"left":"300px"},0);

				$('.main_form').animate({"left":"0px"},150);

				

				 

				}

	  		} 

	  	});

		

		

		

		$('#policy_for').on('change', function() {

			 if(this.value!="")

		   {

			  $('.main_form').animate({"left":"200px"},0);

			  $('.main_form').animate({"left":"0px"},"fast"); 

			  $('#rootwizard').bootstrapWizard('show',10);

			  $( ".previous" ).removeClass( "tbl10" );

			   

		   }

		   

		 });

		 $('#retirement').on('change', function() {

			 if(this.value!="")

		   {

			  $('.main_form').animate({"left":"200px"},0);

			  $('.main_form').animate({"left":"0px"},"fast");

			  $('#rootwizard').bootstrapWizard('show',12);

		   }

		   

		 });

		 $('.birth_date').on('change', function() {  

			var abc= $( "#dobMonth option:selected" ).val(); 

			var abc1= $( "#dobDate option:selected" ).val();

			var abc2= $( "#dobYear option:selected" ).val();

			 

			if(abc!="" && abc1!="" && abc2!="")

			{ 

			     $('.main_form').animate({"left":"200px"},0);

				 $('.main_form').animate({"left":"0px"},"fast");

				 $('#rootwizard').bootstrapWizard('show',11); 

			}

		 

		 });

		 

		 $('.height_info').on('change', function() { 

			var abc1= $( "#weight_aapl option:selected" ).val();

			var abc2= $( "#height_appl option:selected" ).val();

			if(abc1!="" && abc2!="")

			{

				 $('.main_form').animate({"left":"200px"},0);

				 $('.main_form').animate({"left":"0px"},"fast");

				 $('#rootwizard').bootstrapWizard('show',14);

			} 

		 });

	

		 $('#home_yes').click(function() {

		   if($('#home_yes').is(':checked')) { 

		   $("#additional_agents_main").show();

		   } 

		});

		$('#home_no').click(function() {

		   if($('#home_no').is(':checked')) { 

		   $("#additional_agents_main").hide();

		   } 

		});

		

		 



		$('#popup_contents_no').click(function() {

        if($('#popup_contents_no').is(':checked')) { 

        $("#modal").hide();

        } 

        });

		

		$(".showsaving").click(function(){

                 $("#saving_insurance").show();

                });

				var modal = (function(){

                // Generate the HTML and add it to the document

                $modal = $('<div id="modal" class="desktop_modal"></div>');

                $content = $('<div id="content"></div>');

                $close = $('<a id="close" href="#"></a>');



                $modal.hide();

                $modal.append($content, $close);



                $(document).ready(function(){

                    $('body').append($modal);                       

                });



                $close.click(function(e){

                    e.preventDefault();

                    $modal.hide();

                    $content.empty();

                });

                // Open the modal

                return function (content) {

                    $content.html(content);

                    // Center the modal in the viewport

                    $modal.css({

                        top: ($(window).height() - $modal.outerHeight()) / 2, 

                        left: ($(window).width() - $modal.outerWidth()) / 2

                    });

                    $modal.show();

                };

            }());

 

			 

		

	});	

	 

	</script>

<?php 

	if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {?>

<script>

	$(document).ready(function(){

	var $validator = $("#commentForm").validate({ 

		onclick: false,

			 errorPlacement: function(error, element) {

				 error.appendTo('.errordiv');

				   

			   },

			   

		  rules: {  

		    fname: {

		      required: true		      

		    }

			,

		    lname: {

		      required: true		      

		    }

			,

		    staddress: {

		      required: true		      

		    }

			,

		    city: {

		      required: true		      

		    } ,

		    weight_aapl: {

		      required: true		      

		    },

		    height_appl: {

		      required: true		      

		    },

		    home_owner: {

		      required: true		      

		    }, 

		    email: {

		      required: true,

			//email: true,		      

		    }, 

			gender: { 

		      required: true,   

		    }, 

			dobMonth: {

				required: true,

			},

			dobDate: {

				required: true,

			},

			dobYear: {

				required: true,

			},

			height_appl2:{

				required: true,

		    },

		  } ,

		   messages: {

            gender: {

                required: "Please select Gender."

            },

		

			weight_aapl: {

                required: "Please select Weight."

            },

			height_appl: {

                required: "Please select Height in Feet."

            },

			height_appl2: {

                required: "Please select Height in Inches."

            },

			dobMonth: {

                required: "Please select Birth date Month."

            },

			dobDate: {

                required: "Please select Birth date Date."

            },

			dobYear: {

                required: "Please select Birth date Year."

            }

        },

		errorPlacement: function (error, element) {

            alert(error.text());

        },

		});

	});

	</script>

<?php } else { ?>

<script>

    var $validator = $("#commentForm").validate({

			 errorPlacement: function(error, element) {
				 
				 if(element.attr('name')=='fname'){

				 	error.appendTo('#efname');
				 }else if(element.attr('name')=='lname'))
				 {
					 error.appendTo('#elname');
				 }else if(element.attr('name')=='staddress'))
				 {
					 error.appendTo('#estaddress');
				 }else if(element.attr('name')=='maritalstatus'))
				 {
					 error.appendTo('#emaritalstatus');
				 }else if(element.attr('name')=='phone'))
				 {
					 error.appendTo('#ephone');
				 }

			   }, 

		  rules: {

		    military_service: {

		      required: true

		    },

		    tobaco_use: {

		      required: true 

		    },

		    pilot_copilot: {

		      required: true		      

		    }

			,

		    fname: {

		      required: true		      

		    }

			,

		    lname: {

		      required: true		      

		    }

			,

		    staddress: {

		      required: true		      

		    }

			,

		    city: {

		      required: true		      

		    }

			,

		    have_scuba: {

		      required: true		      

		    },

		    reckless_driving: {

		      required: true		      

		    }, 

		    policy_for: {

		      required: true		      

		    }

			,

		    retirement: {

		      required: true		      

		    }

			,

		    suspended_lice: {

		      required: true		      

		    },

		    weight_aapl: {

		      required: true		      

		    },

		    height_appl: {

		      required: true		      

		    },

		    home_owner: {

		      required: true		      

		    },

		    medial_condition: {

		      required: true		      

		    },

		    term_lenght: {

		      required: true		      

		    },

		    policy_amount: {

		      required: true		      

		    },

		    email: {

		      required: true,

			  email: true,		      

		    },

		    moving_voilation: {

		      required: true		      

		    },

		    age: {

		      required: true		      

		    },

			gender: { 

		      required: true		      

		    },

			maritalstatus: {

		      required: true		      

		    }

		  } 

		});

</script>

<?php } ?>

<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=246762442156340";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>

<?php wp_footer(); ?>

<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
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

 <script type="text/javascript">

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-73239809-1', 'auto');

  ga('send', 'pageview');

</script>  
<script>
$(document).ready(function() {
$(".btn_continue_tab").click(function(){
	if($("body").find(".error"))
	{
			sleep[5000];
			grecaptcha.reset();
	}
	}); 	
}); 
</script>
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
</body>

</html>

