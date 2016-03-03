<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */

	include_once('class.database.php');

	class Company extends Database {
		private $sql	= NULL;
		public $retval 	= array();
		private $tblname = 'tbl_music_companies';

		public function __construct() {
			parent::__construct();
		}

		public function add($arr){
			return $this->insert($arr, $this->tblname);
		}

		public function edit($arr){
			// print_r($arr);
			return $this->udpate($arr['id'], $arr, $this->tblname);	
		}
		public function get_all_rows(){
			$this->sql 	= 'SELECT * FROM ' . $this->tblname . ' ORDER BY id DESC';
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}		
		}

		public function get_row($id){
			$this->sql = 'SELECT * FROM ' . $this->tblname . ' WHERE id ='.$id.'';
			$this->data = $this->fetch_row_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}

		public function getCompanyByEmail($email){
			$this->sql = 'SELECT * FROM ' . $this->tblname . ' WHERE email ="'.$email.'"';
			$this->data = $this->fetch_row_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}

		public function delete_row($id){		
			return $this->remove('id = ' . $id, $this->tblname);
		}

		public function delete_rows_social($id){		
			return $this->remove('field = "company" AND type_id = ' . $id, 'tbl_music_socials');
		}
	}
