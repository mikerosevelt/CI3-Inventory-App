<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Model
{
  public function getAllOrders()
  {
    $this->db->get('orders')->result_array();
  }
}
