<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Preorder extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Preorder_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = "Landing/preorder";
			$data['preorder'] = $this->Preorder_model->get_preorder();
			$data['barang'] = $this->Preorder_model->get_barang();
	 		
			$this->load->view('landing/marketplace_template', $data);
		}else {
			redirect('Marketplace/index');
		}
	}

	public function tambah()
	{

			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
			$this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
			$this->form_validation->set_rules('barang', 'barang', 'trim|required');
			$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
			$this->form_validation->set_rules('kirim', 'kirim', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->Preorder_model->tambah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Tambah kategori berhasil');
					redirect('Preorder/index');
				} else {
					$this->session->set_flashdata('notif', 'Tambah kategori gagal');
					redirect('Preorder/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('Preorder/index');
			}
	}

	
}