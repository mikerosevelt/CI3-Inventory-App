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
        <h4 class="page-title">Manage Transactions</h4>
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
              <li class="breadcrumb-item active" aria-current="page">Manage Transactions</li>
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
            <h4 class="card-title">Transactions List</h4>
            <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered table-hover display">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Receipt #</th>
                    <th>Invoice #</th>
                    <th>Amount In</th>
                    <th class="text-center">Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $n = 1;
                  foreach ($transactions as $t) : ?>
                    <tr>
                      <td><?= $n++ ?></td>
                      <td><a href="javascript:void(0)" class="receipt-btn" data-id="<?= $t['id'] ?>" data-toggle="modal" data-target="#receiptModal"><?= $t['id'] ?></a></td>
                      <td><?= $t['id'] ?></td>
                      <td><?= number_format($t['total_amount']) ?></td>
                      <?php if ($t['status'] == 'Paid') : ?>
                        <td class="text-center"><span class="label label-success"><?= $t['status'] ?></span></td>
                      <?php else : ?>
                        <td class="text-center"><span class="label label-danger"><?= $t['status'] ?></span></td>
                      <?php endif; ?>
                      <td></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="receiptModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="receiptModalLabel">Receipt #</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <div class="card card-body printableArea">
              <h3 id="test"><b>Receipt</b> <span class="pull-right">#</span></h3>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <div class="pull-left">
                    <address>
                      <h3> &nbsp;<b class="text-danger">Inventory App</b></h3>
                      <p class="text-muted m-l-5">E 104, Dharti-2,
                        <br /> Nr' Viswakarma Temple,
                        <br /> Talaja Road,
                        <br /> Bhavnagar - 364002</p>
                    </address>
                  </div>
                  <div class="pull-right text-right">
                    <address>
                      <h3>To,</h3>
                      <h4 class="font-bold">Customer Name</h4>
                      Address
                      <p class="text-muted m-l-5">E 104, Dharti-2,
                        <br /> Nr' Viswakarma Temple,
                        <br /> Talaja Road,
                        <br /> Bhavnagar - 364002</p>
                      <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> date</p>
                      <p><b>Due Date :</b> <i class="fa fa-calendar"></i> date</p>
                    </address>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="table-responsive m-t-40" style="clear: both;">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Product Name</th>
                          <th class="text-right">Quantity</th>
                          <th class="text-right">Unit</th>
                          <th class="text-right">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>test</td>
                          <td>1</td>
                          <td>pcs</td>
                          <td>0</td>
                        </tr>
                        <!-- <?php $n = 1;
                              foreach ($items as $i) : ?>
                          <tr>
                            <td class="text-center"><?= $n++ ?></td>
                            <td><?= $i['product_name'] ?></td>
                            <td class="text-right"><?= $i['quantity'] ?></td>
                            <td class="text-right"><?= $i['unit'] ?></td>
                            <td class="text-right"><?= number_format($i['subtotal']) ?></td>
                          </tr>
                        <?php endforeach; ?> -->
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="pull-right m-t-30 text-right">
                    <p>Sub - Total amount: 0</p>
                    <!-- <p>vat (10%) : $138 </p> -->
                    <hr>
                    <h3><b>Total :</b> 0</h3>
                  </div>
                  <div class="clearfix"></div>
                  <hr>
                  <div class="text-right">
                    <!-- <button class="btn btn-danger" type="submit"> Proceed to payment </button> -->

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
            <!-- <button type="submit" class="btn btn-primary">Print</button> -->
            <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print Receipt</span> </button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal -->
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