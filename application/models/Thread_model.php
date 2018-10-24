<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Thread_model extends CI_Model
{
	function all() {
		return $this->db->select('users.username, users.photo, threads.created_at date_realease, threads.*')->join('users', 'users.id = threads.user_id')->get('threads')->result();
	}

	function detail($id) {
		return $this->db->select('users.username, users.photo, threads.created_at date_realease, threads.*, categories.name category_name, threads.id thread_id')->join('users', 'users.id = threads.user_id')->join('categories', 'categories.id = threads.category_id')->where('threads.id', $id)->get('threads')->row();
	}

	function store($data) {
		return $this->db->insert('threads', $data);
	}
}