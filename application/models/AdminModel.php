<?php
/**
 * 
 */
class AdminModel extends CI_model
{
	
	function getUser($user)
	{
		$this->db->where("admin_user",$user);
		$query = $this->db->get("admin");

		return $query;

	}

	//Add Category
	public function insrtCat($cat_name)
	{
		$this->db->where("cat_name",$cat_name);
		$get = $this->db->get("category");
		if($get->num_rows() > 0)
		{
			$return = "exst";
		}
		else
		{
			$this->db->insert("category",["cat_name"=>$cat_name]);
			$return = "succ";
		}
		return $return;
	}
	//All Category
	public function getAllCat()
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

	public function getCatById($id)
	{
		$this->db->where("id",$id);
		$getCat = $this->db->get("category");
		if($getCat->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$row = $getCat->row();
			$data = array("cat_name"=>$row->cat_name,"catId"=>$id);
		}

		return $data;
	}

	public function updateCat($cat_name,$id)
	{
		$this->db->where("id",$id);
		$this->db->update("category",["cat_name"=>$cat_name]);
		$return = "succ";
		return $return;
	}
	public function setCourse($crsId,$course_name,$descr)
	{
		$this->db->where("course_name",$course_name);
		$get = $this->db->get("courses");
		if($get->num_rows() > 0)
		{
			$return = "exst";
		}
		else
		{
			$this->db->order_by("position","DESC");
			$this->db->limit(1);
			$getCrrs = $this->db->get("courses")->row();
			$lastPosition = $getCrrs->position;
			$newPos = $lastPosition+1;
			$data = array
						(
							"crs_id"=>$crsId,
							"course_name"=>$course_name,
							"descr"=>$descr,
							"position"=>$newPos
						);
			$this->db->insert("courses",$data);
			$return = "succ";
		}
		return $return;
	}

	public function getAllCourse()
	{
		$get = $this->db->get("courses");
		if($get->num_rows()==0)
		{
			$datas = array();
		}
		else
		{
			$res = $get->result();
			foreach ($res as $key) 
			{
				$crsIds = $key->crs_id;
				$this->db->where("crs_id",$crsIds);
				$this->db->order_by("position","ASC");
				$get2 = $this->db->get("chapters");
				if($get2->num_rows()==0)
					{
						$chapData = array();
					}
					else
					{
						$res2 = $get2->result();
						foreach ($res2 as $key2) 
						{
							$chapData[] = array
											(
												"chapName"=>$key2->chap_name,
												"id"=>$key2->id,
												"crsIds"=>$key2->crs_id,
												"price"=>$key2->price,
												"discount"=>$key2->discount,
												"full_price"=>$key2->full_course_price,
												"full_discount"=>$key2->full_course_discount,
												"each_price"=>$key2->each_video_price,
												"each_discount"=>$key2->each_video_discount,

											);
						}
					
				
					}
					if($key->stat == 0)
					{
						$btn = "Publish";
						$txt = "Please Make sure that all settings have been completed.(Add Level, Level Images & Videos, Pricing Section). Otherwise it causes Error of functions. If All Done, Great! Publish Course";
					}
					else
					{
						$btn = "Unpublish";
						$txt = "Unpublish this Course? User will not be able to see course details on website.";
					}
					$data[]= array
						(
							"course_name"=>$key->course_name,
							"crsId"=>$key->crs_id,
							"descr"=>$key->descr,
							"chapData"=>$chapData,
							"btn"=>$btn,
							"txt"=>$txt,
							"totalCourse"=>$get->num_rows(),
							"crsPositions"=>$key->position
						);
			}

			
		}

		return $data;
	}

	public function getCrsByPosition()
	{
		$this->db->order_by("position","ASC");
		$get = $this->db->get("courses");
		if($get->num_rows()==0)
		{
			$res = array();
		}
		else
		{
			$res = $get->result();

		}

		return $res;
	}

	public function getCourseById($id)
	{
		$this->db->where("crs_id",$id);
		$get = $this->db->get("courses");
		if($get->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$row = $get->row();
			$data = array
						(
							"course_name"=>$row->course_name,
							"crsId"=>$row->crs_id,
							"descr"=>$row->descr
						);
		}

		return $data;
	}

