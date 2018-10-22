<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {
	
	public function getDataBukuTrans()
	{
		return $this->db->join('kategori_buku','kategori_buku.id_kategori=buku.id_kategori')
		->where('stok != 0')
		->get('buku')->result();
	}
	public function detail($id)
	{
		return $this->db->join('kategori_buku','kategori_buku.id_kategori=buku.id_kategori')
		->where('id_buku',$id)
		->get('buku')
		->row();
	}
	public function simpanTrans()
	{
		$object = array(
			'nama_pembeli' => $this->input->post('nama_pembeli') , 
			'total' => $this->cart->total(),
			'tanggal_beli'=>date('Y-m-d') 
		);
		$this->db->insert('transaksi', $object);
		$tm_nota=$this->db->order_by('id_transaksi','desc')
						  ->where('nama_pembeli',$this->input->post('nama_pembeli'))
						  ->limit(1)
						  ->get('transaksi')
						  ->row();
		for($i=0;$i<count($this->input->post('id_buku'));$i++){
			$hasil[]=array(
				'id_transaksi'=>$tm_nota->id_transaksi,
				'jumlah'=>$this->input->post('qty')[$i],
				'id_buku'=>$this->input->post('id_buku')[$i],
				
			);
			$stok = array(
				'stok' => $this->input->post('stok')[$i]-$this->input->post('qty')[$i],
			);
			$this->db->where('id_buku',$this->input->post('id_buku')[$i])
					 ->update('buku', $stok);
		}		
		$proses=$this->db->insert_batch('nota', $hasil);
		if($proses){
			return $tm_nota->id_transaksi;
		} else {
			return 0;
		}
	}
	public function lastrans()
	{
		return $this->db->order_by('id_transaksi','desc')
		->where('nama_pembeli',$this->input->post('nama_pembeli'))
		->limit(1)
		->get('transaksi')
		->row();
	}
}

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */