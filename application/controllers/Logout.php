<?php
/**
 * 
 */
class Logout extends CI_controller
{
	
	function index()
	{
		$this->session->unset_userdata("ClientId");
		return redirect("Home");
	}
}