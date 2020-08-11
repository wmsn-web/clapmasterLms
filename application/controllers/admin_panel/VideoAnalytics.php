<?php
/**
 * 
 */
class VideoAnalytics extends CI_controller
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
		$getAnalytics = $this->AdminModel->getAnalytics();
		$this->load->view("admin/VideoAnalytics",["allData"=>$getAnalytics]);
		//echo "<pre>";
		//print_r($getAnalytics);
	}

	public function getDetails()
	{
		$vid_id = $this->input->post("vid_id");
		$getAnalyticsDetails = $this->AdminModel->getAnalyticsDetails($vid_id); ?>


		<div class="modal-body">
							<table class="table table-bordered">
								<tr>
									<th>Date</th>
									<th>Video Details</th>
									<th>User</th>
									<th>User IP</th>
									<th>Watch Time</th>
								</tr>
								<?php foreach ($getAnalyticsDetails as $key) { ?>
								<tr>
									<td><?= $key['date']; ?></td>
									<td><?= $key['course']."->".$key['level']."->".$key['title']; ?></td>
									<td><a href="<?= base_url('admin_panel/Users/userDetails/'.$key['user_id']); ?>" title="<?= $key['email'].", ".$key['mobile']; ?>">
										<?= $key['user_name']; ?>
											
										</a></td>
									<td><?= $key['ip']; ?></td>
									<td><?= $key['watch_time']; ?></td>
								</tr>
							<?php } ?>
							</table>
						</div>

<?php	}
}