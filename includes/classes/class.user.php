<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	*/
	include_once('class.database.php');
	include_once 'PasswordHash.php';

	class User extends Database {

		private $sql 	= null;	
		public $message = null;
		private $config = array(        
            'start_session' => true // change to false if you start PHP session manually
        );
	
		public function __construct() {
			parent::__construct();
			if(session_id() == ''){
				if ($this->config['start_session'] and !session_start())
	                throw new Exception("Unable to start a session");
           	}
		}
	
		public function get_email($email){
		
			$this->sql = "SELECT * FROM wmldir_users WHERE vemail ='{$email}'";
			
			$this->data = $this->fetch_row_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}		
		}

		public function get_email_artist($email){
		
			$this->sql = "SELECT * FROM tbl_music_artists WHERE email ='{$email}'";
			
			$this->data = $this->fetch_row_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}		
		}

		public function get_email_company($email){
		
			$this->sql = "SELECT * FROM tbl_music_companies WHERE email ='{$email}'";
			
			$this->data = $this->fetch_row_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}		
		}

		public function get_company_email($email){
		
			$this->sql = "SELECT * FROM login WHERE email ='{$email}'";
			
			$this->data = $this->fetch_row_assoc($this->sql);
			// print_r($this->data);exit;
			if(!empty($this->data)){
				return $this->data; 
			}
			else{
				$sql = "(SELECT email FROM tbl_music_artists WHERE email='{$email}')
						UNION
						(SELECT email FROM tbl_music_companies WHERE email='{$email}')
						";
				$data = $this->fetch_row_assoc($sql);
				if(!empty($data)){
					return false;
				}
				return true;
			}		
		}

		public function get_dataById($id){
		
			$this->sql = "SELECT * FROM wmldir_users WHERE iuserid ='{$id}'";
			
			$this->data = $this->fetch_row_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}		
		}

		public function register($inputs)
		{
			if(is_array($inputs)){
				$pwdHasher = new PasswordHash(8, FALSE);
				// $hash is what you would store in your database
				$hash = $pwdHasher->HashPassword( $_POST['su_password'] );
				$input_array = array(
					'vuname' 		=> trim($_POST['su_email']),
					'vemail' 		=> trim($_POST['su_email']),
					'vpassword' 	=> $hash,
					'vname '		=> ucwords($_POST['su_name']),
					'vmobile' 		=> $_POST['su_phone'],
					'vstreet' 		=> $_POST['su_address'],
					'vcity '		=> $_POST['su_city'],
					'vcountry' 		=> $_POST['su_country'],
					'vurl 	'		=> $_POST['su_url'],
					'vgender' 		=> $_POST['su_gender'],
					'vsecques' 		=> $_POST['su_quest'],
					'vsecans'		=> $_POST['su_ans'],
					'voffer' 		=> isset($_POST['su_offer']) ? 1 : 0,
					'vofferpartner'	=> isset($_POST['su_offer_partner']) ? 1 : 0,
				);
				$this->sendRegisterEmail(trim($_POST['su_email']), ucwords($_POST['su_name']), $_POST['su_quest'], $_POST['su_ans']);
				return $this->insert($input_array,'wmldir_users');
			}
			else{
				return 'invalid input';
			}
		}
		
		public function contact($inputs)
		{
			if(is_array($inputs)){
				$this->sendContactEmail(
						trim($_POST['contact_email']),
						ucwords($_POST['contact_name']), 
						trim($_POST['contact_phone']),
						$_POST['contact_city'],
						$_POST['contact_state'],
						$_POST['contact_country'],
						trim($_POST['contact_subject']),	
						trim($_POST['contact_message'])		
				);
				return 'valid input';
			}
			else{
				return 'invalid input';
			}
		}		
		
		// Added 2/3/2016 - Send Contact Email To Admin
		public function sendContactEmail($email, $name, $phone, $city, $state, $ccountry, $subject, $message)
		{
			$contact_to 		= "info@wmlmusicguide.com";
			$contact_subject 	= $subject;
			$contact_from 		= $email;

			$contact_message = '<html><body>';					  
			$contact_message .= '<h1>Admin Contact Message</h1>';
			$contact_message .= '<table rules="all" width="100%" style="border-color: #666;" cellpadding="10">';
			$contact_message .= "<tr style='background: #eee;'><td>Contact Name: </td><td>{$name}</td></tr>";
			$contact_message .= "<tr style='background: #eee;'><td>Phone Number: </td><td>{$phone}</td></tr>";
			$contact_message .= "<tr style='background: #eee;'><td>Email Address: </td><td>{$contact_from}</td></tr>";
			$contact_message .= "<tr style='background: #eee;'><td>City: </td><td>{$city}</td></tr>";
			$contact_message .= "<tr style='background: #eee;'><td>State: </td><td>{$state}</td></tr>";			
			$contact_message .= "<tr style='background: #eee;'><td>Country: </td><td>{$ccountry}</td></tr>";	
			$contact_message .= "<tr style='background: #eee;'><td>Message: </td><td>{$message}</td></tr>";				
			$contact_message .= "</table>";
			$contact_message .= "</body></html>";
			
			$contact_headers = "From: " . $contact_from . "\r\n";
			$contact_headers .= "Reply-To: ". $contact_from . "\r\n";
			$contact_headers .= "MIME-Version: 1.0\r\n";
			$contact_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			mail($contact_to, $contact_subject, $contact_message, $contact_headers);			
		}

		public function register_company($inputs)
		{
			if(is_array($inputs)){
				// $pwdHasher = new PasswordHash(8, FALSE);
				// $hash is what you would store in your database
				// $hash = $pwdHasher->HashPassword( $_POST['com_password'] );
				$hash = base64_encode($_POST['com_password']);

				$uname = preg_replace('/@.*?$/', '', $_POST['com_email']);
				$uname .= rand();
				$input_array = array(
					'email' 		=> trim($_POST['com_email']),
					'u_type' 		=> 'company',
					'password' 		=> $hash,
					'username' 		=> $uname,
					'name '			=> ucwords($_POST['com_name']),
					'phone' 		=> $_POST['com_phone'],
					'city '			=> $_POST['com_city'],
					'country' 		=> $_POST['com_country'],
					'website'		=> $_POST['com_url'],
					'gender' 		=> $_POST['com_gender'],
					'security_question' 	=> $_POST['com_quest'],
					'security_answer'		=> $_POST['com_ans'],
					'status' 		=> 0,
				);
				$this->sendRegisterEmailCompany(trim($_POST['com_email']), ucwords($_POST['com_name']));
				return $this->insert($input_array, 'login');
			}
			else{
				return 'invalid input';
			}
		}

		public function sendPasswordEmail($id, $password)
		{
			$user 		= $this->get_dataById($id);
			$to 		= $user['vemail'];
			$subject 	= "Password reset notification - WML Guide";
			$from 		= "worldmusiclisting@wmlmusicguide.com";
			$headers 	= "From: " . $from;

			$message=" Dear User,\r\n \r\n Your password has been successfully changed.\r\n Your new credentials are as follows:\r\n\r\n Email: ".$to." \r\n Password:".$password." \r\n";
			mail($to,$subject,$message,$headers);
		}

		public function sendRegisterEmail($email, $name, $question, $answer)
		{
			$to 		= $email;
			$subject 	= "Sign up successful notification- WML Guide";
			$from 		= "worldmusiclisting@wmlmusicguide.com";
			$headers 	= "From: " . $from;

			$message 	= " Dear {$name},\r\n You have signed up successfully in the wml guide directory.\r\n Your credentials are as follows:\r\n\r\n Name: ".$name." \r\n Email:".$email." \r\n Password: [As Choosen] \r\n Security Question: ".$vsecque." \r\n Security Answer: [As Choosen] \r\n";
			mail($to, $subject, $message, $headers);
		}

		public function sendRegisterEmailCompany($email, $name)
		{
			// ini_set("SMTP","smtp.vianet.com.np");
  			// ini_set("smtp_port","25");
			$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']) . '/company_validate.php?identifier=' . base64_encode($email);
			
			$message = '<html><body>';
			$message .= '<h1>World Music Listing</h1>';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td>Dear {$name},<br /> You have signed up successfully in the wml guide directory.<br />Before we can proceed please <strong>confirm</strong> your email address. <a href='$url'>Click here</a> OR copy below url and paste into your browser</td></tr>";
			$message .= "<tr style='background: #eee;'><td>$url</td></tr>";
			$message .= "<tr style='background: #eee;'><td>With Regards, <br />World Music Listing</td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";

			$to = $email;

			$subject = 'Company Sign up successful notification- WML Guide';

			$headers = "From: " . $email . "\r\n";
			$headers .= "Reply-To: ". $email . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			mail($to, $subject, $message, $headers);
		}

		public function logIn($login, $password) {
			if (isset($_SESSION['userauth_login'])){
                unset($_SESSION['userauth_login']);
             	unset($_SESSION['user_payment']);
			}
            
            $this->sql  = 'SELECT * FROM wmldir_users WHERE vemail = "' . trim($login) . '"';
            $this->data = $this->fetch_row_assoc($this->sql);

            if(!empty($this->data)){
            	$t_hasher = new PasswordHash(8, FALSE);
            	$current_password = $this->data['vpassword'];
                $check = $t_hasher->CheckPassword($password, $current_password);
                if ($check == '1'){
                	$_SESSION['userauth_login'] = $this->data['iuserid'];
                	$_SESSION['user_payment'] = $this->data['payment'];
                	return true;
                }
            }
            return false;
		}

		public function logOut() {
	        if($this->isLoggedIn()) {
	            unset($_SESSION['userauth_login']);
	            unset($_SESSION['user_payment']);

	            return true;
	        }
	        return false;
	    }

	    public function isLoggedIn() {	    	
	        if (isset($_SESSION['userauth_login'])) {
	            $this->sql  = 'SELECT * FROM wmldir_users WHERE iuserid = "' . trim($_SESSION['userauth_login']) . '"';
	            $this->data = $this->fetch_row_assoc($this->sql);
	            if(!empty($this->data)) {
	                return true;
	            }
	        }
	        return false;
	    }

	    public function isPayment() {
	        if (isset($_SESSION['user_payment']) || $_SESSION['user_type'] == 'administrator' ) {
	            if(isset($_SESSION['user_type'])) return true;
	            if($_SESSION['user_payment'] == 1) return true;
	        }
	        return false;
	    }

	    public function reset_password($id, $password)
	    {
	    	$hasher = new PasswordHash(8, false);
	    	$hash = $hasher->HashPassword($password);
	    	$inputs['vpassword'] = $hash;
	    	return $this->udpate(array('iuserid', $id), $inputs, 'wmldir_users');
	    }

	    public function update_payment($id)
	    {
	    	$inputs['payment'] = 1;
	    	$_SESSION['user_payment'] = 1;
	    	return $this->udpate(array('iuserid', $id), $inputs, 'wmldir_users');
	    }

	    public function logInCompany($login, $password) {
			/*if (isset($_SESSION['userauth_login']))
                unset($_SESSION['userauth_login']);
            
            $this->sql  = 'SELECT * FROM wmldir_users WHERE vemail = "' . trim($login) . '"';
            $this->data = $this->fetch_row_assoc($this->sql);

            if(!empty($this->data)){
            	$t_hasher = new PasswordHash(8, FALSE);
            	$current_password = $this->data['vpassword'];
                $check = $t_hasher->CheckPassword($password, $current_password);
                if ($check == '1'){
                	$_SESSION['userauth_login'] = $this->data['iuserid'];
                	return true;
                }
            }*/
            return false;
		}

		public function validateEmail($email)
		{
			$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
			$email = base64_decode($email);
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$data = $this->get_company_email($email);
				if($data){
					if($data['status'] == 0){
						$arr['status'] = 1;
						$this->udpate($data['id'], $arr, 'login');
						echo "Your account is activated successfully. Please use <a href='{$url}/admin/viewer_admin'>this link</a> to login.";
					}
					else{
						echo "Your account is already activated. Please use <a href='{$url}/admin/viewer_admin'>this link</a> to login.";
					}
				}
				else{
					echo "Sorry, We have not found account. Please register again. <a href='{$url}/company_signup.php'>Click here to register</a>";
				}
			}
			else{
				echo "Sorry, We have not found account. Please register again. <a href='{$url}/company_signup.php'>Click here to register</a>";
			}
		}
	}
?>