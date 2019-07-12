<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$query = $this->db->query("SELECT * FROM activities");
		var_dump($query->result()[0]->id);
		$this->load->view('welcome_message');
	}
	public function form()
	{
		$this->load->view('form');
	}

	public function login()
	{
		$this->load->view('halaman_login');
		# code...
	}
	public function singin($value='')
	{
		$this->load->view('halaman_daftar');
		# code...
	}
}
