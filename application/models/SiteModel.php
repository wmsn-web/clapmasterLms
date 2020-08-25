<?php

class SiteModel extends CI_model
{
	
	public function getCat()
	{
		$getCat = $this->db->get("category"); 
		if($getCat->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$res = $getCat->result();
			foreach ($res as $key) {
				$catId = $key->id;
				

				$data[] = array
								(
									"cat_name"=>$key->cat_name,
									"catId"=>$catId
									
								);

			}
		}

		return $data;
	
	}

	public function getCourse()
	{
		$this->db->where("stat",1);
		$this->db->order_by("position","ASC");
		$getCat = $this->db->get("courses"); 
		if($getCat->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$res = $getCat->result();
			foreach ($res as $key) {
				$crsId = $key->crs_id;
				if($key->course_img == null)
				{
					$crsImg = "default.png";
				}
				else
				{
					$crsImg = $key->course_img;
				}

				$data[] = array
								(
									"course_name"=>$key->course_name,
									"crsId"=>$crsId,
									"descr"=>$key->descr,
									"crsImg"=>$crsImg
									
								);

			}
		}

		return $data;
	}

	public function getCourseOne()
	{
		$this->db->where("stat",1);
		$this->db->order_by("position","ASC");
		$getCat = $this->db->get("courses");
		if($getCat->num_rows()==0)
		{
			$chapData = array();
		}
		else
		{
			$key = $getCat->row();
			if($key->course_img == null)
			{
				$crsImg = "default.png";
			}
			else
			{
				$crsImg = $key->course_img;
			}
			$crsId = $key->crs_id;
				$this->db->where("crs_id",$crsId);
				$this->db->order_by("position","ASC");
				$get2 = $this->db->get("chapters");
				if($get2->num_rows()==0)
					{
						$chapData = array();
					}
					else
					{
						$res2 = $get2->result();
						foreach ($res2 as $key2) {
							$chapData[] = array
												(
													"course_name"=>$key->course_name,
													"chapName"=>$key2->chap_name,
													"id"=>$key2->id,
													"crsIds"=>$key2->crs_id
												);
						}
					}
		}



		$allData = array("course_name"=>$key->course_name,"chapData"=>$chapData,"descr"=>$key->descr,"crsImg"=>$crsImg);

		return $allData;
	}

	public function getDataMenu($crsId)
	{
		$this->db->where("crs_id",$crsId);
		$get = $this->db->get("courses")->row();
		if($get->course_img == null)
		{
			$crsImg = "default.png";
		}
		else
		{
			$crsImg = $get->course_img;
		}

		$this->db->where("crs_id",$crsId);
		$this->db->order_by("position","ASC");
		$getChap = $this->db->get("chapters");
		if($getChap->num_rows()==0)
		{
			$chapData = array();
		}
		else
		{
			$res = $getChap->result();
			foreach ($res as $key2) {
							$chapData[] = array
												(
													"chapName"=>$key2->chap_name,
													"id"=>$key2->id,
													"crsIds"=>$key2->crs_id
												);
						}
			$this->db->where(["crs_id"=>$crsId,"position"=>1]);
			$getPrev = $this->db->get("chapters");
			if($getPrev->num_rows()==0)
			{
				$prevData = array();
			}
			else
			{
				$row = $getPrev->row();
				$chapId = $row->id;
				//Level Pricing
				if($row->price==""){ $lvlprice = 0;}else{ $lvlprice = $row->price; }
				if($row->discount==""){ $lvldiscount =0; }else{$lvldiscount = $row->discount;}
				$lvlper = $lvldiscount/100;
				$lvldisc = $lvlprice*$lvlper;
				$lvlnowprice = round($lvlprice - $lvldisc);
				//Course Pricing
				if($row->full_course_price==""){$crsprice = 0;}else{$crsprice = $row->full_course_price;}
				if($row->full_course_discount==""){$crsdiscount = 0;}else{$crsdiscount = $row->full_course_discount;}
				

				$crsper = $crsdiscount/100;
				$crsdisc = $crsprice*$crsper;
				$crsnowprice = $crsprice-$crsdisc;
				//Single video pricing
				if($row->each_video_price==""){$snglprice = 0;}else{$snglprice = $row->each_video_price;}
				if($row->each_video_discount==""){$sngldiscount = 0;}else{$sngldiscount = $row->each_video_discount;}
				$snglper = $sngldiscount/100;
				$sngldisc = $snglprice*$snglper;
				$snglnowprice = $snglprice-$sngldisc;
				$prevData = array
								(
									"preview_type"=>$row->preview_type,
									"preview_link"=>$row->preview_link,
									"preview"=>$row->preview,
									"thumb"=>$row->thumb,
									"chap_name"=>$row->chap_name,
									"lvlprice"=>$lvlprice,
									"lvldiscount"=>$lvldiscount,
									"lvlnowprice"=>$lvlnowprice,
									"crsprice"=>$crsprice,
									"crsdiscount"=>$crsdiscount,
									"crsnowprice"=>$crsnowprice,
									"snglprice"=>$snglprice,
									"sngldiscount"=>$sngldiscount,
									"snglnowprice"=>$snglnowprice,
									"chapId"=>@$chapId,
									"crsId"=>$crsId
								);


			}
		}
			$this->db->where(["crs_id"=>$crsId,"chap_id"=>@$chapId,"trash"=>0]);
			$getvid = $this->db->get("chap_videos");
			if($getvid->num_rows()==0)
			{
				$vidData = array();
			}
			else
			{
				$res = $getvid->result();
				foreach ($res as $key3) {
					$vidData[] = array
										(
											"vid_id"=>$key3->vid_id,
											"title"=>$key3->title,
											"descr"=>$key3->descr,
											"thumb"=>$key3->thumb,
											"video_file"=>$key3->video_file
										);
				}
				
			}

			$this->db->where(["crs_id"=>$crsId,"trash"=>0]);
			$getAlvid = $this->db->get("chap_videos");
			if($getAlvid->num_rows()==0)
			{
				$allCrsVids = array();
			}
			else
			{
				$resAl = $getAlvid->result();
				foreach ($resAl as $key4) {
					$cchapId = $key4->chap_id;
					$this->db->where("id",$cchapId);
					$cchaps = $this->db->get("chapters")->row();
					

					$allCrsVids[] = array
										(
											"vid_id"=>$key4->vid_id,
											"title"=>$key4->title,
											"descr"=>$key4->descr,
											"thumb"=>$key4->thumb,
											"video_file"=>$key4->video_file,
											"chap_name"=>$cchaps->chap_name
										);
					
				}
			}

		$allData = array("course_name"=>$get->course_name,"crsImg"=>$crsImg,"descr"=>$get->descr,"chapData"=>$chapData,"previewData"=>@$prevData,"vidData"=>$vidData, "allCrsVids"=>$allCrsVids);
		return $allData;
	}

