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
        <h4 class="page-title">Invoice</h4>
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
                <a href="<?= base_url('invoices') ?>">Invoices</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Invoice Detail</li>
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
    <div class="form-group col-sm-3">
      <select class="custom-select" name="status" id="status">
        <?php foreach ($status as $s) : ?>
          <?php if ($s == $invoice['status']) : ?>
            <option value="<?= $s ?>" selected><?= $s ?></option>
          <?php else : ?>
            <option value="<?= $s ?>"><?= $s ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      </select>
      <small class="pl-2">Select one to change the status</small>
    </div>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-body printableArea">
          <h3><b>INVOICE</b> <span class="pull-right">#<?= $invoice['id']; ?></span></h3>
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
                  <h4 class="font-bold"><?= $invoice['customer_name'] ?></h4>
                  <?php $address = explode('|', $invoice['customer_address']) ?>
                  <p class="text-muted m-l-30"><?= $invoice['customer_email'] ?>,
                    <br /> <?= $address[0] ?>
                    <br /> <?= $address[1] ?> - <?= $address[3] ?>
                    <br /> <?= $address[2] ?> - <?= $address[4] ?>
                  </p>
                  <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i> <?= date('d F Y', $invoice['createdAt']) ?></p>
                  <p><b>Due Date :</b> <i class="fa fa-calendar"></i> <?= date('d F Y', $invoice['createdAt']) ?></p>
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
                    <?php $n = 1;
                    foreach ($items as $i) : ?>
                      <tr>
                        <td class="text-center"><?= $n++ ?></td>
                        <td><?= $i['product_name'] ?></td>
                        <td class="text-right"><?= $i['quantity'] ?></td>
                        <td class="text-right"><?= $i['unit'] ?></td>
                        <td class="text-right"><?= number_format($i['subtotal']) ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <div class="pull-right m-t-30 text-right">
                <p>Sub - Total amount: <?= number_format($invoice['total_price']) ?></p>
                <!-- <p>vat (10%) : $138 </p> -->
                <hr>
                <h3><b>Total :</b> <?= number_format($invoice['total_amount']) ?></h3>
              </div>
              <div class="clearfix"></div>
              <hr>
              <div class="text-right">
                <!-- <button class="btn btn-danger" type="submit"> Proceed to payment </button> -->
                <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
              </div>
            </div>
          </div>
        </div>
        <form action="">
          <div class="form-control">
            <label for="notes" class="h4">Notes</label>
            <textarea class="form-control" name="notes" id="notes" cols="30" rows="3"></textarea>
            <div class="text-center">
              <button type="submit" class="btn btn-primary mt-3 mb-3">Save Changes</button>
            </div>
          </div>
        </form>
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