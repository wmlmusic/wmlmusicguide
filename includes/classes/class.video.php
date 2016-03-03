<?php
/*
0741d51429cb184b0e3fb5e9e9e1b3f2:ayd01m9k
  * Customer Class Developed By Mukesh Rai
  * for http://www.elrada.com
  *	
  	Copyright (c) 2011- 2012 elrada.com
*/


#include('array2xml.php');
include_once('class.database.php');

class Vedios extends Database {

	#private $data 			= array();
	private $sql 			= null;
	
	public $message 			= null;
	public $customer_password  = null;
	


  /*
   * To Register Customer and Login Using Bruhman API:
   *
   *
   * @data       Customer Data information
   * 
   * 
   */


	public function __construct() {
		parent::__construct();
	}
	
	public function edit_url($abc)
		{
		if($num=strpos($abc,"embed/"))
		{
		//echo $num;
		$myvar=explode('/embed/',$abc);
	//	echo $myvar;
		$myvar1=explode('"',$myvar[1]);
		//$myvar1=str_split($myvar,10);
		//echo $myvar1;
		return $myvar1[0];
		
		}
		
		elseif($num=strpos($abc,"/youtu.be/"))
		{
		$str =explode(".be/",$abc);
		return $str[1];
		}
		elseif($num=strpos($abc,"www.youtube.com"))
		{
		$var=explode("v=",$abc);
		return $var[1];
		}
		else
		{
		$message="Wrong URL";
		return $data['address']=="";
		}
		}
		/* $num = strpos($url,"www.youtube.com/");
		echo $url;
		exit;
		//echo $num;
		if($num>-1){
			$string = "http://www.youtube.com/embed/";
			if(strpos($url,$string)>-1){
				return $url;
			}
			else{
				$pieces = explode("v=", $url);
				$piece = explode("&",$pieces[1]);
				$string.=$piece[0];
				return $string;
			}
		}
		else{
		return "false";
		}
 */	
	
	public function update_page($arr){

		return $this->udpate($arr['id'],$arr,'video');
		
	}
	
	public function get_address(){
		$this->sql = 'SELECT * FROM video WHERE id =1';
			$this->data = $this->fetch_row_assoc($this->sql);
		if(!empty($this->data))
			return $this->data; 
		else{
			return false; 
		}
	}

	
}
