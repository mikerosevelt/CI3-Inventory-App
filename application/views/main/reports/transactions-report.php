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
        <h4 class="page-title">Transactions Report</h4>
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
              <li class="breadcrumb-item active" aria-current="page">Transactions Report</li>
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
            <form action="">
              <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label text-right">Date Start</label>
                <div class="col-sm-3">
                  <input type="date" class="form-control" id="date1" placeholder="">
                </div>
                <label for="date" class="col-sm-2 col-form-label text-right">Date End</label>
                <div class="col-sm-3">
                  <input type="date" class="form-control" id="date2" placeholder="">
                </div>
              </div>

              <div class="text-center mt-3">
                <button class="btn btn-light text-dark border-secondary">Generate Report</button>
              </div>
            </form>
          </div>
        </div>
        <!-- Card table -->
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="file_export" class="table table-striped table-bordered table-hover display">
                <thead>
                  <tr>
                    <th>#</th>
                    <!-- <th>Invoice #</th> -->
                    <th>Invoice #</th>
                    <th>Total Amount</th>
                    <th class="text-center">Status</th>
                    <th>Invoice Date</th>
                    <th>Paid Date</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End of card table -->
        <div class="">
          <table align="center" width=30% class="">
            <thead>
              <th>Total Income</th>
              <th>Total Expenditure</th>
            </thead>
            <tbody>
              <tr>
                <td><?= number_format($income); ?></td>
                <td><?= number_format($expenditure); ?></td>
              </tr>
            </tbody>
          </table>
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