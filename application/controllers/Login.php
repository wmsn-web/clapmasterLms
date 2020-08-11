<?php
class Login extends CI_controller
{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata("ClientId"))
		{
			return redirect("Home");
		}
	}

	public function index()
	{
		$back = $_GET['backUrl'];
		$this->load->view("Login"); 
	}
}