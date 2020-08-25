<?php
/**
 * 
 */
class ChapterContent extends CI_controller  
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
	public function index($id)
	{
		$this->db->where("id",$id);
		$get = $this->db->get("chapters")->num_rows();
		if($get == 0)
		{
			return redirect("admin_panel/AllCourses");
		}
		else
		{
			$getContents = $this->AdminModel->getContents($id); 
			//echo "<pre>";
			//print_r($getContents);
			$data = $getContents;
			$this->load->view("admin/ChapterContent",["data"=>$data]);
		}
	}

	public function addContent($id)
	{
		$this->load->view("admin/addContent"); 
	}

	public function addFirstStep()
	{
		$title = $this->input->post("title");
		$desc = htmlentities($this->input->post("desc"));
		$vidId = $this->input->post("vidId");
		$chapId = $this->input->post("chapId");
		$setFirstStep = $this->AdminModel->setFirstStep($title,$desc,$vidId,$chapId);
		if($setFirstStep=="succ")
		{
			$this->session->set_flashdata("Feed","Step One Completed Successfully.");
			return redirect("admin_panel/ChapterContent/stepNext/".$vidId);
		}
		else
		{
			$this->session->set_flashdata("Feed","Titile Exist");
			return redirect("admin_panel/ChapterContent/addContent/".$chapId);
		}
	}

	public function stepNext($id)
	{
		$this->load->view("admin/addContent");
	}

	public function addNextStep()
	{
		$vidId = $this->input->post("vidId");
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
				$upl = $this->AdminModel->uploadVideoFile($vidId,$video_name,$thumbImg);
                        $this->session->set_flashdata("Feed","Video Uploaded Successfully");
                        return redirect("admin_panel/ChapterContent/index/$upl");
				

				/*


                $configVideo['max_size'] = '*';
				$configVideo['allowed_types'] = '*'; # add video extenstion on here
				$configVideo['overwrite'] = TRUE;
				$configVideo['remove_spaces'] = TRUE;
				$configVideo['quality'] = '80%';
				$video_name = mt_rand(0000000, 9999999);
				$configVideo['file_name'] = $video_name;
                
                $this->load->library('upload', $configVideo);

                if ( ! $this->upload->do_upload('vidfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $echo = $this->session->set_flashdata("FL","Maximum size issue!");
                        print_r($error);
                        //return redirect("admin_panel/ChapterContent/stepNext/".$vidId);
                }
                else
                {
                        
                        $upload_data2 = $this->upload->data();
                        $video_name =$upload_data2['file_name'];
                        $vidId = $this->input->post("vidId");
                        $upl = $this->AdminModel->uploadVideoFile($vidId,$video_name,$thumbImg);
                        $this->session->set_flashdata("Feed","Video Uploaded Successfully");
                        return redirect("admin_panel/ChapterContent/index/$upl");
                }
                */
                
	}

	public function addpreview()
	{
		$this->load->view("admin/addContent");
	}

	public function uplPreview()
	{
		$id = $this->input->post("id");
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
				
				$upl = $this->AdminModel->uploadpreviewFile($id,$video_name,$thumbImg);
                        $this->session->set_flashdata("Feed","Video Uploaded Successfully");
                        return redirect("admin_panel/ChapterContent/index/$id");
	}

	public function delVid($id)
	{
		$chapId = $this->uri->segment(5);
		$del = $this->AdminModel->delVidfile($id);
		$this->session->set_flashdata("Feed","Video Deleted");
         return redirect("admin_panel/ChapterContent/index/$chapId"); 
	}

	public function delPrev($id)
	{
		$del = $this->AdminModel->delPreview($id);
		$this->session->set_flashdata("Feed","Preview Video Deleted");
         return redirect("admin_panel/ChapterContent/index/$id");
	}

	public function uplLink()
	{
		$id = $this->input->post("id");
		$video_link = $this->input->post("video_link");
		$config['upload_path']          = './uploads/videos/';
        $config['max_size'] = '*';
		$config['allowed_types'] = 'png|PNG|jpg|JPG|gif|GIF|JPEG|jpeg'; # add video extenstion on here
		$config['remove_spaces'] = TRUE;
		$fileName = mt_rand(0000000, 9999999);
		$config['file_name'] = $fileName;
        
        $this->load->library('upload', $config);

        $this->upload->do_upload('thumbs');
        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
		$thumbImg = $upload_data['file_name'];
		$upls = $this->AdminModel->uploadLink($id,$video_link,$thumbImg);
		$this->session->set_flashdata("Feed","Video Uploaded Successfully");
        return redirect("admin_panel/ChapterContent/index/$upls");
	}

	public function uplLinkPreview()
	{
		$preview_link = $this->input->post("preview_link");
		$id = $this->input->post("id");
		
		$video_link = $this->input->post("video_link");
		$config['upload_path']          = './uploads/videos/';
        $config['max_size'] = '*';
		$config['allowed_types'] = 'png|PNG|jpg|JPG|gif|GIF|JPEG|jpeg'; # add video extenstion on here
		$config['remove_spaces'] = TRUE;
		$fileName = mt_rand(0000000, 9999999);
		$config['file_name'] = $fileName;
        
        $this->load->library('upload', $config);

        $this->upload->do_upload('thumbs');
        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
		$thumbImg = $upload_data['file_name'];
		$upls = $this->AdminModel->uploadPreviewLink($id,$preview_link,$thumbImg);
		$this->session->set_flashdata("Feed","Video Uploaded Successfully");
        return redirect("admin_panel/ChapterContent/index/$id");


	}

	public function EditVidFile()
	{
		echo "done";
		$vid_id = $this->input->post("vid_id");
		$vid_name = $this->input->post("vid_name");
		$this->db->where("vid_id",$vid_id);
		$this->db->update("chap_videos",["video_file"=>$vid_name]);

	}

	public function EditPreviewFile()
	{
		echo "done";
		$chapId = $this->input->post("chapId");
		$vid_name = $this->input->post("vid_name");
		$this->db->where("id",$chapId);
		$this->db->update("chapters",["preview"=>$vid_name]);
	}
}