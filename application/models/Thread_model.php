<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Thread_model extends CI_Model
{
	function all() {
		return $this->db->get('threads')->result();
	}
}