<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
//Cpanel Pss    #N*kBnSPf]Z%
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
		$get = $this->db->get("teaser_videos");
		if($get->num_rows()==0)
		{
			$data = array();
		}
		else
		{
			$row = $get->row();
			$data = array("thumb"=>$row->thumb,"vid_file"=>$row->vid_file);
		} ?>

			<?php if(!empty($data)){ ?>
				<?php $aws_server = $this->SiteModel->aws_server(); ?>
					<video  class="video" style="width: 100%" autoplay="on"  controls controlsList="nodownload" oncontextmenu="return false;">
						<source src="<?= $aws_server['serverUrl'].$aws_server['folders'].$data['vid_file']; ?>" type="video/mp4">
						
					</video>
				
			<?php } ?>
<?php
	}

	public function sendQuery()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$mobile = $this->input->post('mobile');
		$mssage = htmlentities($this->input->post('mssg'));
		//$this->load->view("sample-mail");
		$file_data = $this->upload_file();

		//print_r($file_data);
		


		$msg = "First line of text\nSecond line of text";

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);

		// send email
		//mail("careers@masterclap.in","My subject",$msg);
		$this->load->library('email');
		//SMTP & mail configuration
		
		$config = array(
		            'protocol' => 'smtp', 
		            'smtp_host' => 'localhost', 
		            'smtp_port' => 25, 
		            'smtp_user' => '_mainaccount@masterclap.in', 
		            'smtp_pass' => '#N*kBnSPf]Z%', 
		            'mailtype' => 'html', 
		            'charset' => 'iso-8859-1'
					);
					$this->email->initialize($config);
					$this->email->set_mailtype("html");
					$this->email->set_newline("\r\n");
					 
					//Email content
					$htmlContent = '<h1>Career Resume Submission</h1>';
					$htmlContent .= '<p>Dear, Sir/Madam</p>';
					$htmlContent .= '<p>Here is my details</p>';
					$htmlContent .= '<div style="width: 100%; padding-left: 15px; padding-right: 15px; margin: auto;">
	<table style="width: 95%; border-collapse: collapse;">
		<tr style="background: #F2F2F2">
			<th style="padding: 6px; background: #F2F2F2; border: solid 1px #D7D7D7; margin: 0">
				Full Name
			</th>
			<th style="padding: 6px; background: #F2F2F2; border: solid 1px #D7D7D7; margin: 0">
				Email Address
			</th>
			<th style="padding: 6px; background: #F2F2F2; border: solid 1px #D7D7D7; margin: 0">
				Mobile Number
			</th>
		</tr>
		<tr>
			<td style="padding: 6px; border: solid 1px #D7D7D7">'.$name.'</td>
			<td style="padding: 6px; border: solid 1px #D7D7D7">'.$email.'</td>
			<td style="padding: 6px; border: solid 1px #D7D7D7">'.$mobile.'</td>
		</tr>
	</table>
	<table style="width: 95%; border-collapse: collapse;">
		<tr>
			<td style="padding: 6px; border: solid 1px #D7D7D7">'.$mssage.'</td>
		</tr>
	</table>
</div>';
					 
					$this->email->to("careers@masterclap.in");
					$this->email->from($email,$name);
					$this->email->subject('Career Request');
					$this->email->message($htmlContent);
					$this->email->attach($file_data['full_path']);
					 
					//Send email
					$this->email->send();
					delete_files($file_data['file_path']);
					$this->session->set_flashdata("send","sent");
					$home = base_url();
					return redirect($home);
	
					
	}

	function upload_file()
 {
  $config['upload_path'] = 'uploads/';
  $config['allowed_types'] = 'doc|docx|pdf|jpg|png';
  $this->load->library('upload', $config);
  if($this->upload->do_upload('cvfile'))
  {
   return $this->upload->data();   
  }
  else
  {
   return $this->upload->display_errors();
  }
 }


 public function sendContact()
 {
 	$name = $this->input->post('name');
		$email = $this->input->post('email');
		$mobile = $this->input->post('mobile');
		$mssage = htmlentities($this->input->post('mssg'));


		$this->load->library('email');
		//SMTP & mail configuration
		
		$config = array(
		            'protocol' => 'smtp', 
		            'smtp_host' => 'localhost', 
		            'smtp_port' => 25, 
		            'smtp_user' => '_mainaccount@masterclap.in', 
		            'smtp_pass' => '#N*kBnSPf]Z%', 
		            'mailtype' => 'html', 
		            'charset' => 'iso-8859-1'
					);
					$this->email->initialize($config);
					$this->email->set_mailtype("html");
					$this->email->set_newline("\r\n");
					 
					//Email content
					$htmlContent = '<h1>Contact Submission</h1>';
					$htmlContent .= '<p>Dear, Sir/Madam</p>';
					$htmlContent .= '<p>Here is my details</p>';
					$htmlContent .= '<div style="width: 100%; padding-left: 15px; padding-right: 15px; margin: auto;">
	<table style="width: 95%; border-collapse: collapse;">
		<tr style="background: #F2F2F2">
			<th style="padding: 6px; background: #F2F2F2; border: solid 1px #D7D7D7; margin: 0">
				Full Name
			</th>
			<th style="padding: 6px; background: #F2F2F2; border: solid 1px #D7D7D7; margin: 0">
				Email Address
			</th>
			<th style="padding: 6px; background: #F2F2F2; border: solid 1px #D7D7D7; margin: 0">
				Mobile Number
			</th>
		</tr>
		<tr>
			<td style="padding: 6px; border: solid 1px #D7D7D7">'.$name.'</td>
			<td style="padding: 6px; border: solid 1px #D7D7D7">'.$email.'</td>
			<td style="padding: 6px; border: solid 1px #D7D7D7">'.$mobile.'</td>
		</tr>
	</table>
	<table style="width: 95%; border-collapse: collapse;">
		<tr>
			<td style="padding: 6px; border: solid 1px #D7D7D7">'.$mssage.'</td>
		</tr>
	</table>
</div>';
					 
					$this->email->to("careers@masterclap.in");
					$this->email->from($email,$name);
					$this->email->subject('Support Request');
					$this->email->message($htmlContent);
					//$this->email->attach($file_data['full_path']);
					 
					//Send email
					$this->email->send();
					$this->session->set_flashdata("send","sent");
					$home = base_url();
					return redirect($home);
 }

 public function Subscribe()
 {
 	$email = $this->input->post('email');
 	$this->load->library('email');
		//SMTP & mail configuration
		
		$config = array(
		            'protocol' => 'smtp', 
		            'smtp_host' => 'localhost', 
		            'smtp_port' => 25, 
		            'smtp_user' => '_mainaccount@masterclap.in', 
		            'smtp_pass' => '#N*kBnSPf]Z%', 
		            'mailtype' => 'html', 
		            'charset' => 'iso-8859-1'
					);
					$this->email->initialize($config);
					$this->email->set_mailtype("html");
					$this->email->set_newline("\r\n");
					 
					//Email content
					$htmlContent = '<h1>Subscribers</h1>';
					$htmlContent .= '<p><b>Subscriber Email:</b> '.nbs(3).$email.' </p>';
					$this->email->to("subscribers@masterclap.in");
					$this->email->from($email);
					$this->email->subject('Support Request');
					$this->email->message($htmlContent);
					//$this->email->attach($file_data['full_path']);
					 
					//Send email
					$this->email->send();
					$this->session->set_flashdata("send","sent");
					$home = base_url();
					return redirect($home);
 }

}
