<?php
/**
 * 
 */
class SearchResult extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$vid_id = $this->uri->segment(3);
		$getRes = $this->SiteModel->getRes($vid_id);
		//echo "<pre>";
		//print_r($getRes);
		$this->load->view("SearchResult",["data"=>$getRes]);
	}

	public function adcart($vid_id,$price,$crs,$chp) 
	{
		$userId = $this->session->userdata("ClientId");
		$cat_value = "basic_1_".$vid_id;
		$orderid = "ord_".mt_rand(00000000,99999999); 
		$plan = "basic";
		$category = "basic";
		 $data = array
		 			(
		 				"userid"=>$userId,
		 				"course_name"=>$crs,
		 				"chap_name"=>$chp,
		 				"cat_value"=>$cat_value,
		 				"order_id"=> $orderid,
		 				"plan"=>$plan,
		 				"category"=>$category,
		 				"cat_id"=>$vid_id,
		 				"price"=>$price

		 			);
		 $this->db->where(["userid"=>$userId,
		 				"course_name"=>$crs,
		 				"chap_name"=>$chp,
		 				"cat_value"=>$cat_value]);
		 $gt = $this->db->get("cart")->num_rows();
		 if($gt == 0)
		 {
		 	$this->db->insert("cart",$data);
		 	return redirect("MyCart");
		 }
		 else
		 {
		 	return redirect("MyCart");
		 }


	}

	public function renn($vid_id,$price,$crs,$chp)
	{
		$notes = "Renew";
		$userId = $this->session->userdata("ClientId");
		$cat_value = "basic_1_".$vid_id;
		$orderid = "ord_".mt_rand(00000000,99999999); 
		$plan = "basic";
		$category = "basic";
		 $data = array
		 			(
		 				"userid"=>$userId,
		 				"course_name"=>$crs,
		 				"chap_name"=>$chp,
		 				"cat_value"=>$cat_value,
		 				"order_id"=> $orderid,
		 				"plan"=>$plan,
		 				"category"=>$category,
		 				"cat_id"=>$vid_id,
		 				"price"=>$price,
		 				"notes"=>$notes

		 			);
		 $this->db->where(["userid"=>$userId,
		 				"course_name"=>$crs,
		 				"chap_name"=>$chp,
		 				"cat_value"=>$cat_value]);
		 $gt = $this->db->get("cart")->num_rows();
		 if($gt == 0)
		 {
		 	$this->db->insert("transactions_renew",$data);
		 	return redirect("MyRenewCart");
		 }
		 else
		 {
		 	return redirect("MyRenewCart");
		 }
	}
}