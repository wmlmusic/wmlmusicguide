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

		$post = new post();

		$arrData 	= array();
		
		$arrData['name'] = addslashes(ucwords($_POST['name']));
		$arrData['details'] = addslashes($_POST['details']);
		$arrData['status'] = addslashes($_POST['status']);
		$arrData['post_link'] = $_POST['postlink'];
		$arrData['type'] = $_FILES['image']['type'];
		$arrData['category'] = addslashes($_POST['category']);
		$arrData['filename'] = $_FILES['image']['name'];
		$arrData['picture'] = file_get_contents($_FILES['image']['tmp_name']);		
		$arrData['user_id'] = $user_id;
		$arrData['added_date'] = date('Y-m-d H:i:s');

		if(empty($_POST['id'])){
			$arrData['user_id'] = $user_id;
			$arrData['added_date'] = date('Y-m-d H:i:s');
			
			$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma", "mpeg", "mpg", "mov", "MOV", "swf");
			$extension = pathinfo($arrData['name'], PATHINFO_EXTENSION);
			if(empty($_POST['id'])){
				if (
					(($arrData['type'] == "video/mp4")
					|| ($arrData['type'] == "video/mpg")
					|| ($arrData['type'] == "video/mpeg")
					|| ($arrData['type'] == "video/quicktime")
					|| ($arrData['type'] == "image/x-shockwave-flash")
					|| ($arrData['type'] == "audio/mp3")
					|| ($arrData['type'] == "audio/wma")
					|| ($arrData['type'] == "image/pjpeg")
					|| ($arrData['type'] == "image/gif")
					|| ($arrData['type'] == "image/jpeg"))
				)
				{
				if ($_FILES['image']['error'] > 0)
				{
					echo "Return Code: " . $_FILES['image']['error'] . "<br />";
				}
				else
				{
					$insert = $post->add($arrData);
					if($insert)
					{                     
						if (file_exists("../../uploads/" . $arrData['name']))
						{
							$_SESSION['insert_post'] = 'insert_failed';
						}
						else
						{          
							move_uploaded_file($_FILES['image']['tmp_name'],
							"../../uploads/" . $_FILES['image']['name']);
							$_SESSION['insert_post'] = 'added';
						}
					}
				}
			}
			else
			{
				echo "Invalid file";
			}
		}
		else
		{
			$update = $post->edit($arrData);
			$_SESSION['insert_post'] = 'updated';
		}
	}
}
header('Location: post.php?act=' . $_SESSION['insert_post']);
?>