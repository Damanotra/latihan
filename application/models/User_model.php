<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $_table = "users";
	public $username;
	public $email;
	public $password;

	public function rules()
	{
		return [
			['field'=>'username',
			'label'=>'Username',
			'rules'=>'required'],

			['field'=>'email',
			'label'=>'Email',
			'rules'=>'required'],

			['field'=>'password',
			'label'=>'Password',
			'rules'=>'required'],
		];
		# code...
	}

	public function cek_user($username, $password)
	{
		//var_dump($username);
		$query = "email = '".$username."' OR username = '".$username."'";
		var_dump($query);
   		$this->db->where($query);
    	$this->db->where('password', $password);
    	$result = $this->db->get($this->_table)->row_array();
    	return $result;
		# code...
	}
	public function add()
	{
		$post = $this->input->post();
		$this->username = $post['username'];
		$this->email = $post['email'];
		$this->password = $post['password'];
		$this->db->insert($this->_table,$this);
		# code...
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */