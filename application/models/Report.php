<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Report extends CI_Model
{
  // Get all products
  public function getReportProducts()
  {
    return $this->db->get('products')->result_array();
  }

  // Get total outgoing per product group by success only
  public function getTotalOutgoing()
  {
    $this->db->select('products.product_code, orders.id, orders.status, orders_detail.order_id, orders_detail.product_code, orders_detail.quantity');
    $this->db->from('orders_detail');
    $this->db->join('orders', 'orders_detail.order_id = orders.id');
    $this->db->join('products', 'orders_detail.product_code = products.product_code');
    $this->db->having('status', 'Success');
    return $this->db->get()->result_array();
  }

  // Get all products group by products.id
  public function getAllProducts()
  {
    $this->db->select('users.name, products.product_code, products.product_name, products.incoming, products.qty_stock, products.unit, products.createdAt');
    $this->db->select_sum('orders_detail.quantity', 'outgoing');
    $this->db->from('products');
    $this->db->join('orders_detail', 'orders_detail.product_code = products.product_code');
    $this->db->join('users', 'users.id = products.user_id');
    $this->db->join('orders', 'orders.id = orders_detail.order_id');
    $this->db->group_by('products.id');
    return $this->db->get()->result_array();
  }

  /** END OF REPORT MODEL */
}