	public function getPreviews($id)
	{
		$this->db->where("id",$id);
		$get = $this->db->get("chapters");
		if($get->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$row = $get->row();
			$crsId = $row->crs_id;
			//Level Pricing
				$lvlprice = $row->price;
				$lvldiscount = $row->discount;
				$lvlper = $lvldiscount/100;
				$lvldisc = $lvlprice*$lvlper;
				$lvlnowprice = $lvlprice - $lvldisc;
				//Course Pricing
				$crsprice = $row->full_course_price;
				$crsdiscount = $row->full_course_discount;
				$crsper = $crsdiscount/100;
				$crsdisc = $crsprice*$crsper;
				$crsnowprice = $crsprice-$crsdisc;
				//Single video pricing
				$snglprice = $row->each_video_price;
				$sngldiscount = $row->each_video_discount;
				$snglper = $sngldiscount/100;
				$sngldisc = $snglprice*$snglper;
				$snglnowprice = $snglprice-$sngldisc;
			$data = array
						(
							"preview"=>$row->preview,
							"preview_type"=>$row->preview_type,
							"preview_link"=>$row->preview_link,
							"thumb"=>$row->thumb,
							"chap_name"=>$row->chap_name,
							"lvlprice"=>$lvlprice,
							"lvldiscount"=>$lvldiscount,
							"lvlnowprice"=>$lvlnowprice,
							"crsprice"=>$crsprice,
							"crsdiscount"=>$crsdiscount,
							"crsnowprice"=>$crsnowprice,
							"snglprice"=>$snglprice,
							"sngldiscount"=>$sngldiscount,
							"snglnowprice"=>$snglnowprice,
							"chapId"=>$id,
							"crsId"=>$crsId 
							
						);
					}
		
		$this->db->where("crs_id",$crsId);
		$get = $this->db->get("courses")->row();

		$this->db->where("crs_id",$crsId);
		$this->db->order_by("position","ASC");
		$getChap = $this->db->get("chapters");
		if($getChap->num_rows()==0)
		{
			$chapData = array();
		}

		else
		{
			$res = $getChap->result();
			foreach ($res as $key2) {
							$chapData[] = array
												(
													"chapName"=>$key2->chap_name,
													"id"=>$key2->id,
													"crsIds"=>$key2->crs_id
												);
						}
		}

		$this->db->where(["crs_id"=>$crsId,"chap_id"=>$id,"trash"=>0]);
			$getvid = $this->db->get("chap_videos");
			if($getvid->num_rows()==0)
			{
				$vidData = array();
			}
			else
			{
				$res = $getvid->result();
				foreach ($res as $key3) {
					$vidData[] = array
										(
											"vid_id"=>$key3->vid_id,
											"title"=>$key3->title,
											"descr"=>$key3->descr,
											"thumb"=>$key3->thumb,
											"video_file"=>$key3->video_file
										);
				}
				
			}

			$this->db->where(["crs_id"=>$crsId]);
			$getAlvid = $this->db->get("chap_videos");
			if($getAlvid->num_rows()==0)
			{
				$allCrsVids = array();
			}
			else
			{
				$resAl = $getAlvid->result();
				foreach ($resAl as $key4) {
					$cchapId = $key4->chap_id;
					$this->db->where("id",$cchapId);
					$cchaps = $this->db->get("chapters")->row();
					

					$allCrsVids[] = array
										(
											"vid_id"=>$key4->vid_id,
											"title"=>$key4->title,
											"descr"=>$key4->descr,
											"thumb"=>$key4->thumb,
											"video_file"=>$key4->video_file
										);
					
				}
			}

		$allData = array("course_name"=>$get->course_name,"descr"=>$get->descr,"chapData"=>$chapData,"previewData"=>$data,"vidData"=>$vidData,"allCrsVids"=>$allCrsVids);
		return $allData;
	}

public function addCart($userId,$catValue,$orderid,$plan,$category,$cat_value,$price,$date,$course_name,$chapName)
{
	
	$this->db->where(["userid"=>$userId,"order_id"=>$orderid]);

		$get = $this->db->get("cart");
		if($get->num_rows() > 0)
		{
			$return = "orid";
		}
		else
		{
			$this->db->where(["userid"=>$userId,"cat_value"=>$catValue]);
			$get2 = $this->db->get("cart");
			if($get2->num_rows() > 0)
			{
				$return = "ctvl";
			}
			else
			{
				date_default_timezone_set('Asia/Kolkata');
				$dataNew = array
							(
								"userid"=>$userId,
								"course_name"=>$course_name,
								"chap_name"=>$chapName,
								"cat_value"=>$catValue,
								"order_id"=>$orderid,					
								"plan"=>$plan,
								"category"=>$category,
								"cat_id"=>$cat_value,
								"price"=>$price,
								"date"=>date('Y-m-d H:i:s')
							);
				$dd = $this->db->insert("cart",$dataNew);
				if($plan == )
				$return = "succ";
			}
	}
	 return $return;
	 
}
	public function getCartNum($userId)
	{
		$this->db->where(["userid"=>$userId]);
		$get = $this->db->get("cart");
		return $get->num_rows();
	}

