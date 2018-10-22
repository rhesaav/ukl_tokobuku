<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			$data['konten']='toko';
			$this->load->view('template', $data);
		}
		else{
			$this->load->view('login');
		}
	}

}

/* End of file Toko.php */
/* Location: ./application/controllers/Toko.php */