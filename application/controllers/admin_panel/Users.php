<?php
/**
 * 
 */
class Users extends CI_controller
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
		$getAllUsers = $this->AdminModel->getAllUsers();
		$this->load->view("admin/Users",["allData"=>$getAllUsers]);
	}

	public function userDetails($id)
	{
		$userId = $id;
		$getPurchsedData = $this->AdminModel->getPurchsedData($userId);
		$getUsersById = $this->AdminModel->getUsersById($userId);
		$getAnaly = $this->AdminModel->getAnaly($userId);
		//$this->load->view("admin/userDetails",["prchsData"=>$getPurchsedData,"gtUser"=>$getUsersById]);
		echo "<pre>";
		print_r($getPurchsedData);
	}
}