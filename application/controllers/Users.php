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
   * @param /user_id
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
   * @desc Add new user page
   */
  public function create()
  {
    $data['title'] = 'Add New User | Inventory App';

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/users/create', $data);
    $this->load->view('templates/main/footer');
  }

  /**
   * @desc Insert new user to database
   */
  public function insert()
  {
    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
      'is_unique' => 'Email is already registered!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
    $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|max_length[13]');
    $this->form_validation->set_rules('dob', 'Date of Birth', 'required|trim');
    $this->form_validation->set_rules('address', 'Address', 'required|trim|max_length[60]');
    $this->form_validation->set_rules('city', 'City', 'required|trim');
    $this->form_validation->set_rules('state', 'State', 'required|trim');
    $this->form_validation->set_rules('postcode', 'PostCode', 'required|trim');
    $this->form_validation->set_rules('country', 'Country', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->create();
    } else {
      $this->User->createNewAccount();
      $this->session->set_flashdata('swal', 'New user has been created');
      redirect('users');
    }
  }

  /**
   * @desc Update user data
   */
  public function update()
  {
    # code...
  }

  /**
   * @desc Soft delete a user
   * @param /user_id
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
