<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoices extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Invoice');
  }

  public function index()
  {
    $data['title'] = 'Manage Products | Inventory App';
    $data['invoices'] = $this->Invoice->getAllInvoices();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/invoices/index', $data);
    $this->load->view('templates/main/footer');
  }

  /**
   * Show an invoice detail
   */
  public function detail()
  {
    # code...
  }

  /**
   * Create new invoice
   */
  public function create()
  {
    # code...
  }

  /**
   * Insert new invoice to database
   */
  public function insert()
  {
    # code...
  }

  /**
   * Update an invoice data
   */
  public function update()
  {
    # code...
  }

  /**
   * Delete an invoice
   */
  public function delete()
  {
    # code...
  }
}
