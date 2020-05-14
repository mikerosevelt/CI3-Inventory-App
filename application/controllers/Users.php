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

  /**
   * @desc Show user detail
   */
  public function detail()
  {
    $id = $this->uri->segment(3);
    $data['user'] = $this->db->get_where('users', ['id' => $id])->row_array();
    if ($id) {
      if ($data['user']) {
        $data['title'] = 'User Detail | Inventory App';
        $data['detail'] = $this->User->getUserById($id);
        $data['log'] = $this->User->getUserLog($id);

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/topbar');
        $this->load->view('templates/main/sidebar');
        $this->load->view('main/users/detail', $data);
        $this->load->view('templates/main/footer');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            User not found.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('users');
      }
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

  /**
   * @desc Add new user
   */
  public function create()
  {
    # code...
  }

  /**
   * @desc Update user data
   */
  public function update()
  {
    # code...
  }

  /**
   * @desc Delete user
   */
  public function delete()
  {
    $id = $this->uri->segment(3);
    $data['user'] = $this->db->get_where('users', ['id' => $id])->row_array();
    if ($id) {
      if ($data['user']) {
        $this->User->softDelete($id);
        $this->session->set_flashdata('swal', 'User successfully deleted');
        redirect('users');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            User not found.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('users');
      }
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
