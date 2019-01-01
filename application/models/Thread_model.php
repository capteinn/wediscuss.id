<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Thread_model extends CI_Model
{
	function all() {
		return $this->db->select('users.username, users.photo, threads.created_at date_realease, threads.*')->join('users', 'users.id = threads.user_id')->get('threads')->result();
	}

	function detail($id) {
		return $this->db
		->select('users.username, users.photo, threads.created_at date_realease, threads.*, categories.name category_name, threads.id thread_id')
		->join('users', 'users.id = threads.user_id')
		->join('categories', 'categories.id = threads.category_id')
		->where('threads.id', $id)
		->get('threads')->row();
	}

	function getLike($thread_id, $user_id) {
		return $this->db
		->where('thread_id', $thread_id)
		->where('user_id', $user_id)
		->order_by('created_at', 'desc')
		->get('likes')
		->row();
	}

	function store($data) {
		return $this->db->insert('threads', $data);
	}

	function updateLike($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('likes', $data);
	}

	function pushUpdateLike($id, $like) {
		$this->db->where('id', $id);
		if ($like) {
			//change like
			$this->db->set('`dislike`', '`dislike`-1', FALSE);
			$this->db->set('`like`', '`like`+1', FALSE);
		} else {
			//change dislike
			$this->db->set('`like`', '`like`-1', FALSE);
			$this->db->set('`dislike`', '`dislike`+1', FALSE);
		}
		return $this->db->update('threads');
	}

	function like($data) {
		return $this->db->insert('likes', $data);
	}

	function pushLike($id) {
		$this->db->where('id', $id);
		$this->db->set('`like`', '`like`+1', FALSE);
		return $this->db->update('threads');
	}

	function dislike($data) {
		return $this->db->insert('likes', $data);
	}

	function pushDislike($id) {
		$this->db->where('id', $id);
		$this->db->set('`dislike`', '`dislike`+1', FALSE);
		return $this->db->update('threads');
	}
}