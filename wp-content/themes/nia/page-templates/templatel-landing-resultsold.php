<?php

/**

 * Template Name: LP1 Result

 *

 * @package WordPress

 * @subpackage Twenty_Fourteen

 * @since Twenty Fourteen 1.0

 */

//get_header('landing');





global $wpdb;







$old_dob = $_GET['dobYear'] ."-" . $_GET['dobMonth'] ."-" . $_GET['dobDate'] ;//"2015-12-24"



//echo $dob;





$height_raw = $_GET['height_appl'];

$weight = $_GET['weight_aapl'];

$extract_height = str_replace('ft. /',',',$height_raw);

$height_arry = (explode(",",$extract_height));

$height_remove_inches = str_replace(' inches','',$height_arry[1]);

$calc_inches = $height_arry[0]*12+$height_remove_inches;

$final_inches = $calc_inches*$calc_inches; 

$weight_inponds = $weight*703;

$bmi = $weight_inponds/$final_inches;

if (($bmi > 18.5) && ($bmi < 24.9)) {

	 $bmi_val = 1;

}else if (($bmi > 25) && ($bmi < 29.9)){

	 $bmi_val = 2;

}else if (($bmi > 35) && ($bmi < 49)){

	 $bmi_val = 3;

}else if($bmi >= 30){

	 $bmi_val = 4;

}

//echo "</br>";

//echo $bmi_val;



$city_name = $_GET['hidden_city_name'];



function ageCalculator($dob){

    if(!empty($dob)){

        $birthdate = new DateTime($dob);

        $today   = new DateTime('today');

        $age = $birthdate->diff($today)->y;

        return $age;

    }else{

        return 0;

    }

}

$dob = $old_dob;



$new_age =  ageCalculator($dob);

 

if (($new_age > 18) && ($new_age < 24)) {

	$new_age = 1;

}else if (($new_age > 25) && ($new_age < 34)){

	$new_age = 2;

}else if (($new_age > 35) && ($new_age < 49)){

	$new_age = 3;

}else if (($new_age > 50) && ($new_age < 64)){

	$new_age = 4;

}elseif ($new_age > 65) {

	$new_age = 5;

}





$wpdb->insert(

        'leads2', array(

            'fname' => $_GET['fname'],

            'lname' => $_GET['lname'],

            'staddress' => $_GET['staddress'],

            'city' => $_GET['city'],

            'phone' => $_GET['phone'],

            'dt' => current_time('mysql', 1),

            'user_ip' => $_SERVER["REMOTE_ADDR"],

			'MilitaryAffiliation' => $_GET['military_service'],

			'UsedTobacco' => $_GET['tobaco_use'],

			'isPilot' => $_GET['pilot_copilot'],

			'doesScubaOrSkyDiving' => $_GET['have_scuba'],

			'DuiOrRecklessDriving' => $_GET['reckless_driving'], 

			//'zip' => $_GET['ur_zip'],

			'zip' => $_GET['location'],

			'policy_for' => $_GET['policy_for'],

			'dob' => $dob,

			'retirement' => $_GET['retirement'],

			'revoke_lie' =>$_GET['suspended_lice'],

			'weight' => $_GET['weight_aapl'],

			'height' => $_GET['height_appl'],

			'homeowner' => $_GET['home_owner'],

			'medi_condition' => $_GET['medial_condition'],

			'term_lenght' => $_GET['term_lenght'],

			'policy_amount' => $_GET['policy_amount'],

			'email' => $_GET['email'],

			'moving_voilation' => $_GET['moving_voilation'],

			'age' => $new_age,

			'gender' => $_GET['gender'], 

			'maritalstatus' => $_GET['maritalstatus'],

			//'referral_url' => $_SERVER['HTTP_REFERER']

			

        ), array(

            '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'

        )

);

?>

<?php //echo "ppp".$_GET['location']."<br />";?>

<?php //echo $_GET['term_lenght']."<br />";?>

<?php //echo $_GET['gender']."<br />";?>

<?php //echo $_GET['medial_condition']."<br />";?>

<?php //echo $_GET['maritalstatus']."<br />";?>

<?php //echo $_GET['new_age']."<br />";?>

<head>



	<link href="<?=get_bloginfo('template_directory');?>/css/bootstrap.min.css" rel="stylesheet">

	<link href="<?=get_bloginfo('template_directory');?>/css/style.css" rel="stylesheet">

	<link href="<?=get_bloginfo('template_directory');?>/css/media.css" rel="stylesheet">

	<link href="<?=get_bloginfo('template_directory');?>/css/box.css" rel="stylesheet">

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 

	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>	

	<link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>	

	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

