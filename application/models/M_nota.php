<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nota extends CI_Model {

	public function getDataNota($id)
	{
		return $this->db->join('buku','buku.id_buku=nota.id_buku')
			->join('kategori_buku','kategori_buku.id_kategori=buku.id_kategori')
			->where('id_transaksi',$id)
			->get('nota');
	}
	public function getDataTransaksi($id)
	{
		return $this->db->join('kasir','kasir.id_kasir=transaksi.id_kasir')
		->where('id_transaksi',$id)
		->get('transaksi')->row();
	}

}

/* End of file M_nota.php */
/* Location: ./application/models/M_nota.php */