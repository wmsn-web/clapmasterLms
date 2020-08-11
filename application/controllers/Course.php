<?php
/**
 * 
 */
class Course extends CI_controller 
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function viewCourse($crsId)
	{
		$getDataMenu = $this->SiteModel->getDataMenu($crsId); 
		$getExtraData = $this->SiteModel->getExtraData($crsId); 
		if($this->session->userdata("ClientId"))
		{
			$userId = $this->session->userdata("ClientId");
			$getUser = $this->SiteModel->getUserDetails($userId);
			//print_r($getUser);
			$this->load->view("viewCourseNew",["menuData"=>$getDataMenu,"userData"=>$getUser,"extData"=>$getExtraData]);
		}
		else
		{
			$this->load->view("viewCourseNew",["menuData"=>$getDataMenu,"extData"=>$getExtraData]);
		}
		//echo "<pre>";
		//print_r($getDataMenu);
		//$this->load->view("test");
	}

	public function getChapdtls()
		{
			$chapId = $this->input->post("id");
			$getPreviews = $this->SiteModel->getPreviews($chapId);
			echo json_encode($getPreviews);
		}

	public function setCart()
	{
		
		$userId = $this->session->userdata("ClientId");
		$category = $this->input->post("category");
		$cat_value = $this->input->post("cat_value");
		$category = $this->input->post("category");
		$plan = $this->input->post("plan");
		$price = $this->input->post("price");
		$orderid = $this->input->post("orderid");
		$catValue = $this->input->post("catValue");
		$course_name = $this->input->post("course_name");
		$chapName = $this->input->post("chapName");
		$date = date('Y-m-d H:i:s');
		
		
		$addcart = $this->SiteModel->addCart($userId,$catValue,$orderid,$plan,$category,$cat_value,$price,$date,$course_name,$chapName);
		echo $addcart;
		
	
		
	}

	public function success()
	{
		$status=$_POST["status"];
		$firstname=$_POST["firstname"];
		$amount=$_POST["amount"];
		$txnid=$_POST["txnid"];
		$posted_hash=$_POST["hash"];
		$key=$_POST["key"];
		$productinfo=$_POST["productinfo"];
		$email=$_POST["email"];
		$salt="wTepCSFvaL";

		if (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
       if ($hash != $posted_hash) {
	       //echo $hash;
		   } else {

          	//Update Database and redirect
          	//$updtPay = $this->SiteModel->updtMyvideo($productinfo,$txnid,$status);
          	$updtPay = $this->SiteModel->updtTransactions($productinfo,$txnid,$status);
          	$this->session->set_flashdata("Feed","Payment Successfull. Now You Can Access Videos");
            return redirect ("MyCourses");
		   }
	}

	public function failed()
	{
		echo "<script>"; echo "alert('Payment Failed'); location.href='".base_url('MyCart')."'"; echo "</script>";
	}
}