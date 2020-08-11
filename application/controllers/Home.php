<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('Home');
	}

	public function search()
	{
		$keyw = $this->input->post("keyw");
		$this->db->like("course_name",$keyw);
		$get = $this->db->get("courses");
		if($get->num_rows()==0)
		{
			$this->db->like("title",$keyw);
			$get2 = $this->db->get("chap_videos");
			if($get2->num_rows()==0)
			{
				return false;
			}
			else
			{
				$res2 = $get2->result();
				echo "<ul>";
				foreach ($res2 as $key2) { ?>
					<li onclick="slctVds('<?= $key2->vid_id; ?>')"><?= $key2->title; ?></li>
			<?php	}
			echo "<ul>";
			}
		}
		else
		{
			$res = $get->result();
			echo "<ul>";
			foreach ($res as $key) { ?>

					<li onclick="slctCrs('<?= $key->crs_id; ?>')"><?= $key->course_name; ?></li>

				
		<?php	}
		echo "</ul>";
		}

		
	}

	public function getPopVid()
	{
		$id = $this->input->post("id");
		$this->db->where(["crs_id"=>$id]);
		$get = $this->db->get("chapters");
		if($get->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$row = $get->row();
			$data = array("thumb"=>$row->thumb,"video_type"=>$row->preview_type,"vid_file"=>$row->preview,"vid_link"=>$row->preview_link);
		} ?>

			<?php if(!empty($data)){ ?>
				<?php if($data["video_type"]=="file"){ ?>
					<video class="video" style="width: 100%" autoplay="on">
						<source src="<?= base_url('uploads/videos/'.$data['vid_file']); ?>" type="video/mp4">
						
					</video>
				<?php }else{ ?>
					<iframe width="100%" height="315" src="https://www.youtube.com/embed/<?= $data['vid_link']; ?>" frameborder="0" ></iframe>
				<?php } ?>
			<?php } ?>
<?php
	}

	public function sendQuery()
	{
		echo "Under development";
	}
}
