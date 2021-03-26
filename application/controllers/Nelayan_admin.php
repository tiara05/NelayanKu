<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nelayan_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Nelayan_admin_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data['main_view'] = 'Admin/nelayan_view';
			

			//get_kategori untuk dropdown tambah/edit buku
			$data['nelayan'] = $this->Nelayan_admin_model->get_nelayan();
			$this->load->view('Admin/template', $data);

		} else {
			redirect('login_admin/index');
		}
	}

	public function tambah()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			$this->form_validation->set_rules('foto', 'foto', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->Nelayan_admin_model->tambah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Tambah Nelayan Berhasil');
					redirect('Nelayan_admin/index');
				} else {
					$this->session->set_flashdata('notif', 'Tambah Nelayan gagal');
					redirect('Nelayan_admin/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('Nelayan_admin/index');
			}
		} else {
			redirect('login_admin/index');
		}
	}

	public function ubah()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$this->form_validation->set_rules('ubah_judul', 'Judul', 'trim|required');
			$this->form_validation->set_rules('ubah_tahun', 'tahun', 'trim|required|numeric');
			$this->form_validation->set_rules('ubah_penulis', 'penulis', 'trim|required');
			$this->form_validation->set_rules('ubah_penerbit', 'penerbit', 'trim|required');
			$this->form_validation->set_rules('ubah_stok', 'harga', 'trim|required|numeric');
			$this->form_validation->set_rules('ubah_harga', 'harga', 'trim|required|numeric');
			$this->form_validation->set_rules('ubah_kategori', 'kategori', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->Barang_admin_model->ubah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Ubah buku berhasil');
					redirect('buku/index');
				} else {
					$this->session->set_flashdata('notif', 'Ubah buku gagal');
					redirect('buku/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('buku/index');
			}


		} else {
			redirect('login/index');
		}
	}

	public function hapus()
	{
		if($this->session->userdata('logged_in') == TRUE){

			if($this->Barang_admin_model->hapus() == TRUE){
				$this->session->set_flashdata('notif', 'Hapus buku Berhasil');
				redirect('buku/index');
			} else {
				$this->session->set_flashdata('notif', 'Hapus buku gagal');
				redirect('buku/index');
			}

		} else {
			redirect('login/index');
		}
	}

	public function get_data_buku_by_id($id)
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data = $this->Barang_admin_model->get_data_buku_by_id($id);
			echo json_encode($data);

		} else {
			redirect('login/index');
		}
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */