<?php
/**
 * Template Name: Contact
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<script type="text/javascript">
		function checkContactForm(){
			var person_name=document.getElementById('person_name').value;
			var email=document.getElementById('email').value;
			var message=document.getElementById('message').value;
			
			var error="";
			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			var filter1 = /^-{0,1}\d*\.{0,1}\d+$/;								
			
			if(person_name==""){
				error=true;
				document.getElementById('span_person_name').innerHTML="Name can not be empty";
			}else{
				document.getElementById('span_person_name').innerHTML="";
			}
						
			if(email==""){
				error=true;
				document.getElementById('span_email').innerHTML="Email can not be empty";
			}else if(email && !filter.test(email)){				
					error=true;
					document.getElementById('span_email').innerHTML="Invalid email id";
			}else{
				document.getElementById('span_email').innerHTML="";
			}
			
					
			if(message==""){
				error=true;
				document.getElementById('span_message').innerHTML="Message can not be empty";
			}else{
				document.getElementById('span_message').innerHTML="";
			}
						
			if(error==true){
				return false;
			}
		}				
	</script>
	
		<?php
		if($_POST['contact']){
		$person_name=$_POST['person_name'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		
		$subject="National Insurance Advisors - Contact Form Details";	
				
		$message_text.="<strong>Name: </strong>".$person_name."<br><br>";	
		$message_text.="<strong>Email: </strong>".$email."<br><br>";
		$message_text.="<strong>Message: </strong>".stripslashes($message)."<br><br>";
				
		$to=get_option('admin_email');			
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: <$email>" . "\r\n";
		@mail($to,$subject,$message_text,$headers);
				
		$success_msg="Message sent successfully";
	}
	
	$options=get_option('pu_theme_options');
	?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://jashkenas.github.com/coffee-script/extras/coffee-script.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("address").each(function(){                         
    var embed ="<iframe width='425' height='350' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0'   src='https://maps.google.com/maps?&amp;q="+ encodeURIComponent( $(this).text() ) +"&amp;output=embed'></iframe>";
                                $(this).html(embed);
                             
   });
});
</script>			
<div class="innertxt" id="contact_us">
			<div class="container">
				<div class="row">
				<h2>Contact <span>Us</span></h2>
				
				<div class="row">
					<?php
						if($success_msg){
							echo '<div class="alert-box success" style="font-size:16px;">'.$success_msg.'</div>';
						}
					?>
					<?php			
								while ( have_posts() ) : the_post();

									the_content();
									
								endwhile;									
			?>
					<form class="contactform" id="frmmsg" name="frmmsg" action="#contact_us" onSubmit="return checkContactForm()" method="post">
						<div class="col-xs-12 col-sm-6">							
							<div class="contactformtxt">
								Please fill up the below form
							</div>
							<div class="formfld">
								<label>Name</label>
								<input type="text" placeholder="Name" value="" name="person_name" id="person_name" 
											onBlur="checkField('person_name','span_person_name','normal')" />
											<div style="color:#FF0000;" id="span_person_name"></div>
							</div>
							<div class="formfld">
								<label>Email</label>
									<input type="text" placeholder="Email" value="" name="email" id="email" 
											onBlur="checkField('email','span_email','email')" />
											<div style="color:#FF0000;" id="span_email"></div>
							</div>
							<div class="formfld">
								<label>Description</label>
								<textarea placeholder="Leave Message" name="message" id="message" 
									onBlur="checkField('message','span_message','normal')"></textarea>
									<div style="color:#FF0000;" id="span_message"></div>
							</div>
							
							<div class="formfld">
								<div class="g-recaptcha" data-sitekey="6LdM-A8TAAAAAOnLu2Z-PA9UmBS33F-TwbYwlwmE"></div>
							</div>							
							<input type="submit" name="contact" value="Send">
						</div>
					
						<div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1">
							<img src="<?=$options['upload_image1'];?>" class="contactlogo">
							<div class="contactdtl">
								<?=$options['contact_us_address'];?>
								<div class="mapholder">
									<address><?=$options['map_address'];?></address>
									<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3022.2407999556594!2d-73.99719503259699!3d40.756728219237594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1444889038125" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div>
							</div>
						</div>	
						</form>
				</div>
				</div>
			</div>
		</div>
<?php
get_footer();
