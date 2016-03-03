<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	session_start();

	include("../master_admin/includes/functions.php");
	include("../master_admin/includes/classes/class.post.php");
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$user_id = $_SESSION['user_id'];
		/*
		echo "<pre>";
		print_r($_SESSION);
		print_r($_POST);
		print_r($_FILES); 
		exit;
		*/

		$post = new post();

		$arrData 	= array();
		
		$arrData['name'] = addslashes(ucwords($_POST['name']));
		$arrData['details'] = addslashes($_POST['details']);
		$arrData['url'] = addslashes($_POST['url']);		
		$arrData['status'] = addslashes($_POST['status']);
		$arrData['type'] = $_FILES['image']['type'];
		$arrData['category'] = addslashes($_POST['category']);
		$arrData['path'] = $_FILES['image']['tmp_name'];
		$arrData['picture'] = file_get_contents($arrData['path']);		
		
		if(empty($_POST['id'])){
			$arrData['user_id'] = $user_id;
			$arrData['added_date'] = date('Y-m-d H:i:s');
								
			$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma", "swf");
			$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

			if ((($_FILES['image']["type"] == "video/mp4")
			|| ($_FILES['image']["type"] == "audio/mp3")
			|| ($_FILES['image']["type"] == "audio/wma")
			|| ($_FILES['image']["type"] == "image/pjpeg")
			|| ($_FILES['image']["type"] == "image/gif")
			|| ($_FILES['image']["type"] == "image/swf")
			|| ($_FILES['image']["type"] == "image/jpeg"))

			&& ($_FILES['image']["size"] < 20000)
			&& in_array($extension, $allowedExts))

			{
				if ($_FILES['image']["error"] > 0)
				{
					echo "Return Code: " . $_FILES['image']["error"] . "<br />";
				}
				else
				{
					echo "Upload: " . $_FILES['image']["name"] . "<br />";
					echo "Type: " . $_FILES['image']["type"] . "<br />";
					echo "Size: " . ($_FILES['image']["size"] / 1024) . " Kb<br />";
					echo "Temp file: " . $_FILES['image']["tmp_name"] . "<br />";

					if (file_exists("upload/" . $_FILES['image']["name"]))
				{
					echo $_FILES['image']["name"] . " already exists. ";
				}
				else
				{
					move_uploaded_file($_FILES['image']["tmp_name"],
					"upload/" . $_FILES['image']["name"]);
					echo "Stored in: " . "upload/" . $_FILES['image']["name"];
				}
			}
		}
	else
	{
		echo "Invalid file";
	}
		
				
		 /*	
			$insert = $post->add($arrData);
			
		
			if($insert){
				print_r($arrData);
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
				print_r($arrData);
				saveResizeImage($_FILES['image'], $arrData['id'], 'post');
			}			
			$update = $post->edit($arrData);
			$_SESSION['insert_post'] = 'updated';
		}
		*/

	}
	header('Location: post.php?act=' . $_SESSION['insert_post']);
?>