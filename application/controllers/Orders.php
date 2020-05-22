<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->load->model('Product');
  }

  public function index()
  {
    # code...
  }

  public function detail()
  {
    $id = $this->uri->segment(3);
    $data['product'] = $this->Product->getProductDetailById($id);
    if ($id) {
      if ($data['product']) {
        $data['title'] = 'Order Detail | Inventory App';
        $data['categories'] = $this->db->get_where('categories', ['isActive' => 1])->result_array();
        $data['suppliers'] = $this->db->get_where('suppliers', ['deletedAt' => null])->result_array();

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/topbar');
        $this->load->view('templates/main/sidebar');
        $this->load->view('main/inventory/product-detail', $data);
        $this->load->view('templates/main/footer');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Order not found.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('orders');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Something went wrong.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>');
      redirect('orders');
    }
  }

  public function create()
  {
    $data['title'] = 'Add Order | Inventory App';
    $data['products'] = $this->db->get('products')->result_array();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/orders/create', $data);
    $this->load->view('templates/main/footer');
  }

  public function getDataProduct()
  {
    echo json_encode($this->db->get_where('products', ['id' => $this->input->post('id')])->row_array());
  }

  public function fetchProductOrder()
  {
    echo json_encode($this->db->get('items')->result_array());
  }

  public function addProductOrder()
  {
    $data = [
      'product_id' => $this->input->post('id'),
      'product_name' => $this->input->post('product_name'),
      'qty' => $this->input->post('qty'),
      'unit' => $this->input->post('unit'),
      'price' => $this->input->post('price'),
      'subtotal' => $this->input->post('subtotal')
    ];
    $this->db->insert('items', $data);
  }

  public function removeItem()
  {
    $this->db->where('id', $this->input->post('itemid'));
    $this->db->delete('items');
  }

  public function insert()
  {
    $this->db->query('DELETE FROM items');
    redirect('orders/create');
  }

  public function delete()
  {
    $id = $this->uri->segment(3);
    $data['product'] = $this->Product->getProductDetailById($id);
    if ($id) {
      if ($data['product']) {
        // DELETE FUNCTION
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Order not found.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('orders');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Something went wrong.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>');
      redirect('orders');
    }
  }
}
