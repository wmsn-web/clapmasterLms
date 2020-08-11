<?php
/**
 * 
 */
class SuperAdmins extends CI_controller
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
		$getSuperAdmin = $this->AdminModel->getSuperAdmin();
		$this->load->view("admin/SuperAdmin",["data"=>$getSuperAdmin]);
	}

	public function AddAdmin()
	{
		
		//print_r($getSuperAdmin);
		$this->load->view("admin/AddAdmin");
	}

	public function regAdmin()
	{
		$user = $this->input->post("user");
		$email = $this->input->post("email");
		$mobile = $this->input->post("mobile");
		$password = $this->input->post("password");
		$pass = password_hash($password, PASSWORD_DEFAULT);
		$setSuperAdmin = $this->AdminModel->setSuperAdmin($user,$email,$mobile,$pass);
		if($setSuperAdmin == "exstUser")
		{
			$this->session->set_flashdata("err","Username Already Exist!");
			return redirect("admin_panel/SuperAdmins/AddAdmin");
		}
		elseif($setSuperAdmin == "exstEmail")
		{
			$this->session->set_flashdata("err","Email Address Already Registered!");
			return redirect("admin_panel/SuperAdmins/AddAdmin");
		}
		elseif($setSuperAdmin == "exstMob")
		{
			$this->session->set_flashdata("err","Mobile Number Already Registered!");
			return redirect("admin_panel/SuperAdmins/AddAdmin");
		}
		elseif($setSuperAdmin == "succ")
		{
			$this->session->set_flashdata("Feed","Super Admin Successfully Registered");
			return redirect("admin_panel/SuperAdmins/AddAdmin");
		}
		else
		{
			$this->session->set_flashdata("err","Database Error!");
			return redirect("admin_panel/SuperAdmins/AddAdmin");
		}

	}

	public function gtUser()
	{
		$id = $this->input->post("id");
		$gtUser = $this->AdminModel->gtUserAdmin($id);
		//echo "hello";
		echo json_encode($gtUser);
	}

	public function update()
	{
		$user = $this->input->post("user");
		$email = $this->input->post("email");
		$mobile = $this->input->post("mobile");
		$updtSuperAdmin = $this->AdminModel->UpdateSuperAdmin($user,$email,$mobile);

		if($updtSuperAdmin == "exstEmail")
		{
			$this->session->set_flashdata("Feed","Email Address Already Registered!");
			return redirect("admin_panel/SuperAdmins");
		}
		elseif($updtSuperAdmin == "exstMob")
		{
			$this->session->set_flashdata("Feed","Mobile Number Already Registered!");
			return redirect("admin_panel/SuperAdmins");
		}
		elseif($updtSuperAdmin == "succ")
		{
			$this->session->set_flashdata("Feed","Super Admin Successfully Updated");
			return redirect("admin_panel/SuperAdmins");
		}
		else
		{
			$this->session->set_flashdata("Feed","Database Error!");
			return redirect("admin_panel/SuperAdmins");
		}
	}

	public function updatePass()
	{
		$user = $this->input->post("user");
		$password = $this->input->post("password");
		$pass = password_hash($password, PASSWORD_DEFAULT);
		$this->db->where("admin_user",$user);
		$this->db->update("admin",["password"=>$pass]);
		$this->session->set_flashdata("Feed","Password Changed");
			return redirect("admin_panel/SuperAdmins");
	}

	public function delUser($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("admin");
		$this->session->set_flashdata("Feed","Super Admin Deleted");
			return redirect("admin_panel/SuperAdmins");
	}
}