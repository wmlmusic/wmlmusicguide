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
			return $this->udpate('id = ' . $arr['id'], $arr, $this->tblname);	
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
		
		// Added 1/23/2016 for ajax_company.php
		public function get_company_email($email){		
			$this->sql = "SELECT * FROM login WHERE email ='{$email}'";			
			$this->data = $this->fetch_row_assoc($this->sql);
			//print_r($this->data);exit;
			if(!empty($this->data)){
				return $this->data; 
			}
			else{
				$sql = "(SELECT email FROM tbl_music_artists WHERE email='{$email}')
					UNION
					(SELECT email FROM tbl_music_companies WHERE email='{$email}')
					";
				$data = $this->fetch_row_assoc($sql);
				if(!empty($data)){
					return false;
				}
				return true;
			}		
		}		

		public function delete_row($id){		
			return $this->remove('id = ' . $id, $this->tblname);
		}

		public function delete_rows_social($id){		
			return $this->remove('field = "company" AND type_id = ' . $id, 'tbl_music_socials');
		}
	}
