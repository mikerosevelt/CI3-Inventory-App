<div class="logo">
  <span class="db"><img src="<?= base_url('assets/'); ?>images/logo-icon.png" alt="logo" /></span>
  <h5 class="font-medium m-b-20 mt-2">Create New Account</h5>
</div>
<!-- Form -->
<div class="row">
  <div class="col-12">
    <form class="form-horizontal m-t-20" action="<?= base_url('auth/register'); ?>" method="POST">
      <div class="form-group row ">
        <div class="col-12 ">
          <input class="form-control form-control-lg" type="text" placeholder="Name" name="name" value="<?= set_value('name'); ?>">
          <?= form_error('name', '<small class="text-danger pl-1">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-12 ">
          <input class="form-control form-control-lg" type="text" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
          <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-12 ">
          <input class="form-control form-control-lg" type="password" placeholder="Password" name="password">
          <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-12 ">
          <input class="form-control form-control-lg" type="password" placeholder="Confirm Password" name="password2">
          <?= form_error('password2', '<small class="text-danger pl-1">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-12 ">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">I agree to all <a href="javascript:void(0)">Terms</a></label>
          </div>
        </div>
      </div>
      <div class="form-group text-center ">
        <div class="col-xs-12 p-b-20 ">
          <button class="btn btn-block btn-lg btn-info " type="submit ">SIGN UP</button>
        </div>
      </div>
      <div class="form-group m-b-0 m-t-10 ">
        <div class="col-sm-12 text-center ">
          Already have an account? <a href="<?= base_url('auth') ?> " class="text-info m-l-5 "><b>Sign In</b></a>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>