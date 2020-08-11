<?php 
/**
 * 
 */
class AddCategory extends CI_controller
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
		if($this->uri->segment(4)=="edit")
		{
			$id = $this->uri->segment(5);
			$getCatById = $this->AdminModel->getCatById($id);
			$this->load->view("admin/AddCategory",["data"=>$getCatById]);
		}else
		{
			$this->load->view("admin/AddCategory");
		}
	}

	public function addCat()
	{
		$cat_name = $this->input->post("cat_name");
		$insrtCat = $this->AdminModel->insrtCat($cat_name);
		if($insrtCat == "exst")
		{
			$this->session->set_flashdata("Feed","Categoty Name ".$cat_name." Alresdy Exist!");
			return redirect("admin_panel/AddCategory");
		}
		elseif($insrtCat == "succ")
		{
			$this->session->set_flashdata("Feed","Categoty Name ".$cat_name." Added Successfully");
			return redirect("admin_panel/AddCategory");
		}
		else
		{
			$this->session->set_flashdata("Feed","Database Error");
			return redirect("admin_panel/AddCategory");
		}
	}

	public function editCat($id)
	{
		$cat_name = $this->input->post("cat_name");
		$updateCat = $this->AdminModel->updateCat($cat_name,$id);
		if($updateCat == "succ")
		{
			$this->session->set_flashdata("Feed","Categoty Name ".$cat_name." Updated Successfully");
			return redirect("admin_panel/AllCategory");
		}
		else
		{
			$this->session->set_flashdata("Feed","Database Error");
			return redirect("admin_panel/AllCategory");
		}

	}

	function delCat($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("category");
		$this->session->set_flashdata("Feed","Categoty Deleted");
		return redirect("admin_panel/AllCategory");
	}
}