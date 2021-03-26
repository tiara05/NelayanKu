<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

	public function get_account(){
		return $this->db->where('username', $this->session->userdata('username'))
						->get('user')
						->result();
	}

	public function ubah()
	{
		$data = array(
				'email' 		=> $this->input->post('ubah_email')
			);

		$this->db->where('id_user', $this->input->post('ubah_id'))
				 ->update('user', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
?>