<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Model
{
  // Get all invoices from database
  public function getAllInvoices()
  {
    return $this->db->get('invoices')->result_array();
  }

  // Get a single invoice by id
  public function getInvoiceDetailById($id)
  {
    $this->db->select('orders.*, invoices.*');
    $this->db->from('invoices');
    $this->db->join('orders', 'orders.id = invoices.order_id');
    $this->db->where('invoices.id', $id);
    return $this->db->get()->row_array();
  }

  // Update invoice status
  public function updateInvoiceStatus($id)
  {
    $status = $this->input->post('status');
    if ($status == 'Paid') {
      $this->db->set('status', "Success");
      $this->db->set('updatedAt', time());
      $this->db->where('id', $this->input->post('order_id'));
      $this->db->update('orders');
      // Invoice status
      $this->db->set('paidAt', time());
    } else if ($status == 'Cancelled') {
      $this->db->set('status', "Cancelled");
      $this->db->set('updatedAt', time());
      $this->db->where('id', $this->input->post('order_id'));
      $this->db->update('orders');
      // Invoice status
      $this->db->set('paidAt', null);
    }
    $this->db->set('status', $status);
    $this->db->set('updatedAt', time());
    $this->db->where('id', $id);
    $this->db->update('invoices');
    // Insert user activity
    $userData = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $users = [
      'user_id' => $userData['id'],
      'activity' => 'Update invoice status',
      'createdAt' => time()
    ];
    $this->db->insert('users_activity', $users);
  }

  // Update invoice notes
  public function updateInvoiceNote($id)
  {
    $this->db->set('notes', $this->input->post('notes'));
    $this->db->set('updatedAt', time());
    $this->db->where('id', $id);
    $this->db->update('invoices');

    $userData = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $users = [
      'user_id' => $userData['id'],
      'activity' => 'Update invoice notes',
      'createdAt' => time()
    ];
    $this->db->insert('users_activity', $users);
  }

  // Delete an Invoice
  public function softdelete()
  {
    # code...
  }
}
