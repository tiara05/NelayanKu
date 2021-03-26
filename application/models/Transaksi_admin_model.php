<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_admin_model extends CI_Model {

	public function get_transaksi(){
		return $this->db->get('transaksi')
						->result();
	}

	public function get_detiltransaksi(){
		return $this->db->join('barang','barang.id_barang = detil_transaksi.id_barang')
						->get('detil_transaksi')
						->result();
	}

	public function get_data_transaksi_by_id($id)
	{
		return $this->db->where('id_detil_transaksi', $id)
						->get('detil_transaksi')
						->row();
	}

	public function get_transaksi_by_id($id)
	{
		return $this->db->select('barang.namabarang, transaksi.tgl_beli, barang.harga, detil_transaksi.jumlah')
						->where('id_transaksi', $id)
						->join('barang','barang.id_barang = detil_transaksi.id_barang')
						->get('detil_transaksi')
						->result();
	}

	public function get_detil_barang_by_id($id){
		return $this->db->join('kategori','kategori.id_kategori = barang.id_kategori')
						->join('pencariikan','pencariikan.id_nelayan = barang.id_nelayan')
						->where('id_barang', $id)
						->get('barang')
						->result();
	}

	

	public function ubah()
	{
		$data = array(
				'status' 		=> $this->input->post('ubah_status')
			);

		$this->db->where('id_detil_transaksi', $this->input->post('ubah_id'))
				 ->update('detil_transaksi', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	
}

/* End of file Buku_model.php */
/* Location: ./application/models/Buku_model.php */