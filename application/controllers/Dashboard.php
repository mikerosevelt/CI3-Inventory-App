<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->load->model('User');
  }

  public function index()
  {
    $data['title'] = 'Dashboard | Inventory App';
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/dashboard/index', $data);
    $this->load->view('templates/main/footer');
  }
}
