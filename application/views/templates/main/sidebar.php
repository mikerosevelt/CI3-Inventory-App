<?php
$user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
?>

<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar mt-4">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <!-- DASHBOARD-->
        <!-- <li class="nav-small-cap">
          <i class="mdi mdi-dots-horizontal"></i>
          <span class="hide-menu">Dashboards</span>
        </li> -->
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('dashboard') ?>" aria-expanded="false">
            <i class="mdi mdi-home-outline"></i>
            <span class="hide-menu">Dashboards</span>
          </a>
        </li>

        <!-- MANAGEMENT -->
        <li class="nav-small-cap">
          <i class="mdi mdi-dots-horizontal"></i>
          <span class="hide-menu">Menu</span>
        </li>
        <!-- MANAGE USERS -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="mdi mdi-account-edit"></i>
            <span class="hide-menu">Manage Users </span>
          </a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item">
              <a href="<?= base_url('users') ?>" class="sidebar-link">
                <i class="mdi mdi-users"></i>
                <span class="hide-menu"> View All Users </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?= base_url('users/create') ?>" class="sidebar-link">
                <i class="mdi mdi-account-plus"></i>
                <span class="hide-menu"> Add New User </span>
              </a>
            </li>
          </ul>
        </li>

        <!-- MANAGE INVENTORY -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="icon-Box-Open"></i>
            <span class="hide-menu">Manage Inventory </span>
          </a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item">
              <a href="<?= base_url('products') ?>" class="sidebar-link">
                <i class="mdi mdi-users"></i>
                <span class="hide-menu"> View All Products </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?= base_url() ?>" class="sidebar-link">
                <i class="mdi mdi-users"></i>
                <span class="hide-menu"> Outgoing Product </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?= base_url('products/create') ?>" class="sidebar-link">
                <i class="mdi mdi-users"></i>
                <span class="hide-menu"> Incoming Product </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?= base_url('products/categories') ?>" class="sidebar-link">
                <i class="mdi mdi-users"></i>
                <span class="hide-menu"> View All Categories </span>
              </a>
            </li>
          </ul>
        </li>
        <!-- SALES -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="icon-Add-Cart"></i>
            <span class="hide-menu">Sales </span>
          </a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item">
              <a href="<?= base_url() ?>" class="sidebar-link">
                <i class="mdi mdi-users"></i>
                <span class="hide-menu"> View All Orders </span>
              </a>
            </li>
          </ul>
        </li>
        <!-- TRANSACTIONS -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="icon-Dollar"></i>
            <span class="hide-menu">Transactions </span>
          </a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item">
              <a href="<?= base_url('transactions') ?>" class="sidebar-link">
                <i class="mdi mdi-users"></i>
                <span class="hide-menu"> View All Transactions </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?= base_url() ?>" class="sidebar-link">
                <i class="mdi mdi-account-plus"></i>
                <span class="hide-menu"> Invoices </span>
              </a>
            </li>
          </ul>
        </li>

        <!-- Customers & Suppliers -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="mdi mdi-account-multiple"></i>
            <span class="hide-menu">Customers & Suppliers </span>
          </a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item">
              <a href="<?= base_url('customers') ?>" class="sidebar-link">
                <i class="mdi mdi-email"></i>
                <span class="hide-menu"> View All Customers </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?= base_url('suppliers') ?>" class="sidebar-link">
                <i class="mdi mdi-email"></i>
                <span class="hide-menu"> View All Suppliers </span>
              </a>
            </li>
          </ul>
        </li>

        <!-- OTHER -->
        <li class="nav-small-cap">
          <i class="mdi mdi-dots-horizontal"></i>
          <span class="hide-menu">Other</span>
        </li>

        <!-- REPORTS -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="mdi mdi-library-books"></i>
            <span class="hide-menu">Reports </span>
          </a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item">
              <a href="inbox-email.html" class="sidebar-link">
                <i class="mdi mdi-email"></i>
                <span class="hide-menu"> Transactions Report </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="inbox-email.html" class="sidebar-link">
                <i class="mdi mdi-email"></i>
                <span class="hide-menu"> Product Stock Report </span>
              </a>
            </li>
          </ul>
        </li>

        <!-- SETTINGS -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="mdi mdi-settings"></i>
            <span class="hide-menu">Settings </span>
          </a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item">
              <a href="inbox-email.html" class="sidebar-link">
                <i class="mdi mdi-email"></i>
                <span class="hide-menu"> API Setting </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="inbox-email.html" class="sidebar-link">
                <i class="mdi mdi-email"></i>
                <span class="hide-menu"> Backup Database </span>
              </a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('auth/logout') ?>">
            <i class="mdi mdi-directions"></i>
            <span class="hide-menu">Log Out</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->