	public function updtCourse($id,$course_name,$descr)
	{
		$data = array
						(
							"course_name"=>$course_name,
							"descr"=>$descr
						);
		$this->db->where("crs_id",$id);
		$this->db->update("courses",$data);
	}

	public function setChapter($crsId,$chapName,$position,$price,$descr)
	{
		$this->db->where(["chap_name"=>$chapName,"crs_id"=>$crsId]);
		$get = $this->db->get("chapters");
		if($get->num_rows() > 0)
		{
			$return = "exst";
		}
		else
		{
			$this->db->where(["crs_id"=>$crsId,"position"=>$position]);
			$get = $this->db->get("chapters");
			if($get->num_rows() > 0)
		{
			$return = "exstP";
		}
		else
		{
			$data = array
						(
							"chap_name"=>$chapName,
							"crs_id"=>$crsId,
							"position"=>$position,
							"price"=>$price,
							"descr"=>$descr
						);
			$this->db->insert("chapters",$data);
			$return = "succ";
		}
		}
		return $return;
	}

	public function getContents($id)
	{
		//$allData = array();
		//get Chapters
		$this->db->where("id",$id);
		$getChap = $this->db->get("chapters")->row();
		$crsId = $getChap->crs_id;
		//get Course
		$this->db->where("crs_id",$crsId);
		$getCrs = $this->db->get("courses")->row();
		//get Videos
		$this->db->where(["chap_id"=>$id,"trash"=>0]);
		$getVid = $this->db->get("chap_videos");
		if($getVid->num_rows()==0)
		{
			$vidData = array();
		}
		else
		{
			$resVid = $getVid->result();
			foreach ($resVid as $key) {
				$vidData[] = array
								(
									"title"=>$key->title,
									"descr"=>$key->descr,
									"thumb"=>$key->thumb,
									"video_file"=>$key->video_file,
									"vidId"=>$key->vid_id,
									"id"=>$key->id
								);
			}

			

		}
		$allData = array
							(
								"course_name"=>$getCrs->course_name,
								"chapName"=>$getChap->chap_name,
								"preview"=>$getChap->preview,
								"preview_link"=>$getChap->preview_link,
								"preview_type"=>$getChap->preview_type,
								"prthumb"=>$getChap->thumb,
								"courseDesc"=>$getCrs->descr,
								"allVideos"=>$vidData,
								"chapId"=>$getChap->id
							);

		return $allData;
	}

	public function setFirstStep($title,$desc,$vidId,$chapId)
	{
		$this->db->where("vid_id",$vidId);
		$get = $this->db->get("chap_videos");
		if($get->num_rows() > 0)
		{
			$return = "exst";
		}
		else
		{
			$this->db->where("id",$chapId);
			$get2 = $this->db->get("chapters")->row();
			$data = array
						(
							"vid_id"=>$vidId,
							"crs_id"=>$get2->crs_id,
							"chap_id"=>$chapId,
							"title"=>$title,
							"descr"=>$desc
						);
			$this->db->insert("chap_videos",$data);
			$return = "succ";
		}

		return $return;
	}

	public function uploadVideoFile($vidId,$video_name,$thumbImg)
	{
		$this->db->where("vid_id",$vidId);
		$this->db->update("chap_videos",["video_type"=>"file","thumb"=>$thumbImg,"video_file"=>$video_name]);
		$this->db->where("vid_id",$vidId);
		$get = $this->db->get("chap_videos")->row();
		$chapId = $get->chap_id;

		return $chapId;
	}

	public function uploadpreviewFile($id,$video_name,$thumbImg)
	{
		$this->db->where("id",$id);
		$this->db->update("chapters",["preview_type"=>"file","preview"=>$video_name,"preview_link"=>null,"thumb"=>$thumbImg]);
	}

	public function delVidfile($id)
	{
		$this->db->where("id",$id);
		$get = $this->db->get("chap_videos")->row();
		$vid = $get->video_file;
		$thmb = $get->thumb;
		$dir = "uploads/videos/".$vid;
		$dirth = "uploads/videos/".$thmb;
		//@unlink($dir); @unlink($dirth);
		$this->db->where("id",$id);
		$this->db->update("chap_videos",["trash"=>1]);
	}

