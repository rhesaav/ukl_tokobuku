<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_nota','nota');
	}
	public function index()
	{
		
	}
	public function cetak($id)
	{
		$data['tampil_nota']=$this->nota->getDataNota($id)->row();
		$data['detail_nota']=$this->nota->getDataNota($id)->result();
		$data['tampil_transaksi']=$this->nota->getDataNota($id);
		$this->load->view('nota', $data);
	}

}

/* End of file Nota.php */
/* Location: ./application/controllers/Nota.php */