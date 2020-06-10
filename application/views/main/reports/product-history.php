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
                  <th>#</th>
                  <th>Product Name</th>
                  <th>Date Added</th>
                  <th>Added By</th>
                  <th>Incoming</th>
                  <th>Outgoing</th>
                  <th>Stock</th>
                  <th>Unit</th>
                  <th></th>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End of card -->

        <!-- TIMELINE CARD -->
        <div class="card">
          <div class="card-header">
            <h4 class="">Timeline History</h4>
          </div>
          <div class="card-body">
            <ul class="timeline">
              <!-- timeline item | Timeline-inverted = Right side -->
              <li class="timeline-item">
                <div class="timeline-badge success"><img alt="user" src="../../assets/images/users/1.jpg" alt="img" class="img-fluid">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Genelia</h4>
                    <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago
                        via Twitter</small> </p>
                  </div>
                  <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero
                      laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia
                      pariatur? Est cum veniam excepturi. Maiores praesentium, porro
                      voluptas suscipit facere rem dicta, debitis.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted timeline-item">
                <div class="timeline-badge warning"><img class="img-fluid" alt="user" src="../../assets/images/users/2.jpg" alt="img"> </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Ritesh Deshmukh</h4>
                  </div>
                  <div class="timeline-body">
                    <p><img class="img-fluid" alt="user" src="../../assets/images/users/3.jpg" alt="img"></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium
                      maiores odit qui est tempora eos, nostrum provident explicabo
                      dignissimos debitis vel! Adipisci eius voluptates, ad aut recusandae
                      minus eaque facere.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-item">
                <div class="timeline-badge danger"><span class="font-12">2018</span></div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus
                      numquam facilis enim eaque, tenetur nam id qui vel velit similique
                      nihil iure molestias aliquam, voluptatem totam quaerat, magni
                      commodi quisquam.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted timeline-item">
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates
                      est quaerat asperiores sapiente, eligendi, nihil. Itaque quos, alias
                      sapiente rerum quas odit! Aperiam officiis quidem delectus libero,
                      omnis ut debitis!</p>
                  </div>
                </div>
              </li>
              <li class="timeline-item">
                <div class="timeline-badge info"><i class="fa fa-save"></i> </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus
                      modi quam ipsum alias at est molestiae excepturi delectus nesciunt,
                      quibusdam debitis amet, beatae consequuntur impedit nulla qui!
                      Laborum, atque.</p>
                    <hr>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-cog"></i> <span class="caret"></span> </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0)">Action</a>
                        <a class="dropdown-item" href="javascript:void(0)">Another
                          action</a>
                        <a class="dropdown-item" href="javascript:void(0)">Something
                          else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)">Separated
                          link</a>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted timeline-item">
                <div class="timeline-badge success"><i class="fa fa-graduation-cap"></i> </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                  </div>
                  <div class="timeline-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt
                      obcaecati, quaerat tempore officia voluptas debitis consectetur
                      culpa amet, accusamus dolorum fugiat, animi dicta aperiam, enim
                      incidunt quisquam maxime neque eaque.</p>
                  </div>
                </div>
              </li>
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