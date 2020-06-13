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
        <h4 class="page-title">Users Activities</h4>
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
              <li class="breadcrumb-item active" aria-current="page">Users Activities</li>
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
            <form action="<?= base_url('reports/test') ?>" method="post">
              <!-- <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label text-right">Customer Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" placeholder="Start Typing to Search Client">
                </div>
              </div> -->
              <!-- <div class="form-group row">
                <label for="filter" class="col-sm-2 col-form-label text-right">Filter By</label>
                <div class="col-sm-2">
                  <select name="filter" id="filter" class="form-control">
                    <option>Date Created</option>
                    <option>Customer Name</option>
                  </select>
                </div>
              </div> -->
              <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label text-right">Date Start</label>
                <div class="col-sm-3">
                  <input type="date" class="form-control" id="start" name="start" placeholder="">
                </div>
                <label for="date" class="col-sm-2 col-form-label text-right">Date End</label>
                <div class="col-sm-3">
                  <input type="date" class="form-control" id="end" name="end" placeholder="">
                </div>
              </div>

              <div class="text-center mt-3">
                <button class="btn btn-light text-dark border-secondary">Generate Report</button>
              </div>
            </form>
          </div>
        </div>
        <!-- END of CARD -->

        <!-- Card table -->
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="file_export" class="table table-striped table-bordered table-hover display">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Activity</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($activities as $a) : ?>
                    <tr>
                      <td><?= $a['name']; ?></td>
                      <td><?= $a['activity']; ?></td>
                      <td><?= date('d F Y H:i:s', $a['createdAt']); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End of card table -->
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