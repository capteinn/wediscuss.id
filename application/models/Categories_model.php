<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends CI_Model
{
	function all() {
		return $this->db->get('categories')->result();
	}
}