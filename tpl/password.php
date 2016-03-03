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
					<h1>World Music Listing Password Reset</h1>
					<hr />
				</div>
				<div id="tab1" class="tab active">
					<form class="form-style-1" id="passwordfrm" method="POST" action="wml_password.php?step=<?php echo $data['step'] + 1; ?>">
					<?php if(isset($_SESSION['message'])){ ?>
						<div class="alert alert-success"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
					<?php } ?>
					<?php if(isset($_SESSION['error'])){ ?>
						<div class="alert alert-error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
					<?php } ?>
						<ul class="form-style-1">
						<?php if($data['step'] == 0): ?>
						    <li>
						        <label>Email <span class="required">*</span></label>
						        <input type="email" name="su_email" class="field-long" placeholder="enter your email address" size="50" required />
						    </li>
							
							<li>
								<label>&nbsp;</label>
								<input type="submit" value="Continue" id="form_submit" /> &nbsp<a href="wml_login.php">Log in</a>
							</li>

						<?php elseif ($data['step'] == 1) : ?>
							<li>
						        <label>Security Question</label>
						        <?php echo $data['question'] ?>
						    </li>
							<li>
						        <label>Answer <span class="required">*</span></label>
						        <input type="text" name="su_answer" class="field-long" placeholder="enter your answer" size="50" required />
						    </li>
							
							<li>
								<label>&nbsp;</label>
								<input type="hidden" name="forgtid" id="answer_id" value="<?php echo $data['forgtid'] ?>" />
								<input type="submit" value="Continue" id="form_submit" />
							</li>
						<?php elseif ($data['step'] == 2) : ?>
							<li>
						        <label>Password <span class="required">*</span></label>
						        <input type="password" name="su_password" class="field-long" placeholder="enter your password" size="50" id="password" required />
						    </li>
							<li>
						        <label>Confirm Password <span class="required">*</span></label>
						        <input type="password" name="su_conpassword" class="field-long" placeholder="enter your confirm password" size="50" required />
						    </li>
							
							<li>
								<label>&nbsp;</label>
								<input type="hidden" name="forgtid" value="<?php echo $data['forgtid'] ?>" />
								<input type="submit" value="Change Password" id="form_submit" />
							</li>
						<?php endif; ?>
					    </ul>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="public/js/jquery.validate.min.js"></script>
	<script>
		$().ready(function(){
			$('#passwordfrm').validate({
		        rules: {
		            su_email		: { required: true, email: true },
		            su_answer		: { required: true, remote: { url: "ajax.php", type: "post", data: {'forget_id': function(){ return $('#answer_id').val()} } } },
		            su_password		: { minlength: 6, required: true },
		            su_conpassword	: { equalTo : "#password" },
		        },
			});
		});
	</script>