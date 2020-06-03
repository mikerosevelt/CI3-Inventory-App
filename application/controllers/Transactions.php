<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transactions extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->load->model('User');
  }

  public function index()
  {
    $data['title'] = 'Manage Transactions | Inventory App';
    $data['transactions'] = $this->db->get_where('invoices', ['status' => 'Paid'])->result_array();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/transactions/index', $data);
    $this->load->view('templates/main/footer');
  }

  public function getTransactionData()
  {
    echo json_encode($this->db->get_where('invoices', ['id' => $this->input->post('id')])->row_array());
  }
}
