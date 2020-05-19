<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchases extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Purchase');
  }

  public function index()
  {
    $data['title'] = 'Manage Purchases | Inventory App';
    $data['purchases'] = $this->Purchase->getAllPurchases();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/purchases/index', $data);
    $this->load->view('templates/main/footer');
  }
}
