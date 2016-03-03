<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include("includes/functions.php");
	include("includes/classes/class.music_properties.php");
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$arrData 	= array();		
		$properties = new Music_Properties();

		if(empty($_POST['id'])){

			$arrData['mp_name'] = addslashes(ucwords($_POST['txtfield']));
			$arrData['mp_type']	= addslashes($_POST['mp_type']);
			$arrData['parent_id']	= isset($_POST['selCat']) ? $_POST['selCat'] : 0;
			$insert = $properties->add($arrData);

			if($insert){
				if(isset($_FILES)){
					$createImg = saveResizeImage($_FILES['category_image'], $insert, $_POST['mp_type']);
				}
				$_SESSION['insert_' . $_POST['mp_type']] = 'insert';
			}
			else{
				$_SESSION['insert_' . $_POST['mp_type']] = 'insert_faild';
			}			
		}
		else{
			$arrData['mp_id']	= addslashes($_POST['id']);
			$arrData['mp_name'] = addslashes(ucwords($_POST['txtfield']));
			$arrData['parent_id']	= isset($_POST['selCat']) ? $_POST['selCat'] : 0;
			$update = $properties->edit($arrData);

			if($update || isset($_FILES)){
				if(isset($_FILES)){
					$createImg = saveResizeImage($_FILES['category_image'], $arrData['mp_id'], $_POST['mp_type']);				
				}
				$_SESSION['insert_' . $_POST['mp_type']] = 'update';
			}
			else{
				$_SESSION['insert_' . $_POST['mp_type']] = 'update_faild';
			}
		}
		$header = $_POST['mp_type'] . ".php";
		header('Location:' . $header);
	}