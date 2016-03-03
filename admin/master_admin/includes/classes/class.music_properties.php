<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */

	include_once('class.database.php');

	class Music_Properties extends Database {
		private $sql	= NULL;
		public $retval 	= array();
		private $tblname = 'tbl_music_properties';

		public function __construct() {
			parent::__construct();
		}

		public function add($arr){
			return $this->insert($arr, $this->tblname);
		}

		public function edit($arr){
			return $this->udpate('mp_id = ' . $arr['mp_id'], $arr, $this->tblname);	
		}

		public function get_all_rows($mp_type){
			$this->sql 	= 'SELECT * FROM ' . $this->tblname . ' WHERE mp_type = "' . $mp_type . '"';
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}		
		}

		public function get_row($id){
			$this->sql = 'SELECT * FROM ' . $this->tblname . ' WHERE mp_id ='.$id.'';
			$this->data = $this->fetch_row_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}

		public function delete_row($id, $type){		
			return $this->remove('mp_id = ' . $id . ' AND mp_type = "' . $type . '"', $this->tblname);
		}

		public function delete_rows_properties($id){		
			return $this->remove('prop_id =' . $id, 'tbl_music_artist_prop');
		}

		public function delete_rows_social($id){		
			return $this->remove('social_id =' . $id, 'tbl_music_socials');
		}

	}