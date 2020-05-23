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
        <h4 class="page-title">Manage Orders</h4>
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
                <a href="<?= base_url('products') ?>">Manage Orders</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">All Orders</li>
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
            <h4 class="card-title">Orders List</h4>
            <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered table-hover display">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Order #</th>
                    <th>Customer Name</th>
                    <th class="text-center">Total Items</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $n = 1;
                  foreach ($orders as $o) : ?>
                    <tr>
                      <td><?= $n++ ?></td>
                      <td><?= $o['id'] ?></td>
                      <td><?= $o['customer_name'] ?></td>
                      <td class="text-center"><?= $o['total_item'] ?></td>
                      <td><?= number_format($o['total_price']) ?></td>
                      <?php if ($o['status'] == 'Success') : ?>
                        <td><span class="label label-success"><?= $o['status'] ?></span></td>
                      <?php elseif ($o['status'] == 'Cancelled') : ?>
                        <td><span class="label label-danger"><?= $o['status'] ?></span></td>
                      <?php elseif ($o['status'] == 'Processing') : ?>
                        <td><span class="label label-info"><?= $o['status'] ?></span></td>
                      <?php endif; ?>
                      <td><?= date('d F Y', $o['createdAt']) ?></td>
                      <td class="text-center">
                        <div class="dropdown">
                          <a class="btn btn-icon-only" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item text-dark" href="<?= base_url('orders/detail/') ?>">Detail</a>
                            <a class="dropdown-item text-danger del-btn" href="<?= base_url('orders/delete/') . $o['id'] ?>">Delete</a>
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