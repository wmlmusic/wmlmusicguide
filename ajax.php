<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	*/
	/* AJAX check  */
	
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

  		include('includes/inc-public.php');
  		include('includes/classes/class.user.php');
  		$user  = new User();

		$su_email = isset($_POST['su_email']) ? $_POST['su_email'] : null;
		$com_email = isset($_POST['com_email']) ? $_POST['com_email'] : null;
		$frget_id = isset($_POST['forget_id']) ? $_POST['forget_id'] : null;
  		$answer = isset($_POST['su_answer']) ? $_POST['su_answer'] : null;

  		//email check for normal
  		if(!is_null($su_email)){
  			$is_valid = $user->get_email($su_email);
  			if($is_valid){
  				echo 'true';
			}
  			else{
  				echo 'false';
			}
  		};

		//email check for company
		if(!is_null($com_email)){
			$is_valid = $user->get_company_email($com_email);       
			if($is_valid){
				echo 'false';
			}
			else{
				echo 'true';
			}
		};
	  
		//forget
		if(isset($frget_id) && isset($answer)){
			$is_valid = $user->get_dataById($frget_id);
			if($is_valid){
				if($is_valid['vsecans'] == trim($answer)){
					echo 'true';
				}
				else{
					echo 'false';
				}
			}
		}
        else{
			echo "false";
        };
    }
	else{		
		die('No Ajax Call.');
		}
	}	
?>