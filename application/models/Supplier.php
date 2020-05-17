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
      'name' => $this->input->post('name'),
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
}
