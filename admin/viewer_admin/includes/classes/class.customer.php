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
		//print_r($arr);exit; 
		return $this->insert($arr,'contact_info');

	}

	public function add_agents($arr){
		#echo 'I am here in customer class';die;
		return $this->insert($arr,'agents');

	}

	public function update_customer($arr){
		//print_r($arr); exit;
		return $this->udpate($arr['id'],$arr,'contact_info');
		
	}
	public function update_agents($arr){
		
		$affected = $this->udpate($arr['id'],$arr,'agents');
		
		if($affected >0)
			return true;
		else
			return false;
	}

	public function get_customer($id){
	
		$this->sql = 'SELECT * FROM contact_info WHERE user_id ='.$id.'';
		
		$this->data = $this->fetch_row_assoc($this->sql);
		
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}
	public function add_social_links($arr){
		//print_r($arr);exit; 
		return $this->insert($arr,'social_links');

	}
	public function update_social_links($arr){
		//print_r($arr); exit;
		return $this->udpate_by_userid($arr['user_id'],$arr,'social_links');
		
	}
	
	public function get_social_links($id){
	
		$this->sql = 'SELECT * FROM social_links WHERE user_id ='.$id.'';
		$this->data = $this->fetch_row_assoc($this->sql);
		//print_r($this->data); exit;
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}

}
?>