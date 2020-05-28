<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Model
{
  // Get all orders from database
  public function getAllOrders()
  {
    return $this->db->get('orders')->result_array();
  }

  // Get Order Detail/Items by id
  public function getOderDetailById($id)
  {
    return $this->db->get_where('orders_detail', ['order_id' => $id])->result_array();
  }

  // Add new order to database
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

    // Create new order invoice
    $invoice = [
      'order_id' => $order_id,
      'total_amount' => $this->cart->total(),
      'status' => "Unpaid",
      'createdAt' => time()
    ];
    $this->db->insert('invoices', $invoice);
  }

  // Update an order status
  public function updateOrderStatus()
  {
    # code...
  }

  // Delete an order, order detail & invoice permanently
  public function deleteOrder($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('orders');
    $this->db->where('order_id', $id);
    $this->db->delete('orders_detail');
    $this->db->where('order_id', $id);
    $this->db->delete('invoices');
  }
}
