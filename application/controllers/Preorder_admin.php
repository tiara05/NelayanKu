<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preorder_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Preorder_admin_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data['main_view'] = 'Admin/preorder_view';
			$data['preorder'] = $this->Preorder_admin_model->get_preorder();
			$this->load->view('Admin/template', $data);

		} else { 
			redirect('login/index');
		}
	}

	public function ubah()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$this->form_validation->set_rules('ubah_status', 'ubah_status', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->Preorder_admin_model->ubah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Ubah Status berhasil');
					redirect('Preorder_admin/index');
				} else {
					$this->session->set_flashdata('notif', 'Ubah Status gagal');
					redirect('Preorder_admin/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('Preorder_admin/index');
			}


		} else {
			redirect('login/index');
		}
	}

	
	public function get_data_preorder_by_id($id)
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data = $this->Preorder_admin_model->get_data_preorder_by_id($id);
			echo json_encode($data);

		} else {
			redirect('login/index');
		}
	}

}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */