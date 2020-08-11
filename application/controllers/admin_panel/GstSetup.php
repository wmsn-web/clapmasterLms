<?php
/**
 * 
 */
class GstSetup extends CI_controller
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
		$getCompGst = $this->AdminModel->getCompGst();
		$this->load->view('admin/GstSetup',["data"=>$getCompGst]);
	}

	public function updateGst()
	{
		$comp = $this->input->post("comp");
		$address = htmlentities($this->input->post("address"));
		$gstin = $this->input->post("gstin");
		$prcnt = $this->input->post("prcnt");

		$data = array
					(
						"comp_name"=>$comp,
						"address"=>$address,
						"gstin"=>$gstin,
						"percents"=>$prcnt
					);
		$this->db->update("tax_setup",$data);
		$this->session->set_flashdata("Feed","Detail Successfully Updated!");
			return redirect("admin_panel/GstSetup");
	}
}