<?php
/*---------------------------------------------*\
|   Project: Wordpress Advanced Rating System   |
|     This code were developed by: Mr. Kun 		|
|         Homepage: http://kuncode.com		    |
|      _ +-----------------------------+ _	    |
|     /o)|        Coder: Mr. Kun       |(o\	    |
|    / / |   Web: http://kuncode.com   | \ \	|
|   ( (_ |   Blog: http://veerkun.com  | _) )   |
|  ((\ \)+-/o)---------------------(o\-+(/ /))  |
|  (\\\ \_/ /                       \ \_/ ///)  |
|   \      /                         \      /   |
|    \____/                           \____/    |
\*---------------------------------------------*/
?>
<?php
function kc_wpars_load_settings_page() {
		
		if ( isset($_POST["check-update"]) && $_POST["check-update"]== 'yes' ) {
			check_admin_referer( "kc-wpars-settings-page" );
			$url_parameters = isset($_GET['tab'])? 'checkupdate=true&tab='.$_GET['tab'] : 'checkupdate=true';
			wp_redirect(admin_url('admin.php?page=kc-wpars-settings&'.$url_parameters));
			exit;
		}
		if ( isset($_POST["settings-save"]) && $_POST["settings-save"] == 'yes' ) {
			check_admin_referer( "kc-wpars-settings-page" );
			vk_wpars_save_theme_settings();
			$url_parameters = isset($_GET['tab'])? 'updated=true&tab='.$_GET['tab'] : 'updated=true';
			wp_redirect(admin_url('admin.php?page=kc-wpars-settings&'.$url_parameters));
			exit;
		}
		
	}
	function vk_wpars_save_theme_settings() {
		global $pagenow;
		$settings = get_option( "kc_wpars_settings" );
		if ( $pagenow == 'admin.php' && $_GET['page'] == 'kc-wpars-settings' ){ 
			if ( isset ( $_GET['tab'] ) )
				$tab = $_GET['tab']; 
			else
				$tab = 'general-settings'; 

			switch ( $tab ){ 
				case 'general-settings' :
					if(isset($_POST['auto_display_rating']) && $_POST['auto_display_rating'] == "yes" ) { $settings['auto_display_rating'] = "yes";} else {$settings['auto_display_rating'] = "no";}
					//$settings['auto_display_rating']	  	= $_POST['auto_display_rating'];
					$settings['rating_position']	  		= $_POST['rating_position'];
					$settings['max_rates']	  				= $_POST['max_rates'];
					$settings['size_default']	  			= $_POST['size_default'];
					$settings['shape_default']	  		    = $_POST['shape_default'];
					$settings['color_default']	  			= $_POST['color_default'];
					$settings['logged_method']	  			= $_POST['logged_method'];
					$settings['allow_rate_method']	  		= $_POST['allow_rate_method'];
					
				break; 
				case 'rating-text-template' : 
					$settings['template_no_rate']	  			= $_POST['template_no_rate'];
					$settings['template_rate']	  				= $_POST['template_rate'];
					$settings['template_rated']	  				= $_POST['template_rated'];
					$settings['template_rate_disable']	  		= $_POST['template_rate_disable'];
					$settings['template_rate_not_allow']	  	= $_POST['template_rate_not_allow'];
					$settings['template_rate_only_text']	  	= $_POST['template_rate_only_text'];
				break;
				case 'rating-widget-template' : 
					$settings['template_widget_rate_average']	  	= $_POST['template_widget_rate_average'];
					$settings['template_widget_total_raters']	  	= $_POST['template_widget_total_raters'];
					$settings['template_widget_total_scores']	  	= $_POST['template_widget_total_scores'];
					$settings['template_widget_normal']	  			= $_POST['template_widget_normal'];
				break;
				case 'about' : 
					
				break;
			}
		}
		
		if( !current_user_can( 'unfiltered_html' ) ){
			if ( $settings['rating_template']  )
				$settings['rating_template'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['rating_template'] ) ) );
			
		}

		$updated = update_option( "kc_wpars_settings", $settings );
	}
						
	function kc_wpars_admin_tabs( $current = 'general-settings' ) { 
		$tabs = array('general-settings' => 'General settings','rating-text-template' => 'Rating Text Template','rating-widget-template' =>'Rating Widget Template', 'about' => 'About' ); 
		$links = array();
		echo '<div id="icon-themes" class="icon32"><br></div>';
		echo '<h2 class="nav-tab-wrapper">';
		foreach( $tabs as $tab => $name ){
			$class = ( $tab == $current ) ? ' nav-tab-active' : '';
			echo "<a class='nav-tab$class' href='?page=kc-wpars-settings&tab=$tab'>$name</a>";
		}
		echo '</h2>';
	}
	
