<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kasir','kas');
	}

	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			$data['konten']='kasir';
			$data['tampil_kasir']=$this->kas->getDatakasir();
			$this->load->view('template', $data);
		}
		else{
			$this->load->view('login');
		}		
	}
	public function tambah_kasir()
	{
		if ($this->kas->simpan_kasir()) {
			$this->session->set_flashdata('pesan', 'sukses menambah');
			redirect('kasir','refresh');
		} else {
			$this->session->set_flashdata('pesan', 'gagal menambah');
			redirect('kasir','refresh');
		}
	}
	public function hapus($id_kasir)
	{
		if ($this->kas->hapus($id_kasir)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus Data');
		} else {
			$this->session->set_flashdata('pesan', 'kasir tidak berhasi dihapus, gagal');
		}
		redirect('kasir','refresh');
	}
	public function edit_kasir($id)
	{
		$data=$this->kas->detail($id);
		echo json_encode($data);
	}
	public function ubah()
	{
		if ($this->kas->edit_kasir()) {
			$this->session->set_flashdata('pesan', 'berhasil');
		}
		else{
			$this->session->set_flashdata('pesan', 'gagal');
		}
		redirect('kasir','refresh');
	}
}

/* End of file Kasir.php */
/* Location: ./application/controllers/Kasir.php */