<!DOCTYPE html>
<html lang="en">
<head>
<title>National Insurance Advisor</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./assets/responsive.css" rel="stylesheet">
<script src="./assets/jquery-1.7.1.min.js"></script>

<script src='https://www.google.com/recaptcha/api.js'></script>

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
<script type="text/javascript" src="https://calltracking.nationalinsuranceadvisors.com/js/PhoneFormat.js"></script>
<script type="text/javascript" src="https://calltracking.nationalinsuranceadvisors.com/referrer_dynjs.php?c_id=1&format=US"></script>

<?php
  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    // The form has been submitted
    echo "We can do stuff here";
  }
?>  
<div id="loadingover" style="display: none;"></div>
<div class="mobile-container">
  <header class="container header">
    <div class="row">
      <div class="span12 national_logo">
        <h1> <a href="http://nationalinsuranceadvisors.com/" target="_blank"><img src="./assets/nialargefinallogo1.png" width="241" height="59" alt="eCoverage"></a> </h1>
        
        <div class="top_header_l">Need Help? Call : <a href="tel:855.637.2991" id="number">855-637-2991</a> (Toll Free)</div>
      </div>
    </div>
    
  </header>
  <div class="content">
    <div class="container" style="min-height:473px;"> 
      <!-- Forms
================================================== -->
      <legend>It takes just 2 minutes to get started with your quote!</legend>
      <div style="clear:both;"></div>
      <div class="partner-logos"> <img src="./assets/insurance-partners.png"> </div>
      <section id="forms">
        <div class="header_text1">Get <strong>$250,000</strong> of Term Life Insurance Coverage for as Low as <strong>$15 Per Month!</strong></div>
        <div class="header_text2">
          <ul>
            <li style="height:50px;">Competitive Rates:<br>
              Save up to 70%</li>
            <li style="height:50px;">No Obligation to Purchase</li>
            <li>Coverage in as Little as 24 Hours</li>
          </ul>
        </div>
        <div class="secure-message"><img src="./assets/securelock.png">
          <h2>Your Information is Secure</h2>
        </div>
        <div style="clear:both;"></div>
        <div class="box">
          <h2 class="hide-mobile">Get Your Instant Quote</h2>
          <span id="validate_data"></span>
          <div class="row">
            <div class="span4">
              <form name="quote" id="application" action="" method="post">
                <fieldset>
                  <div class="field-row">
                    <label class="title">First Name:</label>
                    <input type="text" required maxlength="100" class="field wide" id="fname" name="fname" placeholder="First name">
                    <label for="fname" class="error" generated="true"></label>
                  </div>
                  <div class="field-row">
                    <label class="title">Last Name:</label>
                    <input type="text" required maxlength="100" class="field wide" id="lname" name="lname" placeholder="Last name">
                    <label for="lname" class="error" generated="true"></label>
                    <div class="clear"></div>
                  </div>
                  <div class="field-row">
                    <label class="title">Phone:</label>
                    <div class="phone-number">Phone Number:</div>
                    <input type="tel" required class="field area numeric" id="h_areacode" name="h_areacode" maxlength="3" onkeyup="autotab(this, document.quote.h_prefix)" placeholder="###">
                    <p>-</p>
                    <input type="tel" required class="field pre numeric" id="h_prefix" name="h_prefix" maxlength="3" onkeyup="autotab(this, document.quote.h_suffix)" placeholder="###">
                    <p>-</p>
                    <input type="tel" required class="field suf numeric" id="h_suffix" name="h_suffix" maxlength="4" placeholder="####">
                    <label for="phone_number" class="error" generated="true"></label>
                    <div class="clear"></div>
                  </div>
                  <div class="field-row">
                    <label class="title" for="email">Email:</label>
                    <input type="text" id="email" class="wide" name="email" value="" maxlength="128" placeholder="Email">
                  </div>
                  <div class="field-row">
                    <label class="title">Zip:</label>
                    <input type="tel" maxlength="6" class="field numeric wide" id="h_zip" name="h_zip" placeholder="Zip">
                  </div>
                  <div class="field-row">
                    <label class="title">Birth Year:</label>
                    <div class="birth-year">Birth Year:</div>
                    <select name="birth_year" id="birth_year" class="wide">
                      <option value="">Select</option>
                      <option value="1936">1936</option>
                      <option value="1937">1937</option>
                      <option value="1938">1938</option>
                      <option value="1939">1939</option>
                      <option value="1940">1940</option>
                      <option value="1941">1941</option>
                      <option value="1942">1942</option>
                      <option value="1943">1943</option>
                      <option value="1944">1944</option>
                      <option value="1945">1945</option>
                      <option value="1946">1946</option>
                      <option value="1947">1947</option>
                      <option value="1948">1948</option>
                      <option value="1949">1949</option>
                      <option value="1950">1950</option>
                      <option value="1951">1951</option>
                      <option value="1952">1952</option>
                      <option value="1953">1953</option>
                      <option value="1954">1954</option>
                      <option value="1955">1955</option>
                      <option value="1956">1956</option>
                      <option value="1957">1957</option>
                      <option value="1958">1958</option>
                      <option value="1959">1959</option>
                      <option value="1960">1960</option>
                      <option value="1961">1961</option>
                      <option value="1962">1962</option>
                      <option value="1963">1963</option>
                      <option value="1964">1964</option>
                      <option value="1965">1965</option>
                      <option value="1966">1966</option>
                      <option value="1967">1967</option>
                      <option value="1968">1968</option>
                      <option value="1969">1969</option>
                      <option value="1970">1970</option>
                      <option value="1971">1971</option>
                      <option value="1972">1972</option>
                      <option value="1973">1973</option>
                      <option value="1974">1974</option>
                      <option value="1975">1975</option>
                      <option value="1976">1976</option>
                      <option value="1977">1977</option>
                      <option value="1978">1978</option>
                      <option value="1979">1979</option>
                      <option value="1980">1980</option>
                      <option value="1981">1981</option>
                      <option value="1982">1982</option>
                      <option value="1983">1983</option>
                      <option value="1984">1984</option>
                      <option value="1985">1985</option>
                      <option value="1986">1986</option>
                      <option value="1987">1987</option>
                      <option value="1988">1988</option>
                      <option value="1989">1989</option>
                      <option value="1990">1990</option>
                      <option value="1991">1991</option>
                      <option value="1992">1992</option>
                      <option value="1993">1993</option>
                      <option value="1994">1994</option>
                    </select>
                    <label for="birth_year" class="error" generated="true"></label>
                    <div class="clear"></div>
                  </div>
                  <div class="field-row">
                    <div class="g-recaptcha" data-sitekey="6Le2IiATAAAAAH7RM4MmncgmrHVN1NWpFJUFZVxC"></div>
                  </div>
                  
                  <div class="form-actions">
