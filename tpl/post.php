<link type="text/css" rel="stylesheet" href="public/css/jquery.raty.css"/>
<script src='public/js/jquery.raty.js' type="text/javascript"></script>
<div class="tabs standard">
      <div class="tabs">
      	<div class="tab-wrapper">
	      	<div id="menuwrapper">
	      		<ul>
	        		<li><a href="wml_login.php">World Music Listing</a>
				</ul>
	      	</div>
	    </div>        
        <div class="tab-content">
        <div id="page-heading">
		<h1><?php echo $data['post_row']['name'] ?></h1>
		<hr />
	</div>    
  	<div id="tab1" class="tab active">
        <div class="class_left">
					<div style="border:0px solid red; margin:0 0 5px 0;">
						<div class="class_left" style="text-align:right;">Rating (<?php echo $data['total'] ?>):</div>
							<div class="class_right">
								<span id="star"></span>
								<!-- | <a href="#reviews">Reviews (10)</a> -->
							</div>
						<div class="clear"></div>
					</div>
  	<?php
  	  // print_r($data);
		$imageName = 'post_' . $data['post_row']['id'] . '.jpg';
		$isExistImg	= getimagesize('uploads/' . $imageName);
		$imgurl	= $isExistImg ? 'uploads/' . $imageName : './uploads/logo.png';
  	?>
  		<div class="search">
	  		<ul>
	  			<li>
	  				<?php if($isExistImg) { ?><div class="tbl_image"><img src="<?php echo $imgurl ?>" /></div><?php } ?>

	    			<p><?php echo $data['post_row']['details'] ?></p>
										
					<p><a href="<?php echo $data['post_row']['post_link'] ?>" target="_blank">view <?php echo $data['post_row']['name'] ?></a></p>
	    		</li>
	    	</ul>
	    </div>
    	<div class="clear"></div>
    </div>
    <script type="text/javascript">
		var disqus_shortname = 'worldmusiclisting';
		var disqus_url = '<?php echo $actual_link ?>';

		(function() {
	        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
	        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	    })();

    	id = <?php echo $data['id'];?>;
		$.fn.raty.defaults.path = 'public/images';
		$.fn.raty.defaults.readOnly = "<?php echo check_cookie($data['id']);?>";
		$('#star').raty({score:"<?php echo $data['rate'];?>",
 			click: function(score, evt) {
 				$.post('post.php',{'rate':score,'pid':id, 'rate_type' : '<?php echo $data["rate_type"] ?>'},function(data)
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