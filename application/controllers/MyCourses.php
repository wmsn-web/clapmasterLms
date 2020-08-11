<?php
/**
 * 
 */
class MyCourses extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("ClientId"))
		{
			$back = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			return redirect("Login/index/?backUrl=".urlencode($back));
		}
	}

	public function index()
	{
		$userId = $this->session->userdata("ClientId");
		$getMyCourses = $this->SiteModel->getMyCourses($userId);
		//echo "<pre>";
		//print_r($getMyCourses);
		$this->load->view("MyVideosNew",["allData"=>$getMyCourses]);
	}

	public function levelVideos($id)
	{
		$userId = $this->session->userdata("ClientId");
		$getMyCourses = $this->SiteModel->getMyCourses($userId);
		$getVideoById = $this->SiteModel->getVideoById($id);
		//echo "<pre>";
		//print_r($getVideoById);
		$this->load->view("MyVideos",["allData"=>$getMyCourses,"vidData"=>$getVideoById]);
	}

	public function courseVideos($id)
	{
		$userId = $this->session->userdata("ClientId");
		$getMyCourses = $this->SiteModel->getMyCourses($userId);
		$getVideoById = $this->SiteModel->getVideoById($id);
		//print_r($getVideoById);
		$this->load->view("MyVideos",["allData"=>$getMyCourses,"vidData"=>$getVideoById]);
	}
}