	<link type="text/css" rel="stylesheet" href="public/css/jquery.raty.css"/>
	<script src='public/js/jquery.raty.js' type="text/javascript"></script> 
	<div class="tabs standard">
      <div class="tabs">
      	<div class="tab-wrapper">
	      	<div id="menuwrapper">
	      		<ul>
	        		<li><a href="index.php">World Music Listing</a></li>
				    <li><a href="#">Bio</a></li>
				    <li><a href="#">Print</a></li>
				    <li><a href="#">Contact</a></li>
				</ul>
	      	</div>
	    </div>        
        <div class="tab-content">
        <div id="page-heading">
		<h1>Artist Name</h1>
		<hr />
	</div>
    
  	<div id="tab1" class="tab active">
  		<div class="class_left">
                        
  			<div style="border:0px solid red; margin:0 0 5px 0;">
  				<div class="class_left" style="text-align:right;">Rating (<?php echo $data['total'] ?>):</div>
  				<div class="class_right">
                                        <span id="star"></span>
								<!-- | <a href="#reviews">Reviews (10)</a> -->    
  					<a href="#comments">Comments (10)</a>
  				</div>
  				<div class="clear"></div>
  			</div>
	  		<iframe width="560" height="315" src="https://www.youtube.com/embed/AqHbpLB7EPw" frameborder="0" allowfullscreen></iframe>

			<div class="clear"></div>
			<hr />
			<br />
			<div id="comments" class="gap">
				<h4>Comments</h4>
				<div class="tab_content">
				<ul>
				    <li>
				      <h5>This is good</h5>
				      <h6>By: Comments Name on March 27, 2015</h6>
				      <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit ametLorem ipsum dolor sit amet Lorem ipsum dolor sit amet...</p>
				    </li>
				       
				    <li>
				      <h5>This is title</h5>
				      <h6>By: Comments Name on March 20, 2015</h6>
				      <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit ametLorem ipsum dolor sit amet Lorem ipsum dolor sit amet...</p>
				    </li>
				</ul>
				<a class="review_form">Add Comments</a>
				<div class="review_panel">
					<form class="form-style-1" id="review_form">
						<label>Full Name</label>
						<input type="text" name="review_name" class="field-divided" placeholder="enter your full name" size="50" required />

						<label>Email</label>
						<input type="email" name="review_email" class="field-divided" placeholder="enter your email address" size="50" required />

						<label>Title</label>
						<input type="text" name="review_title" class="field-divided" placeholder="enter your review title" size="50" required />

						<label>Reviews</label>
						<textarea name="review_text" placeholder="enter your review here" class="field-divided" required></textarea>

						<label>&nbsp;</label>
						<input type="submit" value="Submit" id="form_submit" />
						<input type="hidden" name="parent_id" value="<?php echo $data['id'] ?>">
						<input type="hidden" name="type" value="artist">
					</form>
				</div>
			</div>
			</div>
		</div>
		<div class="class_right">
		</div>
    	<div class="clear"></div>
    </div>	
    <script type="text/javascript">
    	id = <?php echo $data['id'];?>;
		$.fn.raty.defaults.path = 'public/images';
		$.fn.raty.defaults.readOnly = "<?php echo check_cookie($data['id']);?>";
		$('#star').raty({score:"<?php echo $data['rate'];?>",
 			click: function(score, evt) {
 				$.post('profile_videos.php',{'rate':score,'pid':id, 'rate_type' : '<?php echo $data["rate_type"] ?>'},function(data)
				{
     				$('#star').raty({score:score, readOnly:true});
				}
			)
		}
		});
		$(document).ready(function() {
			$('#newsslider').accessNews({
				title : "",
				subtitle:"",
				// speed : "slow",
				// slideBy : 4,
				// slideShowInterval: 100000,
				// slideShowDelay: 100000
			});
			$(".review_form").click(function() {
				$(".review_panel").slideToggle("slow");
			});
			$('#form_submit').prop( "disabled", false );
			$('form#review_form').submit(function(){
				alert('submitted');
				return false;
				var form = $('form#review_form').serialize();
				$.ajax({
		            url: "ajax_smscontroller.php",
		            type: "POST",             
		            data: form,
		            contentType: false,
		            cache: false,
		            processData:false,
		            beforeSend: function (){
		              	$('#response_server').removeClass('alert-success alert-danger').html('');
		              	$('#form_submit').prop( "disabled", true ).val('Submitting...');
		            },
		            success: function(data)   // A function to be called if request succeeds
		            {
		              	if(data.status == 1){ //success
		                	// $('#response_server').addClass("alert-success").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + data.message);
		              	}
		              	else{
		                	// $('#response_server').addClass("alert-danger").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + data.message);
		              	}
		              	$('#form_submit').prop( "disabled", false ).val('Submit');
		            }
		        });
				return false;
			});
			
		});
</script>