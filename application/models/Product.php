<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Model
{
  public function getAllProducts()
  {
    return $this->db->get('products')->result_array();
  }

  public function getProductDetailById($id)
  {
    $this->db->select('users.id, users.name, suppliers.id, suppliers.code, suppliers.supplier_name,products.*');
    $this->db->from('products');
    $this->db->join('users', 'users.id = products.user_id');
    $this->db->join('suppliers', 'suppliers.id = products.supplier_id');
    $this->db->where('products.id', $id);
    return $this->db->get()->row_array();
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
        'product_code' => $this->input->post('code', true),
        'product' => $productName,
        'price' => $price,
        'qty' => $qty,
        'unit' => $unit,
        'total_price' => $totalPrice,
        'createdAt' => time()
      ];
      $this->db->insert('purchases', $purchase);
    } else {
      echo $this->upload->display_errors();
    }
  }

  public function updateDataProduct()
  {
    $id = $id = $this->input->post('id');
    $data['products'] = $this->db->get_where('products', ['id' => $id])->row_array();

    $config['upload_path']          = './assets/images/product/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = '2000';

    $this->upload->initialize($config);
    if ($this->upload->do_upload('image')) {
      if ($data['products']['image'] != 'default.png') {
        unlink(FCPATH . '/assets/images/product/' . $data['products']['image']);
      }
      $this->db->set('user_id', $this->input->post('employeeId', true));
      $this->db->set('supplier_id', $this->input->post('supplier', true));
      $this->db->set('product_code', $this->input->post('code', true));
      $this->db->set('product_name', $this->input->post('name', true));
      $this->db->set('image', $this->upload->data('file_name'));
      $this->db->set('price', $this->input->post('price', true));
      $this->db->set('description', $this->input->post('description', true));
      $this->db->set('qty_stock', $this->input->post('stock', true));
      $this->db->set('unit', $this->input->post('unit', true));
      $this->db->set('category_id', $this->input->post('category', true));
      $this->db->set('updatedAt', time());
      $this->db->where('id', $id);
      $this->db->update('products');
    } else {
      echo $this->upload->display_errors();
    }
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

  /**
   * Categories functions
   */
  public function getAllCategories()
  {
    $this->db->select('users.id, users.name, categories.*');
    $this->db->from('categories');
    $this->db->join('users', 'categories.user_id = users.id');
    return $this->db->get()->result_array();
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
