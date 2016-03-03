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
		// echo $this->sql; exit;
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}

	public function get_all_users($id){
		//echo $id; exit;
		$this->sql = 'SELECT * FROM login where delete_by_user="1" and parent_id ="'.$id.'"';
		$this->data = $this->fetch_rows_assoc($this->sql);
		//print_r($this->data); exit;
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}	
	
	public function update_user($arr){
		// print_r($arr); exit;

		return $this->udpate($arr['id'], $arr, 'login');
		
	}
	
	public function delete_user($id){
		$arr['id'] = $id;
		$arr['delete_by_user'] = 0;
		return $this->udpate($arr['id'],$arr,'login');
//		return $this->delete($id,'login');
	}

	public function check_user_customer($parent_id,$id){
	
		$this->sql = 'SELECT id FROM login WHERE id ='.$id.' and parent_id = '.$parent_id;
//		echo $this->sql; exit; 
		$this->data = $this->fetch_row_assoc($this->sql);
		//print_r($this->data); die;
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}
	
	public function update_user_customer_status($id){
		$this->sql = 'UPDATE login SET status = IF(status = 1, 0, 1) WHERE id = "'.$id.'"';
		//echo $this->sql; exit; 
		$this->data = $this->fetch_row_assoc($this->sql);
		//print_r($this->data); die;
		if(!empty($this->data))
			return $this->data; 
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


}