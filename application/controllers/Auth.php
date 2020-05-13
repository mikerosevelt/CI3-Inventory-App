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
    // check if user already login cannot visit Login page.
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
    $email = $this->input->post('email', true);
    $password = $this->input->post('password', true);

    $user = $this->db->get_where('users', ['email' => $email])->row_array();
    if ($user && $user['deletedAt'] == null) {
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
          $this->db->update('user_logs');
        } else {
          $this->db->insert('user_logs', $datalog);
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
    // check if user already login cannot visit Register page.
    if ($this->session->userdata('email')) {
      redirect('dashboard');
    }

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
    // check if user already login cannot visit Login page.
    if ($this->session->userdata('email')) {
      redirect('dashboard');
    }

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    if ($this->form_validation->run() == false) {
      $this->index();
    } else {
      $email = $this->input->post('email');
      $user = $this->db->get_where('users', ['email' => $email])->row_array();
      if ($user) {
        // token for reset link
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'createdAt' => time()
        ];
        $this->db->insert('user_token', $user_token);
        $this->_sendEmail($token);
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible fade show" role="alert">
            We have sent you a link to reset your password.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );
        redirect('auth');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            User not found!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>'
        );
        redirect('auth');
      }
    }
  }

  private function _sendEmail($token)
  {
    $this->email->from('admin@inventory.app', 'Admin Inventory App'); // from email and from name.
    $this->email->to($this->input->post('email'));
    $this->email->subject('User Activation');
    $this->email->message('Click to reset your account password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">
        Activate</a>');

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function resetPassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('users', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
      if ($user_token) {
        $this->session->set_userdata('reset_email', $email); // set input email user in session
        $this->changePassword();
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! wrong token.</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! wrong email.</div>');
      redirect('auth');
    }
  }

  public function changePassword()
  {
    // check user email that want to reset password
    if (!$this->session->userdata('reset_email')) {
      redirect('auth');
    }

    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|min_length[3]|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Change Password';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/change-password');
      $this->load->view('templates/auth_footer');
    } else {
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('users');

      $this->session->unset_userdata('reset_email');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed.</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $data = ['email', 'role_id'];
    $this->session->unset_userdata($data);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout.</div>');
    redirect('auth');
  }
}
