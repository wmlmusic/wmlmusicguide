	<div class="tabs standard">
      	<div class="tabs">
	      	<div class="tab-wrapper">
		      	<div id="menuwrapper">
		      		<ul>
		        		<li><a href="wml_login.php">World Music Listing</a>
		        			<?php //echo $data['musicListing'] ?>
		        		</li>
					</ul>
		      	</div>
		    </div>        
	        <div class="tab-content">
		        <div id="page-heading">
					<h1>World Music Listing Registration</h1>
					<hr />
				</div>
				<div id="tab1" class="tab active">
					<form class="form-style-1" id="register" method="POST" action="signupcontroller.php">
						<ul class="form-style-1">
							<li class="bottom"><label>Account Details</label></li>
						    <li>
						        <label>Email <span class="required">*</span></label>
						        <input type="email" name="su_email" class="field-long" placeholder="enter your email address" size="50" required />
						    </li>
						    <li>
						    	<label>Password <span class="required">*</span></label>
								<input type="password" name="su_password" class="field-long" placeholder="enter password" size="50" required id="password" />
							</li>
							<li>
						    	<label>Confirm Password <span class="required">*</span></label>
								<input type="password" name="su_conpassword" class="field-long" placeholder="enter confirm password" size="50" required />
							</li>
							<li class="bottom"><label>Personal Details</label></li>
							<li>
						    	<label>Full Name <span class="required">*</span></label>
								<input type="text" name="su_name" class="field-long" placeholder="enter your full name" size="50" required />
							</li>
							<li>
						    	<label>Phone <span class="required">*</span></label>
								<input type="text" name="su_phone" class="field-long" placeholder="enter your phone number" size="50" required />
							</li>
							<li>
						    	<label>Street Address</label>
								<input type="text" name="su_address" class="field-long" placeholder="enter your Street Address" size="50" />
							</li>
							<li>
						    	<label>City <span class="required">*</span></label>
								<input type="text" name="su_city" class="field-long" placeholder="enter your city name" size="50" required />
							</li>
							<li>
						    	<label>Country <span class="required">*</span></label>						    	
						    	<select name="su_country" class="field-divided" required>
						    		<option value="">Select One</option>
						    		<?php
						    			$country_list = country();
						    			foreach ($country_list as $key => $value) {
						    				if(!empty($value))
						    					echo "<option>" . $value . "</option>";
						    			}
						    		?>
						    	</select>
							</li>
							<li>
						    	<label>Website</label>
								<input type="url" name="su_url" class="field-long" placeholder="enter website url" size="50" />
							</li>
							<li>
						    	<label>Gender <span class="required">*</span></label>
								<select name="su_gender" class="field-divided" required>
						    		<option value="">Select One</option>
						    		<option>Male</option>
						    		<option>Female</option>
						    	</select>
							</li>
							<li class="bottom"><label>Security</label></li>
							<li>
						    	<label>Security Question <span class="required">*</span></label>
								<select name="su_quest" class="field-long" required>
						    		<option value="">Select One</option>
						    		<option value="What is the name of your favorite pet?">What is the name of your favorite pet?</option>
			                        <option value="What is your preferred musical genre?">What is your preferred musical genre?</option>
			                        <option value="What is the street number of the house you grew up in">What is the street number of the house you grew up in?</option>
			                        <option value="What time of the day were you born?">What time of the day were you born?</option>
			                        <option value="What is the name of your favorite childhood friend?">What is the name of your favorite childhood friend?</option>
			                        <option value="What is the name of the company of your first job?">What is the name of the company of your first job?</option>
			                        <option value="What is the middle name of your oldest sibling?">What is the middle name of your oldest sibling?</option>
			                        <option value="What is the middle name of your oldest child?">What is the middle name of your oldest child?</option>
			                        <option value="What was the last name of your third grade teacher?">What was the last name of your third grade teacher?</option>
			                        <option value="What was your childhood nickname?">What was your childhood nickname?</option>
			                        <option value="What is your spouse’s mother’s maiden name?">What is your spouse’s mother’s maiden name?</option>
			                        <option value="What is your mother’s maiden name?">What is your mother’s maiden name?</option>
			                        <option value="What was your high school mascot?">What was your high school mascot?</option>
                        		</select>
							</li>
							<li>
						    	<label>Answer</label>
								<input type="text" name="su_ans" class="field-long" placeholder="enter your answer" size="50" required />
							</li>
							<li class="bottom"><label>Terms and Mailing</label></li>
							<li>
								<label class="term"><input type="checkbox" name="su_terms" value="1" required class="condition"> <span class="required">*</span> I accept the <span id="terms">Terms and Conditions</span></label>
								<label><input type="checkbox" name="su_offer" value="1"> I want to receive personalized offers by your site</label>
								<label><input type="checkbox" name="su_offer_partner" value="1"> Allow partners to send me personalized offers and related services</label>

							</li>
							<li>
								<label>&nbsp;</label>
								<input type="submit" value="Register" id="form_submit" />
							</li>
					    </ul>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="termscondition" style="display: none;" title="Terms and Conditions">
		By using or visiting the World Music Listing website or any World Music Listing products, software, data feeds, including but not limited to its music/entertainment directory/list of contacts, and services provided to you on, from, or through the World Music Listing website (collectively the "Service") you signify your agreement to (1) these terms and conditions (the "Terms of Service"), (2) World Music Listing's Privacy Policy, found at <a href="terms.php" target="_blank">http://www.wmlmusicguide.com/terms/privacy</a> and incorporated herein by reference, and (3) World Music Listing's Community Guidelines, found at <a href="terms.php" target="_blank">http://www.wmlmusicguide.com/terms.php</a> and also incorporated herein by reference. If you do not agree to any of these terms, the World Music Listing Privacy Policy, or the Community Guidelines, please do not use the Service.<br /><br />
		B. Although we may attempt to notify you when major changes are made to these Terms of Service, you should periodically review the most up-to-date version <a href="terms.php" target="_blank">http://www.wmlmusicguide.com/terms.php</a>). World Music Listing may, in its sole discretion, modify or revise these Terms of Service and policies at any time, and you agree to be bound by such modifications or revisions. Nothing in these Terms of Service shall be deemed to confer any third-party rights or benefits.

		<a href="terms.php">Read more</a>
	</div>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="public/js/jquery.validate.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$().ready(function(){
			$('#register').validate({
				errorElement: 'span',
				errorPlacement: function (error, element) {
		            if (element.attr("type") == "checkbox") {
		                error.insertAfter($(".term"));
		            } else {
		                error.insertAfter(element);
		            }
		        },
		        rules: {
		            su_email		: { required: true, email: true },
		            su_password		: { minlength: 6, required: true },
		            su_conpassword	: { equalTo : "#password" },
		            su_name			: { minlength: 3, required: true },
		            su_phone		: { required: true },
		            su_city			: { required: true },
		            su_country		: { required: true },
		            su_gender		: { required: true },
		            su_quest		: { required: true },
		            su_ans			: { required: true },
		            su_terms		: { required: true }
		        },
			});

			$('.condition').click(function () {
		        if ($(this).is(':checked')) {
		            $("#termscondition").dialog({
		            	modal: true,
		            	minWidth: 600,
					    buttons: {
					        Ok: function() {
					          	$( this ).dialog( "close" );
					    	}		            
					    }
		            });
		        } else {
		            $("#termscondition").dialog('close');
		        }
		    });
		});
	</script>