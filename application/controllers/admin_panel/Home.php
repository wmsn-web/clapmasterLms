<?php
/**
 * 
 */
class Home extends CI_controller
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
		
		$this->load->view("admin/AdminHome"); 

	}
	function dashboard()
	{
		
		$this->load->view("admin/AdminHome"); 
	}

	function logout()
	{
		$this->session->unset_userdata("UserAdmin");
		$this->session->set_flashdata("Feed","You have Successfully Logged out. Login Again.");
		return redirect("admin_panel/AdminLogin");
	}
}