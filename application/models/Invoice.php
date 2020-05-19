<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Model
{
  /**
   * Get all invoices from database
   */
  public function getAllInvoices()
  {
    return $this->db->get('invoices')->result_array();
  }
}