	public function delPreview($id)
	{
		$this->db->where("id",$id);
		$get = $this->db->get("chapters")->row();
		$vid = $get->preview;
		$thmb = $get->thumb;
		$dir = "uploads/videos/".$vid;
		$dirth = "uploads/videos/".$thmb;
		//unlink($dir); unlink($dirth);
		$this->db->where("id",$id);
		$this->db->update("chapters",["preview"=>null,"thumb"=>null]);
	}

	public function getVidById($vidId)
	{
		$this->db->where(["vid_id"=>$vidId, "trash"=>0]);
		$get = $this->db->get("chap_videos");
		if($get->num_rows()==0)
		{
			$vidDataAll = array();
		}
		else
		{
			$rowVid = $get->row();
			$crsId = $rowVid->crs_id;
			$chapId = $rowVid->chap_id;
			$this->db->where(["chap_id"=>$chapId,"trash"=>0]);
			$getVid = $this->db->get("chap_videos");
			
				$resVid = $getVid->result();
				foreach ($resVid as $key) {
					if($key->vid_id == $vidId)
					{
						$disabled = "disbl";
					}
					else{$disabled = "no";}
					$vidData[] = array
									(
										"title"=>$key->title,
										"descr"=>$key->descr,
										"thumb"=>$key->thumb,
										"video_file"=>$key->video_file,
										"vidId"=>$key->vid_id,
										"id"=>$key->id,
										"disbl"=>$disabled,

									);
				}
		}

		$vidDataAll = array
							(
								"playVid"=>$rowVid->video_file,
								"playThumb"=>$rowVid->thumb,
								"playTitle"=>$rowVid->title,
								"playDescr"=>$rowVid->descr,
								"allVideos"=>$vidData,
								"chapId"=>$chapId,
								"video_link"=>$rowVid->video_link,
								"video_type"=>$rowVid->video_type
							);
		return $vidDataAll;
	}

	public function setPriceChap($id,$price,$target)
	{
		if($target=="fl"){ $tbl = "full_course_price"; }
		elseif($target=="fd"){ $tbl = "full_course_discount"; }
		elseif($target=="lvp"){ $tbl = "price"; }
		elseif($target=="lvd"){ $tbl = "discount"; }
		elseif($target=="ec"){ $tbl = "each_video_price"; }
		elseif($target=="ecd"){ $tbl = "each_video_discount"; }
		else{$tbl = ""; }
		$this->db->where("id",$id);
        $set = $this->db->update("chapters",["$tbl"=>$price]);
	}

	public function setDiscountChap($id,$discount)
	{
		$this->db->where("id",$id);
        $set = $this->db->update("chapters",["discount"=>$discount]);
	}

	public function getAnalytics()
	{
		$this->db->select("vid_id");
		$this->db->distinct();
		$get = $this->db->get("video_watch_analysis");
		if($get->num_rows()==0)
		{
			$allData[] = array();
		}
		else
		{
			$res = $get->result();
			foreach ($res as $key) {
				$this->db->where("vid_id",$key->vid_id);
				$this->db->select_sum("watch_time");
				$getVid = $this->db->get("video_watch_analysis")->row();
				if($getVid->watch_time >=3600)
				{
					$times = round($getVid->watch_time / 3600)." Hours";
				}
				elseif($getVid->watch_time >=60)
				{
					$times = round($getVid->watch_time / 60)." Minutes";
				}
				else
				{
					$times = $getVid->watch_time." Seconds";
				}
				$this->db->where("vid_id",$key->vid_id);
				$rro = $this->db->get("chap_videos");
				if(!$rro->num_rows()==0)
				{
					$getRow = $rro->row();
					$title = $getRow->title;

					$this->db->where("crs_id",$getRow->crs_id);
					$getCrs = $this->db->get("courses")->row();
					$course_name = @$getCrs->course_name;

					$this->db->where("id",$getRow->chap_id);
					$getChap = $this->db->get("chapters")->row();
					$chap_name = $getChap->chap_name;
				}
				else
				{
					$course_name="";
					$chap_name = "";
					$title = "";
				}
				$allData[] = array
									(
										"vid_id"=>$key->vid_id,
										"watch_time"=>$times,
										"course_name"=>$course_name,
										"chapName"=>$chap_name,
										"videoTitle"=>$title
									);
			}

				
		}


		return $allData;
	}

