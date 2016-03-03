<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	*/
	/* AJAX check  */
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

		$com_email_check = isset($_GET['company_email']) ? $_GET['company_email'] : null;
		$art_email_check = isset($_GET['artist_email']) ? $_GET['artist_email'] : null;

		//email check for company
  		if(!is_null($com_email_check)){
  			include("includes/classes/class.company.php");
  			$company  = new Company();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if($id > 0){
          $data = $company->get_row($id);
          $oemail = $data['email'];
          if($oemail == $com_email_check){
            echo "true";
          }
          else{
            $is_valid = $company->getCompanyByEmail($com_email_check);

            if($is_valid)
              echo "true";
            else
              echo "false";
          }

        }
        else{
    			$is_valid = $company->getCompanyByEmail($com_email_check);

    			if($is_valid)
    				echo "true";
    			else
    				echo "false";
        }
  		}
  		
  		//email check for artist
  		if(!is_null($art_email_check)){
  			include("includes/classes/class.artist.php");
  			$artist  = new Artist();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
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