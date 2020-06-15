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
        $data['activities'] = $this->User->getUserActivities($id);

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
   * @param /user_id
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

  // User profile page
  public function profile()
  {
    $data['title'] = 'My Profile | Inventory App';

    $data['user'] = $this->User->getUserProfile();
    $data['log'] = $this->User->getUserLog($data['user']['id']);
    $data['activities'] = $this->User->getUserActivities($data['user']['id']);

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/users/profile', $data);
    $this->load->view('templates/main/footer');
  }

  // Update logged in user detail
  public function updateProfile()
  {
    $this->form_validation->set_rules('name', 'Name', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
    $this->form_validation->set_rules('phone', 'phone', 'trim|required');
    $this->form_validation->set_rules('address', 'address', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('city', 'city', 'trim|required');
    $this->form_validation->set_rules('state', 'state', 'trim|required');
    $this->form_validation->set_rules('postcode', 'postcode', 'trim|required');
    $this->form_validation->set_rules('country', 'country', 'trim|required');

    if ($this->form_validation->run() == false) {
      echo $this->profile();
    } else {
      $this->User->updateUserProfile();
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Your profil has been updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('users/profile');
    }
  }

  // Update logged in user password
  public function updatePassword()
  {
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('current', 'Current Password', 'trim|required');
    $this->form_validation->set_rules('password', 'New Password', 'required|trim|min_length[5]', [
      'min_length' => 'Password is too short'
    ]);
    $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[5]|matches[password]', [
      'matches' => 'Password do not match',
    ]);

    if ($this->form_validation->run() == false) {
      echo $this->profile();
    } else {
      $current_password = $this->input->post('current');
      $new_password = $this->input->post('password');

      if (!password_verify($current_password, $data['user']['password'])) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Wrong current password!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('users/profile');
      } else {
        if ($current_password == $new_password) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">New password cannot be the same as current password!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('users/profile');
        } else {
          $this->User->updateUserPassword();
          $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Your password has been updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('users/profile');
        }
      }
    }
  }
}
