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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewCustomerModal">Add New Customer</button>
    </div>
  </div>
  <!-- MODAL -->
  <div class="modal fade" id="addNewCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addNewCustomerModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel1">Add New Customer</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <div class="form-group">
              <label for="name" class="control-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="John Doe or Company Name">
            </div>
            <div class="form-group">
              <label for="email" class="control-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="johndoe@example.com">
            </div>
            <div class="form-group">
              <label for="phone" class="control-label">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="+1 234 567 890">
            </div>
            <div class="form-group">
              <label for="address" class="control-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="1365 Example Avenue">
            </div>
            <div class="form-group">
              <label for="city" class="control-label">City</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="City">
            </div>
            <div class="form-group">
              <label for="state" class="control-label">State</label>
              <input type="text" class="form-control" id="state" name="state" placeholder="State">
            </div>
            <div class="form-group">
              <label for="postcode" class="control-label">Postcode</label>
              <input type="text" class="form-control" id="postcode" name="postcode" placeholder="12345">
            </div>
            <div class="form-group">
              <label>Country</label>
              <select class="form-control custom-select" name="country">
                <option>--Select your Country--</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Singapore">Singapore</option>
                <option value="USA">USA</option>
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