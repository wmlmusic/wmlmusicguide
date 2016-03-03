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
function wpars_register_widgets() {
	register_widget('WP_Widget_wpars_statistics');
	
}
add_action( 'widgets_init', 'wpars_register_widgets' );
 
class WP_Widget_wpars_statistics extends WP_Widget {
	//Widget information
	function __construct() {
		$widget_ops = array('classname' => 'widget_wpars', 'description' => __('Display statistics post by wordpress advanced rating system'));
		$control_ops = array('width' => 300, 'height' => 450);
		$this->WP_Widget(false, __('WPARS statistics'), $widget_ops, $control_ops);
		//parent::WP_Widget(false,$name='Recent From Categories Widget',$widget_ops,$control_ops);
	}
	// outputs the content of the widget
	function widget( $args, $instance ) {
		extract($args);
		$title_widget 		= apply_filters('widget_title', $instance['title_widget']);
		$post_type 			= $instance['post_type'];
		$terms_id 			= $instance['terms_id'];
		$order_by			= $instance['order_by'];
		$order				= $instance['order'];
		$number_posts   	= intval($instance['number_posts']);
		$title_chars    	= intval($instance['title_chars']);
		$rating_min_rate  	= intval($instance['rating_min_rate']);
		$rating_img_size  	= intval($instance['rating_img_size']);
		$show_num_list  	= $instance['show_num_list'];
		$thumb_show  		= $instance['thumb_show'];
		$thumb_w  			= intval($instance['thumb_w']);
		$thumb_h  			= intval($instance['thumb_h']);
		$args_widget =  array (
			'post_type'  => $post_type,
			'terms_id'  => $terms_id,
			'order_by' => $order_by,
			'order' => $order,
			'number_posts' => $number_posts,
			'title_chars' => $title_chars,
			'rating_min_rate' => $rating_min_rate,
			'rating_img_size' => $rating_img_size,
			'show_num_list' => $show_num_list,
			'thumb_show' => $thumb_show,
			'thumb_w' => $thumb_w,
			'thumb_h' => $thumb_h,
		);

		echo $before_widget;
		echo $before_title;
		if ( ! empty( $title_widget ) ) {
		echo $title_widget; } else { _e( 'Rating statistics', 'wpars' );}
		echo $after_title;
		echo wpars_statistics_widget($args_widget);
		echo $after_widget;
	}
	
