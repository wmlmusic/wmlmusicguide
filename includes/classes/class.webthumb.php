<?php 
/**
 *
 * This class generates thumbnail of any URL with the help of WebThumb API created by Joshua Eichorn
 *
 * @package 		WebThumb
 * @author 		Hasin Hayder [http://hasin.wordpress.com]
 * @copyright 	LGPL
 * @example 		usage.php
 * @since 		3rd September, 2006
 */
class WebThumb
{
	private $_api;
	private $_request_uri = "http://webthumb.bluga.net/api.php";

	/**
	 * just constructor
	 *
	 * @param string $api the api key from webthumb.com
	 */
	public function __construct($api=null)
	{
		$this->_api = $api;
	}

	/**
	 * manually enter the api key
	 *
	 * @param string $api the api key from webthumb.com
	 */
	public function setApi($api)
	{
		$this->_api = $api;
	}

	/**
	 * request a thumbnail
	 *
	 * @param string $url if you want to make thumbnail of a single URL, specifcy it here
	 * @param integer $width optional width of the thumbnail
	 * @param integer $height optional height of the thumbnail
	 * @return string JobStatus with id, estimated time, starting time and url of the job
	 */
	public function requestThumbnail($url = "", $width= "", $height = "")
	{

		$requests = "<url>{$url}</url>";
		if (!empty($height))
			$requests .= "<height>{$height}</height>";
		if (!empty($width))
			$requests .= "<width>{$width}</width>";
			$requests .="<fullthumb>1</fullthumb>";
			#$requests .="<customthumbnail width='1200' height='2240' />";
		$requests = "<request>".$requests."</request>";

		$_request = "<webthumb>
						 	<apikey>{$this->_api}</apikey>
						 	{$requests}
							
						 </webthumb>";

		#header('Content-Type: application/xml');
		
		#echo $_request;
		#exit;


		$_response = $this->_executeCurlRequest($_request);
		#echo $_response;
		#exit;
		
		$_sxml = simplexml_load_string($_response);

		$_jobs = array();
		foreach($_sxml->jobs->job as $job)
		{
			$_job = array("id"=>$job."",
			"estimate"=>$job['estimate']."",
			"time"=>$job['time']."",
			"url"=>$job['url']."");
			$_jobs[] = $_job;
		}
		return $_jobs;

	}

	/**
	 * return job status of a finished job
	 *
	 * @param string $job_id the job id returned by requestThumbnail() method
	 * @return array JobStatus with id, submissionTime, browserHeight, browserWidth, download URL, status and completionTime
	 */
	public function requestStatus($job_id)
	{
		$_request = "<webthumb>
							 <apikey>{$this->_api}</apikey>
							 <status>
							 	<job>{$job_id}</job>
							 </status>
						 </webthumb>";
		$_response = $this->_executeCurlRequest($_request);
		$_sxml = simplexml_load_string($_response);
		$status = $_sxml->jobStatus->status;
		$_status = array("id"=>$status['id']."",
		"submissionTime"=>$status['submissionTime']."",
		"browserWidth"=>$status['browserWidth']."",
		"browserHeight"=>$status['browserHeight']."",
		"pickup"=>$status['pickup']."",
		"status"=>$status."",
		"completionTime"=>$status['completionTime']."");
		return $_status;
	}

	/**
	 * return the thumbnail in preferred size.
	 *
	 * @param string $job_id the job id returned by requestThumbnail() method
	 * @param string $size it could be either of five types, "small","medium","medium2","large" and "zip"
	 * @return binarry data
	 */
	public function getThumbnail($job_id, $size)
	{
		$_request = "<webthumb>
							 <apikey>{$this->_api}</apikey>
							 <fetch>
								<job>{$job_id}</job>
								<size>{$size}</size>
							 </fetch>
						 </webthumb>";	

		$_response = $this->_executeCurlRequest($_request);
		return $_response;
	}

	/**
	 * execute each request via CURL
	 *
	 * @access private
	 * @param string $request Request in XML Format
	 * @return string Response in XML Format
	 */
	private function _executeCurlRequest($request)
	{
		$_session = curl_init();
		curl_setopt($_session, CURLOPT_URL, $this->_request_uri); // set url to post to
		curl_setopt ($_session, CURLOPT_POST, 1);
		curl_setopt ($_session, CURLOPT_POSTFIELDS, $request);
		curl_setopt($_session, CURLOPT_HTTPHEADER, array( 'Content-Type: application/xml'));
		curl_setopt($_session, CURLOPT_RETURNTRANSFER, true);
		$_response = curl_exec($_session);
		return $_response;
	}

}
?>