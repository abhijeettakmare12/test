<?php
/**
 * Template Name: LP1 Result
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header('landing');
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
			'zip' => $_GET['ur_zip'],
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
			'maritalstatus' => $_GET['maritalstatus']
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
<style>
html {
    margin-top: 0px !important;
}
.navigationwrp, .top_header, .footer, .copyrightwrp, #tawkchat-iframe-container, #tawkchat-iframe-container {
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
</style>

<div class="innertxt2">
    <div class="container">
        <div class="row">
            <!-- **************** KATCH **************** -->
             
            <script type="text/javascript" src=" //cdn.katch.com/p/ads/vm_loader.js"></script>
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
						$html.= '<div id="vm-productst"><span>Your Online <span class="vm-prod">Life Insurance</span> search in                                 <span class="vm-prod">'.$city_name.'</span><br>Returned these pre-qualified companies.</span>
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
<?php
get_footer();
