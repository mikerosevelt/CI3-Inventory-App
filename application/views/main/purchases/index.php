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
        <h4 class="page-title">Manage Purchases</h4>
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
              <li class="breadcrumb-item">
                <a href="<?= base_url('products') ?>">Manage Purchases</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">All Purchases</li>
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
            <h4 class="card-title">Purchases List</h4>
            <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered table-hover display">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Supplier</th>
                    <th>Employee Name</th>
                    <th>Qty</th>
                    <th>Unit</th>
                    <th>Total</th>
                    <th>Date Purchase</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $n = 1;
                  foreach ($purchases as $p) : ?>
                    <tr>
                      <td><?= $n++ ?></td>
                      <td><?= $p['product'] ?></td>
                      <td><?= $p['code'] ?></td>
                      <td><?= $p['name'] ?></td>
                      <td><?= $p['qty'] ?></td>
                      <td><?= $p['unit'] ?></td>
                      <td><?= $p['total_price'] ?></td>
                      <td><?= date('d F Y', $p['createdAt']) ?></td>
                      <td class="text-center">
                        <div class="dropdown">
                          <a class="btn btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item text-dark" href="<?= base_url('users/detail/') ?>">Detail</a>
                            <a class="dropdown-item text-danger del-btn" href="<?= base_url('products/delete/') . $p['id'] ?>">Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
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