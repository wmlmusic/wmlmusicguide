<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */

	include_once('class.database.php');

	class Artist extends Database {
		private $sql	= NULL;
		public $retval 	= array();
		private $tblname = 'tbl_music_artists';
		private $tblname1 = 'tbl_music_properties';
		private $tblname2 = 'tbl_music_companies';
		private $tblname3 = 'tbl_music_artist_prop';

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
		public function get_all_artistnames(){
			$this->sql 	= 'SELECT aname FROM ' . $this->tblname . ' ORDER BY aname';
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}		
		}		
		public function get_all_rows_company($com_id){
			$this->sql 	= 'SELECT * FROM ' . $this->tblname . ' WHERE com_id = "' . $com_id . '" ORDER BY id DESC';
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

		public function getCompaniesForSelect($id){
			$option = '';
			$this->sql = 'SELECT * FROM ' . $this->tblname2;
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data)){
				foreach ($this->data as $key => $value) {
					$selected = $id == $value['id'] ? 'selected' : ''; 
					$option .= "<option value='{$value['id']}' {$selected}>{$value['cname']}</option>";
				}
			}
			return $option;
		}

		public function getCategoriesForSelect($field, $id){
			$selectedProp = $this->getSelectedProperties($id, 'artist');
			$preselected  = array();
			if($selectedProp){
				foreach ($selectedProp as $key => $value) {
					$preselected[] = $value['prop_id'];
				}
			}
			$option = '';
			$this->sql = 'SELECT * FROM ' . $this->tblname1 . ' WHERE mp_type = "'.$field.'"';
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data)){
				foreach ($this->data as $key => $value) {
					$selected = in_array($value['mp_id'], $preselected) ? 'selected' : ''; 
					$option .= "<option value='{$value['mp_id']}' {$selected}>{$value['mp_name']}</option>";
				}
			}
			return $option;
		}

		public function add_prop($arr, $id, $type){
			$retval['type'] = $type;
			$retval['type_id'] = $id;
			foreach ($arr as $key => $value) {
				$retval['prop_id'] = $value;
				// echo "<pre>"; print_r($retval);
				$this->insert($retval, $this->tblname3);
			}
		}
		public function del_prop($id, $type){
			return $this->remove('type = "' . $type . '" AND type_id = "' . $id . '"', $this->tblname3);	
		}
		public function getSelectedProperties($id, $type){
			$this->sql 	= 'SELECT * FROM ' . $this->tblname3 . ' WHERE type = "' . $type . '" AND type_id = ' . $id;
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}		
		}

		public function delete_row($id){		
			return $this->remove('id = ' . $id, $this->tblname);
		}

		public function delete_rows_properties($id){		
			return $this->remove('type = "artist" AND type_id = ' . $id, 'tbl_music_artist_prop');
		}

		public function delete_rows_social($id){		
			return $this->remove('field = "artist" AND type_id = ' . $id, 'tbl_music_socials');
		}

		public function getArtistProfileListing(){
			$this->sql = 'SELECT a.*, (SELECT GROUP_CONCAT(mp_name) FROM ' .$this->tblname1.' mp JOIN tbl_music_artist_prop ap ON mp.mp_id = ap.prop_id AND mp.mp_type = "category" WHERE type_id = a.id and type="artist") categories FROM ' . $this->tblname . ' a WHERE a.enable_profile ="1" ORDER BY rand(' . date("Ymd") . ') LIMIT 30';
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}

		public function getArtistByEmail($email){
			$this->sql = 'SELECT * FROM ' . $this->tblname . ' WHERE email ="'.$email.'"';
			$this->data = $this->fetch_row_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}
	}
