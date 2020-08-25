<?php
/**
 * 
 */
class AddCourse extends CI_controller
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
		if($this->uri->segment(4)=="edit")
		{
			$id = $this->uri->segment(5);
			$getCourseById = $this->AdminModel->getCourseById($id);
			
			$this->load->view("admin/AddCourse",["data"=>$getCourseById]);
		}else
		{
			$this->load->view("admin/AddCourse");
		}  

	}

	public function addCrs()
	{
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$crsId =  substr(str_shuffle($permitted_chars), 0, 10);
		$course_name = htmlentities($this->input->post("course_name"));
		$descr = htmlentities($this->input->post("course_desc"));
		$setCourse = $this->AdminModel->setCourse($crsId,$course_name,$descr);
		if($setCourse == "succ")
		{
			$this->session->set_flashdata("Feed","Course Successfully Added");
			return redirect("admin_panel/AddCourse");
		}else
		{
			$this->session->set_flashdata("Feed","Course Already Exist!");
			return redirect("admin_panel/AddCourse");
		}
	}

	public function editCrs($id)
	{
		$course_name = htmlentities($this->input->post("course_name"));
		$descr = htmlentities($this->input->post("course_desc"));
		$updtCourse = $this->AdminModel->updtCourse($id,$course_name,$descr);

		$this->session->set_flashdata("Feed","Course Successfully Updated");
			return redirect("admin_panel/AllCourses");
	}

	public function delCrs($id)
	{
		$this->db->where("crs_id",$id);
		$this->db->delete("courses");
		$this->session->set_flashdata("Feed","Course Deleted!");
			return redirect("admin_panel/AllCourses");
	}
	
}