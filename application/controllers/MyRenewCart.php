<?php
/**
 * 
 */
class MyRenewCart extends CI_controller
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
		$getMyCart = $this->SiteModel->getMyRenewCart($userId);
		$getUser = $this->SiteModel->getUserDetails($userId);
		$totBalance = $this->SiteModel->cartRenewBalance($userId);
		$txDetails = $this->SiteModel->txDetails();
		$this->load->view("MyRenewCart",["cartData"=>$getMyCart,"userData"=>$getUser,"totBalance"=>$totBalance,"txDetails"=>$txDetails]);
	}
}