<style>

html {

    margin-top: 0px !important;

}

.banner, .navigationwrp, .top_header, .footer, .copyrightwrp, #tawkchat-iframe-container, #tawkchat-iframe-container {

	display: none !important;

}

iframe{

	display:none !important;

	}

	#tawkchat-minified-box{

		display:none !important;

		}

		

#tawkchat-iframe-container{

	display:none !important;

	}	

#vm-header{

	display:none !important;

	}	

#vm-productst{

	width:90% !important;

	margin:0 auto !important;

	}

</style>

<!--Hotjar Tracking Code for http://nationalinsuranceadvisors.com/-->

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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73239809-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body>

<!-- Google Code for National Insurance Adviser - landing-page Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 931258116;
var google_conversion_language = "en";
var google_conversion_format = "1";
var google_conversion_color = "ffcc99";
var google_conversion_label = "cmk-CIqg6mMQhL6HvAM";
var google_conversion_value = 5.00;
var google_conversion_currency = "USD";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/931258116/?value=5.00&amp;currency_code=USD&amp;label=cmk-CIqg6mMQhL6HvAM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>




<div class="innertxt2">

    <div class="container">

        <div class="row">

            <!-- **************** KATCH **************** -->



            <!-- <script type="text/javascript" src=" //cdn.katch.com/p/ads/vm_loader.js"></script> -->

<script type="text/javascript" src="//cdn.katch.com/p/ads/vm_loader.js"></script>

            <script type="text/javascript">

                vm_load({

                    "publisherId": "40786", //Publisher ID

                    "campaign": "28360", //Numeric Publisher Campaign Id

                    "displayId": "16374", //Numeric unique ad display Id

                    "vmProdId": "600",

                    "location": "<?php echo $city_name;?>",

                    "maxResults": "10",

                    "engagementOption": "1", 

                    "p1": "",

                    "p2": "",

                    "p3": "",

                    "p4": "",

                    "p5": "",

					"age": "<?php echo $_GET['new_age'];?>", 

                    "BMI": "<?php echo $bmi_val; ?>",

					"coveragetype": "<?php echo $_GET['term_lenght'];?>",

                    "gender": "<?php echo $_GET['gender'];?>",

                    "healthconditions": "<?php echo $_GET['medial_condition'];?>",

                    "maritalstatus": "<?php echo $_GET['maritalstatus'];?>",

                    "tobaccouse": "2",

                });

            </script>

            

             <?php 

					$detect = new Mobile_Detect;

					if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {

						$html = '<div id="vmDisplay_heading">';

$html.= '<div id="vm-productst"><span>Your Online <span class="vm-prod">Life Insurance</span> search in <span class="vm-prod">'.$city_name.'</span><br>Returned these pre-qualified companies.</span>

	<span class="vm-cta">Shop Around: The Average Consumer compares <strong>3 rate quotes before 

								 choosing</strong></span></div></div>

                                 <div id="vmDisplay16374"></div>';

						$html.= '<div id="vmDisplay1644"></div>';

					    echo $html;

					}

					else{

						$html = '<div id="vmDisplay_heading">';

						$html.= '<div id="vm-productst"><span>Your Online <span class="vm-prod">Life Insurance</span> search in                                 <span class="vm-prod">'.$city_name.'</span><br>Returned these pre-qualified companies.</span>

						         <span class="vm-cta">Shop Around: The Average Consumer compares <strong>3 rate quotes before 

								 choosing</strong></span></div></div>

                                 <div id="vmDisplay16374"></div>';

						echo $html; 

						}

			 ?>

            

            

            <!-- **************** KATCH **************** -->

<?php

// Start the Loop.

/*

  while (have_posts()) : the_post();

  // Include the page content template.

  get_template_part('content', 'page');



  endwhile;

 */

?>

        </div><!-- #content -->

    </div><!-- #primary -->

</div><!-- #main-content -->

<script type="text/javascript" src="https://calltracking.nationalinsuranceadvisors.com/js/PhoneFormat.js"></script>

<script type="text/javascript" src="https://calltracking.nationalinsuranceadvisors.com/referrer_dynjs.php?c_id=1&format=US"></script>

<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/931258116/?label=M-7gCMjx_2UQhL6HvAM&amp;guid=ON&amp;script=0"/>

</body>



<?php

//get_footer();

