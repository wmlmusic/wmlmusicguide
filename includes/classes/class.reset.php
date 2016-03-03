<?php
/*
0741d51429cb184b0e3fb5e9e9e1b3f2:ayd01m9k
  * Customer Class Developed By Mukesh Rai
  * for http://www.elrada.com
  *	
  	Copyright (c) 2011- 2012 elrada.com
*/


#include('array2xml.php');
include_once('class.database.php');

class Pages extends Database {

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
	public function encrypt_password($plain) {
		$password = '';

		#$salt = substr(md5($password), 0, 2);
		$salt = 'ayd01m9k';
	
		$password = md5($salt . $plain) . ':' . $salt;
		#$password = md5($salt.$plain);
	
		return $password;
	}  
	
	
  
	public function reset_password($arr){
		
		$affected = $this->udpate($arr['id'],$arr,'admin_creative');
		
		if($affected >0)
			return true;
		else
			return false;
	}
	public function get_page($id){
	
		$this->sql = 'SELECT * FROM admin_creative WHERE id ='.$id.'';
		
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}
	
	
}
