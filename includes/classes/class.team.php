<?php
include_once('class.database.php');

class Team extends Database {
	private $sql 			= null;
	
	public $message 			= null;
	public $customer_password  = null;

	public function __construct() {
		parent::__construct();
	}
	
	public function get_team($id){
	
		$this->sql = 'SELECT * FROM team WHERE id ='.$id.'';

		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}

	public function get_teams($ids=null){
		if(!empty($ids))		
			$this->sql = 'SELECT * FROM team WHERE id IN ('.$ids.')';
		else
			$this->sql = 'SELECT * FROM team order by id asc';	
			
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}	
	
	public function get_home_team(){
		$this->sql = 'SELECT * FROM team where is_hide = "1" order by id asc';	
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}	

	public function get_else($value,$field,$table){
		$this->sql	= 'SELECT team FROM '.$table.' where '.$field.' = "'.$value.'"';
		return $this->fetch_rows_assoc($this->sql);	
	}	

	public function add_team($arr){
		return $this->insert($arr,'team');
	}

	public function update_team($arr){
		return $this->udpate($arr['id'],$arr,'team');
	}

	public function delete_team($id){
		return $this->delete($id,'team');
	}
}?>