<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
  function login($username, $password)
  {
      $user = $this->db->select('u.id, u.username, u.password, u.role_id, r.name, u.photo')
      ->from('users as u')
      ->join('roles as r','r.id=u.role_id')
      ->where('u.username', $username)
      ->get()->row();
      
      if(!empty($user)){
          if(password_verify($password, $user->password)) {
              return $user;
          } else {
              return array();
          }
      } else {
          return array();
      }
  }
}