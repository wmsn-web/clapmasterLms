<?php
/**
 * 
 */
class VideoPlay extends CI_controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("AdminModel");
		if(!$this->session->userdata("UserAdmin"))
		{
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			return redirect("admin_panel/AdminLogin?refer=$actual_link");
		
		}
	}
	public function index($vidId)
	{
		
		$this->db->where("vid_id",$vidId);
		$get = $this->db->get("chap_videos")->num_rows();
		if($get == 0)
		{
			return redirect("admin_panel/AllCourses");
			//echo $get;
		}
		else
		{
			$getVidById = $this->AdminModel->getVidById($vidId);
			//echo "<pre>";
			//print_r($getVidById);
			$this->load->view("admin/playVideo",["data"=>$getVidById]);
		}
	}
}