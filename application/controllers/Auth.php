<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function index()
  {
    $data['title'] = 'Login Page | Inventory App';
    $this->load->view('templates/auth/header', $data);
    $this->load->view('auth/login');
    $this->load->view('templates/auth/footer');
  }

  public function register()
  {
    $data['title'] = 'Register Page | Inventory App';
    $this->load->view('templates/auth/header', $data);
    $this->load->view('auth/register');
    $this->load->view('templates/auth/footer');
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
