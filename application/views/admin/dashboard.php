<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"><?= $page_title; ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <!--<div class="row">-->
    <!--  <div class="col-lg-3 col-6">-->
    <!-- small box -->
    <!--    <div class="small-box bg-info">-->
    <!--      <div class="inner">-->
    <!--        <h3>150</h3>-->

    <!--        <p>New Orders</p>-->
    <!--      </div>-->
    <!--      <div class="icon">-->
    <!--        <i class="ion ion-bag"></i>-->
    <!--      </div>-->
    <!--      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
    <!--    </div>-->
    <!--  </div>-->
    <!-- ./col -->
    <!--  <div class="col-lg-3 col-6">-->
    <!-- small box -->
    <!--    <div class="small-box bg-success">-->
    <!--      <div class="inner">-->
    <!--        <h3>53<sup style="font-size: 20px">%</sup></h3>-->

    <!--        <p>Bounce Rate</p>-->
    <!--      </div>-->
    <!--      <div class="icon">-->
    <!--        <i class="ion ion-stats-bars"></i>-->
    <!--      </div>-->
    <!--      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
    <!--    </div>-->
    <!--  </div>-->
    <!-- ./col -->
    <!--  <div class="col-lg-3 col-6">-->
    <!-- small box -->
    <!--    <div class="small-box bg-warning">-->
    <!--      <div class="inner">-->
    <!--        <h3>44</h3>-->

    <!--        <p>User Registrations</p>-->
    <!--      </div>-->
    <!--      <div class="icon">-->
    <!--        <i class="ion ion-person-add"></i>-->
    <!--      </div>-->
    <!--      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
    <!--    </div>-->
    <!--  </div>-->
    <!-- ./col -->
    <!--  <div class="col-lg-3 col-6">-->
    <!-- small box -->
    <!--    <div class="small-box bg-danger">-->
    <!--      <div class="inner">-->
    <!--        <h3>65</h3>-->

    <!--        <p>Unique Visitors</p>-->
    <!--      </div>-->
    <!--      <div class="icon">-->
    <!--        <i class="ion ion-pie-graph"></i>-->
    <!--      </div>-->
    <!--      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
    <!--    </div>-->
    <!--  </div>-->
    <!-- ./col -->
    <!--</div>-->
    <!-- /.row -->
    <div class="row">
      <div class="col-md-3">
        <div class="card card-widget widget-user-2">
          <div class="widget-user-header bg-secondary">
            <h4 class="m-0">Home</h4>
          </div>
          <div class="card-footer p-0">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="<?= base_url('admin/slider'); ?>" class="nav-link text-primary">
                  Slider
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/ideology'); ?>" class="nav-link text-primary">
                  Ideology
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/location'); ?>" class="nav-link text-primary">
                  Address Boxes
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/pop_up_activity'); ?>" class="nav-link text-primary">
                  Pop Up Activity
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/goals'); ?>" class="nav-link text-primary">
                  Goals
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/yuva_sangathan'); ?>" class="nav-link text-primary">
                  Yuva Sangathan
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/documentary'); ?>" class="nav-link text-primary">
                  Documentary
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/magazine'); ?>" class="nav-link text-primary">
                  Magazine
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/events'); ?>" class="nav-link text-primary">
                  Events and News
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card card-widget widget-user-2">
          <div class="widget-user-header bg-secondary">
            <h4 class="m-0">About US</h4>
          </div>
          <div class="card-footer p-0">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="<?= base_url('admin/thought'); ?>" class="nav-link text-primary">
                  Sardardham - A Thought
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/mission_vision'); ?>" class="nav-link text-primary">
                  Vision & Mission, Goals
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/New_philanthropist'); ?>" class="nav-link text-primary">
                  Philanthropist
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/team'); ?>" class="nav-link text-primary">
                  Team Sardardham
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>