	public function getAnalyticsDetails($vid_id)
	{
		$this->db->where("vid_id",$vid_id);
		$gtsvids= $this->db->get("video_watch_analysis");
		if($gtsvids->num_rows()==0)
		{
			$dataArray = array();
		}
		else
		{
			$getRow = $gtsvids->result();
			foreach ($getRow as $key) {
				//get User
				$this->db->where("id",$key->user_id);
				$getUser = $this->db->get("users_profile")->row();
				//get Video Details
				$this->db->where("vid_id",$vid_id);
				$getRow = $this->db->get("chap_videos")->row();

					$this->db->where("crs_id",$getRow->crs_id);
					$getCrs = $this->db->get("courses")->row();

					$this->db->where("id",$getRow->chap_id);
					$getChap = $this->db->get("chapters")->row();

					if($key->watch_time >=3600)
					{
						$times = round($key->watch_time / 3600)." Hours";
					}
					elseif($key->watch_time >=60)
					{
						$times = round($key->watch_time / 60)." Minutes";
					}
					else
					{
						$times = $key->watch_time." Seconds";
					}
				$dataArray[] = array
									(
										"vid_id"=>@$key->vid_id,
										"user_id"=>@$key->user_id,
										"user_name"=>@$getUser->name,
										"ip"=>@$key->ip,
										"date"=>@$key->date,
										"watch_time"=>@$times,
										"level"=>@$getChap->chap_name,
										"course"=>@$getCrs->course_name,
										"title" =>@$getRow->title,
										"email"=>@$getUser->email,
										"mobile"=>@$getUser->mobile
									);
			}
		}

		return $dataArray;
	}

	public function getAllUsers()
	{
		$get = $this->db->get("users_profile");
		if($get->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$res = $get->result();
			foreach ($res as $key) {
				$data[] = array
								(
									"name"=>@$key->name,
									"email"=>@$key->email,
									"mobile"=>@$key->mobile,
									"user_id"=>@$key->id
								);
			}
		}
		return $data;
	}

