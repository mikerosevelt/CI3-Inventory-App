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
        <h4 class="page-title">Product Detail</h4>
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
                <a href="<?= base_url('products') ?>">Manage Product</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
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
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
      <!-- Column -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <form action="#">
              <div class="form-body">
                <h5 class="card-title">About Product</h5>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Product Name</label>
                      <input type="text" id="name" class="form-control" value="<?= $product['product_name'] ?>">
                    </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Product Code</label>
                      <input type="text" id="code" class="form-control" value="<?= $product['product_code'] ?>">
                    </div>
                  </div>
                  <!--/span-->
                </div>
                <!--/row-->
                <!--/row-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="control-label">Category</label>
                      <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="category" id="category">
                        <option value="Category 1">Category 1</option>
                        <option value="Category 2">Category 2</option>
                        <option value="Category 3">Category 5</option>
                        <option value="Category 4">Category 4</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="control-label">Supplier</label>
                      <input type="text" name="supplier" id="supplier" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Employee Name</label>
                      <div class="input-group">
                        <input type="text" class="form-control" value="<?= $product['name'] ?>" name="employee" id="employee" readonly>
                      </div>
                    </div>
                  </div>
                  <!--/span-->
                  <!-- <div class="col-md-4">
                    <div class="form-group">
                      <label>Status</label>
                      <br />
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">Available</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">Out of Stock</label>
                      </div>
                    </div>
                  </div> -->
                  <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Price per Unit</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="ti-money"></i></span>
                        </div>
                        <input type="text" class="form-control" name="price" id="price" value="<?= $product['price'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="control-label">Stock</label>
                      <input type="number" name="stock" id="stock" class="form-control" value="<?= $product['qty_stock'] ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Unit</label>
                      <div class="input-group">
                        <input type="text" class="form-control" value="<?= $product['unit'] ?>" name="unit" id="unit">
                      </div>
                    </div>
                  </div>

                  <!--/span-->
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label>Discount</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon2"><i class="ti-cut"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Discount" aria-label="Discount" aria-describedby="basic-addon2">
                      </div>
                    </div>
                  </div> -->
                  <!--/span-->
                </div>
                <h5 class="card-title m-t-40">Product Description</h5>
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="form-group">
                      <textarea class="form-control" rows="4"><?= $product['description'] ?></textarea>
                    </div>
                  </div>
                </div>
                <!--/row-->
                <div class="row">
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label>Meta Title</label>
                      <input type="text" class="form-control"> </div>
                  </div> -->
                  <!--/span-->
                  <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label>Meta Keyword</label>
                      <input type="text" class="form-control"> </div>
                  </div> -->
                  <!--/span-->
                  <div class="col-md-3">
                    <h5 class="card-title m-t-20">Current Image</h5>
                    <div class="el-element-overlay">
                      <div class="el-card-item">
                        <div class="el-card-avatar el-overlay-1"> <img src="<?= base_url('assets/images/product/') . $product['image']; ?>" alt="user" />
                          <div class="el-overlay">
                            <ul class="list-style-none el-info">
                              <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="<?= base_url('assets/images/product/') . $product['image']; ?>"><i class="sl-icon-magnifier"></i></a></li>
                              <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="sl-icon-link"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="btn btn-info waves-effect waves-light"><span>Upload Anonther Image</span>
                      <input type="file" class="upload"> </div>
                  </div>
                </div>
                <hr>
              </div>
              <div class="form-actions m-t-40">
                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save Changes</button>
                <button type="button" class="btn btn-dark">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Column -->
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