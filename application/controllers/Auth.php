<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User');
  }

  public function index()
  {
    // check if user already login cannot visit auth page.
    if ($this->session->userdata('email')) {
      redirect('dashboard');
    }

    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login Page | Inventory App';
      $this->load->view('templates/auth/header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth/footer');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('users', ['email' => $email])->row_array();
    if ($user) {
      if (password_verify($password, $user['password'])) {
        $data = [
          'email' => $user['email'],
          'role_id' => $user['role_id']
        ];
        // USER LOG
        $userlog = $this->db->get_where('user_logs', ['user_id' => $user['id']])->row_array();
        $datalog = [
          'user_id' => $user['id'],
          'ip_address' => $this->input->ip_address(),
          'host' => gethostbyaddr($this->input->ip_address()),
          'user_agent' => $this->input->user_agent(),
          'last_login' => time()
        ];
        if ($userlog['user_id'] == $user['id']) {
          $this->db->set('ip_address', $this->input->ip_address());
          $this->db->set('host', gethostbyaddr($this->input->ip_address()));
          $this->db->set('user_agent', $this->input->user_agent());
          $this->db->set('last_login', time());
          $this->db->where('user_id', $user['id']);
          $this->db->update('user_log');
        } else {
          $this->db->insert('user_log', $datalog);
        }
        $this->session->set_userdata($data);
        redirect('dashboard');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Wrong password!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          User is not exist.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>'
      );
      redirect('auth');
    }
  }

  public function register()
  {
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
      'is_unique' => 'Email is already registered!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password2]', [
      'matches' => 'Password do not match',
      'min_length' => 'Password is too short'
    ]);
    $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password]');
    if ($this->form_validation->run() == false) {

      $data['title'] = 'Register Page | Inventory App';
      $this->load->view('templates/auth/header', $data);
      $this->load->view('auth/register');
      $this->load->view('templates/auth/footer');
    } else {
      $this->User->createNewAccount();
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Hooray!</strong> Your account has been created.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>'
      );
      redirect('auth');
    }
  }

  public function forgotPassword()
  {
    # code...
  }

  public function logout()
  {
    # code...
  }
}
