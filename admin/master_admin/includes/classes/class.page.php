<?php
/*
  * Customer Class Developed By Mukesh Rai
  * for http://www.elrada.com
  *	
  	Copyright (c) 2011- 2012 elrada.com
*/

//echo "I am in side user class"; exit;
include_once('class.database.php');
class Page extends Database {

	#private $data 			= array();
	private $sql 			= null;
	
	var $message 			= NULL;
	


  /*
   * To Register Customer and Login Using Bruhman API:
   *
   *
   * @data       Cuwtomer Data information
   * 
   * 
   */


	public function __construct() {
		parent::__construct();
	}
	
	public function add_page($arr){
		return $this->insert($arr,'page');
	}
	
	public function get_page($id){
		$this->sql = 'SELECT * FROM page WHERE id ='.$id.'';
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}


	public function get_all_pages(){
		$this->sql =  'SELECT * FROM page';
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}	
	
	public function update_page($arr){
		return $this->udpate($arr['id'],$arr,'page');	
	}
	
	public function delete_page($id){
		return $this->delete($id,'page');
	}

	public function update_page_status($id){
		$this->sql = 'UPDATE page SET status = IF(status = 1, 0, 1) WHERE id = "'.$id.'"';
//		echo $this->sql; exit;
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}


}