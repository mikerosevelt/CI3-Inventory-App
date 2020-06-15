<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Report extends CI_Model
{
  // Get total outgoing per product
  public function getTotalOutgoing($code)
  {
    // $this->db->select('orders_detail.quantity');
    $this->db->select_sum('orders_detail.quantity');
    $this->db->from('orders_detail');
    $this->db->join('orders', 'orders_detail.order_id = orders.id');
    $this->db->where('orders_detail.product_code', $code);
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

  // Get single product by code
  public function getProductByCode($code)
  {
    $this->db->select('products.*, users.name');
    $this->db->from('products');
    $this->db->join('users', 'users.id = products.user_id');
    $this->db->where('products.product_code', $code);
    return $this->db->get()->row_array();
  }

  // Get all purchases by product code
  public function getAllPurchasesByCode($code)
  {
    $this->db->select('purchases.*, users.name, suppliers.supplier_name');
    $this->db->from('purchases');
    $this->db->join('users', 'users.id = purchases.user_id');
    $this->db->join('suppliers', 'suppliers.id = purchases.supplier_id');
    $this->db->where('purchases.product_code', $code);
    $this->db->order_by('purchases.createdAt', 'desc');
    return $this->db->get()->result_array();
  }

  // Get order product on orders_detail by code
  public function getOrderProductByCode($code)
  {
    $this->db->select('orders_detail.*, orders.*, users.name');
    $this->db->from('orders_detail');
    $this->db->join('orders', 'orders.id = orders_detail.order_id');
    $this->db->join('users', 'users.id = orders.user_id');
    $this->db->where('orders_detail.product_code', $code);
    $this->db->order_by('orders.createdAt', 'desc');
    return $this->db->get()->result_array();
  }

  // Get total income
  public function getTotalIncome()
  {
    $this->db->select_sum('total_amount', 'income');
    $this->db->from('invoices');
    $this->db->where('status', "Paid");
    return $this->db->get()->result_array();
  }

  // Get total expenditure
  public function getTotalExpanditure()
  {
    $this->db->select_sum('total_price', 'expenditure');
    $this->db->from('purchases');
    return $this->db->get()->result_array();
  }

  // Get all users activities
  public function getAllUsersActivities()
  {
    $this->db->select('users.name, users_activities.*');
    $this->db->from('users_activities');
    $this->db->join('users', 'users.id = users_activities.user_id');
    $this->db->order_by('users_activities.createdAt', 'DESC');
    return $this->db->get()->result_array();
  }

  // Get users activities by specific date range
  public function getReportByDateRange($start, $end)
  {
    $type = $this->input->post('type');

    if ($type == 'Activities') {
      $where = "users_activities.createdAt BETWEEN " . $start . " AND " . $end;
      $this->db->select('users.name, users_activities.*');
      $this->db->from('users_activities');
      $this->db->join('users', 'users.id = users_activities.user_id');
      $this->db->where($where);
      $this->db->order_by('users_activities.createdAt', 'DESC');
      return $this->db->get()->result_array();
    } else if ($type == 'Transactions') {
      $where = "invoices.createdAt BETWEEN " . $start . " AND " . $end;
      $this->db->select('invoices.*');
      $this->db->from('invoices');
      $this->db->where($where);
      $this->db->where('status', 'Paid');
      $this->db->or_where('status', 'Cancelled');
      return $this->db->get()->result_array();
    } else {
      redirect('reports');
    }
  }

  // Get all transactions where status 'paid' and 'cancelled'
  public function getAllTransactions()
  {
    $this->db->select('invoices.*');
    $this->db->from('invoices');
    $this->db->where('status', 'Paid');
    $this->db->or_where('status', 'Cancelled');
    return $this->db->get()->result_array();
  }

  /** END OF REPORT MODEL */
}
