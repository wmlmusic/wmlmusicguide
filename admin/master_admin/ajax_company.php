<?php
	/**
	 * Developed by Julie K. Frey
	 * http://www.speedyhunter.com/
	*/
	/* AJAX company email check  */

  	include('includes/inc-public.php');
  	include('includes/classes/class.user.php');
  	$user  = new User();
	$com_email = $_GET['company_email'];
	$valid = false;
		
  	//email check for normal
  	if(!is_null($email)){
  		$is_valid = $user->get_company_email($com_email);
  		if($is_valid){
  			//echo json_encode($valid);
		}
  		else{
			echo json_encode($valid);
		}
  	};
?>