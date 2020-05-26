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
    $this->db->set('status', $status);
    $this->db->set('updatedAt', time());
    $this->db->where('id', $id);
    $this->db->update('invoices');
    if ($status == 'Paid') {
      $this->db->set('status', "Success");
      $this->db->set('updatedAt', time());
      $this->db->where('id', $this->input->post('order_id'));
      $this->db->update('orders');
    } else if ($status == 'Cancelled') {
      $this->db->set('status', "Cancelled");
      $this->db->set('updatedAt', time());
      $this->db->where('id', $this->input->post('order_id'));
      $this->db->update('orders');
    }
  }

  // Update invoice notes
  public function updateInvoiceNote($id)
  {
    $this->db->set('notes', $this->input->post('notes'));
    $this->db->set('updatedAt', time());
    $this->db->where('id', $id);
    $this->db->update('invoices');
  }

  // Delete an Invoice
  public function softdelete()
  {
    # code...
  }
}
