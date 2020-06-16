<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suppliers extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    // Check User session
    if (!$this->session->userdata['email']) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please login!</div>');
      redirect('auth');
    }

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
      $this->index();
    } else {
      $id = $this->input->post('id');
      $this->Supplier->updateSupplier($id);
      $this->session->set_flashdata('swal', 'Supplier has been edited');
      redirect('suppliers');
    }
  }

  public function getSingleSupplier()
  {
    echo json_encode($this->Supplier->getSupplierById($this->input->post('id')));
  }

  public function delete()
  {
    $id = $this->uri->segment(3);
    $data['supplier'] = $this->db->get_where('suppliers', ['id' => $id])->row_array();
    if ($id) {
      if ($data['supplier']) {
        $this->Supplier->deleteSupplier($id);
        $this->session->set_flashdata('swal', 'Supplier successfully deleted');
        redirect('suppliers');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Supplier not found.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('suppliers');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Something went wrong.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>');
      redirect('suppliers');
    }
  }
}
