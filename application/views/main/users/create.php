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
        <h4 class="page-title">Add New User</h4>
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
          <form action="<?= base_url('users/insert') ?>" method="POST">
            <div class="form-body">
              <div class="card-body">
                <h4 class="card-title">Person Info</h4>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Name</label>
                      <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" value="<?= set_value('name'); ?>">
                      <?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group has-danger">
                      <label class="control-label">Email</label>
                      <input type="text" id="email" name="email" class="form-control form-control-danger" placeholder="johndoe@email.com" value="<?= set_value('email'); ?>">
                      <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group has-danger">
                      <label class="control-label">Password</label>
                      <input type="password" id="password" name="password" class="form-control form-control-danger" placeholder="Password">
                      <small class="form-control-feedback"> *Password min 8 characters </small>
                      <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
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
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="control-label">Date of Birth</label>
                      <input type="date" name="dob" class="form-control" value="<?= set_value('dob'); ?>">
                      <?= form_error('dob', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <!--/span-->
                </div>
                <!--/row-->
              </div>
              <div class="card-body">
                <h4 class="card-title">Address</h4>
                <hr>
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group">
                      <label>Street</label>
                      <input type="text" name="address" class="form-control" value="<?= set_value('address'); ?>">
                      <?= form_error('address', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
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
                      <select class="form-control custom-select" name="country">
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
              </div>
              <div class="form-actions">
                <div class="card-body">
                  <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                  <!-- <button type="button" class="btn btn-dark">Cancel</button> -->
                </div>
              </div>
            </div>
          </form>
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