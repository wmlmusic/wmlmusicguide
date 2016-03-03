	<div class="tabs standard">
      	<div class="tabs">
	      	<div class="tab-wrapper">
		      	<div id="menuwrapper">
		      		<ul>
		        		<li><a href="directory_page.php">World Music Listing</a>
		        			<?php echo $data['payment'] ? $data['musicListing'] : null ?>
		        		</li>
					</ul>
		      	</div>
		    </div>        
	        <div class="tab-content">
		        <div id="page-heading">
					<h1>Contact Us</h1>
					<hr />
				</div>
				<div id="tab1" class="tab active">
					<form class="form-style-1" id="contact" method="POST" action="contactcontroller.php">				
						<ul class="form-style-1">
						    <li>
						        <label>Email <span class="required">*</span></label>
						        <input type="email" name="contact_email" class="field-divided" placeholder="enter your email address" size="50" required />
						    </li>
							<li>
						    	<label>Full Name <span class="required">*</span></label>
								<input type="text" name="contact_name" class="field-divided" placeholder="enter your full name" size="50" required />
							</li>								
							<li>
						    	<label>Phone</label>
								<input type="text" name="contact_phone" class="field-divided" placeholder="enter your phone number" size="50" />
							</li>								
							<li>
						    	<label>City</span></label>
								<input type="text" name="contact_city" class="field-divided" placeholder="enter your city name" size="50" />
							</li>
							<li>
								<label>State/Province</label>						    	
								<input type="text" name="contact_state" class="field-divided" placeholder="enter your state or province" size="50" />
							</li>							
							<li>
								<label>Country</label>						    	
						    	<select name="contact_country" class="field-divided" required>
						    		<option value="">Select One</option>
						    		<?php
						    			$country_list = country();
						    			foreach ($country_list as $key => $value) {
						    				if(!empty($value))
						    					echo "<option>" . $value . "</option>";
						    			}
						    		?>
							<li>
						    	<label>Subject Line <span class="required">*</span></label>
								<input type="text" name="contact_subject" class="field-long" placeholder="enter topic subject" required />
							</li>
							<li>
						    	<label>Message <span class="required">*</span></label>
								<textarea name="contact_message" rows="5" cols="60" class="field-long" required >
								</textarea>
							</li>								
							<li>
								<label>&nbsp;</label>
								<input type="submit" value="contact" id="form_submit" />
							</li>							
					    </ul>
					</form>
				</div>
			</div>
		</div>
	</div>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="public/js/jquery.validate.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$().ready(function(){
			$('#contact').validate({
		        rules: {
		            contact_email		: { required: true, email: true},
		            contact_name		: { minlength: 3, required: true },
		            subject_line		: { required: true }			
		        }
			});
		});
	</script>