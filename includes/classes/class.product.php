<?php
include_once('class.database.php');

class Product extends Database {
	private $sql 			= null;
	
	public $message 			= null;
	public $customer_password  = null;

	public function __construct() {
		parent::__construct();
	}
	
	public function get_product($id){
	
		$this->sql = 'SELECT * FROM product WHERE id ='.$id.'';

		$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}

	public function get_products($ids=null){
		if(!empty($ids))		
			$this->sql = 'SELECT * FROM product WHERE id IN ('.$ids.')';
		else
			$this->sql = 'SELECT * FROM product order by id asc';	
			
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}	
	
	public function get_home_product(){
		$this->sql = 'SELECT * FROM product where is_hide = "1" order by id asc';	
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}	

	public function get_else($value,$field,$table){
		$this->sql	= 'SELECT product FROM '.$table.' where '.$field.' = "'.$value.'"';
		return $this->fetch_rows_assoc($this->sql);	
	}	

	public function add_product($arr){
	//print_r($arr); die;
		return $this->insert($arr,'product');
	}

	public function update_product($arr){
		return $this->udpate($arr['id'],$arr,'product');
	}

	public function delete_product($id){
		return $this->delete($id,'product');
	}
	
	public function delete_subproduct($pro){
		return $this->delete_sub($pro,'subproduct');
	}
}?>