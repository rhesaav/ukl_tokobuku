<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_transaksi','trans');
	}

	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			$data['konten']='transaksi';
			$data['tampil_buku']=$this->trans->getDataBukuTrans();
			$this->load->view('template', $data);
		}else{
			redirect('login','refresh');
		}
	}
	public function addcart($id)
	{
		$detail=$this->trans->detail($id);
		$data = array(
				'id'      => $detail->id_buku,
				'qty'     => 1,
				'price'   => $detail->harga,
				'name'    => $detail->judul_buku,
				'options' => array('genre'=>$detail->nama_kategori,'stok'=> $detail->stok)
			);
		$this->cart->insert($data);			
		redirect('transaksi','refresh');
	}
	public function hapuscart($id)
	{
		$data = array(
			'rowid' => $id,
			'qty'   => 0
		);
		
		$this->cart->update($data);
		redirect('transaksi','refresh');
	}
	public function ubahqty($id)
	{
		$data = array(
			'rowid' => $id,
			'qty'   => $this->input->post('qty')
		);
		
		$this->cart->update($data);
		redirect('transaksi','refresh');
	}
	public function checkout()
	{	
		$kembalian = $this->cart->total() - $this->input->post('uang');
		if ($this->input->post('uang')<$this->cart->total()) {
			$this->session->set_flashdata('pesan', 'Uang Kurang');
		}
		else{
			if ($this->trans->simpanTrans()) {
				$lastrans=$this->trans->lastrans()->id_transaksi;
				$this->session->set_flashdata('pesan', 'kembaliannya : '.$kembalian);
				$this->session->set_flashdata('pesan_print','<a href="nota/cetak/'.$lastrans.'">Cetak Nota</a>');
				$this->cart->destroy();			
			}
			else{
				$this->session->set_flashdata('pesan', 'error');
			}
		}
		redirect('transaksi','refresh');
	}
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */