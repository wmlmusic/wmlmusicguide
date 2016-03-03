<?php
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
		return $this->insert($arr,'agents');

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

		$this->data = $this->fetch_row_assoc($this->sql);
		if(empty($this->data['email']))
			return true; 
		else{
			return false; 
		}
	
	}	
	 
	 
	 public function get_customer($id){
	
		$this->sql = 'SELECT * FROM login WHERE id ='.$id.'';	
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}
	 
	public function update_customer($arr){
		return $this->udpate($arr['id'],$arr,'login');	
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

	public function add_social_links($arr){
		return $this->insert($arr,'social_links');
	}

	public function update_social_links($arr){
		return $this->udpate($arr['user_id'],$arr,'social_links');		
	}
	
	public function get_social_links($id){
		$this->sql = 'SELECT * FROM social_links WHERE user_id ='.$id.'';
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}

	
}
?>
