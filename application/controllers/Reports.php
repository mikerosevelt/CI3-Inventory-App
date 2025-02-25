<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Report');

    // Check User session
    if (!$this->session->userdata['email']) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please login!</div>');
      redirect('auth');
    }
  }

  /**
   * @desc Report overview
   */
  public function index()
  {
    $data['title'] = 'Reports Overview | Inventory App';
    // $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/reports/index', $data);
    $this->load->view('templates/main/footer');
  }

  /**
   * @desc Transactions report
   */
  public function transactions()
  {
    $data['title'] = 'Transactions Report | Inventory App';
    $data['income'] = $this->Report->getTotalIncome()[0]["income"];
    $data['expenditure'] = $this->Report->getTotalExpanditure()[0]["expenditure"];

    $data['transactions'] = $this->Report->getAllTransactions();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/reports/transactions-report', $data);
    $this->load->view('templates/main/footer');
  }

  /**
   * @desc Inventory report
   */
  public function inventory()
  {
    $data['title'] = 'Inventory Report | Inventory App';
    $data['product'] = $this->Report->getAllProducts();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/reports/inventory', $data);
    $this->load->view('templates/main/footer');
  }

  /**
   * @desc Product history report
   * @param /product_code
   */
  public function history()
  {
    $code = $this->uri->segment(3);
    $data['title'] = 'Product History Report | Inventory App';
    $data['product'] = $this->Report->getProductByCode($code);
    $data['totalOut'] = $this->Report->getTotalOutgoing($code)[0]['quantity'];
    $data['history']['outgoing'] = $this->Report->getOrderProductByCode($code);
    $data['history']['incoming'] = $this->Report->getAllPurchasesByCode($code);

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/reports/product-history', $data);
    $this->load->view('templates/main/footer');
  }

  // Generate report by date range
  // date start - date end
  public function generateReport()
  {
    $this->form_validation->set_rules('start', 'Start date', 'trim|required');
    $this->form_validation->set_rules('end', 'End date', 'trim|required');

    if ($this->form_validation->run() == false) {
      if ($this->input->post('type') == 'Activities') {
        echo $this->usersActivities();
      } else if ($this->input->post('type') == 'Transactions') {
        echo $this->transactions();
      }
    } else {
      $start = strtotime($this->input->post('start'));
      $end = strtotime($this->input->post('end'));
      $result = $this->Report->getReportByDateRange($start, $end);
      if ($result) {
        $this->load->library('table');
        echo 'Date: ' . $this->input->post('start') . ' - ' . $this->input->post('end');
        echo $this->table->generate($result);
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Record not found.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('reports');
      }
    }
  }

  public function test()
  {
    // var_dump($start);
    // var_dump($end);
    // die();
    // $array = $this->Report->getAllProducts();
    // print_r($this->Report->getTotalOutgoing('P01')[0]['quantity']);
    // foreach ($array as $a) {
    //   $val += $a['quantity'];
    // }
    // $data['totalOutgoing'] = $val;
    // print_r($array);
    // print_r(json_encode($this->Report->getAllProducts()));
    // echo "<br>";
    // echo "<br>";
    // var_dump($this->Report->getTotalExpanditure()[0]["expenditure"]);
    // var_dump();

  }

  public function usersActivities()
  {
    $data['title'] = 'Inventory Report | Inventory App';
    // $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $data['activities'] = $this->Report->getAllUsersActivities();

    $this->load->view('templates/main/header', $data);
    $this->load->view('templates/main/topbar');
    $this->load->view('templates/main/sidebar');
    $this->load->view('main/reports/users-activities', $data);
    $this->load->view('templates/main/footer');
  }
}