	public function getUserDetails($userId) 
	{
		$this->db->where("id",$userId);
		$get = $this->db->get("users_profile");
		$row = $get->row();
		$data = array
					(
						"name"=>$row->name,
						"email"=>$row->email,
						"mobile"=>$row->mobile,
						"city"=>$row->city,
						"state"=>$row->state,
						"pin"=>$row->pin
					);
		return $data;
	}

	public function getMyCart($userId)
	{
		$this->db->where(["userid"=>$userId,"payment_status"=>null]);
		$this->db->delete("transactions");

		$this->db->where(["userid"=>$userId]);
		$this->db->update("cart",["order_id"=>"ord_".mt_rand(00000000,99999999)]);
		$this->db->where(["userid"=>$userId]);
		$this->db->order_by("id","ASC");
		$get = $this->db->get("cart");
		if($get->num_rows()==0)
		{
			$cartData = array();
		}
		else
		{
			$res = $get->result();
			foreach ($res as $key) {

				if($key->category == "basic")
				{
					$tag = "";
					$expl = explode(",", $key->cat_id);
					$Level = "";
					$items = [];
					foreach ($expl as $keyxpl) {
						$this->db->where("vid_id",$keyxpl);
						$gtvd = $this->db->get("chap_videos")->row();
						$this->db->where("id",$gtvd->chap_id);
						$gtcp = $this->db->get("chapters")->row();
						$items[] = array
									(
										"title"=>$gtvd->title,
										"vid_id"=>$key->cat_id,
										"chapName"=> "->".$gtcp->chap_name." "
									);
					}
				}
				elseif($key->category == "level")
				{
					$tag = "(All Videos)";
					$items = array();
					$Level = "->".$key->chap_name;
				}
				else
				{
					$tag = "(All Videos)";
					$items = array();
					$Level = " -> All Levels";
				}
				$cartData[] = array
									(
										"order_id"=>$key->order_id,
										"category"=>$key->category,
										"items"=>$items,
										"price"=>$key->price,
										"id"=>$key->id,
										"course"=>$key->course_name,
										"tag"=>$tag,
										"level"=>$Level
									);
			}
		}
		return $cartData;
		
	}

		public function getMyRenewCart($userId)
	{
		$this->db->where(["userid"=>$userId,"payment_status"=>null]);
		$this->db->delete("transactions");

		$this->db->where(["userid"=>$userId]);
		$this->db->update("transactions_renew",["order_id"=>"ord_".mt_rand(00000000,99999999)]);
		$this->db->where(["userid"=>$userId]);
		$this->db->order_by("id","ASC");
		$get = $this->db->get("transactions_renew");
		if($get->num_rows()==0)
		{
			$cartData = array();
		}
		else
		{
			$res = $get->result();
			foreach ($res as $key) {

				if($key->category == "basic")
				{
					$tag = "";
					$expl = explode(",", $key->cat_id);
					$Level = "";
					$items = [];
					foreach ($expl as $keyxpl) {
						$this->db->where("vid_id",$keyxpl);
						$gtvd = $this->db->get("chap_videos")->row();
						$this->db->where("id",$gtvd->chap_id);
						$gtcp = $this->db->get("chapters")->row();
						$items[] = array
									(
										"title"=>$gtvd->title,
										"vid_id"=>$key->cat_id,
										"chapName"=> "->".$gtcp->chap_name." "
									);
					}
				}
				elseif($key->category == "level")
				{
					$tag = "(All Videos)";
					$items = array();
					$Level = "->".$key->chap_name;
				}
				else
				{
					$tag = "(All Videos)";
					$items = array();
					$Level = " -> All Levels";
				}
				$cartData[] = array
									(
										"order_id"=>$key->order_id,
										"category"=>$key->category,
										"items"=>$items,
										"price"=>$key->price,
										"id"=>$key->id,
										"course"=>$key->course_name,
										"tag"=>$tag,
										"level"=>$Level
									);
			}
		}

		return $cartData;
	}

	public function cartBalance($userId)
	{
		$this->db->where("userid",$userId);
		$this->db->select_sum("price");
		$getTot = $this->db->get("cart")->row();

		$this->db->where("userid",$userId);
		$rrow = $this->db->get("cart")->row();

		$data = array("totprice"=>$getTot->price,"discount"=>@$rrow->discount);
		return $data;
	}
	public function cartRenewBalance($userId)
	{
		$this->db->where("userid",$userId);
		$this->db->select_sum("price");
		$getTot = $this->db->get("transactions_renew")->row();

		$this->db->where("userid",$userId);
		$rrow = $this->db->get("transactions_renew")->row();

		$data = array("totprice"=>$getTot->price,"discount"=>@$rrow->discount);
		return $data;
	}

	public function txDetails()
	{
		$this->db->order_by("id","ASC");
		$get = $this->db->get("tax_setup")->row();
		$tx = $get->percents;
		$tax = $tx/100;
		$data = array("tax"=>$tx, "txpercent"=>$tax);
		return $data;
	}

	public function getCoupons($coupon,$userId)
	{
		$this->db->where(["coupon_code"=>$coupon,"status"=>1]);
		$get = $this->db->get("coupons");
		if($get->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$row = $get->row();
			if($row->discount_type == "flat")
			{
				$disc = "flat_".$row->discount;
			}
			else
			{
				$disc = "perc_".$row->discount/100;
			}
			$this->db->where(["coupon_code"=>$coupon]);
			$this->db->update("coupons",["status"=>0]);
			$this->db->where(["userid"=>$userId]);
			$this->db->update("cart",["discount"=>$disc,"coupon_code"=>$coupon]);
			$data = array("disc"=>$disc,);
		}

		return $data;
	}

