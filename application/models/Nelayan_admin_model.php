<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nelayan_admin_model extends CI_Model {

	

	public function find($id)
	{
		return  $this->db  ->where('id_barang', $id)
						   ->limit(1)
						   ->get('barang');
	}

	public function get_kategori(){
		return $this->db->get('kategori')
						->result();
	}

	public function get_nelayan(){
		return $this->db->get('pencariikan')
						->result();
	}



	public function get_detil_barang_by_id($id){
		return $this->db->join('kategori','kategori.id_kategori = barang.id_kategori')
						->join('pencariikan','pencariikan.id_nelayan = barang.id_nelayan')
						->where('id_barang', $id)
						->get('barang')
						->result();
	}

	public function tambah()
	{
		$data = array(
				'namanelayan' 	=> $this->input->post('nama'),
				'foto'			=> $this->input->post('foto')
			);

		$this->db->insert('pencariikan', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah()
	{
		$data = array(
				'kode_buku' 	=> $this->input->post('ubah_kode_buku'),
				'judul' 		=> $this->input->post('ubah_judul'),
				'tahun'			=> $this->input->post('ubah_tahun'),
				'penulis'		=> $this->input->post('ubah_penulis'),
				'penerbit'		=> $this->input->post('ubah_penerbit'),
				'id_kat'		=> $this->input->post('ubah_kategori'),
				'stok'			=> $this->input->post('ubah_stok'),
				'harga'			=> $this->input->post('ubah_harga')
			);

		$this->db->where('id_buku', $this->input->post('ubah_id_buku'))
				 ->update('buku', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus()
	{
		$this->db->where('id_buku', $this->input->post('hapus_id_buku'))
				 ->delete('buku');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	

}

/* End of file Buku_model.php */
/* Location: ./application/models/Buku_model.php */