function kc_wpars_settings() {
		global $pagenow;
		global $wpars_select_max_rates, $wpars_select_rating_size, $wpars_select_logged_method, $wpars_select_allow_rate;
		global $wpars_radio_shapes, $wpars_radio_colors;
		$settings = get_option( "kc_wpars_settings" );
		?>
		
		<div class="wrap" style="width:80%">
			<h2><?php _e('Wordpress Advanced Rating System Settings', 'wpars') ?></h2>
			
			<?php
				if ( isset ($_GET['updated']) &&  esc_attr( $_GET['updated'] )  == 'true') echo '<div class="updated" ><p>Your settings updated.</p></div>';
				//if ( esc_attr( $_GET['checkupdate'] ) == 'true') echo '<div class="updated" ><p>Check update successful.</p></div>'; 
				if ( isset ( $_GET['tab'] ) ) kc_wpars_admin_tabs($_GET['tab']); else kc_wpars_admin_tabs('general-settings');
			?>

			<div id="poststuff">
				<form method="post" action="<?php admin_url( 'admin.php?page=kc-wpars-settings' ); ?>">
					<?php
					wp_nonce_field( "kc-wpars-settings-page" ); 
					
					if ( $pagenow == 'admin.php' && $_GET['page'] == 'kc-wpars-settings' ){ 
					
						if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab']; 
						else $tab = 'general-settings'; 
						
						//echo '<table class="form-table">';
						switch ( $tab ){
							case 'general-settings' :
								echo "<script type=\"text/javascript\" src=\"". WPARS_URL. "js/jquery-1.9.1.min.js\"></script>\n";
								
								?>
								 
								<script type='text/javascript'>//<![CDATA[ 
								$(window).load(function(){
								$('#shape_default input:radio').addClass('wpars_input_hidden');
								$('#shape_default label').click(function() {
									$(this).addClass('wpars_selected').siblings().removeClass('wpars_selected');
								});
								$('#color_default input:radio').addClass('wpars_input_hidden');
								$('#color_default label').click(function() {
									$(this).addClass('wpars_selected').siblings().removeClass('wpars_selected');
								});
								});//]]>  
								</script>
								
								<table class="widefat" cellspacing="0" style="width:90%;margin-top:15px;margin-left:25px;">
									<thead><th><?php _e('General Settings', 'wpars') ?></th></thead>
									<tr>
										<td>
											<table id="wpars_rating_settings" class="wpars_rating_settings">
												<tr>
													<td class="left"><?php _e('Auto display rating', 'wpars') ?></td>
													<td class="right">
													<input type="checkbox" name="auto_display_rating" value="yes" <?php if($settings['auto_display_rating'] == "yes") { echo "checked"; } ?>> 
													<span class="note"><?php _e('Auto display rating in', 'wpars') ?></span>
													<select name="rating_position">
														<option value="bellow" <?php if($settings['rating_position'] == "bellow") { echo "selected"; } ?>><?php _e('Bellow content', 'wpars') ?></option>
														<option value="above" <?php if($settings['rating_position'] == "above") { echo "selected"; } ?>><?php _e('Above content', 'wpars') ?></option>
													</select>
													
													</td>
												</tr>
												<tr>
													<td class="left"><?php _e('Max Rating', 'wpars') ?></td>
													<td class="right">
													<?php echo wpars_select_box($wpars_select_max_rates, $settings['max_rates'], "max_rates", "") ; ?>
													<span class="note"><?php _e('(Switch 5 or 10)', 'wpars') ?></span></td>
												</tr>
												<tr>
													<td class="left"><?php _e('Default image size', 'wpars') ?></td>
													<td class="right">
													<?php echo wpars_select_box($wpars_select_rating_size, $settings['size_default'], "size_default", "") ; ?>
													<span class="note"><?php _e('(Value range from 5 to 50 px)', 'wpars') ?></span></td>
												</tr>
												<tr>
													<td class="left"><?php _e('Rating Shapes', 'wpars') ?></td>
													<td class="right">
													<?php echo wpars_radio_images($wpars_radio_shapes, "shape_default", $settings['shape_default'], "shapes/red"); ?>
										
													</td>
												</tr>
												<tr>
													<td class="left"><?php _e('Rating colors', 'wpars') ?></td>
													<td class="right">
													<?php echo wpars_radio_images($wpars_radio_colors, "color_default", $settings['color_default'], "colors"); ?>
													</td>
												</tr>
												<tr>
													<td class="left"><?php _e('Allow rating', 'wpars') ?></td>
													<td class="right">
													<?php echo wpars_select_box($wpars_select_allow_rate, $settings['allow_rate_method'], "allow_rate_method", "") ; ?>
													</td>
												</tr>
												<tr>
													<td class="left"><?php _e('Logged method', 'wpars') ?></td>
													<td class="right">
													<?php echo wpars_select_box($wpars_select_logged_method, $settings['logged_method'], "logged_method", "") ; ?>
													</td>
												</tr>
												
												<tr>
													<td colspan="2" style="clear: both; text-align:center;">
														<input type="hidden" name="settings-save" value="yes" />
														<input type="submit" name="Submit"  class="button-primary" value="<?php _e('Update Settings', 'wpars') ?>" />
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								
								<?php
							break; 
							case 'rating-text-template' : 
								?>
								<table class="widefat" cellspacing="0" style="width:100%;margin-top:15px;margin-left:25px;">
									<thead><th><?php _e('Rating Text Template Settings', 'wpars') ?></th></thead>
									<tr>
										<td>
											<table id="wpars_rating_settings" class="wpars_rating_settings">
												<tr>
													<td class="left">
													<?php _e('List tags available for ratings template.', 'wpars') ?><br>
													<?php _e('<font color="red">Please make sure tag begin by "<font color="green">{</font>" and end by "<font color="green">}</font>".</font>
													<font color="red">Please make sure tag begin by "<font color="green">{</font>" and end by "<font color="green">}</font>".<br>Please do not change anything between "<font color="green">{</font>" - "<font color="green">}</font>".</font>
													', 'wpars') ?>
													</td>
													<td class="right" style="background-color: #FFFFFF">
													<div><?php echo __('<strong>{total_raters}</strong>', 'wpars') ?> : <?php _e('Display the total times of ratings', 'wpars') ?></div>
													<div><?php echo __('<strong>{total_scores}</strong>', 'wpars') ?> : <?php _e('Display the total scores of the ratings', 'wpars') ?></div>
													<div><?php echo __('<strong>{rate_average}</strong>', 'wpars') ?>  : <?php _e('Display the average of ratings', 'wpars') ?></div>
													<div><?php echo __('<strong>{rate_percent}</strong>', 'wpars') ?> : <?php _e('Display the percentage of ratings', 'wpars') ?></div>
													<div><?php echo __('<strong>{max_rates}</strong>', 'wpars') ?> : <?php _e('Display the max number of ratings', 'wpars') ?></div>
													</td>
												</tr>
												<tr>
													<td class="left">
													<?php _e('Template No Rating', 'wpars') ?>
													<br><input type="button" class="button" value="<?php _e('Reset Default Template', 'wpars') ?>" onclick="reset_default_ratings_templates('no_rate');">
													</td>
													<td class="right">
													<textarea id="template_no_rate" name="template_no_rate" rows="3"><?php echo esc_html( stripslashes( $settings["template_no_rate"] ) ); ?></textarea>
													</td>
												</tr>
												<tr>
													<td class="left"><?php _e('Template Rating', 'wpars') ?>
													<br><input type="button" class="button" value="<?php _e('Reset Default Template', 'wpars') ?>" onclick="reset_default_ratings_templates('rate');">
													</td>
													<td class="right">
													<textarea id="template_rate" name="template_rate" rows="3"><?php echo esc_html( stripslashes( $settings["template_rate"] ) ); ?></textarea>
													</td>
												</tr>
												<tr>
													<td class="left"><?php _e('Template Rated', 'wpars') ?>
													<br><input type="button" class="button" value="<?php _e('Reset Default Template', 'wpars') ?>" onclick="reset_default_ratings_templates('rated');">
													</td>
													<td class="right">
													<textarea id="template_rated" name="template_rated" rows="3"><?php echo esc_html( stripslashes( $settings["template_rated"] ) ); ?></textarea>
													</td>
												</tr>
												<tr>
													<td class="left"><?php _e('Template rating disable', 'wpars') ?>
													<br><input type="button" class="button" value="<?php _e('Reset Default Template', 'wpars') ?>" onclick="reset_default_ratings_templates('rate_disable');">
													</td>
													<td class="right">
													<textarea id="template_rate_disable" name="template_rate_disable" rows="3"><?php echo esc_html( stripslashes( $settings["template_rate_disable"] ) ); ?></textarea>
													</td>
												</tr>
												<tr>
													<td class="left"><?php _e('Template rating not allow', 'wpars') ?>
													<br><input type="button" class="button" value="<?php _e('Reset Default Template', 'wpars') ?>" onclick="reset_default_ratings_templates('rate_not_allow');">
													</td>
													<td class="right">
													<textarea id="template_rate_not_allow" name="template_rate_not_allow" rows="3"><?php echo esc_html( stripslashes( $settings["template_rate_not_allow"] ) ); ?></textarea>
													</td>
												</tr>
												<tr>
													<td class="left"><?php _e('Template rating only text', 'wpars') ?>
													<br><input type="button" class="button" value="<?php _e('Reset Default Template', 'wpars') ?>" onclick="reset_default_ratings_templates('rate_only_text');">
													</td>
													</td>
													<td class="right">
													<textarea id="template_rate_only_text" name="template_rate_only_text" rows="3"><?php echo esc_html( stripslashes( $settings["template_rate_only_text"] ) ); ?></textarea>
													</td>
												</tr>
												<tr>
													<td colspan="2" style="clear: both; text-align:center;">
														<input type="hidden" name="settings-save" value="yes" />
														<input type="button" class="button" value="<?php _e('Reset All Default Template', 'wpars') ?>" onclick="reset_all_default_ratings_templates();">
														<input type="submit" name="Submit"  class="button-primary" value="<?php _e('Update Settings', 'wpars') ?>" />
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								
								<?php
							break;
							case 'rating-widget-template' : 
								?>
								<table class="widefat" cellspacing="0" style="width:100%;margin-top:15px;margin-left:25px;">
									<thead><th><?php _e('Rating Text Template Settings', 'wpars') ?></th></thead>
									<tr>
										<td>
											<table id="wpars_rating_settings" class="wpars_rating_settings">
												<tr>
													<td class="left">
													<?php _e('List tags available for ratings template.', 'wpars') ?><br>
													<?php _e('<font color="red">Please make sure tag begin by "<font color="green">{</font>" and end by "<font color="green">}</font>".<br>Please do not change anything between "<font color="green">{</font>" - "<font color="green">}</font>".</font>
													', 'wpars') ?>
													</td>
													<td class="right" style="background-color: #FFFFFF">
													<div><?php echo __('<strong>{total_raters}</strong>', 'wpars') ?> : <?php _e('Display the total times of ratings', 'wpars') ?></div>
													<div><?php echo __('<strong>{total_scores}</strong>', 'wpars') ?> : <?php _e('Display the total scores of the ratings', 'wpars') ?></div>
													<div><?php echo __('<strong>{rate_average}</strong>', 'wpars') ?>  : <?php _e('Display the average of ratings', 'wpars') ?></div>
													<div><?php echo __('<strong>{rate_percent}</strong>', 'wpars') ?> : <?php _e('Display the percentage of ratings', 'wpars') ?></div>
													<div><?php echo __('<strong>{max_rates}</strong>', 'wpars') ?> : <?php _e('Display the max number of ratings', 'wpars') ?></div>
													<div><?php echo __('<strong>{post_url}</strong>', 'wpars') ?>  : <?php _e('URL permalink of post', 'wpars') ?></div>
													<div><?php echo __('<strong>{post_title}</strong>', 'wpars') ?> : <?php _e('Title of post', 'wpars') ?></div>
													<div><?php echo __('<strong>{post_title_trim}</strong>', 'wpars') ?> : <?php _e('Title of post and trim if > max length config in each widget', 'wpars') ?></div>
													<div><?php echo __('<strong>{rating_img}</strong>', 'wpars') ?> : <?php _e('Display image of ratings', 'wpars') ?></div>
													</td>
												</tr>
												<tr>
													<td class="left">
													<?php _e('Template Top Average', 'wpars') ?>
													<br><input type="button" class="button" value="<?php _e('Reset Default Template', 'wpars') ?>" onclick="reset_default_ratings_widget_templates('rate_average');">
													</td>
													<td class="right">
													<textarea id="template_widget_rate_average" name="template_widget_rate_average" rows="3"><?php echo esc_html( stripslashes( $settings["template_widget_rate_average"] ) ); ?></textarea>
													</td>
												</tr>
												<tr>
													<td class="left"><?php _e('Template Top Raters', 'wpars') ?>
													<br><input type="button" class="button" value="<?php _e('Reset Default Template', 'wpars') ?>" onclick="reset_default_ratings_widget_templates('total_raters');">
													</td>
													<td class="right">
													<textarea id="template_widget_total_raters" name="template_widget_total_raters" rows="3"><?php echo esc_html( stripslashes( $settings["template_widget_total_raters"] ) ); ?></textarea>
													</td>
												</tr>
												<tr>
													<td class="left"><?php _e('Template Top Scores', 'wpars') ?>
													<br><input type="button" class="button" value="<?php _e('Reset Default Template', 'wpars') ?>" onclick="reset_default_ratings_widget_templates('total_scores');">
													</td>
													<td class="right">
													<textarea id="template_widget_total_scores" name="template_widget_total_scores" rows="3"><?php echo esc_html( stripslashes( $settings["template_widget_total_scores"] ) ); ?></textarea>
													</td>
												</tr>
												<tr>
													<td class="left"><?php _e('Template Normal Sort Post', 'wpars') ?>
													<br><input type="button" class="button" value="<?php _e('Reset Default Template', 'wpars') ?>" onclick="reset_default_ratings_widget_templates('normal');">
													</td>
													<td class="right">
													<textarea id="template_widget_normal" name="template_widget_normal" rows="3"><?php echo esc_html( stripslashes( $settings["template_widget_normal"] ) ); ?></textarea>
													</td>
												</tr>
												<tr>
													<td colspan="2" style="clear: both; text-align:center;">
														<input type="hidden" name="settings-save" value="yes" />
														<input type="button" class="button" value="<?php _e('Reset All Default Template', 'wpars') ?>" onclick="reset_all_default_ratings_widget_templates();">
														<input type="submit" name="Submit"  class="button-primary" value="<?php _e('Update Settings', 'wpars') ?>" />
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								
								<?php
							break;
							case 'about' : 
								?>
								
							<table class="widefat" cellspacing="0" style="width:90%;margin-top:15px;margin-left:25px;">
									<thead><th><?php _e('About Plugin', 'wpars') ?></th></thead>
									
									<tr>
										<td>
											<strong><?php _e('Plugin Name:', 'wpars') ?> <?php echo WPARS_NAME; ?></strong>
										</td>
									</tr>
									<tr>
										<td>
											<strong><?php _e('Install Version:', 'wpars') ?> <?php echo WPARS_VERSION; ?></strong>
											<input type="hidden" name="check-update" value="yes" />
											<input type="submit" name="Submit"  class="button-primary" value="<?php _e('Check Update', 'wpars') ?>" />
											<?php if ( isset($_GET['checkupdate']) && esc_attr( $_GET['checkupdate'] ) == 'true') echo '<span>'.wpars_update_note().'</span>'; ?>
											
										</td>
									</tr>
									<tr>
										<td>
											<strong><?php _e('Descriptions:', 'wpars') ?></strong> <?php _e('This plugin will add rating system to wordpress with custom rating size, custom colors, custom shapes and widget rating statistics. Plugin support for all custom post type.', 'wpars') ?>
										</td>
									</tr>
									<tr>
										<td>
											<strong><?php _e('Create by:', 'wpars') ?></strong> <?php _e('Mr. Kun', 'wpars') ?>
										</td>
									</tr>
									<tr>
										<td>
											<strong><?php _e('Website:', 'wpars') ?></strong> <?php _e('<a href="http://kuncode.com" title="Visite plugin home page" target="_blank">http://kuncode.com</a>', 'wpars') ?>
										</td>
									</tr>
									<tr>
										<td>
											<strong><?php _e('Social connect:', 'wpars') ?></strong> <?php _e('<a href="https://twitter.com/KunCoder" title="Connect us on twitter" target="_blank">Twitter</a> | <a href="http://www.facebook.com/KunCoder" title="Connect us on facebook" target="_blank">Facebook</a> | <a href="https://plus.google.com/113355586095235008397/" title="Connect us on google+" target="_blank">Google+</a>', 'wpars') ?>
										</td>
									</tr>
									<tr>
										<td>
											<strong><?php _e('Support:', 'wpars') ?></strong> <?php _e('If you need support, please visit our website at <a href="http://kuncode.com" title="Visite plugin home page" target="_blank">http://kuncode.com</a> for send email support and get more information.', 'wpars') ?>
										</td>
									</tr>
									
								</table>
								
								<?php
							break;
						}
						
					}
					?>
					
				</form>
				<p style="text-align: center; font-weight: bold;"><?php echo WPARS_NAME; ?> <?php echo __('version', 'wpars') ?> <?php echo WPARS_VERSION; ?> <?php echo __('developed by <a href="http://kuncode.com" target="_blank" title="kuncode.com" alt="kuncode.com">KunCode.Com</a> ', 'wpars') ?></p>
			</div>

		</div>
		<?php
	}

?>