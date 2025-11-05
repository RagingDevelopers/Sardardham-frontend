<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $page_title; ?> | સરદારધામ</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
    href="<?= base_url(); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/daterangepicker/daterangepicker.css">

  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/summernote/summernote-bs4.min.css">



  <style>
    .fa-heart {
      animation: zoom-in-zoom-out 1s ease infinite;
    }

    @keyframes zoom-in-zoom-out {
      0% {
        transform: scale(1, 1);
      }

      50% {
        transform: scale(1.5, 1.5);
      }

      100% {
        transform: scale(1, 1);
      }
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/login/logout'); ?>" role="button">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url(); ?>admin/dashboard" class="brand-link">
        <img src="<?= base_url(); ?>upload/logo-round.webp" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">સરદારધામ</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- SidebarSearch Form -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link">
                    <i class="fas fa-tachometer-alt nav-icon "></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-home nav-icon "></i>
                    <p>
                      Home
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('admin/slider'); ?>" class="nav-link">
                        <i class="fas fa-images nav-icon text-success"></i>
                        <p>Slider</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Ideology'); ?>" class="nav-link">
                        <i class="fas fa-lightbulb nav-icon text-success"></i>
                        <p>Ideology</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Location'); ?>" class="nav-link">
                        <i class="fas fa-map-marker-alt nav-icon text-success"></i>
                        <p>Address boxes</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/pop_up_activity'); ?>" class="nav-link">
                        <i class="fas fa-bullhorn nav-icon text-success"></i>
                        <p>Pop Up Activity</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Goals'); ?>" class="nav-link">
                        <i class="fas fa-bullseye nav-icon text-success"></i>
                        <p>Goals</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Yuva_sangathan'); ?>" class="nav-link">
                        <i class="fas fa-users nav-icon text-success"></i>
                        <p>Yuva Sangathan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/documentary'); ?>" class="nav-link">
                        <i class="fas fa-video nav-icon text-success"></i>
                        <p>Documentary</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-info-circle nav-icon"></i>
                    <p>
                      About Us
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Thought'); ?>" class="nav-link">
                        <i class="fas fa-comment nav-icon text-success"></i>
                        <p>Thought</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Mission_vision'); ?>" class="nav-link">
                        <i class="fas fa-flag nav-icon text-success"></i>
                        <p>Mission Vision Goals</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/New_philanthropist'); ?>" class="nav-link">
                        <i class="fas fa-users nav-icon text-success"></i>
                        <p>Philanthropist</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/team'); ?>" class="nav-link">
                        <i class="fas fa-user-friends nav-icon text-success"></i>
                        <p>Team</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-building nav-icon "></i>
                    <p>
                      Sardardham
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <!-- <li class="nav-item">
                      <a href="<?= base_url('admin/Thought'); ?>" class="nav-link">
                        <i class="fas fa-comment nav-icon text-success"></i>
                        <p>Thought</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Mission_vision'); ?>" class="nav-link">
                        <i class="fas fa-flag nav-icon text-success"></i>
                        <p>Mission Vision Goals</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/team'); ?>" class="nav-link">
                        <i class="fas fa-user-friends nav-icon text-success"></i>
                        <p>Team</p>
                      </a>
                    </li> -->
                    <li class="nav-item">
                      <a href="<?= base_url('admin/philanthropist'); ?>" class="nav-link">
                        <i class="fas fa-file-pdf nav-icon text-success"></i>
                        <p>Philanthropist Pdf</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/philanthropist/add_img'); ?>" class="nav-link">
                        <i class="fas fa-image nav-icon text-success"></i>
                        <p>Philanthropist Images</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Dikri_dattak_yojna'); ?>" class="nav-link">
                        <i class="fas fa-child nav-icon text-success"></i>
                        <p>Dikri Dattak Yojna</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Scholarship_scheme'); ?>" class="nav-link">
                        <i class="fas fa-graduation-cap nav-icon text-success"></i>
                        <p>Scholarship Scheme</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Revenue_guidance_centre'); ?>" class="nav-link">
                        <i class="fas fa-hand-holding-usd nav-icon text-success"></i>
                        <p>Revenue Guidance Centre</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Business_development_centre'); ?>" class="nav-link">
                        <i class="fas fa-briefcase nav-icon text-success"></i>
                        <p>Business Development Centre</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Trustee_guest_house'); ?>" class="nav-link">
                        <i class="fas fa-hotel nav-icon text-success"></i>
                        <p>Trustee Guest House</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Medical_centre'); ?>" class="nav-link">
                        <i class="fas fa-clinic-medical nav-icon text-success"></i>
                        <p>Medical Centre</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Skill_development'); ?>" class="nav-link">
                        <i class="fas fa-tools nav-icon text-success"></i>
                        <p>Skill Development</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Spibo'); ?>" class="nav-link">
                        <i class="fas fa-network-wired nav-icon text-success"></i>
                        <p>SPIBO</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-user-graduate nav-icon "></i>
                    <p>
                      Admission
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Admission_ahmedabad'); ?>" class="nav-link">
                        <i class="fas fa-city nav-icon text-success"></i>
                        <p>Ahmedabad</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/Admission_bhuj_kutch'); ?>" class="nav-link">
                        <i class="fas fa-city nav-icon text-success"></i>
                        <p>Bhuj-Kutch</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/hostel_facilities'); ?>" class="nav-link">
                        <i class="fas fa-bed nav-icon text-success"></i>
                        <p>Hostel Facilities</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-sync-alt nav-icon "></i>
                    <p>
                      Update
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('admin/download_category'); ?>" class="nav-link">
                        <i class="fas fa-folder nav-icon text-success"></i>
                        <p>Download Category</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/download'); ?>" class="nav-link">
                        <i class="fas fa-download nav-icon text-success"></i>
                        <p>Download</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/magazine'); ?>" class="nav-link">
                        <i class="fas fa-book nav-icon text-success"></i>
                        <p>Magazine</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/magazine_content'); ?>" class="nav-link">
                        <i class="fas fa-file-alt nav-icon text-success"></i>
                        <p>Magazine Content</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/events'); ?>" class="nav-link">
                        <i class="fas fa-calendar-alt nav-icon text-success"></i>
                        <p>Events</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-photo-video nav-icon "></i>
                    <p>
                      Gallery
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('admin/gallery'); ?>" class="nav-link">
                        <i class="fas fa-folder-open nav-icon text-success"></i>
                        <p>Gallery title</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/gallery/gallery_img'); ?>" class="nav-link">
                        <i class="fas fa-images nav-icon text-success"></i>
                        <p>Gallery Images</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-question-circle nav-icon "></i>
                    <p>
                      Inquiry
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('admin/department'); ?>" class="nav-link">
                        <i class="fas fa-sitemap nav-icon text-success"></i>
                        <p>Department</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/contact'); ?>" class="nav-link">
                        <i class="fas fa-file-export nav-icon text-success"></i>
                        <p>Report</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-donate nav-icon "></i>
                    <p>
                      Donation
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('admin/donation_description'); ?>" class="nav-link">
                        <i class="fas fa-info-circle nav-icon text-success"></i>
                        <p>Description</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('admin/donation_type'); ?>" class="nav-link">
                        <i class="fas fa-list nav-icon text-success"></i>
                        <p>Type</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a href="<?= base_url('admin/Create_link'); ?>" class="nav-link">
                    <i class="fas fa-link nav-icon "></i>
                    <p>Create Link</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('admin/login/logout'); ?>" class="nav-link">
                    <i class="fas fa-sign-out-alt nav-icon text-danger"></i>
                    <p>LOGOUT</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php $this->view('admin/' . $page_name); ?>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="row">
        <div class="col-md-8">
          <div class="copyright text-md-left pt-15">
            <p>All Rights Reserved. &copy; <?php echo date("Y"); ?> <a class="text-dark h6"
                href="<?php echo base_url(); ?>"><b>Sardardham</b></a></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="copyright text-md-right pt-15">
            <p>Website Developed by:&nbsp; <a href="https://www.ragingdevelopers.com" target="_blank"> <i
                  class="fa fa-heart " aria-hidden="true"></i>&nbsp;<span class="text-dark h6">
                  &nbsp;RagingDevelopers</span></a></p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <!--<script src="<?= base_url(); ?>plugins/jquery/jquery.min.js"></script>-->
  <!-- jQuery UI 1.11.4 -->
  <!--<script src="<?= base_url(); ?>plugins/jquery-ui/jquery-ui.min.js"></script>-->
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $(document).ready(function () {
      $('#example').DataTable();
    });
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url(); ?>plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url(); ?>plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url(); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url(); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url(); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url(); ?>plugins/moment/moment.min.js"></script>
  <script src="<?= base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url(); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url(); ?>plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url(); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url(); ?>dist/js/adminlte.js"></script>

  <!-- AdminLTE for demo purposes -->
</body>

</html>