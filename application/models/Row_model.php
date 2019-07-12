<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Row_model extends CI_Model {

	private $_table = "row";
	public $id;
	public $name;
	public $email;
	public $barang;
	public $komentar;

	public function rules()
    {
        return [];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->name = $post["name"];
        $this->email = $post["email"];
        $this->barang = $post["barang"];
        $this->komentar = $post["comment"];
        $this->db->insert($this->_table, $this);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->name = $post["name"];
        $this->email = $post["email"];
        $this->komentar = $post["comment"];
        $this->db->update($this->_table, $this, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }

}

/* End of file row_model.php */
/* Location: ./application/models/row_model.php */