<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public function getDataKategori()
	{
		return $this->db->get('kategori_buku')->result();
	}
	public function simpan_kategori()
	{
		$object = array(
			'nama_kategori' => $this->input->post('nama_kategori') ,
		);
		return $this->db->insert('kategori_buku', $object);
	}
	public function hapus($id_kategori)
	{
		return $this->db->where('id_kategori', $id_kategori)->delete('kategori_buku');
	}
	public function edit_kategori()
	{
		$object = array(
			'id_kategori' =>$this->input->post('id_kategori'),
			'nama_kategori' => $this->input->post('nama_kategori') ,
		);
		return $this->db->where('id_kategori', $this->input->post('id_kategori'))->update('kategori_buku', $object);
	}
	public function detail($a)
	{
		return $this->db->where('id_kategori', $a)->get('kategori_buku')->row();
	}
}

/* End of file M_kategori.php */
/* Location: ./application/models/M_kategori.php */