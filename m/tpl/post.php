	<link type="text/css" rel="stylesheet" href="../public/css/jquery.raty.css"/>
	<script src='../public/js/jquery.raty.js' type="text/javascript"></script>
        <div class="sidebar_widgets comp">
            <?php include 'tpl/sidebar.php'; ?>  
        </div>
        <!--sidebar-widget comp-->
        <div class="clr"></div>
    </div>
</div>
<div class="twelve columns">
    <div class="centercol last">
		<?php include 'tpl/social.php'; ?>
        <div class="clr"></div>
        <div class="clr"></div>
            <div class="content">
				<div class="content_resize" id="gallery"> 
					<!-- content start -->
					<h2><?php echo $data['post_row']['name'] ?></h2>
<div style="border:0px solid red; margin:0 0 5px 0;">
							<div class="class_left" style="text-align:right;">Rating (<?php echo $data['total'] ?>):</div>
						<div class="class_right">
							<span id="star"></span>
							<!-- | <a href="#reviews">Reviews (10)</a> -->
						</div>
					<div class="clear"></div>
				</div>
                    <div class="clr"></div>
                    <div class="sep"></div>
                    <div class="clr"></div>
                    <?php
			// print_r($data);
		$imageName = 'post_' . $data['post_row']['id'] . '.jpg';
		$isExistImg	= getimagesize('../uploads/' . $imageName);
		$imgurl	= $isExistImg ? '../uploads/' . $imageName : '../uploads/logo.png';
					?>
					<?php if($isExistImg) { ?>
                            <div class="pic">
						<a href="<?php echo $imgurl ?>" class="prettyPhoto" rel="prettyPhoto[id]"><img src="<?php echo $imgurl ?>" alt="Image" /> </a></div><?php } ?> 
                            <p><?php echo $data['post_row']['details'] ?></p>
                            <p><a href="<?php echo $data['post_row']['post_link'] ?>" target="_blank">view <?php echo $data['post_row']['name'] ?></a></p> 
				</div>
				<div class="clr"></div>
                <div class="sep_clr"></div>
                <div class="clr"></div>
                
                <!-- content end -->
                <div class="clr"></div>
            </div>
        <div class="clr"></div>
    </div>
	<div class="clr"></div>
        <div class="sidebar_widgets mob">
            <?php include 'tpl/sidebar_m.php'; ?>  
        </div>
    <script type="text/javascript">
    	id = <?php echo $data['id'];?>;
		$.fn.raty.defaults.path = '../public/images';
		$.fn.raty.defaults.readOnly = "<?php echo check_cookie($data['id']);?>";
		$('#star').raty({score:"<?php echo $data['rate'];?>",
 			click: function(score, evt) {
 				$.post('single_profile.php',{'rate':score,'pid':id, 'rate_type' : '<?php echo $data["rate_type"] ?>'},function(data)
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
        <!--sidebar-widget mob-->               