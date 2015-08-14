<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		redirect('auth/login');
	}

	public function login()
	{
		$this->load->view('auth/login');
	}

	public function sha()
	{
		$password = $this->input->post('password');
		$oke = $this->encrypt->sha1($password);
		echo $oke;
	}

	public function proses_login()
	{
		$password 			= $this->input->post('password');
		$sha_password 		= $this->encrypt->sha1($password);
		$data['username'] 	= $this->input->post('username');
		$data['password'] 	= $sha_password;
		$query = $this->m_auth->cek_login($data);
		if ($query->num_rows() == 1){
			foreach($query->result() as $sess)
            {
              $sess_data['logged_in'] = 'Sudah Login';
              $sess_data['username']  = $sess->username;
              $this->session->set_userdata($sess_data);
            }
            redirect('admin');
		}
		else
		{
			redirect('login');
		}
		
		
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('auth');
	} 
}