	public function getAllCartDataToarray($userId,$gross,$tx)
	{
		$this->db->where(["userid"=>$userId]);
		$this->db->update("cart",["tax"=>$tx,"gross_price"=>$gross]);
		$this->db->where(["userid"=>$userId]);
		$this->db->order_by("id","ASC");
		$get = $this->db->get("cart");
		if($get->num_rows()==0)
		{
			$cartData = array();
		}
		else
		{
			$res = $get->result();
			$this->db->where("userid",$userId);
			$this->db->select_sum("price");
			$getTot = $this->db->get("cart")->row();

			$this->db->where("userid",$userId);
			$rrow = $this->db->get("cart")->row();
			foreach ($res as $key) {
				$this->db->insert('transactions', $key);
				$cartData = array();
			}

			$cartData = array();
		}

		return $cartData;
	}

	public function getAllCartDataToarrayRenew($userId,$gross,$tx)
	{
		$this->db->where(["userid"=>$userId]);
		$this->db->update("transactions_renew",["tax"=>$tx,"gross_price"=>$gross]);
		

		return 1;
	}


	public function getCartToPay($userId)
	{
		$this->db->where(["userid"=>$userId]);
		$get = $this->db->get("cart");
		$row = $get->row();
		$ctnm = $row->category."_plan";

		return $row;

	}

	public function getCartToPayRenew($userId)
	{
		$this->db->where(["userid"=>$userId]);
		$get = $this->db->get("transactions_renew");
		$row = $get->row();
		$ctnm = $row->category."_plan";

		return $row;

	}

	public function updtTransactions($productinfo,$txnid,$status) 
	{

		$data = array
					(
						"txn_id"=>$txnid,
						"payment_status"=>$status,
						"date"=> date("Y-m-d H:i:s")
					);
		$this->db->where(["order_id"=>$productinfo]);
		$this->db->update("transactions",$data);
		$this->db->where(["order_id"=>$productinfo]);
		$this->db->delete("cart");	

		$this->db->where(["order_id"=>$productinfo]);
		$trans = $this->db->get("transactions")->row();
		if($trans->notes == "Renew")
		{
			if($trans->plan == "basic")
			{
				$expl = explode(",", $trans->cat_id);
				foreach ($expl as $keyVd ) {
					$this->db->where(["vid_id"=>$keyVd,"user_id"=>$trans->userid]);
					$this->db->delete("video_views");
				}
			}
		}
		return "succ";
	}

	public function updtTransactionsRenew($productinfo,$txnid,$status) 
	{

		$data = array
					(
						"txn_id"=>$txnid,
						"payment_status"=>$status,
						"date"=> date("Y-m-d H:i:s")
					);
		$this->db->where(["order_id"=>$productinfo]);
		$this->db->update("transactions_renew",$data);
		
		$this->db->where(["order_id"=>$productinfo]);
		$trans = $this->db->get("transactions_renew")->row();
		if($trans->notes == "Renew")
		{
			if($trans->plan == "basic")
			{
				$expl = explode(",", $trans->cat_id);
				foreach ($expl as $keyVd ) {
					$this->db->where(["vid_id"=>$keyVd,"user_id"=>$trans->userid]);
					$this->db->delete("video_views");
				}
			}
		}
		return "succ";
	}

	public function cartById($id,$userId)
	{
		$this->db->where(["order_id"=>$id]);
		$get = $this->db->get("cart");
		$row = $get->row();
		$ctnm = $row->category."_plan";

		$data = array
					(
						"userid"=>$userId,
						"order_id"=>$id,
						"plan"=>$ctnm,
						"plan_id"=>$row->cat_id,
						"price"=>$row->price,
						"payment_status"=>"pending",
						"status"=>0

					);
		$this->db->where(["order_id"=>$id]);
		$getmvid = $this->db->get("my_videos");
		if($getmvid->num_rows() > 0)
		{

		}
		else
		{
			$this->db->insert("my_videos",$data);
		}
		return $row ;
	}

	public function updtMyvideo($productinfo,$txnid,$status)
	{
		date_default_timezone_set('Asia/Kolkata');
		$data = array
					(
						"payment_status"=>$status,
						"txn_id"=>$txnid,
						"status"=>1,
						"date"=> date("Y-m-d H:i:s")
					);
		$this->db->where(["order_id"=>$productinfo]);
		$this->db->update("my_videos",$data);
		$this->db->where(["order_id"=>$productinfo]);
		$this->db->delete("cart");
		return "succ";
	}

