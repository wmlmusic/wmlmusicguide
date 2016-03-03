<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */

	include_once('class.database.php');

	class Category extends Database {
		private $sql	= NULL;
		public $retval 	= array();
		private $tblname = 'tbl_dir_categories';

	}
