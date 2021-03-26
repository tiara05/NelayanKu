<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_admin_model extends CI_Model {

	public function get_promo(){
		return $this->db->get('promo')
						->result();
	}

	public function get_data_promo_by_id($id)
	{
		return $this->db->where('id_promo', $id)
						->get('promo')
						->row();
	}

	public function tambah()
	{
		$data = array(
				'namapromo' 		=> $this->input->post('namapromo'),
				'detailpromo' 		=> $this->input->post('detailpromo'),
				'tanggal_mulai'		=> $this->input->post('tanggal_mulai'),
				'tanggal_selesai'	=> $this->input->post('tanggal_selesai')
			);

		$this->db->insert('promo', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah()
	{
		$data = array(
				'namapromo' 		=> $this->input->post('ubah_namapromo'),
				'detailpromo' 		=> $this->input->post('ubah_detailpromo'),
				'tanggal_mulai'		=> $this->input->post('ubah_tanggal_mulai'),
				'tanggal_selesai'	=> $this->input->post('ubah_tanggal_selesai')
			);

		$this->db->where('id_promo', $this->input->post('ubah_id'))
				 ->update('promo', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus()
	{
		$this->db->where('id_promo', $this->input->post('hapus_id'))
				 ->delete('promo');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	

}

/* End of file kategori_model.php */
/* Location: ./application/models/kategori_model.php */