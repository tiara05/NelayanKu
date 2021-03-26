<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Activity extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('Activity_model');
	// }

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = "Landing/activity";
			// $data['account'] = $this->account_model->get_account();
	 		// $data['favorit'] = $this->Activity_model->get_activity();
			$this->load->view('landing/marketplace_template', $data);
		}else {
			redirect('Marketplace/index');
		}
	}

	
}