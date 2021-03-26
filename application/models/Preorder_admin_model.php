<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preorder_admin_model extends CI_Model {

	public function get_preorder(){
		return $this->db->join('barang','barang.id_barang = preeorder.id_barang')
						->get('preeorder')
						->result();
	}

	public function get_barang(){
		return $this->db->get('barang')
						->result();
	}

	public function get_data_preorder_by_id($id)
	{
		return $this->db->where('id_preeorder', $id)
						->get('preeorder')
						->row();
	}


	public function ubah()
	{
		$data = array(
				'status' 		=> $this->input->post('ubah_status')
			);

		$this->db->where('id_preeorder', $this->input->post('ubah_id'))
				 ->update('preeorder', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	

}

/* End of file kategori_model.php */
/* Location: ./application/models/kategori_model.php */