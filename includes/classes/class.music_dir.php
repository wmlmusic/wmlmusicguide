<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */

	include_once('class.database.php');

	class Music_Directory extends Database {
		private $sql	= NULL;
		public $retval 	= array();
		private $tbl_mp = 'tbl_music_properties';
		private $tbl_com = 'tbl_music_companies';
		private $tbl_art = 'tbl_music_artists';	
		private $tbl_pst = 'tbl_posts';	
		private $tbl_scl = 'tbl_music_socials';	

		public function __construct() {
			parent::__construct();
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
			$this->sql = 'SELECT * FROM ' . $this->tbl_mp . ' WHERE mp_id =' . $id;
			$this->data = $this->fetch_row_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}

		public function get_artist($id){
			$this->sql = 'SELECT * FROM ' . $this->tbl_art . ' WHERE id =' . $id;
			$this->data = $this->fetch_row_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}

		public function get_row_company($id){
			$this->sql = 'SELECT * FROM ' . $this->tbl_com . ' WHERE id =' . $id . ' AND status = 1 ';
			$this->data = $this->fetch_row_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}

		public function getMusicDirectoryListing(){
			$list = '';
			$this->sql = 'SELECT * FROM ' . $this->tbl_mp . ' WHERE mp_type ="category"';
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data)){
				$list .= '<ul>';
				foreach ($this->data as $key => $value) {
					$list .='<li><a href="category_directory.php?id=' . $value["mp_id"] . '">' . $value['mp_name'] . '</a>';
					$cat = strtolower($value['mp_name']) == 'music' ? 'genre' : 'field';
					$this->sql = 'SELECT * FROM ' . $this->tbl_mp . ' WHERE parent_id ="' . $value["mp_id"] . '"';
					$this->data = $this->fetch_rows_assoc($this->sql);
					if(!empty($this->data)){
						$list .= '<ul>';
							foreach ($this->data as $key => $value) {
								$list .='<li><a href="company_directory.php?id=' . $value["mp_id"] . '">' . $value['mp_name'] . '</a></li>';
							}
						$list .= '</ul>';
					}
					$list .= '</li>';

				}
				$list .= '</ul>';
			}

			return $list;
		}

		public function getCategoryDirectoryListing(){
			$this->sql = 'SELECT * FROM ' . $this->tbl_mp . ' WHERE mp_type ="category"';
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}		
		}

		public function getDirectoryListingByField($parentid)
		{
			$this->sql = 'SELECT * FROM ' . $this->tbl_mp . ' WHERE parent_id ="' . $parentid . '"';
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}

		public function getDirectoryListingByAllField()
		{
			$categories = $this->getCategoryDirectoryListing();
			$listings = array();
			if($categories){
				foreach ($categories as $key => $value) {
					$subcategories = $this->getDirectoryListingByField($value['mp_id']);
					if($subcategories){
						foreach ($subcategories as $skey => $svalue) {
							$listings[] = $svalue;
						}
					}
				}
			}
			return $listings;
		}

		public function getDirectoryListingByCompany($id)
		{
			$this->sql = "SELECT 
							DISTINCT(com.id) com_id, com.cname, com.address, com.city, com.state, com.country, com.phone, com.phone1, com.phone2, com.fax_no, com.website
						FROM 
							tbl_music_companies com 
						LEFT JOIN 
							tbl_music_artists a
						ON
							com.id = a.com_id
						LEFT JOIN 
							tbl_music_artist_prop ap 
						ON 
							a.id = ap.type_id
						WHERE
							com.status = 1 
							AND a.status = 1 
							AND ap.type = 'artist' 
							AND ap.prop_id = {$id}
						";
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}

		public function getDirectoryListingForArtists($cat_id, $type_id)
		{
			// $this->sql = "SELECT * FROM	tbl_music_artists WHERE com_id = '{$cat_id}' AND status = '1'";
			$this->sql = "SELECT 
							ma.* 
						FROM 
							tbl_music_artists ma
						LEFT JOIN
							tbl_music_artist_prop map
						ON
							ma.id = map.type_id
						WHERE 
							ma.com_id = '{$cat_id}' 
							AND ma.status = '1'
							AND map.prop_id = '{$type_id}'
							AND map.type = 'artist'
							";
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data)){
				$this->retval = $this->data;
				foreach ($this->data as $key => $value) {

						$this->sql = "SELECT ap.prop_id, mp.mp_name, mp.mp_type 
									FROM 
										tbl_music_artist_prop ap 
									LEFT JOIN 	
										tbl_music_properties mp 
									ON 
										ap.prop_id = mp.mp_id 
									WHERE 
										ap.type = 'artist' 
										AND ap.type_id = '{$value['id']}'
										AND mp.mp_type != 'category'
										";
					$this->data = $this->fetch_rows_assoc($this->sql);
					if(!empty($this->data)){
						$props = array();
						foreach ($this->data as $keyp => $valuep) {
							if($valuep['mp_type'] == 'genre')
								$props['genre'][] = $valuep['mp_name'];
							else if($valuep['mp_type'] == 'field')
								$props['field'][] = $valuep['mp_name'];
							// $props[] = $valuep;
						}
						$this->retval[$key]['properties'] = $props;
					}
				}
			}
			else{
				return false; 
			}
			return $this->retval;
		}

		public function getArtistDirectoryListing($arrayId)
		{
			$com_sql = '';
			$cat_sql = '';
			if(isset($arrayId['com_id'])){//if company ID is present
				$com_sql = 'ma.com_id = "' . $arrayId['com_id'] . '" AND ';
			}
			if(isset($arrayId['cat_id']) || isset($arrayId['genre_id']) || isset($arrayId['field_id'])){//if category, genre and field ID is present
				if(isset($arrayId['cat_id']))
					$cgfid = $arrayId['cat_id'];
				if(isset($arrayId['genre_id']))
					$cgfid = $arrayId['genre_id'];
				if(isset($arrayId['field_id']))
					$cgfid = $arrayId['field_id'];

				$cat_sql = 'JOIN tbl_music_artist_prop ap ON ap.type_id = ma.id AND ap.prop_id = "' . $cgfid . '"';
			}

			$this->sql = "SELECT 
							ma.*, ac.cname 
						FROM 
							" . $this->tbl_art . " ma 
						LEFT JOIN
							" . $this->tbl_com . " ac
						ON
							ma.com_id = ac.id
						{$cat_sql}
						WHERE 
							{$com_sql}
							ma.status = '1'
							AND ac.status = '1'
							";
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data)){
				$this->retval = $this->data;
				foreach ($this->data as $key => $value) {

						$this->sql = "SELECT ap.prop_id, mp.mp_name, mp.mp_type 
									FROM 
										tbl_music_artist_prop ap 
									LEFT JOIN 	
										tbl_music_properties mp 
									ON 
										ap.prop_id = mp.mp_id 
									WHERE
										ap.type = 'artist' 
										AND ap.type_id = '{$value['id']}'
										";
					$this->data = $this->fetch_rows_assoc($this->sql);
					if(!empty($this->data)){
						$props = array();
						foreach ($this->data as $keyp => $valuep) {
							if($valuep['mp_type'] == 'genre')
								$props['genre'][$valuep['prop_id']] = $valuep['mp_name'];
							else if($valuep['mp_type'] == 'field')
								$props['field'][$valuep['prop_id']] = $valuep['mp_name'];
							else if($valuep['mp_type'] == 'category')
								$props['category'][$valuep['prop_id']] = $valuep['mp_name'];
							// $props[] = $valuep;
						}
						$this->retval[$key]['properties'] = $props;
					}
				}
			}
			else{
				return false; 
			}
			return $this->retval;
		}

		public function getArtistDirectoryTopListing($limit = 10)
		{
			$this->sql = "SELECT 
							ma.*, ac.cname 
						FROM 
							" . $this->tbl_art . " ma 
						LEFT JOIN
							" . $this->tbl_com . " ac
						ON
							ma.com_id = ac.id
						WHERE 
							ma.status = '1'
							AND ac.status = '1'
						ORDER BY created_date DESC
						LIMIT $limit
							";
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data)){
				$this->retval = $this->data;
				foreach ($this->data as $key => $value) {

						$this->sql = "SELECT ap.prop_id, mp.mp_name, mp.mp_type 
									FROM 
										tbl_music_artist_prop ap 
									LEFT JOIN 	
										tbl_music_properties mp 
									ON 
										ap.prop_id = mp.mp_id 
									WHERE
										ap.type = 'artist' 
										AND ap.type_id = '{$value['id']}'
										";
					$this->data = $this->fetch_rows_assoc($this->sql);
					if(!empty($this->data)){
						$props = array();
						foreach ($this->data as $keyp => $valuep) {
							if($valuep['mp_type'] == 'genre')
								$props['genre'][$valuep['prop_id']] = $valuep['mp_name'];
							else if($valuep['mp_type'] == 'field')
								$props['field'][$valuep['prop_id']] = $valuep['mp_name'];
							else if($valuep['mp_type'] == 'category')
								$props['category'][$valuep['prop_id']] = $valuep['mp_name'];
							// $props[] = $valuep;
						}
						$this->retval[$key]['properties'] = $props;
					}
				}
			}
			else{
				return false; 
			}
			return $this->retval;
		}

		public function getSocialTitleListing()
		{
			$this->sql 	= 'SELECT * FROM tbl_music_properties WHERE mp_type = "social"';
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}

		public function getArtistSocialListing($arrayId)
		{
			$com_sql = '';
			$cat_sql = '';
			if(isset($arrayId['com_id'])){//if company ID is present
				$com_sql = 'ma.com_id = "' . $arrayId['com_id'] . '" AND ';
			}
			if(isset($arrayId['cat_id']) || isset($arrayId['genre_id']) ||isset($arrayId['field_id'])){//if category, genre and field ID is present
				if(isset($arrayId['cat_id']))
					$cgfid = $arrayId['cat_id'];
				if(isset($arrayId['genre_id']))
					$cgfid = $arrayId['genre_id'];
				if(isset($arrayId['field_id']))
					$cgfid = $arrayId['field_id'];

				$cat_sql = 'JOIN tbl_music_artist_prop ap ON ap.type_id = ma.id AND ap.prop_id = "' . $cgfid . '"';
			}

			$this->sql = "SELECT 
							ma.*, ac.cname 
						FROM 
							" . $this->tbl_art . " ma 
						LEFT JOIN
							" . $this->tbl_com . " ac
						ON
							ma.com_id = ac.id
						{$cat_sql}
						WHERE 
							{$com_sql}
							ma.status = '1'
							AND ac.status = '1'
							";
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data)){
				$this->retval = $this->data;
				foreach ($this->data as $key => $value) {

					$this->sql = "SELECT a.id, aso.social_id, aso.social_link
									FROM 
										tbl_music_artists a 
									INNER JOIN 	
										tbl_music_socials aso 
									ON 
										a.id = aso.type_id
									WHERE
										aso.field = 'artist' 
										AND aso.type_id = '{$value['id']}'
										";

					$this->data = $this->fetch_rows_assoc($this->sql);
					if(!empty($this->data)){
						$props = array();
						foreach ($this->data as $keyp => $valuep) {
								$props['social'][$valuep['social_id']] = $valuep['social_link'];
						}
						$this->retval[$key]['properties'] = $props;
					}
				}
			}
			else{
				return false; 
			}
			return $this->retval;
		}

		public function OLD_getSelectDirectoryListing($arrayId, $type)
		{
			if(isset($arrayId['com_id'])){//if company ID is present
				$selectedid = $arrayId['com_id'];
			}
			if(isset($arrayId['cat_id']) || isset($arrayId['genre_id']) ||isset($arrayId['field_id'])){//if category, genre and field ID is present
				if(isset($arrayId['cat_id']))
					$selectedid = $arrayId['cat_id'];
				if(isset($arrayId['genre_id']))
					$selectedid = $arrayId['genre_id'];
				if(isset($arrayId['field_id']))
					$selectedid = $arrayId['field_id'];
			}

			$this->sql = "SELECT 
							*
						FROM 
							" . $this->tbl_mp . "
						WHERE
							mp_type = '{$type}'
							";
			$this->data = $this->fetch_rows_assoc($this->sql);
			$returnoption = array();
			if(!empty($this->data)){
				foreach ($this->data as $key => $value) {
					if($type == 'category'){
						$getterid = 'cat_id';
					}
					else if($type == 'genre'){
						$getterid = 'genre_id';
					}
					else{
						$getterid = 'field_id';
					}

					$selected = '';
					if(isset($selectedid)){
						$selected = $value['mp_id'] == $selectedid ? 'selected' : '';
					}
					$returnoption[] = "<option value='wml_directory.php?{$getterid}={$value['mp_id']}' {$selected}>&nbsp;{$value['mp_name']}<option>";
				}					
			}
			echo "<pre>ASD"; echo count($returnoption);
			echo "<pre>ASD"; print_r($returnoption);exit;
			return count($returnoption) > 0 ? $returnoption : false;
		}

		public function getSelectDirectoryListing($arrayId, $type)
		{
			if(isset($arrayId['com_id'])){//if company ID is present
				$selectedid = $arrayId['com_id'];
			}
			if(isset($arrayId['cat_id']) || isset($arrayId['genre_id']) ||isset($arrayId['field_id'])){//if category, genre and field ID is present
				if(isset($arrayId['cat_id']))
					$selectedid = $arrayId['cat_id'];
				if(isset($arrayId['genre_id']))
					$selectedid = $arrayId['genre_id'];
				if(isset($arrayId['field_id']))
					$selectedid = $arrayId['field_id'];
			}

			$this->sql = "SELECT 
							*
						FROM 
							" . $this->tbl_mp . "
						WHERE
							mp_type = '{$type}'
							";
			$this->data = $this->fetch_rows_assoc($this->sql);
			$returnoption = array();
			if(!empty($this->data)){
				return $this->data;
			}
			return false;
		}

		public function getSearchListing($terms)
		{
			$searchTerms = explode(' ', $terms);
			$searchTermBits = array();
			foreach ($searchTerms as $term) {
			    $term = trim($term);
			    if (!empty($term)) {
			        $searchTermBits[] = "ma.aname LIKE '%{$term}%'
							OR ac.cname LIKE '%{$term}%'";
			    }
			}

			$this->sql = "SELECT 
							ma.*, ac.cname 
						FROM 
							" . $this->tbl_art . " ma 
						LEFT JOIN
							" . $this->tbl_com . " ac
						ON
							ma.com_id = ac.id
						WHERE
							(" . implode(' OR ', $searchTermBits) . ")
							AND ma.enable_profile = '1'
							AND ma.status = '1'
							AND ac.status = '1'
						ORDER BY ma.created_date DESC
							";
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data)){
				$this->retval = $this->data;
				foreach ($this->data as $key => $value) {

						$this->sql = "SELECT ap.prop_id, mp.mp_name, mp.mp_type 
									FROM 
										tbl_music_artist_prop ap 
									LEFT JOIN 	
										tbl_music_properties mp 
									ON 
										ap.prop_id = mp.mp_id 
									WHERE
										ap.type = 'artist' 
										AND ap.type_id = '{$value['id']}'
										";
					$this->data = $this->fetch_rows_assoc($this->sql);
					if(!empty($this->data)){
						$props = array();
						foreach ($this->data as $keyp => $valuep) {
							if($valuep['mp_type'] == 'genre')
								$props['genre'][$valuep['prop_id']] = $valuep['mp_name'];
							else if($valuep['mp_type'] == 'field')
								$props['field'][$valuep['prop_id']] = $valuep['mp_name'];
							else if($valuep['mp_type'] == 'category')
								$props['category'][$valuep['prop_id']] = $valuep['mp_name'];
							// $props[] = $valuep;
						}
						$this->retval[$key]['properties'] = $props;
					}
				}
			}
			else{
				return false; 
			}
			return $this->retval;
		}

		public function getSearchListingByProp($terms){
			$searchTerms = explode(' ', $terms);
			$searchTermBits = array();
			foreach ($searchTerms as $term) {
			    $term = trim($term);
			    if (!empty($term)) {
			        $searchTermBits[] = "mp_name LIKE '%{$term}%'";
			    }
			}

			$this->sql = "SELECT * FROM 
								tbl_music_properties
							WHERE
								" . implode(' OR ', $searchTermBits) . "
								AND parent_id > 0 
								";
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data)){
				foreach ($this->data as $key => $value) {
					$this->sql = "SELECT ap.prop_id, ma.*
									FROM 
										tbl_music_artist_prop ap 
									LEFT JOIN 	
										" . $this->tbl_art . " ma 
									ON 
										ap.type_id = ma.id 
									WHERE
										ap.type = 'artist' 
										AND ap.prop_id = '{$value['mp_id']}'
										AND ma.enable_profile = '1'
										AND ma.status = '1'
									ORDER BY ma.created_date DESC
										";
					$this->data = $this->fetch_rows_assoc($this->sql);
					if(!empty($this->data)){
						$this->retval = $this->data;
						foreach ($this->data as $key => $value) {

								$this->sql = "SELECT ap.prop_id, mp.mp_name, mp.mp_type 
											FROM 
												tbl_music_artist_prop ap 
											LEFT JOIN 	
												tbl_music_properties mp 
											ON 
												ap.prop_id = mp.mp_id 
											WHERE
												ap.type = 'artist' 
												AND ap.type_id = '{$value['id']}'
												";
							$this->data = $this->fetch_rows_assoc($this->sql);
							if(!empty($this->data)){
								$props = array();
								foreach ($this->data as $keyp => $valuep) {
									if($valuep['mp_type'] == 'genre')
										$props['genre'][$valuep['prop_id']] = $valuep['mp_name'];
									else if($valuep['mp_type'] == 'field')
										$props['field'][$valuep['prop_id']] = $valuep['mp_name'];
									else if($valuep['mp_type'] == 'category')
										$props['category'][$valuep['prop_id']] = $valuep['mp_name'];
									// $props[] = $valuep;
								}
								$this->retval[$key]['properties'] = $props;
							}
						}
					}
					else{
						return false; 
					}
				}
			}
			else{
				return false;
			}

			return $this->retval;
		}

		public function getArtistProfileListing(){
			$this->sql = 'SELECT a.*, (SELECT GROUP_CONCAT(mp_name) FROM ' .$this->tbl_mp.' mp JOIN tbl_music_artist_prop ap ON mp.mp_id = ap.prop_id AND mp.mp_type = "category" WHERE type_id = a.id and type="artist") categories FROM ' . $this->tbl_art . ' a WHERE a.enable_profile ="1" AND a.status = "1" ORDER BY rand(' . date("Ymd") . ') LIMIT 30';
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}

		public function rate($id, $type = 'artist')
		{
			$this->sql 	= "SELECT * FROM tbl_ratings WHERE parent_id = '$id' AND type = '{$type}'";
			$this->data = $this->fetch_rows_assoc($this->sql);
			$total = count($this->data);
			if(!empty($this->data)){
				$rate_avg = 0;
				for($i = 1; $i <= 5; $i++){
					$this->sql 	= "SELECT * FROM tbl_ratings WHERE parent_id = '$id' AND type = '{$type}' AND rate = '$i'";
					$this->data = $this->fetch_rows_assoc($this->sql);
					
				 	$num_rows = count($this->data);
				 	$rate_avg = $rate_avg + $i * $num_rows;
				}
				$rate = $rate_avg / $total;
				return array('rate' => $rate, 'total' => $total);
			}
			else{
				return false; 
			}	
			
		}

		public function add_rating($arr){
			return $this->insert($arr, 'tbl_ratings');
		}

		public function getMusicPropListingByField($term, $limit = 10){
			$this->sql = 'SELECT * FROM ' . $this->tbl_mp . ' WHERE mp_type = "' . $term . '" LIMIT ' . $limit;
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}

		public function getBanners()
		{
			$this->sql 	= 'SELECT * FROM tbl_music_banners WHERE status = "1" ORDER BY added_date DESC';
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}

		public function getPost($category = 'all', $limit = '5'){
			$query = '';
			if($category != 'all'){
				$query = ' WHERE category = "' . $category . '" AND status = 1';
			}
			else{
				$query = ' WHERE status = 1';
			}
			$this->sql 	= 'SELECT * FROM ' . $this->tbl_pst . $query . ' ORDER BY added_date DESC LIMIT ' . $limit;
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}		
		}

		public function getPostById($id){
			$this->sql = 'SELECT * FROM ' . $this->tbl_pst . ' WHERE id =' . $id . ' AND status = 1';
			$this->data = $this->fetch_row_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}
		}

		public function get_all_social_rows($type, $id){
			$this->sql 	= 'SELECT m.mp_name, s.* FROM 
							' . $this->tbl_mp  . ' m
							LEFT JOIN
							' . $this->tbl_scl . ' s 
							ON m.mp_id = s.social_id
							WHERE 
								m.mp_type = "social"
								AND field = "' . $type . '" 
								AND type_id = "' .$id. '"';
			$this->data = $this->fetch_rows_assoc($this->sql);
			if(!empty($this->data))
				return $this->data; 
			else{
				return false; 
			}		
		}

	}