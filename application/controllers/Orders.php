<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Order');
  }

  public function index()
  {
    $data['title'] = 'Manage Order | Inventory App';
    $data['orders'] = $this->Order->getAllOrders();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/orders/index', $data);
    $this->load->view('templates/main/footer');
  }

  /**
   * Order detail page
   */
  public function detail()
  {
    $id = $this->uri->segment(3);
    $data['product'] = $this->Product->getProductDetailById($id);
    if ($id) {
      if ($data['product']) {
        $data['title'] = 'Order Detail | Inventory App';

        $this->load->view('templates/main/header', $data);
        $this->load->view('templates/main/topbar');
        $this->load->view('templates/main/sidebar');
        $this->load->view('main/orders/detail', $data);
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

  /**
   * Create new order view
   */
  public function create()
  {
    $data['title'] = 'Add Order | Inventory App';
    $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data['products'] = $this->db->get('products')->result_array();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/orders/create', $data);
    $this->load->view('templates/main/footer');
  }

  // Get selected product data (Id, Price, Unit, etc)
  public function getDataProduct()
  {
    echo json_encode($this->db->get_where('products', ['id' => $this->input->post('id')])->row_array());
  }

  public function fetchProductOrder()
  {
    // echo json_encode($this->db->get('items')->result_array());
    echo json_encode($this->cart->contents());
  }

  // Add item/product on create new order page
  public function addItem()
  {
    $data = [
      'id' => $this->input->post('id'),
      'name' => $this->input->post('product_name'),
      'qty' => $this->input->post('qty'),
      'unit' => $this->input->post('unit'),
      'price' => $this->input->post('price')
    ];
    // $this->db->insert('items', $data);
    $this->cart->insert($data);
    echo $this->showItemList();
  }

  // Show Item list on create new order page
  public function showItemList()
  {
    $output = '';
    $no = 0;
    foreach ($this->cart->contents() as $items) {
      $no++;
      $output .= '
				<tr>
					<td>' . $items['name'] . '</td>
					<td>' . $items['qty'] . '</td>
					<td>' . $items['unit'] . '</td>
					<td>' . number_format($items['price']) . '</td>
					<td>' . number_format($items['subtotal']) . '</td>
					<td class="text-center"><button type="button" id="' . $items['rowid'] . '" class="romove_cart btn btn-danger btn-sm">Remove</button></td>
				</tr>
			';
    }
    return $output;
  }

  // Get total amount on create new order page
  public function getTotal()
  {
    echo json_encode($this->cart->total());
  }

  // Load items list
  function load_items()
  {
    echo $this->showItemList();
  }

  // Delete an item on create new order page
  function delete_item()
  {
    $data = array(
      'rowid' => $this->input->post('row_id'),
      'qty' => 0,
    );
    $this->cart->update($data);
    echo $this->showItemList();
  }

  /**
   * Insert order data to database
   */
  public function insert()
  {
    $this->Order->addNewOrder();
    $this->cart->destroy();
    $this->session->set_flashdata('swal', 'New order has been added');
    redirect('orders');
  }

  /**
   * Delete order data from database 
   * (Include delete order detail and invoice)
   */
  public function delete()
  {
    $id = $this->uri->segment(3);
    $data['order'] = $this->Order->getOderDetailById($id);
    if ($id) {
      if ($data['order']) {
        $this->Order->deleteOrder($id);
        $this->session->set_flashdata('swal', 'Order has been deleted');
        redirect('orders');
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
