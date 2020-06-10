<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Report');

    // Check User session
    // if (!$this->session->userdata['email']) {
    //   $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please login!</div>');
    //   redirect('auth');
    // }
  }

  public function index()
  {
    $data['title'] = 'Reports Overview | Inventory App';
    // $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/reports/index', $data);
    $this->load->view('templates/main/footer');
  }

  public function transactions()
  {
    $data['title'] = 'Transactions Report | Inventory App';

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/reports/transactions-report', $data);
    $this->load->view('templates/main/footer');
  }

  public function inventory()
  {
    $data['title'] = 'Inventory Report | Inventory App';
    $data['product'] = $this->Report->getAllProducts();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/reports/inventory', $data);
    $this->load->view('templates/main/footer');
  }

  public function history()
  {
    $data['title'] = 'Product History Report | Inventory App';
    // $data['product'] = $this->Report->getAllProducts();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/reports/product-history', $data);
    $this->load->view('templates/main/footer');
  }

  public function test()
  {
    $array = $this->Report->getAllProducts();
    // print_r(json_encode($this->Report->getTotalOutgoing()));
    // foreach ($array as $a) {
    //   $val += $a['quantity'];
    // }
    // $data['totalOutgoing'] = $val;
    // print_r($array);
    print_r(json_encode($this->Report->getAllProducts()));
  }

  public function usersLog()
  {
    $data['title'] = 'Inventory Report | Inventory App';
    // $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/reports/users-log', $data);
    $this->load->view('templates/main/footer');
  }
}
