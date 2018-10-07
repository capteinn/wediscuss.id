<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Thread_model extends CI_Model
{
	function all() {
		return $this->db->join('users', 'users.id = threads.user_id')->get('threads')->result();
	}

	function store($data) {
		return $this->db->insert('threads', $data);
	}
}