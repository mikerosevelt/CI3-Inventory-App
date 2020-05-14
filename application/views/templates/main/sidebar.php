<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
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
        <li class="sidebar-item mt-4">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('dashboard') ?>" aria-expanded="false">
            <i class="icon-Receipt"></i>
            <span class="hide-menu">Dashboards</span>
          </a>
        </li>

        <!-- MANAGEMENT -->
        <li class="nav-small-cap">
          <i class="mdi mdi-dots-horizontal"></i>
          <span class="hide-menu">Menu</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="icon-Mailbox-Empty"></i>
            <span class="hide-menu">Inbox </span>
          </a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item">
              <a href="inbox-email.html" class="sidebar-link">
                <i class="mdi mdi-email"></i>
                <span class="hide-menu"> Email </span>
              </a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="icon-User"></i>
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

        <!-- OTHER -->
        <li class="nav-small-cap">
          <i class="mdi mdi-dots-horizontal"></i>
          <span class="hide-menu">Other</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="mdi mdi-settings"></i>
            <span class="hide-menu">Settings </span>
          </a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item">
              <a href="inbox-email.html" class="sidebar-link">
                <i class="mdi mdi-email"></i>
                <span class="hide-menu"> API Setting</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../../docs/documentation.html
                                   " aria-expanded="false">
            <i class="mdi mdi-content-paste"></i>
            <span class="hide-menu">Documentation</span>
          </a>
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