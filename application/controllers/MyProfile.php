<?php
class MyProfile extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata("ClientId"))
		{
			$back = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			return redirect("Login/index/?backUrl=".urlencode($back));
		}
	}
	public function index()
	{
		$userId = $this->session->userdata("ClientId");
		$getUser = $this->SiteModel->getUserDetails($userId);
		$getStates = $this->SiteModel->getStates();
		$this->load->view("MyProfile",["data"=>$getUser,"states"=>$getStates]);
	}

	public function updateUser()
	{
		$userId = $this->session->userdata("ClientId");
		$name = $this->input->post("name");
		$mobile = $this->input->post("mobile");
		$city = $this->input->post("city");
		$state = $this->input->post("state");
		$pin = $this->input->post("pin");

		$data = array
					(
						"name"=>$name,
						"mobile"=>$mobile,
						"city"=>$city,
						"state"=>$state,
						"pin"=>$pin
					);
		$this->db->where("id",$userId);
		$this->db->update("users_profile",$data);
		$this->session->set_flashdata("Feed","Profile Saved");
		return redirect("MyProfile");
	}
	public function chpass()
	{
		$userId = $this->session->userdata("ClientId");
		$pass = $this->input->post("pass");
		$oldpass = $this->input->post("oldpas");

		$this->db->where("id",$userId);
		$get = $this->db->get("users_profile")->row();
		if(password_verify($oldpass, $get->password))
		{
			$newpass = password_hash($pass, PASSWORD_DEFAULT);
			$this->db->where("id",$userId);
			$this->db->update("users_profile",["password"=>$newpass]);
			$this->session->unset_userdata("ClientId");
			echo "done";
		}
		else
		{
			echo "No";
		}
	}
}