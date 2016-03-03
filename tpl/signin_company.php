	<div class="tabs standard">
      	<div class="tabs">
	      	<div class="tab-wrapper">
		      	<div id="menuwrapper">
		      		<ul>
		        		<li><a href="directory_page.php">World Music Listing</a>
		        			<?php echo $data['musicListing'] ?>
		        		</li>
					</ul>
		      	</div>
		    </div>        
	        <div class="tab-content">
		        <div id="page-heading">
					<h1>World Music Listing Company Log in</h1>
					<hr />
				</div>
				<div id="tab1" class="tab active">
					<form class="form-style-1" id="signin" method="POST" action="logincompanycontroller.php">
					<?php if(isset($_SESSION['message'])){ ?>
						<div class="alert alert-success"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></div>
					<?php } ?>
					<?php if(isset($_SESSION['error'])){ ?>
						<div class="alert alert-error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
					<?php } ?>
						<ul class="form-style-1">
						    <li>
						        <label>Email <span class="required">*</span></label>
						        <input type="email" name="com_email" class="field-long" placeholder="enter your email address" size="50" required />
						    </li>
						    <li>
						    	<label>Password <span class="required">*</span></label>
								<input type="password" name="com_password" class="field-long" placeholder="enter password" size="50" required id="password" />
							</li>
							
							<li>
								<label>&nbsp;</label>
								<input type="submit" value="Log in" id="form_submit" /> &nbsp<!-- <a href="wml_password.php">Forgot Password?</a> -->
							</li>
					    </ul>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="public/js/jquery.validate.min.js"></script>
	<script>
		$().ready(function(){
			$('#signin').validate({
		        rules: {
		            com_email		: { required: true, email: true },
		            com_password		: { minlength: 6, required: true }
		        },
			});
		});
	</script>