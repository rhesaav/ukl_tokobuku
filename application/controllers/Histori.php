<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Histori extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_histrori','transaksi');
	}
	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			$data['konten']='histori';
			$data['tampil_histori']=$this->getDataTransaksi();
			$data['tampil_histori']=$this->buku->getDataTransaksi();
			$this->load->view('template', $data);
		}
		else{
			$this->load->view('login');
		}		
	}

}

/* End of file Histori.php */
/* Location: ./application/controllers/Histori.php */