	// processes widget options to be saved
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title_widget'] 		= strip_tags($new_instance['title_widget']);
		$instance['order_by'] 			= $new_instance['order_by'];
		$instance['order'] 				= $new_instance['order'];
		$instance['number_posts'] 		= intval($new_instance['number_posts']);
		$instance['title_chars'] 		= intval($new_instance['title_chars']);
		$instance['rating_min_rate'] 	= intval($new_instance['rating_min_rate']);
		$instance['rating_img_size'] 	= intval($new_instance['rating_img_size']);
		$instance['show_num_list'] 		= $new_instance['show_num_list'];
		$instance['thumb_show'] 		= $new_instance['thumb_show'];
		$instance['thumb_w'] 			= intval($new_instance['thumb_w']);
		$instance['thumb_h'] 			= intval($new_instance['thumb_h']);
		$instance['post_type'] 			= $new_instance['post_type'];
		$instance['terms_id'] 			= $new_instance['terms_id'];
		return $instance;
	}	
	// outputs the options form on admin
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title_widget' => '','post_type' => 'post', 'terms_id' => array(),'order_by' => '', 'order' => 'DESC','number_posts' => '5', 'title_chars' => '0','rating_min_rate' => '0', 'rating_img_size' =>'10', 'show_num_list' => 'yes', 'thumb_show' => 'no','thumb_w' => '30','thumb_h' => '30') );
		$title_widget 		= esc_attr($instance['title_widget']);
		$post_type 			= $instance['post_type'];
		$terms_id 			= $instance['terms_id'];
		$order_by			= $instance['order_by'];
		$order				= $instance['order'];
		$number_posts   	= intval($instance['number_posts']);
		$show_num_list		= $instance['show_num_list'];
		$title_chars    	= intval($instance['title_chars']);
		$rating_min_rate  	= intval($instance['rating_min_rate']);
		$rating_img_size  	= intval($instance['rating_img_size']);
		$thumb_show  		= $instance['thumb_show'];
		$thumb_w  			= intval($instance['thumb_w']);
		$thumb_h  			= intval($instance['thumb_h']);
		
		$sort_order = array(
			'wpars_average' 		=> __('Rating average', 'wpars'),
			'wpars_raters' 			=> __('Rating total raters', 'wpars'),
			'wpars_scores' 			=> __('Rating total scores', 'wpars'),
			'wpars_post_ID' 		=> __('Post ID', 'wpars'),
			'wpars_post_title' 		=> __('Post title', 'wpars'),
			'wpars_post_date' 		=> __('Post date', 'wpars'),
			'wpars_comment_count' 	=> __('Post comment', 'wpars'),
			'wpars_rand' 			=> __('Post random', 'wpars'),
		);
		?>
		<div><p>
			<label for="<?php echo $this->get_field_id('title_widget'); ?>"><span class="wpars_admin_widget_title"><?php _e('Widget title', 'wpars'); ?> </span>
			<input class="widefat" id="<?php echo $this->get_field_id('title_widget'); ?>" name="<?php echo $this->get_field_name('title_widget'); ?>" type="text" value="<?php echo $title_widget; ?>" /></label>
		</p></div>
		<div class="clear"></div>
		<div><p>
			<label for="<?php echo $this->get_field_id('order_by'); ?>"><span class="wpars_admin_widget_title"><?php _e('Order by', 'wpars'); ?></span>
				<select name="<?php echo $this->get_field_name('order_by'); ?>" id="<?php echo $this->get_field_id('order_by'); ?>" class="widefat">
					<?php 
					foreach ($sort_order as $k_sort_order => $v_sort_order ) { ?>
						<option value="<?php echo $k_sort_order; ?>"<?php selected($k_sort_order, $order_by); ?>><?php echo $v_sort_order; ?></option>
					<?php }
					?>
					
				</select>
			</label>
		</p></div>
		<div class="clear"></div>
	
		<div><p>
			<label for="<?php echo $this->get_field_id('order'); ?>"><span class="wpars_admin_widget_title"><?php _e('Sort order', 'wpars'); ?></span>
				<select name="<?php echo $this->get_field_name('order'); ?>" id="<?php echo $this->get_field_id('order'); ?>" class="widefat">	
					<option value="DESC"<?php selected('DESC', $order); ?>><?php _e('DESC (High to low)', 'wpars'); ?></option>
					<option value="ASC"<?php selected('ASC', $order); ?>><?php _e('ASC (Low to high)', 'wpars'); ?></option>
				</select>
			</label>
		</p></div>
		<div class="clear"></div>
		<div><p>
			<label for="<?php echo $this->get_field_id('number_posts'); ?>"><span class="wpars_admin_widget_title"><?php _e('Number posts show', 'wpars'); ?> </span>
			<input class="widefat" id="<?php echo $this->get_field_id('number_posts'); ?>" name="<?php echo $this->get_field_name('number_posts'); ?>" type="text" value="<?php echo $number_posts; ?>" /></label>
			
			<span class="wpars_admin_widget_note"><?php _e('Number posts will show.', 'wpars'); ?></span>
		</p></div>
		<div class="clear"></div>
		<div><p>
			<label for="<?php echo $this->get_field_id('title_chars'); ?>"><span class="wpars_admin_widget_title"><?php _e('Max characters title length', 'wpars'); ?> </span>
			<input class="widefat" id="<?php echo $this->get_field_id('title_chars'); ?>" name="<?php echo $this->get_field_name('title_chars'); ?>" type="text" value="<?php echo $title_chars; ?>" /></label>
			<span class="wpars_admin_widget_note"><?php _e('Auto trim title if title length > characters. Set 0 to do not trim.', 'wpars'); ?></span>
		</p></div>
		<div class="clear"></div>
		<div><p>
			<label for="<?php echo $this->get_field_id('rating_min_rate'); ?>"><span class="wpars_admin_widget_title"><?php _e('Min raters', 'wpars'); ?></span> 
			<input class="widefat" id="<?php echo $this->get_field_id('rating_min_rate'); ?>" name="<?php echo $this->get_field_name('rating_min_rate'); ?>" type="text" value="<?php echo $rating_min_rate; ?>" /></label>
			<span class="wpars_admin_widget_note"><?php _e('Minimum raters in query.', 'wpars'); ?></span>
		</p></div>
		<div class="clear"></div>
		<div><p>
			<label for="<?php echo $this->get_field_id('rating_img_size'); ?>"><span class="wpars_admin_widget_title"><?php _e('Rating image size', 'wpars'); ?></span> 
			<input class="widefat" id="<?php echo $this->get_field_id('rating_img_size'); ?>" name="<?php echo $this->get_field_name('rating_img_size'); ?>" type="text" value="<?php echo $rating_img_size; ?>" /></label>
			<span class="wpars_admin_widget_note"><?php _e('Rating image size will show. Change value for perfect with your themes.', 'wpars'); ?></span>
		</p></div>
		<div class="clear"></div>
		<div><p>
			<input class="checkbox" id="<?php echo $this->get_field_id('show_num_list'); ?>" name="<?php echo $this->get_field_name('show_num_list'); ?>" type="checkbox" value="yes" <?php if ($show_num_list == "yes" ) { echo 'checked = "checked"' ;} ?> /> 
			<label for="<?php echo $this->get_field_id('show_num_list'); ?>"><span class="wpars_admin_widget_title"><?php _e('Show Number order list', 'wpars'); ?> </span></label>
			<br><span class="wpars_admin_widget_note"><?php _e('If checked, number will show 1-> numbers before title post.', 'wpars'); ?></span>
		</p></div>
		<div class="clear"></div>
		
       <div><p>
            <input class="checkbox" id="<?php echo $this->get_field_id('thumb_show'); ?>" name="<?php echo $this->get_field_name('thumb_show'); ?>" type="checkbox" value="yes" <?php if ($thumb_show == "yes" ) { echo 'checked = "checked"' ;} ?> /> 
			<label for="<?php echo $this->get_field_id('thumb_show'); ?>"><span class="wpars_admin_widget_title"><?php _e('Show thumbnail', 'wpars'); ?> </span></label>
			<br><span class="wpars_admin_widget_note"><?php _e('If checked, number will show thumbnail post.', 'wpars'); ?></span>
        
       </p></div>
        <div class="clear"></div>
        <div><p>
            <label>
               <?php _e('Thumbnail dimensions', 'wpars'); ?><br />
                <label for="<?php echo $this->get_field_id("thumb_w"); ?>">
                    <?php _e('Width:', 'wpars'); ?> <input class="widefat" style="width:20%;" type="text" id="<?php echo $this->get_field_id("thumb_w"); ?>" name="<?php echo $this->get_field_name("thumb_w"); ?>" value="<?php echo $thumb_w; ?>" />
                </label>
                <label for="<?php echo $this->get_field_id("thumb_h"); ?>">
                    <?php _e('Height:', 'wpars'); ?> <input class="widefat" style="width:20%;" type="text" id="<?php echo $this->get_field_id("thumb_h"); ?>" name="<?php echo $this->get_field_name("thumb_h"); ?>" value="<?php echo $thumb_h; ?>" />
                </label>
            </label>
        </p></div>
      
		<div><p>
			<label for="<?php echo $this->get_field_id('post_type'); ?>"><span class="wpars_admin_widget_title"><?php _e('Choose post type', 'wpars'); ?></span>
			<select name="<?php echo $this->get_field_name('post_type'); ?>" id="<?php echo $this->get_field_id('post_type'); ?>" class="widefat">	
			<?php 
			 global $wp_post_types;
			$list_post_types = get_post_types(array('public'  => true),'objects'); 
			?>
			<ul>
			<?php
			foreach ($list_post_types  as $a_post_type ) {
				if($a_post_type->name != 'attachment') {
				?>
				<option value="<?php echo $a_post_type->name; ?>"<?php selected($a_post_type->name, $post_type); ?>><?php _e($a_post_type->label, 'wpars'); ?></option>
				<?php
				}
			} ?>
			</select>
			</label>
			
		</p></div>
		<div class="clear"></div>
		<div><label for="<?php echo $this->get_field_id('terms_id'); ?>"><span class="wpars_admin_widget_title"><?php _e('Choose taxonomy', 'wpars'); ?></span></label></div>
		<span class="wpars_admin_widget_note"><?php _e('If has not any checked, all taxonomies will query.', 'wpars'); ?></span>
		<?php 
		foreach ( get_object_taxonomies( 'post' ) as $tax_name ) {
		}
		$list_taxonomies = get_taxonomies( array('public'   => true), 'objects' ); 
		//var_dump($list_taxonomies); //for debug
		?>
		<?php
		
		$list_taxonomies = get_taxonomies( array('public'   => true), 'objects' ); 
			if ($list_taxonomies) {
				foreach ($list_taxonomies  as $a_taxonomy ) {
					if($a_taxonomy->name != 'post_format' && $a_taxonomy->name != 'post_tag1') {
						$list_terms = get_terms($a_taxonomy->name);
						if ( count($list_terms) > 0 ){ ?>
							<div><p>
								<div id="taxonomy-<?php echo $a_taxonomy->name; ?>" class="categorydiv">
									<ul id="<?php echo $a_taxonomy->name; ?>-tabs" class="category-tabs">
										<li class="tabs"><?php echo $a_taxonomy->label; ?></li>
									</ul>
									<div id="<?php echo $a_taxonomy->name; ?>-all" class="tabs-panel">
										<ul id="<?php echo $a_taxonomy->name; ?>checklist" data-wp-lists="list:<?php echo $a_taxonomy->name; ?>" class="categorychecklist form-no-clear">
											<?php if($a_taxonomy->hierarchical == true) {
												$list_terms_of_tax = get_terms($a_taxonomy->name, array("orderby" => "count", "order"  => "DESC", "parent" => 0,'hide_empty' => 0,)); 
												foreach($list_terms_of_tax as $key_a_terms_of_tax => $a_terms_of_tax) { ?>
													<li id="taxonomy-<?php echo $a_terms_of_tax->term_id; ?>" class="popular-category">
														<label class="selectit"><input type="checkbox" value="<?php echo $a_terms_of_tax->term_id; ?>" id="<?php echo $this->get_field_id('terms_id').'[]'; ?>" name="<?php echo $this->get_field_name('terms_id').'[]'; ?>" <?php if (count($terms_id) > 0 && in_array($a_terms_of_tax->term_id, $terms_id)) { echo 'checked = "checked"' ;} ?>> <?php echo $a_terms_of_tax->name . ' (<strong>'.$a_terms_of_tax->count.'</strong>)'; ?></label>
														<!-- check children 1-->
														<?php 
														$list_terms_child_1 = get_terms($a_taxonomy->name, array("orderby" => "count", "order"  => "DESC", 'hide_empty'  => 0, "parent" => $a_terms_of_tax->term_id));
														if($list_terms_child_1) { ?>
																<ul class="children">
																<?php 
																foreach($list_terms_child_1 as $key_a_terms_child_1 => $a_terms_child_1) { ?>
																	<li id="taxonomy-<?php echo $a_terms_child_1->term_id; ?>" class="popular-category">
																		<label class="selectit"><input type="checkbox" value="<?php echo $a_terms_child_1->term_id; ?>" id="<?php echo $this->get_field_id('terms_id').'[]'; ?>" name="<?php echo $this->get_field_name('terms_id').'[]'; ?>" <?php if (count($terms_id) > 0 && in_array($a_terms_child_1->term_id, $terms_id)) { echo 'checked = "checked"' ;} ?>> <?php echo $a_terms_child_1->name . ' (<strong>'.$a_terms_child_1->count.'</strong>)'; ?></label>
																		<!-- check children 2-->
																		<?php 
																		$list_terms_child_2 = get_terms($a_taxonomy->name, array("orderby" => "count", "order"  => "DESC", 'hide_empty'  => 0, "parent" => $a_terms_child_1->term_id));
																		if($list_terms_child_2) { ?>
																				<ul class="children">
																				<?php 
																				foreach($list_terms_child_2 as $key_a_terms_child_2 => $a_terms_child_2) { ?>
																					<li id="taxonomy-<?php echo $a_terms_child_2->term_id; ?>" class="popular-category">
																						<label class="selectit"><input type="checkbox" value="<?php echo $a_terms_child_2->term_id; ?>" id="<?php echo $this->get_field_id('terms_id').'[]'; ?>" name="<?php echo $this->get_field_name('terms_id').'[]'; ?>" <?php if (count($terms_id) > 0 && in_array($a_terms_child_2->term_id, $terms_id)) { echo 'checked = "checked"' ;} ?>> <?php echo $a_terms_child_2->name . ' (<strong>'.$a_terms_child_2->count.'</strong>)'; ?></label>
																						<!-- check children 3-->
																						<?php 
																						$list_terms_child_3 = get_terms($a_taxonomy->name, array("orderby" => "count", "order"  => "DESC", 'hide_empty'  => 0, "parent" => $a_terms_child_2->term_id));
																						if($list_terms_child_3) { ?>
																								<ul class="children">
																								<?php 
																								foreach($list_terms_child_3 as $key_a_terms_child_3 => $a_terms_child_3) { ?>
																									<li id="taxonomy-<?php echo $a_terms_child_3->term_id; ?>" class="popular-category">
																										<label class="selectit"><input type="checkbox" value="<?php echo $a_terms_child_3->term_id; ?>" id="<?php echo $this->get_field_id('terms_id').'[]'; ?>" name="<?php echo $this->get_field_name('terms_id').'[]'; ?>" <?php if (count($terms_id) > 0 && in_array($a_terms_child_3->term_id, $terms_id)) { echo 'checked = "checked"' ;} ?>> <?php echo $a_terms_child_3->name . ' (<strong>'.$a_terms_child_3->count.'</strong>)'; ?></label>
																										<!-- check children 4-->
																										<?php 
																										$list_terms_child_4 = get_terms($a_taxonomy->name, array("orderby" => "count", "order"  => "DESC", 'hide_empty'  => 0, "parent" => $a_terms_child_3->term_id));
																										if($list_terms_child_4) { ?>
																												<ul class="children">
																												<?php 
																												foreach($list_terms_child_4 as $key_a_terms_child_4 => $a_terms_child_4) { ?>
																													<li id="taxonomy-<?php echo $a_terms_child_4->term_id; ?>" class="popular-category">
																														<label class="selectit"><input type="checkbox" value="<?php echo $a_terms_child_4->term_id; ?>" id="<?php echo $this->get_field_id('terms_id').'[]'; ?>" name="<?php echo $this->get_field_name('terms_id').'[]'; ?>" <?php if (count($terms_id) > 0 && in_array($a_terms_child_4->term_id, $terms_id)) { echo 'checked = "checked"' ;} ?>> <?php echo $a_terms_child_4->name . ' (<strong>'.$a_terms_child_4->count.'</strong>)'; ?></label>
																														<!-- check children 5-->
																														<?php 
																														$list_terms_child_5 = get_terms($a_taxonomy->name, array("orderby" => "count", "order"  => "DESC", 'hide_empty'  => 0, "parent" => $a_terms_child_4->term_id));
																														if($list_terms_child_5) { ?>
																																<ul class="children">
																																<?php 
																																foreach($list_terms_child_5 as $key_a_terms_child_5 => $a_terms_child_5) { ?>
																																	<li id="taxonomy-<?php echo $a_terms_child_5->term_id; ?>" class="popular-category">
																																		<label class="selectit"><input type="checkbox" value="<?php echo $a_terms_child_5->term_id; ?>" id="<?php echo $this->get_field_id('terms_id').'[]'; ?>" name="<?php echo $this->get_field_name('terms_id').'[]'; ?>" <?php if (count($terms_id) > 0 && in_array($a_terms_child_5->term_id, $terms_id)) { echo 'checked = "checked"' ;} ?>> <?php echo $a_terms_child_5->name . ' (<strong>'.$a_terms_child_5->count.'</strong>)'; ?></label>
																																	
																																	</li>
																																<?php 
																																}
																																?>
																																</ul>
																														<?php 
																														}
																														?>
																														<!-- check children 5-->
																													</li>
																												<?php 
																												}
																												?>
																												</ul>
																										<?php 
																										}
																										?>
																										<!-- check children 4-->
																									</li>
																								<?php 
																								}
																								?>
																								</ul>
																						<?php 
																						}
																						?>
																						<!-- check children 3-->
																					</li>
																				<?php 
																				}
																				?>
																				</ul>
																		<?php 
																		}
																		?>
																		<!-- check children 2-->
																	</li>
																<?php 
																}
																?>
																</ul>
														<?php 
														}
														?>
														<!-- check children 1-->
													</li>
												<?php 
												}
											} else {
												$list_terms_of_tax = get_terms($a_taxonomy->name, array("orderby" => "count", "order"  => "DESC", "parent" => 0,'hide_empty' => 0,)); 
												$max_show = 300;// Fix for over many tags
												$show = 0;
												foreach($list_terms_of_tax as $key_a_terms_of_tax => $a_terms_of_tax) { 
												$show++;
												if($show > $max_show) {break;}
												?>
													<li id="taxonomy-<?php echo $a_terms_of_tax->term_id; ?>" class="popular-category">
														<label class="selectit"><input type="checkbox" value="<?php echo $a_terms_of_tax->term_id; ?>" id="<?php echo $this->get_field_id('terms_id').'[]'; ?>" name="<?php echo $this->get_field_name('terms_id').'[]'; ?>" <?php if (count($terms_id) > 0 && in_array($a_terms_of_tax->term_id, $terms_id)) { echo 'checked = "checked"' ;} ?>> <?php echo $a_terms_of_tax->name . ' (<strong>'.$a_terms_of_tax->count.'</strong>)'; ?></label>
													</li>
											<?php 
												}
											}
											?>
										</ul>
									</div>
								</div>
							</p></div>
							<div class='clear'></div>
						<?php 
						}
					} 
				}
			}
	} //END form
} //End class widget


?>