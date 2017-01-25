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




global $wpdb;
$wpdb->query("INSERT INTO `leads2`(`fname`, `lname`, `staddress`, `city`, `phone`, `dt`, `user_ip`, `MilitaryAffiliation`, `UsedTobacco`, `isPilot`, `doesScubaOrSkyDiving`, `DuiOrRecklessDriving`, `zip`, `policy_for`, `dob`, `retirement`, `revoke_lie`, `weight`, `height`, `homeowner`, `medi_condition`, `term_lenght`, `policy_amount`, `email`, `moving_voilation`, `age`, `maritalstatus`, `gender`, `referral_url`,`Currently_Insured`,`How_much_longer_until_you_retire`,`Desired_Term_Length`,`Desired_Policy_Coverage_Amount`) VALUES 
('".$_GET['fname']."','".$_GET['lname']."','".$_GET['staddress']."','".$_GET['city']."','".$_GET['phone']."','".current_time('mysql', 1)."','".$_SERVER['REMOTE_ADDR']."','".$_GET['military_service']."','".$_GET['tobaco_use']."','".$_GET['pilot_copilot']."','".$_GET['have_scuba']."','".$_GET['reckless_driving']."','".$_GET['location']."','".$_GET['policy_for']."','".$dob."','".$_GET['retirement']."','".$_GET['suspended_lice']."','".$_GET['weight_aapl']."','".$_GET['height_appl']."','".$_GET['home_owner']."','".$_GET['medial_condition']."','".$_GET['term_lenght']."','".$_GET['policy_amount']."','".$_GET['email']."','".$_GET['moving_voilation']."','".$new_age."','".$_GET['maritalstatus']."','".$_GET['gender']."','nationalinsuranceadvisors.com/landing-page','".$_GET['currently_insured']."','".$_GET['retirement']."','".$_GET['term_lenght']."','".$_GET['policy_amount']."')" );
/*$wpdb->insert(

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
			
			'maritalstatus' => $_GET['maritalstatus'],

			'gender' => $_GET['gender'] 

			

			//'referral_url' => $_SERVER['HTTP_REFERER']

			

        ), array(

            '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'

        )

);*/


		// Email send
$fname = $_GET['fname'];	
$lname = $_GET['lname'];
$staddress = $_GET['staddress'];
$maritalstatus = $_GET['maritalstatus'];
if(maritalstatus == 1){
         $maritalstatus = "Single";
}else{
         $maritalstatus  = "Married";
}

$phone = $_GET['phone'];	
$Military_Service = $_GET['military_service'];
if($Military_Service == 1){
	$Military_Service = "Yes";
}else{
	$Military_Service = "No";
}
$Tobacco = $_GET['tobaco_use'];
if($Tobacco == 1){
	$Tobacco = "Yes";
}else{
	$Tobacco = "No";
}
$Co_Pilot = $_GET['pilot_copilot'];
if($Co_Pilot == 1){
	$Co_Pilot = "Yes";
}else{
	$Co_Pilot = "No";
}
$Scuba = $_GET['have_scuba'];
if($Scuba == 1){
	$Scuba = "Yes";
}else{
	$Scuba = "No";
}
$Reckless_Driving = $_GET['reckless_driving'];
if($Reckless_Driving == 1){
	$Reckless_Driving = "Yes";
}else{
	$Reckless_Driving = "No";
}
$Moving_Violations = $_GET['moving_voilation'];
if($Moving_Violations == 1){
	$Moving_Violations = "Yes";
}else{
	$Moving_Violations = "No";
}
$revoke_lie = $_GET['suspended_lice'];
if($revoke_lie == 1){
	$revoke_lie = "Yes";
}else{
	$revoke_lie = "No";
}
$Currently_Insured = $_GET['currently_insured'];
if($Currently_Insured == 1){
	$Currently_Insured = "Yes";
}else{
	$Currently_Insured = "No";
}
$zip = $_GET['location'];
$policy_for = $_GET['policy_for'];
if ($policy_for == 1) {

	$policy_for = "Self";

}else if ($policy_for == 2){

	$policy_for = "Spouse";

}else if ($policy_for == 3){

	$policy_for = "Child";

}else if ($policy_for == 4){

	$policy_for = "Parent";

}elseif ($policy_for == 5) {

	$policy_for = "Other";

}

$dob = $_GET['dob'];
$retirement = $_GET['retirement'];
if ($retirement == 0) {

	$retirement = "Already Retired";

}else if ($retirement == 1){

	$retirement = "1";

}else if ($retirement == 2){

	$retirement = "2";

}else if ($retirement == 3){

	$retirement = "3";

}elseif ($retirement == 4) {

	$retirement = "4";

}elseif ($retirement == 5) {

	$retirement = "5";

}else {

	$retirement = "6 or more";

}
$gender = $_GET['gender'];
if($gender == 1){
	$gender = "Male";
}else{
	$gender = "Female";
}
$height = $_GET['height_appl'];
$weight = $_GET['weight_aapl'];
$homeowner = $_GET['home_owner'];
if($homeowner == 1){
	$homeowner = "Yes";
}else{
	$homeowner = "No";
}
$medi_condition = $_GET['medial_condition'];
if($medi_condition == 1){
	$medi_condition = "Yes";
}else{
	$medi_condition = "No";
}
$age = $new_age;
$Term_Leghth = $_GET['term_lenght'];
if ($Term_Leghth == 1) {

	$Term_Leghth = "10 year";

}else if ($Term_Leghth == 2){

	$Term_Leghth = "15 year";

}else if ($Term_Leghth == 3){

	$Term_Leghth = "20 year";

}else if ($Term_Leghth == 4){

	$Term_Leghth = "25 year";

}elseif ($Term_Leghth == 5) {

	$Term_Leghth = "30 year";

}
$policy_coverage = $_GET['policy_amount'];
if ($policy_coverage == 22) {

	$policy_coverage = "$25,000";

}else if ($policy_coverage == 1){

	$policy_coverage = "$50,000";

}else if ($policy_coverage == 2){

	$policy_coverage = "$100,000";

}else if ($policy_coverage == 3){

	$policy_coverage = "$150,000";

}else if ($policy_coverage == 4) {

	$policy_coverage = "$200,000";

}else if ($policy_coverage == 5){

	$policy_coverage = "$250,000";

}else if ($policy_coverage == 6){

	$policy_coverage = "$300,000";

}else if ($policy_coverage == 7){

	$policy_coverage = "350,000";

}else if ($policy_coverage == 8) {

	$policy_coverage = "$400,000";

}else if ($policy_coverage == 9){

	$policy_coverage = "$450,000";

}else if ($policy_coverage == 10){

	$policy_coverage = "$500,000";

}else if ($policy_coverage == 11){

	$policy_coverage = "$550,000";

}else if ($policy_coverage == 12) {

	$policy_coverage = "$600,000";

}else if ($policy_coverage == 13){

	$policy_coverage = "$700,000";

}else if ($policy_coverage == 14){

	$policy_coverage = "$800,000";

}else if ($policy_coverage == 15){

	$policy_coverage = "$900,000";

}else if ($policy_coverage == 16) {

	$policy_coverage = "$1,000,000";

}else if ($policy_coverage == 17) {

	$policy_coverage = "2,000,000";

}else if ($policy_coverage == 18){

	$policy_coverage = "3,000,000";

}else if ($policy_coverage == 19){

	$policy_coverage = "4,000,000";

}else if ($policy_coverage == 20){

	$policy_coverage = "5,000,000";

}else {

	$policy_coverage = "6,000,000";

}

$email_add = $_GET['email'];



		$subject="National Insurance Advisors - Free Insurence Policy";	
		
		$message_text.="<strong>First Name: </strong>".$fname."<br><br>";
		
		$message_text.="<strong>Last Name: </strong>".$lname."<br><br>";
		
		$message_text.="<strong>State Address: </strong>".$staddress."<br><br>";
		
		$message_text.="<strong>Marital Status: </strong>".$maritalstatus."<br><br>";
		
		$message_text.="<strong>Phone: </strong>".$phone."<br><br>";
		
		$message_text.="<strong>Military Service: </strong>".$Military_Service."<br><br>";
		
		$message_text.="<strong>Tobacco in last 12 months: </strong>".$Tobacco."<br><br>";
		
		$message_text.="<strong>Flown as a Pilot or Co-Pilot: </strong>".$Co_Pilot."<br><br>";
		
		$message_text.="<strong>Have Scuba or Sky Dived: </strong>".$Scuba."<br><br>";
		
		$message_text.="<strong>Reckless Driving or DUI offense: </strong>".$Reckless_Driving."<br><br>";
		
		$message_text.="<strong>More than 3 Moving Violations: </strong>".$Moving_Violations."<br><br>";
		
		$message_text.="<strong>Suspended/Revoked License: </strong>".$revoke_lie."<br><br>";
		
		$message_text.="<strong>Currently Insured: </strong>".$Currently_Insured."<br><br>";
		
		$message_text.="<strong>Zip Code: </strong>".$zip."<br><br>";
		
		$message_text.="<strong>Ppolicy for: </strong>".$policy_for."<br><br>";
		
		$message_text.="<strong>Date of Birth: </strong>".$old_dob."<br><br>";
		
		$message_text.="<strong>How much longer until you retire: </strong>".$retirement."<br><br>";
		
		$message_text.="<strong>Gender: </strong>".$gender."<br><br>";
		
		$message_text.="<strong>Height: </strong>".$height."<br><br>";
		
		$message_text.="<strong>Weight: </strong>".$weight."<br><br>";
		
		$message_text.="<strong>Are you a homeowner: </strong>".$homeowner."<br><br>";
		
		$message_text.="<strong>Major Medical Conditions: </strong>".$medi_condition."<br><br>";
		
		$message_text.="<strong>Desired Term Length: </strong>".$Term_Leghth."<br><br>";
		
		$message_text.="<strong>Desired Policy Coverage Amount: </strong>".$policy_coverage."<br><br>";
		
		$message_text.="<strong>Email: </strong>".$email_add."<br><br>";

		
		$ssite = ABSPATH . 'wp-content/plugins/nia_questionnaire/'; 
 
		require_once $ssite . '/Mobile-Detect/Mobile_Detect.php';
		
		$detect = new Mobile_Detect;
			if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {
				
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: <$email_add>" . "\r\n";
				
				if(mail('rgadalmobilea@gmail.com',$subject,$message_text,$headers)){ 
		
		          //header("Location: https://nationalinsuranceadvisors.com/thank-you"); 
		
			  } else{ 
							
				  echo "Mail was not sent!"; 
							
			  } 
			}else{
				
				
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: <$email_add>" . "\r\n";
		
			    if(mail('rgadala@gmail.com',$subject,$message_text,$headers)){ 

                  //header("Location: https://nationalinsuranceadvisors.com/thank-you"); 


			}else{ 

                  echo "Mail was not sent!"; 

			} 
			}
		
		//$to=get_option('admin_email');			

		// Always set content-type when sending HTML email

		//$headers = "MIME-Version: 1.0" . "\r\n";
		//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		//$headers .= "From: <$email_add>" . "\r\n";
		//@mail($to,$subject,$message_text,$headers);

		
		 //if(mail($to,$subject,$message_text,$headers)){ 

  //header("Location: https://nationalinsuranceadvisors.com/thank-you"); 

//}else{ 

  //echo "Mail was not sent!"; 

//}  


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

<body>


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

<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/931258116/?label=cmk-CIqg6mMQhL6HvAM&amp;guid=ON&amp;script=0"/>

</body>



<?php

//get_footer();

