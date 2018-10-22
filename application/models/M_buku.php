<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {

	public function getDatabuku()
	{
		return $this->db->join('kategori_buku','kategori_buku.id_kategori=buku.id_kategori')						
						->get('buku')->result();
	}
	public function getDataKategori()
	{
		return $this->db->get('kategori_buku')->result();
	}
	public function simpan_buku($nama_file)
	{
		if ($nama_file=="") {
			$object = array(
			'judul_buku'=>$this->input->post('judul_buku'),
			'tahun' =>$this->input->post('tahun'),
			'harga' =>$this->input->post('harga'),
			'penerbit'=>$this->input->post('penerbit'),
			'penulis'=>$this->input->post('stok'),
			'stok'=>$this->input->post('penulis'),
			'id_kategori'=>$this->input->post('kategori')
			);
		}else{
			$object = array(
			'judul_buku'=>$this->input->post('judul_buku'),
			'tahun' =>$this->input->post('tahun'),
			'harga' =>$this->input->post('harga'),
			'penerbit'=>$this->input->post('penerbit'),
			'penulis'=>$this->input->post('penulis'),
			'stok'=>$this->input->post('stok'),
			'foto_cover'=>$this->upload->data('file_name'),	
			'id_kategori'=>$this->input->post('kategori')
			);
		}
		
		return $this->db->insert('buku', $object);
	}
	public function hapus($id_buku)
	{
		return $this->db->where('id_buku', $id_buku)->delete('buku');
	}
	public function edit_buku($nama_file)
	{
		if ($nama_file=="") {
			$object = array(
			'judul_buku'=>$this->input->post('judul_buku'),
			'tahun' =>$this->input->post('tahun'),
			'harga' =>$this->input->post('harga'),
			'penerbit'=>$this->input->post('penerbit'),
			'penulis'=>$this->input->post('penulis'),
			'stok'=>$this->input->post('stok'),
			'id_kategori'=>$this->input->post('kategori')
			);
		}else{
			$object = array(
			'judul_buku'=>$this->input->post('judul_buku'),
			'tahun' =>$this->input->post('tahun'),
			'harga' =>$this->input->post('harga'),
			'penerbit'=>$this->input->post('penerbit'),
			'penulis'=>$this->input->post('penulis'),
			'stok'=>$this->input->post('stok'),
			'foto_cover'=>$this->upload->data('file_name'),	
			'id_kategori'=>$this->input->post('kategori')
			);
		}
		return $this->db->where('id_buku', $this->input->post('id_buku'))->update('buku', $object);
	}
	public function detail($a)
	{
		return $this->db->join('kategori_buku','kategori_buku.id_kategori=buku.id_kategori')
						->where('id_buku', $a)->get('buku')->row();
	}
}

/* End of file M_buku.php */
/* Location: ./application/models/M_buku.php */