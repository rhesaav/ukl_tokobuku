<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kategori','kat');
	}

	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			$data['konten']='kategori';
			$data['tampil_kategori']=$this->kat->getDataKategori();
			$this->load->view('template', $data);
		}
		else{
			$this->load->view('login');
		}		
	}
	public function tambah_kategori()
	{
		if ($this->kat->simpan_kategori()) {
			$this->session->set_flashdata('pesan', 'sukses menambah');
			redirect('kategori','refresh');
		} else {
			$this->session->set_flashdata('pesan', 'gagal menambah');
			redirect('kategori','refresh');
		}
	}
	public function hapus($id_kategori)
	{
		if ($this->kat->hapus($id_kategori)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus Data');
		} else {
			$this->session->set_flashdata('pesan', 'Kategori tidak berhasi dihapus, gagal');
		}
		redirect('kategori','refresh');
	}
	public function edit_kategori($id)
	{
		$data=$this->kat->detail($id);
		echo json_encode($data);
	}
	public function ubah()
	{
		if ($this->kat->edit_kategori()) {
			$this->session->set_flashdata('pesan', 'berhasil');
		}
		else{
			$this->session->set_flashdata('pesan', 'gagal');
		}
		redirect('kategori','refresh');
	}
}

/* End of file Katagori.php */
/* Location: ./application/controllers/Katagori.php */