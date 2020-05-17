<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suppliers extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Supplier');
  }

  public function index()
  {
    $this->form_validation->set_rules('code', 'Code', 'required|trim|is_unique[suppliers.code]');
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim');
    $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
    $this->form_validation->set_rules('address', 'Address', 'required|trim');
    $this->form_validation->set_rules('city', 'City', 'required|trim');
    $this->form_validation->set_rules('state', 'State', 'required|trim');
    $this->form_validation->set_rules('postcode', 'Postcode', 'required|trim');
    $this->form_validation->set_rules('country', 'Country', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Manage Suppliers | Inventory App';
      $data['suppliers'] = $this->Supplier->getAllSuppliers();

      $this->load->view('templates/main/header', $data);
      $this->load->view('templates/main/topbar');
      $this->load->view('templates/main/sidebar');
      $this->load->view('main/suppliers/index', $data);
      $this->load->view('templates/main/footer');
    } else {
      $this->Supplier->addSupplier();
      $this->session->set_flashdata('swal', 'New supplier has been added');
      redirect('suppliers');
    }
  }

  public function update()
  {
    # code...
  }

  public function delete()
  {
    # code...
  }
}
