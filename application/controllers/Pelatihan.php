<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Pelatihan extends CI_Controller {

	public function index()
	{
		$this->load->view('Landing/pelatihan');
	}
}