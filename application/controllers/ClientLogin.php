<?php
/**
 * 
 */
class ClientLogin extends CI_controller 
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function signUp()
	{
		$redirectUrl = $this->input->post("redirectUrl");
		$name = $this->input->post("name");
		$email = $this->input->post("email");
		$mobile = $this->input->post("mobile");
		$password = $this->input->post("password");
		$pass = password_hash($password, PASSWORD_DEFAULT);
		$seed = str_split('abc123456789defghijk1234567890lmnopqrstuvwxyz'
                     .'ABC123456789DEFGHIJK1234567890LMNOPQRSTUVWXYZ'
                     ); // and any other characters
	    shuffle($seed); // probably optional since array_is randomized; this may be redundant 
	    $rand = '';
	    foreach (array_rand($seed, 50) as $k) $rand .= $seed[$k];
		$setUser = $this->AuthModel->setUserSignup($name,$email,$mobile,$pass,$rand);
		if($setUser == "emlExst")
		{
			$this->session->set_flashdata("msgVerify","<h3 class='text-success'>Email Exist</h3>
                    <span>The Email Address you Submitted is already Exist! <a data-toggle='modal' data-target='#signs' href='#'>Submit Again</a></span>");
			return redirect($redirectUrl);
		}
		elseif($setUser == "mobExst")
		{
			$this->session->set_flashdata("msgVerify","<h3 class='text-success'>User Exist</h3>
                    <span>The Mobile Number you Submitted is already Exist! <a data-toggle='modal' data-target='#signs' href='#'>Submit Again</a></span>");
			return redirect($redirectUrl);
		}
		elseif($setUser == "succ")
		{
			$this->load->library('email');
//SMTP & mail configuration
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
			$htmlContent = '<h1>Registration Successfully Done</h1>';
			$htmlContent .= '<p>Dear, '.$name.',</p>';
			$htmlContent .= '<p>Your account has been Registered with us Now you can learn full course Online. Please verify your email. </p>';
			$htmlContent .= "<a href='".base_url('ClientLogin/activate/'.$rand)."'>Verify Account</a>";
			 
			$this->email->to($email);
			$this->email->from('solutions.web2019@gmail.com','MasterClap');
			$this->email->subject('Account verification');
			$this->email->message($htmlContent);
			 
			//Send email
			$this->email->send();
			$this->session->set_flashdata("msgVerify","<h3 class='text-success'>Verify Email</h3>
                    <span>We have sent you an email with verification link. See your inbox. if you didn't get any mail from us click <a href='".base_url('ClientLogin/resendMail/?email='.urlencode($email).'&redirect='.urlencode($redirectUrl))."'>Resend</a>.</span>");
			return redirect($redirectUrl);
		}
		
		else
		{
			$this->session->set_flashdata("msgVerify","Database Error");
			return redirect($redirectUrl);
		}

	}

	public function resendMail()
	{
		$email = urldecode($_GET['email']);
		$redirectUrl = urldecode($_GET['redirect']);
		$this->db->where("email",$email);
		$get = $this->db->get("users_profile")->row();
		$rand = $get->verification_code;
		$name = $get->name;
		
		$this->load->library('email');
//SMTP & mail configuration
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
			$htmlContent = '<h1>Registration Successfully Done</h1>';
			$htmlContent .= '<p>Dear, '.$name.',</p>';
			$htmlContent .= '<p>Your account has been Registered with us Now you can learn full course Online. Please verify your email. </p>';
			$htmlContent .= "<a href='".base_url('ClientLogin/activate/'.$rand)."'>Verify Account</a>";
			 
			$this->email->to($email);
			$this->email->from('solutions.web2019@gmail.com','MasterClap');
			$this->email->subject('Account verification');
			$this->email->message($htmlContent);
			 
			//Send email
			$this->email->send();
			$this->session->set_flashdata("msgVerify","<h3 class='text-success'>Verify Email</h3>
                    <span>We have sent you an email with verification link. See your inbox. if you didn't get any mail from us click <a href='".base_url('ClientLogin/resendMail/?email='.urlencode($email).'&redirect='.urlencode($redirectUrl))."'>Resend</a>.</span>");
			return redirect($redirectUrl);
		
	}

	public function Login()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$redirectUrl = $this->input->post("redirectUrl");
		$signin = $this->AuthModel->signin($username,$password);
		if($signin['statuss']=="notExist")
		{
			//Not Exist
			//echo $signin['statuss'];
			$this->session->set_flashdata("err","<b class='text-danger'>Username Does not Exist!</b>");
			return redirect($redirectUrl);
		}
		elseif($signin['statuss']=="pend")
		{
			//Not Exist
			$this->session->set_flashdata("msgVerify","<h3 class='text-success'>Verify Email</h3>
                    <span>We have sent you an email with verification link. See your inbox. if you didn't get any mail from us click <a href='".base_url('ClientLogin/resendMail/?email='.urlencode($signin['email']).'&redirect='.urlencode($redirectUrl))."'>Resend</a>.</span>");
			return redirect($redirectUrl);
		}
		elseif($signin['statuss']=="wrong")
		{
			$this->session->set_flashdata("err","<b class='text-danger'>Invalid Password!</b>");
			return redirect($redirectUrl);
		}
		elseif($signin['statuss']=="succ")
		{
			$userId = $signin['userId'];
			$this->session->set_userdata("ClientId",$userId);
			return redirect($redirectUrl);
		}
	}


	public function LoginOther()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$redirectUrl = $this->input->post("redirectUrl");
		$signin = $this->AuthModel->signin($username,$password);
		if($signin['statuss']=="notExist")
		{
			//Not Exist
			//echo $signin['statuss'];
			$this->session->set_flashdata("err","<b class='text-danger'>Username Does not Exist!</b>");
			return redirect("Login/index/?backUrl=".$redirectUrl);
		}
		elseif($signin['statuss']=="pend")
		{
			//Not Exist
			$this->session->set_flashdata("msgVerify","<h3 class='text-success'>Verify Email</h3>
                    <span>We have sent you an email with verification link. See your inbox. if you didn't get any mail from us click <a href='".base_url('ClientLogin/resendMail/?email='.urlencode($signin['email']).'&redirect='.urlencode($redirectUrl))."'>Resend</a>.</span>");
			return redirect($redirectUrl);
		}
		elseif($signin['statuss']=="wrong")
		{
			$this->session->set_flashdata("err","<b class='text-danger'>Invalid Password!</b>");
			return redirect("Login/index/?backUrl=".$redirectUrl);
		}
		elseif($signin['statuss']=="succ")
		{
			$userId = $signin['userId'];
			$this->session->set_userdata("ClientId",$userId);
			return redirect($redirectUrl);
		}
	}


	public function activate($id)
	{
		$this->db->where("verification_code",$id);
		$get = $this->db->get("users_profile");
		if($get->num_rows()==0)
		{
			echo "Invalid Token ID";
		}
		else
		{
			$this->db->where("verification_code",$id);
			$this->db->update("users_profile",["status"=>1,"verification_code"=>null]);
			return redirect("Home");
		}
	}
}