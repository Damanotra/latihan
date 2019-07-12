<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities_model extends CI_Model {
	private $_table = "activities";
	public $id;
	public $name;
	public $email;
	public $barang;
	public $link_gambar;
	public $komentar;

	public function rules()
	{
		return [
			['field'=>'name',
			'label'=>'Name',
			'rules'=>'required'],

			['field'=>'email',
			'label'=>'Email',
			'rules'=>'required'],

			['field'=>'barang',
			'label'=>'Barang',
			'rules'=>'required'],

			['field'=>'link_gambar',
			'label'=>'gambar'],

			['field'=>'komentar',
			'label'=>'Comment'],
		];
		# code...
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
		# code...
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table,["id"=>$id])->row();
		# code...
	}

	public function save()
	{
		$post = $this->input->post();

		$this->name = $post['name'];
		$this->email = $post['email'];
		$this->barang = $post['barang'];
		$this->link_gambar = $this->_uploadImage();
		$this->komentar = $post['comment'];
		$this->db->insert($this->_table,$this);
		# code...
	}

	public function update()
	{
		$post = $this->input->post();
		if (!empty($_FILES["image"]["name"])) {
			$data = array(
        	'name' => $post['name'],
        	'email' => $post['email'],
        	'link_gambar' =>$this->_uploadImage(),
        	'barang' => $post['barang'],
        	'komentar' => $post['comment']
			);
		} else {
			$data = array(
        	'name' => $post['name'],
        	'email' => $post['email'],
        	'barang' => $post['barang'],
        	'link_gambar'=>$post['old_image'],
        	'komentar' => $post['comment']
			);
		}
		
		$this->db->update($this->_table,$data,array('id'=>$post['id']));
		# code...
	}
	public function delete($id)
	{
		return $this->db->delete($this->_table,array('id'=>$id));
		# code...
	}

	private function _uploadImage()
	{
		$config['upload_path']          = './upload/activity/';
	    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    	$config['file_name']            = md5($this->barang.time());
    	$config['overwrite']			= true;
    	$config['max_size']             = 1024; // 1MB
    	//$config['max_width']            = 1024;
    	//$config['max_height']           = 768;
   		$this->load->library('upload', $config);

    	if($this->upload->do_upload('image')) {
        	return $this->upload->data("file_name");
    	}
    
    	return "default.jpg";
		# code...
	}

	private function _deleteImage($value='')
	{
		$activity = $this->getById($id);
   		if ($activity->link_gambar != "default.jpg") {
	    	$filename = explode(".", $activity->link_gambar)[0];
			return array_map('unlink', glob(FCPATH."upload/activity/$filename.*"));
    	}
		# code...
	}



}

/* End of file Activity_model.php */
/* Location: ./application/models/Activity_model.php */