	public function getMyCourses($userId)
	{
		$this->db->where(["userid"=>$userId,"plan="=>"basic","payment_status"=>"success","txn_id!="=>null]);
		$getbasic = $this->db->get("transactions");
		if($getbasic->num_rows()==0)
		{
			$basicPlan = array();
		}
		else
		{
			$res1 = $getbasic->result();
			foreach ($res1 as $key1) {
				$expl = explode(",", $key1->cat_id);
				foreach($expl as $planIdbs){
			//Search Chap Id
			$this->db->where("vid_id",$planIdbs);
			$GTvids= $this->db->get("chap_videos");

			$getVids = $GTvids->row();
					$chapId = @$getVids->chap_id;
				//
					$this->db->where("id",$chapId);
					$getChap = $this->db->get("chapters")->row();
					$crsId = @$getChap->crs_id;
					//Search For Course Name
					$this->db->where("crs_id",$crsId);
					$getCrs = $this->db->get("courses")->row();
					$course_name = @$getCrs->course_name;

				

					$basicPlan[] = array
										(
											"Title"=>@$getVids->title,
											"planId"=>@$key1->plan_id,
											"id"=>@$key1->id,
											"chap_name"=>@$getChap->chap_name,
											"course_name"=>@$getCrs->course_name,
											"thumb"=>@$getVids->thumb,
											"vidId"=>@$getVids->vid_id

										);
									}
			}
		}
		//Get Level Plan
		$this->db->where(["userid"=>$userId,"plan="=>"level","payment_status"=>"success","txn_id!="=>null]);
		$this->db->order_by("plan");
		$getlevel = $this->db->get("transactions");
		if($getlevel->num_rows()==0)
		{
			$levelPlan = array();
		}
		else
		{
			$res2 = $getlevel->result();
			foreach ($res2 as $key2) {
				$planId = $key2->cat_id;
				//search for course Id
				$this->db->where("id",$planId);
				$getChap = $this->db->get("chapters")->row();
				$crsId = $getChap->crs_id;
				//Search For Course Name
				$this->db->where("crs_id",$crsId);
				$getCrs = $this->db->get("courses")->row();
				$course_name = $getCrs->course_name;
				
				$levelPlan[] = array
									(
										"Title"=>$getChap->chap_name,
										"planId"=>$key2->cat_id,
										"id"=>$key2->id,
										"chap_name"=>$getChap->chap_name,
										"course_name"=>$getCrs->course_name

									);
									
			}
		}
		//get Full Course Plan
		$this->db->where(["userid"=>$userId,"plan="=>"cours","payment_status"=>"success","txn_id!="=>null]);
		$getcrs = $this->db->get("transactions");
		if($getcrs->num_rows()==0)
		{
			$crsPlan = array();
		}
		else
		{
			$res3 = $getcrs->result();
			foreach ($res3 as $key3) {
				$crsIds = $key3->cat_id;
				$this->db->where("crs_id",$crsIds);
				$getCrs2 = $this->db->get("courses")->row();
				//Get Chapters
				$this->db->where("crs_id",$crsIds);
				$this->db->order_by("position");
				$getChap2 = $this->db->get("chapters")->result();
				foreach ($getChap2 as $keyChap) {
					if($keyChap->thumb ==null)
					{
						$thumb = "default.png";
					}
					else
					{
						$thumb = $keyChap->thumb;
					}
					$allLevels[] = array  (
											"chapName"=>$keyChap->chap_name,
											"chapId" =>$keyChap->id,
											"thumb"=>$thumb,
											"crsId"=>$keyChap->crs_id,
											"id"=>$keyChap->id
										);
				}
				
				$crsPlan[] = array
									(
										"Title"=>$getCrs2->course_name,
										"planId"=>$key3->cat_id,
										"id"=>$key3->id,
										"levels"=>$allLevels,
										"crsId"=>$getCrs2->crs_id
									);
			}
		}
		$allData = array
						(
							"basicPlan"=>$basicPlan,
							"levelPlan"=>$levelPlan,
							"crsPlan"=>$crsPlan
						);
		return $allData;
	}

	public function getVideoById($id)
	{
		$this->db->where("chap_id",$id);
		$getVids = $this->db->get("chap_videos");
		if($getVids->num_rows()==0)
		{
			$vidData = array();
		}
		else
		{
			$res = $getVids->result();
			foreach ($res as $key) {
				$vidData[] = array
								(
									"title"=>$key->title,
									"crsName"=>$key->crs_id,
									"thumb"=>$key->thumb,
									"video_file"=>$key->video_file,
									"descr"=>$key->descr,
									"vidId"=>$key->vid_id
								);
			}
		}
		return $vidData;
	}

	public function getCartbasicPlanAll($id)
	{
		$this->db->where("id",$id);
		$getId = $this->db->get("cart");
		if($getId->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$row = $getId->row();
			$expl = explode(",", $row->cat_id);
			foreach ($expl as $keys) {
				$this->db->where("vid_id",$keys);
				$getVids = $this->db->get("chap_videos");
				if($getVids->num_rows()==0)
				{
					$dataAll = array();
				}
				else
				{
					$res = $getVids->result();
					$rro = $getVids->row();
					$this->db->where("id",$rro->chap_id);
					$getChap = $this->db->get("chapters")->row();
					$price = $getChap->each_video_price;
					foreach ($res as $key) {
						$dataAll[] = array
										(
											"title"=>$key->title,
											"crsName"=>$key->crs_id,
											"thumb"=>$key->thumb,
											"video_file"=>$key->video_file,
											"descr"=>$key->descr,
											"vidId"=>$key->vid_id,
											
										);
					}
				}
			}
		}
		 $data = ["crtData"=>$dataAll,"chapId"=>@$rro->chap_id,"price"=>@$price,"id"=>$id];
		 return $data;
	}

	public function setUpdateCartBassic($cat_value,$cat_id,$price,$id)
	{

		$this->db->where("id",$id);
		$this->db->update("cart",["cat_value"=>$cat_value,"cat_id"=>$cat_id,"price"=>$price]);

		$this->db->where("id",$id);
		$gt = $this->db->get("cart")->row();
		if($gt->cat_id == "")
		{
			$this->db->where("id",$id);
			$this->db->delete("cart");
		}

	}
	

