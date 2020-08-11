<?php
/**
 * 
 */
class Pages extends CI_controller
{
	
	public function AboutUs()
	{
		$this->load->view("about"); 
	}
	public function ContactUs()
	{
		$this->load->view("contact");
	}
	public function Career()
	{
		$this->load->view("career");
	}
	public function Privacy()
	{
		$this->load->view("privacy");
	}
	public function Affiliate()
	{
		$this->load->view("affiliate");
	}
	public function Help()
	{
		$this->load->view("help");
	}
	public function Terms_conditions()
	{
		$this->load->view("terms");
	}

	public function sendQuery()
	{
		$name = $this->input->post("name");
		$email = $this->input->post("email");
		$msgs = $this->input->post("msgs"); 

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
			$htmlContent = "<html><body>";
			$htmlContent .= "<div align='center' style='width:100%;'>
					<h1 style='font-weight: 600; font-size: 48px'>Master Clap</h1>
				<table width='80%' style='border: solid 1px #ccc; padding: 12px; text-align: left;'>
					<tr><td><h2>Coustomer Query</h2></td></tr>
					<tr style=''>
						<th style='padding: 8px; width: 20%'>
							Name:
						</th>
						<td>".$name."</td>
					</tr>
					<tr>
						<th style='padding: 8px width: 20%'>
							Email:
						</th>
						<td>".$email."</td>
					</tr>
					<tr>
						<th style='padding: 8px width: 20%'>
							Message:
						</th>
						<td>".$msgs."</td>
					</tr>
				</table>
			</div>";
			$htmlContent .= "</body></html>";
			$this->email->to("support@masterclap.in");
			$this->email->from($email,$name);
			$this->email->subject('Customer Query');
			$this->email->message($htmlContent);
			 
			//Send email
			$sennd = $this->email->send();
			print_r($sennd);

	}
}