	public function getPurchsedData($userId)
	{
		$this->db->where(["userid"=>$userId,"payment_status"=>"success"]);
		$get = $this->db->get("transactions");
		if($get->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$res = $get->result();
			foreach ($res as $key) {
				$dt = date_create($key->date);
				$date = date_format($dt,"F")." ".date_format($dt,"d").", ".date_format($dt,"Y");
				if($key->plan == "basic")
				{
					//$id = $key->cat_id;
					$expls = explode(",", $key->cat_id);
					foreach ($expls as $id) {
						
					
					$this->db->where("vid_id",$id);
					$getVid = $this->db->get("chap_videos")->row(); 

					$this->db->where("crs_id",@$getVid->crs_id);
					$getCrs = $this->db->get("courses")->row();

					$this->db->where("id",@$getVid->chap_id);
					$getChap = $this->db->get("chapters")->row();

					$purchesed = "Single Video (".@$getCrs->course_name." -> ".@$getChap->chap_name.")";
					$crs_lvl = array();
					$vidsNewbasic = [];
					$this->db->where("vid_id",$id);
					$getcpVid = $this->db->get("chap_videos")->result();
							foreach ($getcpVid as $keyvd) {
								$this->db->where("vid_id",@$keyvd->vid_id);
								$this->db->select_sum("watch_time");
								$wtch = $this->db->get("video_watch_analysis")->row();
								if($wtch->watch_time >=3600)
								{
									$times = round($wtch->watch_time / 3600)." Hours";
								}
								elseif($wtch->watch_time >=60)
								{
									$times = round($wtch->watch_time / 60)." Minutes";
								}
								else
								{
									$times = $wtch->watch_time." Seconds";
								}
								$vidsNewbasic[] = array
												(
													"title"=>@$keyvd->title,
													"thumb"=>@$keyvd->thumb,
													"vid_id"=>@$keyvd->vid_id,
													"watch_time"=>@$times
												); 
							}
						}
					$vidsNew = array();
				}
				elseif($key->plan == "level")
				{
					$id = $key->cat_id;
					$this->db->where("id",$id);
					$getChap = $this->db->get("chapters")->row();
					$this->db->where("crs_id",@$getChap->crs_id);
					$getCrs = $this->db->get("courses")->row();
					$purchesed = "All Videos of ".@$getChap->chap_name." (".@$getCrs->course_name.")";

					$this->db->where("chap_id",@$getChap->id);
					$getcpVid = $this->db->get("chap_videos")->result();
							foreach ($getcpVid as $keyvd) {
								$this->db->where("vid_id",@$keyvd->vid_id);
								$this->db->select_sum("watch_time");
								$wtch = $this->db->get("video_watch_analysis")->row();
								if($wtch->watch_time >=3600)
								{
									$times = round($wtch->watch_time / 3600)." Hours";
								}
								elseif($wtch->watch_time >=60)
								{
									$times = round($wtch->watch_time / 60)." Minutes";
								}
								else
								{
									$times = $wtch->watch_time." Seconds";
								}
								$vidsNew[] = array
												(
													"title"=>@$keyvd->title,
													"thumb"=>@$keyvd->thumb,
													"vid_id"=>@$keyvd->vid_id,
													"watch_time"=>@$times
												); 
							}
					$crs_lvl = array();
					$vidsNewbasic = array();

				}
				elseif($key->plan == "cours")
				{
					$id = $key->cat_id;
					$this->db->where("crs_id",$id);
					$getCrs = $this->db->get("courses")->row();
					$purchesed = @$getCrs->course_name;

					$this->db->where("crs_id",@$getCrs->crs_id);
					$getChap = $this->db->get("chapters")->result();
					$crs_lvl = [];
						foreach ($getChap as $keycp) {
							$this->db->where("chap_id",$keycp->id);
							$vids = [];
							$getcpVid = $this->db->get("chap_videos")->result();
							foreach ($getcpVid as $keyvd) {
								$this->db->where("vid_id",$keyvd->vid_id);
								$this->db->select_sum("watch_time");
								$wtch = $this->db->get("video_watch_analysis")->row();
								if($wtch->watch_time >=3600)
								{
									$times = round($wtch->watch_time / 3600)." Hours";
								}
								elseif($wtch->watch_time >=60)
								{
									$times = round($wtch->watch_time / 60)." Minutes";
								}
								else
								{
									$times = $wtch->watch_time." Seconds";
								}
								$vids[] = array
												(
													"title"=>$keyvd->title,
													"thumb"=>$keyvd->thumb,
													"vid_id"=>$keyvd->vid_id,
													"watch_time"=>$times
												); 
							}
							$crs_lvl[] = array
												(
													"chap_name"=>$keycp->chap_name,
													"chap_id"=>$keycp->id,
													"vids"=>$vids
												);
						}

						$vidsNew = array();
						$vidsNewbasic = array();
					
				}
				$data[] = array
								(
									"date"=>@$date,
									"order_id"=>@$key->order_id,
									"purchesed"=>@$purchesed,
									"crs_lvl"=>@$crs_lvl,
									"txnId"=>@$key->txn_id,
									"status"=>@$key->payment_status,
									"snglVids"=>@$vidsNew,
									"basic_vid"=>@$vidsNewbasic
								);
			}
		}

		return $data;
	}

	public function getUsersById($userId)
	{
		$this->db->where("id",$userId);
		$get = $this->db->get("users_profile")->row();
		$data = array
					(
						"name"=>$get->name,
						"email"=>$get->email,
						"mobile"=>$get->mobile

					);
		return $data;

	}

	public function getAnaly($userId)
	{

	}

	public function serWhatLearn($crs_id,$wht)
	{
		$this->db->where("crs_id",$crs_id);
		$get = $this->db->get("course_meta");
		$data = array
					(
						"crs_id"=>$crs_id,
						"what_learn"=>$wht
					);
		if($get->num_rows()==0)
		{
			$this->db->insert("course_meta",$data);
			$return = "added";
		}
		else
		{
			$this->db->where("crs_id",$crs_id);
			$this->db->update("course_meta",["what_learn"=>$wht]);
			$return = "updated";
		}

		return $return;
	}

