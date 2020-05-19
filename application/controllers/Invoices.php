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

    $id = $this->uri->segment(3);
    $data['invoice'] = $this->Invoice->getInvoiceDetailById($id);
    if ($id) {
      if ($data['invoice']) {
        $data['title'] = 'Invoice Detail | Inventory App';

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/topbar');
        $this->load->view('templates/main/sidebar');
        $this->load->view('main/invoices/detail', $data);
        $this->load->view('templates/main/footer');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Invoice not found.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('invoices');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Something went wrong.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>');
      redirect('invoices');
    }
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