	public function getMainVideo($id,$userId) 
	{
		$this->db->where("vid_id",$id);
		$get = $this->db->get("chap_videos");
		if($get->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$row = $get->row();
			$this->db->where("crs_id",$row->crs_id);
			$getCrss = $this->db->get("courses")->row();

			$this->db->where("id",$row->chap_id);
			$getChaps = $this->db->get("chapters")->row();

			$price = $getChaps->each_video_price;
			$discount = $getChaps->each_video_discount;

			$per = $discount/100;
			$disc = $price*$per;

			$price_now = $price - $disc;
			

			$this->db->where(["user_id"=>$userId,"vid_id"=>$id]);
		$get = $this->db->get("video_views")->num_rows();
			if($get >=5)
			{
				$video_file = "none.mp4";
				$msg = "<b style='color:#f00'>You have Completed this video tutorial.</b>
				<a href='".base_url('SearchResult/renn/'.$id.'/'.$price_now.'/'.$getCrss->course_name.'/'.$getChaps->chap_name)."'><span class='badge badge-warning'>Renew Now</span></a>";
				
			}
			else
			{
				$video_file = $row->video_file;
				$msg = "";
			}

			$this->db->where(["vid_id"=>$id,"likes"=>1]);
			$getLikes = $this->db->get("video_likes")->num_rows();
			$this->db->where(["vid_id"=>$id,"dislikes"=>1]);
			$getDisLikes = $this->db->get("video_likes")->num_rows();

			$this->db->where(["vid_id"=>$id,"comments!="=>""]);
			$gettotComments = $this->db->get("video_likes")->num_rows();

			$this->db->where(["vid_id"=>$id,"user_id"=>$userId]);
			$getmyLike = $this->db->get("video_likes");
			$getmyLikenum = $getmyLike->num_rows();
			if($getmyLikenum == 0)
			{
				$disbtn = "";
				$likebtn = "";
			}
			else
			{
				$rowmyLike = $getmyLike->row();
				if($rowmyLike->likes == 1)
				{
					$likebtn = "style='color:#8501DA'";
					$disbtn = "";
				}elseif($rowmyLike->dislikes == 1)
				{
					$disbtn = "style='color:#8501DA'";
					$likebtn = "";
				}
				else
				{
					$disbtn = "";
					$likebtn = "";
				}
			}

			$data = array
						(
							"title"=>$row->title,
							"thumb"=>$row->thumb,
							"video_file"=>$video_file,
							"descr"=>$row->descr,
							"vidId"=>$row->vid_id,
							"msg"=>$msg,
							"likes"=>$getLikes,
							"dislikes"=>$getDisLikes,
							"likebtn"=>$likebtn,
							"disbtn"=>$disbtn,
							"totComments"=>$gettotComments,
							"video_link"=>$row->video_link,
								"video_type"=>$row->video_type
						);
		
		}

		return $data;
	}

	public function getSimilr($plans,$id,$userId)
	{
		$similrData = array();
		if($plans=="basic_plan")
		{
			$this->db->where(["userid"=>$userId,"plan"=>$plans]);
			$get = $this->db->get("my_videos");
			if($get->num_rows()==0)
			{
				$similrData = array();
			}
			else
			{
				$res = $get->result();
				foreach ($res as $key) {

					$plnId = $key->plan_id;
					$this->db->where("vid_id",$plnId);
					$this->db->order_by("id","ASC");
					$getVid = $this->db->get("chap_videos")->row();

					$this->db->where(["user_id"=>$userId,"vid_id"=>$getVid->vid_id]);
					$getview = $this->db->get("video_views")->num_rows();
					if($id == $getVid->vid_id)
                        {
                            $style = "style='opacity: 0.5;'";
                            $link = "";
                            $msg = "";
                        }
                        elseif($getview >=5)
                        {
                        	$style = "style='opacity: 0.5;'";
                            $link = "";
                            $msg = "<b style='color:#f00'>You have Completed this video tutorial.</b>";
                        }
                        else
                        {
                            $style = "style='opacity: 1;'";
                            $link = "location.href='".base_url('PlayVideo/play/'.$plans.'/'.$getVid->vid_id)."'";
                            $msg = "";
                        }

					$similrData[] = array
										(
											"title"=>$getVid->title,
											"thumb"=>$getVid->thumb,
											"video_file"=>$getVid->video_file,
											"descr"=>$getVid->descr,
											"vidId"=>$getVid->vid_id,
											"plans"=>$plans,
											"style"=>$style,
											"link"=>$link,
											"msg"=>$msg
										);
				}
			}
		}
		elseif($plans=="level_plan")
		{
			$this->db->where("vid_id",$id);
			$gt = $this->db->get("chap_videos")->row();
			$chap_id = $gt->chap_id;
			$this->db->where("chap_id",$chap_id);
			$gts = $this->db->get("chap_videos");
			if($gts->num_rows()==0)
			{
				$similrData = array();
			}
			else
			{
				$ress = $gts->result();
				foreach ($ress as $key) {

					$this->db->where(["user_id"=>$userId,"vid_id"=>$key->vid_id]);
					$getview = $this->db->get("video_views")->num_rows();
					if($id == $key->vid_id)
                        {
                            $style = "style='opacity: 0.5;'";
                            $link = "";
                            $msg = "";
                        }
                        elseif($getview >=5)
                        {
                        	$style = "style='opacity: 0.5;'";
                            $link = "";
                            $msg = "<b style='color:#f00'>You have Completed this video tutorial.</b>";
                        }
                        else
                        {
                            $style = "style='opacity: 1;'";
                            $link = "location.href='".base_url('PlayVideo/play/'.$plans.'/'.$key->vid_id)."'";
                            $msg = "";
                        }
					$similrData[] = array
										(
											"title"=>$key->title,
											"thumb"=>$key->thumb,
											"video_file"=>$key->video_file,
											"descr"=>$key->descr,
											"vidId"=>$key->vid_id,
											"plans"=>$plans,
											"style"=>$style,
											"link"=>$link,
											"msg"=>$msg
										);
				}
			}
		}

		return $similrData;
	}

	public function setvideoViews($userId,$vid_id,$date)
	{
		$this->db->where(["user_id"=>$userId,"vid_id"=>$vid_id]);
		$get = $this->db->get("video_views")->num_rows();
		if($get >=5)
		{
			$return = "none";
		}
		else
		{
			$data = array
						(
							"user_id"=>$userId,
							"vid_id"=>$vid_id,
							"date"=>$date
						);
			$this->db->insert("video_views",$data);
		}
	}

