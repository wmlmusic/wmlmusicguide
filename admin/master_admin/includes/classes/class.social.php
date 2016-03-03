<?php
/*
  * Customer Class Developed By Mukesh Rai
  * for http://www.elrada.com
  *	
  	Copyright (c) 2011- 2012 elrada.com
*/


include_once('class.database.php');
class Social extends Database {

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
	
	public function add_social_detail($arr){
		return $this->insert($arr,'social_links');
	}
	public function get_user_social_detail($id){
	
		$this->sql = 'SELECT * FROM social_links WHERE user_id ='.$id.'';
		
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}


	public function get_all_users_social_detail(){
		$this->sql =  'SELECT * from social_links';
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}	
	
	public function update_user_social_detail($arr){
//		print_r($arr); exit;

		return $this->udpate($arr['id'],$arr,'social_links');
		
	}
	
	public function delete_user_social_detail($id){
		return $this->delete($id,'social_links');
	}


	public function update_user_customer_status($id){
		$this->sql = 'UPDATE social_links SET status = IF(status = 1, 0, 1) WHERE id = "'.$id.'"';
		//echo $this->sql; exit; 
		$this->data = $this->fetch_row_assoc($this->sql);
		//print_r($this->data); die;
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}
	



}