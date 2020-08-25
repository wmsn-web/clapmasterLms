<?php
/**
 * 
 */
class MoreAboutCourses extends CI_controller
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
		$getAllCourse = $this->AdminModel->getAllCourse();
		//$this->load->view("admin/MoreAboutCourses",["data"=>$getAllCourse]);
		if($this->uri->segment(4)=="edit")
		{
			if(!$this->uri->segment(5))
			{
				$this->session->set_flashdata("Feed","Invalid Selection");
				return redirect('admin_panel/MoreAboutCourses');
			}
			else
			{
				$crs_id = $this->uri->segment(5);
				$getWhatLearn = $this->AdminModel->getWhatLearn($crs_id);
				$getFaq	= $this->AdminModel->getFaq($crs_id);
				$inclData = $this->AdminModel->inclData($crs_id);
				$getTsr = $this->AdminModel->getTeaserVideo($crs_id);
				//print_r($getFaq);
			    $this->load->view("admin/MoreAboutCourses",["data"=>$getAllCourse,"wht"=>$getWhatLearn,"faq"=>$getFaq,"incl"=>$inclData,"getTsr"=>$getTsr]);
			}
		}else
		{
			
			$this->load->view("admin/MoreAboutCourses",["data"=>$getAllCourse]);
		}
	}

	public function setWht()
	{
		$wht = htmlentities($this->input->post("wht"));
		$crs_id = $this->input->post("crs_id");
		$serWhatLearn = $this->AdminModel->serWhatLearn($crs_id,$wht);
		if($serWhatLearn == "added")
		{
			$this->session->set_flashdata("Feed","Content Added");
			return redirect('admin_panel/MoreAboutCourses/index/edit/'.$crs_id);
		}
		else
		{
			$this->session->set_flashdata("Feed","Content Updated");
			return redirect('admin_panel/MoreAboutCourses/index/edit/'.$crs_id);
		}
	}

	public function setFaq()
	{
		$qstn = htmlentities($this->input->post("qstn"));
		$answr = htmlentities($this->input->post("answr"));
		$crs_id = $this->input->post("crs_id");
		$setFAQ = $this->AdminModel->setFAQ($qstn,$answr,$crs_id);
		if($setFAQ == "succ")
		{
			$this->session->set_flashdata("Feed","FAQ Added");
			return redirect('admin_panel/MoreAboutCourses/index/edit/'.$crs_id);
		}
		else
		{
			$this->session->set_flashdata("Feed","FAQ Already Exist!");
			return redirect('admin_panel/MoreAboutCourses/');
		}
	}

	public function delFaq($id)
	{
		$this->db->where("id",$id);
		$this->db->delete("course_faq");
		$this->session->set_flashdata("Feed","FAQ Deleted");
			return redirect('admin_panel/MoreAboutCourses/');
	}

	public function incl()
	{

		$crsIncl = htmlentities($this->input->post("crsIncl"));
		$crs_id = $this->input->post("crs_id");
		$setIncl = $this->AdminModel->setIncl($crsIncl,$crs_id);
		$this->session->set_flashdata("Feed","Course Included Updated");
			return redirect('admin_panel/MoreAboutCourses/');
	}
	public function setImg()
	{
		$crs_id = $this->input->post("crs_id");
				$config['upload_path']          = './uploads/videos/';
                $config['max_size'] = '*';
				$config['allowed_types'] = 'jpg|png|jpeg|JPEG|JPG|PNG|GIF|gif'; # add video extenstion on here
				$config['remove_spaces'] = TRUE;
				$fileName = mt_rand(0000000, 9999999);
				$config['file_name'] = $fileName;
                
                $this->load->library('upload', $config);

                $this->upload->do_upload('thumbs');
                $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
						$thumbImg = $upload_data['file_name'];
				$upl = $this->AdminModel->setCrsImg($crs_id,$thumbImg);
				$this->session->set_flashdata("Feed","Course Image Updated");
			return redirect('admin_panel/MoreAboutCourses/');
	}

	public function teaservid()
	{
		$id = $this->input->post("crs_id");
		$video_name = $this->input->post("vidfile");
		//Thumb Image Upload
				$config['upload_path']          = './uploads/videos/';
                $config['max_size'] = '*';
				$config['allowed_types'] = '*'; # add video extenstion on here
				$config['remove_spaces'] = TRUE;
				$fileName = mt_rand(0000000, 9999999);
				$config['file_name'] = $fileName;
                
                $this->load->library('upload', $config);

                $this->upload->do_upload('thumbs');
                $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
						$thumbImg = $upload_data['file_name'];
			$uplTeaser = $this->AdminModel->uplTeaser($id,$video_name,$fileName);
			if($uplTeaser == "updt")
			{
				$this->session->set_flashdata("Feed","Teaser Video Updated Successfully");
				return redirect("admin_panel/MoreAboutCourses/index/edit/".$id);
			}
			else
			{
				$this->session->set_flashdata("Feed","Teaser Video Added Successfully");
				return redirect("admin_panel/MoreAboutCourses/index/edit/".$id);
			}
	}
}