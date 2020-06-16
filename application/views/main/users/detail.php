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
        <h4 class="page-title">User Detail</h4>
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
              <li class="breadcrumb-item">
                <a href="<?= base_url('users') ?>">Manage User</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">User Detail</li>
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
            <center class="m-t-30"> <img src="../../assets/images/users/5.jpg" class="rounded-circle" width="150" />
              <h4 class="card-title m-t-10"><?= $detail['name']; ?></h4>
              <h6 class="card-subtitle"><?= $detail['role']; ?> Inventory App</h6>
              <div class="form-group mt-3">
                <label class="col-sm-8">Assigned as :</label>
                <div class="col-sm-8">
                  <select class="form-control form-control-line">
                    <?php if ($detail['role'] == 'Administrator') : ?>
                      <option selected value="1">Administrator</option>
                      <option value="2">Employee</option>
                    <?php else : ?>
                      <option value="1">Administrator</option>
                      <option selected value="2">Employee</option>
                    <?php endif; ?>
                  </select>
                </div>
                <small class="form-control-feedback"> *Select one to change. </small>
              </div>
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
            <h6><?= $detail['email']; ?></h6> <small class="text-muted p-t-30 db">Phone</small>
            <h6><?= $detail['phone']; ?></h6> <small class="text-muted p-t-30 db">Address</small>
            <h6><?= $detail['address']; ?> <?= $detail['city']; ?>, <?= $detail['state']; ?> <?= $detail['postcode']; ?></h6>
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
                      <div class="sl-left"> <img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" /> </div>
                      <div class="sl-right">
                        <div><a href="javascript:void(0)" class="link"></a> <span class="sl-date"><?= time_ago($a['createdAt']); ?></span>
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
                <div class="row">
                  <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                    <br>
                    <p class="text-muted"><?= $detail['name']; ?></p>
                  </div>
                  <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                    <br>
                    <p class="text-muted"><?= $detail['phone']; ?></p>
                  </div>
                  <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                    <br>
                    <p class="text-muted"><?= $detail['email']; ?></p>
                  </div>
                  <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                    <br>
                    <p class="text-muted"><?= $detail['country']; ?></p>
                  </div>
                </div>

              </div>
            </div>
            <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
              <div class="card-body">
                <form class="form-horizontal form-material">
                  <div class="form-group">
                    <label class="col-md-12">Full Name</label>
                    <div class="col-md-12">
                      <input type="text" placeholder="<?= $detail['name']; ?>" class="form-control form-control-line">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="example-email" class="col-md-12">Email</label>
                    <div class="col-md-12">
                      <input type="email" placeholder="<?= $detail['email']; ?>" class="form-control form-control-line" name="example-email" id="example-email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Password</label>
                    <div class="col-md-12">
                      <input type="password" value="password" class="form-control form-control-line">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Phone No</label>
                    <div class="col-md-12">
                      <input type="text" placeholder="<?= $detail['phone']; ?>" class="form-control form-control-line">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12">Address</label>
                    <div class="col-md-12">
                      <input type="text" placeholder="<?= $detail['address']; ?>" class="form-control form-control-line">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="col-md">City</label>
                      <div class="col-md">
                        <input type="text" placeholder="<?= $detail['city']; ?>" class="form-control form-control-line">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="col-md">State</label>
                      <div class="col-md">
                        <input type="text" placeholder="<?= $detail['state']; ?>" class="form-control form-control-line">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label class="col-md">Post Code</label>
                      <div class="col-md">
                        <input type="text" placeholder="<?= $detail['postcode']; ?>" class="form-control form-control-line">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="col-md">Country</label>
                      <div class="col-md">
                        <input type="text" placeholder="<?= $detail['country']; ?>" class="form-control form-control-line">
                      </div>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label class="col-md-12">Message</label>
                    <div class="col-md-12">
                      <textarea rows="5" class="form-control form-control-line"></textarea>
                    </div>
                  </div> -->
                  <!-- <div class="form-group">
                    <label class="col-sm-12">Select Country</label>
                    <div class="col-sm-12">
                      <select class="form-control form-control-line">
                        <option>London</option>
                        <option>India</option>
                        <option>Usa</option>
                        <option>Canada</option>
                        <option>Thailand</option>
                      </select>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-success">Update Profile</button>
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