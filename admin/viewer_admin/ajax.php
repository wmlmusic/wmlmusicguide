<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	*/
	/* AJAX check  */
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    $com_email_check = isset($_GET['company_email']) ? $_GET['company_email'] : null;
		$com_id = isset($_GET['com_id']) ? $_GET['com_id'] : null;
		$art_email_check = isset($_GET['artist_email']) ? $_GET['artist_email'] : null;

		//email check for company
  		if(!is_null($com_email_check) && $com_id > 0){
  			include("../master_admin/includes/classes/class.company.php");
  			$company  = new Company();

        $is_valid = $company->get_row($com_id);

        if(count($is_valid>0)){
          // print_r($is_valid);
          if($is_valid['email'] == $com_email_check)
            echo 'true';
          else{
  				  echo "false";
          }
        }
  			else{
  				echo "false";
        }
  		}
  		
  		//email check for artist
  		if(!is_null($art_email_check)){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
  			include("../master_admin/includes/classes/class.artist.php");
  			$artist  = new Artist();

        if($id > 0){
          $data = $artist->get_row($id);
          $oemail = $data['email'];
          if($oemail == $art_email_check){
            echo "true";
          }
          else{
            $is_valid = $artist->getArtistByEmail($art_email_check);

            if($is_valid)
              echo "false";
            else
              echo "true";
          }
        }
        else{
        	$is_valid = $artist->getArtistByEmail($art_email_check);

        	if($is_valid)
        		echo "false";
        	else
        		echo "true";
        }
  		}

	}
	else{		
		die('No Ajax Call.');
	}