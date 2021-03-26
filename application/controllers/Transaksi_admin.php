<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_admin_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data['main_view'] = 'Admin/transaksi_view';
			

			//get_kategori untuk dropdown tambah/edit buku
			$data['transaksi'] = $this->Transaksi_admin_model->get_transaksi();
			$data['transaksidetil'] = $this->Transaksi_admin_model->get_detiltransaksi();
			$this->load->view('Admin/template', $data);

		} else {
			redirect('login_admin/index');
		}
	}

	

	public function ubah()
	{
		if($this->session->userdata('logged_in') == TRUE){

			$this->form_validation->set_rules('ubah_status', 'ubah_status', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->Transaksi_admin_model->ubah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Ubah buku berhasil');
					redirect('Transaksi_admin/index');
				} else {
					$this->session->set_flashdata('notif', 'Ubah buku gagal');
					redirect('Transaksi_admin/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('Transaksi_admin/index');
			}


		} else {
			redirect('login/index');
		}
	}

	
	public function get_data_transaksi_by_id($id)
	{
		if($this->session->userdata('logged_in') == TRUE){

			$data = $this->Transaksi_admin_model->get_data_transaksi_by_id($id);
			echo json_encode($data);

		} else {
			redirect('login/index');
		}
	}

	public function riwayat()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['riwayat'] = $this->Transaksi_admin_model->get_riwayat_transaksi();

			$this->load->view('template', $data);
		} else {
			redirect('login/index');
		}
	}

	public function get_detil_transaksi_by_id($id)
	{
		if($this->session->userdata('logged_in') == TRUE){
			$detil_transaksi = $this->Transaksi_admin_model->get_transaksi_by_id($id);
			$data['show_detil'] = "";
			$total = 0;
			$no = 1;
			$data['show_detil'] .= '<table class="table table-striped">
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>Nama Barang</th>
										<th>Jumlah</th>
										<th>Harga Satuan</th>
										<th>Sub Total</th>
									</tr>';

			foreach ($detil_transaksi as $d) {
				$data['show_detil'] .= '<tr>
									<td>'.$no.'</td>
									<td>'.$d->tgl_beli.'</td>
									<td>'.$d->namabarang.'</td>
									<td>'.$d->jumlah.'</td>
									<td>'.$d->harga.'</td>
									<td>'.$d->harga*$d->jumlah.'</td>
								</tr>';

				$no++;
				$total += $d->harga*$d->jumlah;
			}
			$data['show_detil'] .= '</table>';
			$data['show_detil'] .= '<h3><p class="text-right">Total Belanja:</p></h3>
									<h2><p class="text-right">Rp '.$total.',- </p></h2>';

			echo json_encode($data);
		} else {
			redirect('login/index');
		}
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */