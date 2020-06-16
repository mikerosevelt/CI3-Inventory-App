<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // Check User session
    if (!$this->session->userdata['email']) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please login!</div>');
      redirect('auth');
    }

    // Check user role
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata['email']])->row_array();
    if ($data['user']['role_id'] != 1) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">You are not authorized!</div>');
      redirect('dashboard');
    }

    // $this->load->model('Order');
  }

  public function index()
  {
    $data['title'] = 'Settings | Inventory App';
    // $data['orders'] = $this->Order->getAllOrders();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/orders/index', $data);
    $this->load->view('templates/main/footer');
  }

  /**
   * Backup database
   */
  public function backup()
  {
    $data['title'] = 'Backup Database | Inventory App';
    // $data['orders'] = $this->Order->getAllOrders();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/settings/backup', $data);
    $this->load->view('templates/main/footer');
  }

  // DB backup and download method
  public function backupdb()
  {
    // Load the DB utility class
    $this->load->dbutil();

    // Backup your entire database and assign it to a variable
    $backup = $this->dbutil->backup();
    write_file('/path/to/mybackup' . date('d-F-Y') . '.gz', $backup);

    // Load the download helper and send the file to your desktop
    $this->load->helper('download');
    force_download('mybackup' . date('d-F-Y') . '.gz', $backup);
  }
}
