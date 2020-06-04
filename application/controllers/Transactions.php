<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transactions extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Invoice');
    $this->load->model('Order');
  }

  public function index()
  {
    $data['title'] = 'Manage Transactions | Inventory App';
    $data['transactions'] = $this->db->get_where('invoices', ['status' => 'Paid'])->result_array();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/transactions/index', $data);
    $this->load->view('templates/main/footer');
  }

  public function getTransactionData()
  {
    echo json_encode($this->Invoice->getInvoiceDetailById($this->input->post('id')));
  }

  public function getTransactionItems()
  {
    $items = $this->Order->getOderDetailById($this->input->post('id'));
    $output = '';
    $no = 1;
    foreach ($items as $i) {
      $output .= '
				<tr>
					<td>' . $no++ . '</td>
					<td>' . $i['product_name'] . '</td>
					<td>' . $i['quantity'] . '</td>
					<td>' . $i['unit'] . '</td>
					<td>' . number_format($i['subtotal']) . '</td>
				</tr>
			';
    }
    echo $output;
  }
}
