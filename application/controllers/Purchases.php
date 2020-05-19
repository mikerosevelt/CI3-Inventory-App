<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchases extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Purchase');
  }

  public function index()
  {
    $data['title'] = 'Manage Purchases | Inventory App';
    $data['purchases'] = $this->Purchase->getAllPurchases();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/purchases/index', $data);
    $this->load->view('templates/main/footer');
  }


  public function delete()
  {
    $id = $this->uri->segment(3);
    $data['purchase'] = $this->db->get_where('purchases', ['id' => $id])->row_array();
    if ($id) {
      if ($data['purchase']) {
        $this->Purchase->softdelete($id);
        $this->session->set_flashdata('swal', 'Purchase successfully deleted');
        redirect('purchases');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Purchase not found.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('purchases');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Something went wrong.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>');
      redirect('purchases');
    }
  }
}
