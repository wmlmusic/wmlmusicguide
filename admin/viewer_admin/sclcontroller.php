<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include("../master_admin/includes/functions.php");
	include("../master_admin/includes/classes/class.socialmedia.php");
	
	$type 	= isset($_POST['type']) ? strtolower($_POST['type']) : 'company';
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$social = new Social_Media();
		$id 	= $_POST['id'];

		//delete all the existing links before adding into table
		$deletes = $social->delete($type, $id);
		// echo "<pre>"; print_r($deletes);

		$socials = array_filter($_POST['social_media']);
		if(count($socials)>0){
			foreach ($socials as $key => $value) {
				$social_id 	 	= $key;
				$social_value 	= $value;
				$social->add(array('social_id' => $key, 'social_link' => $value, 'field' => $type, 'type_id' => $id ));
			}
		}
	}
/*
		echo "<pre>";
		print_r($_POST);
		print_r($_FILES); exit;*/

	header('Location: social_form.php?type=' . $type . '&id=' . $id . '&act=updated');
