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
        <h4 class="page-title">Manage Suppliers</h4>
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
              <li class="breadcrumb-item active" aria-current="page">Manage Suppliers</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <div class="mt-3">
      <button id="addNewSupplier" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewSupplierModal">Add New Supplier</button>
    </div>
  </div>
  <!-- MODAL -->
  <div class="modal fade" id="addNewSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addNewSupplierModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="supplierModalLabel">Add New Supplier</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('suppliers') ?>" method="POST">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label for="supplier-code" class="control-label">Supplier Code</label>
              <input type="text" class="form-control" id="code" name="code" placeholder="eg: JD, CN" value="<?= set_value('code'); ?>">
              <small>Supplier code must be unique (can not same)</small>
              <?= form_error('code', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="name" class="control-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="John Doe or Company Name" value="<?= set_value('name'); ?>">
              <?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="email" class="control-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="johndoe@example.com" value="<?= set_value('email'); ?>">
              <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="phone" class="control-label">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="+1 234 567 890" value="<?= set_value('phone'); ?>">
              <?= form_error('phone', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="address" class="control-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="1365 Example Avenue" value="<?= set_value('address'); ?>">
              <?= form_error('address', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="city" class="control-label">City</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?= set_value('city'); ?>">
              <?= form_error('city', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="state" class="control-label">State</label>
              <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?= set_value('state'); ?>">
              <?= form_error('state', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="postcode" class="control-label">Postcode</label>
              <input type="text" class="form-control" id="postcode" name="postcode" placeholder="12345" value="<?= set_value('postcode'); ?>">
              <?= form_error('postcode', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Country</label>
              <select class="select2 form-control custom-select" name="country" id="country" style="width: 100%;">
                <option>--Select your Country--</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Singapore">Singapore</option>
                <option value="Thailand">Thailand</option>
                <option value="USA">USA</option>
              </select>
              <?= form_error('country', '<small class="text-danger pl-1">', '</small>'); ?>
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
            <h4 class="card-title">Suppliers List</h4>
            <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered table-hover display">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date Created</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $n = 1;
                  foreach ($suppliers as $sup) : ?>
                    <?php if ($sup['deletedAt'] == null) : ?>
                      <tr>
                        <td><?= $n++ ?></td>
                        <td><?= $sup['code'] ?></td>
                        <td><?= $sup['supplier_name'] ?></td>
                        <td><?= $sup['email'] ?></td>
                        <td><?= $sup['phone'] ?></td>
                        <td><?= $sup['address'] ?></td>
                        <td><?= date('d F Y', $sup['createdAt']) ?></td>
                        <td class="text-center">
                          <div class="dropdown">
                            <a class="btn btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              <a class="dropdown-item text-dark edit-btn" href="javascript:void(0)" data-toggle="modal" data-target="#addNewSupplierModal" data-id="<?= $sup['id']; ?>">Edit</a>
                              <a class="dropdown-item text-danger del-btn" href="<?= base_url('suppliers/delete/') . $sup['id']; ?>">Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date Created</th>
                    <th></th>
                  </tr>
                </tfoot>
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