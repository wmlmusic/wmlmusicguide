              <div class="sidebar_rec">
                    <div class="sidebar_padding">
                    <?php if ($data['user']->isLoggedIn() && !$data['user']->isPayment()) : ?>
                      <h3 style="font-family: &quot;Oxygen&quot;; font-size: 14px; color: rgb(28, 28, 28);">
                        <a href="pay.php" style="color: rgb(28, 28, 28); font-size: 14px;">
                          <em class="second_color">Purchase Directory</em>
                        </a>
                      </h3>
                    <?php endif; ?>
                    <?php if ($data['user']->isLoggedIn()) : ?>
                      <h3 style="font-family: &quot;Oxygen&quot;; font-size: 14px; color: rgb(28, 28, 28);">
                        <a href="logout.php" style="color: rgb(28, 28, 28); font-size: 14px;">
                          <em class="second_color">Logout</em>
                        </a>
                      </h3>
                    <?php else: ?>
                      <h3 style="font-family: &quot;Oxygen&quot;; font-size: 14px; color: rgb(28, 28, 28);">
                        <a href="wml_login.php" style="color: rgb(28, 28, 28); font-size: 14px;">
                          <em class="second_color">Log In</em>
                        </a>
                      </h3>
                      <h3 style="font-family: &quot;Oxygen&quot;; font-size: 14px; color: rgb(28, 28, 28);">
                        <a href="wml_signup.php" style="color: rgb(28, 28, 28); font-size: 14px;">
                          <em class="second_color">Register</em>
                        </a>
                      </h3>
                    <?php endif; ?>
                    </div>
                  </div>
                  <div style="border:0px solid red; margin:0 0 5px 0;">
  				<div class="class_left" style="text-align:right;">Rating (<?php echo $data['total'] ?>):</div>
  				<div class="class_right">
  					<span id="star"></span>
  					<!-- | <a href="#reviews">Reviews (10)</a> -->
  				</div>
  				<div class="clear"></div>
  			</div>                
                  <?php if(count($data['wmlMusicListing']) > 0): ?>		
                  <div class="sidebar_rec">
                    <h2 style="font-family: &quot;Oxygen&quot;; font-size: 24px; color: rgb(28, 28, 28);"><em class="second_color">WML Directory</em></h2>
                    <div class="sidebar_padding">
                    <?php foreach($data['wmlMusicListing'] as $key => $value) : ?>
                      <h3 style="font-family: &quot;Oxygen&quot;; font-size: 14px; color: rgb(28, 28, 28);"><a href="company_directory.php?id=<?php echo $value['mp_id'] ?>" style="color: rgb(28, 28, 28); font-size: 14px;"><em class="second_color"><?php echo $key + 1 ?>. <?php echo $value['mp_name'] ?></em></a></h3>
                      <div class="sep_clr small"></div>
                      <?php endforeach; ?>
                      <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                  </div>
                  <?php endif; ?>
                  <div class="clr"></div>            
				<?php
					$itunes_id = $data['artist_row']['itunes_id'];
					if($itunes_id > 0){
						$res_itunes = file_get_contents('https://itunes.apple.com/lookup?id=' . $itunes_id . '&entity=song&limit=10');
						$obj_itunes = utf8_decode($res_itunes);
						$out_itunes = json_decode($obj_itunes);
					// echo $out_itunes->resultCount;
					if($out_itunes->resultCount > 0){
						// echo "<pre>"; print_r($out_itunes->results);
						$tracks = $out_itunes->results;
						unset($tracks[0]);
				?>
					<div class="side-youtube">
		 				<h2><em class="second_color">Itunes Top Songs:</em></h2>
		 				<ul class="formatedul" id="double">
		 				<?php
		 					foreach($tracks as $key=>$values){
		 				?>
			 				<li><a href="<?php echo $values->collectionViewUrl ?>"><?php echo $key . ' ' . $values->collectionName;  ?></a></li>
			 			<?php } ?>
		 				</ul>
		 			</div>
				<?php } }?>  
               
                  <div class="side-youtube">
                    <h2><em class="second_color">Instagram</em></h2>
                    <div class="sidebar_padding">
                      <!--Instagram Plugin-->
					<div class="side-youtube">
						<li><iframe src="http://widget.websta.me/in/<?php echo $instagram_name[1] ?>/?r=1&w=2&h=2&b=1&p=1" allowtransparency="true" frameborder="0" scrolling="no" style="border:none;overflow:hidden;width:100%; height: 60" >
							</iframe></li>		
					<!--End of Instagram-->
                            
                      </div>
                      <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                  </div>
                  <div class="clr"></div>
                

    <script type="text/javascript">
    
		$(document).ready(function() {
			$('#newsslider').accessNews({
				title : "",
				subtitle:"",
				// speed : "slow",
				// slideBy : 4,
				// slideShowInterval: 100000,
				// slideShowDelay: 100000
			});

			id = 0;
			$.fn.raty.defaults.path = '../public/images';
			$.fn.raty.defaults.readOnly = "<?php echo check_cookie(0);?>";
			$('#star').raty({score:"<?php echo $data['rate'];?>",
	 			click: function(score, evt) {
	 				$.post('index.php',{'rate':score,'pid':id, 'rate_type' : 'd_site'},function(data)
					{
	     				$('#star').raty({score:score, readOnly:true});
					}
				)
			}
			});

			$('ul.tabswml li').click(function(){
				var tab_id = $(this).attr('data-tab');

				$('ul.tabswml li').removeClass('current');
				$('.tabwml-content').removeClass('current');

				$(this).addClass('current');
				$("#"+tab_id).addClass('current');
			})

		});
</script>