<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suppliers extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->load->model('User');
  }

  public function index()
  {
    $data['title'] = 'Manage Suppliers | Inventory App';
    // $data['userlist'] = $this->User->getAllUsers();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/suppliers/index', $data);
    $this->load->view('templates/main/footer');
  }
}
