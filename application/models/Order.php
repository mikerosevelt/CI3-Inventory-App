<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Model
{
  public function getAllOrders()
  {
    return $this->db->get('orders')->result_array();
  }

  public function addNewOrder()
  {
    $address = $this->input->post('address') . "|" . $this->input->post('city') . "|" . $this->input->post('state') . "|" . $this->input->post('postcode') . "|" . $this->input->post('country');
    $data = [
      'user_id' => $this->input->post('employeeId'),
      'customer_name' => $this->input->post('name'),
      'customer_phone' => $this->input->post('phone'),
      'customer_email' => $this->input->post('email'),
      'customer_address' => $address,
      'total_item' => sizeof($this->cart->contents()),
      'total_price' => $this->cart->total(),
      'status' => "Processing",
      'createdAt' => time(),
    ];

    $this->db->insert('orders', $data);
    $order_id = $this->db->insert_id();

    foreach ($this->cart->contents() as $c) {
      $orderDetail = [
        'order_id' => $order_id,
        'product_name' => $c['name'],
        'price' => $c['price'],
        'quantity' => $c['qty'],
        'unit' => $c['unit'],
        'subtotal' => $c['subtotal']
      ];
      $this->db->insert('orders_detail', $orderDetail);

      $dataProduct = $this->db->get_where('products', ['id' => $c['id']])->row_array();
      $new = $dataProduct['qty_stock'] - $c['qty'];
      $this->db->set('qty_stock', $new);
      $this->db->where('id', $c['id']);
      $this->db->update('products');
    }
    // Update qty stock product
    // $this->db->set();
  }
}
