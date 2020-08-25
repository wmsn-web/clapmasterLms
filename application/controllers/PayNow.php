<?php
/**
 * 
 */
class PayNow extends CI_controller
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

	public function secure()
	{
		$userId = $this->session->userdata("ClientId");

		//$cartById = $this->SiteModel->cartById($id,$userId);
		$getCartToPay = $this->SiteModel->getCartToPay($userId);
		$getUser = $this->SiteModel->getUserDetails($userId);
		//echo "<pre>";
		//print_r($cartById);
		
		$this->load->view("PayNow",["cart"=>$getCartToPay,"user"=>$getUser]);

	}
	public function renew()
	{
		$userId = $this->session->userdata("ClientId");

		//$cartById = $this->SiteModel->cartById($id,$userId);
		$getCartToPay = $this->SiteModel->getCartToPayRenew($userId);
		$getUser = $this->SiteModel->getUserDetails($userId);
		//echo "<pre>";
		//print_r($cartById);
		
		$this->load->view("PayNow",["cart"=>$getCartToPay,"user"=>$getUser]);

	}
}