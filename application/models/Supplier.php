<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Model
{
  public function getAllSuppliers()
  {
    return $this->db->get('suppliers')->result_array();
  }

  public function addSupplier()
  {
    $data = [
      'code' => $this->input->post('code'),
      'supplier_name' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'phone' => $this->input->post('phone'),
      'address' => $this->input->post('address'),
      'city' => $this->input->post('city'),
      'state' => $this->input->post('state'),
      'postcode' => $this->input->post('postcode'),
      'country' => $this->input->post('country'),
      'createdAt' => time()
    ];
    $this->db->insert('suppliers', $data);
  }

  public function getSupplierById($id)
  {
    return $this->db->get_where('suppliers', ['id' => $id])->row_array();
  }

  public function updateSupplier($id)
  {
    $this->db->set('code', $this->input->post('code'));
    $this->db->set('supplier_name', $this->input->post('name'));
    $this->db->set('email', $this->input->post('email'));
    $this->db->set('phone', $this->input->post('phone'));
    $this->db->set('address', $this->input->post('address'));
    $this->db->set('city', $this->input->post('city'));
    $this->db->set('state', $this->input->post('state'));
    $this->db->set('postcode', $this->input->post('postcode'));
    $this->db->set('country', $this->input->post('country'));
    $this->db->set('updatedAt', time());
    $this->db->where('id', $id);
    $this->db->update('suppliers');
  }

  public function deleteSupplier($id)
  {
    $this->db->set('deletedAt', time());
    $this->db->where('id', $id);
    $this->db->update('suppliers');
  }
}
