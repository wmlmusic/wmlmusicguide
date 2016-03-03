<?php
include_once('class.database.php');

class Pages extends Database {
	private $sql 			= null;
	
	public $message 			= null;
	public $customer_password  = null;

	public function __construct() {
		parent::__construct();
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
	
	public function isContain($page){
			$this->sql = 'SELECT * FROM page WHERE category_nm ="'.$page.'"';
			$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return true; 
		else{
			return false; 
		}
	
	}
	
	public function get_category($page=null,$category= null){
		if(!empty($page) and !empty($category))		
			$this->sql = 'SELECT * FROM page WHERE category_nm="none" and is_hide="0" and page !="'.$page.'" and page!="'.$category.'"';//echo $this->sql;exit;}
		else
			$this->sql = 'SELECT page FROM page WHERE category_nm="none" and is_hide="0" order by id asc';	
			
		$this->data = $this->fetch_rows_assoc($this->sql);
		#echo $this->sql .'<br>here agaun<pre>';
		#print_r($this->data);
		#exit;
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}
	
	public function get_pages($ids=null){
		if(!empty($ids))		
			$this->sql = 'SELECT * FROM page WHERE id IN ('.$ids.')';
		else
			$this->sql = 'SELECT * FROM page';	
			
		$this->data = $this->fetch_rows_assoc($this->sql);
		#echo $this->sql .'<br>here agaun<pre>';
		#print_r($this->data);
		#exit;
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}	
	
			

	public function get_pages1($ids=null){
		if(!empty($ids))		
			$this->sql = 'SELECT `id`,`page` FROM page WHERE id IN ('.$ids.')';
		else
			$this->sql = 'SELECT `id`,`page` FROM page WHERE `is_active`="1"';	
			
		$this->data = $this->fetch_rows_assoc($this->sql);
		#echo $this->sql .'<br>here agaun<pre>';
		#print_r($this->data);
		#exit;
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}	
	
	public function get_header(){
		$this->sql = 'SELECT id,title FROM page order by id asc';	
		$this->data = $this->fetch_rows_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	
	}	
	
	public function get_else($value,$field,$table){
		$this->sql	= 'SELECT page FROM '.$table.' where '.$field.' = "'.$value.'"';
		
		#echo $this->sql;die; 
		//$this->resultset = $this->query($this->sql);
		return $this->fetch_rows_assoc($this->sql);	
	}	


	public function add_page($arr){
		
		#echo 'I am here in customer class';die;
		return $this->insert($arr,'page');

	}

	public function update_page($arr){

		return $this->udpate($arr['id'],$arr,'page');
		
	}

	public function delete_page($id){
		
		#echo 'I am here in customer class';die;
		return $this->delete($id,'page');

	}
	
	public function get_contact(){
		$this->sql = 'SELECT * FROM address WHERE id =1';
			$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}
	
	public function update_address($arr){
		return $this->udpate($arr['id'],$arr,'address');
	}	
	
	public function get_timing($id){
	
		$this->sql = 'SELECT * FROM time WHERE id ='.$id.'';
		$this->data = $this->fetch_row_assoc($this->sql);
		
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}
	
	public function update_timing($arr){
		return $this->udpate($arr['id'],$arr,'time');
	}	
	
}
?>