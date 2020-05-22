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
        <h4 class="page-title">Manage Customers</h4>
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
              <li class="breadcrumb-item active" aria-current="page">Manage Customers</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <div class="mt-3">
      <button id="btnAddCustomer" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewCustomerModal">Add New Customer</button>
    </div>
  </div>
  <!-- MODAL -->
  <div class="modal fade" id="addNewCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addNewCustomerModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="addCustomerModalLabel">Add New Customer</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('customers') ?>" method="POST">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label for="name" class="control-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="John Doe or Company Name">
              <?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="email" class="control-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="johndoe@example.com">
              <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="phone" class="control-label">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="+1 234 567 890">
              <?= form_error('phone', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="address" class="control-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="1365 Example Avenue">
              <?= form_error('address', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="city" class="control-label">City</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="City">
              <?= form_error('city', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="state" class="control-label">State</label>
              <input type="text" class="form-control" id="state" name="state" placeholder="State">
              <?= form_error('state', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="postcode" class="control-label">Postcode</label>
              <input type="text" class="form-control" id="postcode" name="postcode" placeholder="12345">
              <?= form_error('postcode', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label>Country</label>
              <select class="form-control custom-select select2" name="country" id="country" style="width: 100%">
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
            <h4 class="card-title">Customers List</h4>
            <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered table-hover display">
                <thead>
                  <tr>
                    <th>#</th>
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
                  foreach ($customers as $cus) : ?>
                    <?php if ($cus['deletedAt'] == null) : ?>
                      <tr>
                        <td><?= $n++ ?></td>
                        <td><?= $cus['name'] ?></td>
                        <td><?= $cus['email'] ?></td>
                        <td><?= $cus['phone'] ?></td>
                        <td><?= $cus['address'] ?></td>
                        <td><?= date('d F Y', $cus['createdAt']) ?></td>
                        <td class="text-center">
                          <div class="dropdown">
                            <a class="btn btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              <a class="dropdown-item text-dark edit-btn" href="javascript:void(0)" data-toggle="modal" data-target="#addNewCustomerModal" data-id="<?= $cus['id']; ?>">Edit</a>
                              <a class="dropdown-item text-danger del-btn" href="<?= base_url('suppliers/delete/') . $cus['id']; ?>">Delete</a>
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