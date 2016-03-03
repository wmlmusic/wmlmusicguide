<?php 
class Database{
	private $links;	#Database Connection Link
	private $username = 'wmldatabase';
	private $password = 'Worlddata14!';
	private $database = 'wmldatabase';
	private $hostname = 'localhost';
	
	private $resultset = NULL; #Database Result Recordset link
	private $sql	   = NULL; #SQL Query
	private $rows	   = NULL; #Stores the rows for the resultset
	public $data	   = NULL;
	
	#var myReplacements = new Array();
	#var myCode, intReplacement;

 
	public function __construct() {
		$this->username = $_SERVER['SERVER_ADDR'] == '127.0.0.1' ? 'root' : $this->username;
		$this->password = $_SERVER['SERVER_ADDR'] == '127.0.0.1' ? '' : $this->password;
		$this->links = mysql_connect($this->hostname,$this->username,$this->password) or die('Not Connected ..............') ;
		if(!($this->links)) {
			//throw new DatabaseConnectionException("Error Connecting to the Database".mysql_error(),"101");
		}
		else {
			mysql_select_db($this->database);
		}
	}
 
	public function __destruct() {
		@mysql_close($this->links);
	}
 
	public function query($query) {
		
		
		$this->sql = "SET NAMES 'utf8'";
		mysql_query($this->sql);
		
		$this->sql = utf8_encode($query);
	 	return mysql_query($this->sql);
	}
	
	public function insert_id() {
		return mysql_insert_id();
	}

	public function affected_rows() {
		return mysql_affected_rows($this->links);
	}	
	
	public function insert(array $data,$table) {
		
		$this->sql = 'INSERT INTO '.$table.' SET ';
	
		foreach ($data as $fields => $values) {
			$this->sql .= $fields .'="'.mysql_real_escape_string($this->removeMSWordChars($values)).'" ,';
		}
		$this->sql = substr($this->sql,0,-1);
		
	#	echo $this->sql;die;
	
		$this->query($this->sql);
		
		return $this->insert_id();
	}
	
	public function udpate($id,array $data,$table) {

		if ($id == null)
			die('query error udpate');
	
	
		$this->sql = 'UPDATE  '.$table.' SET ';
		
		foreach ($data as $fields => $values) {
			$this->sql .= $fields .'="'.mysql_real_escape_string($this->removeMSWordChars($values)).'" , ';
		}
		$this->sql = substr($this->sql,0,-2);
		if(is_array($id)){
			$field = $id[0];
			$value = $id[1];
			$this->sql .= ' WHERE ' . $field . ' = '.$value;
		}
		else{
			$this->sql .= ' WHERE id ='.$id;
		}
		// echo $this->sql;exit;
		$rs = $this->query($this->sql);
		
		return $this->affected_rows();

	}
	public function delete($id,$table) {
		if ($id == null)
			die('query error delete');
			
		$this->sql = 'DELETE FROM '.$table.' WHERE id='.$id;
		$this->query($this->sql);
		return $this->affected_rows();
	}
	
	public function delete_sub($field,$table) {
		if ($field == null)
			die('query error delete');
			
		$this->sql = 'DELETE FROM '.$table.' WHERE product="'.$field.'"';
		//echo $this->sql; die;
		$this->query($this->sql);
		return $this->affected_rows();
	}
		
	public function delete_all($table) {
		$this->sql = 'DELETE FROM '.$table;
		$this->query($this->sql);
		return $this->affected_rows();
	}	
	
	public function get($id,$table){
		if ($id == null)
			die('query error in select');
			
		$this->sql	= 'SELECT * FROM '.$table.' WHERE id ='.$id;
		$this->resultset = $this->query($this->sql);
		return $this->fetch_rows_assoc($this->resultset);	
	
	}
	
	
	
	public function get_all($table){
		$this->sql	= 'SELECT * FROM '.$table;
		$this->resultset = $this->query($this->sql);
		return $this->fetch_rows_assoc($this->resultset);	
	
	}		

	public function fetch_rows($result) {
		$row = array();
		$this->data = NULL;
		$this->resultset = $this->query($sql);
		
		if($this->resultset) {
			while($row = mysql_fetch_array($this->resultset)) {
				$this->data[] = $row;
			}
		}
		else {
			//throw new RetrieveRecordsException("Error Retrieving Records".mysql_error(),"102");
			$this->data = null;
		}
		return $this->data;
	}	
	public function fetch_row_assoc($sql) {
	$this->data = NULL;
		$this->resultset = $this->query($sql);
		$row = array();
		if($this->resultset) {
			$this->data = mysql_fetch_assoc($this->resultset) ;
		}
		else {
			//throw new RetrieveRecordsException("Error Retrieving Records".mysql_error(),"102");
			$this->data = null;
		}
		return $this->data;
	}		
	
	public function fetch_rows_assoc($sql) {
	$this->data = NULL;
		$this->resultset = $this->query($sql);
		$row = array();
		if($this->resultset) {
			while($row = mysql_fetch_assoc($this->resultset)) {
				$this->data[] = $row;
			}
		}
		else {
			//throw new RetrieveRecordsException("Error Retrieving Records".mysql_error(),"102");
			$this->data = null;
		}
		return $this->data;
	}	


	private	function removeMSWordChars($text) {
	
	$text = str_replace(
				 array("\xe2\x80\x98", "\xe2\x80\x99", "\xe2\x80\x9c", "\xe2\x80\x9d", "\xe2\x80\x93", "\xe2\x80\x94", "\xe2\x80\xa6"),
				 array("'", "'", '"', '"', '-', '--', '...'),
			$text);

	// Next, replace their Windows-1252 equivalents.
	 $text = str_replace(
				 array(chr(145), chr(146), chr(147), chr(148), chr(150), chr(151), chr(133)),
				 array("'", "'", '"', '"', '-', '--', '...'),
				 $text
			);
	
	
		return $text;
	}

}
 
 
?>