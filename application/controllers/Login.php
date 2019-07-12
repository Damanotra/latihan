<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
		//Do your magic here
	}

	public function index()
	{
		$this->load->view('halaman_login');
	}
	public function prosesLogin()
	{
		$post = $this->input->post();
		$username = $post['username'];
		$password = $post['password'];
		$login = $this->User_model->cek_user($username,$password);

		if (!is_null($login)) {
			# code...
			redirect('admin');
		}
		else{
			$this->session->set_flashdata('gagal', 'Username atau password salah');
			redirect(site_url('login'));
		}
		# code...
	}


}

/* End of file User.php */
/* Location: ./application/controllers/User.php */