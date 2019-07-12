<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New extends CI_Controller {

	public function index($str)
	{
		$query = "SELECT * FROM activities WHERE name like ".$str." OR email like ".$str." OR barang LIKE ".$str." OR komentar LIKE ".$str;

	}

}

/* End of file new.php */
/* Location: ./application/controllers/api/new.php */