<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends CI_Model
{
	// function all() {
	// 	return $this->db->get('categories')->result();
	// }
	function all() {
		// return $this->db->select('categories.id, categories.name');
		return $this->db->get('categories')->result();
	}

	public function update($data)
	{   
		$this->db->update('categories', $data);
	}  

	// function delete($where,$table)
	function delete($param)
	{  
		return $this->db->delete('categories',array('id'=>$param));
	} 

	function store($data) {
		return $this->db->insert('categories', $data);
	}
}