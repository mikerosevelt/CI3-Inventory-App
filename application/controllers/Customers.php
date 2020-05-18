<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Customer');
  }

  public function index()
  {
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim');
    $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
    $this->form_validation->set_rules('address', 'Address', 'required|trim');
    $this->form_validation->set_rules('city', 'City', 'required|trim');
    $this->form_validation->set_rules('state', 'State', 'required|trim');
    $this->form_validation->set_rules('postcode', 'Postcode', 'required|trim');
    $this->form_validation->set_rules('country', 'Country', 'required|trim');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Manage Customers | Inventory App';
      $data['customers'] = $this->Customer->getAllCustomer();

      $this->load->view('templates/main/header', $data);
      $this->load->view('templates/main/topbar');
      $this->load->view('templates/main/sidebar');
      $this->load->view('main/customers/index', $data);
      $this->load->view('templates/main/footer');
    } else {
      $this->Customer->addCustomer();
      $this->session->set_flashdata('swal', 'New customer has been added');
      redirect('customers');
    }
  }

  public function update()
  {
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
      $this->Customer->updateCustomer($id);
      $this->session->set_flashdata('swal', 'Customer has been edited');
      redirect('customers');
    }
  }

  public function getSingleCustomer()
  {
    echo json_encode($this->Customer->getCustomerById($this->input->post('id')));
  }

  public function delete()
  {
    $id = $this->uri->segment(3);
    $data['customers'] = $this->db->get_where('customers', ['id' => $id])->row_array();
    if ($id) {
      if ($data['customers']) {
        $this->Customer->deleteCustomer($id);
        $this->session->set_flashdata('swal', 'Customer successfully deleted');
        redirect('customers');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Supplier not found.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('customers');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Something went wrong.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>');
      redirect('customers');
    }
  }
}
