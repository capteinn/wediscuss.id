<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model
{

	public function index()
	{

	}

	public function insert($data)
	{ 
		return $this->db->insert('users', $data); 
	} 
	
}