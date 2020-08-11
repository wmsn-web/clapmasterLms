<?php
/**
 * 
 */
class MyCart extends CI_controller
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
		$getMyCart = $this->SiteModel->getMyCart($userId);
		$getUser = $this->SiteModel->getUserDetails($userId);
		$totBalance = $this->SiteModel->cartBalance($userId);
		$txDetails = $this->SiteModel->txDetails();
		//print_r($getMyCart);
		$this->load->view("MyCartNew",["cartData"=>$getMyCart,"userData"=>$getUser,"totBalance"=>$totBalance,"txDetails"=>$txDetails]);
		//$this->load->view("inc/payU.php");
	}

	public function delCart($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("cart");
		$this->session->set_flashdata("Feed","Item Removed from Cart");
		return redirect("MyCart");
	}
	public function getCoupon()
	{
		$userId = $this->session->userdata("ClientId");
		$coupon = $this->input->post("coupon");
		$getCoupons = $this->SiteModel->getCoupons($coupon,$userId);
		if(!empty($getCoupons))
		{
			echo json_encode($getCoupons);
		}
		else
		{
			echo "no";
		}
	}

	public function processCheckOut()
	{
		$userId = $this->session->userdata("ClientId");
		$tx = $this->uri->segment(4);
		$gross = $this->uri->segment(3);
		$getAllCartDataToarray = $this->SiteModel->getAllCartDataToarray($userId,$gross,$tx);
		return redirect("PayNow/secure/");
		//echo "<pre>";
		//print_r($getAllCartDataToarray); 
	}

	public function getCartbasicPlan()
	{
		$id = $this->input->post("id");
		$getCartbasicPlan = $this->SiteModel->getCartbasicPlanAll($id);
		?>
			<input type="hidden" id="chapId" value="<?= $getCartbasicPlan['chapId']; ?>">
			<input type="hidden" id="price" value="<?= $getCartbasicPlan['price']; ?>">
			<input type="hidden" id="ids" value="<?= $getCartbasicPlan['id']; ?>">
			<table id="vidTable" class="table table-bordered prtable">
                <?php if(!empty($getCartbasicPlan['crtData'])){ ?>
                <?php foreach($getCartbasicPlan['crtData'] as $vidData ){ ?>

                <tr>
                    <td>
                        <label class="container">
                          <input type="checkbox" name="vid_id" checked="checked" value="<?= $vidData['vidId']; ?>">
                          <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-md-3">
                                <div style="background: url('<?= base_url('uploads/videos/'.$vidData['thumb']); ?>'); background-size: cover;" class="vid-box">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="vidText">
                                    <h5>
                                        <a  class="text-primary" >
                                            <?= $vidData['title']; ?>
                                        </a>
                                    </h5>
                                    <p><?= $vidData['descr']; ?><br>
                                    <span><i class="fas fa-eye"></i> 50K <?= nbs(4); ?><i class="fas fa-thumbs-up"></i> 30K <?= nbs(4); ?><i class="fas fa-thumbs-down"></i> 30K</span>
                                        </p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            <?php } ?>
            </table>
	<?php 
	}

	public function updateCartBasic()
	{
		$id = $this->input->post("id");
		$cat_value = $this->input->post("cat_value");
		$cat_id = $this->input->post("cat_id");
		$price = $this->input->post("price");

		$setUpdateCartBassic = $this->SiteModel->setUpdateCartBassic($cat_value,$cat_id,$price,$id);
	}
}