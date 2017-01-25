<?php
/**
 * Plugin Name: NIA Questionnaire
 * Plugin URI: 
 * Description: National Insurance Advisor User Questionnaire Plugin.
 * Author: NIA
 * Author URI: 
 * Version: 1.0
 * License: GPLv2 
*/

// Enqueue required Styles and Scripts
function nia_enquque_scripts()
{
    wp_enqueue_style('nia-Questionnaire-css', plugins_url('css/style.css', __FILE__));
    wp_enqueue_script('nia-Questionnaire-js', plugins_url('js/jquery-1.7.1.min.js', __FILE__), array('jquery')); 
	wp_enqueue_script('nia-Questionnaire-js', ('https://www.google.com/recaptcha/api.js'));
    
}

require plugin_dir_path(__FILE__) . 'admin/class-leads-records.php';

add_action( 'wp_enqueue_scripts', 'nia_enquque_scripts' );

add_action('admin_menu', 'leads_plugin_setup_menu');
 
function leads_plugin_setup_menu(){
        add_menu_page( 'Leads Plugin Page', 'Leads Records - landing-page', 'manage_options', 'leads-records', 'leads_init' );
}
 
function leads_init(){
        $admin_data = new Admin_Functionality();
}

add_action('wp_ajax_nopriv_export_csv_request', 'export_leads_data');
add_action('wp_ajax_export_csv_request', 'export_leads_data');
 
