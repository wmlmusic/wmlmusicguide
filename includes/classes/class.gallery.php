<?php
include_once('class.database.php');

class Gallery extends Database {

	private $sql 			= null;
	
	public $message 			= null;
	public $customer_password  = null;
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_gallery($id){
	
		$this->sql = 'SELECT * FROM gallery WHERE id ='.$id.'';
		
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}
	
	
		public function get_active_gallerys(){
	
		$this->sql = 'SELECT * FROM gallery WHERE is_active="1"';
		
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}


	public function get_gallerys(){
		$this->data = NULL; 
		$this->sql = 'SELECT * FROM gallery';	
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
		$this->sql	= 'SELECT gallery FROM '.$table.' where '.$field.' = "'.$value.'"';
		
		#echo $this->sql;die; 
		//$this->resultset = $this->query($this->sql);
		return $this->fetch_rows_assoc($this->sql);	
	}	


	public function add_gallery($arr){
		#echo 'I am here in customer class';die;
		return $this->insert($arr,'gallery');

	}	

	public function update_gallery($arr){

		return $this->udpate($arr['id'],$arr,'gallery');
		
	}

	public function delete_gallery($id){
		
		#echo 'I am here in customer class';die;
		return $this->delete($id,'gallery');

	}	

	
}
