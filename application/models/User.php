<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
  public function createNewAccount()
  {
    $data = [
      'name' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'role_id' => 2,
      'createdAt' => time()
    ];

    $this->db->insert('users', $data);
  }
}
