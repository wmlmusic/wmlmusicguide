<?php
include_once('class.database.php');

class SubProduct extends Database {
	private $sql 			= null;
	
	public $message 			= null;
	public $customer_password  = null;

	public function __construct() {
		parent::__construct();
	}
	
	public function get_subprod($id){
	
		$this->sql = 'SELECT * FROM subproduct WHERE id ='.$id.'';

		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}
	
	public function get_subpro($pro){
	
		$this->sql = 'SELECT * FROM subproduct WHERE product ="'.$pro.'"';
//		echo $this->sql; die;
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}
	
	public function get_product($ids=null){
		if(!empty($ids))		
			$this->sql = 'SELECT * FROM product WHERE id IN ('.$ids.')';
		else
			$this->sql = 'SELECT id,product FROM product WHERE is_active="1"';	
		
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}

	public function get_subprods($ids=null){
		if(!empty($ids))		
			$this->sql = 'SELECT * FROM subproduct WHERE id IN ('.$ids.')';
		else
			$this->sql = 'SELECT * FROM subproduct order by product';	
			
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}	
		
	public function get_else($value,$field,$table){
		$this->sql	= 'SELECT subproduct FROM '.$table.' where '.$field.' = "'.$value.'"';
		return $this->fetch_rows_assoc($this->sql);	
	}	

	public function add_subprod($arr){
	//print_r($arr); die;
		return $this->insert($arr,'subproduct');
	}

	public function update_subprod($arr){
		return $this->udpate($arr['id'],$arr,'subproduct');
	}

	public function delete_subprod($id){
		return $this->delete($id,'subproduct');
	}
}?>