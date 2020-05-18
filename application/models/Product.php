<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Model
{
  public function getAllProducts()
  {
    return $this->db->get('products')->result_array();
  }

  public function addProduct()
  {
    $employeeId = $this->input->post('employeeId', true);
    $supplier = $this->input->post('supplier', true);
    $productName = $this->input->post('name', true);
    $price = (int) $this->input->post('price', true);
    $qty = $this->input->post('quantity', true);
    $unit = $this->input->post('unit', true);
    $totalPrice = $price * $qty;

    $config['upload_path']          = './assets/images/product/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = '2000';

    $this->upload->initialize($config);
    if ($this->upload->do_upload('image')) {
      $product = [
        'user_id' => $employeeId,
        'supplier_id' => $supplier,
        'product_code' => $this->input->post('code', true),
        'product_name' => $productName,
        'image' => $this->upload->data('file_name'),
        'price' => $price,
        'description' => $this->input->post('description', true),
        'qty_stock' => $qty,
        'unit' => $unit,
        'category_id' => $this->input->post('category', true),
        'createdAt' => time()
      ];

      $this->db->insert('products', $product);

      $purchase = [
        'user_id' => $employeeId,
        'supplier_id' => $supplier,
        'product' => $productName,
        'qty' => $qty,
        'unit' => $unit,
        'total_price' => $totalPrice,
        'createdAt' => time()
      ];
      $this->db->insert('purchases', $purchase);

      $invoice = [
        'purchase_id' => $this->db->insert_id(),
        'total_amount' => '',
        'status' => 'Unpaid',
        'type' => 'Purchase',
        'createdAt' => time()
      ];
      $this->db->insert('invoices', $invoice);
    } else {
      echo $this->upload->display_errors();
    }
  }

  public function addCategory($id)
  {
    $data = [
      'user_id' => $id,
      'category' => $this->input->post('category', true),
      'isActive' => $this->input->post('status'),
      'createdAt' => time()
    ];

    $this->db->insert('categories', $data);
  }

  public function softDeleteProduct($id)
  {
    $this->db->set('deletedAt', time());
    $this->db->where('id', $id);
    $this->db->update('products');
  }

  public function deleteProduct($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('products');
  }

  public function getAllCategories()
  {
    $this->db->select('users.id, users.name, categories.*');
    $this->db->from('categories');
    $this->db->join('users', 'categories.user_id = users.id');
    return $this->db->get()->result_array();
  }

  public function getCategoryById($id)
  {
    return $this->db->get_where('categories', ['id' => $id])->row_array();
  }

  public function updateCategory($id)
  {
    $this->db->set('category', $this->input->post('category'));
    $this->db->set('isActive', $this->input->post('status'));
    $this->db->set('updatedAt', time());
    $this->db->where('id', $id);
    $this->db->update('categories');
  }

  // Soft delete category
  public function deleteCategory($id)
  {
    $this->db->set('deletedAt', time());
    $this->db->where('id', $id);
    $this->db->update('categories');
  }
}
