<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Promo_admin_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data['main_view'] = 'Admin/promo_view';
			$data['kategori'] = $this->Promo_admin_model->get_promo();
			$this->load->view('Admin/template', $data);

		} else { 
			redirect('login/index');
		}
	}

	public function tambah()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$this->form_validation->set_rules('namapromo', 'namapromo', 'trim|required');
			$this->form_validation->set_rules('detailpromo', 'detailpromo', 'trim|required');
			$this->form_validation->set_rules('tanggal_mulai', 'tanggal_mulai', 'trim|required');
			$this->form_validation->set_rules('tanggal_selesai', 'tanggal_selesai', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->Promo_admin_model->tambah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Tambah Promo Berhasil');
					redirect('Promo_admin/index');
				} else {
					$this->session->set_flashdata('notif', 'Tambah Promo gagal');
					redirect('Promo_admin/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('Promo_admin/index');
			}


		} else {
			redirect('login/index');
		}
	}

	public function ubah()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$this->form_validation->set_rules('ubah_namapromo', 'ubah_namapromo', 'trim|required');
			$this->form_validation->set_rules('ubah_detailpromo', 'ubah_detailpromo', 'trim|required');
			$this->form_validation->set_rules('ubah_tanggal_mulai', 'ubah_tanggal_mulai', 'trim|required');
			$this->form_validation->set_rules('ubah_tanggal_selesai', 'ubah_tanggal_selesai', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->Promo_admin_model->ubah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Ubah Promo berhasil');
					redirect('Promo_admin/index');
				} else {
					$this->session->set_flashdata('notif', 'Ubah Promo gagal');
					redirect('Promo_admin/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('Promo_admin/index');
			}


		} else {
			redirect('login/index');
		}
	}

	public function hapus()
	{
		if($this->session->userdata('logged_in') == TRUE){

			if($this->Promo_admin_model->hapus() == TRUE){
				$this->session->set_flashdata('notif', 'Hapus Promo berhasil');
				redirect('Promo_admin/index');
			} else {
				$this->session->set_flashdata('notif', 'Hapus Promo gagal');
				redirect('Promo_admin/index');
			}

		} else {
			redirect('login/index');
		}
	}

	public function get_data_promo_by_id($id)
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data = $this->Promo_admin_model->get_data_promo_by_id($id);
			echo json_encode($data);

		} else {
			redirect('login/index');
		}
	}

}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */