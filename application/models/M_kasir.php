<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kasir extends CI_Model {

	public function getDatakasir()
	{
		return $this->db->get('kasir')->result();
	}
	public function simpan_kasir()
	{
		$object = array(
			'nama_kasir' => $this->input->post('nama_kasir') ,
			'password' => $this->input->post('password') ,
			'level' => $this->input->post('level'),
		);
		return $this->db->insert('kasir', $object);
	}
	public function hapus($id_kasir)
	{
		return $this->db->where('id_kasir', $id_kasir)->delete('kasir');
	}
	public function edit_kasir()
	{
		$object = array(
			'nama_kasir' => $this->input->post('nama_kasir') ,
			'password' => $this->input->post('password') ,
			'level' => $this->input->post('level'),
		);
		return $this->db->where('id_kasir', $this->input->post('id_kasir'))
						->update('kasir', $object);
	}
	public function detail($a)
	{
		return $this->db->where('id_kasir', $a)->get('kasir')->row();
	}
}

/* End of file M_kasir.php */
/* Location: ./application/models/M_kasir.php */