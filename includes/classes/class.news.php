<?php
include_once('class.database.php');

class News extends Database {

	private $sql 			= null;
	
	public $message 			= null;
	public $customer_password  = null;
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_news($id){
	
		$this->sql = 'SELECT * FROM news WHERE id ='.$id.'';
		
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}
	
	
		public function get_active_newses(){
	
		$this->sql = 'SELECT *FROM news WHERE is_active = "1" ORDER BY `id` DESC LIMIT 2';
		
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}
	
	public function get_newses_all(){
		$this->data = NULL; 
		$this->sql = 'SELECT * FROM news';	
	//	echo $this->sql;
		$this->data = $this->fetch_rows_assoc($this->sql);
	#	print_r($this->data);exit;
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}	

	public function get_newses(){
		$this->data = NULL; 
		$this->sql = 'SELECT * FROM news WHERE is_active = "1"';	
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
		$this->sql	= 'SELECT news FROM '.$table.' where '.$field.' = "'.$value.'"';
		
		#echo $this->sql;die; 
		//$this->resultset = $this->query($this->sql);
		return $this->fetch_rows_assoc($this->sql);	
	}	


	public function add_news($arr){
		#echo 'I am here in customer class';die;
		return $this->insert($arr,'news');

	}	

	public function update_news($arr){

		return $this->udpate($arr['id'],$arr,'news');
		
	}

	public function delete_news($id){
		
		#echo 'I am here in customer class';die;
		return $this->delete($id,'news');

	}	

	
}
