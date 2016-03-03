<?php
	/* NOTE: This file will print all passed variables (sent using pass_var) and all uploaded file
	information to a file called output.txt (you can change this below) in order to debug the utility.
	If nothing is printed to output.txt it is either a permission problem (make the folder this file
	is in writeable) or your path to the upload.php file (the 3rd paramater of the $uploader->create()
	function) is wrong. Make sure you use a full web path if you are having problems (such as
	http://www.inaflashuploader.com/uploader/upload.php)*/

	session_start();
	if(@$_REQUEST['cmd'] == 'del')
	{
		@unlink($_REQUEST['file']);
	}	

	
	@extract($_GET);

	$album 				= "carausal";
	 
			
	if($_SERVER['HTTP_HOST'] == 'localhost')
	$pic_root = "D:\\wamp\\www\\farben\\images\\";
	else 
	$pic_root = $_SERVER['DOCUMENT_ROOT']."/farben/images/";
	
	$filename	= getFileName($album, $_FILES['Filedata']['name']);
	$temp_name	= $_FILES['Filedata']['tmp_name'];
	$error		= $_FILES['Filedata']['error'];
	$size		= $_FILES['Filedata']['size'];
	
	$ext = getFileExtension($filename);
	
	
	if(!is_dir($pic_root.$album))
	{
		mkdir($pic_root.$album,0777);
		chmod($pic_root.$album,0777);
	}
		
	if(!$error) 
	{
		if($ext == "jpeg" || $ext == "GIF" || $ext == "gif" || $ext == "JPG" || $ext == "jpg" || $ext == "png" || $ext == "PNG" || $ext == "JPEG")
		{
			$base_info=getimagesize($temp_name);
			switch($base_info[2]) {
				case IMAGETYPE_PNG:
					$img=imagecreatefrompng($temp_name);
					break;
				case IMAGETYPE_JPEG:
					$img=imagecreatefromjpeg($temp_name);
					break;
				case IMAGETYPE_GIF:
					$img=imagecreatefromgif($temp_name);
					break;
				default:
					$img;
					break;
				} 
		$file_name = $pic_root.$album."/".$filename;
		if(imagepng($img,$file_name))
			echo "Success";
		else
			echo "Failed";
		}
	else
		{
			$file_name = $pic_root.$album."/".$filename;
			move_uploaded_file($temp_name,$file_name);
			
		}
		chmod($file_name,0777);
	}

	
	
	function getFileName($album, $filename)
	{
		global $pic_root;
		$ext 		= getFileExtension($filename);
		$file_name  = str_replace(".".$ext, "", $filename);
		$upload_file_name = $file_name;
		$i = 0;
		while(file_exists($pic_root.$album."/".$upload_file_name.".".$ext))
		{
			$upload_file_name = $file_name."-".++$i;
		}
		
		return $upload_file_name.".".$ext; 
	}
	
	
	
	
	function getFileExtension($file_name) {
		  return substr(strrchr($file_name,'.'),1);
	}
	
	
	function getHash() {
		$items=array(
			'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
			'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
			0,1,2,3,4,5,6,7,8,9
		);
		$items=array_flip($items);
		
		$hash='';
		for ($i=0;$i<10;$i++) $hash.=array_rand($items);
		return $hash;
	}
	
?>