<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Row extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("row_model");
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data["rows"] = $this->row_model->getAll();
		//print_r ($data["row"]);
       	//$this->load->view("admin/row/list", $data);
       	$this->load->view("form");
	}

	public function add()
    {
        $row = $this->row_model;
        $validation = $this->form_validation;
        $validation->set_rules($row->rules());
		var_dump("test msh fail");
        if ($validation->run()) {
            $row->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else
        	
       	$this->load->view("form");

        //$this->load->view("admin/row/new_form");
    }

	public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/products');
       
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("admin/product/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->product_model->delete($id)) {
            redirect(site_url('admin/products'));
        }
    }
}

/* End of file row.php */
/* Location: ./application/controllers/row.php */