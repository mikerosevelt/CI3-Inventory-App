<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Model
{
  // Get all products
  public function getAllProducts()
  {
    return $this->db->get('products')->result_array();
  }

  // Get single product with detail by id
  public function getProductDetailById($id)
  {
    $this->db->select('users.id, users.name, suppliers.id, suppliers.code, suppliers.supplier_name,products.*');
    $this->db->from('products');
    $this->db->join('users', 'users.id = products.user_id');
    $this->db->join('suppliers', 'suppliers.id = products.supplier_id');
    $this->db->where('products.id', $id);
    return $this->db->get()->row_array();
  }

  /**
   * Add new product
   * Add new purchases
   */
  public function addProduct()
  {
    $employeeId = $this->input->post('employeeId', true);
    $supplier = $this->input->post('supplier', true);
    $productName = $this->input->post('name', true);
    $price = (int) $this->input->post('price', true);
    $qty = $this->input->post('quantity', true);
    $unit = $this->input->post('unit', true);
    $totalPrice = $price * $qty;
    $code = $this->input->post('code', true);
    $currentProduct = $this->db->get_where('products', ['product_code' => $code])->row_array();
    // If the product code same, just update quantity and incoming.
    // And add new purchases
    if ($code == $currentProduct['product_code']) {
      $newStock = $currentProduct['qty_stock'] + $qty;
      $newIncoming = $currentProduct['incoming'] + $qty;
      $this->db->set('qty_stock', $newStock);
      $this->db->set('incoming', $newIncoming);
      $this->db->where('product_code', $code);
      $this->db->update('products');

      $purchase = [
        'user_id' => $employeeId,
        'supplier_id' => $supplier,
        'product_code' => $code,
        'product' => $currentProduct['product_name'],
        'price' => $currentProduct['price'],
        'qty' => $qty,
        'unit' => $unit,
        'total_price' => $totalPrice,
        'createdAt' => time()
      ];
      $this->db->insert('purchases', $purchase);

      $users = [
        'user_id' => $employeeId,
        'activity' => 'Add product stock',
        'createdAt' => time()
      ];
      $this->db->insert('users_activities', $users);
    }

    $config['upload_path']          = './assets/images/product/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = '2000';

    $this->upload->initialize($config);
    if ($this->upload->do_upload('image')) {
      $product = [
        'user_id' => $employeeId,
        'supplier_id' => $supplier,
        'product_code' => $code,
        'product_name' => $productName,
        'image' => $this->upload->data('file_name'),
        'price' => $price,
        'description' => $this->input->post('description', true),
        'qty_stock' => $qty,
        'incoming' => $qty,
        'unit' => $unit,
        'category_id' => $this->input->post('category', true),
        'createdAt' => time()
      ];

      $this->db->insert('products', $product);

      $purchase = [
        'user_id' => $employeeId,
        'supplier_id' => $supplier,
        'product_code' => $code,
        'product' => $productName,
        'price' => $price,
        'qty' => $qty,
        'unit' => $unit,
        'total_price' => $totalPrice,
        'createdAt' => time()
      ];
      $this->db->insert('purchases', $purchase);

      $users = [
        'user_id' => $employeeId,
        'activity' => 'Add new product',
        'createdAt' => time()
      ];
      $this->db->insert('users_activities', $users);
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

      $users = [
        'user_id' => $this->input->post('employeeId', true),
        'activity' => 'Update product data',
        'createdAt' => time()
      ];
      $this->db->insert('users_activities', $users);
    } else {
      echo $this->upload->display_errors();
    }
  }

  // Soft delete product
  public function softDeleteProduct($id)
  {
    $this->db->set('deletedAt', time());
    $this->db->where('id', $id);
    $this->db->update('products');

    // Insert user activity
    $userData = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $users = [
      'user_id' => $userData['id'],
      'activity' => 'Soft delete product',
      'createdAt' => time()
    ];
    $this->db->insert('users_activities', $users);
  }

  // Delete product permanently
  public function deleteProduct($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('products');
    // Insert user activity
    $userData = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $users = [
      'user_id' => $userData['id'],
      'activity' => 'Delete product permanently',
      'createdAt' => time()
    ];
    $this->db->insert('users_activities', $users);
  }

  // Categories functions
  public function getAllCategories()
  {
    $this->db->select('users.id, users.name, categories.*');
    $this->db->from('categories');
    $this->db->join('users', 'categories.user_id = users.id');
    return $this->db->get()->result_array();
  }

  // Add category
  public function addCategory($id)
  {
    $data = [
      'user_id' => $id,
      'category' => $this->input->post('category', true),
      'isActive' => $this->input->post('status'),
      'createdAt' => time()
    ];

    $this->db->insert('categories', $data);

    $users = [
      'user_id' => $id,
      'activity' => 'Add new category',
      'createdAt' => time()
    ];
    $this->db->insert('users_activities', $users);
  }

  public function getCategoryById($id)
  {
    return $this->db->get_where('categories', ['id' => $id])->row_array();
  }

  // Update category
  public function updateCategory($id)
  {
    $this->db->set('category', $this->input->post('category'));
    $this->db->set('isActive', $this->input->post('status'));
    $this->db->set('updatedAt', time());
    $this->db->where('id', $id);
    $this->db->update('categories');

    // Insert user activity
    $userData = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $users = [
      'user_id' => $userData['id'],
      'activity' => 'Update category',
      'createdAt' => time()
    ];
    $this->db->insert('users_activities', $users);
  }

  // Soft delete category
  public function deleteCategory($id)
  {
    $this->db->set('deletedAt', time());
    $this->db->where('id', $id);
    $this->db->update('categories');

    // Insert user activity
    $userData = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    $users = [
      'user_id' => $userData['id'],
      'activity' => 'Soft delete category',
      'createdAt' => time()
    ];
    $this->db->insert('users_activities', $users);
  }
}
