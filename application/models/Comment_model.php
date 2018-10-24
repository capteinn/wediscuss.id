<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model
{

	function detail($id) {
		return $this->db->where('thread_id', $id)
		->get('comments')->row();
	}

	function store($data) {
		return $this->db->insert('comments', $data);
	}
}