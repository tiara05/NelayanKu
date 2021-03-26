<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Account_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = "Landing/account";
			$data['account'] = $this->Account_model->get_Account();
	 		
			$this->load->view('landing/marketplace_template', $data);
		}else {
			redirect('Marketplace/index');
		}
	}

	
	
}