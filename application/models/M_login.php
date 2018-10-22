<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function getDataUser()
	{
		return $this->db
					->where('nama_kasir',$this->input->post('nama_kasir'))
					->where('password',$this->input->post('password'))
					->get('kasir');
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */