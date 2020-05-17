<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper mt-1">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="page-breadcrumb mt-1">
    <div class="row">
      <div class="col-5 align-self-center">
        <h4 class="page-title">Manage Categories</h4>
        <div class="d-flex align-items-center">
        </div>
      </div>
      <div class="col-7 align-self-center">
        <div class="d-flex no-block justify-content-end align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard') ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard') ?>">Manage Inventory</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">View All Categories</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <div class="mt-3">
      <button type="button" id="btnAddCategory" class="btn btn-primary" data-toggle="modal" data-target="#addNewCategoryModal">Add New Category</button>
    </div>
  </div>
  <!-- MODAL -->
  <div class="modal fade" id="addNewCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addNewCategoryModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="formModalLabel">Add New Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('products/categories') ?>" method="POST">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label for="supplier-code" class="control-label">Category Name</label>
              <input type="text" class="form-control" name="category" id="category">
              <small>Category name must be different</small>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select class="form-control custom-select" name="status" id="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.modal -->
  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="container-fluid mt-2">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- File export -->
    <?= $this->session->flashdata('message') ?>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Categories List</h4>
            <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered table-hover display">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th class="text-center">Status</th>
                    <th>Employee</th>
                    <th>Date Created</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($categories as $cat) : ?>
                    <tr>
                      <td><?= $cat['category'] ?></td>
                      <?php if ($cat['isActive'] != 1) : ?>
                        <td class="text-center"><span class="label label-inverse">Inactive</span></td>
                      <?php else : ?>
                        <td class="text-center"><span class="label label-success">Active</span></td>
                      <?php endif; ?>
                      <td><?= $cat['name'] ?></td>
                      <td><?= date('d F Y', $cat['createdAt']) ?></td>
                      <td class="text-center">
                        <div class="dropdown">
                          <a class="btn btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item text-dark edit-btn" href="javascript:void(0)" data-toggle="modal" data-target="#addNewCategoryModal" data-id="<?= $cat['id']; ?>">Edit</a>
                            <a class="dropdown-item text-danger del-btn" href="<?= base_url('products/delete/') . $cat['id']; ?>">Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
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