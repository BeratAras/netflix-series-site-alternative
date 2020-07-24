<?php $admin = $this->session->userdata('admin'); ?>
<?php if($this->session->userdata('status')){ ?>
<?php $this->load->view('back/include/head') ?>

<link rel="stylesheet" href="<?php echo base_url('public/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('back/include/navbar') ?>

  <?php $this->load->view('back/include/sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
    
    <div><?php echo $this->session->flashdata('Info'); ?></div>
    <div><?php echo $this->session->flashdata('Update'); ?></div>
    <div><?php echo $this->session->flashdata('Delete'); ?></div>
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Diziler & Filmler</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Adı</th>
                  <th>Konusu</th>
                  <th>Türü</th>
                  <th>Dış Banner</th>
                  <th>İç Banner</th>
                  <th>Yönetmen</th>
                  <th>Yazar</th>
                  <!-- <th>Fragman</th> -->
                  <th>Anahtar Kelimeler</th>
                  <th>Tipi</th>
                  <th>Durumu</th>
                  <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($contents as $content){ ?>
                        <tr>
                            <td><?php echo $content->content_name ?></td>
                            <td><?php echo $content->content_description ?></td>
                            <td><?php echo $content->content_kind ?></td>
                            <td>
                                <img src="<?php echo base_url('public/front/images/uploads/banner/out_banner/'.$content->content_out_banner) ?>" alt="out_banner" width="100">
                            </td>
                            <td>
                                <img src="<?php echo base_url('public/front/images/uploads/banner/in_banner/'.$content->content_in_banner) ?>" alt="in_banner" width="100">
                            </td>
                            <td><?php echo $content->content_director ?></td>
                            <td><?php echo $content->content_writer ?></td>
                            <td><?php echo $content->content_keywords ?></td>
                            <td><?php echo $content->content_type ?></td>
                            <td>Aktif</td>
                            <td>
                              <a href="<?php echo base_url("nedmin/sm-view/$content->content_id") ?>" class="btn btn-success">Görüntüle</a>
                              <a href="<?php echo base_url("nedmin/sm-update/$content->content_id") ?>" class="btn btn-warning">Güncelle</a>
                              <a href="<?php echo base_url("back/Dashboard/smDelete/$content->content_id") ?>" class="btn btn-danger">Sil</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    
  
    
    </section>
  </div>


  <?php $this->load->view('back/include/footer') ?>

<?php }else{$this->load->view('back/login');} ?>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>


<script src="<?php echo base_url('public/back/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('public/back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>

