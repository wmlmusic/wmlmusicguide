<?php
/*
  * Customer Class Developed By Mukesh Rai
  * for http://www.elrada.com
  *	
  	Copyright (c) 2011- 2012 elrada.com
*/


include_once('class.database.php');
class Address extends Database {

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
	
	public function get_address($id){
	
		$this->sql = 'SELECT * FROM address WHERE id ='.$id.'';
		
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}	

	public function get_addresses(){
	
		$this->sql = 'SELECT * FROM address';
		$this->data = $this->fetch_rows_assoc($this->sql);

		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}	
	
}