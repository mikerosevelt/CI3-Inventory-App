<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->load->model('Order');
  }

  public function index()
  {
    $data['title'] = 'Settings | Inventory App';
    // $data['orders'] = $this->Order->getAllOrders();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/orders/index', $data);
    $this->load->view('templates/main/footer');
  }

  public function backup()
  {
    $data['title'] = 'Backup Database | Inventory App';
    // $data['orders'] = $this->Order->getAllOrders();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/settings/backup', $data);
    $this->load->view('templates/main/footer');
  }
}