	public function getWhatLearn($crs_id)
	{
		$this->db->where("crs_id",$crs_id);
		$get = $this->db->get("course_meta");
		if($get->num_rows()==0)
		{
			$data = array("what_learn"=>"");
		}
		else
		{
			$row = $get->row();
			$data = array
						(
							"what_learn"=>$row->what_learn
						);
		}

		return $data;
	}

	public function setFAQ($qstn,$answr,$crs_id)
	{
		$this->db->where(["crs_id"=>$crs_id,"qstion"=>$qstn]);
		$get = $this->db->get("course_faq");
		if($get->num_rows() > 0)
		{
			$return = "fld";
		}
		else
		{
			$this->db->insert("course_faq",["crs_id"=>$crs_id,"qstion"=>$qstn,"answr"=>$answr]);
			$return = "succ";
		}

		return $return;

	}

	public function getFaq($crs_id)
	{
		$this->db->where(["crs_id"=>$crs_id]);
		$get = $this->db->get("course_faq");
		if($get->num_rows()== 0)
		{
			$arrayName = array();
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
		return $arrayName;
	}

	public function setIncl($crsIncl,$crs_id)
	{
		$this->db->where("crs_id",$crs_id);
		$this->db->update("courses",["course_included"=>$crsIncl]);
	}
	public function inclData($crs_id)
	{
		$this->db->where("crs_id",$crs_id);
		$get = $this->db->get("courses");
		$row = $get->row();
		if($row->course_img == null)
		{
			$image = "defaul_course_img.png";
		}
		else
		{
			$image = $row->course_img;
		}
		$data = array("incldt"=>$row->course_included,"crs_img"=>$image);
		return $data;
	}

	public function setCrsImg($crs_id,$thumbImg)
	{
		$this->db->where("crs_id",$crs_id);
		$this->db->update("courses",["course_img"=>$thumbImg]);
	}

	public function uploadLink($id,$video_link,$thumbImg)
	{
		$this->db->where("vid_id",$id);
		$this->db->update("chap_videos",["video_type"=>"link","thumb"=>$thumbImg,"video_file"=>null,"video_link"=>$video_link]);
		$this->db->where("vid_id",$id);
		$get = $this->db->get("chap_videos")->row();
		$chapId = $get->chap_id;

		return $chapId;
	}

	public function changPass($old_pass,$new_passd,$admin)
	{
		$this->db->where("admin_user",$admin);
		$get= $this->db->get("admin")->row();
		$new_pass = password_hash($new_passd, PASSWORD_DEFAULT);
		if(!password_verify($old_pass, $get->password))
		{
			$return = "old";
		}
		else
		{
			$this->db->where("admin_user",$admin);
			$this->db->update("admin",["password"=>$new_pass]);
			$return = "succ";
		}
			return $return;
	}

	public function uploadPreviewLink($id,$preview_link,$thumbImg)
	{
		$this->db->where("id",$id);
		$this->db->update("chapters",["preview_type"=>"link","preview"=>null,"preview_link"=>$preview_link,"thumb"=>$thumbImg]);

	}

	public function UserPurchasedCourses()
	{
		$this->db->where(["payment_status"=>"success"]);
		$get = $this->db->get("transactions");
		if($get->num_rows()==0)
		{
			$allData = array();
		}
		else
		{
			$res = $get->result();
			foreach ($res as $key) {
				$this->db->where("id",$key->userid);
				$gtUser = $this->db->get("users_profile")->row();
				if($key->plan =="basic")
				{
					$expl = explode(",", $key->cat_id);
					$course = [];
					foreach($expl as $kk)
					{
						$this->db->where("vid_id",$kk);
						$crs = $this->db->get("chap_videos")->row();

						$this->db->where("crs_id",$crs->crs_id);
					$crss = $this->db->get("courses")->row();
					$course[] = $crs->title." (".$key->course_name.")";
					}

					
				}
				elseif($key->plan =="level")
				{
					$course = array();
					$this->db->where("id",$key->cat_id);
					$crs = $this->db->get("chapters")->row();

					$this->db->where("crs_id",$crs->crs_id);
					$crss = $this->db->get("courses")->row();
					$course = $crs->chap_name." (".$crss->course_name.")";
				}
				elseif($key->plan =="cours")
				{
					$this->db->where("crs_id",$key->cat_id);
					$crs = $this->db->get("courses")->row();
					$course = @$crss->course_name;
				}
				else
				{
					$crs = array();
				}
				$dt = date_create($key->date);
				$date = date_format($dt,'d')." ".date_format($dt,'F').", ".date_format($dt,'Y');


				$allData[] = array
							(
								"date"=>$date,
								"orderId"=>$key->order_id,
								"user"=>$gtUser->name,
								"mobile"=>$gtUser->mobile,
								"email"=>$gtUser->email,
								"course"=>$course,
								"plan"=>$key->plan,
								"txnId"=>$key->txn_id
							);
			}


		}
		return $allData;
	}

	public function setSuperAdmin($user,$email,$mobile,$pass)
	{
		$this->db->where("admin_user",$user);
		$get1 = $this->db->get("admin")->num_rows();
		if($get1 > 0)
		{
			$return ="exstUser";
		}
		else
		{
			$this->db->where("email",$email);
			$get2 = $this->db->get("admin")->num_rows();
			if($get2 > 0)
			{
				$return = "exstEmail";
			}
			else
			{
				$this->db->where("mobile",$mobile);
				$get3 = $this->db->get("admin")->num_rows();
				if($get3 > 0)
				{
					$return = "exstMob";
				}
				else
				{
					$data = array
								(
									"admin_user"=>$user,
									"password"=>$pass,
									"email"=>$email,
									"mobile"=>$mobile,
									"type"=>"sprAdmin"
								);
					$this->db->insert("admin",$data);
					$return = "succ";
				}
			}
		}

		return $return;
	}

	public function getSuperAdmin()
	{
		$this->db->where(["type"=>"sprAdmin"]);
		$get = $this->db->get("admin");
		if($get->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$res = $get->result();
			foreach ($res as $key) {
				$data[] = array
								(
									"user"=>$key->admin_user,
									"email"=>$key->email,
									"mobile"=>$key->mobile,
									"id"=>$key->id
								);
			}
		}

		return $data;
	}
	public function gtUserAdmin($id)
	{
		$this->db->where("id",$id);
		$get = $this->db->get("admin");
		if($get->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$row = $get->row();
			$data = ["user"=>$row->admin_user,"email"=>$row->email,"mobile"=>$row->mobile];
		}

		return $data;

	}

	public function UpdateSuperAdmin($user,$email,$mobile)
	{

		$this->db->where(["admin_user!="=>$user,"email"=>$email]);
		$get2 = $this->db->get("admin")->num_rows();
		if($get2 > 0)
		{
			$return = "exstEmail";
		}
		else
		{
			$this->db->where(["admin_user!="=>$user,"mobile"=>$mobile]);
			$get3 = $this->db->get("admin")->num_rows();
			if($get3 > 0)
			{
				$return = "exstMob";
			}
			else
			{
					$data = array
								(
									"email"=>$email,
									"mobile"=>$mobile,
								);
				$this->db->where(["admin_user"=>$user]);
				$this->db->update("admin",$data);
					$return = "succ";
			}
		
		}

		return $return;
	}

	public function setCoupon($code,$discount,$valid,$date)
	{
		$this->db->where("coupon_code",$code);
		$get = $this->db->get("coupons");
		if($get->num_rows() > 0)
		{
			$return = "ex";
		}
		else
		{
			$data = array
						(
							"coupon_code"=>$code,
							"discount_type"=>"percent",
							"discount"=>$discount,
							"valid_for"=>$valid,
							"date"=>$date,
							"status"=>1
						);
			$this->db->insert("coupons",$data);
			$return = "succ";
		}
		return $return;
	}

	public function getCoupons()
	{
		$this->db->where(["status"=>1]);
		$get = $this->db->get("coupons");
		if($get->num_rows()== 0)
		{
			$data = array();
		}
		else
		{
			$res = $get->result();
			foreach ($res as $key ) {
				$data[] = array
								(
									"coupon_code"=>$key->coupon_code,
									"discount"=>$key->discount,
									"valid_for"=>$key->valid_for,
									"date"=>$key->date,
									"status"=>$key->status,
									"id"=>$key->id
								);
			}
		}

		return $data;
	}

	public function getCompGst()
	{
		$get = $this->db->get("tax_setup")->row();
		$data = array
					(
						"comp"=>$get->comp_name,
						"address"=>$get->address,
						"gstin"=>$get->gstin,
						"percents"=>$get->percents
					);
		return $data;
	}

	public function uplTeaser($id,$video_name,$fileName)
	{
		$data = array();
		$this->db->where("crs_id",$id);
		$getTsr = $this->db->get("teaser_videos");
		if($getTsr->num_rows() > 0)
		{
			$this->db->where("crs_id",$id);
			$this->db->update("teaser_videos",["thumb"=>$fileName,"vid_file"=>$video_name]);
			$return = "updt";
		}
		else
		{
			$data = array
						(
							"crs_id"=>$id,
							"thumb"=>$fileName,
							"vid_file"=>$video_name
						);
			$this->db->insert("teaser_videos",$data);
			$return = "insrt";
		}

		return $return;
	}

	public function getTeaserVideo($crs_id)
	{
		$this->db->where("crs_id",$crs_id);
		$getTsr = $this->db->get("teaser_videos");
		if($getTsr->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$row = $getTsr->row();
			$data = array
							(
								"crs_id"=>$row->crs_id,
								"thumb"=>$row->thumb,
								"vid_file"=>$row->vid_file
							);
		}

		return $data;
	}

	public function dashboardData()
	{
		$this->db->order_by("position","ASC");
		$getCrs = $this->db->get("courses");
		if($getCrs->num_rows()==0)
		{
			$crsData = array();
		}
		else
		{
			$crsar = $getCrs->result();
			foreach ($crsar as $keyCrs) {
				$this->db->where("crs_id",$keyCrs->crs_id);
				$totLvl = $this->db->get("chapters")->num_rows();

				$this->db->where("crs_id",$keyCrs->crs_id);
				$totVids = $this->db->get("chap_videos")->num_rows();

				$crsData[] = array
									(
										"course_name"=>$keyCrs->course_name,
										"totVids"=>$totVids,
										"totLvl"=>$totLvl
									);
			}
		}

		$get = $this->db->get("users_profile");
		if($get->num_rows()==0)
		{
			$usrData = array();
		}
		else
		{
			$res = $get->result();
			foreach ($res as $key) {
				$usrData[] = array
								(
									"name"=>$key->name,
									"email"=>$key->email,
									"mobile"=>$key->mobile,
									"user_id"=>$key->id
								);
			}
		}

		$this->db->select("vid_id");
		$this->db->distinct();
		$get = $this->db->get("video_watch_analysis");
		if($get->num_rows()==0)
		{
			$allData[] = array();
		}
		else
		{
			$res = $get->result();
			foreach ($res as $key) {
				$this->db->where("vid_id",$key->vid_id);
				$this->db->select_sum("watch_time");
				$getVid = $this->db->get("video_watch_analysis")->row();
				if($getVid->watch_time >=3600)
				{
					$times = round($getVid->watch_time / 3600)." Hours";
				}
				elseif($getVid->watch_time >=60)
				{
					$times = round($getVid->watch_time / 60)." Minutes";
				}
				else
				{
					$times = $getVid->watch_time." Seconds";
				}
				$this->db->where("vid_id",$key->vid_id);
				$rro = $this->db->get("chap_videos");
				if(!$rro->num_rows()==0)
				{
					$getRow = $rro->row();
					$title = @$getRow->title;

					$this->db->where("crs_id",$getRow->crs_id);
					$getCrs = $this->db->get("courses")->row();
					$course_name = @$getCrs->course_name;

					$this->db->where("id",$getRow->chap_id);
					$getChap = $this->db->get("chapters")->row();
					$chap_name = @$getChap->chap_name;
				}
				else
				{
					$course_name="";
					$chap_name = "";
					$title = "";
				}
				$allData[] = array
									(
										"vid_id"=>@$key->vid_id,
										"watch_time"=>@$times,
										"course_name"=>@$course_name,
										"chapName"=>@$chap_name,
										"videoTitle"=>@$title
									);
			}

				
		


		

		$data = array
					(
						"crsData"=>@$crsData,
						"usrData"=>@$usrData,
						"allData"=>@$allData
					);
				}


		return $data;
	}
}