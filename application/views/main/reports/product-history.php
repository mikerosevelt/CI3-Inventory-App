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
        <h4 class="page-title">Product History Report</h4>
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
                <a href="<?= base_url('reports') ?>">Reports</a>
              </li>
              <li class="breadcrumb-item">
                <a href="<?= base_url('reports/inventory') ?>">Inventory</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Product History Report</li>
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
  <div class="container-fluid mt-3">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table table id="zero_config" class="table table-striped table-bordered table-hover display">
                <thead>
                  <th>Product Name</th>
                  <th>Date Added</th>
                  <th>Added By</th>
                  <th>Incoming</th>
                  <!-- <th>Outgoing</th> -->
                  <th>Stock</th>
                  <th>Unit</th>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $product['product_name'] ?></td>
                    <td><?= date('d F Y', $product['createdAt']) ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['incoming'] ?></td>
                    <td><?= $product['qty_stock'] ?></td>
                    <td><?= $product['unit'] ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End of card -->

        <!-- TIMELINE CARD -->
        <div class="card">
          <div class="card-header">
            <div class="row">
              <h4 class="col-lg-6">Timeline History</h4>
              <div class="col-lg-6">
                <button id="print" class="btn btn-default btn-outline float-right" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
              </div>
            </div>
          </div>
          <div class="card-body printableArea">
            <ul class="timeline">
              <!-- timeline item | Timeline-inverted = Right side -->
              <?php foreach ($history['incoming'] as $i) : ?>
                <li class="timeline-item">
                  <div class="timeline-badge info"><small>In</small>
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title"><?= $i['name']; ?></h4>
                      <p><small class="text-muted"><i class="fa fa-clock-o"></i> <?= date('d F Y H:i:s', $i['createdAt']); ?></small> </p>
                    </div>
                    <div class="timeline-body">
                      <p>
                        Incoming product or stock <?= $i['qty']; ?> <?= $i['unit']; ?> from supplier <?= $i['supplier_name']; ?>

                        <br><br>
                        Price per unit : <?= number_format($i['price']); ?><br>
                        Total price : <?= number_format($i['total_price']); ?><br>
                        <br>
                        laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia
                        pariatur? Est cum veniam excepturi. Maiores praesentium, porro
                        voluptas suscipit facere rem dicta, debitis.
                      </p>
                    </div>
                  </div>
                </li>
              <?php endforeach; ?>

              <?php foreach ($history['outgoing'] as $o) : ?>
                <li class="timeline-inverted timeline-item">
                  <div class="timeline-badge success"><small>Out</small>
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4 class="timeline-title"><?= $o['name']; ?></h4>
                      <p><small class="text-muted"><i class="fa fa-clock-o"></i> <?= date('d F Y H:i:s', $o['createdAt']); ?></small> </p>
                    </div>
                    <div class="timeline-body">
                      <h6>Customer Info</h6>
                      <?php $str = $o['customer_address'];
                      $add = explode('|', $str); ?>
                      <p><?= $o['customer_name']; ?>, was ordered <?= $o['quantity'] ?> <?= $o['unit'] ?>
                        to address <?= $add['0']; ?> <?= $add['1']; ?> <?= $add['2']; ?> <?= $add['3']; ?>
                        <?= $add['4']; ?>
                        .<br><br>
                        price per unit : <?= number_format($o['price']) ?>
                        <br>
                        subtotal : <?= number_format($o['subtotal']) ?>
                        <br>
                        Status: <?= $o['status']; ?>
                        <br><br>
                        <?= $o['customer_email']; ?><br><?= $o['customer_phone']; ?>
                      </p>
                    </div>
                  </div>
                </li>
              <?php endforeach; ?>

            </ul>
          </div>
        </div>
        <!-- End of timeline card -->

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