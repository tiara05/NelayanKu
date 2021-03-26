<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preorder_model extends CI_Model {

	public function get_preorder(){
		return $this->db->join('barang','barang.id_barang = preeorder.id_barang')
						->get('preeorder')
						->result();
	}

	public function get_barang(){
		return $this->db->get('barang')
						->result();
	}

	public function get_data_kategori_by_id($id)
	{
		return $this->db->where('id_kategori', $id)
						->get('kategori')
						->row();
	}

	public function tambah()
	{
		$data = array(
				'id_barang' 	=> $this->input->post('barang'),
				'alamat' 		=> $this->input->post('alamat'),
				'nama' 			=> $this->input->post('nama'),
				'jumlah'	 	=> $this->input->post('jumlah'),
				'kirim' 		=> $this->input->post('kirim'),
				'telepon'	 	=> $this->input->post('telepon'),
			);

		$this->db->insert('preeorder', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file kategori_model.php */
/* Location: ./application/models/kategori_model.php */