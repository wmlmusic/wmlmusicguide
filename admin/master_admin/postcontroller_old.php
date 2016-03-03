<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	session_start();

	include("includes/functions.php");
	include("includes/classes/class.post.php");
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$user_id = $_SESSION['user_id'];
		/*echo "<pre>";
		print_r($_SESSION);
		print_r($_POST);
		print_r($_FILES); exit;*/

		$post = new post();

		$arrData 	= array();
		

		$arrData['name'] = addslashes(ucwords($_POST['name']));
		$arrData['details'] = addslashes($_POST['details']);
		$arrData['status'] = addslashes($_POST['status']);
		$arrData['category'] = addslashes($_POST['category']);

		if(empty($_POST['id'])){
			$arrData['user_id'] = $user_id;
			$arrData['added_date'] = date('Y-m-d H:i:s');
			$insert = $post->add($arrData);
			if($insert){
				$cover = '';

				if($_FILES['image']['name'] != ''){
					$cover = 'post_' . $insert . '.jpg'; 
					saveResizeImage($_FILES['image'], $insert, 'post');
				}
				$_SESSION['insert_post'] = 'added';
			}
			else{
				$_SESSION['insert_post'] = 'insert_faild';
			}
		}
		else{
			$arrData['id'] = $_POST['id'];
			// $arrData['post'] = 'post_' . $_POST['id'] . '.jpg';
			if($_FILES['image']['name'] != ''){
				$cover = 'post_' . $arrData['id'] . '.jpg'; 
				saveResizeImage($_FILES['image'], $arrData['id'], 'post');
			}			
			$update = $post->edit($arrData);
			$_SESSION['insert_post'] = 'updated';
		}

	}

	header('Location: post.php?act=' . $_SESSION['insert_post']);