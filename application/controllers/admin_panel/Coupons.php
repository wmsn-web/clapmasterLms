<?php
/**
 * 
 */
class Coupons extends CI_controller
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
		$getCoupons = $this->AdminModel->getCoupons();
		$this->load->view("admin/Coupons",["data"=>$getCoupons]);
	}

	public function addCpn()
	{
		$code = $this->input->post("coupon");
		$discount = $this->input->post("discount");
		$valid = $this->input->post("valid");
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		$setCoupon = $this->AdminModel->setCoupon($code,$discount,$valid,$date);
		if($setCoupon == "succ")
		{
			$this->session->set_flashdata("Feed","Coupons Successfully Added!");
			return redirect("admin_panel/Coupons");
		}
		else
		{
			$this->session->set_flashdata("Feed","Coupons Exists!");
			return redirect("admin_panel/Coupons");
		}

	}

	public function delCpn($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("coupons");
		$this->session->set_flashdata("Feed","Coupons Deleted!");
			return redirect("admin_panel/Coupons");
	}
}