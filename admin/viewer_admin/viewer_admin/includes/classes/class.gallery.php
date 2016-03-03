<?php
include_once('class.database.php');

class Gallery extends Database {

	private $sql 			= null;
	
	public $message 			= null;
	public $customer_password  = null;
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_gallery($id,$c_id){
	
		$this->sql = 'SELECT * FROM customer_gallery WHERE id ='.$id.' and customer_id = '.$c_id;
		
		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}
	
	
		public function get_active_gallerys(){
	
		$this->sql = 'SELECT * FROM customer_gallery WHERE is_active="1"';
		
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}


	public function all_customer_gallery($cid){
		$this->data = NULL; 
		$this->sql = 'SELECT * FROM customer_gallery where customer_id = '.$cid;	
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
		$this->sql	= 'SELECT customer_gallery FROM '.$table.' where '.$field.' = "'.$value.'"';
		
		#echo $this->sql;die; 
		//$this->resultset = $this->query($this->sql);
		return $this->fetch_rows_assoc($this->sql);	
	}	


	public function add_gallery($arr){
		return $this->insert($arr,'customer_gallery');
	}	

	public function update_gallery($arr){
		//print_r($arr); exit;
		return $this->udpate($arr['id'],$arr,'customer_gallery');
		
	}

	public function delete_gallery($id){
		
		#echo 'I am here in customer class';die;
		return $this->delete($id,'customer_gallery');

	}	
	
	public function check_user_customer($parent_id,$id){
	
		$this->sql = 'SELECT id FROM customer_gallery WHERE id ='.$id.' and customer_id = '.$parent_id;
//		echo $this->sql; exit; 
		$this->data = $this->fetch_row_assoc($this->sql);
//		print_r($this->data); die;
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}
	public function update_user_gallery_status($id){
		$this->sql = 'UPDATE customer_gallery SET status = IF(status = 1, 0, 1) WHERE id = "'.$id.'"';
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
