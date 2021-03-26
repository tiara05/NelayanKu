<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_admin_model extends CI_Model {

	public function get_buku(){
		return $this->db->join('kategori','kategori.id_kategori = barang.id_kategori')
						->join('pencariikan','pencariikan.id_nelayan = barang.id_nelayan')
						->get('barang')
						->result();
	}

	public function find($id)
	{
		return  $this->db  ->where('id_barang', $id)
						   ->limit(1)
						   ->get('barang');
	}

	public function get_barang1(){
		return $this->db->join('kategori','kategori.id_kategori = barang.id_kategori')
						->join('pencariikan','pencariikan.id_nelayan = barang.id_nelayan')
						->where('id_barang <', 8)
						->get('barang')
						->result();
	}

	public function get_barang2(){
		return $this->db->join('kategori','kategori.id_kategori = barang.id_kategori')
						->join('pencariikan','pencariikan.id_nelayan = barang.id_nelayan')
						->where('id_barang >', 8)
						->get('barang')
						->result();
	}

	public function get_barang3(){
		return $this->db->join('kategori','kategori.id_kategori = barang.id_kategori')
						->join('pencariikan','pencariikan.id_nelayan = barang.id_nelayan')
						->get_where('barang', array('filter'=>'Paling Laku'))
						->result();
	}

	public function get_barang4(){
		return $this->db->join('kategori','kategori.id_kategori = barang.id_kategori')
						->join('pencariikan','pencariikan.id_nelayan = barang.id_nelayan')
						->get_where('barang', array('filter'=>'Diskon'))
						->result();
	}

	public function get_barangg1(){
		return $this->db->join('kategori','kategori.id_kategori = barang.id_kategori')
						->join('pencariikan','pencariikan.id_nelayan = barang.id_nelayan')
						->where('namakategori', 'Ikan Air Laut')
						->get('barang')
						->result();
	}

	public function get_barangg2(){
		return $this->db->join('kategori','kategori.id_kategori = barang.id_kategori')
						->join('pencariikan','pencariikan.id_nelayan = barang.id_nelayan')
						->where('namakategori', 'Ikan Air Tawar')
						->get('barang')
						->result();
	}

	public function get_barangg3(){
		return $this->db->join('kategori','kategori.id_kategori = barang.id_kategori')
						->join('pencariikan','pencariikan.id_nelayan = barang.id_nelayan')
						->where('namakategori', 'Olahan Kaleng')
						->get('barang')
						->result();
	}

	public function get_barangg4(){
		return $this->db->join('kategori','kategori.id_kategori = barang.id_kategori')
						->join('pencariikan','pencariikan.id_nelayan = barang.id_nelayan')
						->where('namakategori', 'Olahan Kerupuk')
						->get('barang')
						->result();
	}

	public function get_kategori(){
		return $this->db->get('kategori')
						->result();
	}

	public function get_nelayan(){
		return $this->db->get('pencariikan')
						->result();
	}

	public function get_data_buku_by_id($id)
	{
		return $this->db->where('id_barang', $id)
						->get('barang')
						->row();
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
				'namabarang' 	=> $this->input->post('nama_barang'),
				'id_kategori'	=> $this->input->post('kategori'),
				'id_nelayan'	=> $this->input->post('nelayan'),
				'stok'			=> $this->input->post('stok'),
				'harga'			=> $this->input->post('harga'),
				'fotoikan'		=> $this->input->post('fotoikan'),
			);

		$this->db->insert('barang', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah()
	{
		$data = array(
				'namabarang' 	=> $this->input->post('ubah_nama_barang'),
				'id_kategori'	=> $this->input->post('ubah_kategori'),
				'id_nelayan'	=> $this->input->post('ubah_nelayan'),
				'stok'			=> $this->input->post('ubah_stok'),
				'harga'			=> $this->input->post('ubah_harga'),
			);

		$this->db->where('id_barang', $this->input->post('ubah_id'))
				 ->update('barang', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus()
	{
		$this->db->where('id_barang', $this->input->post('hapus_id_barang'))
				 ->delete('barang');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	

}

/* End of file Buku_model.php */
/* Location: ./application/models/Buku_model.php */