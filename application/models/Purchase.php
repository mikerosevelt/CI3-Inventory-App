<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase extends CI_Model
{
  public function getAllPurchases()
  {
    $this->db->select('users.id, users.name, suppliers.id, suppliers.code, purchases.*');
    $this->db->from('purchases');
    $this->db->join('users', 'users.id = purchases.user_id');
    $this->db->join('suppliers', 'suppliers.id = purchases.supplier_id');
    return $this->db->get()->result_array();
  }
}
