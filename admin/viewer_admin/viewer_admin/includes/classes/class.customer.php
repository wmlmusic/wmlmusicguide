<?php
/*
  * Customer Class Developed By Mukesh Rai
  * for http://www.elrada.com
  *	
  	Copyright (c) 2011- 2012 elrada.com
*/


#include('array2xml.php');
include_once('class.database.php');

class Customer extends Database {

	#private $data 			= array();
	private $sql 			= null;
	
	public $message 			= null;
	public $customer_password  = null;
	


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

	
	public function add_customer($arr){

		return $this->insert($arr,'customers');

	}

	public function add_agents($arr){
		#echo 'I am here in customer class';die;
		return $this->insert($arr,'agents');

	}

	public function update_agents($arr){
		
		$affected = $this->udpate($arr['id'],$arr,'agents');
		
		if($affected >0)
			return true;
		else
			return false;
	}

	public function get_customer($id,$table){
	
		$this->sql = 'SELECT * FROM '.$table.' WHERE id ='.$id.'';
		
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}

	public function reset_password($arr){
		
		$affected = $this->udpate($arr['id'],$arr,'agents');
		
		if($affected >0)
			return true;
		else
			return false;
	}

	public function login($email){

		$this->sql = 'SELECT * FROM agents WHERE email="'.$email.'"';
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}		

	public function admin_login($email){

		$this->sql = 'SELECT * FROM login WHERE email="'.$email.'"';
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}		
	
	
	public function check_availability($email,$type){
	
		if($type =='customer')
			$this->sql = 'SELECT * FROM customers WHERE email="'.$email.'"';
		else if($type =='agent')
			$this->sql = 'SELECT * FROM agents WHERE email="'.$email.'"';

		#echo $this->sql .'<pre>';
		$this->data = $this->fetch_row_assoc($this->sql);
		
		#print_r($this->data);
		#exit;
		if(empty($this->data['email']))
			return true; 
		else{
			return false; 
		}
	
	}	
	
	private function email_content($arr){
		#$password = $this->generatepassword($user_id);
			
		if($arr['gender'] == 'male')
			$greeting_text = 'Sehr geehrter Herr ';
		else if($arr['gender'] == 'female')
			$greeting_text = 'Sehr geehrter Frau ';		
		
		if($arr['email_content_type'] == 'customer'){
			$content = '<table cellpadding="3" cellspacing="5" border="0">
						<tr><td>'.$greeting_text.' '.ucfirst($arr['name']).',</td></tr>
						<tr><td>wir möchte Sie informieren, dass ab sofort unser Onlineshop verfügbar steht. Mit folgende Zugangsdaten 
						können Sie bei uns ganz bequem Online Erstzteile kaufen. </td></tr>
						<tr><td>
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td>Benutzer : </td>
									<td style="padding-left:8px;">'.$arr['email'].'</td>
								</tr>
							</table>
						</td></tr>
						<tr><td>Für Fragen stehen wir Ihnen sehr gerne zur verfügung!</td></tr>
						<tr><td>Viel spass wünsch Brühlmann- Anhänger<br />
							<a href="www.bruehlmann-anhaenger.ch/shop">www.bruehlmann-anhaenger.ch/shop</a>
						</td></tr>
						</table>
			
						';
			}
			else if($arr['email_content_type'] == 'agent'){
				$content = '<table cellpadding="3" cellspacing="5" border="0">
						<tr><td>'.$greeting_text.' '.ucfirst($arr['name']).',</td></tr>
						<tr><td>Besten Dank für die Registrierung bei webedesign-offerten.com</td></tr>
						<tr><td>
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td>Benutzer : </td>
									<td style="padding-left:8px;">'.$arr['email'].'</td>
								</tr>
								<tr>
									<td>Passwort : </td>
									<td style="padding-left:8px;">'.$arr['password'].'</td>
								</tr>
							</table>
						</td></tr>
						<tr><td>Für Fragen stehen wir Ihnen sehr gerne zur Verfügung!</td></tr>
						<tr><td>Ihr Team<br />
							<a href="www.webdesign-offerten.com">Webdesign-offerten.com</a>
						</td></tr>
						</table>
						';
			}
			else if($arr['email_content_type'] == 'forgot-password'){
				$content = '<table cellpadding="3" cellspacing="5" border="0">
						<tr><td>'.$greeting_text.' '.ucfirst($arr['name']).',</td></tr>
						<tr><td>Besten Dank für die Registrierung bei webedesign-offerten.com</td></tr>
						<tr><td>
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td>New Passwort : </td>
									<td style="padding-left:8px;">'.$arr['password'].'</td>
								</tr>
							</table>
						</td></tr>
						<tr><td>Für Fragen stehen wir Ihnen sehr gerne zur Verfügung!</td></tr>
						<tr><td>Ihr Team<br />
							<a href="www.webdesign-offerten.com">Webdesign-offerten.com</a>
						</td></tr>
						</table>
						';
			}
		


		return $content;
	}
	
	
	public function send_smtp_email($arrEmail){
		
			
		require_once('phpmailer/class.phpmailer.php');
		//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
		
		$mail             = new PHPMailer();
		
		$body             = $this->email_content($arrEmail);
		#$body             = eregi_replace("[\]",'',$body);
		
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host       = "smtp.gmail.com"; // SMTP server
		#$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
												   // 1 = errors and messages
												   // 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
		$mail->Username   = "riyalike@gmail.com";  // GMAIL username
		$mail->Password   = "alibaba40";            // GMAIL password
		
		$mail->SetFrom('riyalike@gmail.com', 'Offer Signup Email');
		
		#$mail->AddReplyTo("name@yourdomain.com","First Last");
		
		$mail->Subject    = "Webdesign-Offerten";
		
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		
		$mail->MsgHTML($body);
		
		$address = $arrEmail['email'];
		$mail->AddAddress($address, ucfirst($arrEmail['name']));
		
		#$mail->AddAttachment("images/phpmailer.gif");      // attachment
		#$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
		
		#echo '<pre>';
		#print_r($mail);
		#exit;
		if(!$mail->Send()) {
		  echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  return true;
		}	
	}	

	# generate 6 digit password send to user	
	public function generate_password(){
			$pass  = $this->random();
			
			$password = substr(base64_encode($pass),0,6);
		return $password;
	}	

  	#To Encrypt the Password	
	public function encrypt_password($plain) {
		$password = '';

		#$salt = substr(md5($password), 0, 2);
		$salt = 'ayd01m9k';
	
		$password = md5($salt . $plain) . ':' . $salt;
		#$password = md5($salt.$plain);
	
		return $password;
	}  
  
	public function random($min = null, $max = null) {
		static $seeded;
	
		if (!isset($seeded)) {
		  mt_srand((double)microtime()*1000000);
		  $seeded = true;
		}
	
		if (isset($min) && isset($max)) {
		  if ($min >= $max) {
			return $min;
		  } else {
			return mt_rand($min, $max);
		  }
		} else {
		  return mt_rand();
		}
  	}

	public function get_states(){
	
		$this->sql = 'SELECT state_code,state_name FROM swiss_states';
		$this->data = $this->fetch_rows_assoc($this->sql);
	
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}
	
	
}
?>