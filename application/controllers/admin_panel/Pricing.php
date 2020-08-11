<?php
class Pricing extends CI_controller
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
		$this->load->view("admin/Pricing",["data"=>$getAllCourse]);
		//echo "<pre>";
		//print_r($getAllCourse);
	}

	public function setPrice()
	{
		$id = $this->input->post("id");
		$price = $this->input->post("price");
		$target = $this->input->post("target");
		
		$setPriceChap = $this->AdminModel->setPriceChap($id,$price,$target);
		
	}

	public function setDiscount()
	{
		$id = $this->input->post("id");
		$discount = $this->input->post("discount");
		$setDiscountChap = $this->AdminModel->setDiscountChap($id,$discount);
	}
}