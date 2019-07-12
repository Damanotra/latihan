<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('activities_model');
		$this->load->library('form_validation');
		//Do your magic here
	}

	public function index()
	{
		$data['activities'] = $this->activities_model->getAll();
		$this->load->view('admin/activity/list',$data);
	}

	public function add()
	{
		$activities = $this->activities_model;
		$validation = $this->form_validation;
		$validation->set_rules($activities->rules());
		if($validation->run()){
			$activities->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		$this->load->view('admin/activity/new_form');
		# code...
	}

	public function edit($id=null)
	{
		if(!isset($id)) redirect('admin/activities');
		$activities = $this->activities_model;
		$validation = $this->form_validation->set_rules($activities->rules());
		//var_dump($validation->run());
		if ($validation->run()) {
			$activities->update();
			//var_dump('run masuk');
			//empty($_FILES["image"]["name"]
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			# code...
		}
		//var_dump('run tidak masuk');
		$data['activity'] = $activities->getById($id);
		if(!$data['activity']) show_404();
		$this->load->view('admin/activity/edit_form', $data);
		# code...
	}

	public function delete($id=null)
	{
		if(!isset($id)) show_404();
		if($this->activities_model->delete($id)){
			redirect(site_url('admin/activities'));
		}
		# code...
	}

}

/* End of file Activities.php */
/* Location: ./application/controllers/admin/Activities.php */