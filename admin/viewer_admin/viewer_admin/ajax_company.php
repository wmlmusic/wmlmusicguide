<?php
  		include('includes/inc-public.php');
  		include('includes/classes/class.user.php');
  		$user  = new User();
		$email = $_GET['company_email'];
		$valid = false;
		
  		//email check for normal
  		if(!is_null($email)){
  			$is_valid = $user->get_email($email);
  			if($is_valid){
  				//echo json_encode($valid);
			}
  			else{
  				echo json_encode($valid);
			}
  		};
?>