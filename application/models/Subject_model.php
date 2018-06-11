<?php

class Subject_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->table = 'subjects';

	}

	public function get_list()
	{
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

}
