<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */

	include_once('class.database.php');

	class Social_Media extends Database {
		private $sql	= NULL;
		public $retval 	= array();
		private $tblname = 'tbl_music_socials';

		public function __construct() {
			parent::__construct();
		}

		public function add($arr){
			return $this->insert($arr, $this->tblname);
		}

		public function delete($type, $id){
			// echo 'field = "' . $type . '" AND type_id = ' . $id;
			return $this->remove('field = "' . $type . '" AND type_id = "' . $id . '"', $this->tblname);	
		}
		public function get_all_rows($type, $id){
			$this->sql 	= 'SELECT * FROM ' . $this->tblname . ' WHERE field = "' . $type . '" AND type_id = "' .$id. '"';
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
	}
