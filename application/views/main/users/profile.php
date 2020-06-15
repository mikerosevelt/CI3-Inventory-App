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
        <h4 class="page-title">My Profile</h4>
        <div class="d-flex align-items-center">

        </div>
      </div>
      <div class="col-7 align-self-center">
        <div class="d-flex no-block justify-content-end align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url('dashboard') ?>">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">My Profile</li>
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
    <?= $this->session->flashdata('message') ?>
    <div class="row">
      <!-- Column -->
      <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
          <div class="card-body">
            <center class="m-t-30"> <img src="<?= base_url('assets/') ?>images/users/5.jpg" class="rounded-circle" width="150" />
              <h4 class="card-title m-t-10"><?= $user['name']; ?></h4>
              <h6 class="card-subtitle"><?= $user['role']; ?> Inventory App</h6>
              <div class="row text-center justify-content-md-center">
                <div class="col-6">
                  <p>Last Login</p>
                  <?php if ($log) : ?>
                    <p><?= time_ago($log['last_login']); ?></p>
                  <?php else : ?>
                    <p>Haven't sign in yet</p>
                  <?php endif; ?>
                </div>
                <div class="col-6">
                  <p>Ip Address</p>
                  <?php if ($log) : ?>
                    <p><?= $log['ip_address']; ?></p>
                  <?php else : ?>
                    <p>Haven't sign in yet</p>
                  <?php endif; ?>
                </div>
              </div>
            </center>
          </div>
          <div>
            <hr>
          </div>
          <div class="card-body">
            <small class="text-muted">Email address </small>
            <h6><?= $user['email']; ?></h6> <small class="text-muted p-t-30 db">Phone</small>
            <h6><?= $user['phone']; ?></h6> <small class="text-muted p-t-30 db">Address</small>
            <h6><?= $user['address']; ?> <?= $user['city']; ?>, <?= $user['state']; ?> <?= $user['postcode']; ?></h6>
            <!-- <div class="map-box">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>  -->
            <small class="text-muted p-t-30 db">Social Profile</small>
            <br />
            <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
            <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
            <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
          </div>
        </div>
      </div>
      <!-- Column -->
      <!-- Column -->
      <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
          <!-- Tabs -->
          <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Timeline</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
            </li>
          </ul>
          <!-- Tabs -->
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
              <div class="card-body">
                <div class="profiletimeline m-t-0">
                  <?php foreach ($activities as $a) : ?>
                    <div class="sl-item">
                      <div class="sl-left">
                        <img src="<?= base_url('assets/') ?>images/users/1.jpg" alt="user" class="rounded-circle" />
                      </div>
                      <div class="sl-right">
                        <div>
                          <a href="javascript:void(0)" class="link"></a> <span class="sl-date"><?= time_ago($a['createdAt']); ?></span>
                          <p><?= $a['activity']; ?></p>
                        </div>
                      </div>
                    </div>
                    <hr>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="card-body">
                <form class="form-horizontal form-material" action="<?= base_url('users/updateProfile') ?>" method="POST">
                  <input type="hidden" name="id" value="<?= $user['id']; ?>">
                  <div class="form-group">
                    <label class="col-md-12">Full Name</label>
                    <div class="col-md-12">
                      <input type="text" name="name" value="<?= $user['name']; ?>" class="form-control form-control-line">
                      <?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="example-email" class="col-md-12">Email</label>
                    <div class="col-md-12">
                      <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control form-control-line" name="example-email" id="example-email">
                      <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Phone No</label>
                    <div class="col-md-12">
                      <input type="text" name="phone" value="<?= $user['phone']; ?>" class="form-control form-control-line">
                      <?= form_error('phone', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Address</label>
                    <div class="col-md-12">
                      <input type="text" name="address" value="<?= $user['address']; ?>" class="form-control form-control-line">
                      <?= form_error('address', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="col-md">City</label>
                      <div class="col-md">
                        <input type="text" name="city" value="<?= $user['city']; ?>" class="form-control form-control-line">
                        <?= form_error('city', '<small class="text-danger pl-1">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="col-md">State</label>
                      <div class="col-md">
                        <input type="text" name="state" value="<?= $user['state']; ?>" class="form-control form-control-line">
                        <?= form_error('state', '<small class="text-danger pl-1">', '</small>'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="col-md">Post Code</label>
                      <div class="col-md">
                        <input type="text" name="postcode" value="<?= $user['postcode']; ?>" class="form-control form-control-line">
                        <?= form_error('postcode', '<small class="text-danger pl-1">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="col-md">Country</label>
                      <div class="col-md">
                        <input type="text" name="country" value="<?= $user['country']; ?>" class="form-control form-control-line">
                        <?= form_error('country', '<small class="text-danger pl-1">', '</small>'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-success">Update Profile</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
              <div class="card-body">
                <div class="h4 card-title mb-3 text-center">Notification</div>
                <p>You will get notification on your email.</p>
                <div class="form-group">
                  <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="checkbox1" value="check">
                    <label class="custom-control-label" for="checkbox1">Notification</label>
                  </div>
                </div>
                <hr>
                <div class="h4 card-title mb-3 text-center">Change Password</div>
                <form class="form-horizontal form-material" action="<?= base_url('users/updatePassword') ?>" method="POST">
                  <input type="hidden" name="id" value="<?= $user['id']; ?>">
                  <div class="form-group">
                    <label class="col-md-12">Current Password</label>
                    <div class="col-md-12">
                      <input type="password" name="current" class="form-control form-control-line">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="example-email" class="col-md-12">New Password</label>
                    <div class="col-md-12">
                      <input type="password" class="form-control form-control-line" name="password">
                      <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Repeat Password</label>
                    <div class="col-md-12">
                      <input type="password" name="password2" class="form-control form-control-line">
                      <?= form_error('password2', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-success">Update Password</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Column -->
    </div>
    <!-- Row -->
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