function export_leads_data() {
	define('SSM_PLUGIN_PATH', plugin_dir_path(__FILE__));
    require plugin_dir_path(__FILE__) . 'dompdf/dompdf_config.inc.php';
    //$output= "hi";
    global $wpdb;
	
    $table_name = 'leads2';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=leads_data.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('Id', 'First Name', 'Last Name', 'Street Address', 'City', 'Marital Status', 'Phone Number', 'Military Service?', 'Tobacco in last 12 months?', 'Flown as a Pilot or Co-Pilot?', 'Have Scuba or Sky Dived?', 'Reckless Driving or DUI offense?', 'More than 3 Moving Violations?', 'Suspended/Revoked License?', 'Your ZIP code', 'Policy For', 'Date of Birth', 'Age', 'Retirement','Gender','Height','Weight','Are you a homeowner?','Major Medical Conditions?','Desired Term Length','Desired Policy Coverage Amount','Email'));
    $data = $wpdb->get_results("SELECT id,fname, lname, staddress, city, maritalstatus, phone, MilitaryAffiliation, UsedTobacco, isPilot,doesScubaOrSkyDiving, DuiOrRecklessDriving, moving_voilation, revoke_lie, zip, policy_for,dob, age, retirement, gender, height, weight, homeowner, medi_condition, term_lenght, policy_amount, email FROM $table_name");

    for ($i = 0; $i < count($data); $i++) {

        fputcsv($output, array($data[$i]->id, $data[$i]->fname, $data[$i]->lname, $data[$i]->staddress, $data[$i]->city, $data[$i]->maritalstatus, $data[$i]->phone, $data[$i]->MilitaryAffiliation, $data[$i]->UsedTobacco, $data[$i]->isPilot, $data[$i]->doesScubaOrSkyDiving, $data[$i]->DuiOrRecklessDriving, $data[$i]->moving_voilation, $data[$i]->revoke_lie, $data[$i]->zip, $data[$i]->policy_for, $data[$i]->dob, $data[$i]->age, $data[$i]->retirement, $data[$i]->gender, $data[$i]->height, $data[$i]->weight, $data[$i]->homeowner, $data[$i]->medi_condition, $data[$i]->term_lenght, $data[$i]->policy_amount, $data[$i]->email));
    }

    fclose($output);
    die;
}
if (!function_exists('nia_Questionnaire')) {
require_once plugin_dir_path(__FILE__) . 'Mobile-Detect/Mobile_Detect.php';
	$detect = new Mobile_Detect;
	if ($detect->isMobile() && !$detect->isTablet() && !$detect->isiOS() ) {
	}
    
    function nia_Questionnaire() {
        
        $html = '';
       
        $html.='<form id="commentForm" name="commentForm" method="get" action="/results" class="form-horizontal">';

                $html.='<div id="rootwizard">';
                $html.='<ul style="display:none">';
                    $html.='<li><a href="#tab1" data-toggle="tab">First</a></li>';
                    $html.='<li><a href="#tab2" data-toggle="tab">Second</a></li>';
                    $html.='<li><a href="#tab3" data-toggle="tab">Third</a></li>';
					$html.='<li><a href="#tab4" data-toggle="tab">Four</a></li>';
                    $html.='<li><a href="#tab5" data-toggle="tab">Five</a></li>';
                    $html.='<li><a href="#tab6" data-toggle="tab">Six</a></li>';
					$html.='<li><a href="#tab7" data-toggle="tab">Seven</a></li>';
                    $html.='<li><a href="#tab8" data-toggle="tab">Eight</a></li>';
                    $html.='<li><a href="#tab9" data-toggle="tab">Nine</a></li>';
					$html.='<li><a href="#tab10" data-toggle="tab">Ten</a></li>';
                    $html.='<li><a href="#tab11" data-toggle="tab">Eleven</a></li>';
                    $html.='<li><a href="#tab12" data-toggle="tab">Twelve</a></li>';
					$html.='<li><a href="#tab13" data-toggle="tab">Thirteen</a></li>';
                    $html.='<li><a href="#tab14" data-toggle="tab">Fouteen</a></li>';
                    $html.='<li><a href="#tab15" data-toggle="tab">fifteen</a></li>';
					$html.='<li><a href="#tab16" data-toggle="tab">Sixteen</a></li>';
                    $html.='<li><a href="#tab17" data-toggle="tab">Seventeen</a></li>'; 
					$html.='<li><a href="#tab18" data-toggle="tab">18</a></li>';
                $html.='</ul>';
				$html.='<div class="tab-content">'; 
				$html.='<ul class="pager wizard" id="top_back">';
                    $html.='<li class="previous" id="top_button">«<a href="#" id="top_previous">  Back</a></li>';
					$html.='<li class="next" id="top_forword" style="text-align: left;display: none;"><a href="#" style="float: left; color: #333366 !important; font-size: 11px;padding-right: 5px;padding-top: 0px;text-decoration: underline;background: none;"> Forward </a>»</li>';  
				$html.='</ul>';
				
				$detect = new Mobile_Detect;
				if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() || $detect->version('iPad') || $detect->version('iPhone')) {
					
				$html.='<div class="tab-pane com_img" id="tab1" style="padding:15px;">';
                $html.='<div class="control-group">';
                $html.='<label class="control-label" for="military_service"><div id="veteran"></div>Veteran? &nbsp;<span style="font-size: 15px !important;font-weight:nomal !important;">(you or spouse)</span></label>';
				$html.='<div class="controls">';
				$html.='<ul class="pager">';	
$html.='<li class="next"><a href="#"><input type="radio" name="military_service" class="regular-radio big-radio" checked="checked"  value="2" id="radio-1-1"/><label for="radio-1-1" class="css-label" >No</label></a></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="military_service" class="regular-radio big-radio" value="1" id="radio-1-2"/><label for="radio-1-2" class="css-label" value="1">Yes</label></a></li>';
				$html.='</ul>';	
				$html.='</div>';
				$html.='<label class="control-label" for="Smoker">Smoker?</label>';
				$html.='<div class="controls">';
				$html.='<ul class="pager">';	
$html.='<li class="next"><a href="#"><input type="radio" name="smoker" class="regular-radio big-radio" checked="checked"  value="2" id="radio-1-3"/><label for="radio-1-3" class="css-label" >No</label></a></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="smoker" class="regular-radio big-radio" value="1" id="radio-1-4"/><label for="radio-1-4" class="css-label" value="1">Yes</label></a></li>';
                    
				$html.='</ul>';	
				$html.='</div>';
				
				$html.='<label class="control-label" for="Smoker">Pilot?</label>';
				$html.='<div class="controls">';
				$html.='<ul class="pager">';	
$html.='<li class="next"><a href="#"><input type="radio" name="pilot" class="regular-radio big-radio" checked="checked"  value="2" id="radio-1-5"/><label for="radio-1-5" class="css-label" >No</label></a></li>';
                    $html.='<li class="next"><a href="#"><input type="radio" name="pilot" class="regular-radio big-radio" value="1" id="radio-1-6"/><label for="radio-1-6" class="css-label" value="1">Yes</label></a></li>';
                   
				$html.='</ul>';	
				$html.='</div>';
				
				$html.='<label class="control-label" for="Smoker">Scuba or Skydiver?</label>';
				$html.='<div class="controls">';
				$html.='<ul class="pager">';	
 $html.='<li class="next"><a href="#"><input type="radio" name="Scuba" class="regular-radio big-radio" checked="checked"  value="2" id="radio-1-7"/><label for="radio-1-7" class="css-label" >No</label></a></li>';
                    $html.='<li class="next"><a href="#"><input type="radio" name="Scuba" class="regular-radio big-radio" value="1" id="radio-1-8"/><label for="radio-1-8" class="css-label" value="1">Yes</label></a></li>';
                   
				$html.='</ul>';	
				$html.='</div>';
                $html.='</div>'; 
				$html.='</div>';											
				
			
				$html.='<div class="tab-pane com_img" id="tab2">';
                $html.='<div class="control-group">';
                 
      $html.='<label class="control-label" for="Smoker">Reckless Driving or DUI offense?</label> <br><span>convicted of Reckless Driving or Driving Under the Influence in the last 5 years</span>';
				$html.='<div class="controls">';
				$html.='<ul class="pager">';	
$html.='<li class="next"><a href="#"><input type="radio" name="reckless_driving" class="required  regular-radio big-radio" checked="checked" value="2" id="radio-2-1"/><label for="radio-2-1" class="css-label" >No</label></a></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="reckless_driving" class="required regular-radio big-radio" value="1" id="radio-2-2"/><label for="radio-2-2" class="css-label" value="1">Yes</label></a></li>';
				$html.='</ul>';	
				$html.='</div>'; 
				
				  $html.='<label class="control-label" for="Smoker">More Than 3 Moving Violations ?</label><br><span>Cited with more than 3 moving violations in  the last 5 years</span>';
				$html.='<div class="controls">';
				$html.='<ul class="pager">';	
$html.='<li class="next"><a href="#"><input type="radio" name="Violations" class="required  regular-radio big-radio" checked="checked" value="2" id="radio-2-3"/><label for="radio-2-3" class="css-label" >No</label></a></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="Violations" class="required regular-radio big-radio" value="1" id="radio-2-4"/><label for="radio-2-4" class="css-label" value="1">Yes</label></a></li>';
                   
				$html.='</ul>';	
				$html.='</div>'; 
				
				 $html.='<label class="control-label" for="Smoker">Suspended/Revoked License?</label><br><span>Licences has been suspended/revoked with in the last 5 years</span>';
				$html.='<div class="controls">';
				$html.='<ul class="pager">';	
$html.='<li class="next"><a href="#"><input type="radio" name="suspended_license" class="required  regular-radio big-radio" checked="checked" value="2" id="radio-2-5"/><label for="radio-2-5" class="css-label" >No</label></a></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="suspended_license" class="required  regular-radio big-radio" value="1" id="radio-2-6"/><label for="radio-2-6" class="css-label" value="1">Yes</label></a></li>';
                   
				$html.='</ul>';	
				$html.='</div>'; 
				
				$html.='<label class="control-label" for="Smoker">Currently insured?</label>';
				$html.='<div class="controls">';
				$html.='<ul class="pager">';
$html.='<li class="next"><a href="#"><input type="radio" name="insured" class="required  regular-radio big-radio" checked="checked" value="2" id="radio-2-7"/><label for="radio-2-7" class="css-label" >No</label></a></li>';	
$html.='<li class="next"><a href="#"><input type="radio" name="insured" class="required regular-radio big-radio" value="1" id="radio-2-8"/><label for="radio-2-8" class="css-label" value="1">Yes</label></a></li>';
                    
				$html.='</ul>';	
				$html.='</div>'; 
                   
               
                $html.='</div>'; 
				$html.='</div>';	
				}
				
				else if (strstr($_SERVER['HTTP_USER_AGENT'], 'iPad')) {
              echo "You are on an iPad";
                  }
				else{
					//$html.='<input type="hidden" name="referral-url" value="'.$_SERVER['HTTP_REFERER'].'"/>';
					$html.='<div class="tab-pane com_img" id="tab1">';
				
           $html.='<div class="control-group">';
           $html.='<label class="control-label" for="military_service" style="letter-spacing:0;">Military Service? <span style="font-size: 15px;font-weight:bold;">(you or spouse)</span></label>';
				$html.='<div class="controls">';
				
				$html.='<ul class="pager wizard">';	
$html.='<li class="next"><a href="#"><input type="radio" name="military_service" class="required regular-radio big-radio" value="1" id="radio-1-1"/><label for="radio-1-1" class="css-label" value="1">Yes</label></a></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="military_service" class="required  regular-radio big-radio" value="2" id="radio-1-2"></label><label for="radio-1-2" class="css-label" >No</label></a></li>';
				$html.='</ul>';	
				$html.='<span class="errordiv"></span>';	
				$html.='</div>';
                $html.='</div>'; 
				$html.='</div>';
					
					$html.='<div class="tab-pane com_img" id="tab2">';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="tobaco_use" style="letter-spacing:0;">Tobacco in last 12 months?</label>';
				$html.='<div class="controls">'; 
				
				$html.='<ul class="pager wizard">';	
$html.='<li class="next"><a href="#"><input type="radio" name="tobaco_use" class="required regular-radio big-radio" value="1"><label for="radio-2-1" class="css-label" value="1">Yes</label></a></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="tobaco_use" class="required regular-radio big-radio" value="2"/><label for="radio-2-2" class="css-label" >No</label></a></li>';
				$html.='</ul>';
				$html.='<span class="errordiv"></span>';
				$html.='</div>';
                $html.='</div>'; 
				$html.='</div>';	
					
				$html.='<div class="tab-pane com_img" id="tab3">';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="pilot_copilot" style="letter-spacing:0;">Flown as a Pilot or Co-Pilot?</label>';
				$html.='<div class="controls">';
					
                $html.='<ul class="pager wizard">';	
$html.='<li class="next"><a href="#"><input type="radio" name="pilot_copilot" class="required regular-radio big-radio" value="1" id="radio-3-1"><label for="radio1" class="css-label" value="1">Yes</label></a></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="pilot_copilot" class="required regular-radio big-radio" value="2" id="radio-3-2"/><label for="radio2" class="css-label" >No</label></a></li>';
				$html.='</ul>';	
				$html.='<span class="errordiv"></span>';
				$html.='</div>';
                $html.='</div>'; 
				$html.='</div>';
				
				$html.='<div class="tab-pane com_img" id="tab4">';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="have_scuba">Have Scuba or Sky Dived?</label>';
				$html.='<div class="controls">';
				
				$html.='<ul class="pager wizard">';	
$html.='<li class="next"><a href="#"><input type="radio" name="have_scuba" class="required regular-radio big-radio" value="1" id="radio-4-1"/><label for="radio-4-1" class="css-label" value="1">Yes</label></a></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="have_scuba" class="required regular-radio big-radio" value="2" id="radio-4-2"/><label for="radio-4-2" class="css-label" >No</label></a></li>';
				$html.='</ul>';
				$html.='<span class="errordiv"></span>';		
				$html.='</div>';
                $html.='</div>'; 
				$html.='</div>';
				
				$html.='<div class="tab-pane com_img" id="tab5">';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="reckless_driving">Reckless Driving or DUI offense?</label>';
				$html.='<div class="controls">';
				$html.='<ul class="pager wizard">';	
$html.='<li class="next"><a href="#"><input type="radio" name="reckless_driving" class="required regular-radio big-radio" value="1" id="radio-5-1"/><label for="radio-5-1" class="css-label" value="1">Yes</label></a></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="reckless_driving" class="required regular-radio big-radio" value="2" id="radio-5-2"/><label for="radio-5-2" class="css-label" >No</label></a></li><br />';
				$html.='</ul>';	
				$html.='<span class="errordiv"></span>';
					$html.='<span class="field-suffix" id="desk_suffix">Convicted of Reckless Driving or Driving Under the Influence in the last 5 years</span>';
						
				$html.='</div>';
                $html.='</div>'; 
				$html.='</div>';
				
				$html.='<div class="tab-pane com_img" id="tab6">';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="moving_voilation">More than 3 Moving Violations?</label>';
				$html.='<div class="controls">';
				$html.='<ul class="pager wizard">';		
$html.='<li class="next"><a href="#"><input type="radio" name="moving_voilation" class="required regular-radio big-radio" value="1" id="radio-6-1"/><label for="radio-6-1" class="css-label" value="1">Yes</label></a></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="moving_voilation" class="required regular-radio big-radio" value="2" id="radio-6-2"/><label for="radio-6-2" class="css-label" >No</label></a></li><br />';
				$html.='</ul>';	
				$html.='<span class="errordiv"></span>';
					$html.='<span id="desk_suffix" class="field-suffix">Cited with more than 3 moving violations in the last 5 years</span>';
					
				$html.='</div>';
                $html.='</div>'; 
				$html.='</div>';
				
				$html.='<div class="tab-pane com_img" id="tab7">';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="suspended_lice">Suspended/Revoked License?</label>';
				$html.='<div class="controls">';
				
				$html.='<ul class="pager wizard">';		
$html.='<li class="next"><a href="#"><input type="radio" name="suspended_lice" class="required regular-radio big-radio" value="1" id="radio-7-1"/><label for="radio-7-1" class="css-label" value="1">Yes</label></a></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="suspended_lice" class="required regular-radio big-radio" value="2" id="radio-7-2"/><label for="radio-7-2" class="css-label" >No</label></a></li>';
				$html.='</ul>';	
				$html.='<span class="errordiv"></span>';
				$html.='<span class="field-suffix" id="desk_suffix">License has been suspended/revoked with in the last 5 years</span>';	
				$html.='</div>';
                $html.='</div>'; 
				$html.='</div>';
				
				$html.='<div class="tab-pane com_img" id="tab8">';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="currently_insured?">Currently Insured?</label>';
				$html.='<div class="controls">';
				
				$html.='<ul class="pager wizard">';		
$html.='<li class="next"><a href="#"><input type="radio" name="currently_insured" class="required regular-radio big-radio" value="1" id="radio-8-1"/><label for="radio-8-1" class="css-label" value="1">Yes</label></a></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="currently_insured" class="required regular-radio big-radio" value="2" id="radio-8-2"/><label for="radio-8-2" class="css-label" >No</label></a></li>';
				$html.='</ul>';	
				$html.='<span class="errordiv"></span>';	
				$html.='</div>';
                $html.='</div>'; 
				$html.='</div>';	
					
				}
				 
				
				$detect = new Mobile_Detect;
				if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {
					$html.='<div class="tab-pane com_img" id="tab3">';
				$html.='<div class="control-group">';
                    $html.='<label class="control-label" for="home_owner">Do you own your home?</label>';
				 	 
				$html.='<div class="controls">';  
$html.='<input type="radio" name="home_owner" id="home_no" class="required regular-radio big-radio" value="2"/><label for="home_no" class="css-label" >No</label>'; 
$html.='<input type="radio" name="home_owner" id="home_yes" class="required regular-radio big-radio" value="1"/><label for="home_yes" class="css-label" value="1">Yes</label>';
				$html.='</div>'; 
				$html.='</div>';
				
				$html.='<div class="control-group" id="additional_agents_main" style="display:none;">';
                    $html.='<label class="control-label" for="additional_agents">I would like to look for saving on my Home Insurence</label><span>Will receive quotes from additional agents.</span>';
				 	 
				$html.='<div class="controls">';  
$html.='<input type="radio" name="additional_agents" class="required  regular-radio big-radio" value="2" id="radio-3-2"/><label for="radio-3-2" class="css-label" >No</label>'; 
$html.='<input type="radio" name="additional_agents" class="required regular-radio big-radio" value="1" id="radio-3-3"/></label> <label for="radio-3-3" class="css-label" value="1">Yes</label>';
				$html.='</div>'; 
				$html.='</div>';
					
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="suspended_lice" id="zip_title">Your ZIP code:</label>';
				$html.='<div class="controls" id="zip_control">'; 
					$html.='<div id="mArrow" style="display: block; position: absolute; top: 148px; left: 15px; overflow: visible; animation-duration: 20ms;"></div>'; 
                    $html.='<input type="text" name="location" id="mzip" class="css-checkbox" maxlength="5"/>'; 
	                $html.='</div>';
					$html.='<div id="checkmarkBox" class="dlpPanel"></div>';
					$html.='<div id="markBox" class=""></div>';
				$html.='<div class="use_map">'; 
				$html.='<img src="https://nationalinsuranceadvisors.com/wp-content/themes/nia/images/usmap.jpg" alt="" />';
                $html.='</div>'; 
				$html.='</div>'; 
				$html.='</div>';
					
				}else{
				$html.='<div class="tab-pane com_img for_zipcode" id="tab9">';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="suspended_lice" id="zip_title">Your ZIP code:</label>';
				$html.='<div class="controls" id="zip_control">';  
                    $html.='<input type="text" name="location" id="zip" class="css-checkbox" />'; 
				$html.='</div>';
				$html.='<div class="use_map">'; 
					$html.='<img src="https://nationalinsuranceadvisors.com/wp-content/themes/nia/images/usmap.jpg" alt="" />';
                $html.='</div>'; 
				$html.='<span class="errordiv"></span>';
				$html.='</div>'; 
				$html.='</div>';
				
				}
				
				$detect = new Mobile_Detect;
				if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {
				
				$html.='<div class="tab-pane com_img2" id="tab4">';
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 64.7059px;"></div>'; 	
					$html.='</div>';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="policy_for">Policy For</label>';
					 	
				$html.='<div class="controls">'; 	
                    $html.='<select name="policy_for">';
					$html.='<option value="">Select one</option>';	
                    $html.='<option value="1" selected="selected">Self</option>';
                    $html.='<option value="2">Spouse</option>';
					$html.='<option value="3">Child</option>';
                    $html.='<option value="4">Parent</option>';
					$html.='<option value="5">Other</option>';
				$html.='</select>';
				$html.='<input type="hidden" name="hidden_city_name" id="hidden_city_name" value=""/>';
				$html.='</div>';
                $html.='</div>'; 
				$html.='</div>';
				}else{
				$html.='<div class="tab-pane com_img2" id="tab10">';
				
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 51.7647px;"></div>'; 	
					$html.='</div>';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="policy_for">Policy For <span style="font-size: 15px;font-weight:bold;">(applicant)</span></label>';
					 
				$html.='<div class="controls">'; 	
                    $html.='<select name="policy_for" id="policy_for">';
					$html.='<option value="">Select one</option>';	
                    $html.='<option value="1">Self</option>';
                    $html.='<option value="2">Spouse</option>';
					$html.='<option value="3">Child</option>';
                    $html.='<option value="4">Parent</option>';
					$html.='<option value="5">Other</option>';
				$html.='</select>';
				$html.='<input type="hidden" name="hidden_city_name" id="hidden_city_name" value=""/>';
				$html.='</div>';
				
				$html.='<span class="errordiv"></span>'; 
                $html.='</div>'; 
				$html.='</div>';
				}
				
				
				$detect = new Mobile_Detect;
				if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {
				$html.='<div class="tab-pane com_img2" id="tab5">';
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 77.7059px;"></div>'; 	
					$html.='</div>';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="gender">Gender</label><br><span class="gender_span">Find our about policies available to both men and women</span>';
				 	
				$html.='<div class="controls" id="gender_control">'; 
				
				$html.='<ul class="pager wizard" style="clear: both;">';	 	
$html.='<li><a href="#"><input type="radio" name="gender" class="required regular-radio big-radio" value="1" checked="checked" id="radio-5-1"/><label for="radio-5-1" class="css-label" value="1">Male</label></a></li>';
$html.='<li><a href="#"><input type="radio" name="gender" class="required  regular-radio big-radio" value="2" id="radio-5-2"/><label for="radio-5-2" class="css-label" >Female</label></a></li>'; 
				$html.='</ul>';
                $html.='</div>'; 
				$html.='</div>';
				$html.='</div>';
					 
				}else{
				$html.='<div class="tab-pane com_img2" id="tab11">';
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 69.7059px;"></div>'; 	
					$html.='</div>';
				$html.='<div class="control-group">';
                    $html.='<label class="control-label" for="suspended_lice">Date of Birth <span style="font-size: 15px;font-weight:bold;">(applicant)</span></label>';
				 	
				$html.='<div class="controls">';
				$html.='<div class="selectwrp_multi">';	
                    $html.='<select name="dobMonth" id="dobMonth" class="birth_date">';
					$html.='<option value="">MM</option>';	
                    $html.='<option value="01">01</option>';
                    $html.='<option value="02">02</option>';
					$html.='<option value="03">03</option>';
                    $html.='<option value="04">04</option>';
					$html.='<option value="05">05</option>';
					$html.='<option value="06">06</option>';
					$html.='<option value="07">07</option>';
					$html.='<option value="08">08</option>';
					$html.='<option value="09">09</option>';
					$html.='<option value="10">10</option>';
					$html.='<option value="11">11</option>';
					$html.='<option value="12">12</option>';
				$html.='</select>';
				$html.='</div>';
				
				$html.='<div class="selectwrp_multi">';	
                    $html.='<select name="dobDate" id="dobDate" class="birth_date">';
					$html.='<option value="">DD</option>';	
                    $html.='<option value="01">01</option>';
                    $html.='<option value="02">02</option>';
					$html.='<option value="03">03</option>';
                    $html.='<option value="04">04</option>';
					$html.='<option value="05">05</option>';
					$html.='<option value="06">06</option>';
					$html.='<option value="07">07</option>';
					$html.='<option value="08">08</option>';
					$html.='<option value="09">09</option>';
					$html.='<option value="10">10</option>';
					$html.='<option value="11">11</option>';
					$html.='<option value="12">12</option>';
					$html.='<option value="13">13</option>'; 
					$html.='<option value="14">14</option>';
					$html.='<option value="15">15</option>';
					$html.='<option value="16">16</option>';
					$html.='<option value="17">17</option>';
					$html.='<option value="18">18</option>';
					$html.='<option value="19">19</option>';
					$html.='<option value="20">20</option>';
					$html.='<option value="21">21</option>';
					$html.='<option value="22">22</option>';
					$html.='<option value="23">23</option>';
					$html.='<option value="24">24</option>';
					$html.='<option value="25">25</option>';
					$html.='<option value="26">26</option>';
					$html.='<option value="27">27</option>';
					$html.='<option value="28">28</option>';
					$html.='<option value="29">29</option>';
					$html.='<option value="30">30</option>';
					$html.='<option value="31">31</option>'; 
				$html.='</select>';
				$html.='</div>';
				
				$html.='<div class="selectwrp_multi">';	
                    $html.='<select name="dobYear" id="dobYear" class="birth_date">';
					$html.='<option value="">YYYY</option>';	
                    $html.='<option value="1997">1997</option>';
                    $html.='<option value="1996">1996</option>';
					$html.='<option value="1995">1995</option>';
                    $html.='<option value="1994">1994</option>';
					$html.='<option value="1993">1993</option>';
					$html.='<option value="1992">1992</option>';
					$html.='<option value="1991">1991</option>';
					$html.='<option value="1990">1990</option>';
					$html.='<option value="1989">1989</option>';
					$html.='<option value="1988">1988</option>';
					$html.='<option value="1987">1987</option>';
					$html.='<option value="1986">1986</option>';
					$html.='<option value="1985">1985</option>';
					$html.='<option value="1984">1984</option>';
					$html.='<option value="1983">1983</option>';
					$html.='<option value="1982">1982</option>';
					$html.='<option value="1981">1981</option>';
					$html.='<option value="1980">1980</option>';
					$html.='<option value="1979">1979</option>';
					$html.='<option value="1978">1978</option>';
					$html.='<option value="1977">1977</option>';
					$html.='<option value="1976">1976</option>';
					$html.='<option value="1975">1975</option>';
					$html.='<option value="1974">1974</option>';
					$html.='<option value="1973">1973</option>';
					$html.='<option value="1972">1972</option>';
					$html.='<option value="1971">1971</option>';
					$html.='<option value="1970">1970</option>';
					$html.='<option value="1969">1969</option>';
					$html.='<option value="1968">1968</option>';
					$html.='<option value="1967">1967</option>'; 
					$html.='<option value="1966">1966</option>'; 
					$html.='<option value="1965">1965</option>'; 
					$html.='<option value="1964">1964</option>'; 
					$html.='<option value="1963">1963</option>'; 
					$html.='<option value="1962">1962</option>'; 
					$html.='<option value="1961">1961</option>'; 
					$html.='<option value="1960">1960</option>'; 
					$html.='<option value="1959">1959</option>'; 
					$html.='<option value="1958">1958</option>'; 
					$html.='<option value="1957">1957</option>'; 
					$html.='<option value="1956">1956</option>';
					$html.='<option value="1955">1955</option>';
					$html.='<option value="1954">1954</option>';
					$html.='<option value="1953">1953</option>';
					$html.='<option value="1952">1952</option>';
					$html.='<option value="1951">1951</option>';
					$html.='<option value="1950">1950</option>';
					$html.='<option value="1949">1949</option>';
					$html.='<option value="1948">1948</option>';
					$html.='<option value="1947">1947</option>';
					$html.='<option value="1946">1946</option>';
					$html.='<option value="1945">1945</option>';
					$html.='<option value="1944">1944</option>';
					$html.='<option value="1943">1943</option>';
					$html.='<option value="1942">1942</option>';
					$html.='<option value="1941">1941</option>';
					$html.='<option value="1940">1940</option>';
					$html.='<option value="1939">1939</option>';
					$html.='<option value="1938">1938</option>';
					$html.='<option value="1937">1937</option>';
					$html.='<option value="1936">1936</option>';
					$html.='<option value="1935">1935</option>';
					$html.='<option value="1934">1934</option>';
					$html.='<option value="1933">1933</option>';
				$html.='</select>';
				$html.='</div>'; 
				$html.='</div>';
				$html.='<span class="errordiv"></span>';
                $html.='</div>';
				
               
				$html.='</div>';  
				
				$html.='<div class="tab-pane com_img2" id="tab12">';
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 73.7059px;"></div>'; 	
					$html.='</div>';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="retirement">How much longer until you retire?</span></label>';
				 
				$html.='<div class="controls">';
					
                    $html.='<select name="retirement" id="retirement">';
					$html.='<option value="">Select one</option>';
					$html.='<option value="0">Already retired</option>';	
                    $html.='<option value="1">1</option>';
                    $html.='<option value="2">2</option>';
					$html.='<option value="3">3</option>';
                    $html.='<option value="4">4</option>';
					$html.='<option value="5">5</option>';
					$html.='<option value="6">6 or more</option>';
				$html.='</select>';
				$html.='<span class="field-suffix">OK to estimate</span>';
				$html.='<span class="errordiv"></span>';	
				$html.='</div>';
                $html.='</div>'; 
				$html.='</div>';
				}
				
				$detect = new Mobile_Detect;
				if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {
				
				$html.='<div class="tab-pane com_img2" id="tab6">';
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 64.7059px;"></div>'; 	
					$html.='</div>';	
				$html.='<div class="control-group">';
                    $html.='<label class="control-label" for="suspended_lice">Date of Birth</label>';
				 	
				$html.='<div class="controls">';
				$html.='<div class="selectwrp_multi">';	
                    $html.='<select name="dobMonth" id="dobMonth" class="select_month">';
					$html.='<option value="">MM</option>';	
                    $html.='<option value="01">01</option>';
                    $html.='<option value="02">02</option>';
					$html.='<option value="03">03</option>';
                    $html.='<option value="04">04</option>';
					$html.='<option value="05">05</option>';
					$html.='<option value="06">06</option>';
					$html.='<option value="07">07</option>';
					$html.='<option value="08">08</option>';
					$html.='<option value="09">09</option>';
					$html.='<option value="10">10</option>';
					$html.='<option value="11">11</option>';
					$html.='<option value="12">12</option>';
				$html.='</select>';
				$html.='</div>';
				
				$html.='<div class="selectwrp_multi">';	
                    $html.='<select name="dobDate" id="dobDate" class="birth_date">';
					$html.='<option value="">DD</option>';	
                    $html.='<option value="01">01</option>';
                    $html.='<option value="02">02</option>';
					$html.='<option value="03">03</option>';
                    $html.='<option value="04">04</option>';
					$html.='<option value="05">05</option>';
					$html.='<option value="06">06</option>';
					$html.='<option value="07">07</option>';
					$html.='<option value="08">08</option>';
					$html.='<option value="09">09</option>';
					$html.='<option value="10">10</option>';
					$html.='<option value="11">11</option>';
					$html.='<option value="12">12</option>';
					$html.='<option value="13">13</option>'; 
					$html.='<option value="14">14</option>';
					$html.='<option value="15">15</option>';
					$html.='<option value="16">16</option>';
					$html.='<option value="17">17</option>';
					$html.='<option value="18">18</option>';
					$html.='<option value="19">19</option>';
					$html.='<option value="20">20</option>';
					$html.='<option value="21">21</option>';
					$html.='<option value="22">22</option>';
					$html.='<option value="23">23</option>';
					$html.='<option value="24">24</option>';
					$html.='<option value="25">25</option>';
					$html.='<option value="26">26</option>';
					$html.='<option value="27">27</option>';
					$html.='<option value="28">28</option>';
					$html.='<option value="29">29</option>';
					$html.='<option value="30">30</option>';
					$html.='<option value="31">31</option>'; 
				$html.='</select>';
				$html.='</div>';
				
				$html.='<div class="selectwrp_multi">';	
                    $html.='<select name="dobYear" id="dobYear" class="birth_year">';
					$html.='<option value="">YYYY</option>';	
                    $html.='<option value="1997">1997</option>';
                    $html.='<option value="1996">1996</option>';
					$html.='<option value="1995">1995</option>';
                    $html.='<option value="1994">1994</option>';
					$html.='<option value="1993">1993</option>';
					$html.='<option value="1992">1992</option>';
					$html.='<option value="1991">1991</option>';
					$html.='<option value="1990">1990</option>';
					$html.='<option value="1989">1989</option>';
					$html.='<option value="1988">1988</option>';
					$html.='<option value="1987">1987</option>';
					$html.='<option value="1986">1986</option>';
					$html.='<option value="1985">1985</option>';
					$html.='<option value="1984">1984</option>';
					$html.='<option value="1983">1983</option>';
					$html.='<option value="1982">1982</option>';
					$html.='<option value="1981">1981</option>';
					$html.='<option value="1980">1980</option>';
					$html.='<option value="1979">1979</option>';
					$html.='<option value="1978">1978</option>';
					$html.='<option value="1977">1977</option>';
					$html.='<option value="1976">1976</option>';
					$html.='<option value="1975">1975</option>';
					$html.='<option value="1974">1974</option>';
					$html.='<option value="1973">1973</option>';
					$html.='<option value="1972">1972</option>';
					$html.='<option value="1971">1971</option>';
					$html.='<option value="1970">1970</option>';
					$html.='<option value="1969">1969</option>';
					$html.='<option value="1968">1968</option>';
					$html.='<option value="1967">1967</option>'; 
					$html.='<option value="1966">1966</option>'; 
					$html.='<option value="1965">1965</option>'; 
					$html.='<option value="1964">1964</option>'; 
					$html.='<option value="1963">1963</option>'; 
					$html.='<option value="1962">1962</option>'; 
					$html.='<option value="1961">1961</option>'; 
					$html.='<option value="1960">1960</option>'; 
					$html.='<option value="1959">1959</option>'; 
					$html.='<option value="1958">1958</option>'; 
					$html.='<option value="1957">1957</option>'; 
					$html.='<option value="1956">1956</option>';
					$html.='<option value="1955">1955</option>';
					$html.='<option value="1954">1954</option>';
					$html.='<option value="1953">1953</option>';
					$html.='<option value="1952">1952</option>';
					$html.='<option value="1951">1951</option>';
					$html.='<option value="1950">1950</option>';
					$html.='<option value="1949">1949</option>';
					$html.='<option value="1948">1948</option>';
					$html.='<option value="1947">1947</option>';
					$html.='<option value="1946">1946</option>';
					$html.='<option value="1945">1945</option>';
					$html.='<option value="1944">1944</option>';
					$html.='<option value="1943">1943</option>';
					$html.='<option value="1942">1942</option>';
					$html.='<option value="1941">1941</option>';
					$html.='<option value="1940">1940</option>';
					$html.='<option value="1939">1939</option>';
					$html.='<option value="1938">1938</option>';
					$html.='<option value="1937">1937</option>';
					$html.='<option value="1936">1936</option>';
					$html.='<option value="1935">1935</option>';
					$html.='<option value="1934">1934</option>';
					$html.='<option value="1933">1933</option>';
				$html.='</select>';
				$html.='</div>'; 
				$html.='</div>';
                $html.='</div>'; 
				$html.='</div>';
				
				}else{
				$html.='<div class="tab-pane com_img2" id="tab13">';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="gender">Gender <span style="font-size: 15px;font-weight:bold;">(applicant)</span></label>';
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 77.7059px;"></div>'; 	
					$html.='</div>';	
				$html.='<div class="controls">'; 
				
$html.='<ul class="pager wizard" style="clear: both;">';
	 	
$html.='<li class="next"><a href="#"><input type="radio" name="gender" class="required css-checkbox-2" value="1" id="radio11"/></a></li>';
$html.='<li class="lab-2"><label for="radio1" value="1">Male</label></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="gender" class="required  css-checkbox-2" value="2" id="radio12"/></a></li>'; 
$html.='<li class="lab-2"><label for="radio3">Female</label></li>';

				$html.='</ul>';
				$html.='<span class="errordiv"></span>';
                $html.='</div>'; 
				$html.='</div>';
				$html.='</div>';
				}
				
				$detect = new Mobile_Detect;
				if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {
					
				$html.='<div class="tab-pane com_img2" id="tab7">';
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 81.7059px;"></div>'; 	
					$html.='</div>';
                $html.='<div class="control-group">';
                $html.='<label class="control-label" for="height_appl">Height</label>';
				$html.='<div class="controls">'; 
					$html.='<div class="selectwrp1">';
                    $html.='<select name="height_appl" id="heightft">';
						$html.='<option value="">feet</option>';
						$html.='<option value="03">03</option>';
						$html.='<option value="04">04</option>';
						$html.='<option value="05">05</option>';
						$html.='<option value="06">06</option>';
						$html.='<option value="07">07</option>';
						$html.='</select>';
					$html.='</div>';
					$html.='<div class="selectwrp1">';
                    $html.='<select name="height_appl2" id="heightinch">';
						$html.='<option value="">inches</option>';
						$html.='<option value="00">00</option>';
						$html.='<option value="01">01</option>';
						$html.='<option value="02">02</option>';
						$html.='<option value="03">03</option>';
						$html.='<option value="04">04</option>';
						$html.='<option value="05">05</option>';
						$html.='<option value="06">06</option>';
						$html.='<option value="07">07</option>';
						$html.='<option value="08">08</option>';
						$html.='<option value="09">09</option>';
						$html.='<option value="10">10</option>';
						$html.='<option value="11">11</option>';
						$html.='</select>';
				$html.='</div>'; 
				$html.='<label class="control-label" for="height_appl" id="height_appl">Weight</label>';
				$html.='<div class="selectwrp1" id="height_inner">';
                    $html.='<select name="weight_aapl" id="weight">';
						$html.='<option value="">....</option>'; 	
						$html.='<option value="99">less than 100</option>';
						$html.='<option value="100">100</option>';
						$html.='<option value="110">110</option>';
						$html.='<option value="120">120</option>'; 
						$html.='<option value="130">130</option>';
						$html.='<option value="140">140</option>';
						$html.='<option value="150">150</option>';
						$html.='<option value="160">160</option>';
						$html.='<option value="170">170</option>';
						$html.='<option value="180">180</option>';
						$html.='<option value="190">190</option>';
						$html.='<option value="200">200</option>';
						$html.='<option value="210">210</option>';
						$html.='<option value="220">220</option>';
						$html.='<option value="230">230</option>';
						$html.='<option value="240">240</option>';
						$html.='<option value="250">250</option>';
						$html.='<option value="251">more than 250</option>';
						$html.='</select>';
					$html.='</div>'; 
				$html.='</div>'; 
				$html.='</div>';
				$html.='</div>'; 
					
				}else{
				$html.='<div class="tab-pane com_img2" id="tab14">';
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 81.7059px;"></div>'; 	
					$html.='</div>';
                $html.='<div class="control-group">';
				$html.='<div class="height_div">';
                $html.='<label class="control-label" for="height_appl">Height <span style="font-size: 15px;font-weight:bold;">(applicant)</span></label>';
				$html.='<span id= "all_height_weight" class="field-suffix">All heights and weights OK</span>';
				$html.='<div class="controls">'; 
					$html.='<div class="selectwrp1">';
                    $html.='<select name="height_appl" id="height_appl" class="height_info">';
						$html.='<option value="">Select one</option>';
						$html.='<option value="4 ft. / 2 inches">4 ft. / 2 inches</option>';
						$html.='<option value="4 ft. / 3 inches">4 ft. / 3 inches</option>';
						$html.='<option value="4 ft. / 4 inches">4 ft. / 4 inches</option>';
						$html.='<option value="4 ft. / 5 inches">4 ft. / 5 inches</option>';
						$html.='<option value="4 ft. / 6 inches">4 ft. / 6 inches</option>';
						$html.='<option value="4 ft. / 7 inches">4 ft. / 7 inches</option>';
						$html.='<option value="4 ft. / 8 inches">4 ft. / 8 inches</option>';
						$html.='<option value="4 ft. / 9 inches">4 ft. / 9 inches</option>';
						$html.='<option value="4 ft. / 10 inches">4 ft. / 10 inches</option>';
						$html.='<option value="4 ft. / 11 inches">4 ft. / 11 inches</option>';
						$html.='<option value="5 ft. / 0 inches">5 ft. / 12 inches</option>';
						$html.='<option value="5 ft. / 1 inches">5 ft. / 1 inches</option>';
						$html.='<option value="5 ft. / 2 inches">5 ft. / 2 inches</option>';
						$html.='<option value="5 ft. / 3 inches">5 ft. / 3 inches</option>';
						$html.='<option value="5 ft. / 4 inches">5 ft. / 4 inches</option>';
						$html.='<option value="5 ft. / 5 inches">5 ft. / 5 inches</option>';
						$html.='<option value="5 ft. / 6 inches">5 ft. / 6 inches</option>';
						$html.='<option value="5 ft. / 7 inches">5 ft. / 7 inches</option>';
						$html.='<option value="5 ft. / 8 inches">5 ft. / 8 inches</option>';
						$html.='<option value="5 ft. / 9 inches">5 ft. / 9 inches</option>';
						$html.='<option value="5 ft. / 10 inches">5 ft. / 10 inches</option>';
						$html.='<option value="5 ft. / 11 inches">5 ft. / 11 inches</option>';
						$html.='<option value="6 ft. / 0 inches">6 ft. / 0 inches</option>';
						$html.='<option value="6 ft. / 1 inches">6 ft. / 1 inches</option>';
						$html.='<option value="6 ft. / 2 inches">6 ft. / 2 inches</option>';
						$html.='<option value="6 ft. / 3 inches">6 ft. / 3 inches</option>';
						$html.='<option value="6 ft. / 4 inches">6 ft. / 4 inches</option>';
						$html.='<option value="6 ft. / 5 inches">6 ft. / 5 inches</option>';
						$html.='<option value="6 ft. / 6 inches">6 ft. / 6 inches</option>';
						$html.='<option value="6 ft. / 7 inches">6 ft. / 7 inches</option>';
						$html.='<option value="6 ft. / 8 inches">6 ft. / 8 inches</option>';
						$html.='<option value="6 ft. / 9 inches">6 ft. / 9 inches</option>';
						$html.='<option value="6 ft. / 10 inches">6 ft. / 10 inches</option>';
						$html.='<option value="6 ft. / 11 inches">6 ft. / 11 inches</option>';
						$html.='</select>';
					$html.='</div>';
				$html.='</div></div><br />'; 
				 
				$html.='<div class="weight_div">';
                $html.='<label class="control-label" for="weight_aapl">Weight  <span style="font-size: 15px;font-weight:bold;">(applicant)</span></label>';
				$html.='<span class="field-suffix">&nbsp;</span>';
				$html.='<div class="controls">';
					$html.='<div class="selectwrp1">';
                    $html.='<select name="weight_aapl" id="weight_aapl" class="height_info weight_info">';
						$html.='<option value="">Select one</option>'; 	
						$html.='<option value="99">less than 100</option>';
						$html.='<option value="100">100</option>';
						$html.='<option value="110">110</option>';
						$html.='<option value="120">120</option>'; 
						$html.='<option value="130">130</option>';
						$html.='<option value="140">140</option>';
						$html.='<option value="150">150</option>';
						$html.='<option value="160">160</option>';
						$html.='<option value="170">170</option>';
						$html.='<option value="180">180</option>';
						$html.='<option value="190">190</option>';
						$html.='<option value="200">200</option>';
						$html.='<option value="210">210</option>';
						$html.='<option value="220">220</option>';
						$html.='<option value="230">230</option>';
						$html.='<option value="240">240</option>';
						$html.='<option value="250">250</option>';
						$html.='<option value="251">more than 250</option>'; 
						$html.='</select><span id="weightSuffix" class="field-suffix">lbs.</span>';
					$html.='</div>'; 
                $html.='</div>'; 
				$html.='</div>';
				$html.='</div>';
				$html.='<span class="errordiv"></span>';
				$html.='</div>';  
				
				$html.='<div class="tab-pane com_img2" id="tab15">';
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 86.7059px;"></div>'; 	
					$html.='</div>';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="home_owner">Are you a homeowner?</label>';
				 	
				$html.='<div class="controls">'; 
				$html.='<div class="controls">';
				$html.='<ul class="pager wizard">';	
$html.='<li class="next"><a href="#"><input type="radio" name="home_owner" class="required css-checkbox-2" value="1" id="radio11"/></a></li>';
$html.='<li class="lab-2"><label for="radio1" value="1">Yes</label></li>';
$html.='<li class="next"><a href="#"><input type="radio" name="home_owner" class="required  css-checkbox-2" value="2" id="radio12"/></a></li>'; 
$html.='<li class="lab-2"><label for="radio2">No</label></li>';

					$html.='</ul>';
				$html.='<span class="errordiv"></span>';
					
				$html.='</div>';
                $html.='</div>'; 
				$html.='</div>';
				$html.='</div>';
				}
				
				$detect = new Mobile_Detect;
				if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {
					
				$html.='<div class="tab-pane com_img2" id="tab8">';
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 90.7059px;"></div>'; 	
					$html.='</div>';
                $html.='<div class="control-group">';
                $html.='<label class="control-label" for="medial_condition">Major Medical Conditions?</label>';
				 	
				$html.='<div class="controls">'; 
				$html.='<div class="controls">';
				$html.='<ul class="pager wizard">';		
$html.='<li><a href="#"><input type="radio" name="medial_condition" class="required regular-radio big-radio" value="1" id="popup_contents_yes"/><label for="popup_contents_yes" class="css-label" value="1">Yes</label></a></li>';
 $html.='<li><a href="#"><input type="radio" name="medial_condition" class="required  regular-radio big-radio" value="2" id="popup_contents_no"/><label for="popup_contents_no" class="css-label" >No</label></a></li>';
 
 
               $html.='<div id="overlay"></div>
<div id="popup"> 
    <div class="popupcontent">
      <ul class="pager wizard"><li class="next popup_next"><a id="dontapply" href="#">No, These dont apply</a></li>&nbsp;&nbsp;<li class="next popup_continue" id="btncontinue"><a href="#" id="buttonContinue_popup" class="apply_comm"><img id="btn_nxt" class="btn_continueq apply_comm" src="https://nationalinsuranceadvisors.com/wp-content/themes/nia/images/buttonContinue.jpg" alt="" width="98"></a></li></ul>   
    </div>
</div>';
			  	//$html.='<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">';
                //$html.='<div class="modal-dialog modal-sm">';
                //$html.='<div class="modal-content">';
               // $html.='popup';
               // $html.='</div>';
               // $html.='</div>';
               // $html.='</div>';
 
                $html.='<div id="dialog_content"></div>';
 
				$html.='</div>';
                $html.='</div>'; 
				$html.='</div>';
				$html.='</div>';
					
				}else{
					
				$html.='<div class="tab-pane com_img2" id="tab16">';
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 90.7059px;"></div>'; 	
					$html.='</div>';
                $html.='<div class="control-group">';
                $html.='<label class="control-label" for="medial_condition">Major Medical Conditions?</label>';
				 
				$html.='<div class="controls">';
				$html.='<ul class="pager wizard">';		
$html.='<li style="float:left;"><a href="#"><input type="radio" name="medial_condition" class="required css-checkbox-2" value="1" id="popup_contents_yes"/></a></li>';
$html.='<li class="lab-2"><label for="popup_contents_yes" class="css-label-2" value="1">Yes</label></li>';

 $html.='<li class="next"><a href="#"><input type="radio" name="medial_condition" class="required  css-checkbox-2" value="2" id="popup_contents_no"/> </a></li>';
 $html.='<li class="lab-2"><label for="popup_contents_no" class="css-label-2">No</label></li>';
 				//$html.='<a href="#" id="pop" >PopUp</a>';
                $html.='</ul>';

$html.='<div id="overlay"></div>
<div id="popup"> 
<div class="popupcontent">
<ul class="pager wizard"><li class="next popup_next"><a id="dontapply" href="#">No, These dont apply</a></li>&nbsp;&nbsp;<li class="next popup_continue" id="btncontinue"><a href="#" id="buttonContinue_popup" class="apply_comm"><img id="btn_nxt" class="btn_continueq apply_comm" src="https://nationalinsuranceadvisors.com/wp-content/themes/nia/images/buttonContinue.jpg" alt="" width="98"></a></li></ul>   
</div>
</div>';

                $html.='<div id="dialog_content"></div>';
  
                $html.='</div>'; 
				$html.='</div>';
				$html.='</div>';
				}
				
				$detect = new Mobile_Detect;
				if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {
				
				$html.='<div class="tab-pane com_img2" id="tab9">';
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 95.7059px;"></div>'; 	
					$html.='</div>';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="term_lenght">Desired Term Length</label>';
				 	
				$html.='<div class="controls">';	
				    $html.='<select name="term_lenght" id="desireterm">';
					$html.='<option value="">Select one</option>';	
                    $html.='<option value="1">10 Year</option>';
                    $html.='<option value="2">15 Year</option>';
					$html.='<option value="3" selected="selected">20 Year</option>';
                    $html.='<option value="4">25 Year</option>';
					$html.='<option value="5">30 Year</option>';
				$html.='</select>';
				$html.='</div>';
                $html.='</div>';
				$html.='<div class="control-group">';
                    $html.='<label class="control-label" for="term_lenght">Desired Policy Coverage Amount</label>';
				$html.='<div class="controls">';	
                    $html.='<select name="policy_amount" id="desirepolicy">';
					$html.='<option value="">Select one</option>';	
                    $html.='<option value="22">$25,000</option>';	
                    $html.='<option value="1">$50,000</option>';	
                    $html.='<option value="2">$100,000</option>';	
                    $html.='<option value="3">$150,000</option>';	
                    $html.='<option value="4">$200,000</option>';	
                    $html.='<option value="5" selected="selected">$250,000</option> ';	
                    $html.='<option value="6">$300,000</option>';	
                    $html.='<option value="7">$350,000</option>';	
                    $html.='<option value="8">$400,000</option>';	
                    $html.='<option value="9">$450,000</option>';	
                    $html.='<option value="10">$500,000</option>';	
                    $html.='<option value="11">$550,000</option>';	
                    $html.='<option value="12">$600,000</option>';	
                    $html.='<option value="13">$700,000</option>';	
                    $html.='<option value="14">$800,000</option>';	
                    $html.='<option value="15">$900,000</option>';	
                    $html.='<option value="16">$1,000,000</option>';	
                    $html.='<option value="17">$2,000,000</option>';	
                    $html.='<option value="18">$3,000,000</option>';	
                    $html.='<option value="19">$4,000,000</option>';	
                    $html.='<option value="20">$5,000,000</option>';	
                    $html.='<option value="21">$6,000,000</option>';	
				$html.='</select>';
				$html.='</div>';
                $html.='</div>';
				$html.='<div class="control-group">';
                    $html.='<label class="control-label" for="medial_condition">Email Address</label>';   
				$html.='<div class="controls">';	
                    $html.='<input type="text" id="email_addes" name="email" class="required css-checkbox" placeholder="Email address" /> ';
				$html.='<div class="col-xs-12 col-sm-12" id="captcha" style="margin-bottom: 30px;">';  
				$html.= do_shortcode('[bws_google_captcha]'); 
             	$html.=' </div>';
				$html.='<div class="controls">';	
               $html.='<div class="g-recaptcha" data-sitekey="6Le2IiATAAAAAH7RM4MmncgmrHVN1NWpFJUFZVxC" style=""></div>';
                $html.='</div>';
                $html.='</div>';
				//$html.='<span class="field-suffix">we respect your privacy</span>'; 
				$html.='<div class="privacy_key"><img id="key_icon" src="https://nationalinsuranceadvisors.com/wp-content/themes/nia/images/privacy.jpg">';
				$html.='<span class="field-suffix privacy_text">we respect your privacy</span></div>';
				$html.='</div>';
				$html.='</div>';	
					
				}else{
				$html.='<div class="tab-pane com_img2" id="tab17">';
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 95.7059px;"></div>'; 	
					$html.='</div>';
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="term_lenght">Desired Term Length</label>';
				 	
				$html.='<div class="controls">';	
                    $html.='<select name="term_lenght">';
					$html.='<option value="">Select one</option>';	
                    $html.='<option value="1">10 Year</option>';
                    $html.='<option value="2">15 Year</option>';
					$html.='<option value="3" selected="selected">20 Year</option>';
                    $html.='<option value="4">25 Year</option>';
					$html.='<option value="5">30 Year</option>';
				$html.='</select>'; 
				
				$html.='</div>';
                $html.='</div><br />';
				$html.='<div class="control-group">';
                    $html.='<label class="control-label" for="term_lenght">Desired Policy Coverage Amount</label>';
				$html.='<div class="controls">';	
                    $html.='<select name="policy_amount">';
					$html.='<option value="">Select one</option>';	
                    $html.='<option value="22">$25,000</option>';	
                    $html.='<option value="1">$50,000</option>';	
                    $html.='<option value="2">$100,000</option>';	
                    $html.='<option value="3">$150,000</option>';	
                    $html.='<option value="4">$200,000</option>';	
                    $html.='<option value="5" selected="selected">$250,000</option> ';	
                    $html.='<option value="6">$300,000</option>';	
                    $html.='<option value="7">$350,000</option>';	
                    $html.='<option value="8">$400,000</option>';	
                    $html.='<option value="9">$450,000</option>';	
                    $html.='<option value="10">$500,000</option>';	
                    $html.='<option value="11">$550,000</option>';	
                    $html.='<option value="12">$600,000</option>';	
                    $html.='<option value="13">$700,000</option>';	
                    $html.='<option value="14">$800,000</option>';	
                    $html.='<option value="15">$900,000</option>';	
                    $html.='<option value="16">$1,000,000</option>';	
                    $html.='<option value="17">$2,000,000</option>';	
                    $html.='<option value="18">$3,000,000</option>';	
                    $html.='<option value="19">$4,000,000</option>';	
                    $html.='<option value="20">$5,000,000</option>';	
                    $html.='<option value="21">$6,000,000</option>';	
				$html.='</select>';
				$html.='</div>'; 
                $html.='</div><br />';
				//$html.='<span class="field-suffix">we respect your privacy</span>';
				 
				$html.='<div class="control-group"><label class="control-label" for="suspended_lice" id="zip_title" style="margin-left: 19px; margin-top: 10px; clear: both; margin-bottom: 15px; position: relative;
    top: 10px;">First Name </label><div class="controls" id="zip_control" style="margin-left: 17px; padding-bottom: 10px; margin-top: 10px;"><input type="text" class="required form-control" name="fname" id="fname" style="color:#000;"></div>
				<span class="errordiv" id="efname"></span></div><br /><br />';
				$html.='<div class="control-group"><label class="control-label" for="suspended_lice" id="zip_title" style= "margin-left: 19px; margin-top: 10px; clear: both; margin-bottom: 15px; position: relative;
    top: 10px;">Last Name</label><div class="controls" id="zip_control" style="margin-left: 17px; padding-bottom: 10px; margin-top: 10px;"><input type="text" class="required form-control" name="lname" id="lname" style="color:#000;"></div> 
				<span class="errordiv" id="elname"></span></div><br /><br />';
				$html.='<div class="control-group"><label class="control-label" for="suspended_lice" id="zip_title" style="margin-left: 19px; margin-top: 10px; clear: both; margin-bottom: 15px; position: relative;
    top: 10px;">Street Address </label><div class="controls" id="zip_control" style="margin-left: 17px; padding-bottom: 10px; margin-top: 10px;"><input type="text" class="required form-control" name="staddress" id="staddress" style="color:#000;"></div>
				<span class="errordiv" id="estaddress"></span></div><br /><br />';
				$html.='<div class="control-group"><label class="control-label" for="suspended_lice" id="zip_title" style="margin-left: 19px; margin-top: 10px; clear: both; margin-bottom: 15px; position: relative;
    top: 10px;">Marital Status </label><div class="controls" id="zip_control"><select name="maritalstatus" id="maritalstatus">
						<option value="">Select Marital Status</option>; 	
						<option value="1">Single</option>;
						<option value="2">Married</option>; 
					</select></div>
				<span class="errordiv" id="emaritalstatus"></span></div><br /><br />';
				$html.='<div class="control-group"><label class="control-label" for="suspended_lice" id="zip_title" style="margin-left: 19px; margin-top: 10px important!; clear: both; margin-bottom: 15px; position: relative;
    top: 20px;">Phone Number </label><div class="controls" id="zip_control" style="margin-left: 17px; padding-bottom: 10px; margin-top: 20px;"><input type="text" class="required form-control" name="phone" id="phoneno" style="color:#000;"></div>
				<span class="errordiv" id="ephone"></span></div><br /><br />';
				$html.='<div class="control-group" id="email_div">';
                    $html.='<label class="control-label" for="email_address" style="position: relative; top: 10px;">Email Address <span style="font-size: 15px;font-weight:bold;">(applicant)</span></label>';  
					 
				$html.='<div class="controls">';	
                    $html.='<input type="text" id="email_addes" name="email" class="required css-checkbox" placeholder="Email address" style="margin-top: 20px;" /> ';
				$html.='<div class="col-xs-12 col-sm-12" id="captcha" style="margin-bottom: 30px; margin-left:15px;" >'; 
				$html.= do_shortcode('[bws_google_captcha]');
             	$html.=' </div>';	
                $html.='</div>'; 
				$html.='<div class="controls">';	
               $html.='<div class="g-recaptcha" data-sitekey="6Le2IiATAAAAAH7RM4MmncgmrHVN1NWpFJUFZVxC" style="margin-left:15px;"></div>';
                $html.='</div>';
				$html.='<div class="privacy_key" style="position: relative; top: 10px;"><img id="key_icon" src="https://nationalinsuranceadvisors.com/wp-content/themes/nia/images/privacy.jpg">';

				

				$html.='<span class="field-suffix privacy_text" style="right: 10px;">we respect your privacy</span></div>';

				$html.='<span class="errordiv"></span><br /><br />';
				$html.='<button class="btn btn_continue_tab"  style=""><img id="" class="" src="https://nationalinsuranceadvisors.com/wp-content/themes/nia/images/buttonContinue.jpg" alt="" style=""></button> ';
				$html.='</div>';
				$html.='</div>';
				}
				
				$detect = new Mobile_Detect;
				if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {
				
				$html.='<div class="tab-pane com_img2" id="tab10">';
				$html.='<div id="progContainer" class="dlpPanel">'; 	
					 $html.='<div id="progBar" class="dlpPanel" style="width: 109.7059px;"></div>'; 	
					 $html.='</div>';
				
                $html.='<div class="control-group">';
                    $html.='<label class="control-label" for="fname">First Name</label>';
				 	
				$html.='<div class="controls">';	
                    $html.='<input type="text" class="required form-control" name="fname" id="fname">'; 
				$html.='</div>';
				
				$html.='<label class="control-label" for="lname">Last Name</label>';
				$html.='<div class="controls">';	
                    $html.='<input type="text" class="required form-control" name="lname" id="lname">'; 
				$html.='</div>';
				
				$html.='<label class="control-label" for="staddress">Street Address</label>';
				$html.='<div class="controls">';	
                    $html.='<input type="text" class="required form-control" name="staddress" id="staddress">'; 
				$html.='</div>';
				
				$html.='<label class="control-label" for="city">City State Zip</label>';
				$html.='<div class="required controls">';	
                    //$html.='<select name="city" id="citysatezip">';
//						$html.='<option value="">Select City State Zip</option>'; 	
//						$html.='<option value="miami">miami</option>';
//						$html.='<option value="Albama">Albama</option>'; 
//						$html.='</select>'; 
				$html.='<span id="city1"></span>, <span id="zip1"></span>';
				$html.='</div>';
				
				$html.='<label class="control-label" for="maritalstatus">Marital Status</label>';
				$html.='<div class="required controls">';	
                    $html.='<select name="maritalstatus" id="maritalstatus">';
						$html.='<option value="">Select Marital Status</option>'; 	
						$html.='<option value="1">Single</option>';
						$html.='<option value="2">Married</option>'; 
					$html.='</select>';
				$html.='</div>';
				
				$html.='<label class="control-label" for="phone">Phone Number</label>';
				$html.='<div class="controls">';	
                    $html.='<input type="text" class="required form-control" name="phone" id="phoneno">'; 
				$html.='</div>';
                $html.='</div> <br />'; 
				$html.='<div class="blue-sm-text">By typing your number above. you confirm your consent to be contacted at that number. including through automated and/or pro-molded means.</div>
                    <button class="btn" style=""><span>See Your Personalized Result</span></button>
                    <div class="blue-sm-text">By clicking the button above. you agree to be contacted/marketed to (including through automated means. e.g. telephone dialing and text messaging) by matched partners and/or providers in the LMB Partner Network and their agents and partners or us about insurance information via telephone. mobile device (including SMS and MMS). and/or email. even if your telephone number or email address is on a corporate. state or the National Do Not Call Registry. and you agree to our Terms and Conditionsand Privacy Policy. You understand that your consent is not required as a condition to purchase a good or service.</div>';
				$html.='</div>';	
					
				}
				
				$detect = new Mobile_Detect;
				if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {
				$html.='<ul class="pager wizard mobi_continue">';
					$html.='<div id="bottom_arrow" style="display: none; "></div>'; 
					$html.='<li class="next" id="mobi_next"><a href="#" class="mobi_text">Continue »</a></li>';
					//$html.='<input type="hidden" name="city_name" id="city_name" value=""/>';
					//$html.='<li class="next" id="MobibuttonContinue1"><a href="#" class=""><img id="MobibuttonContinue" src="/NIAWeb/wp-content/themes/nia/images/buttonContinue.jpg" alt="" style="display:none;"/></a></li>';
				$html.='</ul>';	
				}else {
					//$html.='<input type="hidden" name="city_name" id="city_name" value=""/>';
				$html.='<ul class="pager wizard ">'; 
					$html.='<li class="next" id="main_continue"><a href="#" class=""><img id="fisr_conti" class="btn_continue" src="https://nationalinsuranceadvisors.com/wp-content/themes/nia/images/life625.png" alt="" style="display:none;"/></a></li>';
					$html.='<li class="next" id="buttonContinue"><a href="#" class=""><img id="btn_nxt" class="btn_continue1" src="https://nationalinsuranceadvisors.com/wp-content/themes/nia/images/buttonContinue.jpg" alt="" style="display:none;"/></a></li>';
				$html.='</ul>';	
				}
                $html.='</div>'; 
            $html.='</div>'; 

        $html.='</form>';

      

        return $html;
    }
}

// Add Year Book Calculator ShortCode
add_shortcode('NIA_Questionnaire', 'nia_Questionnaire');
?>