	public function setLikes($userId,$vid_id,$date)
	{
		$this->db->where("vid_id",$vid_id);
		$gt = $this->db->get("chap_videos")->row();

		$this->db->where(["user_id"=>$userId,"vid_id"=>$vid_id]);
		$get = $this->db->get("video_likes");
		$row = $get->row();
		$getNumLike = $get->num_rows();
		if($getNumLike > 0)
		{
			$likes = $row->likes;
			$dislike = $row->dislikes;
			if($likes ==1 && $dislike ==0)
			{
				$return = "none";
			}
			
			elseif($likes ==0 && $dislike ==1)
			{
				$this->db->where(["user_id"=>$userId,"crs_id"=>$gt->crs_id,"vid_id"=>$vid_id]);
				$this->db->update("video_likes",["likes"=>1,"dislikes"=>0]);
				$return = "done";
			}
			else
			{
				$this->db->where(["user_id"=>$userId,"crs_id"=>$gt->crs_id,"vid_id"=>$vid_id]);
				$this->db->update("video_likes",["likes"=>1,"dislikes"=>0]);
				$return = "done";
			}
			
		}
		else
		{

			$data = array
						(
							"user_id"=>$userId,
							"crs_id"=>$gt->crs_id,
							"vid_id"=>$vid_id,
							"likes"=>1,
							"dislikes"=>0,
							"date"=>$date
						);
			$this->db->insert("video_likes",$data);
			$return = "done";
		}

		return $return;
	}

	public function getlikes($vid_id)
	{
		$this->db->where(["vid_id"=>$vid_id,"likes"=>1]);
		$getLikes = $this->db->get("video_likes")->num_rows();
		$this->db->where(["vid_id"=>$vid_id,"dislikes"=>1]);
		$getDisLikes = $this->db->get("video_likes")->num_rows();

		$this->db->where(["vid_id"=>$vid_id,"comments!="=>""]);
		$gettotComments = $this->db->get("video_likes")->num_rows();

		$data = array("likes"=>$getLikes,"dislikes"=>$getDisLikes,"totComments"=>$gettotComments);

		return $data;
	}

	public function setdisLikes($userId,$vid_id,$date)
	{
		$this->db->where("vid_id",$vid_id);
		$gt = $this->db->get("chap_videos")->row();

		$this->db->where(["user_id"=>$userId,"vid_id"=>$vid_id]);
		$get = $this->db->get("video_likes");
		$row = $get->row();
		$getNumdisLike = $get->num_rows();
		if($getNumdisLike > 0)
		{
			$likes = $row->likes;
			$dislike = $row->dislikes;
			if($likes ==0 && $dislike ==1)
			{
				$return = "none";
			}
			
			elseif($likes ==1 && $dislike ==0)
			{
				$this->db->where(["user_id"=>$userId,"crs_id"=>$gt->crs_id,"vid_id"=>$vid_id]);
				$this->db->update("video_likes",["likes"=>0,"dislikes"=>1]);
				$return = "done";
			}
			else
			{
				$this->db->where(["user_id"=>$userId,"crs_id"=>$gt->crs_id,"vid_id"=>$vid_id]);
				$this->db->update("video_likes",["likes"=>0,"dislikes"=>1]);
				$return = "done";
			}
			
		}
		else
		{

			$data = array
						(
							"user_id"=>$userId,
							"crs_id"=>$gt->crs_id,
							"vid_id"=>$vid_id,
							"likes"=>0,
							"dislikes"=>1,
							"date"=>$date
						);
			$this->db->insert("video_likes",$data);
			$return = "done";
		}

		return $return;
	}
	public function getComments($id)
	{
		$this->db->where(["vid_id"=>$id,"comments!="=>""]);
		$this->db->order_by("id","DESC");
		$get = $this->db->get("video_likes");
		$num = $get->num_rows();
		if($num == 0)
		{
			$commentData = array();
		}
		else
		{
			$res = $get->result();
			foreach ($res as $key) {
				$this->db->where(["id"=>$key->user_id]);
				$gtUser = $this->db->get("users_profile")->row();
				$dt = $key->date;
				$date=date_create($dt);
				$day = date_format($date,"d");
				$month = date_format($date,"F");
				$year = date_format($date,"Y");
				$time = date_format($date,"h:i a");
				$fullDate = $month." ".$day.", - ".$year." ".$time;

				//Get Reply
				$this->db->where(["vid_id"=>$key->vid_id,"comment_id"=>$key->id]);
				$gtreply = $this->db->get("reply_comments");
				if($gtreply->num_rows()==0)
				{
					$replyData = array();
				}
				else
				{
					$result = $gtreply->result();
					foreach ($result as $keyRep) {
						$replyData[] = array
											(
												"title"=>"A",
												"comments"=>$keyRep->comments
											);
					}
				}

				$commentData[] = array
										(
											"title"=>substr(strtoupper($gtUser->name),0,1),
											"name"=>$gtUser->name,
											"comments"=>$key->comments,
											"date"=>$fullDate,
											"replyData"=>$replyData,
											"rates"=>$key->rates
										);
			}
		}

		return $commentData;
	}
	public function setComments($userId,$vid_id,$textCom,$date,$rates)
	{
		$this->db->where("vid_id",$vid_id);
		$gt = $this->db->get("chap_videos")->row();
		$data = array
					(
						"user_id"=>$userId,
						"crs_id"=>$gt->crs_id,
						"vid_id"=>$vid_id,
						"comments"=>$textCom,
						"rates"=>$rates,
						"date"=>$date
					);
		$this->db->where(["user_id"=>$userId,"crs_id"=>$gt->crs_id,"vid_id"=>$vid_id,]);
		$get2 = $this->db->get("video_likes")->num_rows();
		if($get2 > 0)
		{
			$this->db->where(["user_id"=>$userId,"crs_id"=>$gt->crs_id,"vid_id"=>$vid_id,]);
			$this->db->update("video_likes",$data);
			return "done";
		}else
		{
			$this->db->insert("video_likes",$data);
			return "done";
		}
		
		
	}

