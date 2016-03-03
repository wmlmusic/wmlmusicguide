<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */

	include_once('class.database.php');

	class Post extends Database {
		private $sql	= NULL;
		public $retval 	= array();
		private $tblname = 'tbl_posts';

		public function __construct() {
			parent::__construct();
		}

		public function add($arr){
			return $this->insert($arr, $this->tblname);
		}

		public function edit($arr){
			return $this->udpate('id = ' . $arr['id'], $arr, $this->tblname);	
		}

		public function get_all_rows($user_id = null){
			$query = '';
			if($user_id > 0){
				$query = ' WHERE user_id = "' . $user_id . '"';
			}
			$this->sql 	= 'SELECT * FROM ' . $this->tblname . $query . ' ORDER BY id DESC';
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}		
		}

		public function get_row($id, $user_id = null){
			$query = '';
			if($user_id > 0){
				$query = ' AND user_id = "' . $user_id . '"';
			}
			$this->sql = 'SELECT * FROM ' . $this->tblname . ' WHERE id =' . $id . $query;
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

	}