<button type="button" name="lp1btn" id="lp1btnsubmit" class="btn btn-warning btn-large" onClick="submit_entry();">Get My Free Quote </button>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
        <div style="clear:both;"></div>
        <div class="disclaimer-text">By pressing the get my free quote button above you agree to this website's Privacy Policy</a>, and you consent to receive offers of insurance from nationalinsuranceadvisors LLC, or partner agents, which include Fidelity Life &amp; Efinancial at the email address or telephone numbers you provided, including autodialed, pre-recorded calls, SMS or MMS messages. You agree and understand that it is not required to provide this consent in order to purchase insurance from us.</div>
      </section>
    </div>
    <!-- /container --> 
  </div>
  <div class="container" style="padding-top:10px;">
    <div class="insuranceContent">
      <div class="left">
        <h1><strong>Request an Affordable Term Life Quote</strong><br>
          from NationalInsuranceAdvisors.com</h1>
      </div>
      <div class="right">
        <div class="seals">
          <div class="bbb"><img style="padding: 0px; border: none;" id="bbblinkimg" src="./assets/nia-22948710.png" width="200" height="38" alt="eCoverage.com, LLC, Insurance Services, Bellevue, WA"></div>
          <div class="norton">
            <table border="0" title="Click to Verify - This site chose Symantec SSL for secure e-commerce and confidential communications.">
              <tbody>
                <tr>
                  <td><img name="seal" src="./assets/getseal.gif" oncontextmenu="return false;" border="0" usemap="#sealmap_small"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div style="clear:both;"></div>
      </div>
      <div style="clear:both;"></div>
      <p class="leadin">Requesting a free, no-obligation term life insurance quote through nationalinsuranceadvisors.com is now faster and easier than ever! You can get a personalized, free, and no-obligation term life insurance quote in just a few minutes through nationalinsuranceadvisors.com from one of our top life insurance partners. It's that easy to start helping protect your family's financial future! It takes 2 minutes to request your term life quote. Start Now!</p>
    </div>
    <footer>
      <div class="container">
        <div id="credits"> Copyright © 2017 nationalinsuranceadvisors, LLC<span class="hide-mobile"> | <a href="mailto:support@nationalinsuranceadvisors.com">support@nationalinsuranceadvisors.com</a> | 1101 Brickell Ave South Tower #8 Miami, FL 33131 | <a href="#">Opt-out</a></span> </div>
      </div>
    </footer>
  </div>
  <!-- /container --> 
</div>
<script language="javascript">
function submit_entry(){
	var filter_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var filter_phone = /^-{0,1}\d*\.{0,1}\d+$/;
	var fname=$('#fname').val();	
	var lname=$('#lname').val();	
	var phone=$('#h_areacode').val()+'-'+$('#h_prefix').val()+'-'+$('#h_suffix').val();	
	var email=$('#email').val();	
	var zip=$('#h_zip').val();	
	var byear=$('#birth_year').val();
	if(fname=="" || lname=="" || phone=="" || zip=="" || byear=="" || (!filter_email.test(email))){
	 $('#validate_data').html('Please enter vaild input');
	 return false;
   }else{
	   
	   $.post('../ajax/submit_lp1.php',{fn:fname,ln:lname,ph:phone,em:email,zp:zip,by:byear},function(data){
		//alert(data);
		
		window.location.href = "/lp1/thankyou.html";
		
	});
	  
	   }
}
</script>
</body>
</html>