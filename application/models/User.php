<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
  public function createNewAccount()
  {
    $data = [
      'name' => $this->input->post('name', true),
      'email' => $this->input->post('email', true),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'role_id' => 2,
      'createdAt' => time()
    ];

    $this->db->insert('users', $data);
  }

  public function getAllUsers()
  {
    $this->db->select('user_role.*, users.id,users.name, users.email, users.role_id, users.createdAt, users.deletedAt, users.updatedAt');
    $this->db->from('users');
    $this->db->join('user_role', 'users.role_id = user_role.id');
    return $this->db->get()->result_array();
  }
}
