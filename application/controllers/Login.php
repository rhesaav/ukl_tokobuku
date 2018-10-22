<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login','login');
	}

	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			redirect('Toko','refresh');
		}
		else{
			$this->load->view('login');
		}		
	}
	public function proses()
	{		
		$this->form_validation->set_rules('nama_kasir', 'Nama Kasir', 'trim|required|min_length[2]');			
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[2]');

		if ($this->form_validation->run()==TRUE) {
			if ($this->login->getDataUser()->num_rows()>0) {
				$data_user=$this->login->getDataUser()->row();
				$array = array(
					'login' => TRUE,
					'nama_kasir' => $data_user->nama_kasir,
					'password' => $data_user->password,
					'level' =>$data_user->level,
				);
				$this->session->set_userdata( $array );
				redirect('Toko','refresh');
			}
			else{
				$this->session->set_flashdata('pesan', 'Username / Password Salah');
				redirect('Login','refresh');
			}
		}
		else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('Login','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */