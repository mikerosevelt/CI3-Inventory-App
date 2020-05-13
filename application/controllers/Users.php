<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User');
  }

  public function index()
  {
    $data['title'] = 'Manage Users | Inventory App';
    $data['userlist'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/users/index', $data);
    $this->load->view('templates/main/footer');
  }
}
