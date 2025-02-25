<div class="logo">
  <span class="db"><img src="<?= base_url('assets/'); ?>images/logo-icon.png" alt="logo" /></span>
  <h5 class="font-medium m-b-20 mt-2">Sign In to Dashboard</h5>
</div>
<!-- Form -->
<?= $this->session->flashdata('message') ?>
<div class="row">
  <div class="col-12">
    <form class="form-horizontal m-t-20" id="loginform" action="<?= base_url('auth'); ?>" method="POST">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
        </div>
        <input type="text" class="form-control form-control-lg" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
      </div>
      <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
      <div class="input-group mt-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
        </div>
        <input type="password" class="form-control form-control-lg" placeholder="Password" name="password">
      </div>
      <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
      <div class="form-group row mt-3">
        <div class="col-md-12">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">Remember me</label>
            <a href="javascript:void(0)" id="to-recover" class="text-dark float-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
          </div>
        </div>
      </div>
      <div class="form-group text-center">
        <div class="col-xs-12 p-b-15">
          <button class="btn btn-block btn-lg btn-info" type="submit">Log In</button>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
          <div class="social">
            <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="" data-original-title="Login with Facebook"> <i aria-hidden="true" class="fab  fa-facebook"></i> </a>
            <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="" data-original-title="Login with Google"> <i aria-hidden="true" class="fab  fa-google-plus"></i> </a>
          </div>
        </div>
      </div>
      <!-- <div class="form-group m-b-0 m-t-10">
        <div class="col-sm-12 text-center">
          Don't have an account? <a href="<?= base_url('auth/register'); ?>" class="text-info m-l-5"><b>Sign Up</b></a>
        </div>
      </div> -->
    </form>
  </div>
</div>
</div>
<div id="recoverform">
  <div class="logo">
    <span class="db"><img src="<?= base_url('assets/'); ?>images/logo-icon.png" alt="logo" /></span>
    <h5 class="font-medium m-b-20">Recover Password</h5>
    <span>Enter your Email and instructions will be sent to you!</span>
  </div>
  <div class="row m-t-20">
    <!-- Form -->
    <form class="col-12" action="<?= base_url('auth/forgotPassword'); ?>" method="POST">
      <!-- email -->
      <div class="form-group row">
        <div class="col-12">
          <input class="form-control form-control-lg" type="email" placeholder="Email" name="email">
        </div>
      </div>
      <!-- pwd -->
      <div class="row m-t-20">
        <div class="col-12">
          <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Reset</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>