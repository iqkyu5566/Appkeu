<?php 
/**
* 
*/
class Dashboard extends CI_Controller
{
	
	function index()
	{
		# code...
		$this->template->load('template', 'view_dashboard');
	}
}
 ?>