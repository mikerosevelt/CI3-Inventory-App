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
    $data['products'] = $this->Product->getAllProducts();

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
    $id = $this->uri->segment(3);
    $data['product'] = $this->Product->getProductDetailById($id);
    if ($id) {
      if ($data['product']) {
        $data['title'] = 'Product Detail | Inventory App';
        $data['categories'] = $this->db->get_where('categories', ['isActive' => 1])->result_array();
        $data['suppliers'] = $this->db->get_where('suppliers', ['deletedAt' => null])->result_array();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/topbar');
        $this->load->view('templates/main/sidebar');
        $this->load->view('main/inventory/product-detail', $data);
        $this->load->view('templates/main/footer');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Product not found.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('products');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Something went wrong.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>');
      redirect('products');
    }
  }

  /**
   * Create/Add a new product
   */
  public function create()
  {
    $data['title'] = 'Add New Product | Inventory App';
    $data['suppliers'] = $this->db->get_where('suppliers', ['deletedAt' => null])->result_array();
    $data['categories'] = $this->db->get_where('categories', ['isActive' => 1])->result_array();
    $data['employee'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/inventory/incoming-product', $data);
    $this->load->view('templates/main/footer');
  }

  /**
   * Insert new product to database
   */
  public function insert()
  {
    $this->form_validation->set_rules('code', 'Product Code', 'required|trim|is_unique[products.product_code]');
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('category', 'Category', 'required|trim');
    $this->form_validation->set_rules('supplier', 'Supplier', 'required|trim');
    $this->form_validation->set_rules('employee', 'Employee', 'required|trim');
    $this->form_validation->set_rules('price', 'Price', 'required|trim');
    $this->form_validation->set_rules('quantity', 'Quantity', 'required|trim');
    $this->form_validation->set_rules('unit', 'Unit', 'required|trim');
    $this->form_validation->set_rules('description', 'Description', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->create();
    } else {
      $this->Product->addProduct();
      $this->session->set_flashdata('swal', 'New product has been added');
      redirect('products');
    }
  }

  /**
   * Update a product data
   */
  public function update()
  {
    // $this->form_validation->set_rules('code', 'Product Code', 'required|trim|is_unique[products.product_code]');
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('category', 'Category', 'required|trim');
    $this->form_validation->set_rules('supplier', 'Supplier', 'required|trim');
    $this->form_validation->set_rules('employee', 'Employee', 'required|trim');
    $this->form_validation->set_rules('price', 'Price', 'required|trim');
    $this->form_validation->set_rules('stock', 'Stock', 'required|trim');
    $this->form_validation->set_rules('unit', 'Unit', 'required|trim');
    $this->form_validation->set_rules('description', 'Description', 'required|trim');

    if ($this->form_validation->run() == false) {
      redirect('products/detail/' . $this->input->post('id'));
    } else {
      $this->Product->updateDataProduct();
      $this->session->set_flashdata('swal', 'Product has been updated');
      redirect('products');
    }
  }

  /**
   * Delete a product from database
   */
  public function delete()
  {
    $id = $this->uri->segment(3);
    $data['product'] = $this->db->get_where('products', ['id' => $id])->row_array();
    if ($id) {
      if ($data['product']) {
        $this->Product->deleteProduct($id);
        $this->session->set_flashdata('swal', 'Product successfully deleted');
        redirect('products');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Product not found.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('products');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Something went wrong.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>');
      redirect('products');
    }
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
    $data['category'] = $this->db->get_where('categories', ['id' => $id])->row_array();
    if ($id) {
      if ($data['category']) {
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
