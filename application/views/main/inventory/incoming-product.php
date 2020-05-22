<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-5 align-self-center">
        <h4 class="page-title">Add New Product</h4>
        <div class="d-flex align-items-center">

        </div>
      </div>
      <div class="col-7 align-self-center">
        <div class="d-flex no-block justify-content-end align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard'); ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                <a href="<?= base_url('products'); ?>">Manage Product</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <?= form_open_multipart('products/insert'); ?>
          <!-- <form action="<?= base_url('products/insert') ?>" method="POST"> -->
          <div class="form-body">
            <div class="card-body">
              <h4 class="card-title">Product Info</h4>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-danger">
                    <label class="control-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control form-control-danger" placeholder="Example Product" value="<?= set_value('name'); ?>">
                    <?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Code</label>
                    <input type="text" id="code" name="code" class="form-control" placeholder="CD01" value="<?= set_value('code'); ?>">
                    <?= form_error('code', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <!--/row-->
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control custom-select select2" style="width: 100%" name="category" id="category">
                      <option>--Select Product Category--</option>
                      <?php foreach ($categories as $cat) : ?>
                        <option value="<?= $cat['id'] ?>"><?= $cat['category'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('category', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Supplier</label>
                    <select class="form-control custom-select select2" style="width: 100%" name="supplier" id="supplier">
                      <option>--Select Product Supplier--</option>
                      <?php foreach ($suppliers as $sup) : ?>
                        <option value="<?= $sup['id'] ?>"><?= $sup['supplier_name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('supplier', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                </div>
                <!--/span-->
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="hidden" name="employeeId" id="employeeId" value="<?= $employee['id']; ?>">
                    <label class="control-label">Employee Name</label>
                    <input type="text" name="employee" class="form-control" value="<?= $employee['name']; ?>" readonly>
                    <?= form_error('employee', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                </div>
                <!--/span-->
              </div>
              <!--/row-->
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Upload product image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image" id="imageLabel">Choose file</label>
                      </div>
                    </div>
                    <?= form_error('image', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Price per unit</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?= set_value('price'); ?>" placeholder="10000">
                    <?= form_error('price', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?= set_value('quantity'); ?>" min="1" placeholder="Min 1">
                    <?= form_error('quantity', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Unit</label>
                    <input type="text" class="form-control" id="unit" name="unit" value="<?= set_value('unit'); ?>" placeholder="eg. Pcs, Box, Pack">
                    <?= form_error('unit', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                </div>
                <!--/span-->
              </div>
              <div class="row">
                <div class="col-md-12 ">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="3"><?= set_value('description'); ?></textarea>
                    <?= form_error('description', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-actions">
              <div class="card-body">
                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Add</button>
                <!-- <button type="button" class="btn btn-dark">Cancel</button> -->
              </div>
            </div>
          </div>
          <!-- </form> -->
          <?= form_close(); ?>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Container fluid  -->
  <!-- ============================================================== -->