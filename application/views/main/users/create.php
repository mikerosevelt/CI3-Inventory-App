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
          <form action="#" method="POST">
            <div class="card-body">
              <h4 class="card-title">Person Info</h4>
            </div>
            <hr>
            <div class="form-body">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Name</label>
                      <input type="text" id="name" name="name" class="form-control" placeholder="John Doe">
                      <small class="form-control-feedback"> This is inline help </small> </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group has-danger">
                      <label class="control-label">Email</label>
                      <input type="text" id="email" name="email" class="form-control form-control-danger" placeholder="johndoe@email.com">
                      <small class="form-control-feedback"> This field has error. </small> </div>
                  </div>
                  <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-danger">
                      <label class="control-label">Phone Number</label>
                      <input type="text" id="phone" name="phone" class="form-control form-control-danger" placeholder="+1 (234) 567 890">
                      <small class="form-control-feedback"> This field has error. </small> </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Date of Birth</label>
                      <input type="date" class="form-control">
                    </div>
                  </div>
                  <!--/span-->
                </div>
                <!--/row-->
                <h4 class="card-title m-t-40">Address</h4>
              </div>
              <hr>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group">
                      <label>Street</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>State/Province</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Post Code</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Country</label>
                      <select class="form-control custom-select">
                        <option>--Select your Country--</option>
                        <option>Indonesia</option>
                        <option>Singapore</option>
                        <option>USA</option>
                      </select>
                    </div>
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