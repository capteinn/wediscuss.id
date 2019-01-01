<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model
{

	function detail($id) {
		return $this->db
		->select('description, thread_id, username, comments.created_at')
		->where('thread_id', $id)
		->join('users', 'users.id = comments.user_id')
		->get('comments')->result();
	}

	function store($data) {
		return $this->db->insert('comments', $data);
	}
}