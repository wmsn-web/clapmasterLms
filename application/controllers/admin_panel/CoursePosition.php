<?php
/**
 * 
 */
class CoursePosition extends CI_controller
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

	public function index()
	{
		$getAllCourse = $this->AdminModel->getAllCourse();
		$getCrsByPosition = $this->AdminModel->getCrsByPosition();
		//print_r($getCrsByPosition);
		$this->load->view("admin/CoursePosition",["crsData"=>$getAllCourse,"crsPos"=>$getCrsByPosition]);
	}

	public function setPosition()
	{
		$crsId = $this->input->post("crsId");
		$curPosition = $this->input->post("curPosition");
		$oldPosition = $this->input->post("oldPosition");


		$this->db->where("position",$curPosition);
		$getCrs = $this->db->get("courses");
		if($getCrs->num_rows()==0)
		{

		}
		else
		{
			$row = $getCrs->row();
			$oldCrs = $row->crs_id;
			$this->db->where("crs_id",$oldCrs);
			$this->db->update("courses",["position"=>$oldPosition]);
		}

			$this->db->where("crs_id",$crsId);
			$this->db->update("courses",["position"=>$curPosition]);
		//echo "ok";
	}
}