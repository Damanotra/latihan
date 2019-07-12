<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
		//Do your magic here
	}

	public function index()
	{
		$user = $this->User_model;
		$validation = $this->form_validation->set_rules($user->rules());
		if ($validation->run()) {
			$user->add();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			# code...
		}
		$this->load->view('halaman_daftar');
	}

	public function prosesDaftar()
	{
		$post = $this->input->post();
		$username = $post['name'];
		$email = $post['email'];
		$password = $post['password'];
		$this->User_model->add($username,$email,$password);
		$this->session->set_flashdata('success','Sukses mendaftarkan');
		$this->load->view('halaman_daftar');
		# code...
		# code...
	}
}

/* End of file Daftar.php */
/* Location: ./application/controllers/Daftar.php */