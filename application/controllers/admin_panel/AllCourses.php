<?php
/**
 * 
 */
class AllCourses extends CI_controller
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

	function index()
	{
		$getAllCourse = $this->AdminModel->getAllCourse();
		//echo "<pre>";
		//print_r($getAllCourse);
		$this->load->view("admin/AllCourses",["data"=>$getAllCourse]);
	}

	public function addChapter()
	{
		$chapName = $this->input->post("chapName");
		$crsId = $this->input->post("crsId");
		$position = $this->input->post("position");
		$price = $this->input->post("price");
		$descr = $this->input->post("descr");
		$setChapter = $this->AdminModel->setChapter($crsId,$chapName,$position,$price,$descr);
		if($setChapter=="succ")
		{
			$this->session->set_flashdata("Feed","Chapter Successfully Added");
			return redirect("admin_panel/AllCourses");
		}elseif($setChapter=="exst")
		{
			$this->session->set_flashdata("Feed","Chapter Already Exist!");
			return redirect("admin_panel/AllCourses");
		}
		elseif($setChapter=="exstP")
		{
			$this->session->set_flashdata("Feed","Change Chapter Position");
			return redirect("admin_panel/AllCourses");
		}else{$this->session->set_flashdata("Feed","Database Error");
			return redirect("admin_panel/AllCourses");}
	}
	public function delChap($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("chapters");
		$this->session->set_flashdata("Feed","Chapter Deleted!");
			return redirect("admin_panel/AllCourses");
	}

	public function publish($id)
	{
		$this->db->where("crs_id",$id);
		$get = $this->db->get("courses")->row();
		if($get->stat == 0):
			$this->db->where("crs_id",$id);
			$this->db->update("courses",["stat"=>1]);
		else:
			$this->db->where("crs_id",$id);
			$this->db->update("courses",["stat"=>0]);
		endif;
		return redirect("admin_panel/AllCourses");
	}
}