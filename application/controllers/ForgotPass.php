<?php
/**
 * 
 */
class ForgotPass extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function sendMail()
	{
		$username = $this->input->post("username");
		$gettrue = $this->AuthModel->getTrue($username);
		if(empty($gettrue))
		{
			echo "string";
		}
		else
		{
			$email =  $gettrue['email'];
			$code = $gettrue['code'];
			$name = $gettrue['name'];
			$config = array(
            'protocol' => 'smtp', 
            'smtp_host' => 'ssl://smtp.gmail.com', 
            'smtp_port' => 465, 
            'smtp_user' => 'solutions.web2019@gmail.com', 
            'smtp_pass' => 'Goodnight88', 
            'mailtype' => 'html', 
            'charset' => 'iso-8859-1'
			);
			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			 
			//Email content
			$htmlContent = '<h1>Password Change Request</h1>';
			$htmlContent .= '<p>Dear, '.$name.',</p>';
			$htmlContent .= '<p>You have sent a request to change your password.<br>
							<b>This link is valid for one use only</b>
If you did not request this password reset or you received this message in error, please disregard this email.</p>';
			$htmlContent .= "<a href='".base_url('ForgotPass/resetPass/'.$code)."'>Reset Password</a>";
			 
			$this->email->to($email);
			$this->email->from('support@masterclap.in','MasterClap');
			$this->email->subject('Password Change Request');
			$this->email->message($htmlContent);
			 
			//Send email
			$this->email->send();
			
			echo "<script>"; echo "alert('Paddword reset Link has been sent to your registered mail adress. please check your inbox.'); location.href='".base_url()."'"; echo "</script>"; 
		}
	}

	public function resetPass($id)
	{
		$this->db->where("verification_code",$id);
		$getss = $this->db->get("users_profile");
		$get = $getss->num_rows();
		if($get ==0)
		{
			echo "<script>"; echo "alert('Invalid Token. Token session Expired'); location.href='".base_url()."'"; echo "</script>"; 
		}
		else
		{
			$row = $getss->row();
			$this->load->view('resetPass',["user"=>$row->email]);
		}
	}

	public function chPass()
	{
		$password = $this->input->post("password");
		$user = $this->input->post("user");
		$pass = password_hash($password, PASSWORD_DEFAULT);
		$this->db->where("email",$user);
		$this->db->update("users_profile",["password"=>$pass,"verification_code"=>null]);
		echo "<script>"; echo "alert('Password Reset Successfull'); location.href='".base_url()."'"; echo "</script>"; 
	}
}