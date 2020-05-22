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
        <h4 class="page-title">Add New Order</h4>
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
                <a href="<?= base_url('users'); ?>">Manage Users</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Add New User</li>
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
          <form action="<?= base_url('orders/insert') ?>" method="POST">
            <input type="hidden" name="employeeId" id="employeeId" value="<?= $user['id'] ?>">
            <div class="form-body">
              <div class="card-body">
                <h4 class="card-title">Customer Info</h4>
                <hr>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="control-label">Name</label>
                      <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" value="<?= set_value('name'); ?>">
                      <?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-4">
                    <div class="form-group has-danger">
                      <label class="control-label">Email</label>
                      <input type="text" id="email" name="email" class="form-control form-control-danger" placeholder="johndoe@email.com" value="<?= set_value('email'); ?>">
                      <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group has-danger">
                      <label class="control-label">Phone Number</label>
                      <input type="text" id="phone" name="phone" class="form-control form-control-danger" placeholder="+1 (234) 567 890" value="<?= set_value('phone'); ?>">
                      <?= form_error('phone', '<small class="text-danger pl-1">', '</small>'); ?>
                      <!-- <small class="form-control-feedback"> This field has error. </small> </div> -->
                    </div>
                  </div>
                  <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group">
                      <label>Street</label>
                      <input type="text" name="address" class="form-control" value="<?= set_value('address'); ?>">
                      <?= form_error('address', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <!--/span-->
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control" name="city" value="<?= set_value('city'); ?>">
                      <?= form_error('city', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>State/Province</label>
                      <input type="text" class="form-control" name="state" value="<?= set_value('state'); ?>">
                      <?= form_error('state', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Post Code</label>
                      <input type="text" class="form-control" name="postcode" value="<?= set_value('postcode'); ?>">
                      <?= form_error('postcode', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Country</label>
                      <select class="form-control custom-select select2" name="country" style="width: 100%">
                        <option>--Select your Country--</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Singapore">Singapore</option>
                        <option value="USA">USA</option>
                      </select>
                    </div>
                    <?= form_error('country', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                  <!--/span-->
                </div>
                <!--/row-->
              </div>
            </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Product</h4>
            <div class="row mt-3">
              <div class="col-sm-4">
                <div class="form-group">
                  <select class="form-control select2" id="product" name="product" style="width: 100%">
                    <option>Choose Product</option>
                    <?php foreach ($products as $p) : ?>
                      <option value="<?= $p['id'] ?>" data-pid="<?= $p['id'] ?>"><?= $p['product_name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-1">
                <div class="form-group">
                  <input type="number" min="1" class="form-control" id="qty" name="qty" placeholder="Qty">
                </div>
              </div>
              <div class="col-sm-1">
                <div class="form-group">
                  <input type="text" class="form-control" id="unit" name="unit" placeholder="Unit" disabled>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <input type="text" class="form-control" id="price" name="price" placeholder="Price" disabled>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="Subtotal" disabled>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <button class="btn btn-success btn-add-product" type="button"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            </div>
            <table class="table table-bordered">
              <thead>
                <th>Product Name</th>
                <th>Qty</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th></th>
              </thead>
              <tbody id="show_data">
              </tbody>
            </table>
          </div>
          <!-- <div class="col-lg mb-4">
            <div class="row float-right">
              <div class="col-lg">
                <span class="h5 mr-5">Subtotal</span>
                <span class="">0000000</span>
              </div>
            </div>
          </div> -->
          <div class="col-lg mb-4">
            <div class="row float-right">
              <div class="col-lg">
                <span class="h5 mr-5">Total Amount</span>
                <span class="mr-3 h6" id="totalAmount">0000000</span>
              </div>
            </div>
          </div>
          <hr>
          <div class="form-actions text-center">
            <div class="card-body">
              <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
              <!-- <button type="button" class="btn btn-dark">Cancel</button> -->
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
    <!--MODAL HAPUS-->
    <!-- <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Remove item</h4>
          </div>
          <form class="form-horizontal">
            <div class="modal-body">

              <input type="hidden" name="itemId" id="itemId" value="">
              <div class="alert alert-warning">
                <p>Are you sure to remove this item?</p>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button class="remove-btn btn btn-danger" id="remove-btn">Remove</button>
            </div>
          </form>
        </div>
      </div>
    </div> -->
    <!--END MODAL HAPUS-->
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