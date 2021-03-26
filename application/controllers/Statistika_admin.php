<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistika_admin extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('kategori_admin_model');
	// }

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data['main_view'] = 'Admin/statistika_view';
			// $data['kategori'] = $this->kategori_admin_model->get_kategori();
			$this->load->view('Admin/template', $data);

		} else { 
			redirect('login/index');
		}
	}
}
?>