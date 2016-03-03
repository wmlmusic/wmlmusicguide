<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	ini_set('error_reporting', E_ALL);
	include("includes/functions.php");
	include("includes/classes/class.banner.php");
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		/*echo "<pre>";
		print_r($_POST);
		print_r($_FILES); exit;*/

		$banner = new Banner();

		$arrData 	= array();
		

		$arrData['name'] = addslashes(ucwords($_POST['name']));
		$arrData['details'] = addslashes($_POST['details']);
		$arrData['status'] = addslashes($_POST['status']);
                $arrData['banner_link'] = $_POST['banner_link'];

		if(empty($_POST['id'])){
			$arrData['added_date'] = date('Y-m-d H:i:s');
			$insert = $banner->add($arrData);
			if($insert){
				$cover = '';

				if($_FILES['image']['name'] != ''){
					$cover = 'banner_' . $insert . '.jpg'; 
					saveBannerImage($_FILES['image'], $insert, 'banner');
				}
				$_SESSION['insert_banner'] = 'added';
			}
			else{
				$_SESSION['insert_banner'] = 'insert_faild';
			}
		}
		else{
			$arrData['id'] = $_POST['id'];
			// $arrData['banner'] = 'banner_' . $_POST['id'] . '.jpg';
			if($_FILES['image']['name'] != ''){
				$cover = 'banner_' . $arrData['id'] . '.jpg'; 
				saveBannerImage($_FILES['image'], $arrData['id'], 'banner');
			}			
			$update = $banner->edit($arrData);
			$_SESSION['insert_banner'] = 'updated';
		}

	}

	header('Location: banner.php?act=' . $_SESSION['insert_banner']);