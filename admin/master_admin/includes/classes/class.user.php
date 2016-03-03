<?php
/*
  * Customer Class Developed By Mukesh Rai
  * for http://www.elrada.com
  *	
  	Copyright (c) 2011- 2012 elrada.com
*/

include_once('class.database.php');

class User extends Database {

	#private $data 			= array();
	private $sql 			= null;
	
	var $message 			= NULL;
	
  /*
   * To Register Customer and Login Using Bruhman API:
   *
   *
   * @data       Customer Data information
   * 
   * 
   */

	public function __construct() {
		parent::__construct();
	}
	
	public function add_user($arr){
		return $this->insert($arr,'login');
	}
	
	public function get_user($id){
		$this->sql = 'SELECT * FROM login WHERE id ='.$id.'';
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}

	public function login_details($email){
		$this->sql = 'SELECT * FROM login WHERE email ="'.$email.'"';
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}

	public function get_all_users(){
		$this->sql =  'SELECT e.*, m.username AS "created_by" FROM login e INNER JOIN login m ON e.parent_id = m.id and e.id !=1 and e.u_type="user"';
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data;
		else{
			return false; 
		}	
	}
		
	public function get_all_companies($id){
		$this->sql =  'SELECT e.*, m.username AS "created_by" FROM login e INNER JOIN login m ON e.parent_id = m.id and e.id !=1 and e.u_type="company"';
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}	
	}	
	
	public function update_user($arr){
		return $this->udpate($arr['id'],$arr,'login');	
	}
	
	public function delete_user($id){
		return $this->delete($id,'login');
	}

	public function check_user_customer($parent_id,$id){
		$this->sql = 'SELECT id FROM login WHERE id ='.$id.' and parent_id = '.$parent_id;
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}	
	}
	
	public function update_user_customer_status($id){
		$this->sql = 'UPDATE login SET status = IF(status = 1, 0, 1) WHERE id = "'.$id.'"';
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}	
	}
	
	public function get_all_users_detail(){
		$this->sql =  'SELECT * from contact_info order by username';
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data)){
			return $this->data; 
		}
		else{
			return false; 
		}	
	}	
	
	public function get_user_full_detail($id = NULL){
		$this->sql =  'SELECT * from contact_info where id='.$id;
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data)){
			return $this->data; 
		}
		else{
			return false; 
		}	
	}
	
	public function get_user_full_detail_by_userid($id = NULL){
		$this->sql =  'SELECT * from contact_info where user_id='.$id;
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data)){
			return $this->data; 
		}
		else{
			return false; 
		}	
	}

	// Added 1/17/2016
	public function get_email($email){
		
		$this->sql = "SELECT * FROM wmldir_users WHERE vemail ='{$email}'";
			
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

	public function register_company($inputs){
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

	public function sendRegisterEmailCompany($email, $name){
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
}
