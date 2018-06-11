<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
	// Constructor - function runs every class inst'n
	function __construct(){
		// Make sure parent constructor runs
		parent::__construct();

		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('admin/login');
		}
	}

	public function index()
	{
		$data['activities'] = $this->Activity_model->get_list();

		$this->template->load('admin', 'default', 'dashboard', $data);
	}
}
