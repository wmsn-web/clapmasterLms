<?php
/**
 * 
 */
class PlayVideo extends CI_controller
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
	public function play($plans,$id)
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		$checkPlayVideoId = $this->SiteModel->checkPlayVideoId($id);
		$userId = $this->session->userdata("ClientId");
		if($checkPlayVideoId == 0)
		{
			
			return redirect("MyCourses");
		}
		else
		{
			$getMainVideo = $this->SiteModel->getMainVideo($id,$userId);
			$getSimilr = $this->SiteModel->getSimilr($plans,$id,$userId);
			$getComments = $this->SiteModel->getComments($id,$userId);
			$setAnalysis = $this->SiteModel->setAnalysis($id,$userId,$ip,$date);
			//echo "<pre>";
			//print_r($getComments);
			$this->load->view("player",["mnVid"=>$getMainVideo,"similrData"=>$getSimilr,"comData"=>$getComments]);
		}
	}

	public function viewers()
	{
		$vid_id = $this->input->post("vid_id");
		$userId = $this->session->userdata("ClientId");
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		$setvideoViews = $this->SiteModel->setvideoViews($userId,$vid_id,$date);
	}

	public function likes()
	{
		$vid_id = $this->input->post("vid_id");
		$userId = $this->session->userdata("ClientId");
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		$setLikes = $this->SiteModel->setLikes($userId,$vid_id,$date);
		echo $setLikes; 
	}

	public function getLikes()
	{
		$vid_id = $this->input->post("vid_id");
		$userId = $this->session->userdata("ClientId");
		$getlikes = $this->SiteModel->getlikes($vid_id);
		echo json_encode($getlikes);
	}

	public function setDisLikes()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		$vid_id = $this->input->post("vid_id");
		$userId = $this->session->userdata("ClientId");
		$setdisLikes = $this->SiteModel->setdisLikes($userId,$vid_id,$date);
		echo $setdisLikes;
	}
	public function postComments()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		$vid_id = $this->input->post("vid_id");
		$textCom = $this->input->post("textCom");
		$rates = $this->input->post("rates");
		$userId = $this->session->userdata("ClientId");
		$setComments = $this->SiteModel->setComments($userId,$vid_id,$textCom,$date,$rates);
		echo $setComments;
	}

	public function updAnalysis()
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		$userId = $this->session->userdata("ClientId");
		$vid_id = $this->input->post("vid_id");
		$sec = $this->input->post("sec");

		$updateAnalysis = $this->SiteModel->updateAnalysis($vid_id,$userId,$ip,$date,$sec);
		echo $updateAnalysis;
	}
}