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
    $data['userlist'] = $this->User->getAllUsers();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/users/index', $data);
    $this->load->view('templates/main/footer');
  }

  public function destroy()
  {
    $id = $this->uri->segment(3);
    $data['user'] = $this->db->get_where('users', ['id' => $id]);
    if ($data['user']) {
      // MODEL
      $this->session->set_flashdata('swal', 'User successfully deleted');
      redirect('users');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Something went wrong.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>');
      redirect('users');
    }
  }
}
