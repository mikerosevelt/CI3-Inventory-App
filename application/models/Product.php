<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Model
{
  public function FunctionName()
  {
    # code...
  }

  public function addCategory($id)
  {
    $data = [
      'user_id' => $id,
      'category' => $this->input->post('category', true),
      'isActive' => $this->input->post('status'),
      'createdAt' => time()
    ];

    $this->db->insert('categories', $data);
  }

  public function getAllCategories()
  {
    $this->db->select('users.id, users.name, categories.*');
    $this->db->from('categories');
    $this->db->join('users', 'categories.user_id = users.id');
    return $this->db->get()->result_array();
  }

  public function getCategoryById($id)
  {
    return $this->db->get_where('categories', ['id' => $id])->row_array();
  }

  public function updateCategory($id)
  {
    $this->db->set('category', $this->input->post('category'));
    $this->db->set('isActive', $this->input->post('status'));
    $this->db->set('updatedAt', time());
    $this->db->where('id', $id);
    $this->db->update('categories');
  }

  // Soft delete category
  public function deleteCategory($id)
  {
    $this->db->set('deletedAt', time());
    $this->db->where('id', $id);
    $this->db->update('categories');
  }
}
