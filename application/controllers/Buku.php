<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_buku','buku');
	}

	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			$data['konten']='buku';
			$data['tampil_buku']=$this->buku->getDatabuku();
			$data['tampil_kategori']=$this->buku->getDataKategori();
			$this->load->view('template', $data);
		}
		else{
			$this->load->view('login');
		}		
	}
	public function tambah_buku()
	{
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		if($_FILES['foto_cover']['name']!=""){
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('foto_cover')){
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
			}
			else{
				if($this->buku->simpan_buku($this->upload->data('file_name'))){
					$this->session->set_flashdata('pesan', 'sukses menambah');	
				} else {
					$this->session->set_flashdata('pesan', 'gagal menambah');	
				}
				redirect('buku','refresh');		
			}
		} else {
			if($this->buku->simpan_buku('')){
				$this->session->set_flashdata('pesan', 'sukses menambah');	
			} else {
				$this->session->set_flashdata('pesan', 'gagal menambah');	
			}
			redirect('buku','refresh');	
		}
	}
	public function hapus($id_buku)
	{
		if ($this->buku->hapus($id_buku)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus Data');
		} else {
			$this->session->set_flashdata('pesan', 'buku tidak berhasi dihapus, gagal');
		}
		redirect('buku');
	}
	public function edit_buku($id)
	{
		$data=$this->buku->detail($id);
		echo json_encode($data);
	}
	public function ubah()
	{
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		if($_FILES['foto_cover']['name']!=""){
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto_cover')){
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('buku','refresh');	
			}
			else{
				if($this->buku->edit_buku($this->upload->data('file_name'))){
					$this->session->set_flashdata('pesan', 'sukses menambah');	
				} else {
					$this->session->set_flashdata('pesan', 'gagal menambah');	
				}
				redirect('buku','refresh');		
			}
		} else {
			if($this->buku->edit_buku('')){
				$this->session->set_flashdata('pesan', 'sukses menambah');	
			} else {
				$this->session->set_flashdata('pesan', 'gagal menambah');	
			}
			redirect('buku','refresh');	
		}
	}
}

/* End of file buku.php */
/* Location: ./application/controllers/buku.php */