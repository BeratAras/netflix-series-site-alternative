<?php $admin = $this->session->userdata('admin'); ?>
<?php if($this->session->userdata('status')){ ?>
<?php $this->load->view('back/include/head') ?>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <?php $this->load->view('back/include/navbar') ?>

  <?php $this->load->view('back/include/sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hoşgeldin <?php echo $admin[0]->admin_name ?>
        <small><?php echo date('d-m-Y') ?></small>
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="<?php echo base_url('homepage') ?>">
            <i class="fa fa-dashboard"></i> Siteye Git
          </a>
        </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Kullanıcılar</span>
              <span class="info-box-number">90</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Yorumlar</span>
              <span class="info-box-number">41,410</span>
            </div>
          </div>
        </div>


        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Aktörler</span>
              <span class="info-box-number">760</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Favoriler</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div>
      </div>
    
    </section>
  </div>


  <?php $this->load->view('back/include/footer') ?>

<?php }else{$this->load->view('back/login');} ?>