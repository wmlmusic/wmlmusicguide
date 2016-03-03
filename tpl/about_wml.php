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
					<h1>About WML</h1>
					<hr />
				</div>
				<div id="tab1" class="tab active">

World Music Listing is a diverse guide for your connection to the music and entertainment industry. The directory consists of over 200 professional Artists, Musicians, Mixing/Mastering Engineers, Music Producers, Radio Personnel/Disc Jocks, etc. in the Hip-Hop/Rap, R&amp;B, Gospel, Pop, Country, Rock, Reggae, Dancehall, and Soca industry as well as Independent/Major Record Labels, Radio Stations, Marketing/Promotions, Distribution, and Public Relation companies. World Music Listing also includes Models, Entertainers, Photographers, Video Directors, Magazines and professionals within other fields of the music business/entertainment industry. It is designed to contact professionals within different fields of the music business and entertainment industry for booking/business purposes. 
<br /><br />
Following years of behind the scenes networking relationships gradually built with various individuals throughout the world within music and entertainment. What started out as a travel to the West Indies on a visit to spend time with family eventually turned into creating a genuine and authentic secure platform for the people allowing a direct hands-on approach to dealing with their business ventures. A growing interest of talents inquiring on branching out and gaining legitimate work outside of their local scene within their respective fields across a broader spectrum gave life to what would later become World Music Listing.

				</div>
			</div>
		</div>
	</div>
	<div id="termscondition" style="display: none;" title="Terms and Conditions">
		I am terms and conditions
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
		            su_email		: { required: true, email: true, remote: { url: "ajax.php", type: "post" } },
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
		        messages:{
				    su_email:{
				        remote: $.validator.format('{0} is already in use, please choose a different email')
				    }
				}
			});

			$('.condition').click(function () {
		        if ($(this).is(':checked')) {
		            $("#termscondition").dialog({
		            	modal: true,
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