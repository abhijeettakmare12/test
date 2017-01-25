<?php
include("dbcon.php");
mysql_query("insert into leads set fname='".$_POST['fn']."',lname='".$_POST['ln']."',phone='".$_POST['ph']."',email='".$_POST['em']."',zip='".$_POST['zp']."',birth_year='".$_POST['by']."',dt=NOW(),source_page='http://nationalinsuranceadvisors.com/lp1/',user_ip='".$_SERVER["REMOTE_ADDR"]."'");
if(mysql_insert_id()>0){
	echo "Cool! Your inquiry has been submitted";
}else{
	echo "Sorry, Entry not submitted.";	
}

// Email send

$fname = $_POST['fn'];
$lname = $_POST['ln'];
$phone = $_POST['ph'];
$email = $_POST['em'];
$zip = $_POST['zp'];
$bd = $_POST['by'];


		$subject="National Insurance Advisors - Free Insurance Quote Details";	

		$message_text.="<strong>First Name: </strong>".$fname."<br><br>";

		$message_text.="<strong>Last Name: </strong>".$lname."<br><br>";	

		$message_text.="<strong>Phone: </strong>".$phone."<br><br>";

		$message_text.="<strong>Email: </strong>".$email."<br><br>";

		$message_text.="<strong>Zip: </strong>".$zip."<br><br>";
		
		$message_text.="<strong>Birth Year: </strong>".$bd."<br><br>";


		$to='amar.vashi12@gmail.com';			



		// Always set content-type when sending HTML email

	$ssite = '/home/mynational1/qa/wp-content/plugins/nia_questionnaire/'; 
 //echo $ssite;
		require_once $ssite . '/Mobile-Detect/Mobile_Detect.php';
		
		$detect = new Mobile_Detect;
			if ($detect->isMobile() || $detect->isTablet() || $detect->isiOS() ) {
				
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: <$email>" . "\r\n";
				
				if(mail('rgadalmobilea@gmail.com',$subject,$message_text,$headers)){ 
					$to='rgadalmobilea@gmail.com';
		          //header("Location: https://nationalinsuranceadvisors.com/thank-you"); 
		
			  } else{ 
							
				  echo "Mail was not sent!"; 
							
			  } 
			}else{
				
				
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: <$email>" . "\r\n";
		
			    if(mail('rgadala@gmail.com',$subject,$message_text,$headers)){ 
						$to='rgadala@gmail.com';


 


                  //header("Location: https://nationalinsuranceadvisors.com/thank-you"); 


 


			}else{ 

                  echo "Mail was not sent!"; 

			} 
			}



?>


