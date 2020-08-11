<?php
/**
 * 
 */
class ChangePassword extends CI_controller
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
		$this->load->view("admin/ChangePassword");
	}

	public function chng()
	{
		$admin = $this->session->userdata("UserAdmin");
		$old_pass = $this->input->post("old_pass");
		$password = $this->input->post("new_pass");
		$new_passd = $password;
		$changPass = $this->AdminModel->changPass($old_pass,$new_passd,$admin);
		//echo $changPass;
		
		if($changPass == "old")
		{
			$this->session->set_flashdata("Feed","Invalid Old Password");
			return redirect("admin_panel/ChangePassword");
		}
		else
		{
			$this->session->set_flashdata("Feed","Password Change Successfully");
			$this->session->unset_userdata("UserAdmin");
			return redirect("admin_panel/ChangePassword");
		}
		
	}
}