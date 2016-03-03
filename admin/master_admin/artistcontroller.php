<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include("includes/functions.php");
	include("includes/classes/class.artist.php");
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$artist_cat = isset($_POST['artist_cat']) ? $_POST['artist_cat'] : array();
		$artist_genre = isset($_POST['artist_genre']) ? $_POST['artist_genre'] : array();
		$artist_field = $_POST['artist_field'] ? $_POST['artist_field'] : array();

		$artist_prop = array_merge($artist_cat, $artist_genre, $artist_field);
		/*echo "<pre>";
		print_r($artist_prop);
		print_r($_POST);
		print_r($_FILES); exit;*/

		$artist = new Artist();

		$arrData 	= array();
		

		$arrData['com_id'] = addslashes($_POST['artist_company']);
		$arrData['aname'] = addslashes(ucwords($_POST['artist_name']));
		$arrData['atype'] = addslashes(ucwords($_POST['artist_type']));
		$arrData['address'] = addslashes(ucwords($_POST['artist_address']));
		$arrData['city'] = addslashes(ucwords($_POST['artist_city']));
		$arrData['state'] = addslashes(ucwords($_POST['artist_state']));
		$arrData['zipcode'] = addslashes(ucwords($_POST['artist_zip']));
		$arrData['phone'] = @addslashes($_POST['artist_phone']);
		$arrData['email'] = addslashes($_POST['artist_email']);
		$arrData['country'] = addslashes(ucwords($_POST['artist_country']));
		$arrData['website'] = addslashes(ucwords($_POST['artist_url']));
		$arrData['manager'] = addslashes(ucwords($_POST['artist_manager']));
		$arrData['administration'] = addslashes(ucwords($_POST['artist_administration']));
		$arrData['licensing'] = addslashes(ucwords($_POST['artist_licensing']));
		$arrData['status'] = addslashes(ucwords($_POST['artist_status']));
		$arrData['enable_profile'] = addslashes($_POST['enable_profile']);
		$arrData['youtube_channel'] = addslashes($_POST['youtube_channel']);
		$arrData['soundcloud_username'] = addslashes($_POST['soundcloud_username']);
		$arrData['itunes_id'] = addslashes($_POST['itunes_id']);
		$arrData['created_date'] = date('Y-m-d H:i:s');

		if(empty($_POST['id'])){
			$insert = $artist->add($arrData);
			if($insert){
				//insert properties like category, genre, field
				$artist->add_prop($artist_prop, $insert, 'artist');

				$cover = '';
				$picture = '';

				if($_FILES['artist_cover']['name'] != ''){
					$cover = 'artistcover_' . $insert . '.jpg'; 
					saveResizeImage($_FILES['artist_cover'], $insert, 'artistcover');
				}
				if($_FILES['artist_picture']['name'] != ''){
					$picture = 'artistpic_' . $insert . '.jpg'; 
					saveResizeImage($_FILES['artist_picture'], $insert, 'artistpic');
				}
				if($_FILES['artist_picture1']['name'] != ''){
					$picture = 'artistpic1_' . $insert . '.jpg'; 
					saveResizeImage($_FILES['artist_picture1'], $insert, 'artistpic1');
				}
				if($_FILES['artist_picture2']['name'] != ''){
					$picture = 'artistpic2_' . $insert . '.jpg'; 
					saveResizeImage($_FILES['artist_picture2'], $insert, 'artistpic2');
				}
				$arrData = array();
				$arrData['coverimg']	= $cover;
				$arrData['picture'] = $picture;
				$arrData['id'] = $insert;
				$update = $artist->edit($arrData);
				$_SESSION['insert_artist'] = 'insert';
			}
			else{
				$_SESSION['insert_artist'] = 'insert_faild';
			}
		}
		else{
			$arrData['id'] = $_POST['id'];
			$arrData['coverimg'] = 'artistcover_' . $_POST['id'] . '.jpg';
			$arrData['picture'] = 'artistpic_' . $_POST['id'] . '.jpg';
			if($_FILES['artist_cover']['name'] != ''){
				$logo = 'artistcover_' . $arrData['id'] . '.jpg'; 
				saveResizeImage($_FILES['artist_cover'], $arrData['id'], 'artistcover');
			}
			if($_FILES['artist_picture']['name'] != ''){
				$picture = 'artistpic_' . $arrData['id'] . '.jpg'; 
				saveResizeImage($_FILES['artist_picture'], $arrData['id'], 'artistpic');
			}
			if($_FILES['artist_picture1']['name'] != ''){
				$picture = 'artistpic1_' . $arrData['id'] . '.jpg'; 
				saveResizeImage($_FILES['artist_picture1'], $arrData['id'], 'artistpic1');
			}
			if($_FILES['artist_picture2']['name'] != ''){
				$picture = 'artistpic2_' . $arrData['id'] . '.jpg'; 
				saveResizeImage($_FILES['artist_picture2'], $arrData['id'], 'artistpic2');
			}
			$artist->del_prop($arrData['id'], 'artist');
			$artist->add_prop($artist_prop, $arrData['id'], 'artist');
			$update = $artist->edit($arrData);
		}

	}

	header('Location: artist.php');