	public function setAnalysis($id,$userId,$ip,$date)
	{
		$data = array
					(
						"vid_id"=>$id,
						"user_id"=>$userId,
						"ip"=>$ip,
						"date"=>$date
					);
		$this->db->where($data);
		$get = $this->db->get("video_watch_analysis")->num_rows();
		if($get >0)
		{
			$return = "none";

		}
		else
		{
			$this->db->insert("video_watch_analysis",$data);
		}
	}

	public function updateAnalysis($vid_id,$userId,$ip,$date,$sec)
	{
		$data = array
					(
						"vid_id"=>$vid_id,
						"user_id"=>$userId,
						"ip"=>$ip,
						"date"=>$date
					);
		$this->db->where($data);
		$get = $this->db->get("video_watch_analysis");
		if($get->num_rows()==0)
		{
			//$this->db->insert("video_watch_analysis",$data);
			$return = "none";
		}
		else
		{
			$row = $get->row();
			$watch_time = $row->watch_time;
			$newWatch = $watch_time+$sec;
			$this->db->where($data);
			$this->db->update("video_watch_analysis",["watch_time"=>$newWatch]);
			$return = "Done";

		}

		return $return;
	}

	public function getExtraData($crsId)
	{
		$this->db->where("crs_id",$crsId);
		$get = $this->db->get("course_meta");
		if($get->num_rows()==0)
		{
			$dataWtlrn = array("what_learn"=>"");
		}
		else
		{
			$row = $get->row();
			$dataWtlrn = array
						(
							"what_learn"=>$row->what_learn
						);
		}

		$this->db->where(["crs_id"=>$crsId]);
		$get = $this->db->get("course_faq");
		if($get->num_rows()== 0)
		{
			$this->db->limit(3);
			$get2 = $this->db->get("course_faq");
			if($get2->num_rows()==0)
			{
				$arrayName = array();
			}
			else
			{
				$res2 = $get2->result();
				foreach($res2 as $key2)
				{
					$arrayName[] = array
									(
										"qstion"=>$key2->qstion,
										"answr"=>$key2->answr,
										"crs_id"=>$key2->crs_id,
										"id"=>$key2->id
									);
				}
			}
			
		}
		else
		{
			$res = $get->result();
			
			foreach ($res as $key) {
				$arrayName[] = array
									(
										"qstion"=>$key->qstion,
										"answr"=>$key->answr,
										"crs_id"=>$key->crs_id,
										"id"=>$key->id
									);
			}
		
		}
		$this->db->where(["crs_id"=>$crsId]);
		$get = $this->db->get("courses");
		$row = $get->row();

		$allData = ["howtolearn"=>$dataWtlrn,"faq"=>$arrayName,"incldt"=>$row->course_included];

		return $allData;
	}

	public function checkPlayVideoId($id)
	{
		$this->db->where("vid_id",$id);
		$get = $this->db->get("chap_videos")->num_rows();
		return $get;
	}

	public function getFooterCourse()
	{
		$this->db->where("stat",1);
		$this->db->order_by("position","ASC");
		$getCat = $this->db->get("courses"); 
		if($getCat->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$res = $getCat->result();
			foreach ($res as $key) {
				$crsId = $key->crs_id;
				

				$data[] = array
								(
									"course_name"=>$key->course_name,
									"crsId"=>$crsId,
									"descr"=>$key->descr
									
								);

			}
		}

		return $data;
	}
	public function getRes($vid_id)
	{
		$this->db->where("vid_id",$vid_id);
		$get = $this->db->get("chap_videos")->row();
		$crsId = $get->crs_id;
		$chapId = $get->chap_id;

		$this->db->where("crs_id",$crsId);
		$get3 = $this->db->get("courses")->row();

		$this->db->where("id",$chapId);
		$get2 = $this->db->get("chapters")->row();

		$this->db->where(["chap_id"=>$chapId,"vid_id!="=>$vid_id]);
		$get4 = $this->db->get("chap_videos");
		if($get4->num_rows()==0)
		{
			$simData = array();
		}
		else
		{
			$ress = $get4->result();
			foreach ($ress as $key) {
				$simData[] = array
								(
									"title"=>$key->title,
									"descr"=>substr($key->descr,0,50),
									"thumb"=>$key->thumb,
									"vid_id"=>$key->vid_id
								);
			}
		}
		$price = $get2->each_video_price;
		$disc = $get2->each_video_discount;
		$per = $disc/100;
		$discNow = $price*$per;
		$price_now = $price - $discNow;
		$mnVid = array
					(
						"title"=>$get->title,
						"preview_type"=>$get2->preview_type,
						"preview_link"=>$get2->preview_link,
						"preview"=>$get2->preview,
						"crsName"=>$get3->course_name,
						"chap_name"=>$get2->chap_name,
						"descr"=>$get->descr,
						"price"=>$get2->each_video_price,
						"disc"=>$get2->each_video_discount,
						"price_now"=>$price_now,
						"thumb"=>$get2->thumb,
						"simData"=>$simData
					);

		return $mnVid;
	}

	public function getStates()
	{
		$this->db->order_by("states_name");
		$get = $this->db->get("states");
		$res = $get->result();
		foreach ($res as $key) {
			
			$data[] = array("state"=>$key->states_name);
		}
		return $data;
	}

	public function aws_server()
	{
		$serv = $this->db->get("aws_setup")->row();
		$data = array
					(
						"serverUrl"=>$serv->server_url,
						"folders"=>$serv->view_folder
					);
		return $data;
	}
}