<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Product');
  }

  public function index()
  {
    $data['title'] = 'Manage Products | Inventory App';
    // $data['userlist'] = $this->User->getAllUsers();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/inventory/allproducts', $data);
    $this->load->view('templates/main/footer');
  }

  /**
   * Detail of product
   */
  public function detail()
  {
    # code...
  }

  /**
   * Create/Add a new product
   */
  public function create()
  {
    # code...
  }

  /**
   * Insert new product to database
   */
  public function insert()
  {
    # code...
  }

  /**
   * Update a product data
   */
  public function update()
  {
    # code...
  }

  /**
   * Delete a product from database
   */
  public function delete()
  {
    # code...
  }

  /**
   * Show all categories and add a category
   */
  public function categories()
  {
    $this->form_validation->set_rules('category', 'Category', 'required|trim|is_unique[categories.category]');
    $this->form_validation->set_rules('status', 'Status', 'required|trim');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Manage Categories | Inventory App';
      $data['categories'] = $this->Product->getAllCategories();

      $this->load->view('templates/main/header', $data);
      $this->load->view('templates/main/topbar');
      $this->load->view('templates/main/sidebar');
      $this->load->view('main/inventory/categories', $data);
      $this->load->view('templates/main/footer');
    } else {
      $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
      $id = $data['user']['id'];
      $this->Product->addCategory($id);
      $this->session->set_flashdata('swal', 'New category has been added');
      redirect('products/categories');
    }
  }

  /**
   * Update a category data
   */
  public function editCategory()
  {
    $this->form_validation->set_rules('category', 'Category', 'required|trim|is_unique[categories.category]');
    $this->form_validation->set_rules('status', 'Status', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->categories();
    } else {
      $id = $this->input->post('id');
      $this->Product->updateCategory($id);
      $this->session->set_flashdata('swal', 'Category has been edited');
      redirect('products/categories');
    }
  }

  // Get single category data
  public function getSingleCategory()
  {
    echo json_encode($this->Product->getCategoryById($this->input->post('id')));
  }

  /**
   * Delete a category
   */
  public function deleteCategory()
  {
    $id = $this->uri->segment(3);
    $data['user'] = $this->db->get_where('users', ['id' => $id])->row_array();
    if ($id) {
      if ($data['user']) {
        $this->Product->deleteCategory($id);
        $this->session->set_flashdata('swal', 'Category successfully deleted');
        redirect('products/categories');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Category not found.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('products/categories');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Something went wrong.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>');
      redirect('products/categories');
    }
  }
}
