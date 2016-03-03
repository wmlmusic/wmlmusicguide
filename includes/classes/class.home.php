<?php
include_once('class.database.php');

class Home extends Database {

	private $sql 			= null;
	
	public $message 			= null;
	public $customer_password  = null;
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_home($id){
	
		$this->sql = 'SELECT * FROM home WHERE id ='.$id.'';
		
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}
	
	
		public function get_active_homes(){
	
		$this->sql = 'SELECT * FROM home WHERE is_active="1"';
		
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}


	public function get_homes(){
		$this->data = NULL; 
		$this->sql = 'SELECT * FROM home';	
	//	echo $this->sql;
		$this->data = $this->fetch_rows_assoc($this->sql);
	#	print_r($this->data);exit;
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}	

	public function get_else($value,$field,$table){
		$this->sql	= 'SELECT home FROM '.$table.' where '.$field.' = "'.$value.'"';
		
		#echo $this->sql;die; 
		//$this->resultset = $this->query($this->sql);
		return $this->fetch_rows_assoc($this->sql);	
	}	


	public function add_home($arr){
		#echo 'I am here in customer class';die;
		return $this->insert($arr,'home');

	}	

	public function update_home($arr){

		return $this->udpate($arr['id'],$arr,'home');
		
	}

	public function delete_home($id){
		
		#echo 'I am here in customer class';die;
		return $this->delete($id,'home');

	}	
}
?>