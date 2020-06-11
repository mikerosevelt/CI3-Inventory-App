<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
  // Create a new user
  public function createNewAccount()
  {
    $data = [
      'name' => $this->input->post('name', true),
      'email' => $this->input->post('email', true),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'dob' => strtotime($this->input->post('dob', true)),
      'phone' => $this->input->post('phone', true),
      'address' => $this->input->post('address', true),
      'city' => $this->input->post('city', true),
      'state' => $this->input->post('state', true),
      'postcode' => $this->input->post('postcode', true),
      'country' => $this->input->post('country', true),
      'role_id' => 2,
      'createdAt' => time()
    ];

    $this->db->insert('users', $data);

    $userData = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $users = [
      'user_id' => $userData['id'],
      'activity' => 'Created new user',
      'createdAt' => time()
    ];
    $this->db->insert('users_activity', $users);
  }

  // Get all users
  public function getAllUsers()
  {
    $this->db->select('user_role.*, users.id,users.name, users.email, users.role_id, users.createdAt, users.deletedAt, users.updatedAt');
    $this->db->from('users');
    $this->db->join('user_role', 'users.role_id = user_role.id');
    $this->db->where('users.deletedAt', null);
    return $this->db->get()->result_array();
  }

  // Get a user detail by id
  public function getUserById($id)
  {
    $this->db->select('user_role.*, users.id, users.name, users.email, users.dob, users.phone, users.address, users.city, users.state, users.postcode, users.country, users.role_id, users.createdAt, users.deletedAt, users.updatedAt');
    $this->db->from('users');
    $this->db->join('user_role', 'users.role_id = user_role.id');
    $this->db->where('users.id', $id);
    return $this->db->get()->row_array();
  }

  // Get user logs by user id
  public function getUserLog($id)
  {
    return $this->db->get_where('user_logs', ['user_id' => $id])->row_array();
  }

  // Update user data
  public function updateUserData($id)
  {
    // 
  }

  // Soft delete (not permanently) a user
  public function softDelete($id)
  {
    $this->db->set('deletedAt', time());
    $this->db->where('id', $id);
    $this->db->update('users');

    $userData = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $users = [
      'user_id' => $userData['id'],
      'activity' => 'Deleted a user not permanently',
      'createdAt' => time()
    ];
    $this->db->insert('users_activity', $users);
  }

  // Get all user logs
  public function getAllUsersLog()
  {
    $this->db->select('users.name, user_logs.*');
    $this->db->from('user_logs');
    $this->db->join('users', 'users.id = user_logs.user_id');
    return $this->db->get()->result_array();
  }
}
